<!-- SUB-VIEW A: KONTEN UTAMA DASHBOARD SEHATIN            -->
                <!-- ===================================================== -->
                <div id="mainDashboardSubView" class="max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8 mt-5 grid grid-cols-1 lg:grid-cols-12 gap-5 animate-fade-in">

                    <!-- KOLOM KIRI / UTAMA (7 Kolom di Laptop) -->
                    <div class="lg:col-span-7 space-y-4">

                        <!-- Section 1: Layanan Kesehatan -->
                        <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200">
                            <div class="flex justify-between items-center mb-3">
                                <h2 class="font-semibold text-gray-800 text-sm sm:text-base">Layanan Kesehatan</h2>
                                <button type="button" data-feature="Riwayat Layanan Kesehatan" data-desc="Belum ada riwayat pemeriksaan layanan kesehatan." class="feature-trigger text-xs text-gray-500 hover:text-teal-600 flex items-center cursor-pointer focus:outline-none">
                                    Lihat Riwayat <i class="fas fa-chevron-right ml-1 text-[10px]"></i>
                                </button>
                            </div>
                            <div class="grid grid-cols-4 gap-2 text-center">
                                <button type="button" id="gridDiagnosisBtn" class="nav-open-diagnosis flex flex-col items-center cursor-pointer group focus:outline-none active:scale-95 transition-transform py-2 rounded-xl hover:bg-gray-50">
                                    <div class="text-2xl text-teal-600 mb-1.5 group- transition-transform"><i class="fas fa-stethoscope"></i></div>
                                    <span class="text-[11px] sm:text-xs text-gray-700 font-medium">Diagnosis</span>
                                </button>
                                <button type="button" id="gridKonsultasiBtn" class="flex flex-col items-center cursor-pointer group focus:outline-none active:scale-95 transition-transform py-2 rounded-xl hover:bg-gray-50">
                                    <div class="text-2xl text-teal-600 mb-1.5 group- transition-transform"><i class="fas fa-user-md"></i></div>
                                    <span class="text-[11px] sm:text-xs text-gray-700 font-medium">Konsultasi</span>
                                </button>
                                <button type="button" id="gridEdukasiBtn" class="nav-open-edukasi flex flex-col items-center cursor-pointer group focus:outline-none active:scale-95 transition-transform py-2 rounded-xl hover:bg-gray-50">
                                    <div class="text-2xl text-teal-600 mb-1.5 group- transition-transform"><i class="fas fa-book-medical"></i></div>
                                    <span class="text-[11px] sm:text-xs text-gray-700 font-medium">Edukasi</span>
                                </button>
                                <button type="button" id="gridHealthyBtn" class="nav-open-healthy flex flex-col items-center cursor-pointer group focus:outline-none active:scale-95 transition-transform py-2 rounded-xl hover:bg-gray-50">
                                    <div class="text-2xl text-teal-600 mb-1.5 group- transition-transform"><i class="fas fa-heartbeat"></i></div>
                                    <span class="text-[11px] sm:text-xs text-gray-700 font-medium">Healthy</span>
                                </button>
                            </div>
                        </div>

                        <!-- Section 2: Rekam Medis (Masing-masing membuka Halaman Fitur Proper) -->
                        <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200">
                            <h2 class="font-semibold text-gray-800 text-sm sm:text-base mb-3">Rekam Medis</h2>
                            <div class="grid grid-cols-3 gap-2 text-center">
                                <button type="button" id="openResepPageBtn" class="flex flex-col items-center cursor-pointer group focus:outline-none active:scale-95 transition-transform py-2 rounded-xl hover:bg-slate-50">
                                    <div class="text-2xl text-teal-600 mb-1.5 group- transition-transform"><i class="fas fa-prescription-bottle-alt"></i></div>
                                    <span class="text-[11px] sm:text-xs text-gray-600 leading-tight font-medium">Resep<br>Obat</span>
                                </button>
                                <button type="button" id="openJadwalPageBtn" class="flex flex-col items-center cursor-pointer group focus:outline-none active:scale-95 transition-transform py-2 rounded-xl hover:bg-slate-50">
                                    <div class="text-2xl text-teal-600 mb-1.5 group- transition-transform"><i class="far fa-calendar-check"></i></div>
                                    <span class="text-[11px] sm:text-xs text-gray-600 leading-tight font-medium">Jadwal<br>Dokter</span>
                                </button>
                                <button type="button" id="openLabPageBtn" class="flex flex-col items-center cursor-pointer group relative focus:outline-none active:scale-95 transition-transform py-2 rounded-xl hover:bg-slate-50">
                                    <div class="text-2xl text-teal-600 mb-1.5 group- transition-transform"><i class="fas fa-vial"></i></div>
                                    <span class="text-[11px] sm:text-xs text-gray-600 leading-tight font-medium">Hasil<br>Lab</span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- KOLOM KANAN: PENGATURAN & AKUN SAYA (5 Kolom di Laptop) -->
                    <div class="lg:col-span-5 space-y-4">

                        <!-- Kartu Pengaturan & Akun Saya -->
                        <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200">
                            <h2 class="font-semibold text-gray-800 text-sm sm:text-base mb-2.5">Pengaturan & Akun Saya</h2>

                            <div class="divide-y divide-gray-100 text-xs sm:text-sm">
                                <!-- Akses Halaman Profil Medis & Data Diri -->
                                <button type="button" id="cardOpenProfileBtn" class="w-full py-3 flex items-center justify-between hover:bg-gray-50 px-2 rounded-lg transition-colors focus:outline-none">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-lg bg-teal-50 text-teal-600 flex items-center justify-center">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                        <div class="text-left">
                                            <p class="font-semibold text-gray-800 text-xs">Profil & Data Medis Saya</p>
                                            <p class="text-[10px] text-gray-400">Lihat data diri & ringkasan profil medis</p>
                                        </div>
                                    </div>
                                    <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                                </button>

                                <!-- Privasi & Keamanan Medis (Membuka Halaman Keamanan Akun Proper) -->
                                <button type="button" id="cardOpenSecurityBtn" class="w-full py-3 flex items-center justify-between hover:bg-gray-50 px-2 rounded-lg transition-colors focus:outline-none">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-lg bg-teal-50 text-teal-600 flex items-center justify-center">
                                            <i class="fas fa-user-shield"></i>
                                        </div>
                                        <div class="text-left">
                                            <p class="font-semibold text-gray-800 text-xs">Keamanan Akun & PIN Medis</p>
                                            <p class="text-[10px] text-gray-400">Kata sandi, PIN Rekam Medis & Verifikasi 2 Langkah</p>
                                        </div>
                                    </div>
                                    <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                                </button>
                            </div>

                            <!-- Tombol Keluar untuk Mobile/Tablet -->
                            <div class="mt-3 pt-3 border-t border-slate-200 md:hidden">
                                <button type="button" id="mobileCardLogoutBtn" class="w-full py-2.5 px-4 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 font-semibold text-xs flex items-center justify-center space-x-2 transition-colors focus:outline-none">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Keluar dari Akun</span>
                                </button>
                            </div>
                        </div>

                    </div>

                </div>

<!-- FALLBACK_ROLE_VIEWS_START -->
