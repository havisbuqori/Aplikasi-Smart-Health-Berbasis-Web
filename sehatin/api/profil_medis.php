<?php
/**
 * FILE: api/profil_medis.php
 * Endpoint Profil Data Diri & Rekam Medis Pasien (Pasien <-> Dokter <-> Admin)
 * - GET:
 *   - Pasien membaca profil diri & rekam medisnya sendiri
 *   - Dokter (dan Admin) membaca rekam medis pasien (`profil_medis`) yang sedang ditangani (Blueprint 4.A & 6.9)
 * - POST / PUT (`action = update_profile`):
 *   - Pasien memperbarui data diri (`users`) & rekam medis (`profil_medis`: golongan darah, tinggi, berat, IMT otomatis, alergi, riwayat medis, tekanan darah)
 *   - Dokter memperbarui profil praktik (`nama_lengkap`, `spesialisasi`, `rumah_sakit`, `no_hp`, `alamat`)
 * - POST (`action = update_avatar`):
 *   - Memperbarui ikon atau foto profil (`avatar_icon`, `avatar_img`)
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
$action = $_GET['action'] ?? ($body['action'] ?? ($method === 'GET' ? 'get' : 'update_profile'));

// ============================================================================
// 1. GET BACA PROFIL & REKAM MEDIS PASIEN (OLEH PASIEN SENDIRI ATAU DOKTER PENANGAN)
// ============================================================================
if ($method === 'GET' || in_array($action, ['get', 'detail', 'rekam_medis'], true)) {
    $targetPasienId = $userId;

    if (in_array($role, ['dokter', 'admin'], true) && !empty($_GET['pasien_id'])) {
        $targetPasienId = (int)$_GET['pasien_id'];
    } elseif (in_array($role, ['dokter', 'admin'], true) && !empty($body['pasien_id'])) {
        $targetPasienId = (int)$body['pasien_id'];
    }

    $uStmt = $pdo->prepare("
        SELECT id, no_rm, nama_lengkap, email, no_hp, role, spesialisasi, no_str, rumah_sakit,
               tanggal_lahir, jenis_kelamin, alamat, avatar_icon, avatar_img, status_aktif, created_at
        FROM users
        WHERE id = ?
        LIMIT 1
    ");
    $uStmt->execute([$targetPasienId]);
    $uRow = $uStmt->fetch();

    if (!$uStmt || !$uRow) {
        sendJson(['status' => 'error', 'message' => 'Data pengguna/pasien tidak ditemukan.'], 404);
    }

    if ($uRow['role'] === 'pasien') {
        $pdo->prepare("INSERT IGNORE INTO profil_medis (pasien_id) VALUES (?)")->execute([$targetPasienId]);
    }

    $mStmt = $pdo->prepare("SELECT * FROM profil_medis WHERE pasien_id = ? LIMIT 1");
    $mStmt->execute([$targetPasienId]);
    $mRow = $mStmt->fetch() ?: [];

    sendJson([
        'status'       => 'success',
        'pasien'       => [
            'id'            => (int)$uRow['id'],
            'no_rm'         => $uRow['no_rm'] ?? '-',
            'rm_number'     => $uRow['no_rm'] ?? '-',
            'nama_lengkap'  => $uRow['nama_lengkap'],
            'full_name'     => $uRow['nama_lengkap'],
            'email'         => $uRow['email'],
            'no_hp'         => $uRow['no_hp'] ?? '-',
            'phone'         => $uRow['no_hp'] ?? '-',
            'tanggal_lahir' => $uRow['tanggal_lahir'] ?? '-',
            'birth_date'    => $uRow['tanggal_lahir'] ?? '-',
            'jenis_kelamin' => $uRow['jenis_kelamin'] ?? '-',
            'gender'        => $uRow['jenis_kelamin'] ?? '-',
            'alamat'        => $uRow['alamat'] ?? '-',
            'address'       => $uRow['alamat'] ?? '-'
        ],
        'profil_medis' => [
            'golongan_darah' => $mRow['golongan_darah'] ?? '-',
            'blood_type'     => $mRow['golongan_darah'] ?? '-',
            'tinggi_badan'   => isset($mRow['tinggi_badan']) ? (float)$mRow['tinggi_badan'] : 0,
            'height_cm'      => isset($mRow['tinggi_badan']) ? (float)$mRow['tinggi_badan'] : 0,
            'berat_badan'    => isset($mRow['berat_badan']) ? (float)$mRow['berat_badan'] : 0,
            'weight_kg'      => isset($mRow['berat_badan']) ? (float)$mRow['berat_badan'] : 0,
            'imt_nilai'      => isset($mRow['imt_nilai']) ? (float)$mRow['imt_nilai'] : 0,
            'bmi_value'      => isset($mRow['imt_nilai']) ? (float)$mRow['imt_nilai'] : 0,
            'imt_status'     => $mRow['imt_status'] ?? 'Belum Diisi',
            'bmi_status'     => $mRow['imt_status'] ?? 'Belum Diisi',
            'riwayat_alergi' => $mRow['riwayat_alergi'] ?? 'Tidak Ada',
            'allergy'        => $mRow['riwayat_alergi'] ?? 'Tidak Ada',
            'riwayat_medis'  => $mRow['riwayat_medis'] ?? '',
            'tekanan_darah'  => $mRow['tekanan_darah'] ?? '-',
            'blood_pressure' => $mRow['tekanan_darah'] ?? '-'
        ]
    ]);
}

// ============================================================================
// 2. POST UPDATE AVATAR PENGGUNA (`update_avatar`)
// ============================================================================
if ($action === 'update_avatar') {
    $icon = trim((string)($body['avatar_icon'] ?? 'fa-user-alt'));
    $img  = $body['avatar_img'] ?? null;

    $stmt = $pdo->prepare("UPDATE users SET avatar_icon = ?, avatar_img = ? WHERE id = ?");
    $stmt->execute([$icon, $img, $userId]);

    sendJson([
        'status'  => 'success',
        'message' => 'Foto / ikon profil berhasil diperbarui.'
    ]);
}

// ============================================================================
// 3. POST / PUT UPDATE PROFIL DATA DIRI & REKAM MEDIS (`update_profile`)
// ============================================================================
$currStmt = $pdo->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
$currStmt->execute([$userId]);
$currUser = $currStmt->fetch();

if (!$currUser) {
    sendJson(['status' => 'error', 'message' => 'Pengguna tidak ditemukan.'], 404);
}

$namaLengkap  = trim((string)($body['nama_lengkap'] ?? ($body['full_name'] ?? $currUser['nama_lengkap'])));
$noHp         = trim((string)($body['no_hp'] ?? ($body['phone'] ?? $currUser['no_hp'])));
$rawTglLahir  = trim((string)($body['tanggal_lahir'] ?? ($body['birth_date'] ?? ($currUser['tanggal_lahir'] ?? ''))));
$tanggalLahir = preg_match('/^\d{4}-\d{2}-\d{2}$/', $rawTglLahir) ? $rawTglLahir : $currUser['tanggal_lahir'];

$rawGender    = trim((string)($body['jenis_kelamin'] ?? ($body['gender'] ?? ($currUser['jenis_kelamin'] ?? '-'))));
$jenisKelamin = in_array($rawGender, ['Laki-laki', 'Perempuan', '-'], true) ? $rawGender : '-';
$alamat       = trim((string)($body['alamat'] ?? ($body['address'] ?? ($currUser['alamat'] ?? ''))));

if ($role === 'dokter') {
    $spesialisasi = trim((string)($body['spesialisasi'] ?? ($body['specialty'] ?? ($currUser['spesialisasi'] ?? ''))));
    $rumahSakit   = trim((string)($body['rumah_sakit'] ?? ($body['hospital'] ?? ($currUser['rumah_sakit'] ?? ''))));

    $uUpd = $pdo->prepare("
        UPDATE users
        SET nama_lengkap = ?, no_hp = ?, spesialisasi = ?, rumah_sakit = ?, alamat = ?
        WHERE id = ?
    ");
    $uUpd->execute([$namaLengkap, $noHp, $spesialisasi, $rumahSakit, $alamat, $userId]);
    $_SESSION['nama'] = $namaLengkap;

    sendJson([
        'status'  => 'success',
        'message' => 'Profil praktik dokter berhasil diperbarui.'
    ]);
}

$uUpd = $pdo->prepare("
    UPDATE users
    SET nama_lengkap = ?, no_hp = ?, tanggal_lahir = ?, jenis_kelamin = ?, alamat = ?
    WHERE id = ?
");
$uUpd->execute([$namaLengkap, $noHp, $tanggalLahir, $jenisKelamin, $alamat, $userId]);
$_SESSION['nama'] = $namaLengkap;

$pdo->prepare("INSERT IGNORE INTO profil_medis (pasien_id) VALUES (?)")->execute([$userId]);
$mCurrStmt = $pdo->prepare("SELECT * FROM profil_medis WHERE pasien_id = ? LIMIT 1");
$mCurrStmt->execute([$userId]);
$mCurr = $mCurrStmt->fetch() ?: [];

$golonganDarah = trim((string)($body['golongan_darah'] ?? ($body['blood_type'] ?? ($mCurr['golongan_darah'] ?? '-'))));
$tinggiBadan   = isset($body['tinggi_badan']) ? (float)$body['tinggi_badan'] : (isset($body['height_cm']) ? (float)$body['height_cm'] : (float)($mCurr['tinggi_badan'] ?? 0));
$beratBadan    = isset($body['berat_badan']) ? (float)$body['berat_badan'] : (isset($body['weight_kg']) ? (float)$body['weight_kg'] : (float)($mCurr['berat_badan'] ?? 0));
$riwayatAlergi = trim((string)($body['riwayat_alergi'] ?? ($body['allergy'] ?? ($mCurr['riwayat_alergi'] ?? 'Tidak Ada'))));
$riwayatMedis  = trim((string)($body['riwayat_medis'] ?? ($body['medical_notes'] ?? ($mCurr['riwayat_medis'] ?? ''))));
$tekananDarah  = trim((string)($body['tekanan_darah'] ?? ($body['blood_pressure'] ?? ($mCurr['tekanan_darah'] ?? '-'))));

$imtNilai  = 0.0;
$imtStatus = 'Belum Diisi';
if ($tinggiBadan > 0 && $beratBadan > 0) {
    $imtNilai = round($beratBadan / pow($tinggiBadan / 100, 2), 1);
    if ($imtNilai < 18.5) {
        $imtStatus = 'Berat Kurang';
    } elseif ($imtNilai < 25) {
        $imtStatus = 'Berat Ideal';
    } else {
        $imtStatus = 'Berat Berlebih';
    }
}

$mUpd = $pdo->prepare("
    UPDATE profil_medis
    SET golongan_darah = ?,
        tinggi_badan   = ?,
        berat_badan    = ?,
        imt_nilai      = ?,
        imt_status     = ?,
        riwayat_alergi = ?,
        riwayat_medis  = ?,
        tekanan_darah  = ?
    WHERE pasien_id = ?
");
$mUpd->execute([
    $golonganDarah,
    $tinggiBadan,
    $beratBadan,
    $imtNilai,
    $imtStatus,
    $riwayatAlergi,
    $riwayatMedis,
    $tekananDarah,
    $userId
]);

sendJson([
    'status'     => 'success',
    'message'    => 'Profil data diri dan rekam medis berhasil disimpan.',
    'imt_nilai'  => $imtNilai,
    'imt_status' => $imtStatus,
    'bmi_value'  => $imtNilai,
    'bmi_status' => $imtStatus
]);
?>
