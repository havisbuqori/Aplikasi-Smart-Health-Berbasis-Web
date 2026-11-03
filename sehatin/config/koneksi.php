<?php
/**
 * FILE: config/koneksi.php
 * Koneksi Database MySQL XAMPP Sistem Terintegrasi Sehatin (Zero Dummy Data)
 * Otomatis menginisialisasi skema `database/db_sehatin.sql` (2 akun Admin tetap)
 * apabila database `db_sehatin` baru pertama kali dijalankan di XAMPP.
 */
error_reporting(0);
ini_set('display_errors', '0');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db_host = 'localhost';
$db_user = 'root';      // Default XAMPP user
$db_pass = '';          // Default XAMPP password kosong
$db_name = 'db_sehatin';

/**
 * Helper eksekusi file SQL yang mendukung blok DELIMITER trigger MySQL
 */
function executeSqlFileWithTriggers(PDO $pdo, string $sqlFilePath): void {
    if (!file_exists($sqlFilePath)) {
        return;
    }
    $sql = file_get_contents($sqlFilePath);
    if (!$sql) {
        return;
    }

    // Pisahkan blok DELIMITER $$ ... DELIMITER ;
    $parts = preg_split('/DELIMITER\s+(\S+)/i', $sql, -1, PREG_SPLIT_DELIM_CAPTURE);
    $currentDelimiter = ';';

    for ($i = 0; $i < count($parts); $i++) {
        if ($i % 2 === 1) {
            $currentDelimiter = $parts[$i];
            continue;
        }
        $chunk = $parts[$i];
        $statements = explode($currentDelimiter, $chunk);
        foreach ($statements as $stmt) {
            $trimmed = trim($stmt);
            if ($trimmed === '' || strpos($trimmed, '--') === 0) {
                // Hapus baris komentar di awal statement
                $lines = array_filter(explode("\n", $trimmed), function ($line) {
                    $l = trim($line);
                    return $l !== '' && strpos($l, '--') !== 0;
                });
                $trimmed = trim(implode("\n", $lines));
            }
            if ($trimmed !== '') {
                try {
                    $pdo->exec($trimmed);
                } catch (Exception $e) {
                    // Abaikan statement yang sudah dieksekusi
                }
            }
        }
    }
}

try {
    $pdo = new PDO("mysql:host=$db_host;charset=utf8mb4", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db_name` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE `$db_name`");

    // Cek apakah tabel `users` sudah menggunakan skema blueprint terbaru (memiliki kolom `email` dan tabel `master_obat`)
    $hasUsersTable = $pdo->query("SHOW TABLES LIKE 'users'")->fetch();
    $hasMasterObat = $pdo->query("SHOW TABLES LIKE 'master_obat'")->fetch();
    $hasEmailCol   = $hasUsersTable ? $pdo->query("SHOW COLUMNS FROM `users` LIKE 'email'")->fetch() : false;

    if (!$hasUsersTable || !$hasMasterObat || !$hasEmailCol) {
        $sqlFile = __DIR__ . '/../database/db_sehatin.sql';
        executeSqlFileWithTriggers($pdo, $sqlFile);
    }
} catch (PDOException $e) {
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(500);
    echo json_encode([
        'status'  => 'error',
        'message' => 'Koneksi MySQL XAMPP gagal: ' . $e->getMessage()
    ]);
    exit;
}

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
?>
