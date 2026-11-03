<!-- 1. Header Dashboard Utama (Menyesuaikan Peran Terkunci: User, Dokter, atau Admin) -->
                <div id="mainDashboardHeader" class="bg-teal-600 pt-5 pb-6 px-4 sm:px-6 lg:px-8 relative rounded-b-2xl md:rounded-none shadow-sm">
                    <div class="max-w-6xl mx-auto">
                        <!-- Top Bar: Brand + Locked Role Badge + Action Icons -->
                        <div class="flex flex-wrap items-center justify-between gap-2 text-white mb-4">
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="text-xs sm:text-sm font-bold bg-white/15 px-3 py-1 rounded-full backdrop-blur-sm flex items-center">
                                    <i class="fas fa-heartbeat mr-1.5"></i>Sehatin
                                </span>
                                <span id="headerActiveRoleBadge" class="text-[11px] font-bold bg-white text-teal-700 px-3 py-1 rounded-full shadow-sm">
                                    PORTAL PASIEN (USER)
                                </span>
                                <span id="headerSecurityLockBadge" class="text-[10px] font-medium bg-teal-700 text-teal-50 px-2.5 py-1 rounded-full border border-white/20 hidden sm:inline-flex items-center">
                                    <i class="fas fa-lock mr-1 text-[9px]"></i>Sesi Terkunci Sesuai Peran Login
                                </span>
                            </div>

                            <div class="flex items-center space-x-4 sm:space-x-5 text-xl">
                                <div class="relative">
                                    <button
                                        type="button"
                                        id="settingsToggleBtn"
                                        class="focus:outline-none transition-transform"
                                        aria-label="Pengaturan"
                                    >
                                        <i class="fas fa-cog cursor-pointer"></i>
                                    </button>
                                    <!-- Menu Akun Dropdown -->
                                    <div id="settingsMenu" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl py-2 z-50 text-gray-700 text-sm border border-slate-200">
                                        <div id="patientOnlySettingsMenu">
                                            <button type="button" id="menuEditProfileBtn" class="w-full text-left block px-4 py-2 hover:bg-gray-50">
                                                <i class="fas fa-user-circle mr-2 text-teal-500"></i> Profil &amp; Rekam Medis
                                            </button>
                                            <button type="button" id="menuSwitchProfileBtn" class="w-full text-left block px-4 py-2 hover:bg-gray-50">
                                                <i class="fas fa-camera-retro mr-2 text-teal-600"></i> Ubah Foto Profil
                                            </button>
                                            <button type="button" id="menuSecurityBtn" class="w-full text-left block px-4 py-2 hover:bg-gray-50">
                                                <i class="fas fa-shield-alt mr-2 text-teal-600"></i> Keamanan Akun
                                            </button>
                                            <div class="border-t border-slate-200 my-1"></div>
                                        </div>
                                        <button type="button" id="logoutBtn" class="w-full text-left block px-4 py-2 hover:bg-red-50 text-red-500 font-medium">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Keluar / Ganti Akun Login
                                        </button>
                                    </div>
                                </div>
                                <!-- Tombol Buka Halaman Pusat Notifikasi -->
                                <button
                                    type="button"
                                    id="openNotifPageBtn"
                                    class="nav-open-notifikasi relative cursor-pointer focus:outline-none active:scale-90 transition-transform"
                                    aria-label="Notifikasi"
                                    title="Buka Pusat Notifikasi"
                                >
                                    <i class="fas fa-bell"></i>
                                    <span id="headerNotifBadge" class="hidden bg-red-500 text-white text-[9px] font-bold px-1.5 py-0.2 rounded-full border border-white absolute -top-1.5 -right-2">0</span>
                                </button>
                                <!-- Tombol Buka Halaman Pesan & Chat -->
                                <button
                                    type="button"
                                    id="openChatPageBtn"
                                    class="relative cursor-pointer focus:outline-none active:scale-90 transition-transform"
                                    aria-label="Ruang Konsultasi"
                                    title="Buka Ruang Konsultasi"
                                >
                                    <i class="fas fa-comment-dots"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Info Identitas Akun yang Sedang Login -->
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 text-white">
                            <div class="flex items-center">
                                <!-- Avatar -->
                                <div class="relative group shrink-0">
                                    <button
                                        type="button"
                                        id="avatarOpenProfileBtn"
                                        class="w-16 h-16 sm:w-20 sm:h-20 bg-white rounded-full flex items-center justify-center text-teal-600 text-2xl sm:text-3xl border-2 border-white/60 shadow-md overflow-hidden focus:outline-none active:scale-95 transition-transform"
                                        title="Identitas Akun"
                                    >
                                        <img id="headerAvatarImg" src="" alt="Foto Profil" class="hidden w-full h-full object-cover">
                                        <i id="headerAvatarIcon" class="fas fa-user-alt"></i>
                                    </button>
                                    <button
                                        type="button"
                                        id="quickChangeAvatarBtn"
                                        class="absolute -bottom-1 -right-1 w-7 h-7 rounded-full bg-teal-700 hover:bg-teal-800 text-white text-xs flex items-center justify-center border-2 border-white shadow focus:outline-none"
                                        title="Ubah Foto Profil"
                                    >
                                        <i class="fas fa-camera text-[10px]"></i>
                                    </button>
                                </div>

                                <div class="ml-3.5 sm:ml-4">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <h1 id="displayPatientName" class="font-bold text-lg sm:text-2xl cursor-pointer hover:underline">-</h1>
                                        <span class="bg-white/20 text-white text-[10px] sm:text-xs font-medium px-2.5 py-0.5 rounded-full">
                                            <span id="headerIdPrefixLabel">No. RM:</span> <span id="displayRmNumber">-</span>
                                        </span>
                                    </div>
                                    <p id="displayPatientContact" class="text-xs text-teal-50 mt-0.5">-</p>

                                    <!-- Counter Khusus Pasien -->
                                    <div id="headerPatientCountersRow" class="text-xs text-white mt-2 flex flex-wrap gap-2.5">
                                        <button type="button" id="headerJadwalCounterBtn" class="bg-white/15 hover:bg-white/25 px-2.5 py-1 rounded-lg transition-colors focus:outline-none">
                                            <i class="fas fa-calendar-check mr-1"></i><span id="headerJadwalCount">0</span> Jadwal Konsultasi
                                        </button>
                                        <button type="button" id="headerResepCounterBtn" class="bg-white/15 hover:bg-white/25 px-2.5 py-1 rounded-lg transition-colors focus:outline-none">
                                            <i class="fas fa-prescription-bottle-alt mr-1"></i><span id="headerResepCount">0</span> Resep Obat
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Aksi Kanan Header (Menyesuaikan Peran) -->
                            <div id="headerPatientActionsGroup" class="flex flex-wrap sm:justify-end gap-2">
                                <button
                                    type="button"
                                    id="openSwitchProfileBtn"
                                    class="flex-1 sm:flex-initial bg-white/15 hover:bg-white/25 text-white border border-white/30 font-semibold text-xs px-3.5 py-2.5 rounded-xl flex items-center justify-center space-x-1.5 transition-colors focus:outline-none"
                                >
                                    <i class="fas fa-camera"></i>
                                    <span>Foto Profil</span>
                                </button>
                                <button
                                    type="button"
                                    id="openProfilePageBtn"
                                    class="flex-1 sm:flex-initial bg-white text-teal-600 hover:bg-teal-50 font-semibold text-xs px-4 py-2.5 rounded-xl shadow-sm flex items-center justify-center space-x-2 transition-colors focus:outline-none"
                                >
                                    <i class="fas fa-id-card"></i>
                                    <span>Rekam Medis &amp; Profil</span>
                                </button>
                            </div>

                            <!-- Tombol Aksi Khusus Saat Login Sebagai Dokter atau Admin -->
                            <div id="headerStaffActionsGroup" class="hidden flex flex-wrap sm:justify-end gap-2">
                                <button
                                    type="button"
                                    id="headerStaffQuickLogoutBtn"
                                    class="bg-white text-teal-700 hover:bg-teal-50 font-semibold text-xs px-4 py-2.5 rounded-xl shadow-sm flex items-center justify-center space-x-2 transition-colors focus:outline-none"
                                >
                                    <i class="fas fa-sign-out-alt text-red-500"></i>
                                    <span>Keluar &amp; Ganti Akun</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
