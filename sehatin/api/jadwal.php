<?php
/**
 * FILE: api/jadwal.php
 * Endpoint Manajemen Jadwal Praktik Dokter Terintegrasi (Pasien <-> Dokter <-> Admin)
 * - GET: Mengambil daftar jadwal praktik dokter aktif (untuk Pasien di `jadwal_dokter.php`, Dokter, & Admin)
 * - POST/PUT: Menambah atau memperbarui jadwal praktik (`jadwal_dokter`) oleh Dokter atau Admin
 * - DELETE: Menghapus jadwal praktik oleh Dokter pemilik jadwal atau Admin
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
    sendJson(['status' => 'error', 'message' => 'Sesi login tidak ditemukan. Silakan masuk kembali.'], 401);
}

$method = $_SERVER['REQUEST_METHOD'];
$body   = getJsonBody();
$action = $_GET['action'] ?? ($body['action'] ?? ($method === 'GET' ? 'list' : 'create'));

// ============================================================================
// 1. GET / LIST JADWAL PRAKTIK DOKTER (TERHUBUNG KE PASIEN, DOKTER, & ADMIN)
// ============================================================================
if ($method === 'GET' || $action === 'list') {
    $filterDokterId = isset($_GET['dokter_id']) ? (int)$_GET['dokter_id'] : (isset($body['dokter_id']) ? (int)$body['dokter_id'] : 0);
    $onlyMine       = !empty($_GET['mine']) || !empty($body['mine']);
    $onlyAvailable  = isset($_GET['available']) ? (int)$_GET['available'] : null;

    $whereClauses = ["u.role = 'dokter'", "u.status_aktif = 1"];
    $params       = [];

    if ($onlyMine && $role === 'dokter') {
        $whereClauses[] = "j.dokter_id = ?";
        $params[]       = $userId;
    } elseif ($filterDokterId > 0) {
        $whereClauses[] = "j.dokter_id = ?";
        $params[]       = $filterDokterId;
    }

    if ($onlyAvailable !== null) {
        $whereClauses[] = "j.status_tersedia = ?";
        $params[]       = $onlyAvailable ? 1 : 0;
    }

    $whereSql = implode(' AND ', $whereClauses);

    $sql = "
        SELECT
            j.id,
            j.dokter_id,
            j.hari,
            TIME_FORMAT(j.jam_mulai, '%H:%i') AS jam_mulai,
            TIME_FORMAT(j.jam_selesai, '%H:%i') AS jam_selesai,
            j.kuota,
            j.status_tersedia,
            j.created_at,
            u.nama_lengkap AS nama_dokter,
            u.spesialisasi,
            u.no_str,
            u.rumah_sakit,
            u.no_hp AS no_hp_dokter
        FROM jadwal_dokter j
        INNER JOIN users u ON u.id = j.dokter_id
        WHERE $whereSql
        ORDER BY FIELD(j.hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'), j.jam_mulai ASC
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $rows = $stmt->fetchAll();

    $jadwalList = [];
    foreach ($rows as $r) {
        $jamPraktik = $r['jam_mulai'] . ' - ' . $r['jam_selesai'] . ' WIB';
        $jadwalList[] = [
            'id'               => (int)$r['id'],
            'dokter_id'        => (int)$r['dokter_id'],
            'nama_dokter'      => $r['nama_dokter'],
            'doctor_name'      => $r['nama_dokter'],
            'spesialisasi'     => $r['spesialisasi'] ?? 'Dokter Umum',
            'specialty'        => $r['spesialisasi'] ?? 'Dokter Umum',
            'no_str'           => $r['no_str'] ?? '-',
            'rumah_sakit'      => $r['rumah_sakit'] ?? 'RS Mitra Sehatin',
            'hospital'         => $r['rumah_sakit'] ?? 'RS Mitra Sehatin',
            'hari'             => $r['hari'],
            'jam_mulai'        => $r['jam_mulai'],
            'jam_selesai'      => $r['jam_selesai'],
            'jam_praktik'      => $r['hari'] . ', ' . $jamPraktik,
            'schedule_date'    => $r['hari'],
            'schedule_time'    => $jamPraktik,
            'kuota'            => (int)$r['kuota'],
            'status_tersedia'  => (int)$r['status_tersedia'],
            'status'           => ((int)$r['status_tersedia'] === 1 && (int)$r['kuota'] > 0) ? 'Tersedia' : 'Penuh / Tutup',
            'created_at'       => $r['created_at']
        ];
    }

    $docStmt = $pdo->query("
        SELECT id, nama_lengkap, email, no_hp, spesialisasi, no_str, rumah_sakit, status_aktif
        FROM users
        WHERE role = 'dokter' AND status_aktif = 1
        ORDER BY nama_lengkap ASC
    ");
    $dokterAktif = $docStmt ? $docStmt->fetchAll() : [];

    sendJson([
        'status'       => 'success',
        'jadwal'       => $jadwalList,
        'schedules'    => $jadwalList,
        'dokter_aktif' => $dokterAktif
    ]);
}

// ============================================================================
// 2. TAMBAH JADWAL PRAKTIK BARU (DOKTER ATAU ADMIN)
// ============================================================================
if (($method === 'POST' && in_array($action, ['create', 'add'], true))) {
    if ($role === 'pasien') {
        $jadwalId       = isset($body['jadwal_id']) ? (int)$body['jadwal_id'] : 0;
        $dokterId       = isset($body['dokter_id']) ? (int)$body['dokter_id'] : 0;
        $doctorName     = trim((string)($body['doctor_name'] ?? ($body['nama_dokter'] ?? '')));
        $tanggalBooking = trim((string)($body['tanggal_booking'] ?? ($body['schedule_date'] ?? date('Y-m-d'))));
        $keluhanAwal    = trim((string)($body['keluhan_awal'] ?? ($body['complaint_notes'] ?? 'Konsultasi pemeriksaan kesehatan')));

        if ($jadwalId > 0 && $dokterId <= 0) {
            $jStmt = $pdo->prepare("SELECT dokter_id FROM jadwal_dokter WHERE id = ? LIMIT 1");
            $jStmt->execute([$jadwalId]);
            $jRow = $jStmt->fetch();
            if ($jRow) {
                $dokterId = (int)$jRow['dokter_id'];
            }
        }

        if ($dokterId <= 0 && $doctorName !== '') {
            $dStmt = $pdo->prepare("SELECT id FROM users WHERE role = 'dokter' AND LOWER(nama_lengkap) = LOWER(?) LIMIT 1");
            $dStmt->execute([$doctorName]);
            $dRow = $dStmt->fetch();
            if ($dRow) {
                $dokterId = (int)$dRow['id'];
            }
        }

        if ($dokterId <= 0) {
            sendJson([
                'status'  => 'error',
                'message' => 'Pilih dokter praktik yang terdaftar terlebih dahulu.'
            ], 400);
        }

        $insBooking = $pdo->prepare("
            INSERT INTO konsultasi (pasien_id, dokter_id, jadwal_id, tanggal_booking, keluhan_awal, status)
            VALUES (?, ?, ?, ?, ?, 'aktif')
        ");
        $insBooking->execute([
            $userId,
            $dokterId,
            $jadwalId > 0 ? $jadwalId : null,
            preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggalBooking) ? $tanggalBooking : date('Y-m-d'),
            $keluhanAwal
        ]);

        sendJson([
            'status'        => 'success',
            'message'       => 'Booking jadwal konsultasi berhasil dibuat.',
            'id'            => (int)$pdo->lastInsertId(),
            'konsultasi_id' => (int)$pdo->lastInsertId()
        ], 201);
    }

    if (!in_array($role, ['dokter', 'admin'], true)) {
        sendJson(['status' => 'error', 'message' => 'Hanya Dokter atau Admin yang dapat mengelola jadwal praktik.'], 403);
    }

    $targetDokterId = ($role === 'dokter')
        ? $userId
        : (int)($body['dokter_id'] ?? 0);

    if ($targetDokterId <= 0) {
        sendJson(['status' => 'error', 'message' => 'ID Dokter wajib dipilih untuk menambahkan jadwal praktik.'], 400);
    }

    $chkDoc = $pdo->prepare("SELECT id FROM users WHERE id = ? AND role = 'dokter' LIMIT 1");
    $chkDoc->execute([$targetDokterId]);
    if (!$chkDoc->fetch()) {
        sendJson(['status' => 'error', 'message' => 'Akun Dokter tidak ditemukan di database.'], 404);
    }

    $hari            = trim((string)($body['hari'] ?? ($body['schedule_date'] ?? 'Senin')));
    $jamMulai        = trim((string)($body['jam_mulai'] ?? '08:00'));
    $jamSelesai      = trim((string)($body['jam_selesai'] ?? '16:00'));
    $kuota           = isset($body['kuota']) ? max(0, (int)$body['kuota']) : 10;
    $statusTersedia  = isset($body['status_tersedia']) ? ((int)$body['status_tersedia'] ? 1 : 0) : 1;

    if ($hari === '' || $jamMulai === '' || $jamSelesai === '') {
        sendJson(['status' => 'error', 'message' => 'Hari, Jam Mulai, dan Jam Selesai wajib diisi.'], 400);
    }

    $stmt = $pdo->prepare("
        INSERT INTO jadwal_dokter (dokter_id, hari, jam_mulai, jam_selesai, kuota, status_tersedia)
        VALUES (?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute([$targetDokterId, $hari, $jamMulai, $jamSelesai, $kuota, $statusTersedia]);

    sendJson([
        'status'  => 'success',
        'message' => 'Jadwal praktik dokter berhasil ditambahkan.',
        'id'      => (int)$pdo->lastInsertId()
    ], 201);
}

// ============================================================================
// 3. UPDATE JADWAL PRAKTIK / KUOTA / STATUS TERSEDIA (DOKTER ATAU ADMIN)
// ============================================================================
if ($method === 'PUT' || in_array($action, ['update', 'toggle_status'], true)) {
    if (!in_array($role, ['dokter', 'admin'], true)) {
        sendJson(['status' => 'error', 'message' => 'Tidak memiliki akses untuk mengubah jadwal praktik.'], 403);
    }

    $jadwalId = (int)($body['id'] ?? ($body['jadwal_id'] ?? 0));
    if ($jadwalId <= 0) {
        sendJson(['status' => 'error', 'message' => 'ID Jadwal tidak valid.'], 400);
    }

    $existingStmt = $pdo->prepare("SELECT * FROM jadwal_dokter WHERE id = ? LIMIT 1");
    $existingStmt->execute([$jadwalId]);
    $existing = $existingStmt->fetch();

    if (!$existing) {
        sendJson(['status' => 'error', 'message' => 'Data jadwal tidak ditemukan.'], 404);
    }

    if ($role === 'dokter' && (int)$existing['dokter_id'] !== $userId) {
        sendJson(['status' => 'error', 'message' => 'Anda hanya dapat mengubah jadwal praktik milik Anda sendiri.'], 403);
    }

    if ($action === 'toggle_status') {
        $newStatus = isset($body['status_tersedia'])
            ? ((int)$body['status_tersedia'] ? 1 : 0)
            : ((int)$existing['status_tersedia'] === 1 ? 0 : 1);

        $upd = $pdo->prepare("UPDATE jadwal_dokter SET status_tersedia = ? WHERE id = ?");
        $upd->execute([$newStatus, $jadwalId]);

        sendJson([
            'status'          => 'success',
            'message'         => 'Status ketersediaan jadwal berhasil diperbarui.',
            'status_tersedia' => $newStatus
        ]);
    }

    $hari            = trim((string)($body['hari'] ?? $existing['hari']));
    $jamMulai        = trim((string)($body['jam_mulai'] ?? $existing['jam_mulai']));
    $jamSelesai      = trim((string)($body['jam_selesai'] ?? $existing['jam_selesai']));
    $kuota           = isset($body['kuota']) ? max(0, (int)$body['kuota']) : (int)$existing['kuota'];
    $statusTersedia  = isset($body['status_tersedia']) ? ((int)$body['status_tersedia'] ? 1 : 0) : (int)$existing['status_tersedia'];

    $upd = $pdo->prepare("
        UPDATE jadwal_dokter
        SET hari = ?, jam_mulai = ?, jam_selesai = ?, kuota = ?, status_tersedia = ?
        WHERE id = ?
    ");
    $upd->execute([$hari, $jamMulai, $jamSelesai, $kuota, $statusTersedia, $jadwalId]);

    sendJson([
        'status'  => 'success',
        'message' => 'Jadwal praktik berhasil diperbarui.'
    ]);
}

// ============================================================================
// 4. HAPUS JADWAL PRAKTIK (DOKTER PEMILIK ATAU ADMIN)
// ============================================================================
if ($method === 'DELETE' || $action === 'delete') {
    if (!in_array($role, ['dokter', 'admin'], true)) {
        sendJson(['status' => 'error', 'message' => 'Tidak memiliki izin menghapus jadwal.'], 403);
    }

    $jadwalId = (int)($_GET['id'] ?? ($body['id'] ?? ($body['jadwal_id'] ?? 0)));
    if ($jadwalId <= 0) {
        sendJson(['status' => 'error', 'message' => 'ID Jadwal tidak valid.'], 400);
    }

    if ($role === 'dokter') {
        $del = $pdo->prepare("DELETE FROM jadwal_dokter WHERE id = ? AND dokter_id = ?");
        $del->execute([$jadwalId, $userId]);
    } else {
        $del = $pdo->prepare("DELETE FROM jadwal_dokter WHERE id = ?");
        $del->execute([$jadwalId]);
    }

    sendJson([
        'status'  => 'success',
        'message' => 'Jadwal praktik berhasil dihapus.'
    ]);
}

sendJson(['status' => 'error', 'message' => 'Aksi pada api/jadwal.php tidak dikenali.'], 400);
?>
