<!-- MODAL 1: EDIT PROFIL & INDIKATOR MEDIS                    -->
        <!-- ========================================================= -->
        <div id="editProfileModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-lg w-full max-w-md overflow-hidden animate-fade-in">
                <div class="bg-teal-600 px-5 py-4 text-white flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-user-edit"></i>
                        <h3 class="text-sm font-bold">Edit Profil & Data Medis</h3>
                    </div>
                    <button type="button" id="closeEditProfileModalBtn" class="text-white/80 hover:text-white focus:outline-none">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form id="editProfileForm" class="p-5 space-y-3 max-h-[80vh] overflow-y-auto">
                    <div>
                        <label for="inputPatientName" class="block text-xs font-semibold text-gray-700 mb-1">Nama Lengkap Pasien</label>
                        <input type="text" id="inputPatientName" value="" placeholder="Masukkan nama lengkap pasien" class="w-full px-3 py-2 text-xs sm:text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                    </div>

                    <div class="grid grid-cols-2 gap-2.5">
                        <div>
                            <label for="inputBirthDate" class="block text-xs font-semibold text-gray-700 mb-1">Tanggal Lahir / Usia</label>
                            <input type="text" id="inputBirthDate" placeholder="Contoh: 14 Mei 1998" class="w-full px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600">
                        </div>
                        <div>
                            <label for="inputGender" class="block text-xs font-semibold text-gray-700 mb-1">Jenis Kelamin</label>
                            <select id="inputGender" class="w-full px-2.5 py-2 text-xs border border-gray-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600">
                                <option value="-">Pilih...</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-2.5">
                        <div>
                            <label for="inputBlood" class="block text-xs font-semibold text-gray-700 mb-1">Gol. Darah</label>
                            <select id="inputBlood" class="w-full px-2.5 py-2 text-xs sm:text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 bg-white">
                                <option value="-">-</option>
                                <option value="O+">O+</option>
                                <option value="A+">A+</option>
                                <option value="B+">B+</option>
                                <option value="AB+">AB+</option>
                                <option value="O-">O-</option>
                                <option value="A-">A-</option>
                            </select>
                        </div>
                        <div>
                            <label for="inputHeight" class="block text-xs font-semibold text-gray-700 mb-1">Tinggi (cm)</label>
                            <input type="number" id="inputHeight" value="0" min="0" max="250" class="w-full px-3 py-2 text-xs sm:text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600">
                        </div>
                        <div>
                            <label for="inputWeight" class="block text-xs font-semibold text-gray-700 mb-1">Berat (kg)</label>
                            <input type="number" id="inputWeight" value="0" min="0" max="250" class="w-full px-3 py-2 text-xs sm:text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-2.5">
                        <div>
                            <label for="inputAllergy" class="block text-xs font-semibold text-gray-700 mb-1">Riwayat Alergi</label>
                            <input type="text" id="inputAllergy" value="Tidak Ada" class="w-full px-3 py-2 text-xs sm:text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600">
                        </div>
                        <div>
                            <label for="inputPhone" class="block text-xs font-semibold text-gray-700 mb-1">Nomor Telepon</label>
                            <input type="text" id="inputPhone" placeholder="Contoh: 0812xxxx" class="w-full px-3 py-2 text-xs sm:text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600">
                        </div>
                    </div>

                    <div>
                        <label for="inputAddress" class="block text-xs font-semibold text-gray-700 mb-1">Alamat Domisili</label>
                        <input type="text" id="inputAddress" placeholder="Masukkan alamat domisili" class="w-full px-3 py-2 text-xs sm:text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600">
                    </div>

                    <div class="pt-2 flex space-x-2">
                        <button type="button" id="cancelEditProfileBtn" class="flex-1 py-2.5 rounded-xl border border-gray-200 text-gray-600 text-xs font-semibold hover:bg-gray-50">
                            Batal
                        </button>
                        <button type="submit" class="flex-1 py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold shadow-sm">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ========================================================= -->
        <!-- MODAL 2: GANTI PROFIL & FOTO AVATAR                       -->
        <!-- ========================================================= -->
        <div id="switchProfileModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-lg w-full max-w-md overflow-hidden animate-fade-in">
                <div class="bg-teal-600 px-5 py-4 text-white flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-user-circle"></i>
                        <h3 class="text-sm font-bold">Ganti Profil & Foto Avatar</h3>
                    </div>
                    <button type="button" id="closeSwitchProfileModalBtn" class="text-white/80 hover:text-white focus:outline-none">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="p-5 space-y-4">
                    <!-- Unggah Foto Profil dari Perangkat -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1.5">Unggah Foto Profil dari Perangkat</label>
                        <input
                            type="file"
                            id="uploadAvatarInput"
                            accept="image/*"
                            class="w-full text-xs text-gray-600 file:mr-3 file:py-2 file:px-3.5 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 cursor-pointer"
                        >
                    </div>

                    <!-- Pilih Ikon Avatar -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1.5">Atau Pilih Gaya Ikon Avatar</label>
                        <div class="grid grid-cols-4 gap-2">
                            <button type="button" data-avatar-icon="fa-user-alt" class="avatar-preset-btn py-2.5 rounded-xl border border-gray-200 hover:border-teal-500 text-teal-600 text-xl flex items-center justify-center">
                                <i class="fas fa-user-alt"></i>
                            </button>
                            <button type="button" data-avatar-icon="fa-user-md" class="avatar-preset-btn py-2.5 rounded-xl border border-gray-200 hover:border-teal-500 text-blue-600 text-xl flex items-center justify-center">
                                <i class="fas fa-user-md"></i>
                            </button>
                            <button type="button" data-avatar-icon="fa-user-nurse" class="avatar-preset-btn py-2.5 rounded-xl border border-gray-200 hover:border-teal-500 text-emerald-600 text-xl flex items-center justify-center">
                                <i class="fas fa-user-nurse"></i>
                            </button>
                            <button type="button" data-avatar-icon="fa-smile-beam" class="avatar-preset-btn py-2.5 rounded-xl border border-gray-200 hover:border-teal-500 text-teal-600 text-xl flex items-center justify-center">
                                <i class="fas fa-smile-beam"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Ganti Identitas Profil Aktif -->
                    <form id="switchProfileForm" class="space-y-3 border-t border-slate-200 pt-3">
                        <label for="newProfileNameInput" class="block text-xs font-semibold text-gray-700">Ganti Nama Profil Pasien Aktif</label>
                        <input
                            type="text"
                            id="newProfileNameInput"
                            placeholder="Ketik nama profil pasien baru..."
                            class="w-full px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600"
                            required
                        >
                        <button type="submit" class="w-full py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold shadow-sm">
                            Terapkan Pergantian Profil
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- ========================================================= -->
        <!-- MODAL 3: LUPA KATA SANDI (LIHAT PASSWORD BENAR & GANTI)   -->
        <!-- ========================================================= -->
        <div id="forgotPasswordModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-lg w-full max-w-md overflow-hidden animate-fade-in">
                <div class="bg-teal-600 px-5 py-4 text-white flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-unlock-alt"></i>
                        <h3 class="text-sm font-bold">Lupa & Pengaturan Ulang Kata Sandi</h3>
                    </div>
                    <button type="button" id="closeForgotModalBtn" class="text-white/80 hover:text-white focus:outline-none">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="p-5 space-y-4 max-h-[82vh] overflow-y-auto">
                    <!-- 1. Cari Akun untuk Melihat Password yang Benar -->
                    <form id="forgotLookupForm" class="space-y-2.5">
                        <label for="forgotIdentifierInput" class="block text-xs font-semibold text-gray-700">1. Masukkan Email / Nomor HP / Nama Pasien Terdaftar</label>
                        <div class="flex space-x-2">
                            <input
                                type="text"
                                id="forgotIdentifierInput"
                                placeholder="Ketik email, nomor HP, atau nama akun Anda"
                                class="flex-1 px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600"
                                required
                            >
                            <button type="submit" id="checkPasswordBtn" class="px-3.5 py-2 bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold rounded-xl shadow-sm shrink-0">
                                Cek Password
                            </button>
                        </div>
                    </form>

                    <!-- Alert Jika Akun Tidak Ditemukan -->
                    <div id="forgotErrorAlert" class="hidden bg-red-50 border border-red-200 text-red-600 text-xs rounded-xl p-3">
                        Akun tidak ditemukan. Pastikan Anda sudah mendaftar melalui menu <strong>Daftar Sekarang</strong>.
                    </div>

                    <!-- 2. Hasil Password yang Benar & Form Ganti Password -->
                    <div id="forgotResultSection" class="hidden space-y-4 pt-2 border-t border-slate-200">
                        <div class="bg-teal-50 border border-teal-200 rounded-xl p-3.5 space-y-2">
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-gray-500">Nama Akun Pasien:</span>
                                <span id="forgotFoundName" class="font-bold text-gray-800">-</span>
                            </div>
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-gray-500">Kata Sandi yang Benar Saat Ini:</span>
                                <span id="truePasswordDisplay" class="font-mono font-bold text-teal-700 bg-white px-2.5 py-1 rounded-lg border border-teal-200 text-sm">-</span>
                            </div>
                            <button
                                type="button"
                                id="useTruePasswordBtn"
                                class="w-full mt-1 py-2 bg-white hover:bg-teal-100 text-teal-700 border border-teal-300 font-semibold text-xs rounded-xl transition-colors"
                            >
                                <i class="fas fa-sign-in-alt mr-1"></i>Gunakan Password Ini di Kolom Login
                            </button>
                        </div>

                        <!-- Form Ganti Password Baru -->
                        <form id="forgotResetForm" class="space-y-3 border-t border-slate-200 pt-3">
                            <h4 class="text-xs font-bold text-gray-800"><i class="fas fa-key text-teal-600 mr-1.5"></i>2. Ingin Mengganti Kata Sandi Baru?</h4>
                            <div>
                                <label for="forgotNewPassInput" class="block text-xs font-medium text-gray-600 mb-1">Kata Sandi Baru (Min. 6 Karakter)</label>
                                <input
                                    type="password"
                                    id="forgotNewPassInput"
                                    placeholder="Masukkan kata sandi baru"
                                    class="w-full px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600"
                                    required
                                >
                            </div>
                            <div>
                                <label for="forgotConfirmPassInput" class="block text-xs font-medium text-gray-600 mb-1">Konfirmasi Kata Sandi Baru</label>
                                <input
                                    type="password"
                                    id="forgotConfirmPassInput"
                                    placeholder="Ulangi kata sandi baru"
                                    class="w-full px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600"
                                    required
                                >
                            </div>
                            <div id="forgotResetNotice" class="hidden text-xs font-medium text-emerald-600 bg-emerald-50 border border-emerald-200 rounded-xl p-2.5"></div>
                            <button type="submit" class="w-full py-2.5 bg-teal-600 hover:bg-teal-700 text-white font-semibold text-xs rounded-xl shadow-sm transition-colors">
                                Simpan & Ganti Kata Sandi
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========================================================= -->
        <!-- MODAL 4: POPUP INTERAKSI FITUR DASHBOARD                  -->
        <!-- ========================================================= -->
        <div id="featureModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-xl w-full max-w-xs sm:max-w-sm p-5 text-center animate-fade-in">
                <div class="w-12 h-12 rounded-full bg-teal-50 text-teal-600 flex items-center justify-center mx-auto mb-3 text-xl">
                    <i id="modalIcon" class="fas fa-check-circle"></i>
                </div>
                <h3 id="modalTitle" class="text-sm sm:text-base font-bold text-gray-800 mb-1">Nama Fitur</h3>
                <p id="modalDesc" class="text-xs text-gray-500 mb-4 leading-relaxed">Deskripsi fitur yang dipilih.</p>
                <button
                    type="button"
                    id="closeModalBtn"
                    class="w-full bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold py-2.5 rounded-xl shadow-sm transition-colors focus:outline-none"
                >
                    Tutup
                </button>
            </div>
        </div>
