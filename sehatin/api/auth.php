<?php
/**
 * FILE: api/auth.php
 * Endpoint Otentikasi & Sinkronisasi Data Terpusat Sistem Sehatin
 * - Login Multi-Role Otomatis (Pasien, Dokter, Admin dideteksi dari tabel `users`)
 * - Registrasi Halaman Depan Terkunci Khusus Pasien (`role = 'pasien'`)
 * - Proteksi Ketat Kuota Admin (Maksimal 2 Akun Admin)
 * - Endpoint `status`: Mengembalikan seluruh data relasional (Jadwal, Konsultasi, Resep, Lab, Chat) dari MySQL
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

function getRedirectTargetByRole($role) {
    $role = strtolower(trim((string)$role));
    if ($role === 'admin') {
        return [
            'url'         => 'index.php?page=dashboard_admin',
            'target_file' => 'features/aktif/dashboard_admin.php',
            'view_id'     => 'adminRoleDashboardSubView'
        ];
    }
    if ($role === 'dokter') {
        return [
            'url'         => 'index.php?page=dashboard_dokter',
            'target_file' => 'features/aktif/dashboard_dokter.php',
            'view_id'     => 'doctorRoleDashboardSubView'
        ];
    }
    return [
        'url'         => 'index.php?page=dashboard_utama',
        'target_file' => 'features/aktif/dashboard_utama.php',
        'view_id'     => 'mainDashboardSubView'
    ];
}

function formatUserPayload(array $u) {
    $roleNormalized = strtolower(trim($u['role'] ?? 'pasien'));
    return [
        'id'                 => (int)$u['id'],
        'no_rm'              => $u['no_rm'] ?? ('RM-' . str_pad((string)$u['id'], 4, '0', STR_PAD_LEFT)),
        'rm_number'          => $u['no_rm'] ?? ('RM-' . str_pad((string)$u['id'], 4, '0', STR_PAD_LEFT)),
        'nama_lengkap'       => $u['nama_lengkap'] ?? '',
        'full_name'          => $u['nama_lengkap'] ?? '',
        'email'              => $u['email'] ?? '',
        'identifier'         => $u['email'] ?? '',
        'no_hp'              => $u['no_hp'] ?? '-',
        'phone'              => $u['no_hp'] ?? '-',
        'role'               => $roleNormalized,
        'spesialisasi'       => $u['spesialisasi'] ?? null,
        'specialty'          => $u['spesialisasi'] ?? null,
        'no_str'             => $u['no_str'] ?? null,
        'rumah_sakit'        => $u['rumah_sakit'] ?? null,
        'hospital'           => $u['rumah_sakit'] ?? null,
        'tanggal_lahir'      => $u['tanggal_lahir'] ?? '-',
        'birth_date'         => $u['tanggal_lahir'] ?? '-',
        'jenis_kelamin'      => $u['jenis_kelamin'] ?? '-',
        'gender'             => $u['jenis_kelamin'] ?? '-',
        'alamat'             => $u['alamat'] ?? '-',
        'address'            => $u['alamat'] ?? '-',
        'avatar_icon'        => $u['avatar_icon'] ?? 'fa-user-alt',
        'avatar_img'         => $u['avatar_img'] ?? null,
        'medical_pin'        => !empty($u['medical_pin']) ? 'SET' : null,
        'two_factor_enabled' => isset($u['two_factor_enabled']) ? (int)$u['two_factor_enabled'] : 0,
        'two_factor_method'  => $u['two_factor_method'] ?? 'SMS / WhatsApp ke Nomor Terdaftar',
        'status_aktif'       => isset($u['status_aktif']) ? (int)$u['status_aktif'] : 1
    ];
}

$method = $_SERVER['REQUEST_METHOD'];
$body   = getJsonBody();
$action = $_GET['action'] ?? ($body['action'] ?? 'status');
$isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
          || (isset($_SERVER['CONTENT_TYPE']) && stripos($_SERVER['CONTENT_TYPE'], 'application/json') !== false);

// 1. REGISTRASI PASIEN BARU (HARDCODED `role = 'pasien'`)
if ($action === 'register' && $method === 'POST') {
    $requestedRole = strtolower(trim((string)($body['role'] ?? 'pasien')));
    if ($requestedRole === 'admin') {
        sendJson([
            'status'  => 'error',
            'message' => 'Akses Ditolak: Pembuatan akun Admin baru dilarang. Jumlah Admin dikunci maksimal 2 akun tetap.'
        ], 403);
    }
    if ($requestedRole === 'dokter') {
        sendJson([
            'status'  => 'error',
            'message' => 'Akses Ditolak: Akun Dokter hanya dapat didaftarkan oleh Admin melalui Dashboard Admin.'
        ], 403);
    }

    $namaLengkap = trim((string)($body['nama_lengkap'] ?? ($body['full_name'] ?? '')));
    $email       = strtolower(trim((string)($body['email'] ?? ($body['identifier'] ?? ''))));
    $noHp        = trim((string)($body['no_hp'] ?? ($body['phone'] ?? '')));
    $password    = (string)($body['password'] ?? '');

    if ($namaLengkap === '' || $email === '' || $noHp === '' || $password === '') {
        sendJson(['status' => 'error', 'message' => 'Mohon lengkapi Nama Lengkap, Email, Nomor HP, dan Password.'], 400);
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        sendJson(['status' => 'error', 'message' => 'Format alamat email tidak valid.'], 400);
    }
    if (strlen($password) < 6) {
        sendJson(['status' => 'error', 'message' => 'Password minimal harus terdiri dari 6 karakter.'], 400);
    }

    $chkStmt = $pdo->prepare("SELECT id FROM users WHERE LOWER(email) = LOWER(?) LIMIT 1");
    $chkStmt->execute([$email]);
    if ($chkStmt->fetch()) {
        sendJson(['status' => 'error', 'message' => 'Alamat email sudah terdaftar. Silakan masuk menggunakan akun Anda.'], 409);
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $noRm         = 'RM-' . date('Y') . '-' . random_int(1000, 9999);

    $insStmt = $pdo->prepare("
        INSERT INTO users (no_rm, nama_lengkap, email, password, no_hp, role, status_aktif)
        VALUES (?, ?, ?, ?, ?, 'pasien', 1)
    ");
    $insStmt->execute([$noRm, $namaLengkap, $email, $passwordHash, $noHp]);
    $newUserId = (int)$pdo->lastInsertId();

    $pdo->prepare("INSERT IGNORE INTO profil_medis (pasien_id) VALUES (?)")->execute([$newUserId]);

    $uStmt = $pdo->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
    $uStmt->execute([$newUserId]);
    $newUser = $uStmt->fetch();

    sendJson([
        'status'  => 'success',
        'message' => 'Registrasi pasien berhasil. Silakan masuk menggunakan email dan password Anda.',
        'user_id' => $newUserId,
        'user'    => formatUserPayload($newUser)
    ], 201);
}

// 2. LOGIN MULTI-ROLE OTOMATIS
if ($action === 'login' && $method === 'POST') {
    $emailInput = trim((string)($body['email'] ?? ($body['identifier'] ?? '')));
    $password   = (string)($body['password'] ?? '');

    if ($emailInput === '' || $password === '') {
        sendJson(['status' => 'error', 'message' => 'Email dan Password wajib diisi.'], 400);
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE LOWER(email) = LOWER(?) OR no_hp = ? LIMIT 1");
    $stmt->execute([$emailInput, $emailInput]);
    $user = $stmt->fetch();

    if (!$user) {
        sendJson(['status' => 'error', 'message' => 'Akun dengan email tersebut tidak ditemukan.'], 404);
    }
    if (isset($user['status_aktif']) && (int)$user['status_aktif'] === 0) {
        sendJson(['status' => 'error', 'message' => 'Akun Anda sedang dinonaktifkan oleh Administrator.'], 403);
    }
    if (!password_verify($password, $user['password'])) {
        sendJson(['status' => 'error', 'message' => 'Password yang Anda masukkan salah.'], 401);
    }

    $detectedRole = strtolower(trim($user['role'] ?? 'pasien'));
    if ($detectedRole === 'user') {
        $detectedRole = 'pasien';
    }

    $_SESSION['user_id'] = (int)$user['id'];
    $_SESSION['role']    = $detectedRole;
    $_SESSION['nama']    = $user['nama_lengkap'];
    $_SESSION['email']   = $user['email'];

    $redirectInfo  = getRedirectTargetByRole($detectedRole);
    $formattedUser = formatUserPayload($user);

    if (!$isAjax && isset($_POST['direct_submit'])) {
        header('Location: ../' . $redirectInfo['url']);
        exit;
    }

    sendJson([
        'status'      => 'success',
        'message'     => 'Login berhasil.',
        'role'        => $detectedRole,
        'redirect'    => $redirectInfo['url'],
        'target_file' => $redirectInfo['target_file'],
        'view_id'     => $redirectInfo['view_id'],
        'session'     => [
            'user_id' => $_SESSION['user_id'],
            'role'    => $_SESSION['role'],
            'nama'    => $_SESSION['nama']
        ],
        'user'        => $formattedUser
    ]);
}

// 3. PEMBUATAN AKUN DOKTER OLEH ADMIN
if ($action === 'create_dokter' && $method === 'POST') {
    if (empty($_SESSION['user_id']) || ($_SESSION['role'] ?? '') !== 'admin') {
        sendJson(['status' => 'error', 'message' => 'Hanya Admin yang dapat mendaftarkan akun Dokter.'], 403);
    }
    if (strtolower(trim((string)($body['role'] ?? 'dokter'))) === 'admin') {
        sendJson(['status' => 'error', 'message' => 'Penolakan Keamanan: Tidak dapat menambahkan akun Admin baru (maksimal 2 akun Admin).'], 403);
    }

    $namaLengkap  = trim((string)($body['nama_lengkap'] ?? ($body['doctor_name'] ?? '')));
    $email        = strtolower(trim((string)($body['email'] ?? '')));
    $password     = (string)($body['password'] ?? 'dokter123');
    $noHp         = trim((string)($body['no_hp'] ?? '-'));
    $spesialisasi = trim((string)($body['spesialisasi'] ?? ($body['specialty'] ?? 'Dokter Spesialis')));
    $noStr        = trim((string)($body['no_str'] ?? ('STR-' . date('Y') . '-' . random_int(1000, 9999))));
    $rumahSakit   = trim((string)($body['rumah_sakit'] ?? ($body['hospital'] ?? 'RS Mitra Sehatin')));

    if ($namaLengkap === '' || $email === '' || strlen($password) < 6 || $spesialisasi === '' || $noStr === '') {
        sendJson(['status' => 'error', 'message' => 'Data Dokter (Nama, Email, Password min. 6 karakter, Spesialisasi, dan No. STR) wajib diisi lengkap.'], 400);
    }

    $chk = $pdo->prepare("SELECT id FROM users WHERE LOWER(email) = LOWER(?) OR no_str = ? LIMIT 1");
    $chk->execute([$email, $noStr]);
    if ($chk->fetch()) {
        sendJson(['status' => 'error', 'message' => 'Email atau Nomor STR Dokter sudah terdaftar di database.'], 409);
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $ins  = $pdo->prepare("
        INSERT INTO users (no_rm, nama_lengkap, email, password, no_hp, role, spesialisasi, no_str, rumah_sakit, status_aktif)
        VALUES (?, ?, ?, ?, ?, 'dokter', ?, ?, ?, 1)
    ");
    $ins->execute([$noStr, $namaLengkap, $email, $hash, $noHp, $spesialisasi, $noStr, $rumahSakit]);

    sendJson([
        'status'    => 'success',
        'message'   => 'Akun Dokter berhasil didaftarkan oleh Admin.',
        'dokter_id' => (int)$pdo->lastInsertId()
    ], 201);
}

// 4. LOGOUT
if ($action === 'logout') {
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
    session_destroy();
    sendJson(['status' => 'success', 'message' => 'Anda telah keluar dari sesi.', 'redirect' => 'index.php']);
}

// 5. CEK SESSION AKTIF & SINKRONISASI SELURUH DATA RELASIONAL (`action = status`)
$sessionUserId = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;
if ($sessionUserId <= 0) {
    sendJson(['status' => 'unauthenticated'], 200);
}

$uStmt = $pdo->prepare("SELECT * FROM users WHERE id = ? AND status_aktif = 1 LIMIT 1");
$uStmt->execute([$sessionUserId]);
$currentUser = $uStmt->fetch();

if (!$currentUser) {
    $_SESSION = [];
    session_destroy();
    sendJson(['status' => 'unauthenticated'], 200);
}

$activeRole = strtolower(trim($currentUser['role'] ?? 'pasien'));
$_SESSION['role'] = $activeRole;
$_SESSION['nama'] = $currentUser['nama_lengkap'];

$redirectInfo  = getRedirectTargetByRole($activeRole);
$formattedUser = formatUserPayload($currentUser);

// A. Profil Medis & Alamat Pasien
$medStmt = $pdo->prepare("SELECT * FROM profil_medis WHERE pasien_id = ? LIMIT 1");
$medStmt->execute([$sessionUserId]);
$medRow = $medStmt->fetch() ?: [];

$medicalData = [
    'blood_type'     => $medRow['golongan_darah'] ?? '-',
    'height_cm'      => isset($medRow['tinggi_badan']) ? (float)$medRow['tinggi_badan'] : 0,
    'weight_kg'      => isset($medRow['berat_badan']) ? (float)$medRow['berat_badan'] : 0,
    'bmi_value'      => isset($medRow['imt_nilai']) ? (float)$medRow['imt_nilai'] : 0,
    'bmi_status'     => $medRow['imt_status'] ?? 'Belum Diisi',
    'allergy'        => $medRow['riwayat_alergi'] ?? 'Tidak Ada',
    'medical_notes'  => $medRow['riwayat_medis'] ?? '',
    'blood_pressure' => $medRow['tekanan_darah'] ?? '-'
];

// B. Direktori Dokter Terdaftar (`users.role = 'dokter'`) & Jadwal Praktik (`jadwal_dokter`)
$docUsersStmt = $pdo->query("
    SELECT u.id, u.no_rm, u.nama_lengkap, u.email, u.no_hp, u.spesialisasi, u.no_str, u.rumah_sakit, u.status_aktif,
           j.id AS jadwal_id, j.hari, TIME_FORMAT(j.jam_mulai, '%H:%i') AS jam_mulai,
           TIME_FORMAT(j.jam_selesai, '%H:%i') AS jam_selesai, j.kuota, j.status_tersedia
    FROM users u
    LEFT JOIN jadwal_dokter j ON j.dokter_id = u.id AND j.status_tersedia = 1
    WHERE u.role = 'dokter' AND u.status_aktif = 1
    ORDER BY u.nama_lengkap ASC
");
$docRows = $docUsersStmt ? $docUsersStmt->fetchAll() : [];
$consultDoctorsMap = [];
foreach ($docRows as $dr) {
    $dId = (int)$dr['id'];
    $jamLabel = ($dr['hari'] && $dr['jam_mulai'] && $dr['jam_selesai'])
        ? ($dr['hari'] . ' ' . $dr['jam_mulai'] . ' - ' . $dr['jam_selesai'] . ' WIB')
        : 'Jadwal Praktik Fleksibel';
    if (!isset($consultDoctorsMap[$dId])) {
        $consultDoctorsMap[$dId] = [
            'id'               => $dId,
            'dokter_id'        => $dId,
            'jadwal_id'        => $dr['jadwal_id'] ? (int)$dr['jadwal_id'] : null,
            'doctor_name'      => $dr['nama_lengkap'],
            'specialty'        => $dr['spesialisasi'] ?? 'Dokter Spesialis',
            'hospital'         => $dr['rumah_sakit'] ?? 'RS Mitra Sehatin',
            'practice_hours'   => $jamLabel,
            'experience_years' => 'No. STR: ' . ($dr['no_str'] ?? '-'),
            'status_online'    => 'Aktif Praktik'
        ];
    }
}
$consultationDoctors = array_values($consultDoctorsMap);

// C. Data Konsultasi (Jadwal Booking Aktif & Riwayat Konsultasi)
$konsulWhere  = "1=1";
$konsulParams = [];
if ($activeRole === 'pasien') {
    $konsulWhere  = "k.pasien_id = ?";
    $konsulParams = [$sessionUserId];
} elseif ($activeRole === 'dokter') {
    $konsulWhere  = "k.dokter_id = ?";
    $konsulParams = [$sessionUserId];
}

$konsulStmt = $pdo->prepare("
    SELECT k.*, p.nama_lengkap AS nama_pasien, p.no_rm AS no_rm_pasien, p.no_hp AS no_hp_pasien,
           d.nama_lengkap AS nama_dokter, d.spesialisasi, d.rumah_sakit,
           j.hari, TIME_FORMAT(j.jam_mulai, '%H:%i') AS jam_mulai, TIME_FORMAT(j.jam_selesai, '%H:%i') AS jam_selesai
    FROM konsultasi k
    INNER JOIN users p ON p.id = k.pasien_id
    INNER JOIN users d ON d.id = k.dokter_id
    LEFT JOIN jadwal_dokter j ON j.id = k.jadwal_id
    WHERE $konsulWhere
    ORDER BY k.id DESC
");
$konsulStmt->execute($konsulParams);
$konsulRows = $konsulStmt->fetchAll();

$schedules             = [];
$consultationHistories = [];
foreach ($konsulRows as $kr) {
    $jamStr = ($kr['jam_mulai'] && $kr['jam_selesai'])
        ? ($kr['jam_mulai'] . ' - ' . $kr['jam_selesai'] . ' WIB')
        : date('H:i', strtotime($kr['created_at'])) . ' WIB';

    $itemData = [
        'id'               => (int)$kr['id'],
        'konsultasi_id'    => (int)$kr['id'],
        'pasien_id'        => (int)$kr['pasien_id'],
        'dokter_id'        => (int)$kr['dokter_id'],
        'jadwal_id'        => $kr['jadwal_id'] ? (int)$kr['jadwal_id'] : null,
        'nama_pasien'      => $kr['nama_pasien'],
        'no_rm_pasien'     => $kr['no_rm_pasien'] ?? '-',
        'doctor_name'      => $kr['nama_dokter'],
        'specialty'        => $kr['spesialisasi'] ?? 'Dokter Spesialis',
        'schedule_date'    => $kr['tanggal_booking'],
        'schedule_time'    => $jamStr,
        'consult_date'     => $kr['tanggal_booking'],
        'consult_time'     => $jamStr,
        'consult_type'     => 'Konsultasi Dokter (' . strtoupper(str_replace('_', ' ', $kr['status'])) . ')',
        'complaint_notes'  => $kr['keluhan_awal'],
        'complaint'        => $kr['keluhan_awal'],
        'diagnosis_notes'  => $kr['diagnosis_dokter'] ?? 'Menunggu pemeriksaan dokter',
        'diagnosis_dokter' => $kr['diagnosis_dokter'] ?? '',
        'followup_action'  => $kr['status'] === 'selesai' ? 'Pemeriksaan Selesai' : 'Sesuai instruksi dokter',
        'status'           => $kr['status']
    ];

    if ($kr['status'] === 'aktif') {
        $schedules[] = $itemData;
    }
    if ($kr['status'] === 'selesai' || !empty($kr['diagnosis_dokter'])) {
        $consultationHistories[] = $itemData;
    }
}

// D. Resep Obat (`resep_obat` JOIN `master_obat`)
$resepWhere  = "1=1";
$resepParams = [];
if ($activeRole === 'pasien') {
    $resepWhere  = "r.pasien_id = ?";
    $resepParams = [$sessionUserId];
} elseif ($activeRole === 'dokter') {
    $resepWhere  = "r.dokter_id = ?";
    $resepParams = [$sessionUserId];
}
$resepStmt = $pdo->prepare("
    SELECT r.*, m.nama_obat, m.satuan, d.nama_lengkap AS nama_dokter, p.nama_lengkap AS nama_pasien
    FROM resep_obat r
    INNER JOIN master_obat m ON m.id = r.obat_id
    INNER JOIN users d ON d.id = r.dokter_id
    INNER JOIN users p ON p.id = r.pasien_id
    WHERE $resepWhere
    ORDER BY r.id DESC
");
$resepStmt->execute($resepParams);
$prescriptions = [];
foreach ($resepStmt->fetchAll() as $rr) {
    $prescriptions[] = [
        'id'           => (int)$rr['id'],
        'resep_id'     => (int)$rr['id'],
        'obat_id'      => (int)$rr['obat_id'],
        'pasien_id'    => (int)$rr['pasien_id'],
        'dokter_id'    => (int)$rr['dokter_id'],
        'med_name'     => $rr['nama_obat'],
        'nama_obat'    => $rr['nama_obat'],
        'doctor_name'  => $rr['nama_dokter'],
        'nama_pasien'  => $rr['nama_pasien'],
        'usage_rule'   => $rr['dosis'] . ($rr['catatan_dokter'] ? ' (' . $rr['catatan_dokter'] . ')' : ''),
        'dosis'        => $rr['dosis']
    ];
}

// E. Hasil Lab (`hasil_lab`)
$labWhere  = "1=1";
$labParams = [];
if ($activeRole === 'pasien') {
    $labWhere  = "l.pasien_id = ?";
    $labParams = [$sessionUserId];
} elseif ($activeRole === 'dokter') {
    $labWhere  = "l.dokter_pengirim_id = ?";
    $labParams = [$sessionUserId];
}
$labStmt = $pdo->prepare("
    SELECT l.*, p.nama_lengkap AS nama_pasien, d.nama_lengkap AS nama_dokter
    FROM hasil_lab l
    INNER JOIN users p ON p.id = l.pasien_id
    LEFT JOIN users d ON d.id = l.dokter_pengirim_id
    WHERE $labWhere
    ORDER BY l.id DESC
");
$labStmt->execute($labParams);
$labs = [];
foreach ($labStmt->fetchAll() as $lr) {
    $labs[] = [
        'id'              => (int)$lr['id'],
        'pasien_id'       => (int)$lr['pasien_id'],
        'nama_pasien'     => $lr['nama_pasien'],
        'test_name'       => $lr['jenis_pemeriksaan'],
        'clinic_name'     => $lr['nama_dokter'] ? ('Dr. ' . $lr['nama_dokter']) : 'Laboratorium Sehatin',
        'result_value'    => $lr['hasil_ringkasan'],
        'tanggal_periksa' => $lr['tanggal_periksa'],
        'status_lab'      => $lr['status_lab']
    ];
}

// H. Pesan Chat (`chat_messages` pada sesi konsultasi aktif/terbaru)
$activeKonsulId = !empty($konsulRows) ? (int)$konsulRows[0]['id'] : 0;
$chats = [];
if ($activeKonsulId > 0) {
    $cStmt = $pdo->prepare("
        SELECT c.*, TIME_FORMAT(c.waktu_kirim, '%H:%i') AS jam_kirim, u.nama_lengkap, u.role AS sender_db_role
        FROM chat_messages c
        INNER JOIN users u ON u.id = c.pengirim_id
        WHERE c.konsultasi_id = ?
        ORDER BY c.id ASC
    ");
    $cStmt->execute([$activeKonsulId]);
    foreach ($cStmt->fetchAll() as $ch) {
        $chats[] = [
            'id'            => (int)$ch['id'],
            'konsultasi_id' => (int)$ch['konsultasi_id'],
            'sender_role'   => ($ch['sender_db_role'] === 'dokter') ? 'doctor' : 'patient',
            'sender_name'   => $ch['nama_lengkap'],
            'message_text'  => $ch['pesan'],
            'sent_time'     => $ch['jam_kirim']
        ];
    }
}

// I. Daftar Seluruh User & Master Obat (Untuk Sinkronisasi Panel Admin & Dokter)
$allUsersStmt = $pdo->query("SELECT * FROM users ORDER BY id ASC");
$allUsersRaw  = $allUsersStmt ? $allUsersStmt->fetchAll() : [];
$allUsers     = array_map('formatUserPayload', $allUsersRaw);

$obatStmt   = $pdo->query("SELECT * FROM master_obat ORDER BY nama_obat ASC");
$masterObat = $obatStmt ? $obatStmt->fetchAll() : [];

sendJson([
    'status'                 => 'success',
    'session'                => [
        'user_id' => $_SESSION['user_id'],
        'role'    => $_SESSION['role'],
        'nama'    => $_SESSION['nama']
    ],
    'redirect'               => $redirectInfo['url'],
    'target_file'            => $redirectInfo['target_file'],
    'user'                   => $formattedUser,
    'all_users'              => $allUsers,
    'master_obat'            => $masterObat,
    'active_konsultasi_id'   => $activeKonsulId > 0 ? $activeKonsulId : null,
    'medical'                => $medicalData,
    'prescriptions'          => $prescriptions,
    'schedules'              => $schedules,
    'labs'                   => $labs,
    'chats'                  => $chats,
    'consultation_doctors'   => $consultationDoctors,
    'consultation_histories' => $consultationHistories
]);
?>
