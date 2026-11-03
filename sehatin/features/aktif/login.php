<?php
/**
 * FILE: features/aktif/login.php
 * Tampilan Login & Registrasi Pasien Baru yang Disederhanakan (Tahap 2)
 * - Centered Minimalist Card (1 Kartu Bersih di Tengah Layar)
 * - Tanpa Pilihan/Dropdown Role (Role Dideteksi Otomatis dari Database)
 * - Hanya 2 Tab Sederhana:
 *   1. Tab "Masuk" (Untuk Pasien, Dokter, maupun 2 Akun Admin)
 *   2. Tab "Daftar Pasien Baru" (Otomatis Terkunci `role = 'pasien'`)
 */
$hideLoginView = !empty($_SESSION['user_id']) && !empty($_SESSION['role']);
?>
<!-- VIEW 1: CENTERED MINIMALIST LOGIN & REGISTER CARD -->
<div id="loginView" class="<?php echo $hideLoginView ? 'hidden ' : ''; ?>flex-1 flex items-center justify-center p-4 sm:p-6 bg-slate-100 min-h-screen">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

        <!-- Header Brand Sehatin -->
        <div class="bg-teal-700 px-6 py-6 text-center text-white">
            <div class="w-12 h-12 bg-white/15 backdrop-blur-sm rounded-2xl flex items-center justify-center text-white text-2xl mx-auto mb-3 shadow-sm border border-white/20">
                <i class="fas fa-heartbeat"></i>
            </div>
            <h1 class="text-xl font-bold tracking-tight">Sehatin</h1>
            <p class="text-xs text-teal-100 mt-1">Layanan Kesehatan Digital Terintegrasi</p>
        </div>

        <!-- Navigasi 2 Tab Sederhana: "Masuk" & "Daftar Pasien Baru" -->
        <div class="grid grid-cols-2 bg-slate-100 p-1.5 m-6 mb-0 rounded-xl border border-slate-200">
            <button
                type="button"
                id="tabMasukBtn"
                class=" py-2.5 px-3 rounded-lg text-xs font-semibold transition-all focus:outline-none bg-white text-teal-700 shadow-sm"
            >
                <i class="fas fa-sign-in-alt mr-1.5"></i>Masuk
            </button>
            <button
                type="button"
                id="tabDaftarPasienBtn"
                class="py-2.5 px-3 rounded-lg text-xs font-semibold transition-all focus:outline-none text-slate-600 hover:text-teal-700"
            >
                <i class="fas fa-user-plus mr-1.5"></i>Daftar Pasien Baru
            </button>
        </div>

        <!-- Body Kartu -->
        <div class="p-6 sm:p-7">

            <!-- ========================================================= -->
            <!-- TAB 1: MASUK (OTOMATIS DETEKSI ROLE PASIEN / DOKTER / ADMIN) -->
            <!-- ========================================================= -->
            <div id="loginFormContainer" class="space-y-4">
                <div>
                    <h2 class="text-base font-bold text-slate-800">Masuk ke Akun Anda</h2>
                    <p class="text-xs text-slate-500 mt-0.5">
                        Masukkan email dan kata sandi Anda. Sistem mendeteksi akses akun secara otomatis.
                    </p>
                </div>

                <!-- Notifikasi Sukses -->
                <div id="loginSuccess" class="hidden bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs rounded-xl p-3 flex items-start space-x-2">
                    <i class="fas fa-check-circle mt-0.5 text-emerald-500 shrink-0"></i>
                    <span id="loginSuccessText">Pendaftaran berhasil. Silakan masuk.</span>
                </div>

                <!-- Notifikasi Error -->
                <div id="loginError" class="hidden bg-red-50 border border-red-200 text-red-600 text-xs rounded-xl p-3 flex items-start space-x-2">
                    <i class="fas fa-exclamation-circle mt-0.5 text-red-500 shrink-0"></i>
                    <span id="loginErrorText">Email atau kata sandi tidak sesuai.</span>
                </div>

                <form id="loginForm" class="space-y-4" novalidate>
                    <div>
                        <label for="userIdentifier" class="block text-xs font-semibold text-slate-700 mb-1.5">Alamat Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input
                                type="email"
                                id="userIdentifier"
                                name="email"
                                placeholder="nama@email.com"
                                autocomplete="username"
                                class="w-full pl-10 pr-4 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 focus:bg-white transition-all text-slate-800"
                                required
                            >
                        </div>
                    </div>

                    <div>
                        <label for="userPassword" class="block text-xs font-semibold text-slate-700 mb-1.5">Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input
                                type="password"
                                id="userPassword"
                                name="password"
                                placeholder="Masukkan password Anda"
                                autocomplete="current-password"
                                class="w-full pl-10 pr-10 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 focus:bg-white transition-all text-slate-800"
                                required
                            >
                            <button
                                type="button"
                                id="togglePasswordBtn"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-teal-600 focus:outline-none"
                                aria-label="Tampilkan atau sembunyikan password"
                            >
                                <i id="togglePasswordIcon" class="fas fa-eye text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <button
                        type="submit"
                        id="submitLoginBtn"
                        class="w-full bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2.5 rounded-xl shadow-sm hover:shadow transition-all flex items-center justify-center space-x-2 text-sm"
                    >
                        <span id="submitLoginBtnText">Masuk</span>
                        <i class="fas fa-arrow-right text-xs"></i>
                    </button>
                </form>

                <div class="text-center pt-2 border-t border-slate-100">
                    <p class="text-xs text-slate-500">
                        Pasien baru belum punya akun?
                        <button type="button" id="registerLinkBtn" class="text-teal-600 font-semibold hover:underline ml-0.5">
                            Daftar Pasien Baru
                        </button>
                    </p>
                </div>
            </div>

            <!-- ========================================================= -->
            <!-- TAB 2: DAFTAR PASIEN BARU (KHUSUS ROLE = 'pasien')         -->
            <!-- ========================================================= -->
            <div id="registerFormContainer" class="hidden space-y-4">
                <div>
                    <h2 class="text-base font-bold text-slate-800">Daftar Akun Pasien Baru</h2>
                    <p class="text-xs text-slate-500 mt-0.5">
                        Lengkapi data di bawah ini untuk membuat akun layanan kesehatan pasien.
                    </p>
                </div>

                <!-- Notifikasi Error Registrasi -->
                <div id="registerError" class="hidden bg-red-50 border border-red-200 text-red-600 text-xs rounded-xl p-3 flex items-start space-x-2">
                    <i class="fas fa-exclamation-circle mt-0.5 text-red-500 shrink-0"></i>
                    <span id="registerErrorText">Mohon lengkapi seluruh kolom pendaftaran.</span>
                </div>

                <form id="registerForm" class="space-y-3.5" novalidate>
                    <div>
                        <label for="regFullName" class="block text-xs font-semibold text-slate-700 mb-1">Nama Lengkap</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">
                                <i class="fas fa-user"></i>
                            </span>
                            <input
                                type="text"
                                id="regFullName"
                                name="nama_lengkap"
                                placeholder="Masukkan nama lengkap sesuai KTP"
                                class="w-full pl-10 pr-4 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 focus:bg-white transition-all text-slate-800"
                                required
                            >
                        </div>
                    </div>

                    <div>
                        <label for="regIdentifier" class="block text-xs font-semibold text-slate-700 mb-1">Alamat Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input
                                type="email"
                                id="regIdentifier"
                                name="email"
                                placeholder="nama@email.com"
                                autocomplete="email"
                                class="w-full pl-10 pr-4 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 focus:bg-white transition-all text-slate-800"
                                required
                            >
                        </div>
                    </div>

                    <div>
                        <label for="regPhone" class="block text-xs font-semibold text-slate-700 mb-1">Nomor HP / WhatsApp</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">
                                <i class="fas fa-phone-alt"></i>
                            </span>
                            <input
                                type="tel"
                                id="regPhone"
                                name="no_hp"
                                placeholder="Contoh: 081234567890"
                                class="w-full pl-10 pr-4 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 focus:bg-white transition-all text-slate-800"
                                required
                            >
                        </div>
                    </div>

                    <div>
                        <label for="regPassword" class="block text-xs font-semibold text-slate-700 mb-1">Password Baru</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input
                                type="password"
                                id="regPassword"
                                name="password"
                                placeholder="Minimal 6 karakter"
                                autocomplete="new-password"
                                class="w-full pl-10 pr-10 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 focus:bg-white transition-all text-slate-800"
                                required
                            >
                            <button
                                type="button"
                                id="toggleRegPasswordBtn"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-teal-600 focus:outline-none"
                                aria-label="Tampilkan atau sembunyikan password"
                            >
                                <i id="toggleRegPasswordIcon" class="fas fa-eye text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Elemen tersembunyi untuk menjaga kompatibilitas selector script lama sebelum Tahap 3 -->
                    <input type="hidden" id="regConfirmPassword" value="">
                    <input type="hidden" id="regBirthDate" value="-">
                    <input type="hidden" id="regGender" value="-">
                    <input type="hidden" id="regAddress" value="-">
                    <input type="checkbox" id="regTermsCheck" checked class="hidden">
                    <button type="button" id="topBackToLoginBtn" class="hidden"></button>
                    <button type="button" id="forgotPasswordBtn" class="hidden"></button>

                    <button
                        type="submit"
                        id="submitRegisterBtn"
                        class="w-full bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2.5 rounded-xl shadow-sm hover:shadow transition-all flex items-center justify-center space-x-2 text-sm"
                    >
                        <i class="fas fa-user-plus text-xs"></i>
                        <span id="submitRegisterBtnText">Daftar Sekarang</span>
                    </button>
                </form>

                <div class="text-center pt-2 border-t border-slate-100">
                    <p class="text-xs text-slate-500">
                        Sudah punya akun terdaftar?
                        <button type="button" id="backToLoginBtn" class="text-teal-600 font-semibold hover:underline ml-0.5">
                            Masuk di Sini
                        </button>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Controller Interaksi Tab & Otentikasi Langsung ke `api/auth.php` -->
<script>
(function () {
    const tabMasukBtn         = document.getElementById('tabMasukBtn');
    const tabDaftarPasienBtn  = document.getElementById('tabDaftarPasienBtn');
    const loginContainer      = document.getElementById('loginFormContainer');
    const registerContainer   = document.getElementById('registerFormContainer');
    const registerLinkBtn     = document.getElementById('registerLinkBtn');
    const backToLoginBtn      = document.getElementById('backToLoginBtn');

    const loginForm           = document.getElementById('loginForm');
    const registerForm        = document.getElementById('registerForm');
    const userIdentifier      = document.getElementById('userIdentifier');
    const userPassword        = document.getElementById('userPassword');
    const loginError          = document.getElementById('loginError');
    const loginErrorText      = document.getElementById('loginErrorText');
    const loginSuccess        = document.getElementById('loginSuccess');
    const loginSuccessText    = document.getElementById('loginSuccessText');

    const regFullName         = document.getElementById('regFullName');
    const regIdentifier       = document.getElementById('regIdentifier');
    const regPhone            = document.getElementById('regPhone');
    const regPassword         = document.getElementById('regPassword');
    const registerError       = document.getElementById('registerError');
    const registerErrorText   = document.getElementById('registerErrorText');

    const togglePasswordBtn    = document.getElementById('togglePasswordBtn');
    const togglePasswordIcon   = document.getElementById('togglePasswordIcon');
    const toggleRegPasswordBtn = document.getElementById('toggleRegPasswordBtn');
    const toggleRegPasswordIcon= document.getElementById('toggleRegPasswordIcon');

    function switchAuthTab(mode) {
        const isLogin = mode === 'login';
        if (loginContainer) loginContainer.classList.toggle('hidden', !isLogin);
        if (registerContainer) registerContainer.classList.toggle('hidden', isLogin);
        if (loginError) loginError.classList.add('hidden');
        if (registerError) registerError.classList.add('hidden');

        if (tabMasukBtn && tabDaftarPasienBtn) {
            tabMasukBtn.className = isLogin
                ? 'py-2.5 px-3 rounded-lg text-xs font-semibold transition-all focus:outline-none bg-white text-teal-700 shadow-sm'
                : 'py-2.5 px-3 rounded-lg text-xs font-semibold transition-all focus:outline-none text-slate-600 hover:text-teal-700';
            tabDaftarPasienBtn.className = !isLogin
                ? 'py-2.5 px-3 rounded-lg text-xs font-semibold transition-all focus:outline-none bg-white text-teal-700 shadow-sm'
                : 'py-2.5 px-3 rounded-lg text-xs font-semibold transition-all focus:outline-none text-slate-600 hover:text-teal-700';
        }
    }

    if (tabMasukBtn) tabMasukBtn.addEventListener('click', function () { switchAuthTab('login'); });
    if (tabDaftarPasienBtn) tabDaftarPasienBtn.addEventListener('click', function () { switchAuthTab('register'); });
    if (registerLinkBtn) registerLinkBtn.addEventListener('click', function (e) { e.preventDefault(); switchAuthTab('register'); });
    if (backToLoginBtn) backToLoginBtn.addEventListener('click', function (e) { e.preventDefault(); switchAuthTab('login'); });

    if (togglePasswordBtn && userPassword) {
        togglePasswordBtn.addEventListener('click', function (e) {
            e.stopImmediatePropagation();
            const isPass = userPassword.getAttribute('type') === 'password';
            userPassword.setAttribute('type', isPass ? 'text' : 'password');
            if (togglePasswordIcon) togglePasswordIcon.className = isPass ? 'fas fa-eye-slash text-sm' : 'fas fa-eye text-sm';
        }, true);
    }

    if (toggleRegPasswordBtn && regPassword) {
        toggleRegPasswordBtn.addEventListener('click', function (e) {
            e.stopImmediatePropagation();
            const isPass = regPassword.getAttribute('type') === 'password';
            regPassword.setAttribute('type', isPass ? 'text' : 'password');
            if (toggleRegPasswordIcon) toggleRegPasswordIcon.className = isPass ? 'fas fa-eye-slash text-sm' : 'fas fa-eye text-sm';
        }, true);
    }

    // Handler Submit Login (Multi-Role Otomatis via api/auth.php)
    if (loginForm) {
        loginForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            if (loginError) loginError.classList.add('hidden');
            if (loginSuccess) loginSuccess.classList.add('hidden');

            const emailVal = (userIdentifier ? userIdentifier.value : '').trim();
            const passVal  = userPassword ? userPassword.value : '';

            if (!emailVal || !passVal) {
                if (loginErrorText) loginErrorText.textContent = 'Mohon isi alamat Email dan Password Anda.';
                if (loginError) loginError.classList.remove('hidden');
                return;
            }

            const submitBtn = document.getElementById('submitLoginBtn');
            const submitTxt = document.getElementById('submitLoginBtnText');
            if (submitBtn) submitBtn.disabled = true;
            if (submitTxt) submitTxt.textContent = 'Memverifikasi...';

            try {
                const res = await fetch('api/auth.php?action=login', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        action: 'login',
                        email: emailVal,
                        password: passVal
                    })
                });
                const data = await res.json();

                if (!res.ok || !data || data.status !== 'success') {
                    if (loginErrorText) loginErrorText.textContent = (data && data.message) ? data.message : 'Login gagal. Periksa kembali email dan password Anda.';
                    if (loginError) loginError.classList.remove('hidden');
                    return;
                }

                // Redirect otomatis ke halaman sesuai role ('pasien' -> dashboard_utama, 'dokter' -> dashboard_dokter, 'admin' -> dashboard_admin)
                window.location.href = data.redirect || 'index.php';
            } catch (err) {
                if (loginErrorText) loginErrorText.textContent = 'Gagal terhubung ke server database. Pastikan MySQL & Apache XAMPP aktif.';
                if (loginError) loginError.classList.remove('hidden');
            } finally {
                if (submitBtn) submitBtn.disabled = false;
                if (submitTxt) submitTxt.textContent = 'Masuk';
            }
        }, true);
    }

    // Handler Submit Registrasi Pasien Baru (Otomatis Role = 'pasien' di Backend)
    if (registerForm) {
        registerForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            if (registerError) registerError.classList.add('hidden');

            const namaLengkap = (regFullName ? regFullName.value : '').trim();
            const email       = (regIdentifier ? regIdentifier.value : '').trim();
            const noHp        = (regPhone ? regPhone.value : '').trim();
            const password    = regPassword ? regPassword.value : '';

            if (!namaLengkap || !email || !noHp || !password) {
                if (registerErrorText) registerErrorText.textContent = 'Mohon lengkapi Nama Lengkap, Email, Nomor HP, dan Password.';
                if (registerError) registerError.classList.remove('hidden');
                return;
            }

            if (password.length < 6) {
                if (registerErrorText) registerErrorText.textContent = 'Password minimal harus terdiri dari 6 karakter.';
                if (registerError) registerError.classList.remove('hidden');
                return;
            }

            const submitBtn = document.getElementById('submitRegisterBtn');
            const submitTxt = document.getElementById('submitRegisterBtnText');
            if (submitBtn) submitBtn.disabled = true;
            if (submitTxt) submitTxt.textContent = 'Mendaftarkan...';

            try {
                const res = await fetch('api/auth.php?action=register', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        action: 'register',
                        nama_lengkap: namaLengkap,
                        email: email,
                        no_hp: noHp,
                        password: password
                    })
                });
                const data = await res.json();

                if (!res.ok || !data || data.status !== 'success') {
                    if (registerErrorText) registerErrorText.textContent = (data && data.message) ? data.message : 'Registrasi gagal dilakukan.';
                    if (registerError) registerError.classList.remove('hidden');
                    return;
                }

                registerForm.reset();
                switchAuthTab('login');
                if (userIdentifier) userIdentifier.value = email;
                if (userPassword) {
                    userPassword.value = '';
                    userPassword.focus();
                }
                if (loginSuccessText) loginSuccessText.textContent = data.message || 'Akun pasien berhasil didaftarkan! Silakan masuk.';
                if (loginSuccess) loginSuccess.classList.remove('hidden');
            } catch (err) {
                if (registerErrorText) registerErrorText.textContent = 'Gagal terhubung ke server database. Pastikan MySQL & Apache XAMPP aktif.';
                if (registerError) registerError.classList.remove('hidden');
            } finally {
                if (submitBtn) submitBtn.disabled = false;
                if (submitTxt) submitTxt.textContent = 'Daftar Sekarang';
            }
        }, true);
    }
})();
</script>
