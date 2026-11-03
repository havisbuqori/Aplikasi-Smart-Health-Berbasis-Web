# Panduan Instalasi & Uji Coba Sistem Terintegrasi Sehatin (XAMPP)

Paket ini siap dijalankan langsung di **`C:\xampp\htdocs\sehatin`** dengan sistem **Zero Dummy Data** (100% terhubung ke database MySQL dan hanya memiliki 2 akun mutlak Admin di awal).

## 1. Langkah Instalasi di XAMPP (`htdocs`)

1. Ekstrak file `sehatin.zip` ke dalam folder `C:\xampp\htdocs\` sehingga strukturnya menjadi:
   `C:\xampp\htdocs\sehatin\`
2. Buka **XAMPP Control Panel**, lalu jalankan (**Start**) modul **Apache** dan **MySQL**.
3. *(Otomatis / Opsional)* Sistem telah dilengkapi fitur auto-init pada `config/koneksi.php`: saat Anda membuka `http://localhost/sehatin` pertama kali, database `db_sehatin` beserta seluruh tabel relasional dan 2 akun Admin akan otomatis dibuat. Anda juga dapat mengimpor manual file `database/db_sehatin.sql` melalui `http://localhost/phpmyadmin`.
4. Akses aplikasi di browser:
   **`http://localhost/sehatin/`**

## 2. Kredensial 2 Akun Mutlak Admin (Seed Awal)

Sesuai blueprint, hanya ada 2 akun Admin tetap di database dan tidak ada fitur registrasi Admin di manapun:

* **Admin 1**: Email `admin1@sehatin.com` | Password: `admin123`
* **Admin 2**: Email `admin2@sehatin.com` | Password: `admin123`

## 3. Urutan Skenario Uji Coba Terintegrasi (Admin -> Dokter -> Pasien)

1. **Login sebagai Admin (`admin1@sehatin.com` / `admin123`)**:
   * Sistem otomatis mendeteksi `role = 'admin'` dan mengarahkan ke **Dashboard Admin**.
   * Pada **Modul A (Kelola Akun Dokter)**, daftarkan akun Dokter baru (misal: `dr. Budi Santoso, Sp.PD`, email: `dokter1@sehatin.com`, password: `dokter123`).
   * Pada **Modul B (Master Obat)**, tambahkan data obat (misal: `Paracetamol 500mg`, Stok `100`, Satuan `Strip`).
2. **Login sebagai Dokter (`dokter1@sehatin.com` / `dokter123`)**:
   * Sistem otomatis mengarahkan ke **Dashboard Dokter**.
   * Buka **Tambah Jadwal Praktik Baru**, lalu tambahkan jadwal praktik dokter (misal: Senin, 08:00 - 15:00, Kuota 10). Jadwal ini otomatis tampil di akun semua Pasien.
3. **Daftar & Login sebagai Pasien Baru**:
   * Buka tab **Daftar Pasien Baru** pada halaman login, isi Nama, Email, No. HP, dan Password (otomatis mendapat `role = 'pasien'`), lalu masuk.
   * Buka **Profil & Data Medis Saya** untuk mengisi Golongan Darah, Tinggi/Berat Badan, dan Riwayat Alergi.
   * Buka **Konsultasi / Jadwal Dokter**, pilih dokter yang telah dibuat, dan buat jadwal konsultasi. Layanan konsultasi **gratis**, sehingga sesi konsultasi dan chat dokter **langsung aktif** tanpa pembayaran.
4. **Hasil Lab oleh Admin**:
   * Admin (atau Dokter) dapat menginput hasil pemeriksaan di **Modul Upload Hasil Lab** yang langsung tampil di menu **Hasil Lab** pasien.
5. **Chat Real-Time & Kirim Resep oleh Dokter**:
   * Masuk sebagai **Dokter**, lihat rekam medis pasien di daftar antrean, balas pesan pasien di **Ruang Chat** (tersinkronisasi *polling* AJAX setiap 2,5 detik), dan kirim **Resep Obat & Diagnosis** (memilih obat dari Master Obat Admin).
   * Masuk kembali sebagai **Pasien**: resep langsung muncul di **Resep Obat** dan diagnosis dokter langsung tercatat di **Diagnosis / Riwayat Konsultasi**.
