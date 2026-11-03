<!-- SIDEBAR NAVIGASI (Menyesuaikan 3 Jenis Akun: Pasien, Dokter, atau Admin) -->
            <aside class="hidden md:flex md:w-64 lg:w-72 bg-white border-r border-gray-200 flex-col justify-between shrink-0 sticky top-0 h-screen overflow-y-auto">
                <div>
                    <!-- Brand Header Sehatin -->
                    <div class="p-6 border-b border-slate-200 flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-xl bg-teal-600 flex items-center justify-center text-white text-lg shadow-sm">
                                <i id="sidebarBrandIcon" class="fas fa-heartbeat"></i>
                            </div>
                            <div>
                                <h2 class="font-bold text-gray-800 text-lg leading-tight tracking-tight">Sehatin</h2>
                                <p id="sidebarRoleSubtitle" class="text-[11px] text-teal-600 font-semibold">Portal Pasien (User)</p>
                            </div>
                        </div>
                    </div>

                    <!-- ========================================================= -->
                    <!-- 1. MENU SIDEBAR KHUSUS AKUN PASIEN (USER)                 -->
                    <!-- ========================================================= -->
                    <div id="sidebarMenuUser" class="p-4 space-y-1">
                        <p class="px-3 text-[10px] font-semibold uppercase tracking-wider text-gray-400 mb-2">Menu Layanan Pasien</p>
                        <button type="button" data-nav="Beranda" class="nav-item nav-dashboard-home w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm bg-teal-50 text-teal-600 font-semibold transition-colors focus:outline-none">
                            <i class="fas fa-home w-5 text-center"></i>
                            <span id="sidebarHomeMenuLabel">Beranda Pasien</span>
                        </button>
                        <button type="button" data-nav="Diagnosis" class="nav-item nav-open-diagnosis w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                            <i class="fas fa-stethoscope w-5 text-center"></i>
                            <span>Diagnosis Gejala</span>
                        </button>
                        <button type="button" data-nav="Konsultasi" class="nav-item nav-open-chat w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                            <i class="fas fa-comment-medical w-5 text-center"></i>
                            <span>Konsultasi Dokter</span>
                        </button>
                        <!-- Sub-Menu Fitur Bagian Konsultasi Pasien -->
                        <div id="sidebarKonsultasiSubMenu" class="pl-4 ml-4 border-l-2 border-teal-100 space-y-0.5 py-1">
                            <button type="button" data-konsul-nav="daftar" class="konsul-subnav-btn w-full flex items-center space-x-2 px-2.5 py-1.5 rounded-lg text-xs text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                                <i class="fas fa-user-md w-4 text-center text-teal-500"></i>
                                <span>Daftar Dokter</span>
                            </button>
                            <button type="button" data-konsul-nav="jadwal" class="konsul-subnav-btn w-full flex items-center space-x-2 px-2.5 py-1.5 rounded-lg text-xs text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                                <i class="fas fa-calendar-check w-4 text-center text-teal-600"></i>
                                <span>Jadwal Konsultasi</span>
                            </button>
                            <button type="button" data-konsul-nav="ruang" class="konsul-subnav-btn w-full flex items-center space-x-2 px-2.5 py-1.5 rounded-lg text-xs text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                                <i class="fas fa-comments w-4 text-center text-teal-600"></i>
                                <span>Ruang Chat Dokter</span>
                            </button>
                            <button type="button" data-konsul-nav="riwayat" class="konsul-subnav-btn w-full flex items-center space-x-2 px-2.5 py-1.5 rounded-lg text-xs text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                                <i class="fas fa-history w-4 text-center text-teal-600"></i>
                                <span>Riwayat Konsultasi</span>
                            </button>
                        </div>
                        <button type="button" data-nav="Edukasi" class="nav-item nav-open-edukasi w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-newspaper w-5 text-center"></i>
                                <span>Edukasi Kesehatan</span>
                            </div>
                        </button>
                        <button type="button" data-nav="Healthy" class="nav-item nav-open-healthy w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-heartbeat w-5 text-center"></i>
                                <span>Healthy (Gizi TKPI)</span>
                            </div>
                        </button>
                        <button type="button" data-nav="Notifikasi" class="nav-item nav-open-notifikasi w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-bell w-5 text-center"></i>
                                <span>Notifikasi</span>
                            </div>
                            <span id="desktopNotifBadge" class="hidden bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">0 Baru</span>
                        </button>
                        <button type="button" data-nav="Saya" class="nav-item nav-profile-page w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                            <i class="fas fa-user w-5 text-center"></i>
                            <span>Profil &amp; Rekam Medis</span>
                        </button>
                    </div>

                    <!-- ========================================================= -->
                    <!-- 2. MENU SIDEBAR KHUSUS AKUN DOKTER                        -->
                    <!-- ========================================================= -->
                    <div id="sidebarMenuDokter" class="hidden p-4 space-y-1">
                        <p class="px-3 text-[10px] font-semibold uppercase tracking-wider text-teal-700 mb-2">Workspace Praktik Dokter</p>
                        <button type="button" data-doc-nav="overview" class="doc-nav-btn w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm bg-teal-50 text-teal-600 font-semibold transition-colors focus:outline-none">
                            <i class="fas fa-clinic-medical w-5 text-center"></i>
                            <span>Ringkasan Praktik</span>
                        </button>
                        <button type="button" data-doc-nav="antrean" class="doc-nav-btn w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-calendar-check w-5 text-center"></i>
                                <span>Antrean Jadwal Pasien</span>
                            </div>
                            <span id="sidebarDocQueueBadge" class="bg-teal-50 text-teal-700 border border-teal-200 text-[10px] font-bold px-2 py-0.5 rounded-full">0</span>
                        </button>
                        <button type="button" data-doc-nav="chat" class="doc-nav-btn w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-comments w-5 text-center"></i>
                                <span>Ruang Chat Pasien</span>
                            </div>
                            <span id="sidebarDocChatBadge" class="bg-teal-50 text-teal-700 border border-teal-200 text-[10px] font-bold px-2 py-0.5 rounded-full">0</span>
                        </button>
                        <button type="button" data-doc-nav="resep_lab" class="doc-nav-btn w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                            <i class="fas fa-prescription w-5 text-center"></i>
                            <span>Terbitkan e-Resep &amp; Lab</span>
                        </button>
                        <button type="button" data-doc-nav="riwayat" class="doc-nav-btn w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                            <i class="fas fa-notes-medical w-5 text-center"></i>
                            <span>Riwayat Pemeriksaan</span>
                        </button>
                        <button type="button" data-doc-nav="profil_dokter" class="doc-nav-btn w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                            <i class="fas fa-user-md w-5 text-center"></i>
                            <span>Profil Praktik Dokter</span>
                        </button>
                    </div>

                    <!-- ========================================================= -->
                    <!-- 3. MENU SIDEBAR KHUSUS AKUN ADMIN                         -->
                    <!-- ========================================================= -->
                    <div id="sidebarMenuAdmin" class="hidden p-4 space-y-1">
                        <p class="px-3 text-[10px] font-semibold uppercase tracking-wider text-teal-700 mb-2">Panel Kontrol Admin</p>
                        <button type="button" data-admin-nav="overview" class="admin-nav-btn w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm bg-teal-50 text-teal-600 font-semibold transition-colors focus:outline-none">
                            <i class="fas fa-tachometer-alt w-5 text-center"></i>
                            <span>Ringkasan Sistem</span>
                        </button>
                        <button type="button" data-admin-nav="accounts" class="admin-nav-btn w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                            <i class="fas fa-users-cog w-5 text-center"></i>
                            <span>Akun &amp; Data Pasien</span>
                        </button>
                        <button type="button" data-admin-nav="doctors" class="admin-nav-btn w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                            <i class="fas fa-hospital-user w-5 text-center"></i>
                            <span>Direktori Dokter RS</span>
                        </button>
                        <button type="button" data-admin-nav="tkpi" class="admin-nav-btn w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 transition-colors focus:outline-none">
                            <i class="fas fa-database w-5 text-center"></i>
                            <span>Database Gizi TKPI</span>
                        </button>
                    </div>
                </div>

                <!-- Sidebar Footer -->
                <div class="p-4 border-t border-slate-200">
                    <button type="button" id="sidebarLogoutBtn" class="w-full flex items-center justify-center space-x-2 px-4 py-2.5 rounded-xl text-xs font-semibold text-red-600 bg-red-50 hover:bg-red-100 transition-colors focus:outline-none">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Keluar dari Akun</span>
                    </button>
                </div>
            </aside>
