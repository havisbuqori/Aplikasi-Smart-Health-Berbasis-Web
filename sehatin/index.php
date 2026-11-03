<?php
/**
 * FILE UTAMA: index.php
 * Router & Entry Point Sistem Terintegrasi Sehatin (Pasien - Dokter - Admin)
 *
 * Logika Redirect Otomatis Berdasarkan Session Role (Blueprint Bagian 3.B):
 * - Jika belum login        -> Tampilkan halaman login (`features/aktif/login.php`)
 * - Jika `role == 'pasien'` -> Arahkan otomatis ke `dashboard_utama.php` (Tampilan asli pasien tidak diubah)
 * - Jika `role == 'dokter'` -> Arahkan otomatis ke `dashboard_dokter.php`
 * - Jika `role == 'admin'`  -> Arahkan otomatis ke `dashboard_admin.php`
 */
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('display_errors', '0');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function sehatin_include($relPath) {
    $fullPath = __DIR__ . '/' . ltrim($relPath, '/');
    if (file_exists($fullPath)) {
        include $fullPath;
    }
}

$isLoggedIn  = !empty($_SESSION['user_id']) && !empty($_SESSION['role']);
$sessionRole = $isLoggedIn ? strtolower(trim((string)$_SESSION['role'])) : '';
if ($sessionRole === 'user') {
    $sessionRole = 'pasien';
}
$sessionNama = $isLoggedIn ? (string)($_SESSION['nama'] ?? 'Pengguna Sehatin') : '';

// Peta halaman dashboard resmi berdasarkan role di session
$rolePageMap = [
    'pasien' => 'dashboard_utama',
    'dokter' => 'dashboard_dokter',
    'admin'  => 'dashboard_admin'
];

$requestedPage = isset($_GET['page']) ? strtolower(trim((string)$_GET['page'])) : '';

if ($isLoggedIn) {
    $expectedPage = $rolePageMap[$sessionRole] ?? 'dashboard_utama';
    // Redirect otomatis ke halaman dashboard yang sesuai dengan role apabila parameter page belum sesuai
    if ($requestedPage !== $expectedPage) {
        header('Location: index.php?page=' . $expectedPage);
        exit;
    }
} else {
    // Jika belum login tetapi mencoba mengakses halaman dashboard secara langsung, kembalikan ke login
    if ($requestedPage !== '' && $requestedPage !== 'login') {
        header('Location: index.php');
        exit;
    }
}

// Kompatibilitas variabel role untuk script frontend (`pasien` pada DB -> `user` pada selector UI pasien asli)
$frontendRoleKey = ($sessionRole === 'pasien') ? 'user' : $sessionRole;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehatin - Sistem Layanan Kesehatan Terintegrasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <script>
        window.SEHATIN_SESSION = <?php echo json_encode([
            'authenticated' => $isLoggedIn,
            'user_id'       => $isLoggedIn ? (int)$_SESSION['user_id'] : null,
            'role'          => $sessionRole,
            'ui_role'       => $frontendRoleKey,
            'nama'          => $sessionNama,
            'email'         => $isLoggedIn ? ($_SESSION['email'] ?? '') : '',
            'active_page'   => $isLoggedIn ? ($rolePageMap[$sessionRole] ?? 'dashboard_utama') : 'login'
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>;
    </script>
</head>
<body class="bg-slate-100 min-h-screen flex flex-col justify-between text-gray-800">

    <div class="w-full min-h-screen flex flex-col relative">

        <!-- 1. MODUL LOGIN & REGISTRASI PASIEN BARU (CENTERED MINIMALIST CARD) -->
        <?php sehatin_include('features/aktif/login.php'); ?>

        <!-- 2. CONTAINER DASHBOARD & MODUL PER FITUR -->
        <div id="dashboardView" class="<?php echo $isLoggedIn ? '' : 'hidden '; ?>flex-1 flex flex-col md:flex-row min-h-screen bg-slate-100">

            <!-- Sidebar Navigasi Laptop/Desktop (Struktur Asli Pasien Dipertahankan) -->
            <?php sehatin_include('features/aktif/sidebar_nav.php'); ?>

            <!-- Area Konten Utama -->
            <div class="flex-1 flex flex-col min-w-0 pb-20 md:pb-8">

                <!-- Header Utama Dashboard (Struktur Asli Pasien Dipertahankan) -->
                <?php sehatin_include('features/aktif/header_utama.php'); ?>

                <!-- Modul Dashboard Berdasarkan Role Session (`pasien` -> dashboard_utama.php, `dokter` -> dashboard_dokter.php, `admin` -> dashboard_admin.php) -->
                <?php sehatin_include('features/aktif/dashboard_utama.php'); ?>
                <?php sehatin_include('features/aktif/dashboard_dokter.php'); ?>
                <?php sehatin_include('features/aktif/dashboard_admin.php'); ?>

                <!-- Modul Fitur Aktif Pasien (100% Tidak Diubah Secara Visual Sesuai Blueprint 1.A) -->
                <?php sehatin_include('features/aktif/profil_saya.php'); ?>
                <?php sehatin_include('features/aktif/chat_dokter.php'); ?>
                <?php sehatin_include('features/aktif/keamanan_akun.php'); ?>
                <?php sehatin_include('features/aktif/resep_obat.php'); ?>
                <?php sehatin_include('features/aktif/jadwal_dokter.php'); ?>
                <?php sehatin_include('features/aktif/hasil_lab.php'); ?>

                <!-- Modul Fitur Tambahan Pasien (100% Tidak Diubah Secara Visual Sesuai Blueprint 1.A) -->
                <?php sehatin_include('features/belum_diisi/diagnosis.php'); ?>
                <?php sehatin_include('features/belum_diisi/edukasi_kesehatan.php'); ?>
                <?php sehatin_include('features/belum_diisi/healthy_tracker.php'); ?>
                <?php sehatin_include('features/belum_diisi/notifikasi.php'); ?>

            </div>

            <!-- Navigasi Bawah Khusus HP (Struktur Asli Pasien Dipertahankan) -->
            <?php sehatin_include('features/aktif/bottom_nav_hp.php'); ?>

        </div>

        <!-- 3. MODUL MODAL INTERAKSI PENGGUNA -->
        <?php sehatin_include('features/aktif/modals_dan_bantuan_ai.php'); ?>

    </div>

    <!-- Script Koneksi API XAMPP & Logika Aplikasi -->
    <script src="assets/js/api.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- Sinkronisasi Routing Otomatis Berdasarkan Session PHP -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sess = window.SEHATIN_SESSION || {};
            const loginViewEl = document.getElementById('loginView');
            const dashboardViewEl = document.getElementById('dashboardView');
            const mainDashEl = document.getElementById('mainDashboardSubView');
            const docDashEl = document.getElementById('doctorRoleDashboardSubView');
            const adminDashEl = document.getElementById('adminRoleDashboardSubView');

            if (sess.authenticated && sess.role) {
                if (loginViewEl) loginViewEl.classList.add('hidden');
                if (dashboardViewEl) dashboardViewEl.classList.remove('hidden');

                if (sess.role === 'dokter') {
                    if (mainDashEl) mainDashEl.classList.add('hidden');
                    if (adminDashEl) adminDashEl.classList.add('hidden');
                    if (docDashEl) docDashEl.classList.remove('hidden');
                } else if (sess.role === 'admin') {
                    if (mainDashEl) mainDashEl.classList.add('hidden');
                    if (docDashEl) docDashEl.classList.add('hidden');
                    if (adminDashEl) adminDashEl.classList.remove('hidden');
                } else {
                    if (docDashEl) docDashEl.classList.add('hidden');
                    if (adminDashEl) adminDashEl.classList.add('hidden');
                    if (mainDashEl) mainDashEl.classList.remove('hidden');
                }
            } else {
                if (loginViewEl) loginViewEl.classList.remove('hidden');
                if (dashboardViewEl) dashboardViewEl.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
