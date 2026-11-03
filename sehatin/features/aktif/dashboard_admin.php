<?php if (!defined('SEHATIN_ADMIN_VIEW_RENDERED')) { define('SEHATIN_ADMIN_VIEW_RENDERED', true); ?>
<!-- ====================================================================== -->
<!-- WORKSPACE KHUSUS AKUN ADMIN: PANEL MANAJEMEN SISTEM (TANPA DATA DUMMY) -->
<!-- Sesuai Blueprint Bagian 5:                                             -->
<!-- A. Modul Kelola Akun Dokter (Tanpa Fitur Tambah Admin - Maks 2 Admin)  -->
<!-- B. Modul Master Obat & Layanan (`master_obat`)                         -->
<!-- C. Modul Upload Hasil Lab (`api/lab.php`)                              -->
<!-- ====================================================================== -->
<div id="adminRoleDashboardSubView" class="hidden max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8 mt-5 space-y-5 animate-fade-in">

    <!-- 1. Header Panel Kontrol Administrator & Navigasi Tab Admin -->
    <div class="bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-4">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center space-x-3.5">
                <div class="w-12 h-12 rounded-2xl bg-teal-600 text-white flex items-center justify-center text-xl shadow-sm shrink-0">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div>
                    <div class="flex items-center space-x-2">
                        <span class="text-[10px] font-bold uppercase tracking-wider bg-teal-50 text-teal-700 border border-teal-200 px-2.5 py-0.5 rounded-full">
                            UI Khusus Administrator
                        </span>
                        <span class="text-[10px] font-semibold bg-slate-100 text-slate-700 px-2.5 py-0.5 rounded-full">
                            Kuota Admin Terkunci: Maks. 2 Akun Tetap
                        </span>
                    </div>
                    <h2 id="adminDashNameTitle" class="text-base sm:text-lg font-bold text-slate-800 mt-1">Panel Manajemen Sistem Sehatin</h2>
                    <p class="text-xs text-slate-500">Kelola pendaftaran akun Dokter, katalog Master Obat, serta pengiriman Hasil Lab.</p>
                </div>
            </div>
        </div>

        <!-- Bar Navigasi Tab Internal Workspace Admin -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 pt-3 border-t border-slate-100">
            <button type="button" data-admin-nav="overview" class="admin-nav-btn py-2 px-3 rounded-xl text-xs font-semibold bg-teal-600 text-white shadow-sm flex items-center justify-center space-x-1.5 transition-colors focus:outline-none">
                <i class="fas fa-tachometer-alt"></i>
                <span>Semua Modul</span>
            </button>
            <button type="button" data-admin-nav="accounts" class="admin-nav-btn py-2 px-3 rounded-xl text-xs font-semibold bg-slate-50 text-slate-700 hover:bg-teal-50 hover:text-teal-700 border border-slate-200 flex items-center justify-center space-x-1.5 transition-colors focus:outline-none">
                <i class="fas fa-user-md"></i>
                <span>Kelola Dokter &amp; Akun</span>
            </button>
            <button type="button" data-admin-nav="tkpi" class="admin-nav-btn py-2 px-3 rounded-xl text-xs font-semibold bg-slate-50 text-slate-700 hover:bg-teal-50 hover:text-teal-700 border border-slate-200 flex items-center justify-center space-x-1.5 transition-colors focus:outline-none">
                <i class="fas fa-pills"></i>
                <span>Master Obat &amp; Lab</span>
            </button>
            <button type="button" data-admin-nav="doctors" class="admin-nav-btn py-2 px-3 rounded-xl text-xs font-semibold bg-slate-50 text-slate-700 hover:bg-teal-50 hover:text-teal-700 border border-slate-200 flex items-center justify-center space-x-1.5 transition-colors focus:outline-none">
                <i class="fas fa-hospital-user"></i>
                <span>Direktori Dokter</span>
            </button>
        </div>
    </div>

    <!-- 2. Kartu Ringkasan Statistik Real-Time dari Database MySQL -->
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-3.5">
        <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200">
            <div class="flex items-center justify-between text-teal-600 mb-1">
                <span class="text-xs font-medium text-slate-500">Akun Terdaftar</span>
                <i class="fas fa-users"></i>
            </div>
            <p id="adminStatUsersCount" class="text-2xl font-bold text-slate-800">0</p>
            <span id="adminStatRoleBreakdown" class="text-[11px] text-slate-500">0 Pasien • 0 Dokter • 2 Admin</span>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200">
            <div class="flex items-center justify-between text-teal-600 mb-1">
                <span class="text-xs font-medium text-slate-500">Aktivitas Medis Pasien</span>
                <i class="fas fa-notes-medical"></i>
            </div>
            <p id="adminStatPatientActivityCount" class="text-2xl font-bold text-slate-800">0</p>
            <span id="adminStatPatientActivitySub" class="text-[11px] text-slate-500">0 Jadwal • 0 Resep • 0 Lab</span>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200">
            <div class="flex items-center justify-between text-teal-600 mb-1">
                <span class="text-xs font-medium text-slate-500">Dokter &amp; Master Obat</span>
                <i class="fas fa-pills"></i>
            </div>
            <p class="text-2xl font-bold text-slate-800"><span id="adminStatDoctorsCount">0</span> / <span id="adminStatObatCount">0</span></p>
            <span class="text-[11px] text-slate-500">Dokter Aktif / Item Obat</span>
            <span id="adminStatTkpiCount" class="hidden">0</span>
        </div>
    </div>

    <!-- ================================================================== -->
    <!-- A. MODUL KELOLA AKUN DOKTER (WAJIB - TANPA FITUR TAMBAH ADMIN)     -->
    <!-- ================================================================== -->
    <div id="adminPanelAccounts" data-admin-panel="accounts" class="space-y-4">
        <div class="bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-4">
            <div class="flex flex-wrap items-center justify-between gap-2 border-b border-slate-100 pb-3">
                <div>
                    <h3 class="text-sm sm:text-base font-bold text-slate-800">
                        <i class="fas fa-user-md text-teal-600 mr-1.5"></i>A. Modul Kelola Akun Dokter &amp; Pengguna Terdaftar
                    </h3>
                    <p class="text-xs text-slate-500">Daftarkan akun Dokter baru (Nama, Email, Password, Spesialisasi, No. STR). Jumlah Admin dikunci maksimal 2 akun.</p>
                </div>
                <button
                    type="button"
                    id="adminToggleAddAccountBtn"
                    class="px-3.5 py-2 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold shadow-sm flex items-center space-x-1.5 transition-colors focus:outline-none"
                >
                    <i class="fas fa-user-plus"></i>
                    <span>+ Tambah Akun Dokter Baru</span>
                </button>
            </div>

            <!-- Form Tambah Akun Dokter Baru oleh Admin (Sesuai Blueprint 5.A) -->
            <form id="adminCreateDoctorDatabaseForm" class="bg-teal-50/50 rounded-xl p-4 border border-teal-200 space-y-3">
                <div class="flex items-center justify-between">
                    <h4 class="text-xs font-bold text-teal-800 uppercase tracking-wider">
                        <i class="fas fa-stethoscope mr-1"></i>Form Pendaftaran Akun Dokter Baru (Khusus Otorisasi Admin)
                    </h4>
                    <span class="text-[10px] font-semibold text-teal-700 bg-white px-2.5 py-0.5 rounded-full border border-teal-200">Tersimpan ke Tabel `users` (`role = 'dokter'`)</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2.5 text-xs">
                    <input type="text" id="admDocNamaInput" placeholder="Nama Lengkap & Gelar Dokter (cth: dr. Andi, Sp.PD)" class="px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                    <input type="email" id="admDocEmailInput" placeholder="Email Login Dokter (cth: andi@sehatin.com)" class="px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                    <input type="password" id="admDocPassInput" placeholder="Password Dokter (Min. 6 Karakter)" class="px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                    <input type="text" id="admDocSpecInput" placeholder="Spesialisasi (cth: Spesialis Penyakit Dalam)" class="px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                    <input type="text" id="admDocStrInput" placeholder="Nomor STR Resmi (cth: STR-PKU-202601)" class="px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                    <input type="text" id="admDocPhoneHospInput" placeholder="No. HP / RS Praktik (cth: RS Awal Bros Pekanbaru)" class="px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold shadow-sm">
                        <i class="fas fa-save mr-1"></i>Daftarkan Akun Dokter
                    </button>
                </div>
            </form>

            <!-- Form Legacy Tersembunyi untuk Kompatibilitas Selector -->
            <form id="adminCreateAccountForm" class="hidden">
                <input type="text" id="adminNewAccName"><input type="text" id="adminNewAccIdentifier"><input type="text" id="adminNewAccPhone">
                <select id="adminNewAccRole"><option value="dokter">Dokter</option></select>
                <input type="text" id="adminNewAccPassword"><button type="button" id="adminCancelAddAccountBtn"></button>
            </form>

            <!-- Tabel Daftar Dokter & Akun Terdaftar beserta Tombol Aktifkan/Nonaktifkan Dokter -->
            <div class="overflow-x-auto border border-slate-200 rounded-xl">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-slate-50 text-slate-600 border-b border-slate-200">
                            <th class="py-2.5 px-3 font-bold">Nama Lengkap</th>
                            <th class="py-2.5 px-3 font-bold">Email Login</th>
                            <th class="py-2.5 px-3 font-bold">Role &amp; Spesialisasi</th>
                            <th class="py-2.5 px-3 font-bold">No. STR / RM</th>
                            <th class="py-2.5 px-3 font-bold">Status Akun</th>
                            <th class="py-2.5 px-3 font-bold text-right">Kendali Admin</th>
                        </tr>
                    </thead>
                    <tbody id="adminAccountsTableBody" class="divide-y divide-slate-100"></tbody>
                </table>
            </div>
        </div>

        <!-- Ringkasan Data yang Bersangkutan dengan Akun Pasien -->
        <div class="bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-3">
            <div class="border-b border-slate-100 pb-2.5">
                <h3 class="text-sm sm:text-base font-bold text-slate-800">
                    <i class="fas fa-link text-teal-600 mr-1.5"></i>Rekap Aktivitas Real-Time Pasien - Dokter - Admin
                </h3>
                <p class="text-xs text-slate-500">Seluruh data di bawah ini bersumber langsung dari tabel relasional MySQL</p>
            </div>
            <div id="adminPatientLinkedSummaryBox" class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs"></div>
        </div>
    </div>

    <!-- ================================================================== -->
    <!-- B, C: MASTER OBAT & UPLOAD HASIL LAB                              -->
    <!-- ================================================================== -->
    <div id="adminPanelMasterData" data-admin-panel="master" class="grid grid-cols-1 lg:grid-cols-12 gap-5">

        <!-- Kolom Penuh: B. Modul Master Obat & D. Modul Upload Hasil Lab -->
        <div id="adminSubPanelTkpi" class="lg:col-span-12 space-y-5">

            <!-- B. MODUL MASTER OBAT & LAYANAN (`master_obat` - Blueprint 5.B) -->
            <div class="bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-3.5">
                <div class="border-b border-slate-100 pb-2.5 flex items-center justify-between">
                    <div>
                        <h3 class="text-sm sm:text-base font-bold text-slate-800">
                            <i class="fas fa-pills text-teal-600 mr-1.5"></i>B. Modul Master Obat &amp; Layanan (`master_obat`)
                        </h3>
                        <p class="text-[11px] text-slate-500">Input nama obat, kategori, dan stok agar dapat diresepkan oleh Dokter kepada Pasien</p>
                    </div>
                </div>

                <form id="adminMasterObatForm" class="space-y-3 text-xs bg-slate-50 p-3.5 rounded-xl border border-slate-200">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        <input type="text" id="admObatNamaInput" placeholder="Nama Obat & Dosis (cth: Amoxicillin 500mg)" class="px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                        <select id="admObatKategoriInput" class="px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600">
                            <option value="Obat Resep">Kategori: Obat Resep</option>
                            <option value="Antibiotik">Kategori: Antibiotik</option>
                            <option value="Analgesik / Antipiretik">Kategori: Analgesik / Antipiretik</option>
                            <option value="Vitamin & Suplemen">Kategori: Vitamin &amp; Suplemen</option>
                            <option value="Obat Kronis / Kardiovaskular">Kategori: Obat Kronis / Kardiovaskular</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        <input type="number" id="admObatStokInput" placeholder="Jumlah Stok" min="1" value="50" class="px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                        <input type="text" id="admObatSatuanInput" placeholder="Satuan (Strip / Botol / Tablet)" value="Strip" class="px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                    </div>
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold shadow-sm transition-colors">
                        <i class="fas fa-plus-circle mr-1.5"></i>Simpan ke Master Obat Database
                    </button>
                </form>

                <!-- Tabel Katalog Master Obat -->
                <div class="space-y-2">
                    <p class="text-[11px] font-bold text-slate-600 uppercase tracking-wider">Katalog Master Obat Tersedia:</p>
                    <div id="adminMasterObatListContainer" class="space-y-2 max-h-56 overflow-y-auto text-xs">
                        <p class="text-slate-400 text-xs py-3 text-center border border-dashed border-slate-200 rounded-xl">Belum ada data obat di Master Obat.</p>
                    </div>
                </div>
            </div>

            <!-- D. MODUL UPLOAD HASIL LAB (`api/lab.php` - Blueprint 5.D) -->
            <div class="bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-3.5">
                <div class="border-b border-slate-100 pb-2.5">
                    <h3 class="text-sm sm:text-base font-bold text-slate-800">
                        <i class="fas fa-vial text-teal-600 mr-1.5"></i>D. Modul Upload Hasil Lab Pasien (`api/lab.php`)
                    </h3>
                    <p class="text-[11px] text-slate-500">Pilih nama Pasien dan Dokter pengirim, lalu input hasil lab. Data langsung tampil di `hasil_lab.php` milik Pasien.</p>
                </div>

                <form id="adminUploadLabDatabaseForm" class="space-y-3 text-xs bg-slate-50 p-3.5 rounded-xl border border-slate-200">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Pilih Pasien</label>
                            <select id="admLabPasienSelect" class="w-full px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                                <option value="">-- Pilih Pasien Terdaftar --</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Dokter Pengirim</label>
                            <select id="admLabDokterSelect" class="w-full px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600">
                                <option value="">-- Pilih Dokter Pengirim (Opsional) --</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        <input type="text" id="admLabJenisInput" placeholder="Jenis Pemeriksaan (cth: Darah Lengkap / Kimia Klinik)" class="px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                        <input type="date" id="admLabTanggalInput" value="<?php echo date('Y-m-d'); ?>" class="px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                    </div>
                    <input type="text" id="admLabRingkasanInput" placeholder="Ringkasan Hasil Lab (cth: Hb 13.8 g/dL, Leukosit 7.200/uL - Normal)" class="w-full px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold shadow-sm transition-colors">
                        <i class="fas fa-file-medical mr-1.5"></i>Kirim Hasil Lab ke Akun Pasien
                    </button>
                </form>

                <!-- Form TKPI Tersembunyi untuk Kompatibilitas Selector -->
                <form id="adminAddTkpiFoodForm" class="hidden">
                    <input id="adminTkpiCodeInput"><input id="adminTkpiNameInput"><select id="adminTkpiCategorySelect"></select>
                    <input id="adminTkpiPortionInput"><input id="adminTkpiCalInput"><input id="adminTkpiCarbInput">
                    <input id="adminTkpiProtInput"><input id="adminTkpiFatInput"><input id="adminTkpiFiberInput">
                </form>
                <div class="hidden">
                    <button type="button" id="adminQuickManageDoctorsBtn"></button>
                </div>
            </div>
        </div>
    </div>

</div>

<?php } ?>
