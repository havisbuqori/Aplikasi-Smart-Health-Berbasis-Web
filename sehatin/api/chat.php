<?php
/**
 * FILE: api/chat.php
 * Endpoint Ruang Chat Real-Time / Polling AJAX (Pasien <-> Dokter)
 * - GET: Mengambil daftar pesan berdasarkan `konsultasi_id` (mendukung parameter `after_id` untuk polling 2-3 detik)
 * - POST (`action = send`): Mengirim pesan baru antara Pasien & Dokter pada sesi `konsultasi`
 * - DELETE / POST (`action = clear`): Membersihkan riwayat pesan pada sesi konsultasi
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/koneksi.php';

if (!function_exists('sendJson')) {
    function sendJson($data, $code = 200) {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($code);
        echo json_encode($data);
        exit;
    }
}

if (!function_exists('getJsonBody')) {
    function getJsonBody() {
        $raw = file_get_contents('php://input');
        $decoded = json_decode($raw, true);
        return is_array($decoded) ? $decoded : $_POST;
    }
}

$userId = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;
$role   = strtolower(trim((string)($_SESSION['role'] ?? '')));
if ($role === 'user') {
    $role = 'pasien';
}

if ($userId <= 0) {
    sendJson(['status' => 'error', 'message' => 'Belum login.'], 401);
}

$method = $_SERVER['REQUEST_METHOD'];
$body   = getJsonBody();
$action = $_GET['action'] ?? ($body['action'] ?? ($method === 'GET' ? 'list' : 'send'));

/**
 * Resolusi otomatis konsultasi_id aktif/terbaru apabila frontend belum mengirimkan konsultasi_id spesifik
 */
function resolveActiveKonsultasi(PDO $pdo, int $userId, string $role, int $requestedKonsultasiId = 0, int $partnerUserId = 0) {
    if ($requestedKonsultasiId > 0) {
        $stmt = $pdo->prepare("SELECT * FROM konsultasi WHERE id = ? LIMIT 1");
        $stmt->execute([$requestedKonsultasiId]);
        $row = $stmt->fetch();
        if ($row) {
            return $row;
        }
    }

    if ($role === 'pasien') {
        if ($partnerUserId > 0) {
            $stmt = $pdo->prepare("
                SELECT * FROM konsultasi
                WHERE pasien_id = ? AND dokter_id = ? AND status IN ('aktif', 'selesai')
                ORDER BY FIELD(status, 'aktif', 'selesai'), id DESC
                LIMIT 1
            ");
            $stmt->execute([$userId, $partnerUserId]);
            $row = $stmt->fetch();
            if ($row) return $row;
        }
        $stmt = $pdo->prepare("
            SELECT * FROM konsultasi
            WHERE pasien_id = ? AND status IN ('aktif', 'selesai')
            ORDER BY FIELD(status, 'aktif', 'selesai'), id DESC
            LIMIT 1
        ");
        $stmt->execute([$userId]);
        return $stmt->fetch() ?: null;
    }

    if ($role === 'dokter') {
        if ($partnerUserId > 0) {
            $stmt = $pdo->prepare("
                SELECT * FROM konsultasi
                WHERE dokter_id = ? AND pasien_id = ? AND status IN ('aktif', 'selesai')
                ORDER BY FIELD(status, 'aktif', 'selesai'), id DESC
                LIMIT 1
            ");
            $stmt->execute([$userId, $partnerUserId]);
            $row = $stmt->fetch();
            if ($row) return $row;
        }
        $stmt = $pdo->prepare("
            SELECT * FROM konsultasi
            WHERE dokter_id = ? AND status IN ('aktif', 'selesai')
            ORDER BY FIELD(status, 'aktif', 'selesai'), id DESC
            LIMIT 1
        ");
        $stmt->execute([$userId]);
        return $stmt->fetch() ?: null;
    }

    return null;
}

// ============================================================================
// 1. GET PESAN CHAT BERDASARKAN `konsultasi_id` (POLLING REAL-TIME AJAX)
// ============================================================================
if ($method === 'GET' || $action === 'list' || $action === 'poll') {
    $reqKonsulId = isset($_GET['konsultasi_id']) ? (int)$_GET['konsultasi_id'] : (isset($body['konsultasi_id']) ? (int)$body['konsultasi_id'] : 0);
    $partnerId   = isset($_GET['partner_id']) ? (int)$_GET['partner_id'] : (isset($_GET['pasien_id']) ? (int)$_GET['pasien_id'] : (isset($_GET['dokter_id']) ? (int)$_GET['dokter_id'] : 0));
    $afterId     = isset($_GET['after_id']) ? (int)$_GET['after_id'] : 0;

    $konsul = resolveActiveKonsultasi($pdo, $userId, $role, $reqKonsulId, $partnerId);

    if (!$konsul) {
        sendJson([
            'status'        => 'success',
            'konsultasi_id' => null,
            'messages'      => [],
            'chats'         => []
        ]);
    }

    $konsultasiId = (int)$konsul['id'];

    if ($role === 'pasien' && (int)$konsul['pasien_id'] !== $userId) {
        sendJson(['status' => 'error', 'message' => 'Anda tidak memiliki akses ke ruang chat konsultasi ini.'], 403);
    }
    if ($role === 'dokter' && (int)$konsul['dokter_id'] !== $userId) {
        sendJson(['status' => 'error', 'message' => 'Anda tidak memiliki akses ke ruang chat pasien ini.'], 403);
    }

    $pdo->prepare("
        UPDATE chat_messages
        SET is_read = 1
        WHERE konsultasi_id = ? AND penerima_id = ? AND is_read = 0
    ")->execute([$konsultasiId, $userId]);

    $sql = "
        SELECT
            c.id,
            c.konsultasi_id,
            c.pengirim_id,
            c.penerima_id,
            c.pesan,
            c.lampiran_file,
            c.is_read,
            c.waktu_kirim,
            TIME_FORMAT(c.waktu_kirim, '%H:%i') AS jam_kirim,
            u.nama_lengkap AS nama_pengirim,
            u.role AS role_pengirim
        FROM chat_messages c
        INNER JOIN users u ON u.id = c.pengirim_id
        WHERE c.konsultasi_id = ? AND c.id > ?
        ORDER BY c.id ASC
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$konsultasiId, $afterId]);
    $rows = $stmt->fetchAll();

    $messages = [];
    foreach ($rows as $r) {
        $senderRoleUi = ($r['role_pengirim'] === 'dokter') ? 'doctor' : 'patient';
        $messages[] = [
            'id'            => (int)$r['id'],
            'konsultasi_id' => (int)$r['konsultasi_id'],
            'pengirim_id'   => (int)$r['pengirim_id'],
            'penerima_id'   => (int)$r['penerima_id'],
            'nama_pengirim' => $r['nama_pengirim'],
            'sender_name'   => $r['nama_pengirim'],
            'role_pengirim' => $r['role_pengirim'],
            'sender_role'   => $senderRoleUi,
            'pesan'         => $r['pesan'],
            'message_text'  => $r['pesan'],
            'lampiran_file' => $r['lampiran_file'],
            'is_read'       => (int)$r['is_read'],
            'waktu_kirim'   => $r['waktu_kirim'],
            'sent_time'     => $r['jam_kirim']
        ];
    }

    sendJson([
        'status'            => 'success',
        'konsultasi_id'     => $konsultasiId,
        'status_konsultasi' => $konsul['status'],
        'pasien_id'         => (int)$konsul['pasien_id'],
        'dokter_id'         => (int)$konsul['dokter_id'],
        'messages'          => $messages,
        'chats'             => $messages
    ]);
}

// ============================================================================
// 2. POST KIRIM PESAN BARU (PASIEN <-> DOKTER)
// ============================================================================
if ($method === 'POST' && $action === 'send') {
    $reqKonsulId  = isset($body['konsultasi_id']) ? (int)$body['konsultasi_id'] : 0;
    $partnerId    = isset($body['penerima_id']) ? (int)$body['penerima_id'] : (isset($body['pasien_id']) ? (int)$body['pasien_id'] : (isset($body['dokter_id']) ? (int)$body['dokter_id'] : 0));
    $pesan        = trim((string)($body['pesan'] ?? ($body['message_text'] ?? '')));
    $lampiranFile = !empty($body['lampiran_file']) ? trim((string)$body['lampiran_file']) : null;

    if ($pesan === '' && $lampiranFile === null) {
        sendJson(['status' => 'error', 'message' => 'Pesan tidak boleh kosong.'], 400);
    }

    $konsul = resolveActiveKonsultasi($pdo, $userId, $role, $reqKonsulId, $partnerId);

    if (!$konsul) {
        sendJson([
            'status'  => 'error',
            'message' => 'Belum ada sesi konsultasi aktif. Silakan buat booking konsultasi dokter terlebih dahulu.'
        ], 404);
    }

    $konsultasiId = (int)$konsul['id'];
    $pasienId     = (int)$konsul['pasien_id'];
    $dokterId     = (int)$konsul['dokter_id'];

    if ($userId !== $pasienId && $userId !== $dokterId) {
        sendJson(['status' => 'error', 'message' => 'Anda tidak terdaftar dalam sesi konsultasi ini.'], 403);
    }

    $pengirimId = $userId;
    $penerimaId = ($userId === $pasienId) ? $dokterId : $pasienId;

    $stmt = $pdo->prepare("
        INSERT INTO chat_messages (konsultasi_id, pengirim_id, penerima_id, pesan, lampiran_file, is_read)
        VALUES (?, ?, ?, ?, ?, 0)
    ");
    $stmt->execute([$konsultasiId, $pengirimId, $penerimaId, $pesan, $lampiranFile]);
    $msgId = (int)$pdo->lastInsertId();

    sendJson([
        'status'        => 'success',
        'id'            => $msgId,
        'konsultasi_id' => $konsultasiId,
        'pengirim_id'   => $pengirimId,
        'penerima_id'   => $penerimaId,
        'waktu_kirim'   => date('Y-m-d H:i:s'),
        'sent_time'     => date('H:i')
    ], 201);
}

// ============================================================================
// 3. CLEAR / HAPUS RIWAYAT PESAN PADA SESI KONSULTASI
// ============================================================================
if ($method === 'DELETE' || $action === 'clear') {
    $reqKonsulId = isset($body['konsultasi_id']) ? (int)$body['konsultasi_id'] : (isset($_GET['konsultasi_id']) ? (int)$_GET['konsultasi_id'] : 0);
    $konsul      = resolveActiveKonsultasi($pdo, $userId, $role, $reqKonsulId);

    if ($konsul) {
        $pdo->prepare("DELETE FROM chat_messages WHERE konsultasi_id = ?")->execute([(int)$konsul['id']]);
    }

    sendJson(['status' => 'success', 'message' => 'Riwayat pesan pada sesi konsultasi telah dibersihkan.']);
}

sendJson(['status' => 'error', 'message' => 'Aksi pada api/chat.php tidak dikenali.'], 400);
?>
