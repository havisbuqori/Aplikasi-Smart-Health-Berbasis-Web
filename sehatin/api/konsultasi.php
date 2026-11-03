<?php
/**
 * FILE: api/konsultasi.php
 * Jembatan Utama Pasien <-> Dokter <-> Admin (Tabel `konsultasi`)
 * - POST booking dokter (Pasien) -> masuk ke `konsultasi` dengan status `aktif` (layanan konsultasi gratis, tanpa tagihan)
 * - GET daftar antrean & riwayat konsultasi pasien (Dokter melihat profil medis pasien, Pasien melihat status & diagnosis, Admin memantau semua)
 * - PUT/POST update diagnosis dokter & status konsultasi (`aktif`, `selesai`, `batal`)
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
    sendJson(['status' => 'error', 'message' => 'Belum login. Silakan masuk terlebih dahulu.'], 401);
}

$method = $_SERVER['REQUEST_METHOD'];
$body   = getJsonBody();
$action = $_GET['action'] ?? ($body['action'] ?? ($method === 'GET' ? 'list' : 'booking'));

// ============================================================================
// 1. GET DAFTAR KONSULTASI & ANTREAN PASIEN (TERHUBUNG PASIEN - DOKTER - ADMIN)
// ============================================================================
if ($method === 'GET' || $action === 'list') {
    $whereClauses = ["1=1"];
    $params       = [];

    if ($role === 'pasien') {
        $whereClauses[] = "k.pasien_id = ?";
        $params[]       = $userId;
    } elseif ($role === 'dokter') {
        $whereClauses[] = "k.dokter_id = ?";
        $params[]       = $userId;
    } else {
        if (!empty($_GET['pasien_id'])) {
            $whereClauses[] = "k.pasien_id = ?";
            $params[]       = (int)$_GET['pasien_id'];
        }
        if (!empty($_GET['dokter_id'])) {
            $whereClauses[] = "k.dokter_id = ?";
            $params[]       = (int)$_GET['dokter_id'];
        }
    }

    if (!empty($_GET['status'])) {
        $whereClauses[] = "k.status = ?";
        $params[]       = trim((string)$_GET['status']);
    }

    $whereSql = implode(' AND ', $whereClauses);

    $sql = "
        SELECT
            k.id,
            k.pasien_id,
            k.dokter_id,
            k.jadwal_id,
            k.tanggal_booking,
            k.keluhan_awal,
            k.diagnosis_dokter,
            k.status,
            k.created_at,
            p.no_rm AS no_rm_pasien,
            p.nama_lengkap AS nama_pasien,
            p.email AS email_pasien,
            p.no_hp AS no_hp_pasien,
            p.tanggal_lahir AS tgl_lahir_pasien,
            p.jenis_kelamin AS gender_pasien,
            p.alamat AS alamat_pasien,
            d.nama_lengkap AS nama_dokter,
            d.spesialisasi AS spesialisasi_dokter,
            d.no_str AS no_str_dokter,
            d.rumah_sakit AS rs_dokter,
            j.hari AS jadwal_hari,
            TIME_FORMAT(j.jam_mulai, '%H:%i') AS jadwal_jam_mulai,
            TIME_FORMAT(j.jam_selesai, '%H:%i') AS jadwal_jam_selesai,
            pm.golongan_darah,
            pm.tinggi_badan,
            pm.berat_badan,
            pm.imt_nilai,
            pm.imt_status,
            pm.riwayat_alergi,
            pm.riwayat_medis,
            pm.tekanan_darah
        FROM konsultasi k
        INNER JOIN users p ON p.id = k.pasien_id
        INNER JOIN users d ON d.id = k.dokter_id
        LEFT JOIN jadwal_dokter j ON j.id = k.jadwal_id
        LEFT JOIN profil_medis pm ON pm.pasien_id = k.pasien_id
        WHERE $whereSql
        ORDER BY k.id DESC
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $rows = $stmt->fetchAll();

    $konsultasiList = [];
    foreach ($rows as $r) {
        $jamStr = ($r['jadwal_jam_mulai'] && $r['jadwal_jam_selesai'])
            ? ($r['jadwal_jam_mulai'] . ' - ' . $r['jadwal_jam_selesai'] . ' WIB')
            : date('H:i', strtotime($r['created_at'])) . ' WIB';

        $konsultasiList[] = [
            'id'                => (int)$r['id'],
            'pasien_id'         => (int)$r['pasien_id'],
            'dokter_id'         => (int)$r['dokter_id'],
            'jadwal_id'         => $r['jadwal_id'] ? (int)$r['jadwal_id'] : null,
            'tanggal_booking'   => $r['tanggal_booking'],
            'consult_date'      => $r['tanggal_booking'],
            'consult_time'      => $jamStr,
            'keluhan_awal'      => $r['keluhan_awal'],
            'complaint'         => $r['keluhan_awal'],
            'diagnosis_dokter'  => $r['diagnosis_dokter'] ?? '',
            'diagnosis_notes'   => $r['diagnosis_dokter'] ?? 'Menunggu pemeriksaan dokter',
            'status'            => $r['status'],
            'nama_pasien'       => $r['nama_pasien'],
            'no_rm_pasien'      => $r['no_rm_pasien'] ?? '-',
            'no_hp_pasien'      => $r['no_hp_pasien'] ?? '-',
            'gender_pasien'     => $r['gender_pasien'] ?? '-',
            'tgl_lahir_pasien'  => $r['tgl_lahir_pasien'] ?? '-',
            'alamat_pasien'     => $r['alamat_pasien'] ?? '-',
            'nama_dokter'       => $r['nama_dokter'],
            'doctor_name'       => $r['nama_dokter'],
            'spesialisasi'      => $r['spesialisasi_dokter'] ?? 'Dokter Spesialis',
            'specialty'         => $r['spesialisasi_dokter'] ?? 'Dokter Spesialis',
            'no_str_dokter'     => $r['no_str_dokter'] ?? '-',
            'rumah_sakit'       => $r['rs_dokter'] ?? 'RS Mitra Sehatin',
            'profil_medis_pasien' => [
                'golongan_darah' => $r['golongan_darah'] ?? '-',
                'tinggi_badan'   => isset($r['tinggi_badan']) ? (float)$r['tinggi_badan'] : 0,
                'berat_badan'    => isset($r['berat_badan']) ? (float)$r['berat_badan'] : 0,
                'imt_nilai'      => isset($r['imt_nilai']) ? (float)$r['imt_nilai'] : 0,
                'imt_status'     => $r['imt_status'] ?? 'Belum Diisi',
                'riwayat_alergi' => $r['riwayat_alergi'] ?? 'Tidak Ada',
                'riwayat_medis'  => $r['riwayat_medis'] ?? '-',
                'tekanan_darah'  => $r['tekanan_darah'] ?? '-'
            ],
            'created_at'        => $r['created_at']
        ];
    }

    sendJson([
        'status'                 => 'success',
        'konsultasi'             => $konsultasiList,
        'consultation_histories' => $konsultasiList
    ]);
}

// ============================================================================
// 2. POST BOOKING KONSULTASI DOKTER OLEH PASIEN
// ============================================================================
if ($method === 'POST' && in_array($action, ['booking', 'create', 'add_schedule', 'add_history'], true)) {
    if ($role === 'dokter' && $action === 'add_history') {
        $konsultasiId = (int)($body['konsultasi_id'] ?? ($body['id'] ?? 0));
        $diagnosis    = trim((string)($body['diagnosis_dokter'] ?? ($body['diagnosis_notes'] ?? '')));
        $keluhan      = trim((string)($body['keluhan_awal'] ?? ($body['complaint'] ?? '')));
        $pasienId     = (int)($body['pasien_id'] ?? 0);

        if ($konsultasiId > 0) {
            $upd = $pdo->prepare("
                UPDATE konsultasi
                SET diagnosis_dokter = ?, status = 'selesai'
                WHERE id = ? AND dokter_id = ?
            ");
            $upd->execute([$diagnosis, $konsultasiId, $userId]);
            sendJson(['status' => 'success', 'message' => 'Diagnosis & riwayat konsultasi berhasil disimpan.', 'id' => $konsultasiId]);
        } elseif ($pasienId > 0) {
            $ins = $pdo->prepare("
                INSERT INTO konsultasi (pasien_id, dokter_id, tanggal_booking, keluhan_awal, diagnosis_dokter, status)
                VALUES (?, ?, CURDATE(), ?, ?, 'selesai')
            ");
            $ins->execute([$pasienId, $userId, $keluhan !== '' ? $keluhan : 'Konsultasi medis', $diagnosis]);
            sendJson(['status' => 'success', 'message' => 'Catatan diagnosis konsultasi berhasil dibuat.', 'id' => (int)$pdo->lastInsertId()]);
        }
    }

    $pasienId       = ($role === 'pasien') ? $userId : (int)($body['pasien_id'] ?? 0);
    $dokterId       = (int)($body['dokter_id'] ?? 0);
    $jadwalId       = !empty($body['jadwal_id']) ? (int)$body['jadwal_id'] : null;
    $doctorName     = trim((string)($body['doctor_name'] ?? ($body['nama_dokter'] ?? '')));
    $tanggalBooking = trim((string)($body['tanggal_booking'] ?? ($body['schedule_date'] ?? date('Y-m-d'))));
    $keluhanAwal    = trim((string)($body['keluhan_awal'] ?? ($body['complaint_notes'] ?? ($body['complaint'] ?? ''))));

    if ($pasienId <= 0) {
        sendJson(['status' => 'error', 'message' => 'ID Pasien tidak valid.'], 400);
    }

    if ($jadwalId) {
        $jStmt = $pdo->prepare("SELECT id, dokter_id, kuota, status_tersedia FROM jadwal_dokter WHERE id = ? LIMIT 1");
        $jStmt->execute([$jadwalId]);
        $jadwalRow = $jStmt->fetch();
        if (!$jadwalRow || (int)$jadwalRow['status_tersedia'] === 0 || (int)$jadwalRow['kuota'] <= 0) {
            sendJson(['status' => 'error', 'message' => 'Jadwal praktik dokter tidak tersedia atau kuota sudah penuh.'], 400);
        }
        $dokterId = (int)$jadwalRow['dokter_id'];
    } elseif ($dokterId <= 0 && $doctorName !== '') {
        $dStmt = $pdo->prepare("SELECT id FROM users WHERE role = 'dokter' AND LOWER(nama_lengkap) = LOWER(?) AND status_aktif = 1 LIMIT 1");
        $dStmt->execute([$doctorName]);
        $dRow = $dStmt->fetch();
        if ($dRow) {
            $dokterId = (int)$dRow['id'];
        }
    }

    if ($dokterId <= 0) {
        sendJson(['status' => 'error', 'message' => 'Silakan pilih Dokter yang terdaftar terlebih dahulu.'], 400);
    }

    if ($keluhanAwal === '') {
        $keluhanAwal = 'Konsultasi keluhan kesehatan umum';
    }

    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggalBooking)) {
        $tanggalBooking = date('Y-m-d');
    }

    $pdo->beginTransaction();
    try {
        $insStmt = $pdo->prepare("
            INSERT INTO konsultasi (pasien_id, dokter_id, jadwal_id, tanggal_booking, keluhan_awal, status)
            VALUES (?, ?, ?, ?, ?, 'aktif')
        ");
        $insStmt->execute([$pasienId, $dokterId, $jadwalId, $tanggalBooking, $keluhanAwal]);
        $konsultasiId = (int)$pdo->lastInsertId();

        if ($jadwalId) {
            $pdo->prepare("UPDATE jadwal_dokter SET kuota = GREATEST(0, kuota - 1) WHERE id = ?")->execute([$jadwalId]);
        }

        $pdo->commit();

        sendJson([
            'status'        => 'success',
            'message'       => 'Booking konsultasi berhasil dibuat. Sesi konsultasi & chat dokter langsung aktif.',
            'id'            => $konsultasiId,
            'konsultasi_id' => $konsultasiId
        ], 201);
    } catch (Exception $e) {
        $pdo->rollBack();
        sendJson(['status' => 'error', 'message' => 'Gagal membuat booking konsultasi: ' . $e->getMessage()], 500);
    }
}

// ============================================================================
// 3. PUT / POST UPDATE DIAGNOSIS & STATUS KONSULTASI (DOKTER & ADMIN)
// ============================================================================
if ($method === 'PUT' || in_array($action, ['update_diagnosis', 'update_status', 'selesai', 'batal', 'delete_schedule', 'delete_history'], true)) {
    $konsultasiId = (int)($body['konsultasi_id'] ?? ($body['id'] ?? 0));
    if ($konsultasiId <= 0) {
        sendJson(['status' => 'error', 'message' => 'ID Konsultasi tidak valid.'], 400);
    }

    $kStmt = $pdo->prepare("SELECT * FROM konsultasi WHERE id = ? LIMIT 1");
    $kStmt->execute([$konsultasiId]);
    $konsul = $kStmt->fetch();

    if (!$konsul) {
        sendJson(['status' => 'error', 'message' => 'Data konsultasi tidak ditemukan.'], 404);
    }

    if (in_array($action, ['batal', 'delete_schedule'], true) && $role === 'pasien') {
        if ((int)$konsul['pasien_id'] !== $userId) {
            sendJson(['status' => 'error', 'message' => 'Akses ditolak.'], 403);
        }
        $pdo->prepare("UPDATE konsultasi SET status = 'batal' WHERE id = ?")->execute([$konsultasiId]);
        sendJson(['status' => 'success', 'message' => 'Booking konsultasi telah dibatalkan.']);
    }

    if ($role === 'dokter' && (int)$konsul['dokter_id'] !== $userId) {
        sendJson(['status' => 'error', 'message' => 'Anda hanya dapat memperbarui konsultasi pasien yang Anda tangani.'], 403);
    }
    if (!in_array($role, ['dokter', 'admin'], true)) {
        sendJson(['status' => 'error', 'message' => 'Akses ditolak.'], 403);
    }

    $diagnosis = isset($body['diagnosis_dokter'])
        ? trim((string)$body['diagnosis_dokter'])
        : (isset($body['diagnosis_notes']) ? trim((string)$body['diagnosis_notes']) : $konsul['diagnosis_dokter']);

    $allowedStatuses = ['aktif', 'selesai', 'batal'];
    $newStatus       = $konsul['status'];
    if ($action === 'selesai') {
        $newStatus = 'selesai';
    } elseif ($action === 'batal') {
        $newStatus = 'batal';
    } elseif (!empty($body['status']) && in_array($body['status'], $allowedStatuses, true)) {
        $newStatus = $body['status'];
    }

    $upd = $pdo->prepare("
        UPDATE konsultasi
        SET diagnosis_dokter = ?, status = ?
        WHERE id = ?
    ");
    $upd->execute([$diagnosis, $newStatus, $konsultasiId]);

    sendJson([
        'status'            => 'success',
        'message'           => 'Data diagnosis & status konsultasi berhasil diperbarui.',
        'konsultasi_id'     => $konsultasiId,
        'status_konsultasi' => $newStatus,
        'diagnosis_dokter'  => $diagnosis
    ]);
}

sendJson(['status' => 'error', 'message' => 'Aksi pada api/konsultasi.php tidak dikenali.'], 400);
?>
