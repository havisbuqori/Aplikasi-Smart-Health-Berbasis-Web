<?php
/**
 * FILE: api/keamanan.php
 * Endpoint Keamanan Akun & Kendali Akun Dokter oleh Admin (Blueprint 2.A & 5.A)
 * - Ganti Password (`action = change_password`)
 * - Set PIN Rekam Medis 6 Digit (`action = set_pin`)
 * - Pengaturan Verifikasi 2 Langkah / 2FA (`action = toggle_2fa`)
 * - Penguncian Mutlak Kuota Admin (Maksimal 2 Akun Admin; menolak pembuatan atau promosi akun Admin baru)
 * - Manajemen Akun Dokter oleh Admin (`list_dokter`, `create_dokter`, `toggle_status_dokter`, `list_pasien`)
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
$action = $_GET['action'] ?? ($body['action'] ?? '');

// ============================================================================
// PROTEKSI MUTLAK: TOLAK SEGALA PERCOBAAN PENAMBAHAN AKUN ADMIN BARU (MAKS 2 ADMIN)
// ============================================================================
if (in_array($action, ['add_admin', 'create_admin', 'register_admin'], true) || (isset($body['role']) && strtolower(trim((string)$body['role'])) === 'admin')) {
    sendJson([
        'status'  => 'error',
        'message' => 'Penolakan Keamanan: Jumlah akun Admin dikunci maksimal 2 akun tetap di database dan tidak dapat ditambah.'
    ], 403);
}

// ============================================================================
// 1. GANTI PASSWORD AKUN (`change_password`)
// ============================================================================
if ($action === 'change_password') {
    $newPass = trim((string)($body['new_password'] ?? ($body['password'] ?? '')));
    if (strlen($newPass) < 6) {
        sendJson(['status' => 'error', 'message' => 'Kata sandi baru minimal harus 6 karakter.'], 400);
    }

    $hash = password_hash($newPass, PASSWORD_DEFAULT);
    $pdo->prepare("UPDATE users SET password = ? WHERE id = ?")->execute([$hash, $userId]);

    sendJson([
        'status'  => 'success',
        'message' => 'Kata sandi akun berhasil diperbarui.'
    ]);
}

// ============================================================================
// 2. SET PIN REKAM MEDIS 6 DIGIT (`set_pin`)
// ============================================================================
if ($action === 'set_pin') {
    $pin = trim((string)($body['medical_pin'] ?? ''));
    if (!preg_match('/^\d{6}$/', $pin)) {
        sendJson(['status' => 'error', 'message' => 'PIN Rekam Medis harus terdiri dari 6 digit angka.'], 400);
    }

    $pdo->prepare("UPDATE users SET medical_pin = ? WHERE id = ?")->execute([$pin, $userId]);

    sendJson([
        'status'  => 'success',
        'message' => 'PIN Rekam Medis 6 digit berhasil disimpan.'
    ]);
}

// ============================================================================
// 3. TOGGLE VERIFIKASI 2 LANGKAH / 2FA (`toggle_2fa`)
// ============================================================================
if ($action === 'toggle_2fa') {
    $enabled   = !empty($body['enabled']) ? 1 : 0;
    $twoMethod = trim((string)($body['method'] ?? 'SMS / WhatsApp ke Nomor Terdaftar'));

    $pdo->prepare("UPDATE users SET two_factor_enabled = ?, two_factor_method = ? WHERE id = ?")->execute([$enabled, $twoMethod, $userId]);

    sendJson([
        'status'             => 'success',
        'message'            => 'Pengaturan Verifikasi 2 Langkah berhasil diperbarui.',
        'two_factor_enabled' => $enabled,
        'two_factor_method'  => $twoMethod
    ]);
}

// ============================================================================
// 4. MODUL KELOLA AKUN DOKTER & PASIEN (KHUSUS ADMIN - BLUEPRINT 5.A)
// ============================================================================
if ($action === 'list_dokter' || ($method === 'GET' && $action === 'users')) {
    $docStmt = $pdo->query("
        SELECT id, no_rm, nama_lengkap, email, no_hp, role, spesialisasi, no_str, rumah_sakit, status_aktif, created_at
        FROM users
        WHERE role = 'dokter'
        ORDER BY id DESC
    ");
    $dokterList = $docStmt ? $docStmt->fetchAll() : [];

    $pasStmt = $pdo->query("
        SELECT id, no_rm, nama_lengkap, email, no_hp, role, tanggal_lahir, jenis_kelamin, alamat, status_aktif, created_at
        FROM users
        WHERE role = 'pasien'
        ORDER BY id DESC
    ");
    $pasienList = $pasStmt ? $pasStmt->fetchAll() : [];

    sendJson([
        'status' => 'success',
        'dokter' => $dokterList,
        'pasien' => $pasienList
    ]);
}

if ($action === 'create_dokter' && $method === 'POST') {
    if ($role !== 'admin') {
        sendJson(['status' => 'error', 'message' => 'Hanya Admin yang dapat mendaftarkan akun Dokter baru.'], 403);
    }

    $namaLengkap  = trim((string)($body['nama_lengkap'] ?? ''));
    $email        = strtolower(trim((string)($body['email'] ?? '')));
    $password     = (string)($body['password'] ?? '');
    $noHp         = trim((string)($body['no_hp'] ?? '-'));
    $spesialisasi = trim((string)($body['spesialisasi'] ?? ''));
    $noStr        = trim((string)($body['no_str'] ?? ''));
    $rumahSakit   = trim((string)($body['rumah_sakit'] ?? 'RS Mitra Sehatin'));

    if ($namaLengkap === '' || $email === '' || strlen($password) < 6 || $spesialisasi === '' || $noStr === '') {
        sendJson([
            'status'  => 'error',
            'message' => 'Nama Dokter, Email, Password (min. 6 karakter), Spesialisasi, dan Nomor STR wajib diisi lengkap.'
        ], 400);
    }

    $chk = $pdo->prepare("SELECT id FROM users WHERE LOWER(email) = LOWER(?) OR no_str = ? LIMIT 1");
    $chk->execute([$email, $noStr]);
    if ($chk->fetch()) {
        sendJson(['status' => 'error', 'message' => 'Email atau Nomor STR Dokter sudah terdaftar.'], 409);
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $ins  = $pdo->prepare("
        INSERT INTO users (no_rm, nama_lengkap, email, password, no_hp, role, spesialisasi, no_str, rumah_sakit, status_aktif)
        VALUES (?, ?, ?, ?, ?, 'dokter', ?, ?, ?, 1)
    ");
    $ins->execute([$noStr, $namaLengkap, $email, $hash, $noHp, $spesialisasi, $noStr, $rumahSakit]);

    sendJson([
        'status'    => 'success',
        'message'   => 'Akun Dokter baru berhasil didaftarkan.',
        'dokter_id' => (int)$pdo->lastInsertId()
    ], 201);
}

if (in_array($action, ['toggle_status_dokter', 'toggle_status_user'], true)) {
    if ($role !== 'admin') {
        sendJson(['status' => 'error', 'message' => 'Hanya Admin yang dapat mengubah status aktif akun.'], 403);
    }

    $targetId = (int)($body['user_id'] ?? ($body['dokter_id'] ?? ($body['id'] ?? 0)));
    if ($targetId <= 0) {
        sendJson(['status' => 'error', 'message' => 'ID Akun tidak valid.'], 400);
    }

    $uStmt = $pdo->prepare("SELECT id, role, status_aktif FROM users WHERE id = ? LIMIT 1");
    $uStmt->execute([$targetId]);
    $targetUser = $uStmt->fetch();

    if (!$targetUser) {
        sendJson(['status' => 'error', 'message' => 'Akun tidak ditemukan.'], 404);
    }

    if ($targetUser['role'] === 'admin') {
        sendJson(['status' => 'error', 'message' => 'Akun tetap Admin tidak dapat dinonaktifkan.'], 403);
    }

    $newStatus = isset($body['status_aktif'])
        ? ((int)$body['status_aktif'] ? 1 : 0)
        : ((int)$targetUser['status_aktif'] === 1 ? 0 : 1);

    $pdo->prepare("UPDATE users SET status_aktif = ? WHERE id = ?")->execute([$newStatus, $targetId]);

    sendJson([
        'status'       => 'success',
        'message'      => $newStatus === 1 ? 'Akun berhasil diaktifkan.' : 'Akun berhasil dinonaktifkan.',
        'user_id'      => $targetId,
        'status_aktif' => $newStatus
    ]);
}

sendJson(['status' => 'error', 'message' => 'Aksi pada api/keamanan.php tidak dikenali.'], 400);
?>