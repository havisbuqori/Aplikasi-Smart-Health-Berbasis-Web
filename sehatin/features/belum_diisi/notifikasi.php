<!-- ====================================================================== -->
<!-- MODUL PUSAT NOTIFIKASI PENGGUNA SEHATIN (TANPA DATA DUMMY)             -->
<!-- ====================================================================== -->
<div id="featureNotifikasiSubView" class="unfilled-feature-view hidden max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8 mt-5 space-y-4 animate-fade-in">
    <!-- Header Pusat Notifikasi -->
    <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200 flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center space-x-3">
            <button type="button" class="back-to-dashboard-btn px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold flex items-center space-x-1.5 transition-colors focus:outline-none">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Beranda</span>
            </button>
            <div>
                <div class="flex items-center space-x-2">
                    <h2 class="text-sm sm:text-base font-bold text-slate-800">Pusat Notifikasi &amp; Pengingat Kesehatan</h2>
                    <span id="notifPageUnreadBadge" class="bg-slate-100 text-slate-600 text-[10px] font-semibold px-2.5 py-0.5 rounded-full">
                        0 Belum Dibaca
                    </span>
                </div>
                <p class="text-[11px] text-slate-500">Bersih tanpa data dummy — pemberitahuan hanya muncul saat ada aktivitas jadwal dokter, resep obat, hasil lab, atau catatan nutrisi harian</p>
            </div>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <button
                type="button"
                id="markAllNotifReadBtn"
                class="px-3 py-1.5 rounded-xl bg-teal-50 hover:bg-teal-100 text-teal-700 border border-teal-200 text-xs font-semibold flex items-center space-x-1.5 transition-colors focus:outline-none"
            >
                <i class="fas fa-check-double"></i>
                <span>Tandai Semua Dibaca</span>
            </button>
            <button
                type="button"
                id="toggleNotifSettingsBtn"
                class="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold flex items-center space-x-1.5 transition-colors focus:outline-none"
            >
                <i class="fas fa-sliders-h"></i>
                <span>Pengaturan Notifikasi</span>
            </button>
            <button
                type="button"
                id="clearAllNotifBtn"
                class="px-3 py-1.5 rounded-xl border border-slate-200 hover:bg-red-50 hover:text-red-600 text-slate-500 text-xs font-semibold transition-colors focus:outline-none"
            >
                <i class="fas fa-trash-alt mr-1"></i>Bersihkan
            </button>
        </div>
    </div>

    <!-- Panel Pengaturan Preferensi Notifikasi (Collapsible) -->
    <div id="notifSettingsPanel" class="hidden bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-3">
        <div class="flex items-center justify-between border-b border-slate-100 pb-2.5">
            <div>
                <h3 class="text-xs sm:text-sm font-bold text-slate-800"><i class="fas fa-bell text-teal-600 mr-1.5"></i>Pengaturan Preferensi Notifikasi Aplikasi</h3>
                <p class="text-[11px] text-slate-500">Atur jenis pemberitahuan otomatis yang ingin Anda terima saat beraktivitas di aplikasi Sehatin</p>
            </div>
            <button type="button" id="closeNotifSettingsBtn" class="text-xs text-slate-400 hover:text-slate-600 font-semibold">Tutup</button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
            <label class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200 cursor-pointer">
                <div>
                    <span class="font-bold text-slate-800 block">Notifikasi Jadwal &amp; Chat Dokter</span>
                    <span class="text-[11px] text-slate-500">Muncul saat Anda membuat jadwal konsultasi atau memulai chat dokter</span>
                </div>
                <input type="checkbox" id="prefNotifKonsultasi" checked class="w-4 h-4 accent-teal-600 rounded">
            </label>
            <label class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200 cursor-pointer">
                <div>
                    <span class="font-bold text-slate-800 block">Notifikasi Resep Obat</span>
                    <span class="text-[11px] text-slate-500">Muncul saat ada resep obat baru dari dokter</span>
                </div>
                <input type="checkbox" id="prefNotifObat" checked class="w-4 h-4 accent-teal-600 rounded">
            </label>
            <label class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200 cursor-pointer">
                <div>
                    <span class="font-bold text-slate-800 block">Notifikasi Nutrisi Harian &amp; Air Minum</span>
                    <span class="text-[11px] text-slate-500">Muncul saat Anda mencatat asupan nutrisi makanan atau menghitung target kalori</span>
                </div>
                <input type="checkbox" id="prefNotifHealthy" checked class="w-4 h-4 accent-teal-600 rounded">
            </label>
            <label class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200 cursor-pointer">
                <div>
                    <span class="font-bold text-slate-800 block">Notifikasi Hasil Lab &amp; Sistem</span>
                    <span class="text-[11px] text-slate-500">Muncul saat hasil lab dicatat atau ada informasi dari sistem</span>
                </div>
                <input type="checkbox" id="prefNotifSistem" checked class="w-4 h-4 accent-teal-600 rounded">
            </label>
        </div>
    </div>

    <!-- Bar Filter Kategori Notifikasi & Buat Pengingat Kustom -->
    <div class="bg-white rounded-2xl shadow-sm p-3.5 border border-slate-200 flex flex-wrap items-center justify-between gap-2.5">
        <div class="flex flex-wrap items-center gap-1.5" id="notifFilterTabs">
            <button type="button" data-notif-filter="ALL" class="notif-filter-btn px-3 py-1.5 rounded-xl text-xs font-semibold bg-teal-600 text-white transition-colors">
                Semua Notifikasi
            </button>
            <button type="button" data-notif-filter="UNREAD" class="notif-filter-btn px-3 py-1.5 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">
                Belum Dibaca
            </button>
            <button type="button" data-notif-filter="KONSULTASI" class="notif-filter-btn px-3 py-1.5 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">
                <i class="fas fa-user-md mr-1"></i>Konsultasi &amp; Dokter
            </button>
            <button type="button" data-notif-filter="OBAT" class="notif-filter-btn px-3 py-1.5 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">
                <i class="fas fa-pills mr-1"></i>Obat &amp; Resep
            </button>
            <button type="button" data-notif-filter="HEALTHY" class="notif-filter-btn px-3 py-1.5 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">
                <i class="fas fa-apple-alt mr-1"></i>Nutrisi &amp; Healthy
            </button>
            <button type="button" data-notif-filter="SISTEM" class="notif-filter-btn px-3 py-1.5 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">
                <i class="fas fa-shield-alt mr-1"></i>Lab &amp; Sistem
            </button>
        </div>

        <button
            type="button"
            id="toggleAddCustomReminderBtn"
            class="px-3 py-1.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold flex items-center space-x-1.5 shadow-sm transition-colors"
        >
            <i class="fas fa-plus-circle"></i>
            <span>Buat Pengingat Baru</span>
        </button>
    </div>

    <!-- Form Tambah Pengingat Kesehatan Kustom (Collapsible) -->
    <form id="addCustomReminderForm" class="hidden bg-white rounded-2xl shadow-sm p-4 border border-teal-200 space-y-3">
        <div class="flex items-center justify-between">
            <h4 class="text-xs font-bold text-teal-700 uppercase tracking-wider"><i class="fas fa-bell mr-1.5"></i>Buat Pengingat / Notifikasi Kesehatan Baru</h4>
            <span class="text-[10px] text-slate-400">Langsung tampil di daftar notifikasi</span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <input type="text" id="customNotifTitleInput" placeholder="Judul Pengingat (cth: Minum Obat Setelah Makan Malam)" class="px-3 py-2 text-xs border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
            <select id="customNotifCategorySelect" class="px-3 py-2 text-xs border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600">
                <option value="OBAT">Kategori: Obat &amp; Resep</option>
                <option value="KONSULTASI">Kategori: Konsultasi &amp; Dokter</option>
                <option value="HEALTHY">Kategori: Nutrisi &amp; Healthy</option>
                <option value="SISTEM">Kategori: Lab &amp; Sistem</option>
            </select>
            <input type="text" id="customNotifDescInput" placeholder="Detail pesan pengingat..." class="px-3 py-2 text-xs border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
        </div>
        <div class="flex justify-end space-x-2">
            <button type="button" id="cancelCustomReminderBtn" class="px-3 py-1.5 rounded-xl border border-slate-200 text-slate-600 text-xs font-semibold hover:bg-slate-50">Batal</button>
            <button type="submit" class="px-4 py-1.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold">Simpan Pengingat</button>
        </div>
    </form>

    <!-- Daftar Notifikasi Aplikasi (Hanya Tampil Jika Memang Ada Notifikasi) -->
    <div class="hidden bg-white rounded-2xl shadow-sm border border-slate-200 divide-y divide-slate-100 overflow-hidden" id="notifListContainer"></div>

    <!-- Empty State Default (Bersih Tanpa Data Dummy) -->
    <div id="emptyNotifState" class="bg-white rounded-2xl shadow-sm p-10 border border-slate-200 text-center">
        <div class="w-14 h-14 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center mx-auto mb-3 text-2xl">
            <i class="far fa-bell"></i>
        </div>
        <h3 class="text-sm font-bold text-slate-800">Belum Ada Notifikasi</h3>
        <p class="text-xs text-slate-500 mt-1 max-w-md mx-auto leading-relaxed">
            Halaman ini bersih tanpa data dummy. Notifikasi akan masuk secara otomatis ketika ada aktivitas nyata (seperti membuat jadwal konsultasi, memulai chat dokter, menerima resep obat, atau mencatat nutrisi harian).
        </p>
    </div>
</div>
