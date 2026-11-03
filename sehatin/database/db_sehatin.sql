-- ============================================================================
-- FILE: database/db_sehatin.sql
-- Skema Database Terintegrasi Sistem Sehatin (Pasien - Dokter - Admin)
-- Prinsip: Zero Dummy Data (100% Kosong di Awal, HANYA 2 Akun Mutlak Admin)
-- ============================================================================

CREATE DATABASE IF NOT EXISTS `db_sehatin`
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `db_sehatin`;

SET FOREIGN_KEY_CHECKS = 0;

DROP TRIGGER IF EXISTS `trg_users_limit_admin_insert`;
DROP TRIGGER IF EXISTS `trg_users_limit_admin_update`;

DROP TABLE IF EXISTS `tagihan`;
DROP TABLE IF EXISTS `keranjang`;
DROP TABLE IF EXISTS `hasil_lab`;
DROP TABLE IF EXISTS `resep_obat`;
DROP TABLE IF EXISTS `master_obat`;
DROP TABLE IF EXISTS `chat_messages`;
DROP TABLE IF EXISTS `konsultasi`;
DROP TABLE IF EXISTS `jadwal_dokter`;
DROP TABLE IF EXISTS `alamat_pasien`;
DROP TABLE IF EXISTS `profil_medis`;
DROP TABLE IF EXISTS `users`;

-- Bersihkan tabel versi lama bila masih tersisa di MySQL XAMPP/Laragon
-- (`tagihan`, `keranjang`, dan `alamat_pasien` sudah tidak dipakai; layanan konsultasi bersifat gratis)
DROP TABLE IF EXISTS `medical_profiles`;
DROP TABLE IF EXISTS `addresses`;
DROP TABLE IF EXISTS `prescriptions`;
DROP TABLE IF EXISTS `doctor_schedules`;
DROP TABLE IF EXISTS `lab_results`;
DROP TABLE IF EXISTS `billings`;
DROP TABLE IF EXISTS `cart_items`;
DROP TABLE IF EXISTS `consultation_doctors`;
DROP TABLE IF EXISTS `consultation_histories`;
DROP TABLE IF EXISTS `food_composition_tkpi`;

SET FOREIGN_KEY_CHECKS = 1;

-- ============================================================================
-- A. TABEL `users` (Akun Terpusat: Admin, Dokter, Pasien)
-- ============================================================================
CREATE TABLE `users` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `no_rm` VARCHAR(30) DEFAULT NULL UNIQUE,
    `nama_lengkap` VARCHAR(120) NOT NULL,
    `email` VARCHAR(120) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `no_hp` VARCHAR(30) DEFAULT '-',
    `role` ENUM('admin', 'dokter', 'pasien') NOT NULL DEFAULT 'pasien',
    `spesialisasi` VARCHAR(120) DEFAULT NULL COMMENT 'Khusus role = dokter',
    `no_str` VARCHAR(60) DEFAULT NULL UNIQUE COMMENT 'Khusus role = dokter',
    `rumah_sakit` VARCHAR(150) DEFAULT NULL COMMENT 'Instansi/RS praktik dokter',
    `tanggal_lahir` DATE DEFAULT NULL,
    `jenis_kelamin` ENUM('Laki-laki', 'Perempuan', '-') NOT NULL DEFAULT '-',
    `alamat` TEXT DEFAULT NULL,
    `avatar_icon` VARCHAR(50) NOT NULL DEFAULT 'fa-user-alt',
    `avatar_img` LONGTEXT DEFAULT NULL,
    `medical_pin` VARCHAR(20) DEFAULT NULL,
    `two_factor_enabled` TINYINT(1) NOT NULL DEFAULT 0,
    `two_factor_method` VARCHAR(80) NOT NULL DEFAULT 'SMS / WhatsApp ke Nomor Terdaftar',
    `status_aktif` TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `idx_users_role` (`role`),
    INDEX `idx_users_status` (`status_aktif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- TRIGGER PENGUNCI JUMLAH ADMIN (Maksimal & Hanya 2 Akun Admin di Database)
-- ============================================================================
DELIMITER $$

CREATE TRIGGER `trg_users_limit_admin_insert`
BEFORE INSERT ON `users`
FOR EACH ROW
BEGIN
    DECLARE admin_count INT DEFAULT 0;
    IF NEW.`role` = 'admin' THEN
        SELECT COUNT(*) INTO admin_count FROM `users` WHERE `role` = 'admin';
        IF admin_count >= 2 THEN
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Penolakan Keamanan: Maksimal hanya 2 akun Admin tetap yang diizinkan di sistem Sehatin.';
        END IF;
    END IF;
END$$

CREATE TRIGGER `trg_users_limit_admin_update`
BEFORE UPDATE ON `users`
FOR EACH ROW
BEGIN
    DECLARE admin_count INT DEFAULT 0;
    IF NEW.`role` = 'admin' AND OLD.`role` <> 'admin' THEN
        SELECT COUNT(*) INTO admin_count FROM `users` WHERE `role` = 'admin';
        IF admin_count >= 2 THEN
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Penolakan Keamanan: Tidak dapat mengubah role menjadi Admin (kuota 2 Admin sudah penuh).';
        END IF;
    END IF;
END$$

DELIMITER ;

-- ============================================================================
-- SEED AWAL: HANYA 2 AKUN MUTLAK ADMIN (Password Default: admin123)
-- ============================================================================
INSERT INTO `users` (`no_rm`, `nama_lengkap`, `email`, `password`, `no_hp`, `role`, `status_aktif`) VALUES
('ADM-0001', 'Administrator Sehatin 1', 'admin1@sehatin.com', '$2y$10$XC5DFXCmg4k68VG87ZH9wOcfd0OESiQlscMseZynKOzwxNquM5t3S', '081100000001', 'admin', 1),
('ADM-0002', 'Administrator Sehatin 2', 'admin2@sehatin.com', '$2y$10$92knI3QYZXfKoeic7dZ8.ubvNJRI90d/2yz8BhL7.hkaGdjMYmC26', '081100000002', 'admin', 1);

-- ============================================================================
-- TABEL PENDUKUNG REKAM MEDIS (`profil_medis`)
-- ============================================================================
CREATE TABLE `profil_medis` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `pasien_id` INT UNSIGNED NOT NULL UNIQUE,
    `golongan_darah` VARCHAR(10) NOT NULL DEFAULT '-',
    `tinggi_badan` FLOAT NOT NULL DEFAULT 0,
    `berat_badan` FLOAT NOT NULL DEFAULT 0,
    `imt_nilai` FLOAT NOT NULL DEFAULT 0,
    `imt_status` VARCHAR(40) NOT NULL DEFAULT 'Belum Diisi',
    `riwayat_alergi` VARCHAR(255) NOT NULL DEFAULT 'Tidak Ada',
    `riwayat_medis` TEXT DEFAULT NULL,
    `tekanan_darah` VARCHAR(30) NOT NULL DEFAULT '-',
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT `fk_profil_medis_pasien`
        FOREIGN KEY (`pasien_id`) REFERENCES `users`(`id`)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- B. TABEL `jadwal_dokter` (Terhubung: Dokter <-> Pasien <-> Admin)
-- ============================================================================
CREATE TABLE `jadwal_dokter` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `dokter_id` INT UNSIGNED NOT NULL,
    `hari` VARCHAR(30) NOT NULL COMMENT 'Contoh: Senin, Selasa, Rabu',
    `jam_mulai` TIME NOT NULL,
    `jam_selesai` TIME NOT NULL,
    `kuota` INT UNSIGNED NOT NULL DEFAULT 10,
    `status_tersedia` TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `idx_jadwal_dokter` (`dokter_id`, `status_tersedia`),
    CONSTRAINT `fk_jadwal_dokter_user`
        FOREIGN KEY (`dokter_id`) REFERENCES `users`(`id`)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- C. TABEL `konsultasi` (Jembatan Utama Pasien <-> Dokter <-> Admin)
-- ============================================================================
CREATE TABLE `konsultasi` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `pasien_id` INT UNSIGNED NOT NULL,
    `dokter_id` INT UNSIGNED NOT NULL,
    `jadwal_id` INT UNSIGNED DEFAULT NULL,
    `tanggal_booking` DATE NOT NULL,
    `keluhan_awal` TEXT NOT NULL,
    `diagnosis_dokter` TEXT DEFAULT NULL,
    `status` ENUM('aktif', 'selesai', 'batal') NOT NULL DEFAULT 'aktif',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `idx_konsultasi_pasien` (`pasien_id`, `status`),
    INDEX `idx_konsultasi_dokter` (`dokter_id`, `status`),
    CONSTRAINT `fk_konsultasi_pasien`
        FOREIGN KEY (`pasien_id`) REFERENCES `users`(`id`)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_konsultasi_dokter`
        FOREIGN KEY (`dokter_id`) REFERENCES `users`(`id`)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_konsultasi_jadwal`
        FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal_dokter`(`id`)
        ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- D. TABEL `chat_messages` (Real-time / Polling Chat Pasien <-> Dokter)
-- ============================================================================
CREATE TABLE `chat_messages` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `konsultasi_id` INT UNSIGNED NOT NULL,
    `pengirim_id` INT UNSIGNED NOT NULL,
    `penerima_id` INT UNSIGNED NOT NULL,
    `pesan` TEXT NOT NULL,
    `lampiran_file` VARCHAR(255) DEFAULT NULL,
    `is_read` TINYINT(1) NOT NULL DEFAULT 0,
    `waktu_kirim` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `idx_chat_konsultasi` (`konsultasi_id`, `waktu_kirim`),
    CONSTRAINT `fk_chat_konsultasi`
        FOREIGN KEY (`konsultasi_id`) REFERENCES `konsultasi`(`id`)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_chat_pengirim`
        FOREIGN KEY (`pengirim_id`) REFERENCES `users`(`id`)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_chat_penerima`
        FOREIGN KEY (`penerima_id`) REFERENCES `users`(`id`)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- E. TABEL `master_obat` & `resep_obat` (Dokter -> Pasien)
-- ============================================================================
CREATE TABLE `master_obat` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `nama_obat` VARCHAR(150) NOT NULL,
    `kategori` VARCHAR(80) NOT NULL DEFAULT 'Obat Resep',
    `stok` INT UNSIGNED NOT NULL DEFAULT 0,
    `satuan` VARCHAR(40) NOT NULL DEFAULT 'Strip',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `idx_master_obat_nama` (`nama_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `resep_obat` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `konsultasi_id` INT UNSIGNED DEFAULT NULL,
    `dokter_id` INT UNSIGNED NOT NULL,
    `pasien_id` INT UNSIGNED NOT NULL,
    `obat_id` INT UNSIGNED NOT NULL,
    `dosis` VARCHAR(120) NOT NULL,
    `catatan_dokter` TEXT DEFAULT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `idx_resep_pasien` (`pasien_id`),
    INDEX `idx_resep_dokter` (`dokter_id`),
    CONSTRAINT `fk_resep_konsultasi`
        FOREIGN KEY (`konsultasi_id`) REFERENCES `konsultasi`(`id`)
        ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk_resep_dokter`
        FOREIGN KEY (`dokter_id`) REFERENCES `users`(`id`)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_resep_pasien`
        FOREIGN KEY (`pasien_id`) REFERENCES `users`(`id`)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_resep_master_obat`
        FOREIGN KEY (`obat_id`) REFERENCES `master_obat`(`id`)
        ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- F. TABEL `hasil_lab` (Admin / Dokter -> Pasien)
-- ============================================================================
CREATE TABLE `hasil_lab` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `pasien_id` INT UNSIGNED NOT NULL,
    `dokter_pengirim_id` INT UNSIGNED DEFAULT NULL,
    `jenis_pemeriksaan` VARCHAR(150) NOT NULL,
    `hasil_ringkasan` TEXT NOT NULL,
    `file_pdf_hasil` VARCHAR(255) DEFAULT NULL,
    `tanggal_periksa` DATE NOT NULL,
    `status_lab` ENUM('diproses', 'selesai') NOT NULL DEFAULT 'diproses',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `idx_lab_pasien` (`pasien_id`, `status_lab`),
    CONSTRAINT `fk_lab_pasien`
        FOREIGN KEY (`pasien_id`) REFERENCES `users`(`id`)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_lab_dokter`
        FOREIGN KEY (`dokter_pengirim_id`) REFERENCES `users`(`id`)
        ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

