<?php if (!defined('SEHATIN_DOKTER_VIEW_RENDERED')) { define('SEHATIN_DOKTER_VIEW_RENDERED', true); ?>
<!-- ====================================================================== -->
<!-- WORKSPACE KHUSUS AKUN DOKTER: UI PORTAL PRAKTIK MEDIS (TANPA DATA DUMMY) -->
<!-- Sesuai Blueprint Bagian 4:                                             -->
<!-- A. Panel Antrean & Konsultasi Pasien + Lihat Rekam Medis Pasien        -->
<!-- B. Panel Chat Terintegrasi (`api/chat.php`)                            -->
<!-- C. Form Kirim Resep (Pilih dari Master Obat Admin) & Diagnosis         -->
<!-- D. Pengaturan Jadwal Praktik Dokter (`api/jadwal.php`)                 -->
<!-- ====================================================================== -->
<div id="doctorRoleDashboardSubView" class="hidden max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8 mt-5 space-y-5 animate-fade-in">

    <!-- 1. Header Portal Praktik Dokter & Navigasi Tab Dokter -->
    <div class="bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-4">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center space-x-3.5">
                <div class="w-12 h-12 rounded-2xl bg-teal-600 text-white flex items-center justify-center text-xl shadow-sm shrink-0">
                    <i class="fas fa-user-md"></i>
                </div>
                <div>
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="text-[10px] font-bold uppercase tracking-wider bg-teal-50 text-teal-700 border border-teal-200 px-2.5 py-0.5 rounded-full">
                            UI Khusus Akun Dokter
                        </span>
                        <span id="docDashStatusBadge" class="text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 px-2.5 py-0.5 rounded-full">
                            ● Aktif Praktik
                        </span>
                    </div>
                    <h2 id="docDashDoctorName" class="text-base sm:text-lg font-bold text-slate-800 mt-1">-</h2>
                    <p id="docDashDoctorMeta" class="text-xs text-slate-500">Terhubung real-time dengan Antrean Pasien, Rekam Medis, Ruang Chat, e-Resep Master Obat, &amp; Jadwal Praktik.</p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <button
                    type="button"
                    id="docOpenChatRoomBtn"
                    class="px-4 py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold shadow-sm flex items-center space-x-1.5 transition-colors focus:outline-none"
                >
                    <i class="fas fa-comments"></i>
                    <span>Buka Ruang Chat Pasien</span>
                </button>
            </div>
        </div>

        <!-- Bar Navigasi Tab Internal Workspace Dokter -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-2 pt-3 border-t border-slate-100">
            <button type="button" data-doc-nav="overview" class="doc-nav-btn py-2 px-3 rounded-xl text-xs font-semibold bg-teal-600 text-white shadow-sm flex items-center justify-center space-x-1.5 transition-colors focus:outline-none">
                <i class="fas fa-clinic-medical"></i>
                <span>Semua Modul</span>
            </button>
            <button type="button" data-doc-nav="antrean" class="doc-nav-btn py-2 px-3 rounded-xl text-xs font-semibold bg-slate-50 text-slate-700 hover:bg-teal-50 hover:text-teal-700 border border-slate-200 flex items-center justify-center space-x-1.5 transition-colors focus:outline-none">
                <i class="fas fa-calendar-check"></i>
                <span>Antrean &amp; Rekam Medis</span>
            </button>
            <button type="button" data-doc-nav="chat" class="doc-nav-btn py-2 px-3 rounded-xl text-xs font-semibold bg-slate-50 text-slate-700 hover:bg-teal-50 hover:text-teal-700 border border-slate-200 flex items-center justify-center space-x-1.5 transition-colors focus:outline-none">
                <i class="fas fa-comments"></i>
                <span>Chat Pasien</span>
            </button>
            <button type="button" data-doc-nav="resep_lab" class="doc-nav-btn py-2 px-3 rounded-xl text-xs font-semibold bg-slate-50 text-slate-700 hover:bg-teal-50 hover:text-teal-700 border border-slate-200 flex items-center justify-center space-x-1.5 transition-colors focus:outline-none">
                <i class="fas fa-prescription"></i>
                <span>Kirim Resep &amp; Diagnosis</span>
            </button>
            <button type="button" data-doc-nav="riwayat" class="doc-nav-btn py-2 px-3 rounded-xl text-xs font-semibold bg-slate-50 text-slate-700 hover:bg-teal-50 hover:text-teal-700 border border-slate-200 flex items-center justify-center space-x-1.5 transition-colors focus:outline-none">
                <i class="fas fa-notes-medical"></i>
                <span>Riwayat Selesai</span>
            </button>
            <button type="button" data-doc-nav="profil_dokter" class="doc-nav-btn py-2 px-3 rounded-xl text-xs font-semibold bg-slate-50 text-slate-700 hover:bg-teal-50 hover:text-teal-700 border border-slate-200 flex items-center justify-center space-x-1.5 transition-colors focus:outline-none">
                <i class="fas fa-clock"></i>
                <span>Jadwal Praktik Saya</span>
            </button>
        </div>
    </div>

    <!-- 2. Kartu Metrik Real-Time dari Akun Pasien -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3.5">
        <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200">
            <div class="flex items-center justify-between text-teal-600 mb-1">
                <span class="text-xs font-medium text-slate-500">Pasien Terdaftar</span>
                <i class="fas fa-hospital-user"></i>
            </div>
            <p id="docStatConnectedPatientsCount" class="text-2xl font-bold text-slate-800">0</p>
            <span class="text-[11px] text-slate-400">Akun pasien di sistem</span>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200">
            <div class="flex items-center justify-between text-teal-600 mb-1">
                <span class="text-xs font-medium text-slate-500">Antrean Konsultasi</span>
                <i class="fas fa-calendar-check"></i>
            </div>
            <p id="docStatScheduleCount" class="text-2xl font-bold text-slate-800">0</p>
            <span class="text-[11px] text-slate-400">Booking pasien aktif</span>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200">
            <div class="flex items-center justify-between text-teal-600 mb-1">
                <span class="text-xs font-medium text-slate-500">Pesan Chat Masuk</span>
                <i class="fas fa-comment-medical"></i>
            </div>
            <p id="docStatChatCount" class="text-2xl font-bold text-slate-800">0</p>
            <span class="text-[11px] text-slate-400">Pesan di ruang konsultasi</span>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200">
            <div class="flex items-center justify-between text-teal-600 mb-1">
                <span class="text-xs font-medium text-slate-500">e-Resep &amp; Selesai</span>
                <i class="fas fa-prescription-bottle-alt"></i>
            </div>
            <p class="text-2xl font-bold text-slate-800"><span id="docStatResepCount">0</span> / <span id="docStatHistoryCount">0</span></p>
            <span class="text-[11px] text-slate-400">Resep diterbitkan / Selesai</span>
        </div>
    </div>

    <!-- ================================================================== -->
    <!-- A. PANEL DOKTER 1: DAFTAR PASIEN & REKAM MEDIS (`profil_medis`)    -->
    <!-- ================================================================== -->
    <div id="docPanelOverview" data-doc-panel="overview" class="space-y-4">
        <div class="bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-3">
            <div class="flex flex-wrap items-center justify-between gap-2 border-b border-slate-100 pb-3">
                <div>
                    <h3 class="text-sm sm:text-base font-bold text-slate-800">
                        <i class="fas fa-user-injured text-teal-600 mr-1.5"></i>A. Daftar Pasien &amp; Akses Rekam Medis (`profil_medis.php`)
                    </h3>
                    <p class="text-xs text-slate-500">Klik <strong>Lihat Rekam Medis</strong> pada kartu pasien untuk membaca golongan darah, IMT, riwayat alergi, dan tekanan darah yang diinput pasien</p>
                </div>
            </div>

            <!-- Panel Detail Rekam Medis Pasien yang Dipilih Dokter -->
            <div id="docSelectedPatientMedicalBox" class="hidden bg-teal-50/70 border border-teal-200 rounded-xl p-4 text-xs space-y-2"></div>

            <div id="docConnectedPatientsContainer" class="space-y-2.5">
                <div id="docEmptyConnectedPatients" class="py-8 text-center text-slate-400 text-xs border border-dashed border-slate-200 rounded-xl">
                    Belum ada akun Pasien yang terdaftar atau melakukan booking konsultasi.
                </div>
            </div>
        </div>
    </div>

    <!-- ================================================================== -->
    <!-- A & B. PANEL DOKTER 2: ANTREAN KONSULTASI & RUANG CHAT PASIEN      -->
    <!-- ================================================================== -->
    <div id="docPanelAntrean" data-doc-panel="antrean" class="space-y-4">
        <div class="bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-3">
            <div class="flex flex-wrap items-center justify-between gap-2 border-b border-slate-100 pb-3">
                <div>
                    <h3 class="text-sm sm:text-base font-bold text-slate-800">
                        <i class="fas fa-user-clock text-teal-600 mr-1.5"></i>B. Antrean Booking Konsultasi Pasien (`api/konsultasi.php`)
                    </h3>
                    <p class="text-[11px] text-slate-500">Klik <strong>Layani Chat</strong> untuk langsung terhubung dengan `chat_dokter.php` di akun pasien yang bersangkutan</p>
                </div>
                <button
                    type="button"
                    id="docAddPatientScheduleToggleBtn"
                    class="px-3 py-1.5 rounded-xl bg-teal-50 hover:bg-teal-100 text-teal-700 border border-teal-200 text-xs font-semibold transition-colors"
                >
                    <i class="fas fa-plus mr-1"></i>Tambah Jadwal Praktik Baru
                </button>
            </div>

            <!-- Form Cepat Tambah Jadwal Praktik Dokter (`jadwal_dokter`) -->
            <form id="docQuickScheduleForm" class="hidden bg-slate-50 rounded-xl p-3.5 border border-slate-200 space-y-2.5 text-xs">
                <p class="font-bold text-teal-700">Tambah Jam Praktik Dokter (Otomatis Tampil di `jadwal_dokter.php` Pasien)</p>
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-2.5">
                    <select id="docSchedPatientNoteInput" class="px-3 py-2 border border-slate-200 rounded-xl bg-white">
                        <option value="Senin">Hari: Senin</option>
                        <option value="Selasa">Hari: Selasa</option>
                        <option value="Rabu">Hari: Rabu</option>
                        <option value="Kamis">Hari: Kamis</option>
                        <option value="Jumat">Hari: Jumat</option>
                        <option value="Sabtu">Hari: Sabtu</option>
                        <option value="Minggu">Hari: Minggu</option>
                    </select>
                    <input type="time" id="docSchedDateInput" value="08:00" class="px-3 py-2 border border-slate-200 rounded-xl bg-white" required title="Jam Mulai">
                    <input type="time" id="docSchedTimeInput" value="15:00" class="px-3 py-2 border border-slate-200 rounded-xl bg-white" required title="Jam Selesai">
                    <input type="number" id="docSchedKuotaInput" value="10" min="1" placeholder="Kuota Pasien" class="px-3 py-2 border border-slate-200 rounded-xl bg-white" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-1.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold">Simpan Jadwal Praktik</button>
                </div>
            </form>

            <div id="docScheduleQueueContainer" class="space-y-2.5">
                <div id="docEmptyScheduleQueue" class="py-8 text-center text-slate-400 text-xs border border-dashed border-slate-200 rounded-xl">
                    Belum ada antrean konsultasi dari pasien saat ini.
                </div>
            </div>
        </div>
    </div>

    <!-- ================================================================== -->
    <!-- C. PANEL DOKTER 3: FORM KIRIM RESEP & DIAGNOSIS (`api/resep.php`)  -->
    <!-- ================================================================== -->
    <div id="docPanelResepLab" data-doc-panel="resep_lab" class="grid grid-cols-1 lg:grid-cols-12 gap-5">
        <!-- Form Kirim Resep & Diagnosis (6 Kolom) -->
        <div class="lg:col-span-6 bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-3">
            <div class="border-b border-slate-100 pb-2.5">
                <h3 class="text-sm sm:text-base font-bold text-slate-800">
                    <i class="fas fa-prescription text-teal-600 mr-1.5"></i>C. Form Kirim Resep &amp; Diagnosis (`api/resep.php`)
                </h3>
                <p class="text-[11px] text-slate-500">Pilih pasien &amp; obat dari Master Obat Admin. Saat klik <strong>Kirim Resep</strong>, langsung muncul di `resep_obat.php` dan `diagnosis.php` Pasien.</p>
            </div>

            <form id="docIssuePrescriptionForm" class="space-y-2.5 text-xs">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Pilih Pasien Penerima Resep</label>
                        <select id="docResepPasienSelect" class="w-full px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                            <option value="">-- Pilih Pasien --</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Pilih Obat (Master Obat Admin)</label>
                        <select id="docResepObatSelect" class="w-full px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600">
                            <option value="">-- Pilih dari Master Obat --</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" id="docResepMedName" value="">
                <div>
                    <label for="docResepDiagnosisInput" class="block font-semibold text-slate-700 mb-1">Diagnosis Medis Dokter (Tampil di `diagnosis.php` Pasien)</label>
                    <input type="text" id="docResepDiagnosisInput" placeholder="Contoh: ISPA Ringan / Dispepsia Akut" class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                    <div>
                        <label for="docResepUsageRule" class="block font-semibold text-slate-700 mb-1">Dosis &amp; Aturan Pakai</label>
                        <input type="text" id="docResepUsageRule" placeholder="Contoh: 3x1 Tablet Sesudah Makan" class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                    </div>
                    <div>
                        <label for="docResepCatatanInput" class="block font-semibold text-slate-700 mb-1">Catatan Tambahan Dokter</label>
                        <input type="text" id="docResepCatatanInput" placeholder="Contoh: Habiskan obat & istirahat cukup" class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600">
                    </div>
                </div>
                <button type="submit" class="w-full py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold shadow-sm transition-colors focus:outline-none">
                    <i class="fas fa-paper-plane mr-1.5"></i>Kirim Resep &amp; Diagnosis ke Akun Pasien
                </button>
            </form>

            <!-- Daftar e-Resep yang Telah Diterbitkan -->
            <div class="pt-3 border-t border-slate-100 space-y-2">
                <p class="text-[11px] font-bold text-slate-600 uppercase tracking-wider">Daftar e-Resep yang Telah Dikirim:</p>
                <div id="docIssuedPrescriptionsList" class="space-y-2 text-xs max-h-48 overflow-y-auto">
                    <p class="text-slate-400 text-xs py-3 text-center border border-dashed border-slate-200 rounded-xl">Belum ada resep yang diterbitkan.</p>
                </div>
            </div>
        </div>

        <!-- Input Hasil Lab Pemeriksaan Pasien (6 Kolom) -->
        <div class="lg:col-span-6 bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-3">
            <div class="border-b border-slate-100 pb-2.5">
                <h3 class="text-sm sm:text-base font-bold text-slate-800">
                    <i class="fas fa-vial text-teal-600 mr-1.5"></i>Input Hasil Pemeriksaan Lab Pasien (`api/lab.php`)
                </h3>
                <p class="text-[11px] text-slate-500">Catat hasil pemeriksaan laboratorium yang langsung tampil di `hasil_lab.php` akun Pasien.</p>
            </div>

            <form id="docIssueLabResultForm" class="space-y-2.5 text-xs">
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Pilih Pasien</label>
                    <select id="docLabPasienSelect" class="w-full px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                        <option value="">-- Pilih Pasien --</option>
                    </select>
                </div>
                <div>
                    <label for="docLabTestName" class="block font-semibold text-slate-700 mb-1">Jenis Pemeriksaan Laboratorium / Klinis</label>
                    <input type="text" id="docLabTestName" placeholder="Contoh: Hematologi Lengkap / Gula Darah Puasa" class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                </div>
                <div>
                    <label for="docLabResultSummary" class="block font-semibold text-slate-700 mb-1">Ringkasan Hasil &amp; Interpretasi Dokter</label>
                    <input type="text" id="docLabResultSummary" placeholder="Contoh: GDS 98 mg/dL (Dalam Batas Normal)" class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                </div>
                <button type="submit" class="w-full py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold shadow-sm transition-colors focus:outline-none">
                    <i class="fas fa-file-medical mr-1.5"></i>Simpan Hasil Lab ke Akun Pasien
                </button>
            </form>

            <!-- Daftar Hasil Lab pada Akun Pasien -->
            <div class="pt-3 border-t border-slate-100 space-y-2">
                <p class="text-[11px] font-bold text-slate-600 uppercase tracking-wider">Riwayat Hasil Lab yang Dikirim:</p>
                <div id="docIssuedLabsList" class="space-y-2 text-xs max-h-48 overflow-y-auto">
                    <p class="text-slate-400 text-xs py-3 text-center border border-dashed border-slate-200 rounded-xl">Belum ada hasil lab yang dicatat.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================================================== -->
    <!-- PANEL DOKTER 4: RIWAYAT PEMERIKSAAN PASIEN                         -->
    <!-- ================================================================== -->
    <div id="docPanelRiwayat" data-doc-panel="riwayat" class="hidden space-y-4">
        <div class="bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-3">
            <div class="border-b border-slate-100 pb-2.5">
                <h3 class="text-sm sm:text-base font-bold text-slate-800">
                    <i class="fas fa-notes-medical text-teal-600 mr-1.5"></i>Riwayat Pemeriksaan &amp; Konsultasi Selesai
                </h3>
                <p class="text-xs text-slate-500">Daftar rekam konsultasi pasien beserta diagnosis dokter yang telah selesai</p>
            </div>
            <div id="docCompletedHistoryList" class="space-y-2.5">
                <p class="text-slate-400 text-xs py-8 text-center border border-dashed border-slate-200 rounded-xl">Belum ada riwayat pemeriksaan selesai.</p>
            </div>
        </div>
    </div>

    <!-- ================================================================== -->
    <!-- D. PANEL DOKTER 5: PENGATURAN JADWAL PRAKTIK (`api/jadwal.php`)    -->
    <!-- ================================================================== -->
    <div id="docPanelProfilDokter" data-doc-panel="profil_dokter" class="hidden space-y-4">
        <div class="bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-4">
            <div class="border-b border-slate-100 pb-2.5">
                <h3 class="text-sm sm:text-base font-bold text-slate-800">
                    <i class="fas fa-clock text-teal-600 mr-1.5"></i>D. Pengaturan Jadwal Praktik &amp; Profil Dokter (`api/jadwal.php`)
                </h3>
                <p class="text-[11px] text-slate-500">Tambahkan atau ubah jam praktik Anda. Jadwal otomatis ter-update di halaman `jadwal_dokter.php` milik semua pasien.</p>
            </div>

            <!-- Daftar Jadwal Praktik Dokter Saat Ini -->
            <div id="docOwnPracticeSchedulesList" class="space-y-2 text-xs"></div>

            <form id="docUpdatePracticeProfileForm" class="space-y-3 text-xs pt-2 border-t border-slate-100">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label for="docProfileNameInput" class="block font-semibold text-slate-700 mb-1">Nama Dokter &amp; Gelar</label>
                        <input type="text" id="docProfileNameInput" value="" placeholder="Nama lengkap dokter" class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                    </div>
                    <div>
                        <label for="docProfileSpecInput" class="block font-semibold text-slate-700 mb-1">Spesialisasi Medis</label>
                        <input type="text" id="docProfileSpecInput" value="" placeholder="Spesialisasi medis" class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div>
                        <label for="docProfileHospitalInput" class="block font-semibold text-slate-700 mb-1">Rumah Sakit Praktik</label>
                        <input type="text" id="docProfileHospitalInput" value="" placeholder="Nama Rumah Sakit" class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                    </div>
                    <div>
                        <label for="docProfileHoursInput" class="block font-semibold text-slate-700 mb-1">Jam Praktik Layanan</label>
                        <input type="text" id="docProfileHoursInput" value="Senin - Sabtu 09:00 - 15:00 WIB" class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                    </div>
                    <div>
                        <label for="docProfileStatusSelect" class="block font-semibold text-slate-700 mb-1">Status Praktik</label>
                        <select id="docProfileStatusSelect" class="w-full px-3 py-2 border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600">
                            <option value="Aktif Praktik">Aktif Praktik</option>
                            <option value="Tersedia Terjadwal">Tersedia Terjadwal</option>
                            <option value="Sedang Istirahat">Sedang Istirahat</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold transition-colors focus:outline-none">
                        Simpan Profil Praktik Dokter
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<?php } ?>
