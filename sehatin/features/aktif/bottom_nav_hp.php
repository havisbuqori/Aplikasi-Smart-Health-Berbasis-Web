<!-- BOTTOM NAVIGATION BAR (Menyesuaikan 3 Jenis Akun di Layar HP) -->
                <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-40 shadow-sm">
                    <!-- 1. Bottom Nav Khusus Pasien (User) -->
                    <div id="bottomNavUser" class="px-2 py-2 flex justify-between items-center text-gray-400">
                        <button type="button" data-nav="Beranda" class="nav-item nav-dashboard-home flex flex-col items-center text-teal-600 w-1/6 focus:outline-none">
                            <i class="fas fa-home text-base mb-0.5"></i>
                            <span class="text-[9px] font-medium">Beranda</span>
                        </button>
                        <button type="button" data-nav="Diagnosis" class="nav-item nav-open-diagnosis flex flex-col items-center hover:text-teal-600 transition-colors w-1/6 focus:outline-none">
                            <i class="fas fa-stethoscope text-base mb-0.5"></i>
                            <span class="text-[9px]">Diagnosis</span>
                        </button>
                        <button type="button" data-nav="Konsultasi" class="nav-item nav-open-chat flex flex-col items-center hover:text-teal-600 transition-colors w-1/6 focus:outline-none">
                            <i class="fas fa-comment-medical text-base mb-0.5"></i>
                            <span class="text-[9px]">Konsultasi</span>
                        </button>
                        <button type="button" data-nav="Edukasi" class="nav-item nav-open-edukasi flex flex-col items-center hover:text-teal-600 transition-colors w-1/6 focus:outline-none">
                            <i class="fas fa-newspaper text-base mb-0.5"></i>
                            <span class="text-[9px]">Edukasi</span>
                        </button>
                        <button type="button" data-nav="Healthy" class="nav-item nav-open-healthy flex flex-col items-center hover:text-teal-600 transition-colors w-1/6 focus:outline-none">
                            <i class="fas fa-heartbeat text-base mb-0.5"></i>
                            <span class="text-[9px]">Healthy</span>
                        </button>
                        <button type="button" data-nav="Notifikasi" class="nav-item nav-open-notifikasi flex flex-col items-center hover:text-teal-600 transition-colors w-1/6 relative focus:outline-none">
                            <i class="fas fa-bell text-base mb-0.5"></i>
                            <span class="text-[9px]">Notifikasi</span>
                            <span id="notifBadge" class="hidden absolute top-0 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                    </div>

                    <!-- 2. Bottom Nav Khusus Dokter -->
                    <div id="bottomNavDokter" class="hidden px-2 py-2 flex justify-between items-center text-gray-500">
                        <button type="button" data-doc-nav="overview" class="doc-nav-btn flex flex-col items-center text-teal-600 w-1/5 focus:outline-none">
                            <i class="fas fa-clinic-medical text-base mb-0.5"></i>
                            <span class="text-[9px] font-medium">Praktik</span>
                        </button>
                        <button type="button" data-doc-nav="antrean" class="doc-nav-btn flex flex-col items-center hover:text-teal-600 w-1/5 focus:outline-none">
                            <i class="fas fa-calendar-check text-base mb-0.5"></i>
                            <span class="text-[9px]">Antrean</span>
                        </button>
                        <button type="button" data-doc-nav="chat" class="doc-nav-btn flex flex-col items-center hover:text-teal-600 w-1/5 focus:outline-none">
                            <i class="fas fa-comments text-base mb-0.5"></i>
                            <span class="text-[9px]">Chat Pasien</span>
                        </button>
                        <button type="button" data-doc-nav="resep_lab" class="doc-nav-btn flex flex-col items-center hover:text-teal-600 w-1/5 focus:outline-none">
                            <i class="fas fa-prescription text-base mb-0.5"></i>
                            <span class="text-[9px]">Resep &amp; Lab</span>
                        </button>
                        <button type="button" data-doc-nav="profil_dokter" class="doc-nav-btn flex flex-col items-center hover:text-teal-600 w-1/5 focus:outline-none">
                            <i class="fas fa-user-md text-base mb-0.5"></i>
                            <span class="text-[9px]">Profil Dokter</span>
                        </button>
                    </div>

                    <!-- 3. Bottom Nav Khusus Admin -->
                    <div id="bottomNavAdmin" class="hidden px-2 py-2 flex justify-between items-center text-gray-500">
                        <button type="button" data-admin-nav="overview" class="admin-nav-btn flex flex-col items-center text-teal-600 w-1/4 focus:outline-none">
                            <i class="fas fa-tachometer-alt text-base mb-0.5"></i>
                            <span class="text-[9px] font-medium">Sistem</span>
                        </button>
                        <button type="button" data-admin-nav="accounts" class="admin-nav-btn flex flex-col items-center hover:text-teal-600 w-1/4 focus:outline-none">
                            <i class="fas fa-users-cog text-base mb-0.5"></i>
                            <span class="text-[9px]">Akun &amp; Pasien</span>
                        </button>
                        <button type="button" data-admin-nav="doctors" class="admin-nav-btn flex flex-col items-center hover:text-teal-600 w-1/4 focus:outline-none">
                            <i class="fas fa-hospital-user text-base mb-0.5"></i>
                            <span class="text-[9px]">Dokter RS</span>
                        </button>
                        <button type="button" data-admin-nav="tkpi" class="admin-nav-btn flex flex-col items-center hover:text-teal-600 w-1/4 focus:outline-none">
                            <i class="fas fa-database text-base mb-0.5"></i>
                            <span class="text-[9px]">Gizi TKPI</span>
                        </button>
                    </div>
                </div>
