<?php
/**
 * FILE: api/lab.php
 * Endpoint Hasil Pemeriksaan Laboratorium Terintegrasi (Admin / Dokter -> Pasien)
 * - GET: Mengambil daftar hasil lab (Pasien melihat hasil lab miliknya di `hasil_lab.php`, Dokter & Admin melihat daftar hasil lab yang dikirim)
 * - POST (`action = create` / `add`): Admin atau Dokter menginput hasil lab untuk Pasien (`pasien_id`, `dokter_pengirim_id`, `jenis_pemeriksaan`, `hasil_ringkasan`, `file_pdf_hasil`, `tanggal_periksa`, `status_lab`)
 * - PUT / POST (`action = update_status` / `update`): Memperbarui status pemeriksaan lab (`diproses`, `selesai`) atau ringkasan hasil
 * - DELETE / POST (`action = delete`): Menghapus catatan hasil lab oleh Admin
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
$action = $_GET['action'] ?? ($body['action'] ?? ($method === 'GET' ? 'list' : 'create'));

// ============================================================================
// 1. GET DAFTAR HASIL LABORATORIUM (PASIEN, DOKTER, ADMIN)
// ============================================================================
if ($method === 'GET' || $action === 'list') {
    $whereClauses = ["1=1"];
    $params       = [];

    if ($role === 'pasien') {
        $whereClauses[] = "l.pasien_id = ?";
        $params[]       = $userId;
    } elseif ($role === 'dokter') {
        if (!empty($_GET['pasien_id'])) {
            $whereClauses[] = "l.pasien_id = ?";
            $params[]       = (int)$_GET['pasien_id'];
        } else {
            $whereClauses[] = "(l.dokter_pengirim_id = ? OR l.pasien_id IN (SELECT pasien_id FROM konsultasi WHERE dokter_id = ?))";
            $params[]       = $userId;
            $params[]       = $userId;
        }
    } elseif (!empty($_GET['pasien_id'])) {
        $whereClauses[] = "l.pasien_id = ?";
        $params[]       = (int)$_GET['pasien_id'];
    }

    $whereSql = implode(' AND ', $whereClauses);

    $sql = "
        SELECT
            l.id,
            l.pasien_id,
            l.dokter_pengirim_id,
            l.jenis_pemeriksaan,
            l.hasil_ringkasan,
            l.file_pdf_hasil,
            l.tanggal_periksa,
            l.status_lab,
            l.created_at,
            p.nama_lengkap AS nama_pasien,
            p.no_rm AS no_rm_pasien,
            d.nama_lengkap AS nama_dokter_pengirim,
            d.spesialisasi AS spesialisasi_dokter,
            d.rumah_sakit AS rs_dokter
        FROM hasil_lab l
        INNER JOIN users p ON p.id = l.pasien_id
        LEFT JOIN users d ON d.id = l.dokter_pengirim_id
        WHERE $whereSql
        ORDER BY l.id DESC
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $rows = $stmt->fetchAll();

    $labList = [];
    foreach ($rows as $r) {
        $pengirimLabel = $r['nama_dokter_pengirim']
            ? ('Dr. Pengirim: ' . $r['nama_dokter_pengirim'] . ($r['rs_dokter'] ? ' (' . $r['rs_dokter'] . ')' : ''))
            : 'Laboratorium Klinik Sehatin';

        $labList[] = [
            'id'                   => (int)$r['id'],
            'pasien_id'            => (int)$r['pasien_id'],
            'dokter_pengirim_id'   => $r['dokter_pengirim_id'] ? (int)$r['dokter_pengirim_id'] : null,
            'nama_pasien'          => $r['nama_pasien'],
            'no_rm_pasien'         => $r['no_rm_pasien'] ?? '-',
            'nama_dokter_pengirim' => $r['nama_dokter_pengirim'] ?? 'Admin Laboratorium',
            'jenis_pemeriksaan'    => $r['jenis_pemeriksaan'],
            'test_name'            => $r['jenis_pemeriksaan'],
            'clinic_name'          => $pengirimLabel,
            'hasil_ringkasan'      => $r['hasil_ringkasan'],
            'result_value'         => $r['hasil_ringkasan'],
            'file_pdf_hasil'       => $r['file_pdf_hasil'],
            'tanggal_periksa'      => $r['tanggal_periksa'],
            'status_lab'           => $r['status_lab'],
            'created_at'           => $r['created_at']
        ];
    }

    sendJson([
        'status'    => 'success',
        'hasil_lab' => $labList,
        'labs'      => $labList
    ]);
}

// ============================================================================
// 2. POST INPUT HASIL LAB BARU (OLEH ADMIN ATAU DOKTER)
// ============================================================================
if ($method === 'POST' && in_array($action, ['create', 'add'], true)) {
    if (!in_array($role, ['admin', 'dokter'], true)) {
        sendJson(['status' => 'error', 'message' => 'Hanya Admin atau Dokter yang dapat menginput hasil pemeriksaan laboratorium.'], 403);
    }

    $pasienId         = isset($body['pasien_id']) ? (int)$body['pasien_id'] : 0;
    $dokterPengirimId = ($role === 'dokter')
        ? $userId
        : (!empty($body['dokter_pengirim_id']) ? (int)$body['dokter_pengirim_id'] : null);
    $jenisPemeriksaan = trim((string)($body['jenis_pemeriksaan'] ?? ($body['test_name'] ?? '')));
    $hasilRingkasan   = trim((string)($body['hasil_ringkasan'] ?? ($body['result_value'] ?? '')));
    $filePdfHasil     = !empty($body['file_pdf_hasil']) ? trim((string)$body['file_pdf_hasil']) : null;
    $tanggalPeriksa   = trim((string)($body['tanggal_periksa'] ?? date('Y-m-d')));
    $statusLab        = strtolower(trim((string)($body['status_lab'] ?? 'selesai')));
    if (!in_array($statusLab, ['diproses', 'selesai'], true)) {
        $statusLab = 'selesai';
    }

    if ($pasienId <= 0 && $role === 'dokter') {
        $kStmt = $pdo->prepare("SELECT pasien_id FROM konsultasi WHERE dokter_id = ? ORDER BY id DESC LIMIT 1");
        $kStmt->execute([$userId]);
        $kRow = $kStmt->fetch();
        if ($kRow) {
            $pasienId = (int)$kRow['pasien_id'];
        }
    }

    if ($pasienId <= 0) {
        sendJson(['status' => 'error', 'message' => 'Pilih pasien penerima hasil lab terlebih dahulu.'], 400);
    }

    if ($jenisPemeriksaan === '' || $hasilRingkasan === '') {
        sendJson(['status' => 'error', 'message' => 'Jenis pemeriksaan dan ringkasan hasil lab wajib diisi.'], 400);
    }

    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggalPeriksa)) {
        $tanggalPeriksa = date('Y-m-d');
    }

    $stmt = $pdo->prepare("
        INSERT INTO hasil_lab (pasien_id, dokter_pengirim_id, jenis_pemeriksaan, hasil_ringkasan, file_pdf_hasil, tanggal_periksa, status_lab)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute([
        $pasienId,
        $dokterPengirimId,
        $jenisPemeriksaan,
        $hasilRingkasan,
        $filePdfHasil,
        $tanggalPeriksa,
        $statusLab
    ]);

    sendJson([
        'status'  => 'success',
        'message' => 'Hasil laboratorium berhasil disimpan dan dikirim ke akun Pasien.',
        'id'      => (int)$pdo->lastInsertId()
    ], 201);
}

// ============================================================================
// 3. PUT / POST UPDATE STATUS ATAU RINGKASAN HASIL LAB (ADMIN & DOKTER)
// ============================================================================
if ($method === 'PUT' || in_array($action, ['update', 'update_status'], true)) {
    if (!in_array($role, ['admin', 'dokter'], true)) {
        sendJson(['status' => 'error', 'message' => 'Akses ditolak.'], 403);
    }

    $labId = (int)($body['id'] ?? ($body['lab_id'] ?? 0));
    if ($labId <= 0) {
        sendJson(['status' => 'error', 'message' => 'ID Hasil Lab tidak valid.'], 400);
    }

    $lStmt = $pdo->prepare("SELECT * FROM hasil_lab WHERE id = ? LIMIT 1");
    $lStmt->execute([$labId]);
    $existing = $lStmt->fetch();

    if (!$existing) {
        sendJson(['status' => 'error', 'message' => 'Data hasil lab tidak ditemukan.'], 404);
    }

    $jenisPemeriksaan = trim((string)($body['jenis_pemeriksaan'] ?? $existing['jenis_pemeriksaan']));
    $hasilRingkasan   = trim((string)($body['hasil_ringkasan'] ?? $existing['hasil_ringkasan']));
    $filePdfHasil     = isset($body['file_pdf_hasil']) ? trim((string)$body['file_pdf_hasil']) : $existing['file_pdf_hasil'];
    $statusLab        = !empty($body['status_lab']) && in_array($body['status_lab'], ['diproses', 'selesai'], true)
        ? $body['status_lab']
        : $existing['status_lab'];

    $upd = $pdo->prepare("
        UPDATE hasil_lab
        SET jenis_pemeriksaan = ?, hasil_ringkasan = ?, file_pdf_hasil = ?, status_lab = ?
        WHERE id = ?
    ");
    $upd->execute([$jenisPemeriksaan, $hasilRingkasan, $filePdfHasil, $statusLab, $labId]);

    sendJson([
        'status'     => 'success',
        'message'    => 'Data hasil laboratorium berhasil diperbarui.',
        'status_lab' => $statusLab
    ]);
}

// ============================================================================
// 4. DELETE HASIL LAB (OLEH ADMIN)
// ============================================================================
if ($method === 'DELETE' || $action === 'delete') {
    if ($role !== 'admin') {
        sendJson(['status' => 'error', 'message' => 'Hanya Admin yang dapat menghapus data hasil lab.'], 403);
    }

    $labId = (int)($body['id'] ?? ($_GET['id'] ?? 0));
    if ($labId <= 0) {
        sendJson(['status' => 'error', 'message' => 'ID Hasil Lab tidak valid.'], 400);
    }

    $pdo->prepare("DELETE FROM hasil_lab WHERE id = ?")->execute([$labId]);
    sendJson(['status' => 'success', 'message' => 'Data hasil laboratorium berhasil dihapus.']);
}

sendJson(['status' => 'error', 'message' => 'Aksi pada api/lab.php tidak dikenali.'], 400);
?>
