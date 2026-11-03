<!-- SUB-VIEW D: KEAMANAN AKUN (SANDI, PIN MEDIS, 2FA, WEB)-->
                <!-- ===================================================== -->
                <div id="securitySubView" class="hidden max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8 mt-5 space-y-5 animate-fade-in">
                    <!-- Top Bar Keamanan -->
                    <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200 flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center space-x-3">
                            <button type="button" class="back-to-dashboard-btn px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-gray-700 text-xs font-semibold flex items-center space-x-1.5">
                                <i class="fas fa-arrow-left"></i>
                                <span>Kembali</span>
                            </button>
                            <div>
                                <h2 class="text-sm sm:text-base font-bold text-gray-800">Pusat Keamanan Akun & Privasi Medis</h2>
                                <p class="text-[11px] text-gray-400">Kelola kata sandi, PIN Rekam Medis, Verifikasi 2 Langkah, dan proteksi sesi web</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2 bg-emerald-50 border border-emerald-200 px-3 py-1.5 rounded-xl">
                            <i class="fas fa-shield-alt text-emerald-600"></i>
                            <span class="text-xs font-semibold text-emerald-700">Skor Keamanan: <span id="securityScoreText">65%</span></span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
                        <!-- Kolom Kiri: Ubah Kata Sandi & PIN Rekam Medis -->
                        <div class="lg:col-span-6 space-y-5">
                            <!-- 1. Pengaturan Kata Sandi -->
                            <div class="bg-white rounded-2xl shadow-sm p-5 border border-slate-200">
                                <div class="flex items-center space-x-2.5 mb-3">
                                    <div class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                                        <i class="fas fa-key"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-bold text-gray-800">Pengaturan Kata Sandi</h3>
                                        <p class="text-[11px] text-gray-400">Perbarui kata sandi akun login Sehatin Anda</p>
                                    </div>
                                </div>
                                <form id="changePasswordForm" class="space-y-3">
                                    <div>
                                        <label for="secCurrentPass" class="block text-xs font-medium text-gray-600 mb-1">Kata Sandi Saat Ini</label>
                                        <input type="password" id="secCurrentPass" placeholder="Masukkan kata sandi saat ini" class="w-full px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                                    </div>
                                    <div>
                                        <label for="secNewPass" class="block text-xs font-medium text-gray-600 mb-1">Kata Sandi Baru (Min. 6 Karakter)</label>
                                        <input type="password" id="secNewPass" placeholder="Masukkan kata sandi baru" class="w-full px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                                        <div class="mt-1.5 flex items-center justify-between text-[10px]">
                                            <span class="text-gray-400">Kekuatan Kata Sandi:</span>
                                            <span id="passStrengthLabel" class="font-semibold text-gray-400">Belum Diisi</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="secConfirmPass" class="block text-xs font-medium text-gray-600 mb-1">Konfirmasi Kata Sandi Baru</label>
                                        <input type="password" id="secConfirmPass" placeholder="Ulangi kata sandi baru" class="w-full px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                                    </div>
                                    <button type="submit" class="w-full py-2.5 bg-teal-600 hover:bg-teal-700 text-white font-semibold text-xs rounded-xl shadow-sm transition-colors">
                                        Simpan Kata Sandi Baru
                                    </button>
                                </form>
                            </div>

                            <!-- 2. PIN Rekam Medis (6 Digit) -->
                            <div class="bg-white rounded-2xl shadow-sm p-5 border border-slate-200">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-2.5">
                                        <div class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-sm font-bold text-gray-800">PIN Rekam Medis (6 Digit)</h3>
                                            <p class="text-[11px] text-gray-400">Kunci ekstra untuk akses dokumen rekam medis & lab</p>
                                        </div>
                                    </div>
                                    <span id="pinStatusBadge" class="text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-gray-100 text-gray-500">Belum Aktif</span>
                                </div>

                                <form id="medicalPinForm" class="space-y-3">
                                    <div class="grid grid-cols-2 gap-2.5">
                                        <div>
                                            <label for="secMedicalPin" class="block text-xs font-medium text-gray-600 mb-1">Buat / Ubah 6 Digit PIN</label>
                                            <input type="password" id="secMedicalPin" maxlength="6" pattern="\d{6}" inputmode="numeric" placeholder="Contoh: 123456" class="w-full px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 tracking-widest" required>
                                        </div>
                                        <div>
                                            <label for="secMedicalPinConfirm" class="block text-xs font-medium text-gray-600 mb-1">Konfirmasi 6 Digit PIN</label>
                                            <input type="password" id="secMedicalPinConfirm" maxlength="6" pattern="\d{6}" inputmode="numeric" placeholder="Ulangi 6 digit PIN" class="w-full px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 tracking-widest" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="w-full py-2.5 bg-teal-600 hover:bg-teal-700 text-white font-semibold text-xs rounded-xl shadow-sm transition-colors">
                                        Aktifkan & Simpan PIN Rekam Medis
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Kolom Kanan: Verifikasi 2 Langkah & Keamanan Web Proper -->
                        <div class="lg:col-span-6 space-y-5">
                            <!-- 3. Verifikasi 2 Langkah (2FA) -->
                            <div class="bg-white rounded-2xl shadow-sm p-5 border border-slate-200">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-2.5">
                                        <div class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                                            <i class="fas fa-mobile-alt"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-sm font-bold text-gray-800">Verifikasi 2 Langkah (2FA)</h3>
                                            <p class="text-[11px] text-gray-400">Wajibkan kode OTP saat masuk dari perangkat baru</p>
                                        </div>
                                    </div>
                                    <button type="button" id="toggle2faBtn" class="px-3 py-1.5 rounded-xl text-xs font-semibold bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors">
                                        Nonaktif
                                    </button>
                                </div>

                                <div class="space-y-2.5 text-xs border-t border-slate-200 pt-3">
                                    <label class="block text-gray-600 font-medium">Metode Penerimaan Kode OTP:</label>
                                    <select id="twoFactorMethod" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-teal-600">
                                        <option value="SMS / WhatsApp ke Nomor Terdaftar">SMS / WhatsApp OTP</option>
                                        <option value="Email Resmi Pasien">Kode OTP via Email</option>
                                        <option value="Google / Microsoft Authenticator">Aplikasi Authenticator (TOTP)</option>
                                    </select>
                                    <p id="twoFactorStatusNote" class="text-[11px] text-gray-400">Aktifkan Verifikasi 2 Langkah untuk meningkatkan keamanan akun Anda.</p>
                                </div>
                            </div>

                            <!-- 4. Fitur Keamanan Web Proper (Sesi Perangkat, Notifikasi Login, Privasi Medis) -->
                            <div class="bg-white rounded-2xl shadow-sm p-5 border border-slate-200 space-y-4">
                                <div class="flex items-center space-x-2.5">
                                    <div class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                                        <i class="fas fa-laptop-medical"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-bold text-gray-800">Proteksi Sesi Web & Privasi Data</h3>
                                        <p class="text-[11px] text-gray-400">Kontrol perangkat yang masuk dan izin akses rekam medis</p>
                                    </div>
                                </div>

                                <!-- Sesi Perangkat Saat Ini (Real-time dari Browser) -->
                                <div class="bg-slate-50 rounded-xl p-3 border border-slate-200 flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <i class="fas fa-desktop text-teal-600 text-base"></i>
                                        <div>
                                            <p id="currentDeviceLabel" class="text-xs font-semibold text-gray-800">Sesi Browser Aktif Saat Ini</p>
                                            <p class="text-[10px] text-emerald-600 font-medium">● Sedang Aktif Sekarang</p>
                                        </div>
                                    </div>
                                    <button type="button" id="revokeOtherSessionsBtn" class="text-[11px] text-red-500 hover:underline font-medium">
                                        Keluar Sesi Lain
                                    </button>
                                </div>

                                <!-- Toggle Proteksi Tambahan -->
                                <div class="divide-y divide-gray-100 text-xs">
                                    <label class="py-2.5 flex items-center justify-between cursor-pointer">
                                        <div>
                                            <p class="font-semibold text-gray-700">Notifikasi Peringatan Login Baru</p>
                                            <p class="text-[10px] text-gray-400">Kirim peringatan saat akun dibuka pada browser baru</p>
                                        </div>
                                        <input type="checkbox" id="loginAlertToggle" checked class="rounded text-teal-600 focus:ring-teal-600 w-4 h-4">
                                    </label>
                                    <label class="py-2.5 flex items-center justify-between cursor-pointer">
                                        <div>
                                            <p class="font-semibold text-gray-700">Izin Akses Dokter Konsultan</p>
                                            <p class="text-[10px] text-gray-400">Izinkan dokter melihat ringkasan medis saat sesi konsultasi</p>
                                        </div>
                                        <input type="checkbox" id="doctorAccessToggle" checked class="rounded text-teal-600 focus:ring-teal-600 w-4 h-4">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
