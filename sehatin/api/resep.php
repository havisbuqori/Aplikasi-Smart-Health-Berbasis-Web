<?php
/**
 * FILE: api/resep.php
 * Endpoint Terintegrasi Resep Obat & Master Obat (Admin -> Dokter -> Pasien)
 * - Modul `master_obat` (Dikelola Admin): CRUD katalog obat (`nama_obat`, `kategori`, `stok`, `satuan`)
 * - Modul `resep_obat` (Dibuat Dokter untuk Pasien):
 *   - POST buat resep oleh Dokter (`konsultasi_id`, `pasien_id`, `obat_id`, `dosis`, `catatan_dokter`) + update diagnosis
 *   - GET daftar resep oleh Pasien (`resep_obat.php`), Dokter, maupun Admin
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
// 1. MODUL MASTER OBAT (DIKELOLA ADMIN, DIBACA DOKTER & PASIEN)
// ============================================================================
if ($action === 'master_obat') {
    $stmt = $pdo->query("SELECT * FROM master_obat ORDER BY nama_obat ASC");
    $obatList = $stmt ? $stmt->fetchAll() : [];
    sendJson([
        'status'      => 'success',
        'master_obat' => $obatList
    ]);
}

if (in_array($action, ['add_obat', 'save_obat'], true) && $method === 'POST') {
    if ($role !== 'admin') {
        sendJson(['status' => 'error', 'message' => 'Hanya Admin yang dapat mengelola Master Obat.'], 403);
    }

    $obatId   = isset($body['id']) ? (int)$body['id'] : 0;
    $namaObat = trim((string)($body['nama_obat'] ?? ''));
    $kategori = trim((string)($body['kategori'] ?? 'Obat Resep'));
    $stok     = isset($body['stok']) ? max(0, (int)$body['stok']) : 0;
    $satuan   = trim((string)($body['satuan'] ?? 'Strip'));

    if ($namaObat === '') {
        sendJson(['status' => 'error', 'message' => 'Nama obat wajib diisi.'], 400);
    }

    if ($obatId > 0) {
        $upd = $pdo->prepare("
            UPDATE master_obat
            SET nama_obat = ?, kategori = ?, stok = ?, satuan = ?
            WHERE id = ?
        ");
        $upd->execute([$namaObat, $kategori, $stok, $satuan, $obatId]);
        sendJson(['status' => 'success', 'message' => 'Data obat berhasil diperbarui.', 'id' => $obatId]);
    } else {
        $ins = $pdo->prepare("
            INSERT INTO master_obat (nama_obat, kategori, stok, satuan)
            VALUES (?, ?, ?, ?)
        ");
        $ins->execute([$namaObat, $kategori, $stok, $satuan]);
        sendJson(['status' => 'success', 'message' => 'Obat baru berhasil ditambahkan ke Master Obat.', 'id' => (int)$pdo->lastInsertId()], 201);
    }
}

if ($action === 'delete_obat') {
    if ($role !== 'admin') {
        sendJson(['status' => 'error', 'message' => 'Hanya Admin yang dapat menghapus Master Obat.'], 403);
    }
    $obatId = (int)($body['id'] ?? ($_GET['id'] ?? 0));
    if ($obatId <= 0) {
        sendJson(['status' => 'error', 'message' => 'ID Obat tidak valid.'], 400);
    }
    try {
        $pdo->prepare("DELETE FROM master_obat WHERE id = ?")->execute([$obatId]);
        sendJson(['status' => 'success', 'message' => 'Obat berhasil dihapus dari Master Obat.']);
    } catch (Exception $e) {
        sendJson(['status' => 'error', 'message' => 'Obat tidak dapat dihapus karena sudah tercatat pada resep pasien.'], 409);
    }
}

// ============================================================================
// 2. GET DAFTAR RESEP OBAT (PASIEN, DOKTER, ADMIN)
// ============================================================================
if ($method === 'GET' || $action === 'list') {
    $whereClauses = ["1=1"];
    $params       = [];

    if ($role === 'pasien') {
        $whereClauses[] = "r.pasien_id = ?";
        $params[]       = $userId;
    } elseif ($role === 'dokter') {
        $whereClauses[] = "r.dokter_id = ?";
        $params[]       = $userId;
        if (!empty($_GET['pasien_id'])) {
            $whereClauses[] = "r.pasien_id = ?";
            $params[]       = (int)$_GET['pasien_id'];
        }
    } elseif (!empty($_GET['pasien_id'])) {
        $whereClauses[] = "r.pasien_id = ?";
        $params[]       = (int)$_GET['pasien_id'];
    }

    $whereSql = implode(' AND ', $whereClauses);

    $sql = "
        SELECT
            r.id,
            r.konsultasi_id,
            r.dokter_id,
            r.pasien_id,
            r.obat_id,
            r.dosis,
            r.catatan_dokter,
            r.created_at,
            m.nama_obat,
            m.kategori AS kategori_obat,
            m.stok AS stok_obat,
            m.satuan AS satuan_obat,
            d.nama_lengkap AS nama_dokter,
            d.spesialisasi AS spesialisasi_dokter,
            p.nama_lengkap AS nama_pasien,
            p.no_rm AS no_rm_pasien,
            k.diagnosis_dokter
        FROM resep_obat r
        INNER JOIN master_obat m ON m.id = r.obat_id
        INNER JOIN users d ON d.id = r.dokter_id
        INNER JOIN users p ON p.id = r.pasien_id
        LEFT JOIN konsultasi k ON k.id = r.konsultasi_id
        WHERE $whereSql
        ORDER BY r.id DESC
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $rows = $stmt->fetchAll();

    $resepList = [];
    foreach ($rows as $r) {
        $aturanPakai = $r['dosis'] . ($r['catatan_dokter'] ? ' (' . $r['catatan_dokter'] . ')' : '');
        $resepList[] = [
            'id'               => (int)$r['id'],
            'konsultasi_id'    => $r['konsultasi_id'] ? (int)$r['konsultasi_id'] : null,
            'dokter_id'        => (int)$r['dokter_id'],
            'pasien_id'        => (int)$r['pasien_id'],
            'obat_id'          => (int)$r['obat_id'],
            'nama_obat'        => $r['nama_obat'],
            'med_name'         => $r['nama_obat'],
            'kategori_obat'    => $r['kategori_obat'],
            'stok'             => (int)$r['stok_obat'],
            'satuan'           => $r['satuan_obat'],
            'dosis'            => $r['dosis'],
            'catatan_dokter'   => $r['catatan_dokter'] ?? '',
            'usage_rule'       => $aturanPakai,
            'nama_dokter'      => $r['nama_dokter'],
            'doctor_name'      => $r['nama_dokter'],
            'spesialisasi'     => $r['spesialisasi_dokter'] ?? 'Dokter Praktik',
            'nama_pasien'      => $r['nama_pasien'],
            'no_rm_pasien'     => $r['no_rm_pasien'] ?? '-',
            'diagnosis_dokter' => $r['diagnosis_dokter'] ?? '',
            'created_at'       => $r['created_at']
        ];
    }

    $obatStmt   = $pdo->query("SELECT * FROM master_obat ORDER BY nama_obat ASC");
    $masterObat = $obatStmt ? $obatStmt->fetchAll() : [];

    sendJson([
        'status'        => 'success',
        'resep'         => $resepList,
        'prescriptions' => $resepList,
        'master_obat'   => $masterObat
    ]);
}

// ============================================================================
// 3. POST BUAT RESEP OBAT & DIAGNOSIS OLEH DOKTER UNTUK PASIEN
// ============================================================================
if ($method === 'POST' && in_array($action, ['create', 'add'], true)) {
    if (!in_array($role, ['dokter', 'admin'], true)) {
        sendJson(['status' => 'error', 'message' => 'Hanya Dokter yang dapat menerbitkan resep obat untuk pasien.'], 403);
    }

    $konsultasiId    = !empty($body['konsultasi_id']) ? (int)$body['konsultasi_id'] : null;
    $pasienId        = isset($body['pasien_id']) ? (int)$body['pasien_id'] : 0;
    $dokterId        = ($role === 'dokter') ? $userId : (int)($body['dokter_id'] ?? 0);
    $obatId          = isset($body['obat_id']) ? (int)$body['obat_id'] : 0;
    $medNameFallback = trim((string)($body['med_name'] ?? ($body['nama_obat'] ?? '')));
    $dosis           = trim((string)($body['dosis'] ?? ($body['usage_rule'] ?? '')));
    $catatanDokter   = trim((string)($body['catatan_dokter'] ?? ''));
    $diagnosisDokter = trim((string)($body['diagnosis_dokter'] ?? ''));

    if ($konsultasiId) {
        $kStmt = $pdo->prepare("SELECT id, pasien_id, dokter_id FROM konsultasi WHERE id = ? LIMIT 1");
        $kStmt->execute([$konsultasiId]);
        $kRow = $kStmt->fetch();
        if ($kRow) {
            if ($pasienId <= 0) $pasienId = (int)$kRow['pasien_id'];
            if ($dokterId <= 0) $dokterId = (int)$kRow['dokter_id'];
        }
    }

    if ($pasienId <= 0 && $dokterId > 0) {
        $lastK = $pdo->prepare("SELECT id, pasien_id FROM konsultasi WHERE dokter_id = ? ORDER BY id DESC LIMIT 1");
        $lastK->execute([$dokterId]);
        $lkRow = $lastK->fetch();
        if ($lkRow) {
            $pasienId     = (int)$lkRow['pasien_id'];
            $konsultasiId = (int)$lkRow['id'];
        }
    }

    if ($pasienId <= 0) {
        sendJson(['status' => 'error', 'message' => 'Pilih pasien penerima resep terlebih dahulu.'], 400);
    }

    if ($obatId <= 0 && $medNameFallback !== '') {
        $mStmt = $pdo->prepare("SELECT id FROM master_obat WHERE LOWER(nama_obat) = LOWER(?) LIMIT 1");
        $mStmt->execute([$medNameFallback]);
        $mRow = $mStmt->fetch();
        if ($mRow) {
            $obatId = (int)$mRow['id'];
        }
    }

    if ($obatId <= 0) {
        sendJson([
            'status'  => 'error',
            'message' => 'Pilih obat dari katalog Master Obat yang telah diinput oleh Admin.'
        ], 400);
    }

    if ($dosis === '') {
        sendJson(['status' => 'error', 'message' => 'Dosis / aturan pakai obat wajib diisi.'], 400);
    }

    $pdo->beginTransaction();
    try {
        $ins = $pdo->prepare("
            INSERT INTO resep_obat (konsultasi_id, dokter_id, pasien_id, obat_id, dosis, catatan_dokter)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $ins->execute([$konsultasiId, $dokterId, $pasienId, $obatId, $dosis, $catatanDokter]);
        $resepId = (int)$pdo->lastInsertId();

        if ($diagnosisDokter !== '' && $konsultasiId) {
            $pdo->prepare("
                UPDATE konsultasi
                SET diagnosis_dokter = ?
                WHERE id = ?
            ")->execute([$diagnosisDokter, $konsultasiId]);
        }

        $pdo->commit();

        sendJson([
            'status'   => 'success',
            'message'  => 'Resep obat berhasil dikirim ke akun Pasien.',
            'id'       => $resepId,
            'resep_id' => $resepId
        ], 201);
    } catch (Exception $e) {
        $pdo->rollBack();
        sendJson(['status' => 'error', 'message' => 'Gagal menyimpan resep obat: ' . $e->getMessage()], 500);
    }
}

sendJson(['status' => 'error', 'message' => 'Aksi pada api/resep.php tidak dikenali.'], 400);
?>
