(function () {
    // Views & Sub-Views
    const loginView = document.getElementById('loginView');
    const loginFormContainer = document.getElementById('loginFormContainer');
    const registerFormContainer = document.getElementById('registerFormContainer');
    const dashboardView = document.getElementById('dashboardView');
    const mainDashboardHeader = document.getElementById('mainDashboardHeader');
    const mainDashboardSubView = document.getElementById('mainDashboardSubView');
    const doctorRoleDashboardSubView = document.getElementById('doctorRoleDashboardSubView');
    const adminRoleDashboardSubView = document.getElementById('adminRoleDashboardSubView');
    const profilePageSubView = document.getElementById('profilePageSubView');
    const doctorChatSubView = document.getElementById('doctorChatSubView');
    const securitySubView = document.getElementById('securitySubView');
    const resepSubView = document.getElementById('resepSubView');
    const jadwalSubView = document.getElementById('jadwalSubView');
    const labSubView = document.getElementById('labSubView');
    const featureDiagnosisSubView = document.getElementById('featureDiagnosisSubView');
    const featureEdukasiSubView = document.getElementById('featureEdukasiSubView');
    const featureHealthySubView = document.getElementById('featureHealthySubView');
    const featureNotifikasiSubView = document.getElementById('featureNotifikasiSubView');
    const headerNotifBadge = document.getElementById('headerNotifBadge');

    // Login & Registration Elements
    const loginForm = document.getElementById('loginForm');
    const userIdentifier = document.getElementById('userIdentifier');
    const userPassword = document.getElementById('userPassword');
    const togglePasswordBtn = document.getElementById('togglePasswordBtn');
    const togglePasswordIcon = document.getElementById('togglePasswordIcon');
    const loginError = document.getElementById('loginError');
    const loginErrorText = document.getElementById('loginErrorText');
    const loginSuccess = document.getElementById('loginSuccess');
    const loginSuccessText = document.getElementById('loginSuccessText');
    const forgotPasswordBtn = document.getElementById('forgotPasswordBtn');
    const registerLinkBtn = document.getElementById('registerLinkBtn');
    const backToLoginBtn = document.getElementById('backToLoginBtn');
    const topBackToLoginBtn = document.getElementById('topBackToLoginBtn');

    const registerForm = document.getElementById('registerForm');
    const registerError = document.getElementById('registerError');
    const registerErrorText = document.getElementById('registerErrorText');
    const regFullName = document.getElementById('regFullName');
    const regIdentifier = document.getElementById('regIdentifier');
    const regPhone = document.getElementById('regPhone');
    const regBirthDate = document.getElementById('regBirthDate');
    const regGender = document.getElementById('regGender');
    const regAddress = document.getElementById('regAddress');
    const regPassword = document.getElementById('regPassword');
    const regConfirmPassword = document.getElementById('regConfirmPassword');
    const toggleRegPasswordBtn = document.getElementById('toggleRegPasswordBtn');
    const toggleRegPasswordIcon = document.getElementById('toggleRegPasswordIcon');
    const regTermsCheck = document.getElementById('regTermsCheck');

    // Forgot Password Modal Elements
    const forgotPasswordModal = document.getElementById('forgotPasswordModal');
    const closeForgotModalBtn = document.getElementById('closeForgotModalBtn');
    const forgotLookupForm = document.getElementById('forgotLookupForm');
    const forgotIdentifierInput = document.getElementById('forgotIdentifierInput');
    const forgotErrorAlert = document.getElementById('forgotErrorAlert');
    const forgotResultSection = document.getElementById('forgotResultSection');
    const forgotFoundName = document.getElementById('forgotFoundName');
    const truePasswordDisplay = document.getElementById('truePasswordDisplay');
    const useTruePasswordBtn = document.getElementById('useTruePasswordBtn');
    const forgotResetForm = document.getElementById('forgotResetForm');
    const forgotNewPassInput = document.getElementById('forgotNewPassInput');
    const forgotConfirmPassInput = document.getElementById('forgotConfirmPassInput');
    const forgotResetNotice = document.getElementById('forgotResetNotice');

    // Header & Navigation Elements
    const displayPatientName = document.getElementById('displayPatientName');
    const displayRmNumber = document.getElementById('displayRmNumber');
    const bioRmNumber = document.getElementById('bioRmNumber');
    const displayPatientContact = document.getElementById('displayPatientContact');
    const headerAvatarImg = document.getElementById('headerAvatarImg');
    const headerAvatarIcon = document.getElementById('headerAvatarIcon');
    const avatarOpenProfileBtn = document.getElementById('avatarOpenProfileBtn');
    const openProfilePageBtn = document.getElementById('openProfilePageBtn');
    const cardOpenProfileBtn = document.getElementById('cardOpenProfileBtn');
    const backFromProfileBtn = document.getElementById('backFromProfileBtn');
    const menuEditProfileBtn = document.getElementById('menuEditProfileBtn');
    const menuSwitchProfileBtn = document.getElementById('menuSwitchProfileBtn');
    const menuSecurityBtn = document.getElementById('menuSecurityBtn');
    const settingsToggleBtn = document.getElementById('settingsToggleBtn');
    const settingsMenu = document.getElementById('settingsMenu');
    const logoutBtn = document.getElementById('logoutBtn');
    const sidebarLogoutBtn = document.getElementById('sidebarLogoutBtn');
    const mobileCardLogoutBtn = document.getElementById('mobileCardLogoutBtn');
    const notifBadge = document.getElementById('notifBadge');
    const desktopNotifBadge = document.getElementById('desktopNotifBadge');

    // Bio & Vital Elements
    const bioFullName = document.getElementById('bioFullName');
    const bioBirthDate = document.getElementById('bioBirthDate');
    const bioGender = document.getElementById('bioGender');
    const bioPhone = document.getElementById('bioPhone');
    const bioAddress = document.getElementById('bioAddress');
    const vitalBlood = document.getElementById('vitalBlood');
    const vitalHeight = document.getElementById('vitalHeight');
    const vitalWeight = document.getElementById('vitalWeight');
    const vitalBmi = document.getElementById('vitalBmi');
    const vitalBmiStatus = document.getElementById('vitalBmiStatus');
    const vitalAllergy = document.getElementById('vitalAllergy');

    // Edit Profile Modal
    const editProfileModal = document.getElementById('editProfileModal');
    const openEditProfileBtn = document.getElementById('openEditProfileBtn');
    const quickEditVitalBtn = document.getElementById('quickEditVitalBtn');
    const closeEditProfileModalBtn = document.getElementById('closeEditProfileModalBtn');
    const cancelEditProfileBtn = document.getElementById('cancelEditProfileBtn');
    const editProfileForm = document.getElementById('editProfileForm');
    const inputPatientName = document.getElementById('inputPatientName');
    const inputBirthDate = document.getElementById('inputBirthDate');
    const inputGender = document.getElementById('inputGender');
    const inputBlood = document.getElementById('inputBlood');
    const inputHeight = document.getElementById('inputHeight');
    const inputWeight = document.getElementById('inputWeight');
    const inputAllergy = document.getElementById('inputAllergy');
    const inputPhone = document.getElementById('inputPhone');
    const inputAddress = document.getElementById('inputAddress');

    // Switch Profile & Avatar Modal
    const switchProfileModal = document.getElementById('switchProfileModal');
    const openSwitchProfileBtn = document.getElementById('openSwitchProfileBtn');
    const quickChangeAvatarBtn = document.getElementById('quickChangeAvatarBtn');
    const profilePageSwitchAvatarBtn = document.getElementById('profilePageSwitchAvatarBtn');
    const closeSwitchProfileModalBtn = document.getElementById('closeSwitchProfileModalBtn');
    const uploadAvatarInput = document.getElementById('uploadAvatarInput');
    const switchProfileForm = document.getElementById('switchProfileForm');
    const newProfileNameInput = document.getElementById('newProfileNameInput');

    // Feature Modal
    const featureModal = document.getElementById('featureModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalDesc = document.getElementById('modalDesc');
    const closeModalBtn = document.getElementById('closeModalBtn');

    const navItems = document.querySelectorAll('.nav-item');

    // Registered Users Storage (100% Dari Database MySQL via API - Zero Dummy Data)
    let registeredUsers = [];
    let activeKonsultasiId = null;
    let masterObatCatalog = [];
    try {
        localStorage.removeItem('sehatin_user');
        localStorage.removeItem('sehatin_active_user');
        localStorage.removeItem('sehatin_registered_users_v2');
    } catch (e) {}

    function saveRegisteredUsers() {
        // Seluruh data akun disimpan 100% di tabel `users` MySQL melalui API (tanpa localStorage dummy)
    }

    function ensureDefaultRoleAccounts() {
        // Tidak menambahkan akun dummy apapun
    }

    function formatNameFromIdentifier(rawIdentifier) {
        const clean = (rawIdentifier || '').trim();
        if (!clean) return 'Pengguna Sehatin';
        const base = clean.includes('@') ? clean.split('@')[0] : clean;
        return base
            .replace(/[._-]+/g, ' ')
            .replace(/\w/g, function (c) { return c.toUpperCase(); });
    }

    function resolveUserName(userObj, fallbackInput) {
        if (userObj && userObj.fullName) {
            const candidate = String(userObj.fullName).trim();
            if (candidate && candidate !== '-' && candidate.toLowerCase() !== 'pasien budi') {
                return candidate;
            }
        }
        if (userObj && userObj.identifier) {
            const idCandidate = String(userObj.identifier).trim();
            if (idCandidate && idCandidate.toLowerCase() !== 'pasien budi') {
                return formatNameFromIdentifier(idCandidate);
            }
        }
        if (fallbackInput) {
            return formatNameFromIdentifier(fallbackInput);
        }
        return 'Pengguna Sehatin';
    }

    function findRegisteredUser(query) {
        const q = (query || '').trim().toLowerCase();
        if (!q) return null;
        return registeredUsers.find(function (u) {
            return (
                (u.identifier && u.identifier.toLowerCase() === q) ||
                (u.fullName && u.fullName.toLowerCase() === q) ||
                (u.phone && u.phone.toLowerCase() === q)
            );
        }) || null;
    }

    let currentLoggedInUser = null;
    let forgotMatchedUser = null;
    let isPinSet = false;
    let is2faEnabled = false;
    let resepItems = [];
    let jadwalItems = [];
    let labItems = [];

    function highlightNav(activeNavName) {
        navItems.forEach(function (nav) {
            const isSame = nav.getAttribute('data-nav') === activeNavName;
            if (nav.closest('aside')) {
                nav.classList.toggle('bg-teal-50', isSame);
                nav.classList.toggle('text-teal-600', isSame);
                nav.classList.toggle('font-semibold', isSame);
                nav.classList.toggle('text-gray-600', !isSame);
            } else {
                nav.classList.toggle('text-teal-600', isSame);
                nav.classList.toggle('font-medium', isSame);
            }
        });
    }

    let currentActiveRole = 'user';
    let selectedLoginRole = 'user';

    function hideAllSubViews() {
        settingsMenu.classList.add('hidden');
        mainDashboardSubView.classList.add('hidden');
        if (doctorRoleDashboardSubView) doctorRoleDashboardSubView.classList.add('hidden');
        if (adminRoleDashboardSubView) adminRoleDashboardSubView.classList.add('hidden');
        profilePageSubView.classList.add('hidden');
        doctorChatSubView.classList.add('hidden');
        securitySubView.classList.add('hidden');
        resepSubView.classList.add('hidden');
        jadwalSubView.classList.add('hidden');
        labSubView.classList.add('hidden');
        if (featureDiagnosisSubView) featureDiagnosisSubView.classList.add('hidden');
        if (featureEdukasiSubView) featureEdukasiSubView.classList.add('hidden');
        if (featureHealthySubView) featureHealthySubView.classList.add('hidden');
        if (featureNotifikasiSubView) featureNotifikasiSubView.classList.add('hidden');
    }

    function switchDashboardSubView(target) {
        hideAllSubViews();
        if (target === 'profile') {
            mainDashboardHeader.classList.add('hidden');
            profilePageSubView.classList.remove('hidden');
            highlightNav('Saya');
        } else {
            mainDashboardHeader.classList.remove('hidden');
            if (target === 'chat') {
                doctorChatSubView.classList.remove('hidden');
                if (currentActiveRole === 'dokter' && typeof setChatRole === 'function') {
                    setChatRole('doctor');
                }
                highlightNav('Konsultasi');
            } else if (target === 'diagnosis') {
                if (featureDiagnosisSubView) featureDiagnosisSubView.classList.remove('hidden');
                highlightNav('Diagnosis');
            } else if (target === 'edukasi') {
                if (featureEdukasiSubView) featureEdukasiSubView.classList.remove('hidden');
                highlightNav('Edukasi');
            } else if (target === 'healthy') {
                if (featureHealthySubView) featureHealthySubView.classList.remove('hidden');
                highlightNav('Healthy');
            } else if (target === 'notifikasi') {
                if (featureNotifikasiSubView) featureNotifikasiSubView.classList.remove('hidden');
                highlightNav('Notifikasi');
            } else if (target === 'security') {
                securitySubView.classList.remove('hidden');
            } else if (target === 'resep') {
                resepSubView.classList.remove('hidden');
            } else if (target === 'jadwal') {
                jadwalSubView.classList.remove('hidden');
            } else if (target === 'lab') {
                labSubView.classList.remove('hidden');
            } else {
                if (currentActiveRole === 'dokter' && doctorRoleDashboardSubView) {
                    doctorRoleDashboardSubView.classList.remove('hidden');
                    if (typeof renderDoctorRoleDashboard === 'function') renderDoctorRoleDashboard();
                } else if (currentActiveRole === 'admin' && adminRoleDashboardSubView) {
                    adminRoleDashboardSubView.classList.remove('hidden');
                    if (typeof renderAdminRoleDashboard === 'function') renderAdminRoleDashboard();
        if (typeof populateAdminAndDoctorDropdowns === 'function') populateAdminAndDoctorDropdowns();
                } else {
                    mainDashboardSubView.classList.remove('hidden');
                }
                highlightNav('Beranda');
            }
        }
    }

    document.querySelectorAll('.back-to-dashboard-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            switchDashboardSubView('main');
        });
    });

    function showModal(title, desc) {
        modalTitle.textContent = title;
        modalDesc.textContent = desc;
        featureModal.classList.remove('hidden');
    }

    function hideModal() {
        featureModal.classList.add('hidden');
    }

    closeModalBtn.addEventListener('click', hideModal);
    featureModal.addEventListener('click', function (e) {
        if (e.target === featureModal) hideModal();
    });

    // 1. Login, Registration, and Forgot Password Logic
    togglePasswordBtn.addEventListener('click', function () {
        const isPassword = userPassword.getAttribute('type') === 'password';
        userPassword.setAttribute('type', isPassword ? 'text' : 'password');
        togglePasswordIcon.className = isPassword ? 'fas fa-eye-slash text-sm' : 'fas fa-eye text-sm';
    });

    toggleRegPasswordBtn.addEventListener('click', function () {
        const isPassword = regPassword.getAttribute('type') === 'password';
        regPassword.setAttribute('type', isPassword ? 'text' : 'password');
        toggleRegPasswordIcon.className = isPassword ? 'fas fa-eye-slash text-xs' : 'fas fa-eye text-xs';
    });

    function showRegisterPanel() {
        loginError.classList.add('hidden');
        loginSuccess.classList.add('hidden');
        registerError.classList.add('hidden');
        loginFormContainer.classList.add('hidden');
        registerFormContainer.classList.remove('hidden');
    }

    function showLoginPanel() {
        registerError.classList.add('hidden');
        registerFormContainer.classList.add('hidden');
        loginFormContainer.classList.remove('hidden');
    }

    registerLinkBtn.addEventListener('click', showRegisterPanel);
    backToLoginBtn.addEventListener('click', showLoginPanel);
    topBackToLoginBtn.addEventListener('click', showLoginPanel);

    const loginRoleTabBtns = document.querySelectorAll('.login-role-tab');
    const loginIdentifierLabel = document.getElementById('loginIdentifierLabel');
    const loginIdentifierIcon = document.getElementById('loginIdentifierIcon');
    const submitLoginBtnText = document.getElementById('submitLoginBtnText');
    const loginRoleBannerText = document.getElementById('loginRoleBannerText');
    const regAccountRole = document.getElementById('regAccountRole');
    const regDoctorExtraFields = document.getElementById('regDoctorExtraFields');
    const regAdminExtraFields = document.getElementById('regAdminExtraFields');
    const regDocStrNumber = document.getElementById('regDocStrNumber');
    const regDocSpecialty = document.getElementById('regDocSpecialty');
    const regDocHospital = document.getElementById('regDocHospital');
    const regAdminAuthCode = document.getElementById('regAdminAuthCode');

    function setSelectedLoginRoleUI(roleKey) {
        selectedLoginRole = roleKey || 'user';
        loginRoleTabBtns.forEach(function (btn) {
            const isAct = btn.getAttribute('data-login-role') === selectedLoginRole;
            btn.className = isAct
                ? 'login-role-tab py-2.5 px-2.5 rounded-lg text-xs font-semibold bg-teal-600 text-white shadow-sm flex items-center justify-center space-x-1.5 transition-all focus:outline-none'
                : 'login-role-tab py-2.5 px-2.5 rounded-lg text-xs font-semibold text-slate-600 hover:text-teal-700 flex items-center justify-center space-x-1.5 transition-all focus:outline-none';
        });

        if (selectedLoginRole === 'dokter') {
            if (loginIdentifierLabel) loginIdentifierLabel.textContent = 'Email / Username / Nama Dokter Terdaftar';
            if (loginIdentifierIcon) loginIdentifierIcon.className = 'fas fa-user-md';
            if (userIdentifier) userIdentifier.placeholder = 'Masukkan email atau username akun Dokter';
            if (submitLoginBtnText) submitLoginBtnText.textContent = 'Masuk ke Portal Praktik Dokter';
            if (loginRoleBannerText) {
                loginRoleBannerText.innerHTML = '<strong>Portal Praktik Dokter:</strong> Khusus akun Dokter yang terdaftar dengan Nomor STR. Akun Pasien ditolak masuk di tab ini.';
            }
        } else if (selectedLoginRole === 'admin') {
            if (loginIdentifierLabel) loginIdentifierLabel.textContent = 'Email / Username Administrator Sistem';
            if (loginIdentifierIcon) loginIdentifierIcon.className = 'fas fa-user-shield';
            if (userIdentifier) userIdentifier.placeholder = 'Masukkan email atau username akun Admin';
            if (submitLoginBtnText) submitLoginBtnText.textContent = 'Masuk ke Panel Administrator';
            if (loginRoleBannerText) {
                loginRoleBannerText.innerHTML = '<strong>Portal Administrator:</strong> Khusus akun Admin pemegang Kode Otorisasi Sistem. Akun Pasien atau Dokter ditolak masuk di tab ini.';
            }
        } else {
            if (loginIdentifierLabel) loginIdentifierLabel.textContent = 'Email / No. Handphone / Username Pasien';
            if (loginIdentifierIcon) loginIdentifierIcon.className = 'fas fa-user';
            if (userIdentifier) userIdentifier.placeholder = 'Masukkan email, nomor HP, atau username pasien';
            if (submitLoginBtnText) submitLoginBtnText.textContent = 'Masuk ke Portal Pasien (User)';
            if (loginRoleBannerText) {
                loginRoleBannerText.innerHTML = '<strong>Portal Pasien (User):</strong> Gunakan akun pasien yang telah Anda daftarkan. Belum punya akun? Klik <strong>Daftar Sekarang</strong> di bawah.';
            }
        }
    }

    loginRoleTabBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            setSelectedLoginRoleUI(btn.getAttribute('data-login-role'));
        });
    });

    if (regAccountRole) {
        regAccountRole.addEventListener('change', function () {
            if (regDoctorExtraFields) regDoctorExtraFields.classList.toggle('hidden', regAccountRole.value !== 'dokter');
            if (regAdminExtraFields) regAdminExtraFields.classList.toggle('hidden', regAccountRole.value !== 'admin');
        });
    }

    // Registration Submit (Mendukung 3 Peran dengan Verifikasi Kredensial)
    registerForm.addEventListener('submit', async function (e) {
        e.preventDefault();
        const role = regAccountRole ? regAccountRole.value : 'user';
        const fullName = regFullName.value.trim();
        const identifier = regIdentifier.value.trim();
        const phone = regPhone.value.trim();
        const birthDate = regBirthDate.value.trim();
        const gender = regGender.value;
        const address = regAddress.value.trim();
        const password = regPassword.value.trim();
        const confirmPass = regConfirmPassword.value.trim();
        const docStr = regDocStrNumber ? regDocStrNumber.value.trim() : '';
        const docSpec = regDocSpecialty ? regDocSpecialty.value.trim() : '';
        const docHosp = regDocHospital ? regDocHospital.value.trim() : '';
        const adminCode = regAdminAuthCode ? regAdminAuthCode.value.trim() : '';

        if (!fullName || !identifier || !phone || !birthDate || !gender || !address) {
            registerErrorText.textContent = 'Mohon lengkapi seluruh kolom data diri pendaftaran.';
            registerError.classList.remove('hidden');
            return;
        }
        if (role === 'dokter' && (!docStr || !docSpec || !docHosp)) {
            registerErrorText.textContent = 'Pendaftaran akun Dokter wajib mengisi Nomor STR Resmi, Spesialisasi Medis, dan Rumah Sakit Praktik.';
            registerError.classList.remove('hidden');
            return;
        }
        if (role === 'admin' && adminCode.toUpperCase() !== 'ADMIN-SEHATIN') {
            registerErrorText.textContent = 'Kode Otorisasi Administrator tidak valid. Gunakan kode resmi: ADMIN-SEHATIN.';
            registerError.classList.remove('hidden');
            return;
        }
        if (password.length < 6) {
            registerErrorText.textContent = 'Kata sandi minimal terdiri dari 6 karakter.';
            registerError.classList.remove('hidden');
            return;
        }
        if (password !== confirmPass) {
            registerErrorText.textContent = 'Kata sandi dan konfirmasi kata sandi tidak cocok.';
            registerError.classList.remove('hidden');
            return;
        }
        if (!regTermsCheck.checked) {
            registerErrorText.textContent = 'Harap centang persetujuan Syarat & Ketentuan Sehatin.';
            registerError.classList.remove('hidden');
            return;
        }
        if (findRegisteredUser(identifier) || findRegisteredUser(fullName)) {
            registerErrorText.textContent = 'Akun dengan Email/Username atau Nama tersebut sudah terdaftar.';
            registerError.classList.remove('hidden');
            return;
        }

        const prefix = role === 'dokter' ? 'STR-' : (role === 'admin' ? 'ADM-2026-' : 'RM-2026-');
        const rmNumber = (role === 'dokter' && docStr) ? docStr : (prefix + String(Math.floor(1000 + Math.random() * 9000)));
        const newUser = {
            role: role,
            rmNumber: rmNumber,
            fullName: fullName,
            identifier: identifier,
            phone: phone,
            birthDate: birthDate,
            gender: gender,
            address: address,
            specialty: role === 'dokter' ? docSpec : '',
            hospital: role === 'dokter' ? docHosp : '',
            password: password
        };

        registeredUsers.push(newUser);
        saveRegisteredUsers();

        if (role === 'dokter' && typeof customConsultDoctors !== 'undefined') {
            customConsultDoctors.unshift({
                name: fullName,
                specialty: newUser.specialty,
                hospital: newUser.hospital,
                hours: 'Senin - Sabtu 09:00 - 15:00 WIB',
                exp: 'Dokter Terdaftar Sehatin',
                status: 'Aktif Praktik',
                isDefault: false
            });
            if (typeof renderKonsulDoctorList === 'function') renderKonsulDoctorList();
        }

        if (window.SehatinXamppApi) {
            await window.SehatinXamppApi.register({
                role: role,
                rm_number: rmNumber,
                full_name: fullName,
                identifier: identifier,
                phone: phone,
                birth_date: birthDate,
                gender: gender,
                address: address,
                specialty: newUser.specialty,
                hospital: newUser.hospital,
                password: password
            });
        }

        registerForm.reset();
        if (regDoctorExtraFields) regDoctorExtraFields.classList.add('hidden');
        if (regAdminExtraFields) regAdminExtraFields.classList.add('hidden');
        showLoginPanel();
        setSelectedLoginRoleUI(role);
        userIdentifier.value = identifier;
        userPassword.value = '';
        loginError.classList.add('hidden');
        const roleLabel = role === 'dokter' ? 'Dokter' : (role === 'admin' ? 'Admin' : 'User (Pasien)');
        loginSuccessText.textContent = 'Pendaftaran akun ' + roleLabel + ' berhasil untuk ' + fullName + '! Silakan masukkan kata sandi Anda untuk masuk.';
        loginSuccess.classList.remove('hidden');
        userPassword.focus();
    });

    // Forgot Password Modal (Show True Password & Allow Changing Password)
    async function lookupAccountForForgot(identifierQuery) {
        forgotErrorAlert.classList.add('hidden');
        forgotResetNotice.classList.add('hidden');
        const q = (identifierQuery || '').trim();
        if (!q) return;

        let localMatch = findRegisteredUser(q);
        if (!localMatch && window.SehatinXamppApi) {
            const apiRes = await window.SehatinXamppApi.lookupPassword(q);
            if (apiRes && apiRes.status === 'success' && apiRes.user) {
                localMatch = {
                    rmNumber: apiRes.user.rm_number,
                    fullName: apiRes.user.full_name,
                    identifier: apiRes.user.identifier,
                    phone: apiRes.user.phone,
                    birthDate: apiRes.user.birth_date,
                    gender: apiRes.user.gender,
                    address: apiRes.user.address,
                    password: apiRes.user.plain_password || ''
                };
                registeredUsers.push(localMatch);
                saveRegisteredUsers();
            }
        }

        if (!localMatch) {
            forgotMatchedUser = null;
            forgotResultSection.classList.add('hidden');
            forgotErrorAlert.classList.remove('hidden');
            return;
        }

        forgotMatchedUser = localMatch;
        forgotFoundName.textContent = localMatch.fullName + ' (' + localMatch.identifier + ')';
        truePasswordDisplay.textContent = localMatch.password;
        forgotResultSection.classList.remove('hidden');
    }

    forgotPasswordBtn.addEventListener('click', function () {
        forgotErrorAlert.classList.add('hidden');
        forgotResetNotice.classList.add('hidden');
        forgotResultSection.classList.add('hidden');
        const currentTyped = userIdentifier.value.trim();
        forgotIdentifierInput.value = currentTyped;
        forgotPasswordModal.classList.remove('hidden');
        if (currentTyped) {
            lookupAccountForForgot(currentTyped);
        } else {
            forgotIdentifierInput.focus();
        }
    });

    closeForgotModalBtn.addEventListener('click', function () {
        forgotPasswordModal.classList.add('hidden');
    });

    forgotPasswordModal.addEventListener('click', function (e) {
        if (e.target === forgotPasswordModal) forgotPasswordModal.classList.add('hidden');
    });

    forgotLookupForm.addEventListener('submit', function (e) {
        e.preventDefault();
        lookupAccountForForgot(forgotIdentifierInput.value);
    });

    useTruePasswordBtn.addEventListener('click', function () {
        if (!forgotMatchedUser) return;
        userIdentifier.value = forgotMatchedUser.identifier;
        userPassword.value = forgotMatchedUser.password;
        forgotPasswordModal.classList.add('hidden');
        loginError.classList.add('hidden');
    });

    forgotResetForm.addEventListener('submit', async function (e) {
        e.preventDefault();
        if (!forgotMatchedUser) return;
        const newP = forgotNewPassInput.value.trim();
        const confP = forgotConfirmPassInput.value.trim();

        if (newP.length < 6) {
            forgotResetNotice.textContent = 'Kata sandi baru minimal harus 6 karakter.';
            forgotResetNotice.className = 'text-xs font-medium text-red-600 bg-red-50 border border-red-200 rounded-xl p-2.5';
            forgotResetNotice.classList.remove('hidden');
            return;
        }
        if (newP !== confP) {
            forgotResetNotice.textContent = 'Konfirmasi kata sandi baru tidak cocok.';
            forgotResetNotice.className = 'text-xs font-medium text-red-600 bg-red-50 border border-red-200 rounded-xl p-2.5';
            forgotResetNotice.classList.remove('hidden');
            return;
        }

        forgotMatchedUser.password = newP;
        saveRegisteredUsers();

        if (window.SehatinXamppApi) {
            await window.SehatinXamppApi.resetPasswordByIdentifier(forgotMatchedUser.identifier, newP);
        }

        truePasswordDisplay.textContent = newP;
        userIdentifier.value = forgotMatchedUser.identifier;
        userPassword.value = newP;
        forgotNewPassInput.value = '';
        forgotConfirmPassInput.value = '';
        forgotResetNotice.textContent = 'Kata sandi berhasil diganti! Kata sandi baru Anda sudah diterapkan.';
        forgotResetNotice.className = 'text-xs font-medium text-emerald-600 bg-emerald-50 border border-emerald-200 rounded-xl p-2.5';
        forgotResetNotice.classList.remove('hidden');
    });

    const headerActiveRoleBadge = document.getElementById('headerActiveRoleBadge');
    const headerIdPrefixLabel = document.getElementById('headerIdPrefixLabel');
    const sidebarRoleSubtitle = document.getElementById('sidebarRoleSubtitle');
    const sidebarHomeMenuLabel = document.getElementById('sidebarHomeMenuLabel');
    const headerRoleSwitchBtns = document.querySelectorAll('.header-role-switch-btn');

    function applyLoggedInUserToUI(userObj, fallbackLoginInput) {
        const cleanFullName = resolveUserName(userObj, fallbackLoginInput);
        userObj.fullName = cleanFullName;
        if (!userObj.role) userObj.role = selectedLoginRole || 'user';
        currentLoggedInUser = userObj;
        currentActiveRole = userObj.role;

        displayPatientName.textContent = cleanFullName;
        bioFullName.textContent = cleanFullName;
        inputPatientName.value = cleanFullName;
        newProfileNameInput.value = cleanFullName;

        displayRmNumber.textContent = userObj.rmNumber || 'RM-2026-0001';
        bioRmNumber.textContent = userObj.rmNumber || 'RM-2026-0001';
        bioBirthDate.textContent = userObj.birthDate || '-';
        bioGender.textContent = userObj.gender || '-';
        bioPhone.textContent = userObj.phone || '-';
        bioAddress.textContent = userObj.address || '-';
        inputBirthDate.value = userObj.birthDate || '';
        inputGender.value = userObj.gender || '-';
        inputPhone.value = userObj.phone || '';
        inputAddress.value = userObj.address || '';
        displayPatientContact.textContent = (userObj.identifier || cleanFullName) + (userObj.phone ? ' • ' + userObj.phone : '');
        const addrRecEl = document.getElementById('addrRecipientInput');
        if (addrRecEl) addrRecEl.value = cleanFullName;
        const addrPhoneEl = document.getElementById('addrPhoneInput');
        if (addrPhoneEl) addrPhoneEl.value = userObj.phone || '';

        // Sesuaikan UI Header, Sidebar, Bottom Nav, & Hak Akses Berdasarkan Peran Login (User, Dokter, Admin)
        const sidebarMenuUser = document.getElementById('sidebarMenuUser');
        const sidebarMenuDokter = document.getElementById('sidebarMenuDokter');
        const sidebarMenuAdmin = document.getElementById('sidebarMenuAdmin');
        const bottomNavUser = document.getElementById('bottomNavUser');
        const bottomNavDokter = document.getElementById('bottomNavDokter');
        const bottomNavAdmin = document.getElementById('bottomNavAdmin');
        const headerPatientCountersRow = document.getElementById('headerPatientCountersRow');
        const headerPatientActionsGroup = document.getElementById('headerPatientActionsGroup');
        const headerStaffActionsGroup = document.getElementById('headerStaffActionsGroup');
        const patientOnlySettingsMenu = document.getElementById('patientOnlySettingsMenu');
        const lockedChatRoleStatusBadge = document.getElementById('lockedChatRoleStatusBadge');
        const openSaveChatToHistoryBtnEl = document.getElementById('openSaveChatToHistoryBtn');
        const toggleAddKonsulDoctorBtnEl = document.getElementById('toggleAddKonsulDoctorBtn');
        const toggleAddResepFormBtnEl = document.getElementById('toggleAddResepFormBtn');
        const addResepFormEl = document.getElementById('addResepForm');
        const toggleAddLabFormBtnEl = document.getElementById('toggleAddLabFormBtn');
        const addLabFormEl = document.getElementById('addLabForm');

        if (sidebarMenuUser) sidebarMenuUser.classList.toggle('hidden', currentActiveRole !== 'user');
        if (sidebarMenuDokter) sidebarMenuDokter.classList.toggle('hidden', currentActiveRole !== 'dokter');
        if (sidebarMenuAdmin) sidebarMenuAdmin.classList.toggle('hidden', currentActiveRole !== 'admin');
        if (bottomNavUser) bottomNavUser.classList.toggle('hidden', currentActiveRole !== 'user');
        if (bottomNavDokter) bottomNavDokter.classList.toggle('hidden', currentActiveRole !== 'dokter');
        if (bottomNavAdmin) bottomNavAdmin.classList.toggle('hidden', currentActiveRole !== 'admin');

        const isPatientRole = currentActiveRole === 'user';
        if (headerPatientCountersRow) headerPatientCountersRow.classList.toggle('hidden', !isPatientRole);
        if (headerPatientActionsGroup) headerPatientActionsGroup.classList.toggle('hidden', !isPatientRole);
        if (headerStaffActionsGroup) headerStaffActionsGroup.classList.toggle('hidden', isPatientRole);
        if (patientOnlySettingsMenu) patientOnlySettingsMenu.classList.toggle('hidden', !isPatientRole);

        // Kunci aksi medis agar Pasien tidak bisa berpura-pura menjadi Dokter atau Admin
        if (openSaveChatToHistoryBtnEl) openSaveChatToHistoryBtnEl.classList.toggle('hidden', currentActiveRole !== 'dokter');
        if (toggleAddKonsulDoctorBtnEl) toggleAddKonsulDoctorBtnEl.classList.toggle('hidden', currentActiveRole === 'user');
        if (toggleAddResepFormBtnEl) toggleAddResepFormBtnEl.classList.toggle('hidden', currentActiveRole !== 'dokter');
        if (addResepFormEl && isPatientRole) addResepFormEl.classList.add('hidden');
        if (toggleAddLabFormBtnEl) toggleAddLabFormBtnEl.classList.toggle('hidden', currentActiveRole !== 'dokter');
        if (addLabFormEl && isPatientRole) addLabFormEl.classList.add('hidden');

        if (currentActiveRole === 'dokter') {
            if (headerActiveRoleBadge) headerActiveRoleBadge.textContent = 'PORTAL DOKTER PRAKTIK';
            if (headerIdPrefixLabel) headerIdPrefixLabel.textContent = 'No. STR:';
            if (sidebarRoleSubtitle) sidebarRoleSubtitle.textContent = 'UI Praktik Dokter';
            if (headerAvatarIcon) headerAvatarIcon.className = 'fas fa-user-md';
            if (typeof setChatRole === 'function') setChatRole('doctor');
            if (customDoctorNameInput) customDoctorNameInput.value = cleanFullName;
            if (lockedChatRoleStatusBadge) {
                lockedChatRoleStatusBadge.innerHTML = '<i class="fas fa-user-md mr-1.5 text-[10px]"></i>Mode Dokter: ' + cleanFullName;
            }
            const docNameEl = document.getElementById('docDashDoctorName');
            const docMetaEl = document.getElementById('docDashDoctorMeta');
            const docProfNameIn = document.getElementById('docProfileNameInput');
            const docProfSpecIn = document.getElementById('docProfileSpecInput');
            const docProfHospIn = document.getElementById('docProfileHospitalInput');
            if (docNameEl) docNameEl.textContent = cleanFullName;
            if (docMetaEl) {
                docMetaEl.textContent = (userObj.specialty || 'Dokter Praktik') + ' • ' + (userObj.hospital || userObj.address || 'Pekanbaru') + ' • No. STR: ' + (userObj.rmNumber || '-');
            }
            if (docProfNameIn) docProfNameIn.value = cleanFullName;
            if (docProfSpecIn) docProfSpecIn.value = userObj.specialty || '';
            if (docProfHospIn) docProfHospIn.value = userObj.hospital || userObj.address || '';
        } else if (currentActiveRole === 'admin') {
            if (headerActiveRoleBadge) headerActiveRoleBadge.textContent = 'PANEL ADMINISTRATOR';
            if (headerIdPrefixLabel) headerIdPrefixLabel.textContent = 'ID Otorisasi:';
            if (sidebarRoleSubtitle) sidebarRoleSubtitle.textContent = 'UI Panel Admin';
            if (headerAvatarIcon) headerAvatarIcon.className = 'fas fa-user-shield';
            const adminTitleEl = document.getElementById('adminDashNameTitle');
            if (adminTitleEl) adminTitleEl.textContent = 'Panel Administrator — ' + cleanFullName;
        } else {
            if (headerActiveRoleBadge) headerActiveRoleBadge.textContent = 'PORTAL PASIEN (USER)';
            if (headerIdPrefixLabel) headerIdPrefixLabel.textContent = 'No. RM:';
            if (sidebarRoleSubtitle) sidebarRoleSubtitle.textContent = 'Portal Pasien (User)';
            if (headerAvatarIcon) headerAvatarIcon.className = 'fas fa-user-alt';
            if (typeof setChatRole === 'function') setChatRole('patient');
            if (lockedChatRoleStatusBadge) {
                lockedChatRoleStatusBadge.innerHTML = '<i class="fas fa-lock mr-1.5 text-[10px]"></i>Mode Pasien: Mengirim Pesan Sebagai Pasien';
            }
        }
    }

    // Login Form Submit (Dengan Validasi Ketat Pemisahan Peran User, Dokter, Admin)
    loginForm.addEventListener('submit', async function (e) {
        e.preventDefault();
        loginSuccess.classList.add('hidden');
        const idVal = userIdentifier.value.trim();
        const passVal = userPassword.value.trim();

        if (!idVal) {
            loginErrorText.textContent = 'Mohon masukkan Email, Nomor HP, atau Username akun Anda.';
            loginError.classList.remove('hidden');
            userIdentifier.focus();
            return;
        }
        if (!passVal) {
            loginErrorText.textContent = 'Mohon masukkan Kata Sandi Anda.';
            loginError.classList.remove('hidden');
            userPassword.focus();
            return;
        }

        let matched = findRegisteredUser(idVal);

        // Cek & sinkronkan dengan database XAMPP jika dijalankan di localhost
        if (window.SehatinXamppApi) {
            const xamppLogin = await window.SehatinXamppApi.login(idVal, passVal, matched, selectedLoginRole);
            if (xamppLogin && xamppLogin.status === 'success' && xamppLogin.user) {
                const u = xamppLogin.user;
                const resolvedName = resolveUserName(
                    { fullName: u.full_name, identifier: u.identifier },
                    matched ? matched.fullName : idVal
                );
                matched = {
                    role: u.role || (matched && matched.role) || 'user',
                    rmNumber: u.rm_number || (matched && matched.rmNumber) || 'RM-2026-0001',
                    fullName: resolvedName,
                    identifier: u.identifier || idVal,
                    phone: u.phone || (matched && matched.phone) || '-',
                    birthDate: u.birth_date || (matched && matched.birthDate) || '-',
                    gender: u.gender || (matched && matched.gender) || '-',
                    address: u.address || (matched && matched.address) || '-',
                    password: u.plain_password || passVal
                };
                const existingLocal = findRegisteredUser(matched.identifier);
                if (existingLocal) {
                    Object.assign(existingLocal, matched);
                } else {
                    registeredUsers.push(matched);
                }
                saveRegisteredUsers();
            } else if (xamppLogin && xamppLogin.status === 'error' && !matched) {
                loginErrorText.textContent = xamppLogin.message;
                loginError.classList.remove('hidden');
                return;
            }
        }

        if (!matched) {
            const targetRoleName = selectedLoginRole === 'dokter' ? 'Dokter' : (selectedLoginRole === 'admin' ? 'Admin' : 'Pasien (User)');
            loginErrorText.textContent = 'Akun ' + targetRoleName + ' belum terdaftar. Silakan klik "Daftar Sekarang" di bawah untuk mendaftarkan akun resmi terlebih dahulu.';
            loginError.classList.remove('hidden');
            return;
        }

        const matchedRole = matched.role || 'user';
        if (matchedRole !== selectedLoginRole) {
            const roleLabelMap = { user: 'Pasien (User)', dokter: 'Dokter Praktik', admin: 'Administrator Sistem' };
            loginErrorText.textContent = 'Akses Ditolak: Akun "' + matched.fullName + '" terdaftar sebagai ' + (roleLabelMap[matchedRole] || 'Pasien') + ' dan tidak memiliki izin masuk ke portal ' + (roleLabelMap[selectedLoginRole] || selectedLoginRole) + '.';
            loginError.classList.remove('hidden');
            return;
        }

        if (matched.password !== passVal) {
            loginErrorText.textContent = 'Kata sandi salah. Klik "Lupa Kata Sandi?" untuk melihat kata sandi yang benar atau menggantinya.';
            loginError.classList.remove('hidden');
            return;
        }

        loginError.classList.add('hidden');
        applyLoggedInUserToUI(matched, idVal);

        loginView.classList.add('hidden');
        dashboardView.classList.remove('hidden');
        switchDashboardSubView('main');
        syncFromXamppDatabase();
    });

    // 2. Settings Dropdown & Logout
    settingsToggleBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        settingsMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', function (e) {
        if (!settingsMenu.classList.contains('hidden') && !settingsMenu.contains(e.target)) {
            settingsMenu.classList.add('hidden');
        }
    });

    function handleLogout() {
        settingsMenu.classList.add('hidden');
        dashboardView.classList.add('hidden');
        userPassword.value = '';
        loginSuccess.classList.add('hidden');
        loginError.classList.add('hidden');
        loginView.classList.remove('hidden');
        showLoginPanel();
        if (window.SehatinXamppApi) {
            window.SehatinXamppApi.logout();
        }
    }

    logoutBtn.addEventListener('click', handleLogout);
    sidebarLogoutBtn.addEventListener('click', handleLogout);
    mobileCardLogoutBtn.addEventListener('click', handleLogout);
    const headerStaffQuickLogoutBtn = document.getElementById('headerStaffQuickLogoutBtn');
    if (headerStaffQuickLogoutBtn) headerStaffQuickLogoutBtn.addEventListener('click', handleLogout);

    // 3. Sub-view Navigation Triggers
    function goToProfilePage() {
        if (currentActiveRole === 'dokter') {
            switchDashboardSubView('main');
            if (typeof switchDoctorWorkspaceTab === 'function') switchDoctorWorkspaceTab('profil_dokter');
            return;
        }
        if (currentActiveRole === 'admin') {
            switchDashboardSubView('main');
            return;
        }
        switchDashboardSubView('profile');
    }
    avatarOpenProfileBtn.addEventListener('click', goToProfilePage);
    displayPatientName.addEventListener('click', goToProfilePage);
    openProfilePageBtn.addEventListener('click', goToProfilePage);
    cardOpenProfileBtn.addEventListener('click', goToProfilePage);
    menuEditProfileBtn.addEventListener('click', goToProfilePage);
    document.querySelectorAll('.nav-profile-page').forEach(function (btn) {
        btn.addEventListener('click', goToProfilePage);
    });
    backFromProfileBtn.addEventListener('click', function () { switchDashboardSubView('main'); });
    document.querySelectorAll('.nav-dashboard-home').forEach(function (btn) {
        btn.addEventListener('click', function () { switchDashboardSubView('main'); });
    });

    menuSecurityBtn.addEventListener('click', function () { switchDashboardSubView('security'); });
    document.getElementById('cardOpenSecurityBtn').addEventListener('click', function () { switchDashboardSubView('security'); });

    document.getElementById('openResepPageBtn').addEventListener('click', function () { switchDashboardSubView('resep'); });
    document.getElementById('headerResepCounterBtn').addEventListener('click', function () { switchDashboardSubView('resep'); });
    document.getElementById('openJadwalPageBtn').addEventListener('click', function () { switchDashboardSubView('jadwal'); });
    document.getElementById('headerJadwalCounterBtn').addEventListener('click', function () { switchDashboardSubView('jadwal'); });
    document.getElementById('openLabPageBtn').addEventListener('click', function () { switchDashboardSubView('lab'); });
    document.querySelectorAll('.nav-open-diagnosis').forEach(function (btn) {
        btn.addEventListener('click', function () { switchDashboardSubView('diagnosis'); });
    });
    document.querySelectorAll('.nav-open-edukasi').forEach(function (btn) {
        btn.addEventListener('click', function () { switchDashboardSubView('edukasi'); });
    });
    document.querySelectorAll('.nav-open-healthy').forEach(function (btn) {
        btn.addEventListener('click', function () { switchDashboardSubView('healthy'); });
    });
    document.querySelectorAll('.nav-open-notifikasi').forEach(function (btn) {
        btn.addEventListener('click', function () { switchDashboardSubView('notifikasi'); });
    });

    // 4. Ganti Profil & Foto Avatar
    function openSwitchProfileModal() {
        settingsMenu.classList.add('hidden');
        newProfileNameInput.value = displayPatientName.textContent !== '-' ? displayPatientName.textContent : '';
        switchProfileModal.classList.remove('hidden');
    }
    openSwitchProfileBtn.addEventListener('click', openSwitchProfileModal);
    quickChangeAvatarBtn.addEventListener('click', openSwitchProfileModal);
    menuSwitchProfileBtn.addEventListener('click', openSwitchProfileModal);
    profilePageSwitchAvatarBtn.addEventListener('click', openSwitchProfileModal);
    closeSwitchProfileModalBtn.addEventListener('click', function () {
        switchProfileModal.classList.add('hidden');
    });
    switchProfileModal.addEventListener('click', function (e) {
        if (e.target === switchProfileModal) switchProfileModal.classList.add('hidden');
    });

    uploadAvatarInput.addEventListener('change', function (e) {
        const file = e.target.files && e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function (ev) {
            headerAvatarImg.src = ev.target.result;
            headerAvatarImg.classList.remove('hidden');
            headerAvatarIcon.classList.add('hidden');
            switchProfileModal.classList.add('hidden');
            if (window.SehatinXamppApi) {
                window.SehatinXamppApi.updateAvatar('fa-user-alt', ev.target.result);
            }
            showModal('Foto Profil Diperbarui', 'Foto profil Anda berhasil diganti.');
        };
        reader.readAsDataURL(file);
    });

    document.querySelectorAll('.avatar-preset-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const iconClass = btn.getAttribute('data-avatar-icon');
            headerAvatarImg.classList.add('hidden');
            headerAvatarIcon.className = 'fas ' + iconClass;
            switchProfileModal.classList.add('hidden');
            if (window.SehatinXamppApi) {
                window.SehatinXamppApi.updateAvatar(iconClass, null);
            }
            showModal('Avatar Diperbarui', 'Gaya ikon profil berhasil diterapkan.');
        });
    });

    switchProfileForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const newName = newProfileNameInput.value.trim();
        if (!newName) return;
        const randomRm = 'RM-2026-' + String(Math.floor(1000 + Math.random() * 9000));
        displayPatientName.textContent = newName;
        bioFullName.textContent = newName;
        inputPatientName.value = newName;
        displayRmNumber.textContent = randomRm;
        bioRmNumber.textContent = randomRm;
        const addrRecEl2 = document.getElementById('addrRecipientInput');
        if (addrRecEl2) addrRecEl2.value = newName;
        if (currentLoggedInUser) {
            currentLoggedInUser.fullName = newName;
            saveRegisteredUsers();
        }
        if (window.SehatinXamppApi) {
            window.SehatinXamppApi.switchProfile(newName).then(function () {
                syncFromXamppDatabase();
            });
        }
        switchProfileModal.classList.add('hidden');
        showModal('Profil Diganti', 'Berhasil beralih ke profil ' + newName + ' (' + randomRm + ').');
    });

    // 5. Edit Profile & Medical Data Modal
    function openEditModal() {
        settingsMenu.classList.add('hidden');
        editProfileModal.classList.remove('hidden');
    }
    function closeEditModal() {
        editProfileModal.classList.add('hidden');
    }
    openEditProfileBtn.addEventListener('click', openEditModal);
    quickEditVitalBtn.addEventListener('click', openEditModal);
    closeEditProfileModalBtn.addEventListener('click', closeEditModal);
    cancelEditProfileBtn.addEventListener('click', closeEditModal);
    editProfileModal.addEventListener('click', function (e) {
        if (e.target === editProfileModal) closeEditModal();
    });

    editProfileForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const newName = inputPatientName.value.trim() || 'Pasien';
        const newBirth = inputBirthDate.value.trim() || '-';
        const newGender = inputGender.value || '-';
        const newBlood = inputBlood.value || '-';
        const h = parseFloat(inputHeight.value) || 0;
        const w = parseFloat(inputWeight.value) || 0;
        const newAllergy = inputAllergy.value.trim() || 'Tidak Ada';
        const newPhone = inputPhone.value.trim() || '-';
        const newAddress = inputAddress.value.trim() || '-';

        displayPatientName.textContent = newName;
        bioFullName.textContent = newName;
        bioBirthDate.textContent = newBirth;
        bioGender.textContent = newGender;
        vitalBlood.textContent = newBlood;
        vitalHeight.textContent = h;
        vitalWeight.textContent = w;
        vitalAllergy.textContent = newAllergy;
        bioPhone.textContent = newPhone;
        bioAddress.textContent = newAddress;
        displayPatientContact.textContent = newPhone !== '-' ? ('Telepon: ' + newPhone) : 'Belum ada kontak tambahan';

        if (currentLoggedInUser) {
            currentLoggedInUser.fullName = newName;
            currentLoggedInUser.birthDate = newBirth;
            currentLoggedInUser.gender = newGender;
            currentLoggedInUser.phone = newPhone;
            currentLoggedInUser.address = newAddress;
            saveRegisteredUsers();
        }

        if (h > 0 && w > 0) {
            const bmiVal = w / Math.pow(h / 100, 2);
            vitalBmi.textContent = bmiVal.toFixed(1);
            if (bmiVal < 18.5) {
                vitalBmiStatus.textContent = 'Berat Kurang';
                vitalBmiStatus.className = 'text-[10px] font-semibold text-teal-600';
            } else if (bmiVal < 25) {
                vitalBmiStatus.textContent = 'Berat Ideal';
                vitalBmiStatus.className = 'text-[10px] font-semibold text-emerald-600';
            } else {
                vitalBmiStatus.textContent = 'Berat Berlebih';
                vitalBmiStatus.className = 'text-[10px] font-semibold text-red-500';
            }
        }

        if (window.SehatinXamppApi) {
            window.SehatinXamppApi.updateProfileAndMedical({
                full_name: newName,
                birth_date: newBirth,
                gender: newGender,
                blood_type: newBlood,
                height_cm: h,
                weight_kg: w,
                allergy: newAllergy,
                phone: newPhone,
                address: newAddress
            });
        }

        closeEditModal();
        showModal('Profil Diperbarui', 'Data diri dan ringkasan profil medis Anda telah berhasil disimpan.');
    });

    // 6. Security Sub-View Logic (Password, Medical PIN, 2FA, Sessions)
    const secNewPass = document.getElementById('secNewPass');
    const passStrengthLabel = document.getElementById('passStrengthLabel');
    const securityScoreText = document.getElementById('securityScoreText');

    function updateSecurityScore() {
        let score = 60;
        if (isPinSet) score += 20;
        if (is2faEnabled) score += 20;
        securityScoreText.textContent = score + '%';
    }

    (function detectBrowserSession() {
        const ua = navigator.userAgent || '';
        let browser = 'Web Browser';
        if (ua.includes('Chrome')) browser = 'Google Chrome';
        else if (ua.includes('Firefox')) browser = 'Mozilla Firefox';
        else if (ua.includes('Safari')) browser = 'Apple Safari';
        const platform = navigator.platform || 'Perangkat Web';
        document.getElementById('currentDeviceLabel').textContent = browser + ' (' + platform + ')';
    })();

    secNewPass.addEventListener('input', function () {
        const val = secNewPass.value;
        if (!val) {
            passStrengthLabel.textContent = 'Belum Diisi';
            passStrengthLabel.className = 'font-semibold text-gray-400';
        } else if (val.length < 6) {
            passStrengthLabel.textContent = 'Terlalu Pendek';
            passStrengthLabel.className = 'font-semibold text-red-500';
        } else if (val.length >= 8 && /[0-9]/.test(val)) {
            passStrengthLabel.textContent = 'Sangat Kuat';
            passStrengthLabel.className = 'font-semibold text-emerald-600';
        } else {
            passStrengthLabel.textContent = 'Cukup Kuat';
            passStrengthLabel.className = 'font-semibold text-teal-600';
        }
    });

    document.getElementById('changePasswordForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const newP = secNewPass.value.trim();
        const confP = document.getElementById('secConfirmPass').value.trim();
        if (newP.length < 6) {
            showModal('Kata Sandi Kurang Panjang', 'Kata sandi baru minimal terdiri dari 6 karakter.');
            return;
        }
        if (newP !== confP) {
            showModal('Konfirmasi Tidak Cocok', 'Kata sandi baru dan konfirmasi kata sandi tidak sama.');
            return;
        }
        if (currentLoggedInUser) {
            currentLoggedInUser.password = newP;
            saveRegisteredUsers();
        }
        if (window.SehatinXamppApi) {
            window.SehatinXamppApi.changePassword(newP);
        }
        e.target.reset();
        passStrengthLabel.textContent = 'Belum Diisi';
        showModal('Kata Sandi Diperbarui', 'Kata sandi akun Sehatin Anda berhasil diperbarui.');
    });

    document.getElementById('medicalPinForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const pin = document.getElementById('secMedicalPin').value.trim();
        const pinConf = document.getElementById('secMedicalPinConfirm').value.trim();
        if (!/^\d{6}$/.test(pin)) {
            showModal('Format PIN Tidak Valid', 'PIN Rekam Medis harus terdiri dari 6 digit angka.');
            return;
        }
        if (pin !== pinConf) {
            showModal('PIN Tidak Cocok', 'Konfirmasi 6 digit PIN tidak sesuai.');
            return;
        }
        isPinSet = true;
        const badge = document.getElementById('pinStatusBadge');
        badge.textContent = 'PIN Aktif';
        badge.className = 'text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-600 border border-emerald-200';
        updateSecurityScore();
        if (window.SehatinXamppApi) {
            window.SehatinXamppApi.setMedicalPin(pin);
        }
        e.target.reset();
        showModal('PIN Rekam Medis Aktif', 'PIN 6 digit untuk proteksi dokumen rekam medis telah diaktifkan.');
    });

    const toggle2faBtn = document.getElementById('toggle2faBtn');
    toggle2faBtn.addEventListener('click', function () {
        is2faEnabled = !is2faEnabled;
        const method = document.getElementById('twoFactorMethod').value;
        const note = document.getElementById('twoFactorStatusNote');
        if (is2faEnabled) {
            toggle2faBtn.textContent = 'Aktif';
            toggle2faBtn.className = 'px-3 py-1.5 rounded-xl text-xs font-semibold bg-emerald-500 text-white transition-colors';
            note.textContent = 'Verifikasi 2 Langkah aktif melalui: ' + method + '.';
            note.className = 'text-[11px] text-emerald-600 font-medium';
        } else {
            toggle2faBtn.textContent = 'Nonaktif';
            toggle2faBtn.className = 'px-3 py-1.5 rounded-xl text-xs font-semibold bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors';
            note.textContent = 'Aktifkan Verifikasi 2 Langkah untuk meningkatkan keamanan akun Anda.';
            note.className = 'text-[11px] text-gray-400';
        }
        if (window.SehatinXamppApi) {
            window.SehatinXamppApi.toggle2FA(is2faEnabled, method);
        }
        updateSecurityScore();
    });

    document.getElementById('revokeOtherSessionsBtn').addEventListener('click', function () {
        showModal('Sesi Lain Dihentikan', 'Seluruh sesi login pada perangkat lain telah berhasil dikeluarkan.');
    });

    // 8. Resep Obat Logic (Zero Dummy Data)
    const addResepForm = document.getElementById('addResepForm');
    document.getElementById('toggleAddResepFormBtn').addEventListener('click', function () {
        addResepForm.classList.toggle('hidden');
    });

    function renderResepList() {
        const container = document.getElementById('resepListContainer');
        const empty = document.getElementById('emptyResepState');
        container.querySelectorAll('.resep-item-card').forEach(function (el) { el.remove(); });
        document.getElementById('headerResepCount').textContent = resepItems.length;

        if (resepItems.length === 0) {
            empty.classList.remove('hidden');
            return;
        }
        empty.classList.add('hidden');

        resepItems.forEach(function (r, idx) {
            const card = document.createElement('div');
            card.className = 'resep-item-card border border-slate-200 rounded-xl p-3.5 flex flex-wrap items-center justify-between gap-3 bg-slate-50/60';
            card.innerHTML =
                '<div>' +
                    '<span class="text-[10px] font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded-md">e-Resep #' + (idx + 1) + '</span>' +
                    '<h4 class="text-xs sm:text-sm font-bold text-gray-800 mt-1">' + r.medName + '</h4>' +
                    '<p class="text-[11px] text-gray-500">Dokter: ' + r.doctor + ' • Aturan: ' + r.rule + '</p>' +
                '</div>';
            container.appendChild(card);
        });
    }

    addResepForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const item = {
            medName: document.getElementById('resepMedNameInput').value.trim(),
            doctor: document.getElementById('resepDoctorInput').value.trim(),
            rule: document.getElementById('resepRuleInput').value.trim()
        };
        resepItems.push(item);
        if (window.SehatinXamppApi) {
            window.SehatinXamppApi.addPrescription({ med_name: item.medName, doctor_name: item.doctor, usage_rule: item.rule });
        }
        if (typeof pushAppNotification === 'function') {
            pushAppNotification('OBAT', 'Resep Obat Baru Dicatat: ' + item.medName, 'Resep ' + item.medName + ' dari ' + item.doctor + ' (' + item.rule + ') telah ditambahkan.', 'resep');
        }
        e.target.reset();
        addResepForm.classList.add('hidden');
        renderResepList();
    });

    // 9. Jadwal Dokter Logic (Zero Dummy Data)
    const addJadwalForm = document.getElementById('addJadwalForm');
    document.getElementById('toggleAddJadwalFormBtn').addEventListener('click', function () {
        addJadwalForm.classList.toggle('hidden');
    });

    function renderJadwalList() {
        const container = document.getElementById('jadwalListContainer');
        const empty = document.getElementById('emptyJadwalState');
        container.querySelectorAll('.jadwal-item-card').forEach(function (el) { el.remove(); });
        document.getElementById('headerJadwalCount').textContent = jadwalItems.length;

        if (jadwalItems.length === 0) {
            empty.classList.remove('hidden');
            return;
        }
        empty.classList.add('hidden');

        jadwalItems.forEach(function (j) {
            const card = document.createElement('div');
            card.className = 'jadwal-item-card border border-slate-200 rounded-xl p-3.5 flex flex-wrap items-center justify-between gap-3 bg-slate-50';
            card.innerHTML =
                '<div>' +
                    '<h4 class="text-xs sm:text-sm font-bold text-gray-800">' + j.doctor + '</h4>' +
                    '<p class="text-[11px] text-gray-500"><i class="far fa-calendar mr-1"></i>' + j.date + ' • <i class="far fa-clock mr-1"></i>' + j.time + '</p>' +
                '</div>' +
                '<span class="text-[10px] font-semibold bg-emerald-50 text-emerald-600 border border-emerald-200 px-2.5 py-1 rounded-full">Terjadwal</span>';
            container.appendChild(card);
        });
    }

    addJadwalForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const item = {
            doctor: document.getElementById('jadwalDoctorInput').value.trim(),
            date: document.getElementById('jadwalDateInput').value,
            time: document.getElementById('jadwalTimeInput').value
        };
        jadwalItems.push(item);
        if (window.SehatinXamppApi) {
            window.SehatinXamppApi.addSchedule({ doctor_name: item.doctor, schedule_date: item.date, schedule_time: item.time });
        }
        if (typeof pushAppNotification === 'function') {
            pushAppNotification('KONSULTASI', 'Jadwal Dokter Baru: ' + item.doctor, 'Janji temu bersama ' + item.doctor + ' terjadwal pada ' + item.date + ' pukul ' + item.time + '.', 'jadwal');
        }
        e.target.reset();
        addJadwalForm.classList.add('hidden');
        renderJadwalList();
    });

    // 10. Hasil Lab Logic (Zero Dummy Data)
    const addLabForm = document.getElementById('addLabForm');
    document.getElementById('toggleAddLabFormBtn').addEventListener('click', function () {
        addLabForm.classList.toggle('hidden');
    });

    function renderLabList() {
        const container = document.getElementById('labListContainer');
        const empty = document.getElementById('emptyLabState');
        container.querySelectorAll('.lab-item-card').forEach(function (el) { el.remove(); });

        if (labItems.length === 0) {
            empty.classList.remove('hidden');
            return;
        }
        empty.classList.add('hidden');

        labItems.forEach(function (l) {
            const card = document.createElement('div');
            card.className = 'lab-item-card border border-slate-200 rounded-xl p-3.5 flex flex-wrap items-center justify-between gap-3 bg-slate-50';
            card.innerHTML =
                '<div>' +
                    '<h4 class="text-xs sm:text-sm font-bold text-gray-800">' + l.testName + '</h4>' +
                    '<p class="text-[11px] text-gray-500">Instansi: ' + l.clinic + ' • Hasil: <strong>' + l.result + '</strong></p>' +
                '</div>' +
                '<span class="text-[10px] font-semibold bg-teal-50 text-teal-600 px-2.5 py-1 rounded-full">Tersimpan</span>';
            container.appendChild(card);
        });
    }

    addLabForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const item = {
            testName: document.getElementById('labTestNameInput').value.trim(),
            clinic: document.getElementById('labClinicInput').value.trim(),
            result: document.getElementById('labResultValueInput').value.trim()
        };
        labItems.push(item);
        if (window.SehatinXamppApi) {
            window.SehatinXamppApi.addLabResult({ test_name: item.testName, clinic_name: item.clinic, result_value: item.result });
        }
        if (typeof pushAppNotification === 'function') {
            pushAppNotification('SISTEM', 'Hasil Lab Tersimpan: ' + item.testName, 'Dokumen pemeriksaan ' + item.testName + ' di ' + item.clinic + ' telah disimpan.', 'lab');
        }
        e.target.reset();
        addLabForm.classList.add('hidden');
        renderLabList();
    });

    // 13. Real-Time Doctor & Patient Chat (Zero Dummy Data)
    const openChatPageBtn = document.getElementById('openChatPageBtn');
    const backFromChatBtn = document.getElementById('backFromChatBtn');
    const rolePatientBtn = document.getElementById('rolePatientBtn');
    const roleDoctorBtn = document.getElementById('roleDoctorBtn');
    const doctorNameInputBar = document.getElementById('doctorNameInputBar');
    const customDoctorNameInput = document.getElementById('customDoctorNameInput');
    const clearChatBtn = document.getElementById('clearChatBtn');
    const chatMessagesContainer = document.getElementById('chatMessagesContainer');
    const emptyChatState = document.getElementById('emptyChatState');
    const doctorChatForm = document.getElementById('doctorChatForm');
    const chatMessageInput = document.getElementById('chatMessageInput');
    const activeSenderBadge = document.getElementById('activeSenderBadge');

    let currentChatRole = 'patient';
    let chatMessages = [];
    let chatChannel = null;

    try {
        if ('BroadcastChannel' in window) {
            chatChannel = new BroadcastChannel('sehatin_doctor_patient_chat');
            chatChannel.onmessage = function (ev) {
                if (ev.data && ev.data.type === 'NEW_MESSAGE') {
                    chatMessages.push(ev.data.payload);
                    renderChatMessages();
                } else if (ev.data && ev.data.type === 'CLEAR_CHAT') {
                    chatMessages = [];
                    renderChatMessages();
                }
            };
        }
    } catch (err) {
        chatChannel = null;
    }

    openChatPageBtn.addEventListener('click', function () { switchDashboardSubView('chat'); });
    document.getElementById('gridKonsultasiBtn').addEventListener('click', function () { switchDashboardSubView('chat'); });
    document.querySelectorAll('.nav-open-chat').forEach(function (btn) {
        btn.addEventListener('click', function () { switchDashboardSubView('chat'); });
    });
    backFromChatBtn.addEventListener('click', function () { switchDashboardSubView('main'); });

    function setChatRole(role) {
        currentChatRole = role;
        if (role === 'patient') {
            rolePatientBtn.className = 'px-3 py-1 rounded-lg font-semibold bg-white text-teal-600 shadow-sm transition-all focus:outline-none';
            roleDoctorBtn.className = 'px-3 py-1 rounded-lg font-medium text-gray-600 hover:text-gray-800 transition-all focus:outline-none';
            doctorNameInputBar.classList.add('hidden');
            activeSenderBadge.textContent = 'Pasien';
            activeSenderBadge.className = 'shrink-0 text-[11px] font-semibold px-2.5 py-1.5 rounded-lg bg-teal-50 text-teal-700 border border-teal-200';
        } else {
            roleDoctorBtn.className = 'px-3 py-1 rounded-lg font-semibold bg-white text-blue-600 shadow-sm transition-all focus:outline-none';
            rolePatientBtn.className = 'px-3 py-1 rounded-lg font-medium text-gray-600 hover:text-gray-800 transition-all focus:outline-none';
            doctorNameInputBar.classList.remove('hidden');
            activeSenderBadge.textContent = 'Dokter';
            activeSenderBadge.className = 'shrink-0 text-[11px] font-semibold px-2.5 py-1.5 rounded-lg bg-blue-50 text-blue-700 border border-blue-200';
        }
    }

    rolePatientBtn.addEventListener('click', function () { setChatRole('patient'); });
    roleDoctorBtn.addEventListener('click', function () { setChatRole('doctor'); });

    function renderChatMessages() {
        chatMessagesContainer.querySelectorAll('.chat-bubble-item').forEach(function (b) { b.remove(); });
        if (chatMessages.length === 0) {
            emptyChatState.classList.remove('hidden');
            return;
        }
        emptyChatState.classList.add('hidden');

        chatMessages.forEach(function (msg) {
            const isPatient = msg.role === 'patient';
            const wrapper = document.createElement('div');
            wrapper.className = 'chat-bubble-item flex flex-col ' + (isPatient ? 'items-end' : 'items-start');

            const bubble = document.createElement('div');
            bubble.className = isPatient
                ? 'max-w-[80%] sm:max-w-[70%] bg-teal-600 text-white rounded-2xl rounded-tr-none px-4 py-2.5 shadow-sm'
                : 'max-w-[80%] sm:max-w-[70%] bg-white border border-gray-200 text-gray-800 rounded-2xl rounded-tl-none px-4 py-2.5 shadow-sm';

            const header = document.createElement('div');
            header.className = 'flex items-center space-x-1.5 text-[10px] mb-1 ' + (isPatient ? 'text-teal-100' : 'text-blue-600 font-semibold');
            header.innerHTML = '<i class="fas ' + (isPatient ? 'fa-user' : 'fa-user-md') + '"></i><span>' + msg.senderName + '</span><span>•</span><span>' + msg.time + '</span>';

            const body = document.createElement('p');
            body.className = 'text-xs sm:text-sm leading-relaxed break-words';
            body.textContent = msg.text;

            bubble.appendChild(header);
            bubble.appendChild(body);
            wrapper.appendChild(bubble);
            chatMessagesContainer.appendChild(wrapper);
        });

        chatMessagesContainer.scrollTop = chatMessagesContainer.scrollHeight;
    }

    doctorChatForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const text = chatMessageInput.value.trim();
        if (!text) return;

        const now = new Date();
        const timeStr = String(now.getHours()).padStart(2, '0') + ':' + String(now.getMinutes()).padStart(2, '0');
        const senderName = currentChatRole === 'patient'
            ? (displayPatientName.textContent !== '-' ? displayPatientName.textContent : 'Pasien')
            : (customDoctorNameInput.value.trim() || 'Dokter');

        const msgObj = {
            role: currentChatRole,
            senderName: senderName,
            text: text,
            time: timeStr
        };

        chatMessages.push(msgObj);
        chatMessageInput.value = '';
        renderChatMessages();

        if (window.SehatinXamppApi) {
            window.SehatinXamppApi.sendChatMessage({
                konsultasi_id: activeKonsultasiId || 0,
                dokter_id: (selectedConsultDoctor && selectedConsultDoctor.id) ? selectedConsultDoctor.id : 0,
                pesan: msgObj.text,
                sender_role: msgObj.role,
                sender_name: msgObj.senderName,
                message_text: msgObj.text,
                sent_time: msgObj.time
            }).then(function (res) {
                if (res && res.konsultasi_id) {
                    activeKonsultasiId = res.konsultasi_id;
                }
                pollChatMessagesFromDatabase();
            });
        }

        if (chatChannel) {
            chatChannel.postMessage({ type: 'NEW_MESSAGE', payload: msgObj });
        }
    });

    clearChatBtn.addEventListener('click', function () {
        chatMessages = [];
        renderChatMessages();
        if (window.SehatinXamppApi) {
            window.SehatinXamppApi.clearChat();
        }
        if (chatChannel) {
            chatChannel.postMessage({ type: 'CLEAR_CHAT' });
        }
    });

    // 15. Generic Feature Triggers
    document.querySelectorAll('.feature-trigger').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const title = btn.getAttribute('data-feature') || 'Fitur Sehatin';
            const desc = btn.getAttribute('data-desc') || 'Fitur berhasil diakses.';
            settingsMenu.classList.add('hidden');
            showModal(title, desc);
        });
    });

    // 16. XAMPP Database Synchronization Helper & Real-Time Polling (Zero Dummy Data)
    async function pollChatMessagesFromDatabase() {
        if (!window.SehatinXamppApi || !currentLoggedInUser) return;
        const partnerDocId = (selectedConsultDoctor && selectedConsultDoctor.id) ? selectedConsultDoctor.id : 0;
        const res = await window.SehatinXamppApi.getChatMessages(activeKonsultasiId || 0, 0, partnerDocId);
        if (!res || res.status !== 'success') return;
        if (res.konsultasi_id) {
            activeKonsultasiId = res.konsultasi_id;
        }
        if (Array.isArray(res.chats)) {
            const mapped = res.chats.map(function (ch) {
                return {
                    id: ch.id,
                    konsultasiId: ch.konsultasi_id,
                    role: ch.sender_role,
                    senderName: ch.sender_name,
                    text: ch.message_text || ch.pesan,
                    time: ch.sent_time
                };
            });
            if (JSON.stringify(mapped) !== JSON.stringify(chatMessages)) {
                chatMessages = mapped;
                renderChatMessages();
                updateConsultRoomEmptyOrActiveState();
                if (typeof renderDoctorRoleDashboard === 'function') renderDoctorRoleDashboard();
            }
        }
    }

    // Interval Polling AJAX setiap 2.5 detik untuk sinkronisasi pesan ruang chat Pasien <-> Dokter (Blueprint 6.4)
    setInterval(function () {
        if (currentLoggedInUser && !dashboardView.classList.contains('hidden')) {
            pollChatMessagesFromDatabase();
        }
    }, 2500);

    async function syncFromXamppDatabase() {
        if (!window.SehatinXamppApi) return;
        const data = await window.SehatinXamppApi.fetchAllData();
        if (!data || data.status !== 'success' || !data.user) return;

        const u = data.user;
        const dbRoleRaw = strtolowerRole(u.role);
        const uiRole = dbRoleRaw === 'pasien' ? 'user' : dbRoleRaw;

        if (!currentLoggedInUser) {
            applyLoggedInUserToUI({
                id: u.id,
                role: uiRole,
                rmNumber: u.rm_number || u.no_rm || '-',
                fullName: u.full_name || u.nama_lengkap || 'Pengguna Sehatin',
                identifier: u.identifier || u.email || '',
                phone: u.phone || u.no_hp || '-',
                birthDate: u.birth_date || u.tanggal_lahir || '-',
                gender: u.gender || u.jenis_kelamin || '-',
                address: u.address || u.alamat || '-',
                specialty: u.specialty || u.spesialisasi || '',
                hospital: u.hospital || u.rumah_sakit || ''
            }, u.email || '');
            loginView.classList.add('hidden');
            dashboardView.classList.remove('hidden');
            switchDashboardSubView('main');
        }

        if (data.active_konsultasi_id) {
            activeKonsultasiId = data.active_konsultasi_id;
        }
        if (Array.isArray(data.master_obat)) {
            masterObatCatalog = data.master_obat;
        }

        if (Array.isArray(data.all_users)) {
            registeredUsers = data.all_users.map(function (usr) {
                const rRole = strtolowerRole(usr.role);
                return {
                    id: usr.id,
                    role: rRole === 'pasien' ? 'user' : rRole,
                    dbRole: rRole,
                    rmNumber: usr.rm_number || usr.no_rm || '-',
                    fullName: usr.full_name || usr.nama_lengkap || '-',
                    identifier: usr.identifier || usr.email || '-',
                    phone: usr.phone || usr.no_hp || '-',
                    birthDate: usr.birth_date || usr.tanggal_lahir || '-',
                    gender: usr.gender || usr.jenis_kelamin || '-',
                    address: usr.address || usr.alamat || '-',
                    specialty: usr.specialty || usr.spesialisasi || '',
                    hospital: usr.hospital || usr.rumah_sakit || '',
                    statusAktif: typeof usr.status_aktif !== 'undefined' ? Number(usr.status_aktif) : 1
                };
            });
        }

        const m = data.medical || {};
        const syncedName = resolveUserName(
            { fullName: u.full_name || u.nama_lengkap, identifier: u.identifier || u.email },
            currentLoggedInUser ? currentLoggedInUser.fullName : ''
        );
        displayPatientName.textContent = syncedName;
        bioFullName.textContent = syncedName;
        inputPatientName.value = syncedName;
        newProfileNameInput.value = syncedName;
        const addrRecEl3 = document.getElementById('addrRecipientInput');
        if (addrRecEl3) addrRecEl3.value = syncedName;

        displayRmNumber.textContent = u.rm_number || u.no_rm || '-';
        bioRmNumber.textContent = u.rm_number || u.no_rm || '-';
        bioBirthDate.textContent = u.birth_date || u.tanggal_lahir || '-';
        bioGender.textContent = u.gender || u.jenis_kelamin || '-';
        bioPhone.textContent = u.phone || u.no_hp || '-';
        bioAddress.textContent = u.address || u.alamat || '-';

        vitalBlood.textContent = m.blood_type || '-';
        vitalHeight.textContent = m.height_cm || 0;
        vitalWeight.textContent = m.weight_kg || 0;
        vitalBmi.textContent = m.bmi_value > 0 ? m.bmi_value : '-';
        vitalBmiStatus.textContent = m.bmi_status || 'Belum Diisi';
        vitalAllergy.textContent = m.allergy || 'Tidak Ada';
        const vitalBpEl = document.getElementById('vitalBp');
        if (vitalBpEl) vitalBpEl.textContent = m.blood_pressure || '-';

        if (Array.isArray(data.prescriptions)) {
            resepItems = data.prescriptions.map(function (r) {
                return {
                    id: r.id,
                    obatId: r.obat_id,
                    medName: r.med_name || r.nama_obat,
                    doctor: r.doctor_name || r.nama_dokter,
                    rule: r.usage_rule || r.dosis
                };
            });
            renderResepList();
        }

        if (Array.isArray(data.labs)) {
            labItems = data.labs.map(function (l) {
                return {
                    id: l.id,
                    testName: l.test_name || l.jenis_pemeriksaan,
                    clinic: l.clinic_name || l.nama_dokter_pengirim || 'Laboratorium Sehatin',
                    result: l.result_value || l.hasil_ringkasan
                };
            });
            renderLabList();
        }

        if (Array.isArray(data.chats)) {
            chatMessages = data.chats.map(function (ch) {
                return {
                    id: ch.id,
                    konsultasiId: ch.konsultasi_id,
                    role: ch.sender_role,
                    senderName: ch.sender_name,
                    text: ch.message_text || ch.pesan,
                    time: ch.sent_time
                };
            });
            renderChatMessages();
        }

        if (Array.isArray(data.consultation_doctors)) {
            customConsultDoctors = data.consultation_doctors.map(function (d) {
                return {
                    id: d.id,
                    dokterId: d.dokter_id || d.id,
                    jadwalId: d.jadwal_id || null,
                    name: d.doctor_name || d.nama_dokter,
                    specialty: d.specialty || d.spesialisasi || 'Dokter Spesialis',
                    hospital: d.hospital || d.rumah_sakit || 'RS Mitra Sehatin',
                    hours: d.practice_hours || 'Jadwal Praktik Aktif',
                    exp: d.experience_years || ('No. STR: ' + (d.no_str || '-')),
                    status: d.status_online || 'Aktif Praktik',
                    isDefault: false
                };
            });
            renderKonsulDoctorList();
        }

        if (Array.isArray(data.schedules)) {
            jadwalItems = data.schedules.map(function (j) {
                return {
                    id: j.id,
                    konsultasiId: j.konsultasi_id || j.id,
                    pasienId: j.pasien_id,
                    dokterId: j.dokter_id,
                    namaPasien: j.nama_pasien || '',
                    doctor: j.doctor_name || j.nama_dokter,
                    date: j.schedule_date || j.tanggal_booking,
                    time: j.schedule_time || '-',
                    type: j.consult_type || 'Konsultasi Dokter',
                    notes: j.complaint_notes || j.keluhan_awal || '',
                    status: j.status || 'aktif'
                };
            });
            renderJadwalList();
            renderKonsulScheduleList();
        }

        if (Array.isArray(data.consultation_histories)) {
            consultHistories = data.consultation_histories.map(function (h) {
                let parsedTrans = [];
                if (h.chat_transcript) {
                    try { parsedTrans = JSON.parse(h.chat_transcript) || []; } catch (e) { parsedTrans = []; }
                }
                return {
                    id: h.id,
                    doctor: h.doctor_name || h.nama_dokter,
                    specialty: h.specialty || h.spesialisasi || 'Dokter Spesialis',
                    date: h.consult_date || h.tanggal_booking,
                    time: h.consult_time || '-',
                    type: h.consult_type || 'Konsultasi Dokter',
                    complaint: h.complaint || h.keluhan_awal || '-',
                    diagnosis: h.diagnosis_notes || h.diagnosis_dokter || '-',
                    followup: h.followup_action || 'Pemeriksaan Selesai',
                    transcript: parsedTrans
                };
            });
            renderKonsulRiwayatList();
            if (typeof renderDiagnosisHistory === 'function') {
                diagnosisHistoryItems = consultHistories
                    .filter(function (h) {
                        return h.diagnosis && h.diagnosis !== '-' && h.diagnosis !== 'Menunggu pemeriksaan dokter';
                    })
                    .map(function (h) {
                        return {
                            date: (h.date || '-') + (h.time && h.time !== '-' ? (' • ' + h.time) : ''),
                            title: 'Diagnosis Dokter (' + (h.doctor || 'Dokter') + '): ' + h.diagnosis,
                            urgency: 'Hasil Pemeriksaan Dokter',
                            urgencyClass: 'bg-teal-50 text-teal-700 border-teal-200',
                            symptoms: [h.complaint || 'Konsultasi Medis'],
                            specialist: (h.doctor || 'Dokter') + ' (' + (h.specialty || 'Spesialis') + ')'
                        };
                    });
                renderDiagnosisHistory();
            }
        }

        updateConsultRoomEmptyOrActiveState();
        if (typeof renderDoctorRoleDashboard === 'function') renderDoctorRoleDashboard();
        if (typeof renderAdminRoleDashboard === 'function') renderAdminRoleDashboard();
        if (typeof populateAdminAndDoctorDropdowns === 'function') populateAdminAndDoctorDropdowns();
    }

    function strtolowerRole(r) {
        const clean = String(r || 'pasien').trim().toLowerCase();
        return clean === 'user' ? 'pasien' : clean;
    }

    // =========================================================================
    // 17. FITUR BAGIAN KONSULTASI:
    //     - Daftar Dokter Aktif Pekanbaru (Data Nyata RS di Kota Pekanbaru)
    //     - Jadwal Konsultasi
    //     - Ruang Konsultasi (Kosong jika tidak ada sesi konsultasi aktif)
    //     - Riwayat Konsultasi
    // =========================================================================
    const tabKonsulDaftarBtn = document.getElementById('tabKonsulDaftarBtn');
    const tabKonsulJadwalBtn = document.getElementById('tabKonsulJadwalBtn');
    const tabKonsulRuangBtn = document.getElementById('tabKonsulRuangBtn');
    const tabKonsulRiwayatBtn = document.getElementById('tabKonsulRiwayatBtn');

    const konsulDaftarPanel = document.getElementById('konsulDaftarPanel');
    const konsulJadwalPanel = document.getElementById('konsulJadwalPanel');
    const konsulRuangPanel = document.getElementById('konsulRuangPanel');
    const konsulRiwayatPanel = document.getElementById('konsulRiwayatPanel');

    const badgeKonsulDaftarCount = document.getElementById('badgeKonsulDaftarCount');
    const badgeKonsulJadwalCount = document.getElementById('badgeKonsulJadwalCount');
    const badgeKonsulRiwayatCount = document.getElementById('badgeKonsulRiwayatCount');
    const badgeKonsulRuangStatus = document.getElementById('badgeKonsulRuangStatus');

    const emptyActiveConsultationBanner = document.getElementById('emptyActiveConsultationBanner');
    const activeConsultationRoomWrap = document.getElementById('activeConsultationRoomWrap');
    const goSelectDoctorForChatBtn = document.getElementById('goSelectDoctorForChatBtn');
    const goScheduleFromEmptyRoomBtn = document.getElementById('goScheduleFromEmptyRoomBtn');
    const endActiveConsultSessionBtn = document.getElementById('endActiveConsultSessionBtn');

    // Direktori Dokter 100% Diambil dari Database MySQL (`users` role='dokter' & `jadwal_dokter`) - Zero Dummy Data
    const defaultDoctorsCatalog = [];

    let customConsultDoctors = [];
    let consultHistories = [];
    // Ruang konsultasi kosong di awal jika memang belum ada sesi konsultasi aktif
    let selectedConsultDoctor = null;

    function getAllConsultDoctors() {
        return defaultDoctorsCatalog.concat(customConsultDoctors);
    }

    function updateConsultRoomEmptyOrActiveState() {
        const hasActiveSession = Boolean(selectedConsultDoctor) || (Array.isArray(chatMessages) && chatMessages.length > 0);
        if (emptyActiveConsultationBanner) {
            emptyActiveConsultationBanner.classList.toggle('hidden', hasActiveSession);
        }
        if (activeConsultationRoomWrap) {
            activeConsultationRoomWrap.classList.toggle('hidden', !hasActiveSession);
        }
        if (badgeKonsulRuangStatus) {
            if (hasActiveSession) {
                badgeKonsulRuangStatus.textContent = 'Aktif';
                badgeKonsulRuangStatus.className = 'px-1.5 py-0.5 text-[9px] rounded-full bg-teal-100 text-teal-800 font-bold';
            } else {
                badgeKonsulRuangStatus.textContent = 'Kosong';
                badgeKonsulRuangStatus.className = 'px-1.5 py-0.5 text-[9px] rounded-full bg-slate-200 text-slate-700 font-bold';
            }
        }
    }

    function switchKonsultasiTab(tabName) {
        const panels = {
            daftar: konsulDaftarPanel,
            jadwal: konsulJadwalPanel,
            ruang: konsulRuangPanel,
            riwayat: konsulRiwayatPanel
        };
        const buttons = {
            daftar: tabKonsulDaftarBtn,
            jadwal: tabKonsulJadwalBtn,
            ruang: tabKonsulRuangBtn,
            riwayat: tabKonsulRiwayatBtn
        };

        Object.keys(panels).forEach(function (key) {
            if (panels[key]) {
                panels[key].classList.toggle('hidden', key !== tabName);
            }
            if (buttons[key]) {
                if (key === tabName) {
                    buttons[key].className = 'konsul-tab-btn flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold bg-teal-600 text-white shadow-sm transition-all focus:outline-none';
                } else {
                    buttons[key].className = 'konsul-tab-btn flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold bg-slate-50 text-gray-600 hover:bg-teal-50 hover:text-teal-600 border border-gray-200/80 transition-all focus:outline-none';
                }
            }
        });

        document.querySelectorAll('.konsul-subnav-btn').forEach(function (btn) {
            const isMatch = btn.getAttribute('data-konsul-nav') === tabName;
            btn.classList.toggle('bg-teal-50', isMatch);
            btn.classList.toggle('text-teal-600', isMatch);
            btn.classList.toggle('font-semibold', isMatch);
        });

        updateConsultRoomEmptyOrActiveState();
    }

    if (tabKonsulDaftarBtn) {
        tabKonsulDaftarBtn.addEventListener('click', function () { switchKonsultasiTab('daftar'); });
    }
    if (tabKonsulJadwalBtn) {
        tabKonsulJadwalBtn.addEventListener('click', function () { switchKonsultasiTab('jadwal'); });
    }
    if (tabKonsulRuangBtn) {
        tabKonsulRuangBtn.addEventListener('click', function () { switchKonsultasiTab('ruang'); });
    }
    if (tabKonsulRiwayatBtn) {
        tabKonsulRiwayatBtn.addEventListener('click', function () { switchKonsultasiTab('riwayat'); });
    }

    if (goSelectDoctorForChatBtn) {
        goSelectDoctorForChatBtn.addEventListener('click', function () {
            switchKonsultasiTab('daftar');
        });
    }
    if (goScheduleFromEmptyRoomBtn) {
        goScheduleFromEmptyRoomBtn.addEventListener('click', function () {
            switchKonsultasiTab('jadwal');
        });
    }
    if (endActiveConsultSessionBtn) {
        endActiveConsultSessionBtn.addEventListener('click', function () {
            selectedConsultDoctor = null;
            chatMessages = [];
            renderChatMessages();
            syncDoctorSelectAndDatalist();
            updateConsultRoomEmptyOrActiveState();
        });
    }

    document.querySelectorAll('.konsul-subnav-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const targetTab = btn.getAttribute('data-konsul-nav') || 'daftar';
            switchDashboardSubView('chat');
            switchKonsultasiTab(targetTab);
        });
    });

    function syncDoctorSelectAndDatalist() {
        const docs = getAllConsultDoctors();
        const datalist = document.getElementById('konsulDoctorDatalist');
        const activeSelect = document.getElementById('selectActiveConsultDoctor');
        const specBadge = document.getElementById('activeConsultDoctorSpecBadge');

        if (datalist) {
            datalist.innerHTML = '';
            docs.forEach(function (d) {
                const opt = document.createElement('option');
                opt.value = d.name + ' (' + d.specialty + ' - ' + d.hospital + ')';
                datalist.appendChild(opt);
            });
        }

        if (activeSelect) {
            activeSelect.innerHTML = '';
            const emptyOpt = document.createElement('option');
            emptyOpt.value = '';
            emptyOpt.textContent = '-- Pilih Dokter Pekanbaru untuk Konsultasi --';
            activeSelect.appendChild(emptyOpt);

            docs.forEach(function (d) {
                const opt = document.createElement('option');
                opt.value = d.name;
                opt.textContent = d.name + ' — ' + d.hospital;
                activeSelect.appendChild(opt);
            });
            if (selectedConsultDoctor && selectedConsultDoctor.name) {
                activeSelect.value = selectedConsultDoctor.name;
            } else {
                activeSelect.value = '';
            }
        }

        if (specBadge) {
            if (selectedConsultDoctor) {
                specBadge.textContent = selectedConsultDoctor.specialty + ' • ' + selectedConsultDoctor.hospital;
            } else {
                specBadge.textContent = 'Belum Ada Sesi Aktif';
            }
        }
        if (customDoctorNameInput) {
            customDoctorNameInput.value = selectedConsultDoctor ? selectedConsultDoctor.name : '';
        }
        updateConsultRoomEmptyOrActiveState();
    }

    const selectActiveConsultDoctor = document.getElementById('selectActiveConsultDoctor');
    if (selectActiveConsultDoctor) {
        selectActiveConsultDoctor.addEventListener('change', function () {
            const chosenName = selectActiveConsultDoctor.value;
            if (!chosenName) {
                selectedConsultDoctor = null;
                syncDoctorSelectAndDatalist();
                return;
            }
            const found = getAllConsultDoctors().find(function (d) { return d.name === chosenName; });
            if (found) {
                selectedConsultDoctor = found;
                syncDoctorSelectAndDatalist();
            }
        });
    }

    // A. Render Daftar Dokter Aktif Pekanbaru
    const searchKonsulDoctorInput = document.getElementById('searchKonsulDoctorInput');
    const filterKonsulSpecSelect = document.getElementById('filterKonsulSpecSelect');
    const filterKonsulHospitalSelect = document.getElementById('filterKonsulHospitalSelect');
    const toggleAddKonsulDoctorBtn = document.getElementById('toggleAddKonsulDoctorBtn');
    const cancelAddKonsulDoctorBtn = document.getElementById('cancelAddKonsulDoctorBtn');
    const addKonsulDoctorForm = document.getElementById('addKonsulDoctorForm');
    const konsulDoctorListContainer = document.getElementById('konsulDoctorListContainer');

    function renderKonsulDoctorList() {
        if (!konsulDoctorListContainer) return;
        const allDocs = getAllConsultDoctors();
        if (badgeKonsulDaftarCount) {
            badgeKonsulDaftarCount.textContent = allDocs.length;
        }
        syncDoctorSelectAndDatalist();

        const query = (searchKonsulDoctorInput ? searchKonsulDoctorInput.value : '').trim().toLowerCase();
        const specFilter = filterKonsulSpecSelect ? filterKonsulSpecSelect.value : 'ALL';
        const hospFilter = filterKonsulHospitalSelect ? filterKonsulHospitalSelect.value : 'ALL';

        const filtered = allDocs.filter(function (d) {
            const matchSpec = specFilter === 'ALL' || d.specialty.toLowerCase().includes(specFilter.toLowerCase());
            const matchHosp = hospFilter === 'ALL' || d.hospital.toLowerCase().includes(hospFilter.toLowerCase());
            const matchQuery = !query ||
                d.name.toLowerCase().includes(query) ||
                d.specialty.toLowerCase().includes(query) ||
                d.hospital.toLowerCase().includes(query);
            return matchSpec && matchHosp && matchQuery;
        });

        konsulDoctorListContainer.innerHTML = '';

        if (filtered.length === 0) {
            konsulDoctorListContainer.innerHTML =
                '<div class="col-span-full bg-white rounded-2xl p-8 text-center border border-slate-200 text-gray-400">' +
                    '<i class="fas fa-user-md text-3xl mb-2 text-teal-600"></i>' +
                    '<p class="text-xs sm:text-sm font-semibold text-gray-600">Dokter Tidak Ditemukan</p>' +
                    '<p class="text-[11px] text-gray-400 mt-1">Ubah filter rumah sakit/spesialis atau tambahkan dokter baru melalui tombol Tambah Dokter.</p>' +
                '</div>';
            return;
        }

        filtered.forEach(function (doc) {
            const card = document.createElement('div');
            card.className = 'bg-white rounded-2xl shadow-sm p-4 border border-slate-200 flex flex-col justify-between hover:border-teal-600 transition-all';
            card.innerHTML =
                '<div>' +
                    '<div class="flex items-start justify-between gap-2 mb-3">' +
                        '<div class="flex items-center space-x-3">' +
                            '<div class="w-11 h-11 rounded-2xl bg-teal-600 text-white flex items-center justify-center text-lg shadow-sm shrink-0">' +
                                '<i class="fas fa-user-md"></i>' +
                            '</div>' +
                            '<div>' +
                                '<h4 class="text-xs sm:text-sm font-bold text-gray-800 leading-snug">' + doc.name + '</h4>' +
                                '<p class="text-[11px] font-semibold text-teal-600 mt-0.5">' + doc.specialty + '</p>' +
                            '</div>' +
                        '</div>' +
                        '<span class="shrink-0 inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-teal-50 text-teal-700 border border-teal-200">' +
                            '<span class="w-1.5 h-1.5 rounded-full bg-teal-600 mr-1"></span>' + doc.status +
                        '</span>' +
                    '</div>' +
                    '<div class="space-y-1.5 text-[11px] text-gray-500 bg-slate-50 rounded-xl p-2.5 border border-slate-200">' +
                        '<div class="flex items-start justify-between gap-2">' +
                            '<span class="shrink-0"><i class="fas fa-hospital text-teal-600 mr-1.5"></i>RS Pekanbaru:</span>' +
                            '<span class="font-semibold text-gray-700 text-right">' + doc.hospital + '</span>' +
                        '</div>' +
                        '<div class="flex items-center justify-between gap-2">' +
                            '<span><i class="far fa-clock text-teal-600 mr-1.5"></i>Jadwal Praktik:</span>' +
                            '<span class="font-medium text-gray-700 text-right">' + doc.hours + '</span>' +
                        '</div>' +
                        '<div class="flex items-center justify-between gap-2">' +
                            '<span><i class="fas fa-id-badge text-teal-600 mr-1.5"></i>Kompetensi:</span>' +
                            '<span class="font-medium text-gray-700 text-right">' + doc.exp + '</span>' +
                        '</div>' +
                    '</div>' +
                '</div>';

            const btnRow = document.createElement('div');
            btnRow.className = 'mt-3 pt-2.5 border-t border-slate-200 flex items-center gap-2';

            const schedBtn = document.createElement('button');
            schedBtn.type = 'button';
            schedBtn.className = 'flex-1 py-2 px-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-200 text-[11px] font-semibold flex items-center justify-center space-x-1 transition-colors';
            schedBtn.innerHTML = '<i class="fas fa-calendar-plus"></i><span>Jadwalkan</span>';
            schedBtn.addEventListener('click', function () {
                switchKonsultasiTab('jadwal');
                const schedForm = document.getElementById('konsulScheduleForm');
                const schedDocInput = document.getElementById('konsulScheduleDoctorSelect');
                if (schedForm) schedForm.classList.remove('hidden');
                if (schedDocInput) {
                    schedDocInput.value = doc.name + ' (' + doc.hospital + ')';
                    schedDocInput.focus();
                }
            });

            const chatBtn = document.createElement('button');
            chatBtn.type = 'button';
            chatBtn.className = 'flex-1 py-2 px-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-[11px] font-semibold shadow-sm flex items-center justify-center space-x-1 transition-colors';
            chatBtn.innerHTML = '<i class="fas fa-comments"></i><span>Mulai Konsultasi</span>';
            chatBtn.addEventListener('click', function () {
                selectedConsultDoctor = doc;
                syncDoctorSelectAndDatalist();
                switchKonsultasiTab('ruang');
                if (typeof pushAppNotification === 'function') {
                    pushAppNotification(
                        'KONSULTASI',
                        'Ruang Konsultasi Dibuka: ' + doc.name,
                        'Sesi konsultasi bersama ' + doc.name + ' (' + doc.hospital + ') siap dimulai.',
                        'chat'
                    );
                }
                if (chatMessageInput) chatMessageInput.focus();
            });

            btnRow.appendChild(schedBtn);
            btnRow.appendChild(chatBtn);

            if (!doc.isDefault) {
                const delBtn = document.createElement('button');
                delBtn.type = 'button';
                delBtn.className = 'p-2 rounded-xl text-red-500 hover:bg-red-50 text-xs transition-colors';
                delBtn.title = 'Hapus Dokter';
                delBtn.innerHTML = '<i class="fas fa-trash"></i>';
                delBtn.addEventListener('click', function () {
                    if (doc.id && window.SehatinXamppApi) {
                        window.SehatinXamppApi.deleteConsultDoctor(doc.id);
                    }
                    customConsultDoctors = customConsultDoctors.filter(function (item) { return item !== doc; });
                    renderKonsulDoctorList();
                });
                btnRow.appendChild(delBtn);
            }

            card.appendChild(btnRow);
            konsulDoctorListContainer.appendChild(card);
        });
    }

    if (searchKonsulDoctorInput) {
        searchKonsulDoctorInput.addEventListener('input', renderKonsulDoctorList);
    }
    if (filterKonsulSpecSelect) {
        filterKonsulSpecSelect.addEventListener('change', renderKonsulDoctorList);
    }
    if (filterKonsulHospitalSelect) {
        filterKonsulHospitalSelect.addEventListener('change', renderKonsulDoctorList);
    }
    if (toggleAddKonsulDoctorBtn && addKonsulDoctorForm) {
        toggleAddKonsulDoctorBtn.addEventListener('click', function () {
            addKonsulDoctorForm.classList.toggle('hidden');
        });
    }
    if (cancelAddKonsulDoctorBtn && addKonsulDoctorForm) {
        cancelAddKonsulDoctorBtn.addEventListener('click', function () {
            addKonsulDoctorForm.classList.add('hidden');
        });
    }
    if (addKonsulDoctorForm) {
        addKonsulDoctorForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const newDoc = {
                name: document.getElementById('newDocNameInput').value.trim(),
                specialty: document.getElementById('newDocSpecInput').value.trim(),
                hospital: document.getElementById('newDocHospInput').value.trim(),
                hours: document.getElementById('newDocHoursInput').value.trim() || 'Senin - Sabtu 09:00 - 16:00 WIB',
                exp: document.getElementById('newDocExpInput').value.trim() || 'Dokter Spesialis Aktif',
                status: document.getElementById('newDocStatusInput').value || 'Aktif Praktik',
                isDefault: false
            };
            customConsultDoctors.unshift(newDoc);
            if (window.SehatinXamppApi) {
                window.SehatinXamppApi.addConsultDoctor({
                    doctor_name: newDoc.name,
                    specialty: newDoc.specialty,
                    hospital: newDoc.hospital,
                    practice_hours: newDoc.hours,
                    experience_years: newDoc.exp,
                    status_online: newDoc.status
                });
            }
            addKonsulDoctorForm.reset();
            addKonsulDoctorForm.classList.add('hidden');
            renderKonsulDoctorList();
            showModal('Dokter Ditambahkan', newDoc.name + ' berhasil ditambahkan ke Daftar Dokter Pekanbaru.');
        });
    }

    // B. Jadwal Konsultasi Logic (Terintegrasi dengan jadwalItems)
    const toggleKonsulScheduleFormBtn = document.getElementById('toggleKonsulScheduleFormBtn');
    const cancelKonsulScheduleBtn = document.getElementById('cancelKonsulScheduleBtn');
    const konsulScheduleForm = document.getElementById('konsulScheduleForm');
    const konsulScheduleListContainer = document.getElementById('konsulScheduleListContainer');
    const emptyKonsulScheduleState = document.getElementById('emptyKonsulScheduleState');

    function renderKonsulScheduleList() {
        if (!konsulScheduleListContainer || !emptyKonsulScheduleState) return;
        konsulScheduleListContainer.querySelectorAll('.konsul-schedule-card').forEach(function (el) { el.remove(); });
        if (badgeKonsulJadwalCount) {
            badgeKonsulJadwalCount.textContent = jadwalItems.length;
        }
        document.getElementById('headerJadwalCount').textContent = jadwalItems.length;

        if (jadwalItems.length === 0) {
            emptyKonsulScheduleState.classList.remove('hidden');
            return;
        }
        emptyKonsulScheduleState.classList.add('hidden');

        jadwalItems.forEach(function (item, idx) {
            const card = document.createElement('div');
            card.className = 'konsul-schedule-card border border-slate-200 rounded-2xl p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-slate-50';
            const methodLabel = item.type || 'Chat Dokter (Ruang Konsultasi)';
            const notesLabel = item.notes ? '<p class="text-[11px] text-gray-600 mt-1"><i class="fas fa-notes-medical text-teal-600 mr-1.5"></i>Keluhan: ' + item.notes + '</p>' : '';

            const infoDiv = document.createElement('div');
            infoDiv.innerHTML =
                '<div class="flex flex-wrap items-center gap-2">' +
                    '<h4 class="text-xs sm:text-sm font-bold text-gray-800">' + item.doctor + '</h4>' +
                    '<span class="text-[10px] font-semibold bg-slate-100 text-slate-700 px-2 py-0.5 rounded-full">' + methodLabel + '</span>' +
                    '<span class="text-[10px] font-semibold bg-teal-50 text-teal-700 border border-teal-200 px-2 py-0.5 rounded-full">Terjadwal</span>' +
                '</div>' +
                '<p class="text-[11px] text-gray-500 mt-1"><i class="far fa-calendar-alt mr-1 text-teal-600"></i>' + item.date + ' • <i class="far fa-clock mr-1 text-teal-600"></i>' + item.time + '</p>' +
                notesLabel;

            const actionDiv = document.createElement('div');
            actionDiv.className = 'flex flex-wrap items-center gap-2 shrink-0';

            const openRoomBtn = document.createElement('button');
            openRoomBtn.type = 'button';
            openRoomBtn.className = 'px-3 py-1.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold flex items-center space-x-1.5 shadow-sm transition-colors';
            openRoomBtn.innerHTML = '<i class="fas fa-comments"></i><span>Masuk Ruang Chat</span>';
            openRoomBtn.addEventListener('click', function () {
                const docNameOnly = item.doctor.split(' (')[0].trim();
                const matchedDoc = getAllConsultDoctors().find(function (d) {
                    return d.name.toLowerCase() === docNameOnly.toLowerCase();
                });
                if (matchedDoc) {
                    selectedConsultDoctor = matchedDoc;
                } else {
                    selectedConsultDoctor = { name: docNameOnly, specialty: 'Dokter Spesialis Pekanbaru', hospital: 'RS Pekanbaru', status: 'Aktif Praktik' };
                }
                syncDoctorSelectAndDatalist();
                switchKonsultasiTab('ruang');
            });

            const finishBtn = document.createElement('button');
            finishBtn.type = 'button';
            finishBtn.className = 'px-3 py-1.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold flex items-center space-x-1.5 shadow-sm transition-colors';
            finishBtn.innerHTML = '<i class="fas fa-check"></i><span>Selesai & Masuk Riwayat</span>';
            finishBtn.addEventListener('click', function () {
                const histEntry = {
                    doctor: item.doctor,
                    specialty: 'Konsultasi Terjadwal',
                    date: item.date,
                    time: item.time,
                    type: methodLabel,
                    complaint: item.notes || 'Konsultasi sesuai jadwal janji temu',
                    diagnosis: 'Sesi konsultasi terjadwal telah diselesaikan bersama dokter.',
                    followup: 'Pantau kondisi kesehatan & ikuti anjuran dokter',
                    transcript: chatMessages.slice()
                };
                consultHistories.unshift(histEntry);
                if (window.SehatinXamppApi) {
                    window.SehatinXamppApi.addConsultHistory({
                        doctor_name: histEntry.doctor,
                        specialty: histEntry.specialty,
                        consult_date: histEntry.date,
                        consult_time: histEntry.time,
                        consult_type: histEntry.type,
                        complaint: histEntry.complaint,
                        diagnosis_notes: histEntry.diagnosis,
                        followup_action: histEntry.followup,
                        chat_transcript: histEntry.transcript
                    });
                    if (item.id) {
                        window.SehatinXamppApi.deleteConsultSchedule(item.id);
                    }
                }
                jadwalItems.splice(idx, 1);
                renderJadwalList();
                renderKonsulScheduleList();
                renderKonsulRiwayatList();
                switchKonsultasiTab('riwayat');
            });

            const cancelBtn = document.createElement('button');
            cancelBtn.type = 'button';
            cancelBtn.className = 'px-2.5 py-1.5 rounded-xl text-red-500 hover:bg-red-50 text-xs font-semibold transition-colors';
            cancelBtn.innerHTML = '<i class="fas fa-times mr-1"></i>Batal';
            cancelBtn.addEventListener('click', function () {
                if (item.id && window.SehatinXamppApi) {
                    window.SehatinXamppApi.deleteConsultSchedule(item.id);
                }
                jadwalItems.splice(idx, 1);
                renderJadwalList();
                renderKonsulScheduleList();
            });

            actionDiv.appendChild(openRoomBtn);
            actionDiv.appendChild(finishBtn);
            actionDiv.appendChild(cancelBtn);

            card.appendChild(infoDiv);
            card.appendChild(actionDiv);
            konsulScheduleListContainer.appendChild(card);
        });
    }

    if (toggleKonsulScheduleFormBtn && konsulScheduleForm) {
        toggleKonsulScheduleFormBtn.addEventListener('click', function () {
            konsulScheduleForm.classList.toggle('hidden');
        });
    }
    if (cancelKonsulScheduleBtn && konsulScheduleForm) {
        cancelKonsulScheduleBtn.addEventListener('click', function () {
            konsulScheduleForm.classList.add('hidden');
        });
    }
    if (konsulScheduleForm) {
        konsulScheduleForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const newSched = {
                doctor: document.getElementById('konsulScheduleDoctorSelect').value.trim(),
                date: document.getElementById('konsulScheduleDateInput').value,
                time: document.getElementById('konsulScheduleTimeInput').value,
                type: document.getElementById('konsulScheduleTypeInput').value,
                notes: document.getElementById('konsulScheduleNotesInput').value.trim()
            };
            jadwalItems.unshift(newSched);
            if (window.SehatinXamppApi) {
                window.SehatinXamppApi.addConsultSchedule({
                    doctor_name: newSched.doctor,
                    schedule_date: newSched.date,
                    schedule_time: newSched.time,
                    consult_type: newSched.type,
                    complaint_notes: newSched.notes
                });
            }
            if (typeof pushAppNotification === 'function') {
                pushAppNotification(
                    'KONSULTASI',
                    'Jadwal Konsultasi Baru Terdaftar',
                    'Sesi konsultasi bersama ' + newSched.doctor + ' dijadwalkan pada ' + newSched.date + ' pukul ' + newSched.time + ' WIB.',
                    'chat'
                );
            }
            konsulScheduleForm.reset();
            konsulScheduleForm.classList.add('hidden');
            renderJadwalList();
            renderKonsulScheduleList();
            showModal('Jadwal Konsultasi Dibuat', 'Jadwal konsultasi bersama ' + newSched.doctor + ' pada ' + newSched.date + ' pukul ' + newSched.time + ' telah disimpan.');
        });
    }

    if (addJadwalForm) {
        addJadwalForm.addEventListener('submit', function () {
            setTimeout(renderKonsulScheduleList, 20);
        });
    }

    // C. Ruang Konsultasi: Simpan Sesi Chat ke Riwayat Konsultasi
    const openSaveChatToHistoryBtn = document.getElementById('openSaveChatToHistoryBtn');
    const cancelSaveChatToHistoryBtn = document.getElementById('cancelSaveChatToHistoryBtn');
    const saveChatToHistoryForm = document.getElementById('saveChatToHistoryForm');

    if (openSaveChatToHistoryBtn && saveChatToHistoryForm) {
        openSaveChatToHistoryBtn.addEventListener('click', function () {
            saveChatToHistoryForm.classList.toggle('hidden');
        });
    }
    if (cancelSaveChatToHistoryBtn && saveChatToHistoryForm) {
        cancelSaveChatToHistoryBtn.addEventListener('click', function () {
            saveChatToHistoryForm.classList.add('hidden');
        });
    }
    if (saveChatToHistoryForm) {
        saveChatToHistoryForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const now = new Date();
            const dateStr = now.toISOString().slice(0, 10);
            const timeStr = String(now.getHours()).padStart(2, '0') + ':' + String(now.getMinutes()).padStart(2, '0');
            const docName = selectedConsultDoctor ? selectedConsultDoctor.name : (customDoctorNameInput.value.trim() || 'Dokter Spesialis Pekanbaru');
            const docSpec = selectedConsultDoctor ? selectedConsultDoctor.specialty : 'Dokter Konsultan';

            const histObj = {
                doctor: docName,
                specialty: docSpec,
                date: dateStr,
                time: timeStr,
                type: 'Ruang Konsultasi (Chat Dokter)',
                complaint: document.getElementById('chatHistComplaintInput').value.trim(),
                diagnosis: document.getElementById('chatHistDiagnosisInput').value.trim(),
                followup: document.getElementById('chatHistActionInput').value.trim() || '-',
                transcript: chatMessages.slice()
            };

            consultHistories.unshift(histObj);
            if (window.SehatinXamppApi) {
                window.SehatinXamppApi.addConsultHistory({
                    doctor_name: histObj.doctor,
                    specialty: histObj.specialty,
                    consult_date: histObj.date,
                    consult_time: histObj.time,
                    consult_type: histObj.type,
                    complaint: histObj.complaint,
                    diagnosis_notes: histObj.diagnosis,
                    followup_action: histObj.followup,
                    chat_transcript: histObj.transcript
                });
            }

            // Setelah sesi selesai dan disimpan ke riwayat, kosongkan kembali ruang konsultasi aktif
            selectedConsultDoctor = null;
            chatMessages = [];
            renderChatMessages();
            syncDoctorSelectAndDatalist();

            saveChatToHistoryForm.reset();
            saveChatToHistoryForm.classList.add('hidden');
            renderKonsulRiwayatList();
            switchKonsultasiTab('riwayat');
            showModal('Tersimpan di Riwayat Konsultasi', 'Sesi konsultasi bersama ' + histObj.doctor + ' berhasil diarsipkan ke Riwayat Konsultasi.');
        });
    }

    // D. Riwayat Konsultasi Logic
    const searchKonsulRiwayatInput = document.getElementById('searchKonsulRiwayatInput');
    const toggleAddKonsulRiwayatBtn = document.getElementById('toggleAddKonsulRiwayatBtn');
    const cancelAddKonsulRiwayatBtn = document.getElementById('cancelAddKonsulRiwayatBtn');
    const addKonsulRiwayatForm = document.getElementById('addKonsulRiwayatForm');
    const konsulRiwayatListContainer = document.getElementById('konsulRiwayatListContainer');
    const emptyKonsulRiwayatState = document.getElementById('emptyKonsulRiwayatState');

    function renderKonsulRiwayatList() {
        if (!konsulRiwayatListContainer || !emptyKonsulRiwayatState) return;
        konsulRiwayatListContainer.querySelectorAll('.konsul-riwayat-card').forEach(function (el) { el.remove(); });
        if (badgeKonsulRiwayatCount) {
            badgeKonsulRiwayatCount.textContent = consultHistories.length;
        }

        const q = (searchKonsulRiwayatInput ? searchKonsulRiwayatInput.value : '').trim().toLowerCase();
        const filtered = consultHistories.filter(function (h) {
            if (!q) return true;
            return (
                (h.doctor && h.doctor.toLowerCase().includes(q)) ||
                (h.complaint && h.complaint.toLowerCase().includes(q)) ||
                (h.diagnosis && h.diagnosis.toLowerCase().includes(q))
            );
        });

        if (filtered.length === 0) {
            emptyKonsulRiwayatState.classList.remove('hidden');
            return;
        }
        emptyKonsulRiwayatState.classList.add('hidden');

        filtered.forEach(function (h) {
            const card = document.createElement('div');
            card.className = 'konsul-riwayat-card border border-slate-200 rounded-2xl p-4 bg-slate-50 space-y-3';

            const topRow = document.createElement('div');
            topRow.className = 'flex flex-wrap items-start justify-between gap-2';
            topRow.innerHTML =
                '<div>' +
                    '<div class="flex flex-wrap items-center gap-2">' +
                        '<h4 class="text-xs sm:text-sm font-bold text-gray-800">' + h.doctor + '</h4>' +
                        '<span class="text-[10px] font-semibold bg-teal-50 text-teal-700 px-2 py-0.5 rounded-full">' + (h.type || 'Chat Dokter') + '</span>' +
                        '<span class="text-[10px] font-semibold bg-teal-50 text-teal-700 border border-teal-200 px-2 py-0.5 rounded-full">Selesai</span>' +
                    '</div>' +
                    '<p class="text-[11px] text-gray-500 mt-0.5"><i class="far fa-calendar-check mr-1 text-teal-600"></i>' + h.date + (h.time && h.time !== '-' ? ' • ' + h.time : '') + '</p>' +
                '</div>';

            const actionsWrap = document.createElement('div');
            actionsWrap.className = 'flex items-center gap-2';

            const reconsultBtn = document.createElement('button');
            reconsultBtn.type = 'button';
            reconsultBtn.className = 'px-3 py-1.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-[11px] font-semibold flex items-center space-x-1 transition-colors';
            reconsultBtn.innerHTML = '<i class="fas fa-redo-alt"></i><span>Konsultasi Lagi</span>';
            reconsultBtn.addEventListener('click', function () {
                const docNameClean = h.doctor.split(' (')[0].trim();
                const found = getAllConsultDoctors().find(function (d) { return d.name.toLowerCase() === docNameClean.toLowerCase(); });
                selectedConsultDoctor = found || { name: docNameClean, specialty: h.specialty || 'Dokter Spesialis Pekanbaru', hospital: 'RS Pekanbaru', status: 'Aktif Praktik' };
                syncDoctorSelectAndDatalist();
                switchKonsultasiTab('ruang');
            });

            const delBtn = document.createElement('button');
            delBtn.type = 'button';
            delBtn.className = 'px-2.5 py-1.5 rounded-xl text-red-500 hover:bg-red-50 text-xs transition-colors';
            delBtn.innerHTML = '<i class="fas fa-trash"></i>';
            delBtn.title = 'Hapus Riwayat';
            delBtn.addEventListener('click', function () {
                if (h.id && window.SehatinXamppApi) {
                    window.SehatinXamppApi.deleteConsultHistory(h.id);
                }
                consultHistories = consultHistories.filter(function (item) { return item !== h; });
                renderKonsulRiwayatList();
            });

            actionsWrap.appendChild(reconsultBtn);
            actionsWrap.appendChild(delBtn);
            topRow.appendChild(actionsWrap);

            const detailGrid = document.createElement('div');
            detailGrid.className = 'grid grid-cols-1 sm:grid-cols-3 gap-2.5 text-xs bg-white rounded-xl p-3 border border-slate-200';
            detailGrid.innerHTML =
                '<div>' +
                    '<span class="text-[10px] font-semibold uppercase text-gray-400 block">Keluhan Pasien</span>' +
                    '<p class="text-gray-700 font-medium mt-0.5">' + (h.complaint || '-') + '</p>' +
                '</div>' +
                '<div>' +
                    '<span class="text-[10px] font-semibold uppercase text-gray-400 block">Diagnosis / Catatan Dokter</span>' +
                    '<p class="text-gray-700 font-medium mt-0.5">' + (h.diagnosis || '-') + '</p>' +
                '</div>' +
                '<div>' +
                    '<span class="text-[10px] font-semibold uppercase text-gray-400 block">Resep / Tindak Lanjut</span>' +
                    '<p class="text-teal-700 font-semibold mt-0.5">' + (h.followup || '-') + '</p>' +
                '</div>';

            card.appendChild(topRow);
            card.appendChild(detailGrid);

            if (Array.isArray(h.transcript) && h.transcript.length > 0) {
                const transBox = document.createElement('div');
                transBox.className = 'bg-slate-50 rounded-xl p-2.5 border border-slate-200 text-[11px] space-y-1';
                let transHtml = '<p class="font-semibold text-gray-600 mb-1"><i class="fas fa-comments text-teal-500 mr-1"></i>Ringkasan Percakapan (' + h.transcript.length + ' Pesan):</p>';
                h.transcript.slice(-4).forEach(function (m) {
                    transHtml += '<div class="text-gray-600"><strong class="text-gray-800">' + m.senderName + ' (' + m.time + '):</strong> ' + m.text + '</div>';
                });
                transBox.innerHTML = transHtml;
                card.appendChild(transBox);
            }

            konsulRiwayatListContainer.appendChild(card);
        });
    }

    if (searchKonsulRiwayatInput) {
        searchKonsulRiwayatInput.addEventListener('input', renderKonsulRiwayatList);
    }
    if (toggleAddKonsulRiwayatBtn && addKonsulRiwayatForm) {
        toggleAddKonsulRiwayatBtn.addEventListener('click', function () {
            addKonsulRiwayatForm.classList.toggle('hidden');
        });
    }
    if (cancelAddKonsulRiwayatBtn && addKonsulRiwayatForm) {
        cancelAddKonsulRiwayatBtn.addEventListener('click', function () {
            addKonsulRiwayatForm.classList.add('hidden');
        });
    }
    if (addKonsulRiwayatForm) {
        addKonsulRiwayatForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const newHist = {
                doctor: document.getElementById('riwayatDocNameInput').value.trim(),
                specialty: 'Dokter Spesialis Pekanbaru',
                date: document.getElementById('riwayatDateInput').value,
                time: '-',
                type: document.getElementById('riwayatTypeInput').value,
                complaint: document.getElementById('riwayatComplaintInput').value.trim(),
                diagnosis: document.getElementById('riwayatDiagnosisInput').value.trim(),
                followup: document.getElementById('riwayatFollowupInput').value.trim() || '-',
                transcript: []
            };
            consultHistories.unshift(newHist);
            if (window.SehatinXamppApi) {
                window.SehatinXamppApi.addConsultHistory({
                    doctor_name: newHist.doctor,
                    specialty: newHist.specialty,
                    consult_date: newHist.date,
                    consult_time: newHist.time,
                    consult_type: newHist.type,
                    complaint: newHist.complaint,
                    diagnosis_notes: newHist.diagnosis,
                    followup_action: newHist.followup,
                    chat_transcript: []
                });
            }
            addKonsulRiwayatForm.reset();
            addKonsulRiwayatForm.classList.add('hidden');
            renderKonsulRiwayatList();
        });
    }

    // Initial render for Consultation Module
    renderKonsulDoctorList();
    renderKonsulScheduleList();
    renderKonsulRiwayatList();
    updateConsultRoomEmptyOrActiveState();


    // =========================================================================
    // 18. FITUR DIAGNOSIS MANDIRI (PILIHAN CEPAT GEJALA RAPI, PENCARIAN PENYAKIT,
    //     AUTO-COMPLETE GEJALA, TRIASE 3 TINGKAT, DISCLAIMER & RED FLAG)
    // =========================================================================
    const diagBodyAreaSelect = document.getElementById('diagBodyAreaSelect');
    const diagAreaPillBtns = document.querySelectorAll('.diag-area-pill-btn');
    const activeBodyAreaFilterBadge = document.getElementById('activeBodyAreaFilterBadge');
    const diagSymptomChips = document.querySelectorAll('.diag-symptom-chip');
    const selectedSymptomCountBadge = document.getElementById('selectedSymptomCountBadge');
    const diagSelectedTagsList = document.getElementById('diagSelectedTagsList');
    const diagSymptomSearchInput = document.getElementById('diagSymptomSearchInput');
    const diagAutoCompleteDropdown = document.getElementById('diagAutoCompleteDropdown');

    const diagDiseaseSearchInput = document.getElementById('diagDiseaseSearchInput');
    const diagDiseaseCategorySelect = document.getElementById('diagDiseaseCategorySelect');
    const diagDiseaseCatalogGrid = document.getElementById('diagDiseaseCatalogGrid');
    const diagDiseaseCountBadge = document.getElementById('diagDiseaseCountBadge');

    const diagPainScaleInput = document.getElementById('diagPainScaleInput');
    const diagPainScaleBadge = document.getElementById('diagPainScaleBadge');
    const diagTriggerFactorInput = document.getElementById('diagTriggerFactorInput');
    const diagDisclaimerCheckbox = document.getElementById('diagDisclaimerCheckbox');

    const diagRedFlagEmergencyBanner = document.getElementById('diagRedFlagEmergencyBanner');
    const diagRedFlagReasonText = document.getElementById('diagRedFlagReasonText');
    const dismissRedFlagBannerBtn = document.getElementById('dismissRedFlagBannerBtn');

    const diagnosisCheckForm = document.getElementById('diagnosisCheckForm');
    const resetSymptomsBtn = document.getElementById('resetSymptomsBtn');
    const diagEmptyResultState = document.getElementById('diagEmptyResultState');
    const diagActiveResultCard = document.getElementById('diagActiveResultCard');
    const diagTriageBannerBox = document.getElementById('diagTriageBannerBox');
    const diagResultUrgencyBadge = document.getElementById('diagResultUrgencyBadge');
    const diagResultTitle = document.getElementById('diagResultTitle');
    const diagResultSummary = document.getElementById('diagResultSummary');
    const diagResultCareAdvice = document.getElementById('diagResultCareAdvice');
    const diagResultOtcRec = document.getElementById('diagResultOtcRec');
    const diagOtcAllergyCheckBadge = document.getElementById('diagOtcAllergyCheckBadge');
    const diagResultSpecRec = document.getElementById('diagResultSpecRec');
    const diagScheduleTelemedicineBtn = document.getElementById('diagScheduleTelemedicineBtn');
    const diagConsultDoctorNowBtn = document.getElementById('diagConsultDoctorNowBtn');
    const diagHistoryCountBadge = document.getElementById('diagHistoryCountBadge');
    const diagHistoryListContainer = document.getElementById('diagHistoryListContainer');
    const emptyDiagHistoryState = document.getElementById('emptyDiagHistoryState');

    // Direktori Pencarian Penyakit Medis
    const masterDiseaseCatalog = [
        {
            code: 'ICD-A90',
            name: 'Demam Berdarah Dengue (DBD)',
            category: 'Infeksi & Tropis',
            urgency: 'Konsultasi Dokter',
            symptoms: ['Demam Tinggi', 'Tubuh Lemas & Menggigil', 'Nyeri Otot & Sendi', 'Sakit Kepala / Pusing'],
            summary: 'Infeksi virus Dengue melalui gigitan nyamuk Aedes aegypti yang ditandai demam tinggi mendadak 2-7 hari, nyeri belakang mata, nyeri otot/sendi, dan penurunan trombosit.',
            advice: 'Minum cairan elektrolit/air putih yang banyak (minimal 2-2.5 liter/hari), kompres hangat, istirahat total, dan segera periksa darah lengkap (trombosit & hematokrit).',
            otc: { name: 'Paracetamol 500mg & Oralit Elektrolit (Hindari Ibuprofen/Aspirin)' },
            specialist: 'Spesialis Penyakit Dalam'
        },
        {
            code: 'ICD-A01',
            name: 'Demam Tifoid (Tifus)',
            category: 'Infeksi & Tropis',
            urgency: 'Konsultasi Dokter',
            symptoms: ['Demam Tinggi', 'Mual & Muntah', 'Diare / Gangguan BAB', 'Tubuh Lemas & Menggigil'],
            summary: 'Infeksi bakteri Salmonella typhi pada saluran pencernaan dengan gejala demam yang meningkat bertahap terutama sore/malam hari, lidah kotor, mual, dan gangguan BAB.',
            advice: 'Konsumsi makanan lunak rendah serat (bubur/tim), cukupi kebutuhan cairan, istirahat tirah baring, dan konsultasikan ke dokter untuk terapi antibiotik yang tepat.',
            otc: { name: 'Paracetamol 500mg & Suplemen Elektrolit' },
            specialist: 'Spesialis Penyakit Dalam'
        },
        {
            code: 'ICD-K21',
            name: 'GERD (Gastroesophageal Reflux Disease)',
            category: 'Pencernaan & Lambung',
            urgency: 'Perawatan Mandiri',
            symptoms: ['Nyeri Ulu Hati / Maag', 'Mual & Muntah', 'Sensasi Panas di Dada (Heartburn / GERD)'],
            summary: 'Naiknya asam lambung ke kerongkongan akibat melemahnya katup esofagus bawah, menyebabkan rasa panas terbakar di dada (heartburn), mulut terasa asam, dan kembung.',
            advice: 'Makan porsi kecil tapi sering, hindari berbaring minimal 2-3 jam setelah makan, kurangi kopi/cokelat/makanan pedas-berlemak, dan tinggikan bantal saat tidur.',
            otc: { name: 'Antasida DOEN Tablet Kunyah / Alginat Penetral Asam Lambung' },
            specialist: 'Spesialis Penyakit Dalam'
        },
        {
            code: 'ICD-K29',
            name: 'Gastritis Akut & Dispepsia (Maag)',
            category: 'Pencernaan & Lambung',
            urgency: 'Perawatan Mandiri',
            symptoms: ['Nyeri Ulu Hati / Maag', 'Mual & Muntah', 'Perut Kembung & Begah'],
            summary: 'Peradangan pada dinding mukosa lambung yang memicu nyeri perih di ulu hati, cepat kenyang, perut begah, dan mual terutama saat terlambat makan.',
            advice: 'Atur jadwal makan teratur setiap 3-4 jam, konsumsi makanan hangat yang lembut, kelola stres, dan hindari obat pereda nyeri golongan NSAID tanpa resep.',
            otc: { name: 'Antasida DOEN Suspensi / Tablet Kunyah (OTC)' },
            specialist: 'Spesialis Penyakit Dalam'
        },
        {
            code: 'ICD-J06',
            name: 'ISPA (Infeksi Saluran Pernapasan Atas) & Influenza',
            category: 'Pernapasan & Paru',
            urgency: 'Perawatan Mandiri',
            symptoms: ['Batuk & Pilek', 'Nyeri Tenggorokan', 'Hidung Tersumbat & Bersin', 'Demam Tinggi'],
            summary: 'Infeksi akut pada hidung, sinus, dan tenggorokan yang umumnya disebabkan oleh virus dengan gejala batuk, pilek, bersin, nyeri menelan, dan demam ringan-sedang.',
            advice: 'Istirahat cukup 7-8 jam, minum air hangat dengan madu/lemon, kumur air garam hangat, gunakan masker, dan jaga sirkulasi udara ruangan.',
            otc: { name: 'Paracetamol 500mg + Tablet Hisap Antiseptik Tenggorokan' },
            specialist: 'Spesialis Paru / Spesialis Penyakit Dalam'
        },
        {
            code: 'ICD-J45',
            name: 'Asma Bronkial',
            category: 'Pernapasan & Paru',
            urgency: 'Konsultasi Dokter',
            symptoms: ['Napas Berbunyi Mengi (Wheezing)', 'Batuk & Pilek', 'Kesulitan Bernapas / Sesak Berat'],
            summary: 'Penyempitan dan peradangan kronis saluran napas yang memicu sesak napas kambuhan, bunyi mengi (wheezing) saat mengembuskan napas, dan batuk malam/dini hari.',
            advice: 'Duduk tegak dan tenang, gunakan inhaler pereda cepat sesuai anjuran dokter, serta jauhi pemicu seperti debu, bulu hewan, udara dingin, dan asap rokok.',
            otc: { name: 'Konsultasi Dokter untuk Inhaler Bronkodilator (Bukan Obat Bebas)' },
            specialist: 'Spesialis Paru & Pernapasan (Sp.P)'
        },
        {
            code: 'ICD-I10',
            name: 'Hipertensi (Tekanan Darah Tinggi)',
            category: 'Jantung & Pembuluh Darah',
            urgency: 'Konsultasi Dokter',
            symptoms: ['Sakit Kepala / Pusing', 'Jantung Berdebar Kencang (Palpitasi)'],
            summary: 'Peningkatan tekanan darah arteri secara kronis (>= 140/90 mmHg) yang sering kali tanpa gejala namun dapat menimbulkan sakit kepala tengkuk, pusing, dan risiko kardiovaskular.',
            advice: 'Batasi konsumsi garam (natrium < 1 sendok teh/hari), rutin cek tensi darah, olahraga aerobik ringan 30 menit/hari, kelola stres, dan minum obat antihipertensi teratur.',
            otc: { name: 'Suplemen Omega-3 & Konsultasi Resep Antihipertensi Dokter' },
            specialist: 'Spesialis Jantung & Pembuluh Darah (Sp.JP) / Spesialis Penyakit Dalam'
        },
        {
            code: 'ICD-I20',
            name: 'Sindrom Koroner Akut / Angina Pektoris (Penyakit Jantung)',
            category: 'Jantung & Pembuluh Darah',
            urgency: 'Gawat Darurat (UGD)',
            symptoms: ['Nyeri Dada Hebat Menjalar', 'Kesulitan Bernapas / Sesak Berat', 'Keringat Dingin Malam Hari'],
            summary: 'Berkurangnya aliran darah ke otot jantung secara mendadak yang menimbulkan nyeri dada seperti tertindih beban berat menjalar ke lengan kiri, rahang, atau punggung disertai keringat dingin.',
            advice: 'Hentikan seluruh aktivitas seketika, duduk istirahat setengah tegak, longgarkan pakaian, dan SEGERA hubungi 119 atau menuju IGD Rumah Sakit terdekat.',
            otc: { name: 'Kondisi Gawat Darurat — Segera ke IGD RS Terdekat' },
            specialist: 'Spesialis Jantung & Pembuluh Darah (Sp.JP)'
        },
        {
            code: 'ICD-E11',
            name: 'Diabetes Melitus Tipe 2',
            category: 'Metabolik & Endokrin',
            urgency: 'Konsultasi Dokter',
            symptoms: ['Tubuh Lemas & Menggigil', 'Keringat Dingin Malam Hari'],
            summary: 'Gangguan metabolik kronis yang ditandai kadar gula darah tinggi akibat resistensi insulin, sering disertai gejala mudah haus (polidipsia), sering BAK malam, dan mudah lelah.',
            advice: 'Batasi gula tambahan dan karbohidrat sederhana, pilih karbohidrat kompleks berserat tinggi, pantau gula darah puasa/2 jam PP, dan olahraga rutin.',
            otc: { name: 'Strip Cek Gula Darah & Multivitamin Neurotropik B1-B6-B12' },
            specialist: 'Spesialis Penyakit Dalam (Sp.PD)'
        },
        {
            code: 'ICD-E78',
            name: 'Hiperkolesterolemia (Kolesterol Tinggi)',
            category: 'Metabolik & Endokrin',
            urgency: 'Konsultasi Dokter',
            symptoms: ['Sakit Kepala / Pusing', 'Nyeri Otot & Sendi'],
            summary: 'Tingginya kadar kolesterol total dan LDL di dalam darah yang meningkatkan risiko plak pembuluh darah (aterosklerosis), penyakit jantung koroner, dan stroke.',
            advice: 'Kurangi gorengan, lemak jenuh, dan santan kental; tingkatkan konsumsi serat larut (oat, sayur, buah) dan ikan laut; serta cek profil lipid berkala.',
            otc: { name: 'Suplemen Minyak Ikan Omega-3 (Fish Oil 1000mg)' },
            specialist: 'Spesialis Penyakit Dalam / Spesialis Jantung'
        },
        {
            code: 'ICD-M10',
            name: 'Gout Arthritis (Penyakit Asam Urat)',
            category: 'Otot & Sendi',
            urgency: 'Konsultasi Dokter',
            symptoms: ['Sendi Lutut Kaku & Bengkak', 'Nyeri Otot & Sendi'],
            summary: 'Peradangan sendi akut akibat penumpukan kristal asam urat (monosodium urat) terutama pada pangkal ibu jari kaki, pergelangan kaki, atau lutut yang memicu bengkak, merah, dan nyeri.',
            advice: 'Kompres dingin pada sendi yang bengkak selama 15 menit, istirahatkan sendi, minum air putih >2 liter/hari, dan hindari jeroan, daging merah berlebih, serta melinjo/emping.',
            otc: { name: 'Paracetamol 500mg Pereda Nyeri Sendi & Kompres Dingin' },
            specialist: 'Spesialis Penyakit Dalam (Sp.PD)'
        },
        {
            code: 'ICD-G43',
            name: 'Migrain & Sakit Kepala Primer (Tension Headache)',
            category: 'Saraf & Kepala',
            urgency: 'Perawatan Mandiri',
            symptoms: ['Sakit Kepala / Pusing', 'Sakit Kepala Sebelah (Migrain)', 'Mual & Muntah'],
            summary: 'Sakit kepala berdenyut pada satu sisi kepala (migrain) atau rasa mengikat di kepala-tengkuk (tension headache) yang dapat dipicu kelelahan, kurang tidur, layar gadget, atau stres.',
            advice: 'Beristirahat di kamar yang tenang dan redup, kompres dingin di dahi atau hangat di tengkuk, hindari menatap layar terlalu lama, dan cukupi hidrasi.',
            otc: { name: 'Paracetamol 500mg Analgesik Sakit Kepala (OTC)' },
            specialist: 'Spesialis Saraf (Sp.N / Sp.S)'
        },
        {
            code: 'ICD-H81',
            name: 'Vertigo Perifer (BPPV)',
            category: 'Saraf & Kepala',
            urgency: 'Konsultasi Dokter',
            symptoms: ['Vertigo / Pusing Berputar', 'Mual & Muntah', 'Keringat Dingin Malam Hari'],
            summary: 'Sensasi pusing berputar hebat seolah lingkungan sekitar bergerak akibat gangguan keseimbangan di telinga bagian dalam (vestibular), sering disertai mual dan keringat dingin.',
            advice: 'Segera duduk atau berbaring diam saat serangan muncul, hindari gerakan kepala mendadak, fokuskan pandangan pada satu titik diam, dan konsultasikan ke dokter saraf/THT.',
            otc: { name: 'Obat Antivertigo / Antimual Sesuai Anjuran Dokter' },
            specialist: 'Spesialis Saraf (Sp.N / Sp.S)'
        },
        {
            code: 'ICD-L20',
            name: 'Dermatitis Kontak & Alergi Kulit (Urtikaria / Biduran)',
            category: 'Kulit & Alergi',
            urgency: 'Perawatan Mandiri',
            symptoms: ['Ruam Kulit & Gatal', 'Biduran / Bentol Alergi (Urtikaria)'],
            summary: 'Reaksi peradangan atau hipersensitivitas pada kulit berupa ruam kemerahan, bentol-bentol gatal (biduran), atau kulit kering mengelupas setelah terpapar alergen/iritan.',
            advice: 'Jangan menggaruk ruam agar tidak infeksi sekunder, kompres sejuk pada kulit yang gatal, gunakan pelembap lembut bebas pewangi, dan kenali pemicu alergi.',
            otc: { name: 'Lotion Calamine Penyejuk Kulit & Cetirizine 10mg Antihistamin' },
            specialist: 'Spesialis Kulit & Kelamin (Sp.DVE)'
        },
        {
            code: 'ICD-M54',
            name: 'Nyeri Pinggang Bawah (Low Back Pain / HNP)',
            category: 'Otot & Sendi',
            urgency: 'Perawatan Mandiri',
            symptoms: ['Nyeri Pinggang Bawah (Low Back Pain)', 'Nyeri Otot & Sendi'],
            summary: 'Ketegangan otot/ligamen tulang belakang bawah atau iritasi saraf pinggang akibat posisi duduk lama yang kurang ergonomis maupun mengangkat beban berat.',
            advice: 'Perbaiki postur duduk ergonomis, lakukan peregangan punggung ringan, kompres hangat pada pinggang 15-20 menit, dan hindari membungkuk mendadak.',
            otc: { name: 'Krim Analgesik Otot Topikal & Paracetamol 500mg' },
            specialist: 'Spesialis Saraf (Sp.N / Sp.S)'
        }
    ];

    const masterSymptomCatalog = [
        { name: 'Demam Tinggi', area: 'UMUM', redFlag: false },
        { name: 'Tubuh Lemas & Menggigil', area: 'UMUM', redFlag: false },
        { name: 'Keringat Dingin Malam Hari', area: 'UMUM', redFlag: false },
        { name: 'Penurunan Kesadaran / Pingsan Mendadak', area: 'KEPALA', redFlag: true },
        { name: 'Kelemahan Wajah / Lengan Sepihak (Gejala Stroke)', area: 'KEPALA', redFlag: true },
        { name: 'Sakit Kepala / Pusing', area: 'KEPALA', redFlag: false },
        { name: 'Sakit Kepala Sebelah (Migrain)', area: 'KEPALA', redFlag: false },
        { name: 'Vertigo / Pusing Berputar', area: 'KEPALA', redFlag: false },
        { name: 'Nyeri Tenggorokan', area: 'KEPALA', redFlag: false },
        { name: 'Mata Merah & Berair', area: 'KEPALA', redFlag: false },
        { name: 'Telinga Berdenging / Nyeri Telinga', area: 'KEPALA', redFlag: false },
        { name: 'Batuk & Pilek', area: 'PERNAPASAN', redFlag: false },
        { name: 'Batuk Berdahak Lebih dari 2 Minggu', area: 'PERNAPASAN', redFlag: false },
        { name: 'Hidung Tersumbat & Bersin', area: 'PERNAPASAN', redFlag: false },
        { name: 'Kesulitan Bernapas / Sesak Berat', area: 'PERNAPASAN', redFlag: true },
        { name: 'Napas Berbunyi Mengi (Wheezing)', area: 'PERNAPASAN', redFlag: false },
        { name: 'Nyeri Dada Hebat Menjalar', area: 'JANTUNG', redFlag: true },
        { name: 'Jantung Berdebar Kencang (Palpitasi)', area: 'JANTUNG', redFlag: false },
        { name: 'Mual & Muntah', area: 'PENCERNAAN', redFlag: false },
        { name: 'Nyeri Ulu Hati / Maag', area: 'PENCERNAAN', redFlag: false },
        { name: 'Sensasi Panas di Dada (Heartburn / GERD)', area: 'PENCERNAAN', redFlag: false },
        { name: 'Diare / Gangguan BAB', area: 'PENCERNAAN', redFlag: false },
        { name: 'Perut Kembung & Begah', area: 'PENCERNAAN', redFlag: false },
        { name: 'Muntah Darah / BAB Berwarna Hitam', area: 'PENCERNAAN', redFlag: true },
        { name: 'Ruam Kulit & Gatal', area: 'KULIT', redFlag: false },
        { name: 'Biduran / Bentol Alergi (Urtikaria)', area: 'KULIT', redFlag: false },
        { name: 'Kulit Kering & Mengelupas', area: 'KULIT', redFlag: false },
        { name: 'Nyeri Otot & Sendi', area: 'OTOT', redFlag: false },
        { name: 'Nyeri Pinggang Bawah (Low Back Pain)', area: 'OTOT', redFlag: false },
        { name: 'Sendi Lutut Kaku & Bengkak', area: 'OTOT', redFlag: false },
        { name: 'Kram Otot Betis / Bahu Kaku', area: 'OTOT', redFlag: false }
    ];

    let selectedSymptoms = [];
    let diagnosisHistoryItems = [];
    let lastRecommendedSpec = 'Spesialis Penyakit Dalam';
    let lastRecommendedOtc = { name: 'Paracetamol 500mg (1 Strip)' };

    function renderDiseaseCatalog() {
        if (!diagDiseaseCatalogGrid) return;
        const q = (diagDiseaseSearchInput ? diagDiseaseSearchInput.value : '').trim().toLowerCase();
        const cat = diagDiseaseCategorySelect ? diagDiseaseCategorySelect.value : 'ALL';

        const filtered = masterDiseaseCatalog.filter(function (dis) {
            const matchCat = cat === 'ALL' || dis.category === cat;
            const matchQ = !q ||
                dis.name.toLowerCase().includes(q) ||
                dis.code.toLowerCase().includes(q) ||
                dis.category.toLowerCase().includes(q) ||
                dis.summary.toLowerCase().includes(q) ||
                dis.symptoms.join(' ').toLowerCase().includes(q);
            return matchCat && matchQ;
        });

        if (diagDiseaseCountBadge) {
            diagDiseaseCountBadge.textContent = filtered.length + ' Penyakit Ditemukan';
        }

        diagDiseaseCatalogGrid.innerHTML = '';
        if (filtered.length === 0) {
            diagDiseaseCatalogGrid.innerHTML =
                '<div class="col-span-full py-6 text-center text-slate-400 text-xs">' +
                    'Penyakit dengan kata kunci tersebut tidak ditemukan. Silakan gunakan pencarian gejala di bawah untuk analisis triase.' +
                '</div>';
            return;
        }

        filtered.forEach(function (dis) {
            const isEmergency = dis.urgency === 'Gawat Darurat (UGD)';
            const card = document.createElement('div');
            card.className = 'p-3.5 rounded-xl border border-slate-200 bg-slate-50/70 flex flex-col justify-between text-xs space-y-2 hover:border-teal-600 transition-all';
            card.innerHTML =
                '<div>' +
                    '<div class="flex items-center justify-between gap-1.5">' +
                        '<span class="text-[10px] font-mono font-bold text-teal-700 bg-teal-50 px-2 py-0.5 rounded border border-teal-200">' + dis.code + '</span>' +
                        '<span class="text-[10px] font-semibold px-2 py-0.5 rounded-full ' +
                            (isEmergency ? 'bg-red-100 text-red-700' : 'bg-white text-slate-600 border border-slate-200') + '">' +
                            dis.urgency +
                        '</span>' +
                    '</div>' +
                    '<h4 class="font-bold text-slate-800 mt-1.5 leading-snug">' + dis.name + '</h4>' +
                    '<p class="text-[11px] text-slate-600 mt-1 leading-relaxed">' + dis.summary + '</p>' +
                    '<p class="text-[10px] text-teal-700 font-semibold mt-1.5"><i class="fas fa-notes-medical mr-1"></i>Gejala Khas: ' + dis.symptoms.join(', ') + '</p>' +
                '</div>';

            const btnRow = document.createElement('div');
            btnRow.className = 'pt-2 border-t border-slate-200 flex items-center justify-between gap-2';

            const selectDisBtn = document.createElement('button');
            selectDisBtn.type = 'button';
            selectDisBtn.className = 'w-full py-1.5 px-2.5 rounded-lg bg-teal-600 hover:bg-teal-700 text-white text-[11px] font-semibold transition-colors';
            selectDisBtn.innerHTML = '<i class="fas fa-stethoscope mr-1"></i>Lihat Panduan & Analisis Penyakit';
            selectDisBtn.addEventListener('click', function () {
                selectedSymptoms = dis.symptoms.slice();
                updateSymptomSelectionUI();
                displayDiseaseOrTriageResult({
                    triageLevel: dis.urgency,
                    title: dis.name + ' (' + dis.code + ')',
                    summary: dis.summary,
                    advice: dis.advice,
                    otcMed: dis.otc,
                    specialist: dis.specialist,
                    symptomsText: dis.symptoms.join(', '),
                    painScale: isEmergency ? 8 : 4,
                    duration: '2 - 3 Hari'
                });
                if (diagActiveResultCard) {
                    diagActiveResultCard.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }
            });

            btnRow.appendChild(selectDisBtn);
            card.appendChild(btnRow);
            diagDiseaseCatalogGrid.appendChild(card);
        });
    }

    if (diagDiseaseSearchInput) {
        diagDiseaseSearchInput.addEventListener('input', renderDiseaseCatalog);
    }
    if (diagDiseaseCategorySelect) {
        diagDiseaseCategorySelect.addEventListener('change', renderDiseaseCatalog);
    }

    if (diagPainScaleInput && diagPainScaleBadge) {
        diagPainScaleInput.addEventListener('input', function () {
            const val = parseInt(diagPainScaleInput.value, 10) || 1;
            let desc = 'Nyeri Ringan';
            if (val >= 7) desc = 'Nyeri Berat / Hebat';
            else if (val >= 4) desc = 'Nyeri Sedang';
            diagPainScaleBadge.textContent = val + ' / 10 (' + desc + ')';
        });
    }

    function checkAndTriggerRedFlagBanner() {
        const hasRedFlagSym = selectedSymptoms.some(function (s) {
            const sl = s.toLowerCase();
            return sl.includes('nyeri dada hebat') || sl.includes('sesak berat') || sl.includes('kesulitan bernapas') || sl.includes('pingsan') || sl.includes('stroke') || sl.includes('muntah darah');
        });

        if (hasRedFlagSym && diagRedFlagEmergencyBanner) {
            diagRedFlagEmergencyBanner.classList.remove('hidden');
            if (diagRedFlagReasonText) {
                diagRedFlagReasonText.textContent = 'Terdeteksi tanda bahaya medis (Red Flag): ' + selectedSymptoms.join(', ') + '. Segera hubungi 119 atau kunjungi Unit Gawat Darurat (UGD) terdekat!';
            }
            return true;
        }
        return false;
    }

    if (dismissRedFlagBannerBtn && diagRedFlagEmergencyBanner) {
        dismissRedFlagBannerBtn.addEventListener('click', function () {
            diagRedFlagEmergencyBanner.classList.add('hidden');
        });
    }

    function updateSymptomSelectionUI() {
        diagSymptomChips.forEach(function (chip) {
            const sym = chip.getAttribute('data-symptom');
            const isRedFlag = chip.getAttribute('data-redflag') === 'true';
            const isSelected = selectedSymptoms.indexOf(sym) !== -1;
            if (isSelected) {
                chip.className = isRedFlag
                    ? 'diag-symptom-chip px-3 py-2.5 rounded-xl border-2 border-red-600 bg-red-50 text-red-800 font-semibold text-left flex items-center justify-between gap-2 transition-all shadow-sm'
                    : 'diag-symptom-chip px-3 py-2.5 rounded-xl border-2 border-teal-600 bg-teal-50 text-teal-800 font-semibold text-left flex items-center justify-between gap-2 transition-all shadow-sm';
            } else {
                chip.className = isRedFlag
                    ? 'diag-symptom-chip px-3 py-2.5 rounded-xl border border-red-200 bg-white text-red-700 hover:border-red-500 text-left flex items-center justify-between gap-2 transition-all'
                    : 'diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all';
            }
        });

        if (selectedSymptomCountBadge) {
            selectedSymptomCountBadge.textContent = selectedSymptoms.length + ' Gejala Dipilih';
        }

        if (diagSelectedTagsList) {
            if (selectedSymptoms.length === 0) {
                diagSelectedTagsList.innerHTML = '<span class="text-[11px] text-slate-400 italic">Belum ada gejala dipilih. Pilih gejala pada tombol di atas atau ketik di kolom pencarian.</span>';
            } else {
                diagSelectedTagsList.innerHTML = '';
                selectedSymptoms.forEach(function (sym) {
                    const tag = document.createElement('span');
                    tag.className = 'inline-flex items-center space-x-1.5 bg-teal-600 text-white text-[11px] font-medium px-2.5 py-1 rounded-lg';
                    tag.innerHTML = '<span>' + sym + '</span><button type="button" class="hover:text-slate-200 focus:outline-none"><i class="fas fa-times text-[10px]"></i></button>';
                    tag.querySelector('button').addEventListener('click', function () {
                        selectedSymptoms = selectedSymptoms.filter(function (item) { return item !== sym; });
                        updateSymptomSelectionUI();
                    });
                    diagSelectedTagsList.appendChild(tag);
                });
            }
        }

        checkAndTriggerRedFlagBanner();
    }

    function addOrToggleSymptom(symName, forceAdd) {
        const idx = selectedSymptoms.indexOf(symName);
        if (idx === -1) {
            selectedSymptoms.push(symName);
        } else if (!forceAdd) {
            selectedSymptoms.splice(idx, 1);
        }
        updateSymptomSelectionUI();
    }

    diagSymptomChips.forEach(function (chip) {
        chip.addEventListener('click', function () {
            addOrToggleSymptom(chip.getAttribute('data-symptom'), false);
        });
    });

    function filterByBodyArea(areaCode, labelText) {
        if (diagBodyAreaSelect) diagBodyAreaSelect.value = areaCode;
        if (activeBodyAreaFilterBadge) {
            activeBodyAreaFilterBadge.textContent = labelText || (areaCode === 'ALL' ? 'Semua Area Tubuh' : areaCode);
        }

        diagAreaPillBtns.forEach(function (btn) {
            const active = btn.getAttribute('data-area-pill') === areaCode;
            btn.className = active
                ? 'diag-area-pill-btn px-2.5 py-1.5 rounded-lg text-[11px] font-semibold bg-teal-600 text-white transition-colors'
                : 'diag-area-pill-btn px-2.5 py-1.5 rounded-lg text-[11px] font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors';
        });

        diagSymptomChips.forEach(function (chip) {
            const chipArea = chip.getAttribute('data-area');
            if (areaCode === 'ALL' || chipArea === areaCode) {
                chip.classList.remove('hidden');
            } else {
                chip.classList.add('hidden');
            }
        });
    }

    diagAreaPillBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const code = btn.getAttribute('data-area-pill') || 'ALL';
            filterByBodyArea(code, btn.textContent.trim());
        });
    });

    if (diagBodyAreaSelect) {
        diagBodyAreaSelect.addEventListener('change', function () {
            filterByBodyArea(diagBodyAreaSelect.value, diagBodyAreaSelect.options[diagBodyAreaSelect.selectedIndex].text);
        });
    }

    // Auto-Complete Symptom Input
    if (diagSymptomSearchInput && diagAutoCompleteDropdown) {
        diagSymptomSearchInput.addEventListener('input', function () {
            const q = diagSymptomSearchInput.value.trim().toLowerCase();
            if (!q) {
                diagAutoCompleteDropdown.classList.add('hidden');
                return;
            }
            const matches = masterSymptomCatalog.filter(function (item) {
                return item.name.toLowerCase().includes(q);
            });
            diagAutoCompleteDropdown.innerHTML = '';
            if (matches.length === 0) {
                const customBtn = document.createElement('button');
                customBtn.type = 'button';
                customBtn.className = 'w-full text-left px-3 py-2 hover:bg-teal-50 text-teal-700 font-semibold';
                customBtn.textContent = '+ Tambahkan gejala: "' + diagSymptomSearchInput.value.trim() + '"';
                customBtn.addEventListener('click', function () {
                    addOrToggleSymptom(diagSymptomSearchInput.value.trim(), true);
                    diagSymptomSearchInput.value = '';
                    diagAutoCompleteDropdown.classList.add('hidden');
                });
                diagAutoCompleteDropdown.appendChild(customBtn);
            } else {
                matches.forEach(function (m) {
                    const row = document.createElement('button');
                    row.type = 'button';
                    row.className = 'w-full text-left px-3 py-2 hover:bg-slate-50 flex items-center justify-between';
                    row.innerHTML =
                        '<span class="font-medium text-slate-800">' + m.name + '</span>' +
                        '<span class="text-[10px] px-2 py-0.5 rounded ' + (m.redFlag ? 'bg-red-100 text-red-700 font-bold' : 'bg-slate-100 text-slate-600') + '">' +
                            (m.redFlag ? 'Red Flag / Darurat' : m.area) +
                        '</span>';
                    row.addEventListener('click', function () {
                        addOrToggleSymptom(m.name, true);
                        diagSymptomSearchInput.value = '';
                        diagAutoCompleteDropdown.classList.add('hidden');
                    });
                    diagAutoCompleteDropdown.appendChild(row);
                });
            }
            diagAutoCompleteDropdown.classList.remove('hidden');
        });
    }

    if (resetSymptomsBtn) {
        resetSymptomsBtn.addEventListener('click', function () {
            selectedSymptoms = [];
            updateSymptomSelectionUI();
            filterByBodyArea('ALL', 'Semua Area Tubuh');
            if (diagnosisCheckForm) diagnosisCheckForm.reset();
            if (diagPainScaleBadge) diagPainScaleBadge.textContent = '3 / 10 (Nyeri Ringan)';
            if (diagActiveResultCard) diagActiveResultCard.classList.add('hidden');
            if (diagEmptyResultState) diagEmptyResultState.classList.remove('hidden');
            if (diagRedFlagEmergencyBanner) diagRedFlagEmergencyBanner.classList.add('hidden');
        });
    }

    function renderDiagnosisHistory() {
        if (!diagHistoryListContainer || !emptyDiagHistoryState) return;
        diagHistoryListContainer.querySelectorAll('.diag-hist-item').forEach(function (el) { el.remove(); });
        if (diagHistoryCountBadge) {
            diagHistoryCountBadge.textContent = diagnosisHistoryItems.length + ' Riwayat';
        }
        if (diagnosisHistoryItems.length === 0) {
            emptyDiagHistoryState.classList.remove('hidden');
            return;
        }
        emptyDiagHistoryState.classList.add('hidden');

        diagnosisHistoryItems.forEach(function (item, idx) {
            const row = document.createElement('div');
            row.className = 'diag-hist-item p-3 rounded-xl border border-slate-200 bg-slate-50 text-xs space-y-1';
            row.innerHTML =
                '<div class="flex items-center justify-between gap-2">' +
                    '<span class="font-bold text-slate-800">' + item.title + '</span>' +
                    '<span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-teal-50 text-teal-700 border border-teal-200 shrink-0">' + item.triageLevel + '</span>' +
                '</div>' +
                '<p class="text-[11px] text-slate-600">Gejala: ' + item.symptoms + ' • Nyeri: ' + item.painScale + '/10</p>' +
                '<div class="flex items-center justify-between pt-1">' +
                    '<span class="text-[10px] font-semibold text-teal-700">Rujukan: ' + item.specialist + ' (' + item.time + ')</span>' +
                '</div>';
            const delBtn = document.createElement('button');
            delBtn.type = 'button';
            delBtn.className = 'text-[10px] text-red-500 hover:underline';
            delBtn.textContent = 'Hapus';
            delBtn.addEventListener('click', function () {
                diagnosisHistoryItems.splice(idx, 1);
                renderDiagnosisHistory();
            });
            row.querySelector('.flex.items-center.justify-between.pt-1').appendChild(delBtn);
            diagHistoryListContainer.appendChild(row);
        });
    }

    function displayDiseaseOrTriageResult(payload) {
        const userAllergy = (vitalAllergy && vitalAllergy.textContent) ? vitalAllergy.textContent.trim() : 'Tidak Ada';
        const otcCopy = {
            name: payload.otcMed ? payload.otcMed.name : 'Paracetamol 500mg (OTC)'
        };

        if (userAllergy && userAllergy.toLowerCase() !== 'tidak ada' && userAllergy !== '-') {
            diagOtcAllergyCheckBadge.textContent = 'Perhatian Alergi: ' + userAllergy;
            diagOtcAllergyCheckBadge.className = 'text-[10px] text-red-600 font-bold';
            otcCopy.name += ' (Hindari pemicu alergi Anda: ' + userAllergy + ')';
        } else {
            diagOtcAllergyCheckBadge.textContent = 'Aman Sesuai Profil';
            diagOtcAllergyCheckBadge.className = 'text-[10px] text-teal-700 font-semibold';
        }

        lastRecommendedSpec = payload.specialist;
        lastRecommendedOtc = otcCopy;

        diagResultUrgencyBadge.textContent = payload.triageLevel;
        if (payload.triageLevel === 'Gawat Darurat (UGD)') {
            diagResultUrgencyBadge.className = 'text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-red-600 text-white';
            if (diagTriageBannerBox) diagTriageBannerBox.className = 'p-3.5 rounded-xl bg-red-50 border border-red-200 space-y-1.5';
        } else if (payload.triageLevel === 'Konsultasi Dokter') {
            diagResultUrgencyBadge.className = 'text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-slate-800 text-white';
            if (diagTriageBannerBox) diagTriageBannerBox.className = 'p-3.5 rounded-xl bg-slate-50 border border-slate-300 space-y-1.5';
        } else {
            diagResultUrgencyBadge.className = 'text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-teal-600 text-white';
            if (diagTriageBannerBox) diagTriageBannerBox.className = 'p-3.5 rounded-xl bg-teal-50/60 border border-teal-200 space-y-1.5';
        }

        diagResultTitle.textContent = payload.title;
        diagResultSummary.textContent = payload.summary;
        diagResultCareAdvice.textContent = payload.advice;
        diagResultOtcRec.textContent = otcCopy.name;
        diagResultSpecRec.textContent = payload.specialist;

        diagEmptyResultState.classList.add('hidden');
        diagActiveResultCard.classList.remove('hidden');

        const now = new Date();
        const timeStr = now.toISOString().slice(0, 10) + ' ' + String(now.getHours()).padStart(2, '0') + ':' + String(now.getMinutes()).padStart(2, '0');
        diagnosisHistoryItems.unshift({
            title: payload.title,
            triageLevel: payload.triageLevel,
            symptoms: payload.symptomsText,
            painScale: payload.painScale,
            duration: payload.duration,
            specialist: payload.specialist,
            time: timeStr
        });
        renderDiagnosisHistory();
    }

    if (diagnosisCheckForm) {
        diagnosisCheckForm.addEventListener('submit', function (e) {
            e.preventDefault();

            if (diagDisclaimerCheckbox && !diagDisclaimerCheckbox.checked) {
                showModal('Persetujuan Disclaimer Medis Wajib', 'Harap centang persetujuan Peringatan Medis (Disclaimer) terlebih dahulu bahwa hasil skrining ini bukan pengganti diagnosis dokter profesional.');
                return;
            }

            const extraNotes = (document.getElementById('diagAdditionalNotes').value || '').trim();
            const duration = document.getElementById('diagDurationInput').value;
            const severity = document.getElementById('diagSeverityInput').value;
            const tempVal = parseFloat(document.getElementById('diagTempInput').value) || 0;
            const painScale = parseInt(diagPainScaleInput ? diagPainScaleInput.value : '3', 10) || 3;
            const triggerFactor = diagTriggerFactorInput ? diagTriggerFactorInput.value : '-';

            if (selectedSymptoms.length === 0 && !extraNotes) {
                showModal('Pilih Gejala Terlebih Dahulu', 'Silakan memilih minimal satu gejala pada area tubuh atau gunakan Pencarian Penyakit di atas.');
                return;
            }

            const symText = selectedSymptoms.concat(extraNotes ? [extraNotes] : []).join(', ');
            const symLower = symText.toLowerCase();

            const isRedFlag = checkAndTriggerRedFlagBanner() ||
                symLower.includes('nyeri dada') ||
                symLower.includes('sesak') ||
                symLower.includes('pingsan') ||
                symLower.includes('stroke') ||
                symLower.includes('muntah darah') ||
                painScale >= 8 ||
                tempVal >= 39.5;

            let triageLevel = 'Perawatan Mandiri';
            if (isRedFlag) {
                triageLevel = 'Gawat Darurat (UGD)';
            } else if (
                severity === 'Sedang' ||
                severity === 'Berat' ||
                painScale >= 5 ||
                duration === '4 - 7 Hari' ||
                duration === 'Lebih dari 1 Minggu' ||
                tempVal >= 38.0
            ) {
                triageLevel = 'Konsultasi Dokter';
            }

            let title = 'Kemungkinan Kelelahan Fisik / Observasi Gejala Ringan';
            let summary = 'Berdasarkan keluhan (' + symText + ') selama ' + duration + ' dengan skala nyeri ' + painScale + '/10 dan pemicu "' + triggerFactor + '", kondisi ini belum menunjukkan tanda darurat namun tetap perlu dipantau.';
            let advice = 'Istirahat cukup 7-8 jam, penuhi hidrasi air putih minimal 2 liter/hari, hindari faktor pemicu (' + triggerFactor.toLowerCase() + '), dan pantau suhu tubuh berkala.';
            let otcMed = { name: 'Multivitamin & Paracetamol 500mg (Bila Demam/Nyeri)' };
            let specialist = 'Spesialis Penyakit Dalam';

            if (isRedFlag) {
                title = 'Kemungkinan Kondisi Medis Akut / Kritis (Prioritas Evaluasi IGD)';
                summary = 'Gejala yang Anda pilih menunjukkan indikator Red Flag yang membutuhkan pemeriksaan fisik dan observasi klinis segera di fasilitas kesehatan.';
                advice = 'Hentikan seluruh aktivitas fisik, posisikan tubuh senyaman mungkin (duduk setengah tegak bila sesak), jangan mengonsumsi obat sembarangan, dan segera hubungi 119 / menuju UGD terdekat.';
                otcMed = { name: 'Tidak Disarankan Obat Bebas — Segera ke UGD / Konsultasi Dokter' };
                specialist = 'Spesialis Jantung & Pembuluh Darah (Sp.JP)';
            } else if (symLower.includes('batuk') || symLower.includes('tenggorokan') || symLower.includes('pilek') || symLower.includes('hidung') || symLower.includes('mengi')) {
                title = 'Kemungkinan Infeksi Saluran Pernapasan Atas (ISPA / Faringitis)';
                summary = 'Keluhan saluran napas (' + symText + ') dengan pemicu "' + triggerFactor + '" mengarah pada iritasi mukosa tenggorokan atau infeksi saluran napas atas.';
                advice = 'Minum air hangat, kumur air garam hangat 2-3 kali sehari, gunakan masker, istirahat cukup, dan kurangi makanan berminyak.';
                otcMed = { name: 'Paracetamol 500mg + Tablet Hisap Antiseptik Tenggorokan (OTC)' };
                specialist = 'Spesialis Paru & Pernapasan (Sp.P) / Spesialis Penyakit Dalam';
            } else if (symLower.includes('ulu hati') || symLower.includes('maag') || symLower.includes('mual') || symLower.includes('diare') || symLower.includes('kembung') || symLower.includes('gerd')) {
                title = 'Kemungkinan Dispepsia / Gastritis / GERD';
                summary = 'Keluhan pencernaan (' + symText + ') yang dipicu oleh "' + triggerFactor + '" berkaitan dengan peningkatan asam lambung atau sensitivitas saluran cerna.';
                advice = 'Makan porsi kecil tapi sering (tiap 3-4 jam), hindari makanan pedas/asam/berlemak/kafein, jangan langsung berbaring 2 jam setelah makan, dan cegah dehidrasi.';
                otcMed = { name: 'Antasida DOEN Tablet Kunyah & Oralit Elektrolit (OTC)' };
                specialist = 'Spesialis Penyakit Dalam (Sp.PD)';
            } else if (symLower.includes('ruam') || symLower.includes('gatal') || symLower.includes('kulit') || symLower.includes('biduran')) {
                title = 'Kemungkinan Dermatitis Kontak / Reaksi Alergi Kulit (Urtikaria)';
                summary = 'Keluhan pada kulit (' + symText + ') menandakan respons alergi atau iritasi epidermis terhadap faktor pemicu.';
                advice = 'Hindari menggaruk area ruam, kompres dingin selama 10-15 menit, gunakan sabun lembut tanpa parfum, dan hindari alergen pemicu.';
                otcMed = { name: 'Lotion Calamine Penyejuk Kulit & Cetirizine 10mg (OTC)' };
                specialist = 'Spesialis Kulit & Kelamin (Sp.DVE)';
            } else if (symLower.includes('sakit kepala') || symLower.includes('pusing') || symLower.includes('migrain') || symLower.includes('vertigo')) {
                title = 'Kemungkinan Cephalgia / Migrain / Vertigo';
                summary = 'Keluhan sakit kepala atau pusing dengan skala nyeri ' + painScale + '/10 selama ' + duration + ' sering dipicu ketegangan otot leher, gangguan keseimbangan, atau kurang tidur.';
                advice = 'Istirahatkan mata di ruangan redup, kompres hangat pada tengkuk leher, cukupi air putih, dan tidur teratur.';
                otcMed = { name: 'Paracetamol 500mg Analgesik Ringan (OTC)' };
                specialist = 'Spesialis Saraf (Sp.N / Sp.S)';
            } else if (symLower.includes('otot') || symLower.includes('sendi') || symLower.includes('pinggang') || symLower.includes('lutut') || symLower.includes('kram')) {
                title = 'Kemungkinan Myalgia / Artritis / Ketegangan Otot & Sendi';
                summary = 'Keluhan nyeri muskuloskeletal (' + symText + ') dengan skala nyeri ' + painScale + '/10 umumnya berkaitan dengan beban fisik, postur tubuh, atau asam urat.';
                advice = 'Istirahatkan bagian otot/sendi yang nyeri, kompres hangat 15 menit, dan lakukan peregangan ringan secara bertahap.';
                otcMed = { name: 'Krim Analgesik Topikal & Paracetamol 500mg (OTC)' };
                specialist = 'Spesialis Penyakit Dalam / Spesialis Saraf';
            }

            displayDiseaseOrTriageResult({
                triageLevel: triageLevel,
                title: title,
                summary: summary,
                advice: advice,
                otcMed: otcMed,
                specialist: specialist,
                symptomsText: symText,
                painScale: painScale,
                duration: duration
            });
        });
    }

    if (diagScheduleTelemedicineBtn) {
        diagScheduleTelemedicineBtn.addEventListener('click', function () {
            switchDashboardSubView('chat');
            switchKonsultasiTab('jadwal');
            const schedForm = document.getElementById('konsulScheduleForm');
            const schedDocInput = document.getElementById('konsulScheduleDoctorSelect');
            const schedNotesInput = document.getElementById('konsulScheduleNotesInput');
            if (schedForm) schedForm.classList.remove('hidden');
            const matchedDoc = getAllConsultDoctors().find(function (d) {
                return lastRecommendedSpec.toLowerCase().includes(d.specialty.split(' ')[1].toLowerCase());
            }) || getAllConsultDoctors()[0];
            if (schedDocInput && matchedDoc) {
                schedDocInput.value = matchedDoc.name + ' (' + matchedDoc.hospital + ')';
            }
            if (schedNotesInput && selectedSymptoms.length > 0) {
                schedNotesInput.value = 'Tindak lanjut skrining gejala: ' + selectedSymptoms.join(', ');
            }
        });
    }

    if (diagConsultDoctorNowBtn) {
        diagConsultDoctorNowBtn.addEventListener('click', function () {
            switchDashboardSubView('chat');
            switchKonsultasiTab('daftar');
            if (filterKonsulSpecSelect) {
                if (lastRecommendedSpec.includes('Jantung')) filterKonsulSpecSelect.value = 'Spesialis Jantung';
                else if (lastRecommendedSpec.includes('Kulit')) filterKonsulSpecSelect.value = 'Spesialis Kulit';
                else if (lastRecommendedSpec.includes('Saraf')) filterKonsulSpecSelect.value = 'Spesialis Saraf';
                else if (lastRecommendedSpec.includes('Paru')) filterKonsulSpecSelect.value = 'Spesialis Paru';
                else if (lastRecommendedSpec.includes('Anak')) filterKonsulSpecSelect.value = 'Spesialis Anak';
                else if (lastRecommendedSpec.includes('Penyakit Dalam')) filterKonsulSpecSelect.value = 'Spesialis Penyakit Dalam';
                else filterKonsulSpecSelect.value = 'ALL';
                renderKonsulDoctorList();
            }
        });
    }

    renderDiseaseCatalog();


    // =========================================================================
    // 19. FITUR EDUKASI: PUSTAKA ARTIKEL KESEHATAN POPULER ZAMAN SEKARANG
    //     (Tanpa Menampilkan Jumlah Total Seluruh Artikel pada Tulisan Edukasi)
    // =========================================================================
    const searchEdukasiArticleInput = document.getElementById('searchEdukasiArticleInput');
    const filterEdukasiCategorySelect = document.getElementById('filterEdukasiCategorySelect');
    const edukasiTopicPills = document.querySelectorAll('.edukasi-topic-pill');
    const edukasiShowingStatus = document.getElementById('edukasiShowingStatus');
    const edukasiPrevPageBtn = document.getElementById('edukasiPrevPageBtn');
    const edukasiNextPageBtn = document.getElementById('edukasiNextPageBtn');
    const edukasiPageSelect = document.getElementById('edukasiPageSelect');
    const edukasiArticlesGrid = document.getElementById('edukasiArticlesGrid');
    const edukasiReaderPanel = document.getElementById('edukasiReaderPanel');
    const closeEdukasiReaderBtn = document.getElementById('closeEdukasiReaderBtn');
    const readerArticleNumberBadge = document.getElementById('readerArticleNumberBadge');
    const readerArticleCategoryBadge = document.getElementById('readerArticleCategoryBadge');
    const readerArticleTitle = document.getElementById('readerArticleTitle');
    const readerArticleMeta = document.getElementById('readerArticleMeta');
    const readerArticleBody = document.getElementById('readerArticleBody');
    const readerOpenGoogleLink = document.getElementById('readerOpenGoogleLink');

    const edukasiCategoriesSpec = [
        {
            category: 'Tren Kesehatan & Gaya Hidup Modern',
            icon: 'fa-fire',
            topics: [
                'Panduan Medis Intermittent Fasting (Diet Puasa 16:8) untuk Metabolisme & Autofagi',
                'Mengenali Burnout Kerja & Hustle Culture pada Usia Produktif serta Cara Mengatasinya',
                'Bahaya Ultra-Processed Food (UPF) & Minuman Manis Kekinian terhadap Risiko Diabetes Muda',
                'Revenge Bedtime Procrastination: Mengapa Kita Suka Begadang Main HP & Dampaknya pada Otak',
                'Kesehatan Usus (Gut Microbiome) & Hubungannya dengan Imunitas serta Mood (Gut-Brain Axis)',
                'Tren Olahraga Lari Pagi, Padel, & Zone 2 Cardio untuk Kesehatan Jantung Jangka Panjang',
                'Bahaya Tersembunyi Vape (Rokok Elektrik) dan Polusi Udara PM2.5 bagi Paru-paru Muda',
                'Mengenal Resistensi Insulin, Prediabetes, dan Sindrom Metabolik di Usia 20-an dan 30-an',
                'Duduk Terlalu Lama Saat WFH (Sedentary Lifestyle): Cara Mencegah Nyeri Leher Text-Neck & Saraf Kejepit',
                'Pentingnya Latihan Beban (Strength Training) Sejak Muda untuk Mencegah Sarkopenia & Osteoporosis',
                'Lonjakan Kasus Gagal Ginjal & Cuci Darah di Usia Muda: Kebiasaan Harian yang Wajib Dihindari',
                'Manfaat Cold Plunge, Sauna, dan Pemulihan Aktif setelah Olahraga Intensitas Tinggi',
                'Mengenal Cortisol Face & Dampak Stres Kronis terhadap Hormon dan Berat Badan',
                'Cara Detoks Dopamin & Mengurangi Brain Rot Akibat Paparan Layar Media Sosial Berlebih',
                'Tren Makanan Real Food & Clean Eating dengan Bahan Pangan Lokal Indonesia'
            ]
        },
        {
            category: 'Penyakit Dalam & Metabolik',
            icon: 'fa-stethoscope',
            topics: [
                'Pengendalian Gula Darah pada Diabetes Melitus Tipe 2',
                'Pencegahan Komplikasi Hipertensi Kronis',
                'Manajemen Kolesterol Tinggi dan Trigliserida',
                'Penanganan Asam Urat (Gout Arthritis) Secara Medis',
                'Mengatasi GERD dan Tukak Lambung Kronis',
                'Deteksi Dini Gangguan Fungsi Ginjal',
                'Keseimbangan Hormon Tiroid (Hipotiroid & Hipertiroid)',
                'Pencegahan Perlemakan Hati Non-Alkoholik (Fatty Liver)',
                'Penanganan Anemia Defisiensi Besi pada Dewasa',
                'Penguatan Sistem Imun pada Penyakit Autoimun'
            ]
        },
        {
            category: 'Kesehatan Jantung & Pembuluh Darah',
            icon: 'fa-heartbeat',
            topics: [
                'Mengenali Gejala Awal Penyakit Jantung Koroner di Usia Muda',
                'Deteksi dan Penanganan Aritmia (Gangguan Irama Jantung)',
                'Cara Menjaga Elastisitas Pembuluh Darah Arteri',
                'Pencegahan Serangan Stroke Iskemik & Hemoragik',
                'Panduan Tekanan Darah Ideal Sesuai Kelompok Usia',
                'Pencegahan Henti Jantung Mendadak Saat Olahraga Berat',
                'Mengenal Gagal Jantung Kongestif dan Penanganannya',
                'Peran Elektrokardiogram (EKG) & Treadmill Test dalam Skrining Jantung',
                'Pencegahan Trombosis Vena Dalam (DVT) Saat Perjalanan Jauh',
                'Pola Makan Kardioprotektif Rendah Natrium (Diet DASH)'
            ]
        },
        {
            category: 'Nutrisi, Gizi & Diet Sehat',
            icon: 'fa-apple-alt',
            topics: [
                'Cara Menghitung Defisit Kalori & Angka Kecukupan Gizi (RDI) Harian',
                'Manfaat Protein Berkualitas Tinggi untuk Menjaga Massa Otot Saat Diet',
                'Peran Serat Pangan & Prebiotik dalam Menjaga Mikrobiota Usus',
                'Kebutuhan Harian Vitamin D3, K2, dan Magnesium bagi Tubuh Modern',
                'Panduan Diet Rendah Indeks Glikemik untuk Stabilitas Energi',
                'Pentingnya Hidrasi Air Putih bagi Metabolisme Tubuh',
                'Mengenali Gula Tersembunyi (Hidden Sugar) pada Saus, Roti, dan Minuman Kemasan',
                'Pengaturan Komposisi Makronutrisi (Karbohidrat, Protein, Lemak Sehat)',
                'Sumber Asam Lemak Omega-3 untuk Fungsi Otak & Jantung',
                'Cara Membaca Label Informasi Nilai Gizi pada Kemasan Makanan'
            ]
        },
        {
            category: 'Kesehatan Mental & Kualitas Tidur',
            icon: 'fa-brain',
            topics: [
                'Teknik Manajemen Stres dengan Pernapasan Diafragma 4-7-8',
                'Mengatasi Insomnia Digital melalui Penerapan Sleep Hygiene',
                'Mengenali Gejala Burnout Akademik maupun Pekerjaan',
                'Cara Mengelola Gangguan Kecemasan (Anxiety) & Overthinking Sehari-hari',
                'Hubungan Kualitas Tidur Deep Sleep dengan Imunitas Tubuh',
                'Praktik Mindfulness untuk Menjaga Fokus dan Ketenangan',
                'Pentingnya Batasan Sehat (Work-Life Boundaries) bagi Kesehatan Mental',
                'Detoksifikasi Digital 1 Jam Sebelum Tidur untuk Optimasi Hormon Melatonin',
                'Mengenali Tanda Awal Depresi dan Kapan Harus ke Profesional',
                'Fisiologi Ritme Sirkadian dan Paparan Sinar Matahari Pagi'
            ]
        },
        {
            category: 'Olahraga, Kebugaran & Fisik',
            icon: 'fa-running',
            topics: [
                'Manfaat Jalan Kaki Cepat 7.000 - 10.000 Langkah Setiap Hari',
                'Pentingnya Pemanasan Dinamis dan Pendinginan Statis',
                'Latihan Ketahanan Otot (Strength Training) bagi Pemula',
                'Cara Menjaga Postur Tubuh Ergonomis Saat Bekerja di Depan Laptop',
                'Penanganan Pertama Cedera Olahraga (Metode PEACE & LOVE)',
                'Olahraga Low-Impact yang Aman untuk Kesehatan Sendi Lutut',
                'Pencegahan Kram Otot dan Dehidrasi Elektrolit Saat Lari Jarak Jauh',
                'Zona Denyut Jantung (Zone 2 Heart Rate) untuk Pembakaran Lemak Optimal',
                'Latihan Core & Peregangan Punggung Bawah untuk Cegah HNP',
                'Waktu Terbaik Berolahraga untuk Kebugaran Kardiovaskular'
            ]
        },
        {
            category: 'Kesehatan Kulit & Dermatologi',
            icon: 'fa-spa',
            topics: [
                'Pentingnya Reapply Sunscreen SPF 30+ PA++++ di Cuaca UV Index Tinggi',
                'Penanganan Medis Jerawat Dewasa (Adult Acne) Sesuai Jenis Kulit',
                'Cara Memperbaiki dan Menjaga Kesehatan Skin Barrier dengan Ceramide',
                'Manajemen Dermatitis Atopik (Eksim) agar Tidak Kambuh',
                'Panduan Aman Menggunakan Retinol, Niacinamide, dan Eksfoliasi AHA/BHA',
                'Perawatan Kulit Kering dan Sensitif di Ruangan Ber-AC',
                'Deteksi Dini Perubahan Tahi Lalat (Metode ABCDE Melanoma)',
                'Pengaruh Konsumsi Gula Berlebih (Glikasi) terhadap Penuaan Kulit Dini',
                'Cara Mengatasi Hiperpigmentasi (PIE & PIH) secara Dermatologis',
                'Kebersihan Kulit Kepala dan Pencegahan Dermatitis Seboroik'
            ]
        },
        {
            category: 'Kesehatan Ibu, Bayi & Anak',
            icon: 'fa-baby',
            topics: [
                'Nutrisi Esensial Ibu Hamil & Pencegahan Anemia Kehamilan',
                'Manfaat ASI Eksklusif 6 Bulan bagi Kekebalan Bayi',
                'Panduan Tekstur dan Menu MPASI Kaya Protein Hewani Cegah Stunting',
                'Jadwal Imunisasi Dasar Lengkap Anak Sesuai Rekomendasi IDAI',
                'Dampak Screen Time Gadget Berlebih terhadap Speech Delay pada Balita',
                'Stimulasi Perkembangan Motorik dan Sensorik Anak',
                'Penanganan Pertama Demam dan Kejang Demam pada Anak di Rumah',
                'Mengenali Baby Blues & Postpartum Depression pada Ibu Baru',
                'Pencegahan Dehidrasi saat Diare Rotavirus pada Anak',
                'Mengelola PCOS (Polycystic Ovary Syndrome) untuk Kesehatan Reproduksi Wanita'
            ]
        },
        {
            category: 'Pencegahan Infeksi & Imunisasi',
            icon: 'fa-shield-virus',
            topics: [
                'Langkah Pencegahan Demam Berdarah Dengue (DBD) & Vaksinasi Dengue',
                'Etika Batuk dan Cuci Tangan 6 Langkah Standar WHO',
                'Pentingnya Vaksinasi Influenza & HPV bagi Remaja dan Dewasa',
                'Pencegahan Penularan Tuberkulosis (TBC) di Lingkungan Kerja & Rumah',
                'Cara Menjaga Sanitasi Air dan Keamanan Pangan Keluarga',
                'Protokol Penanganan Luka Terbuka agar Terhindar dari Infeksi Tetanus',
                'Mengenal Peran Vaksinasi Dewasa (Pneumonia, Hepatitis B, Herpes Zoster)',
                'Pencegahan Infeksi Saluran Kemih (ISK) akibat Kebiasaan Menahan BAK',
                'Perlindungan Kesehatan Saat Pergantian Musim (Pancaroba)',
                'Pentingnya Medical Check-Up (MCU) Tahunan Sejak Usia 25 Tahun'
            ]
        },
        {
            category: 'Obat, Suplemen & Farmasi',
            icon: 'fa-pills',
            topics: [
                'Panduan DAGUSIBU (Dapatkan, Gunakan, Simpan, Buang Obat dengan Benar)',
                'Bahaya Resistensi Antibiotik (AMR) Akibat Minum Antibiotik Tanpa Resep',
                'Memahami Perbedaan Obat Bebas, Bebas Terbatas, dan Obat Keras',
                'Waspada Interaksi Obat dengan Kopi, Susu, dan Suplemen Herbal',
                'Aturan Minum Obat Sebelum vs Sesudah Makan yang Tepat',
                'Panduan Penggunaan Obat Penurun Panas (Paracetamol) Sesuai Berat Badan',
                'Cara Menyimpan Obat Sirup, Insulin, dan Tablet yang Benar',
                'Memilih Suplemen Magnesium, Zinc, dan Vitamin C Sesuai Kebutuhan Tubuh',
                'Mengenali Efek Samping Obat dan Tanda Alergi Obat',
                'Panduan Penggunaan Tetes Mata Artificial Tears bagi Pekerja Layar Digital'
            ]
        },
        {
            category: 'Kesehatan Mata, Gigi & Lansia',
            icon: 'fa-eye',
            topics: [
                'Aturan 20-20-20 untuk Mencegah Computer Vision Syndrome & Mata Lelah',
                'Teknik Menyikat Gigi, Dental Flossing & Scaling Karang Gigi Rutin',
                'Pencegahan Osteoporosis dan Pengeroposan Tulang Sejak Dini',
                'Deteksi Dini Katarak dan Glaukoma pada Usia Lanjut',
                'Menjaga Fungsi Kognitif dan Pencegahan Demensia / Alzheimer',
                'Bahaya Impaksi Gigi Bungsu & Kapan Harus Konsultasi Dokter Gigi',
                'Penanganan Mata Kering (Dry Eye Syndrome) Akibat Layar Gadget',
                'Panduan Nutrisi Tinggi Protein Mudah Cerna untuk Lansia',
                'Pencegahan Risiko Jatuh di Rumah bagi Anggota Keluarga Lansia',
                'Bahaya Penggunaan Earphone Volume Tinggi terhadap Gangguan Pendengaran Dini'
            ]
        }
    ];

    const anglePerspectives = [
        'Panduan Medis & Gejala Awal',
        'Langkah Pencegahan Harian di Rumah',
        'Rekomendasi Dokter & Standar Klinis',
        'Faktor Risiko Zaman Sekarang yang Perlu Diwaspadai',
        'Pola Hidup & Nutrisi Pendukung',
        'Kapan Harus Memeriksakan Diri ke Dokter',
        'Mitos vs Fakta Medis Terkini',
        'Perawatan Mandiri & Pertolongan Pertama',
        'Tips Pemulihan & Pemantauan Berkala',
        'Rangkuman Studi & Referensi Kesehatan Modern'
    ];

    const allPopularHealthArticles = [];
    (function buildPopularArticlesCatalog() {
        let counter = 1;
        edukasiCategoriesSpec.forEach(function (catObj) {
            catObj.topics.forEach(function (topicTitle) {
                anglePerspectives.forEach(function (angle) {
                    const fullTitle = topicTitle + ' — ' + angle;
                    const googleQuery = encodeURIComponent(topicTitle + ' ' + angle + ' artikel kesehatan medis indonesia');
                    allPopularHealthArticles.push({
                        id: counter,
                        category: catObj.category,
                        icon: catObj.icon,
                        title: fullTitle,
                        topic: topicTitle,
                        angle: angle,
                        readMinutes: 3 + (counter % 5),
                        source: counter % 2 === 0 ? 'Referensi Google Kesehatan & Kemenkes RI' : 'Jurnal Edukasi Medis & Kesehatan Modern',
                        googleUrl: 'https://www.google.com/search?q=' + googleQuery,
                        summary: 'Kupas tuntas mengenai ' + topicTitle.toLowerCase() + ' dengan fokus pada ' + angle.toLowerCase() + ' yang relevan dengan gaya hidup masyarakat masa kini.'
                    });
                    counter++;
                });
            });
        });
    })();

    let edukasiCurrentPage = 1;
    const edukasiPageSize = 20;
    let filteredEdukasiArticles = allPopularHealthArticles.slice();

    function openArticleInReader(article) {
        if (!edukasiReaderPanel) return;
        readerArticleNumberBadge.textContent = 'Topik Kesehatan Populer';
        readerArticleCategoryBadge.textContent = article.category;
        readerArticleTitle.textContent = article.title;
        readerArticleMeta.textContent = article.source + ' • Estimasi ' + article.readMinutes + ' Menit Baca';
        readerOpenGoogleLink.href = article.googleUrl;

        readerArticleBody.innerHTML =
            '<p><strong>Ringkasan Eksekutif:</strong> ' + article.summary + '</p>' +
            '<p><strong>1. Mengapa Topik Ini Penting di Era Sekarang (' + article.topic + '):</strong> Perubahan pola makan modern, tingginya paparan layar digital, serta tekanan aktivitas harian membuat pemahaman mengenai <em>' + article.angle.toLowerCase() + '</em> sangat krusial untuk mencegah gangguan kesehatan kronis sejak usia produktif.</p>' +
            '<p><strong>2. Panduan Praktis Berbasis Medis:</strong> Utamakan konsumsi makanan utuh (<em>real food</em>) dengan gizi seimbang yang tercatat pada Tabel Komposisi Pangan Indonesia (TKPI) Kemenkes, cukupi kebutuhan air putih minimal 8 gelas/hari, tidur berkualitas 7-8 jam setiap malam, dan lakukan olahraga teratur minimal 150 menit per minggu.</p>' +
            '<p><strong>3. Tindak Lanjut Klinis:</strong> Jika Anda merasakan gejala yang menetap, gunakan fitur <strong>Diagnosis Mandiri & Pencarian Penyakit</strong> atau jadwalkan sesi konsultasi bersama dokter spesialis aktif Pekanbaru di menu <strong>Konsultasi</strong>.</p>';

        edukasiReaderPanel.classList.remove('hidden');
        edukasiReaderPanel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    if (closeEdukasiReaderBtn && edukasiReaderPanel) {
        closeEdukasiReaderBtn.addEventListener('click', function () {
            edukasiReaderPanel.classList.add('hidden');
        });
    }

    function renderEdukasiArticles() {
        if (!edukasiArticlesGrid) return;
        const query = (searchEdukasiArticleInput ? searchEdukasiArticleInput.value : '').trim().toLowerCase();
        const catFilter = filterEdukasiCategorySelect ? filterEdukasiCategorySelect.value : 'ALL';

        const googleDirectLink = document.getElementById('openGoogleHealthPortalLink');
        if (googleDirectLink) {
            const qForGoogle = query ? ('artikel kesehatan populer ' + query) : 'artikel kesehatan populer kemenkes who indonesia';
            googleDirectLink.href = 'https://www.google.com/search?q=' + encodeURIComponent(qForGoogle);
        }

        filteredEdukasiArticles = allPopularHealthArticles.filter(function (art) {
            const matchCat = catFilter === 'ALL' || art.category === catFilter;
            const matchQuery = !query ||
                art.title.toLowerCase().includes(query) ||
                art.category.toLowerCase().includes(query) ||
                art.summary.toLowerCase().includes(query);
            return matchCat && matchQuery;
        });

        const totalFiltered = filteredEdukasiArticles.length;
        const totalPages = Math.max(1, Math.ceil(totalFiltered / edukasiPageSize));
        if (edukasiCurrentPage > totalPages) edukasiCurrentPage = totalPages;
        if (edukasiCurrentPage < 1) edukasiCurrentPage = 1;

        if (edukasiPageSelect) {
            edukasiPageSelect.innerHTML = '';
            for (let p = 1; p <= totalPages; p++) {
                const opt = document.createElement('option');
                opt.value = String(p);
                opt.textContent = 'Halaman ' + p;
                edukasiPageSelect.appendChild(opt);
            }
            edukasiPageSelect.value = String(edukasiCurrentPage);
        }

        const startIdx = (edukasiCurrentPage - 1) * edukasiPageSize;
        const endIdx = Math.min(startIdx + edukasiPageSize, totalFiltered);
        const pageItems = filteredEdukasiArticles.slice(startIdx, endIdx);

        if (edukasiShowingStatus) {
            if (totalFiltered === 0) {
                edukasiShowingStatus.innerHTML = 'Tidak ditemukan artikel untuk kata kunci tersebut';
            } else {
                edukasiShowingStatus.innerHTML = 'Menampilkan kumpulan artikel kesehatan populer & terkini • <strong>Halaman ' + edukasiCurrentPage + '</strong>';
            }
        }

        edukasiArticlesGrid.innerHTML = '';

        if (pageItems.length === 0) {
            edukasiArticlesGrid.innerHTML =
                '<div class="col-span-full bg-white rounded-2xl p-8 text-center border border-slate-200 text-gray-400">' +
                    '<i class="fas fa-book-medical text-3xl text-teal-600 mb-2"></i>' +
                    '<p class="text-xs sm:text-sm font-semibold text-gray-600">Artikel Tidak Ditemukan di Katalog Lokal</p>' +
                    '<p class="text-[11px] text-gray-400 mt-1">Klik tombol <strong>Cari di Google Kesehatan</strong> di kanan atas untuk mencari topik tersebut langsung di Google.</p>' +
                '</div>';
            return;
        }

        pageItems.forEach(function (art) {
            const card = document.createElement('div');
            card.className = 'bg-white rounded-2xl shadow-sm p-4 border border-slate-200 flex flex-col justify-between hover:border-teal-600 transition-all';
            card.innerHTML =
                '<div>' +
                    '<div class="flex items-center justify-between gap-2 mb-2">' +
                        '<span class="inline-flex items-center space-x-1.5 text-[10px] font-semibold bg-teal-50 text-teal-700 px-2.5 py-0.5 rounded-full border border-teal-200">' +
                            '<i class="fas ' + art.icon + '"></i>' +
                            '<span>' + art.category + '</span>' +
                        '</span>' +
                        '<span class="text-[10px] font-semibold text-teal-700 bg-slate-100 px-2 py-0.5 rounded-full">Populer</span>' +
                    '</div>' +
                    '<h4 class="text-xs sm:text-sm font-bold text-gray-800 leading-snug">' + art.title + '</h4>' +
                    '<p class="text-[11px] text-gray-500 mt-1.5 leading-relaxed">' + art.summary + '</p>' +
                '</div>';

            const footer = document.createElement('div');
            footer.className = 'mt-3 pt-2.5 border-t border-slate-200 flex items-center justify-between gap-2';

            const metaSpan = document.createElement('span');
            metaSpan.className = 'text-[10px] text-gray-400';
            metaSpan.innerHTML = '<i class="far fa-clock mr-1"></i>' + art.readMinutes + ' mnt baca • ' + art.angle;

            const actions = document.createElement('div');
            actions.className = 'flex items-center space-x-1.5 shrink-0';

            const readBtn = document.createElement('button');
            readBtn.type = 'button';
            readBtn.className = 'px-2.5 py-1.5 rounded-xl bg-teal-50 hover:bg-teal-100 text-teal-700 text-[11px] font-semibold transition-colors';
            readBtn.innerHTML = '<i class="fas fa-book-open mr-1"></i>Baca';
            readBtn.addEventListener('click', function () {
                openArticleInReader(art);
            });

            const googleLink = document.createElement('a');
            googleLink.href = art.googleUrl;
            googleLink.target = '_blank';
            googleLink.rel = 'noopener noreferrer';
            googleLink.className = 'px-2.5 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-[11px] font-semibold flex items-center space-x-1 transition-colors';
            googleLink.innerHTML = '<i class="fab fa-google"></i><span>Google</span>';

            actions.appendChild(readBtn);
            actions.appendChild(googleLink);
            footer.appendChild(metaSpan);
            footer.appendChild(actions);
            card.appendChild(footer);
            edukasiArticlesGrid.appendChild(card);
        });
    }

    edukasiTopicPills.forEach(function (pill) {
        pill.addEventListener('click', function () {
            const topic = pill.getAttribute('data-edukasi-topic') || '';
            if (searchEdukasiArticleInput) searchEdukasiArticleInput.value = topic;
            edukasiTopicPills.forEach(function (p) {
                const active = p === pill;
                p.className = active
                    ? 'edukasi-topic-pill px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-teal-600 text-white transition-colors'
                    : 'edukasi-topic-pill px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors';
            });
            edukasiCurrentPage = 1;
            renderEdukasiArticles();
        });
    });

    if (searchEdukasiArticleInput) {
        searchEdukasiArticleInput.addEventListener('input', function () {
            edukasiCurrentPage = 1;
            renderEdukasiArticles();
        });
    }
    if (filterEdukasiCategorySelect) {
        filterEdukasiCategorySelect.addEventListener('change', function () {
            edukasiCurrentPage = 1;
            renderEdukasiArticles();
        });
    }
    if (edukasiPrevPageBtn) {
        edukasiPrevPageBtn.addEventListener('click', function () {
            if (edukasiCurrentPage > 1) {
                edukasiCurrentPage--;
                renderEdukasiArticles();
            }
        });
    }
    if (edukasiNextPageBtn) {
        edukasiNextPageBtn.addEventListener('click', function () {
            const maxPage = Math.max(1, Math.ceil(filteredEdukasiArticles.length / edukasiPageSize));
            if (edukasiCurrentPage < maxPage) {
                edukasiCurrentPage++;
                renderEdukasiArticles();
            }
        });
    }
    if (edukasiPageSelect) {
        edukasiPageSelect.addEventListener('change', function () {
            edukasiCurrentPage = parseInt(edukasiPageSelect.value, 10) || 1;
            renderEdukasiArticles();
        });
    }

    renderEdukasiArticles();


    // =========================================================================
    // 20. FITUR HEALTHY — NUTRISI HARIAN (TKPI KEMENKES RI), ASUPAN MINUM &
    //     KALKULATOR KEBUTUHAN KALORI HARIAN (DESAIN SIMPEL)
    // =========================================================================
    const healthyDailyTargetInput = document.getElementById('healthyDailyTargetInput');
    const healthyIntakeCalories = document.getElementById('healthyIntakeCalories');
    const healthyTargetCaloriesLabel = document.getElementById('healthyTargetCaloriesLabel');
    const healthyRemainingCalories = document.getElementById('healthyRemainingCalories');
    const healthyCaloriePercentText = document.getElementById('healthyCaloriePercentText');
    const healthyCalorieProgressBar = document.getElementById('healthyCalorieProgressBar');

    const healthyTotalCarbs = document.getElementById('healthyTotalCarbs');
    const healthyTotalProtein = document.getElementById('healthyTotalProtein');
    const healthyTotalFat = document.getElementById('healthyTotalFat');
    const healthyTotalFiber = document.getElementById('healthyTotalFiber');
    const healthyTargetCarbs = document.getElementById('healthyTargetCarbs');
    const healthyTargetProtein = document.getElementById('healthyTargetProtein');
    const healthyTargetFat = document.getElementById('healthyTargetFat');

    const healthyWaterGlasses = document.getElementById('healthyWaterGlasses');
    const healthyWaterMl = document.getElementById('healthyWaterMl');
    const healthyWaterProgressBar = document.getElementById('healthyWaterProgressBar');
    const addHealthyWaterBtn = document.getElementById('addHealthyWaterBtn');
    const subHealthyWaterBtn = document.getElementById('subHealthyWaterBtn');
    const resetHealthyTrackerBtn = document.getElementById('resetHealthyTrackerBtn');

    const calorieCalculatorForm = document.getElementById('calorieCalculatorForm');
    const fillCalCalcFromProfileBtn = document.getElementById('fillCalCalcFromProfileBtn');
    const calcGenderInput = document.getElementById('calcGenderInput');
    const calcAgeInput = document.getElementById('calcAgeInput');
    const calcHeightInput = document.getElementById('calcHeightInput');
    const calcWeightInput = document.getElementById('calcWeightInput');
    const calcActivityInput = document.getElementById('calcActivityInput');
    const calcGoalInput = document.getElementById('calcGoalInput');
    const calorieCalculatorResultBox = document.getElementById('calorieCalculatorResultBox');
    const calcResultBmr = document.getElementById('calcResultBmr');
    const calcResultTdee = document.getElementById('calcResultTdee');
    const calcResultBmi = document.getElementById('calcResultBmi');
    const calcResultMacros = document.getElementById('calcResultMacros');

    const searchTkpiFoodInput = document.getElementById('searchTkpiFoodInput');
    const filterTkpiCategorySelect = document.getElementById('filterTkpiCategorySelect');
    const healthyMealTimeSelect = document.getElementById('healthyMealTimeSelect');
    const tkpiFoodCountBadge = document.getElementById('tkpiFoodCountBadge');
    const tkpiFoodListContainer = document.getElementById('tkpiFoodListContainer');

    const healthyLogCountBadge = document.getElementById('healthyLogCountBadge');
    const healthyLogListContainer = document.getElementById('healthyLogListContainer');
    const emptyHealthyLogState = document.getElementById('emptyHealthyLogState');
    const healthyManualFoodForm = document.getElementById('healthyManualFoodForm');

    // Data Gizi Pangan dari Tabel Komposisi Pangan Indonesia (TKPI) Kementerian Kesehatan RI
    // Katalog TKPI dimulai kosong (0 dummy data) hingga diinput oleh Admin/Pengguna
    const tkpiFoodsCatalog = [];

    let healthyLogs = [];
    let waterGlassesCount = 0;

    function updateMacroTargetsFromCalories(calTarget) {
        const carbG = Math.round((calTarget * 0.55) / 4);
        const protG = Math.round((calTarget * 0.15) / 4);
        const fatG = Math.round((calTarget * 0.30) / 9);
        if (healthyTargetCarbs) healthyTargetCarbs.textContent = String(carbG);
        if (healthyTargetProtein) healthyTargetProtein.textContent = String(protG);
        if (healthyTargetFat) healthyTargetFat.textContent = String(fatG);
        return { carbG: carbG, protG: protG, fatG: fatG };
    }

    function renderHealthyTrackerUI() {
        const targetCal = Math.max(800, parseInt(healthyDailyTargetInput ? healthyDailyTargetInput.value : '2000', 10) || 2000);
        updateMacroTargetsFromCalories(targetCal);

        let totalCal = 0;
        let totalCarbs = 0;
        let totalProt = 0;
        let totalFat = 0;
        let totalFib = 0;

        healthyLogs.forEach(function (item) {
            totalCal += Number(item.calories || 0);
            totalCarbs += Number(item.carbs || 0);
            totalProt += Number(item.protein || 0);
            totalFat += Number(item.fat || 0);
            totalFib += Number(item.fiber || 0);
        });

        const roundedCal = Math.round(totalCal);
        const remainCal = Math.max(0, targetCal - roundedCal);
        const calPct = Math.min(100, Math.round((roundedCal / targetCal) * 100));

        if (healthyIntakeCalories) healthyIntakeCalories.textContent = roundedCal.toLocaleString('id-ID');
        if (healthyTargetCaloriesLabel) healthyTargetCaloriesLabel.textContent = targetCal.toLocaleString('id-ID');
        if (healthyRemainingCalories) healthyRemainingCalories.textContent = remainCal.toLocaleString('id-ID');
        if (healthyCaloriePercentText) healthyCaloriePercentText.textContent = calPct + '%';
        if (healthyCalorieProgressBar) healthyCalorieProgressBar.style.width = calPct + '%';

        if (healthyTotalCarbs) healthyTotalCarbs.textContent = totalCarbs.toFixed(1);
        if (healthyTotalProtein) healthyTotalProtein.textContent = totalProt.toFixed(1);
        if (healthyTotalFat) healthyTotalFat.textContent = totalFat.toFixed(1);
        if (healthyTotalFiber) healthyTotalFiber.textContent = totalFib.toFixed(1);

        // Air Minum Harian
        if (healthyWaterGlasses) healthyWaterGlasses.textContent = String(waterGlassesCount);
        if (healthyWaterMl) healthyWaterMl.textContent = (waterGlassesCount * 250).toLocaleString('id-ID');
        if (healthyWaterProgressBar) {
            const waterPct = Math.min(100, Math.round((waterGlassesCount / 8) * 100));
            healthyWaterProgressBar.style.width = waterPct + '%';
        }

        // Daftar Catatan Makanan Harian
        if (!healthyLogListContainer || !emptyHealthyLogState) return;
        healthyLogListContainer.querySelectorAll('.healthy-log-item').forEach(function (el) { el.remove(); });
        if (healthyLogCountBadge) {
            healthyLogCountBadge.textContent = healthyLogs.length + ' Makanan';
        }

        if (healthyLogs.length === 0) {
            emptyHealthyLogState.classList.remove('hidden');
            return;
        }
        emptyHealthyLogState.classList.add('hidden');

        healthyLogs.forEach(function (log, idx) {
            const card = document.createElement('div');
            card.className = 'healthy-log-item border border-slate-200 rounded-xl p-3 flex items-center justify-between gap-2 bg-slate-50 text-xs';
            card.innerHTML =
                '<div class="space-y-0.5">' +
                    '<div class="flex flex-wrap items-center gap-1.5">' +
                        '<span class="text-[10px] font-semibold bg-teal-50 text-teal-700 border border-teal-200 px-2 py-0.5 rounded-full">' + (log.mealTime || 'Harian') + '</span>' +
                        (log.tkpiCode ? '<span class="text-[10px] font-mono text-slate-500">TKPI ' + log.tkpiCode + '</span>' : '') +
                        '<span class="text-[10px] text-slate-400">' + log.time + '</span>' +
                    '</div>' +
                    '<h4 class="font-bold text-slate-800">' + log.title + ' <span class="font-normal text-slate-500">(' + log.portion + ')</span></h4>' +
                    '<p class="text-[11px] text-slate-600">' +
                        '<strong class="text-teal-700">' + Math.round(log.calories) + ' kkal</strong> • ' +
                        'Karb: ' + Number(log.carbs).toFixed(1) + 'g • ' +
                        'Prot: ' + Number(log.protein).toFixed(1) + 'g • ' +
                        'Lemak: ' + Number(log.fat).toFixed(1) + 'g' +
                    '</p>' +
                '</div>';

            const delBtn = document.createElement('button');
            delBtn.type = 'button';
            delBtn.className = 'text-xs text-red-500 hover:bg-red-50 px-2.5 py-1.5 rounded-xl transition-colors shrink-0';
            delBtn.title = 'Hapus dari catatan hari ini';
            delBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
            delBtn.addEventListener('click', function () {
                healthyLogs.splice(idx, 1);
                renderHealthyTrackerUI();
            });

            card.appendChild(delBtn);
            healthyLogListContainer.appendChild(card);
        });
    }

    function renderTkpiFoodCatalog() {
        if (!tkpiFoodListContainer) return;
        if (tkpiFoodCountBadge) {
            tkpiFoodCountBadge.textContent = tkpiFoodsCatalog.length + ' Pangan TKPI Kemenkes';
        }

        const q = (searchTkpiFoodInput ? searchTkpiFoodInput.value : '').trim().toLowerCase();
        const cat = filterTkpiCategorySelect ? filterTkpiCategorySelect.value : 'ALL';

        const filtered = tkpiFoodsCatalog.filter(function (f) {
            const matchCat = cat === 'ALL' || f.category === cat;
            const matchQ = !q ||
                f.name.toLowerCase().includes(q) ||
                f.code.toLowerCase().includes(q) ||
                f.category.toLowerCase().includes(q);
            return matchCat && matchQ;
        });

        tkpiFoodListContainer.innerHTML = '';
        if (filtered.length === 0) {
            tkpiFoodListContainer.innerHTML =
                '<div class="py-8 px-4 text-center text-slate-400 text-xs">' +
                    'Makanan tidak ditemukan di daftar pencarian. Anda juga dapat mencatatnya lewat form <strong>Catat Makanan Manual</strong> di sebelah kanan.' +
                '</div>';
            return;
        }

        filtered.forEach(function (food) {
            const row = document.createElement('div');
            row.className = 'p-3 hover:bg-slate-50 flex flex-col sm:flex-row sm:items-center justify-between gap-2.5 text-xs transition-colors';

            const infoDiv = document.createElement('div');
            infoDiv.className = 'space-y-0.5';
            infoDiv.innerHTML =
                '<div class="flex flex-wrap items-center gap-1.5">' +
                    '<span class="text-[10px] font-mono font-bold text-teal-700 bg-teal-50 border border-teal-200 px-1.5 py-0.5 rounded">' + food.code + '</span>' +
                    '<h4 class="font-bold text-slate-800 text-xs sm:text-sm">' + food.name + '</h4>' +
                    '<span class="text-[10px] text-slate-500 bg-slate-100 px-2 py-0.5 rounded">' + food.category + '</span>' +
                '</div>' +
                '<p class="text-[11px] text-slate-600">' +
                    'Takaran: <strong>' + food.portion + '</strong> — ' +
                    'Energi: <strong class="text-teal-700">' + food.calories + ' kkal</strong> | ' +
                    'Karb: <strong>' + food.carbs + 'g</strong> | ' +
                    'Prot: <strong>' + food.protein + 'g</strong> | ' +
                    'Lemak: <strong>' + food.fat + 'g</strong> | ' +
                    'Serat: <strong>' + food.fiber + 'g</strong>' +
                '</p>';

            const actionDiv = document.createElement('div');
            actionDiv.className = 'flex items-center space-x-2 shrink-0';

            const portionSelect = document.createElement('select');
            portionSelect.className = 'px-2 py-1 text-[11px] border border-slate-200 rounded-lg bg-white text-slate-700 focus:outline-none focus:ring-1 focus:ring-teal-600';
            portionSelect.innerHTML =
                '<option value="0.5">1/2 Porsi</option>' +
                '<option value="1" selected>1 Porsi</option>' +
                '<option value="1.5">1,5 Porsi</option>' +
                '<option value="2">2 Porsi</option>';

            const addBtn = document.createElement('button');
            addBtn.type = 'button';
            addBtn.className = 'px-3 py-1.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-[11px] font-semibold transition-colors';
            addBtn.innerHTML = '<i class="fas fa-plus mr-1"></i>Tambah';
            addBtn.addEventListener('click', function () {
                const mult = parseFloat(portionSelect.value) || 1;
                const mealTime = healthyMealTimeSelect ? healthyMealTimeSelect.value : 'Sarapan';
                const now = new Date();
                const timeStr = String(now.getHours()).padStart(2, '0') + ':' + String(now.getMinutes()).padStart(2, '0');
                const entry = {
                    tkpiCode: food.code,
                    mealTime: mealTime,
                    title: food.name,
                    portion: (mult === 1 ? food.portion : mult + 'x ' + food.portion),
                    calories: Math.round(food.calories * mult),
                    carbs: Number((food.carbs * mult).toFixed(1)),
                    protein: Number((food.protein * mult).toFixed(1)),
                    fat: Number((food.fat * mult).toFixed(1)),
                    fiber: Number((food.fiber * mult).toFixed(1)),
                    time: timeStr
                };
                healthyLogs.unshift(entry);
                renderHealthyTrackerUI();
                if (typeof pushAppNotification === 'function') {
                    pushAppNotification(
                        'HEALTHY',
                        'Nutrisi Harian Dicatat (' + mealTime + '): ' + food.name,
                        food.name + ' (' + entry.calories + ' kkal • TKPI Kemenkes ' + food.code + ') berhasil ditambahkan ke nutrisi harian.',
                        'healthy'
                    );
                }
            });

            actionDiv.appendChild(portionSelect);
            actionDiv.appendChild(addBtn);
            row.appendChild(infoDiv);
            row.appendChild(actionDiv);
            tkpiFoodListContainer.appendChild(row);
        });
    }

    if (searchTkpiFoodInput) searchTkpiFoodInput.addEventListener('input', renderTkpiFoodCatalog);
    if (filterTkpiCategorySelect) filterTkpiCategorySelect.addEventListener('change', renderTkpiFoodCatalog);

    if (healthyDailyTargetInput) {
        healthyDailyTargetInput.addEventListener('input', renderHealthyTrackerUI);
    }

    if (addHealthyWaterBtn) {
        addHealthyWaterBtn.addEventListener('click', function () {
            waterGlassesCount++;
            renderHealthyTrackerUI();
        });
    }

    if (subHealthyWaterBtn) {
        subHealthyWaterBtn.addEventListener('click', function () {
            if (waterGlassesCount > 0) {
                waterGlassesCount--;
                renderHealthyTrackerUI();
            }
        });
    }

    if (resetHealthyTrackerBtn) {
        resetHealthyTrackerBtn.addEventListener('click', function () {
            waterGlassesCount = 0;
            healthyLogs = [];
            renderHealthyTrackerUI();
        });
    }

    // Kalkulator Kebutuhan Kalori Harian (Mifflin-St Jeor)
    if (fillCalCalcFromProfileBtn) {
        fillCalCalcFromProfileBtn.addEventListener('click', function () {
            const h = parseFloat(vitalHeight ? vitalHeight.textContent : '0') || 0;
            const w = parseFloat(vitalWeight ? vitalWeight.textContent : '0') || 0;
            const g = (bioGender ? bioGender.textContent : '').trim();
            if (h > 50 && calcHeightInput) calcHeightInput.value = String(h);
            if (w > 20 && calcWeightInput) calcWeightInput.value = String(w);
            if ((g === 'Laki-laki' || g === 'Perempuan') && calcGenderInput) calcGenderInput.value = g;
            showModal('Data Profil Diterapkan', 'Tinggi badan, berat badan, dan jenis kelamin dari profil medis Anda telah dimasukkan ke Kalkulator Kalori.');
        });
    }

    if (calorieCalculatorForm) {
        calorieCalculatorForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const gender = calcGenderInput ? calcGenderInput.value : 'Laki-laki';
            const age = Math.max(10, parseInt(calcAgeInput ? calcAgeInput.value : '25', 10) || 25);
            const heightCm = Math.max(100, parseFloat(calcHeightInput ? calcHeightInput.value : '165') || 165);
            const weightKg = Math.max(25, parseFloat(calcWeightInput ? calcWeightInput.value : '60') || 60);
            const activityFactor = parseFloat(calcActivityInput ? calcActivityInput.value : '1.375') || 1.375;
            const goalDelta = parseInt(calcGoalInput ? calcGoalInput.value : '0', 10) || 0;

            // Rumus Mifflin-St Jeor
            const bmrRaw = gender === 'Perempuan'
                ? (10 * weightKg) + (6.25 * heightCm) - (5 * age) - 161
                : (10 * weightKg) + (6.25 * heightCm) - (5 * age) + 5;
            const bmr = Math.round(bmrRaw);
            const tdee = Math.max(1000, Math.round((bmrRaw * activityFactor) + goalDelta));

            const heightM = heightCm / 100;
            const bmiVal = weightKg / (heightM * heightM);
            let bmiStatus = 'Normal (Ideal)';
            if (bmiVal < 18.5) bmiStatus = 'Kurang Berat Badan';
            else if (bmiVal >= 25 && bmiVal < 30) bmiStatus = 'Kelebihan Berat Badan';
            else if (bmiVal >= 30) bmiStatus = 'Obesitas';

            const macros = updateMacroTargetsFromCalories(tdee);

            if (healthyDailyTargetInput) {
                healthyDailyTargetInput.value = String(tdee);
            }
            if (calcResultBmr) calcResultBmr.textContent = bmr.toLocaleString('id-ID') + ' kkal/hari';
            if (calcResultTdee) calcResultTdee.textContent = tdee.toLocaleString('id-ID') + ' kkal/hari';
            if (calcResultBmi) calcResultBmi.textContent = bmiVal.toFixed(1) + ' (' + bmiStatus + ')';
            if (calcResultMacros) {
                calcResultMacros.textContent = 'Karb: ' + macros.carbG + 'g • Prot: ' + macros.protG + 'g • Lemak: ' + macros.fatG + 'g';
            }
            if (calorieCalculatorResultBox) {
                calorieCalculatorResultBox.classList.remove('hidden');
            }

            renderHealthyTrackerUI();
            if (typeof pushAppNotification === 'function') {
                pushAppNotification(
                    'HEALTHY',
                    'Target Kalori Harian Diperbarui: ' + tdee.toLocaleString('id-ID') + ' kkal',
                    'Hasil kalkulator kebutuhan kalori harian (BMR ' + bmr + ' kkal, Target ' + tdee + ' kkal/hari) telah diterapkan.',
                    'healthy'
                );
            }
        });
    }

    if (healthyManualFoodForm) {
        healthyManualFoodForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const nameVal = document.getElementById('manualFoodNameInput').value.trim();
            const calVal = parseFloat(document.getElementById('manualFoodCaloriesInput').value) || 0;
            const carbVal = parseFloat(document.getElementById('manualFoodCarbsInput').value) || 0;
            const protVal = parseFloat(document.getElementById('manualFoodProteinInput').value) || 0;
            const fatVal = parseFloat(document.getElementById('manualFoodFatInput').value) || 0;
            if (!nameVal) return;

            const mealTime = healthyMealTimeSelect ? healthyMealTimeSelect.value : 'Sarapan';
            const now = new Date();
            const timeStr = String(now.getHours()).padStart(2, '0') + ':' + String(now.getMinutes()).padStart(2, '0');

            healthyLogs.unshift({
                tkpiCode: '',
                mealTime: mealTime,
                title: nameVal,
                portion: '1 porsi manual',
                calories: Math.round(calVal),
                carbs: carbVal,
                protein: protVal,
                fat: fatVal,
                fiber: 0,
                time: timeStr
            });
            healthyManualFoodForm.reset();
            renderHealthyTrackerUI();
            if (typeof pushAppNotification === 'function') {
                pushAppNotification(
                    'HEALTHY',
                    'Nutrisi Manual Dicatat (' + mealTime + '): ' + nameVal,
                    nameVal + ' (' + Math.round(calVal) + ' kkal) telah ditambahkan ke catatan nutrisi harian.',
                    'healthy'
                );
            }
        });
    }

    renderTkpiFoodCatalog();
    renderHealthyTrackerUI();


    // =========================================================================
    // 21. PUSAT NOTIFIKASI PENGGUNA SEHATIN (BERSIH TANPA DATA DUMMY)
    //     Notifikasi hanya muncul apabila memang ada aktivitas / pengingat nyata
    // =========================================================================
    const notifListContainer = document.getElementById('notifListContainer');
    const emptyNotifState = document.getElementById('emptyNotifState');
    const notifPageUnreadBadge = document.getElementById('notifPageUnreadBadge');
    const markAllNotifReadBtn = document.getElementById('markAllNotifReadBtn');
    const toggleNotifSettingsBtn = document.getElementById('toggleNotifSettingsBtn');
    const closeNotifSettingsBtn = document.getElementById('closeNotifSettingsBtn');
    const notifSettingsPanel = document.getElementById('notifSettingsPanel');
    const clearAllNotifBtn = document.getElementById('clearAllNotifBtn');
    const notifFilterBtns = document.querySelectorAll('.notif-filter-btn');
    const toggleAddCustomReminderBtn = document.getElementById('toggleAddCustomReminderBtn');
    const cancelCustomReminderBtn = document.getElementById('cancelCustomReminderBtn');
    const addCustomReminderForm = document.getElementById('addCustomReminderForm');

    const prefNotifKonsultasi = document.getElementById('prefNotifKonsultasi');
    const prefNotifObat = document.getElementById('prefNotifObat');
    const prefNotifHealthy = document.getElementById('prefNotifHealthy');
    const prefNotifSistem = document.getElementById('prefNotifSistem');

    let currentNotifFilter = 'ALL';
    // Kosong tanpa data dummy — hanya berisi notifikasi jika memang ada aktivitas
    let appNotifications = [];

    function getNotifCategoryMeta(cat) {
        if (cat === 'KONSULTASI') return { icon: 'fa-user-md', label: 'Konsultasi & Dokter' };
        if (cat === 'OBAT') return { icon: 'fa-pills', label: 'Obat & Resep' };
        if (cat === 'HEALTHY') return { icon: 'fa-apple-alt', label: 'Nutrisi & Healthy' };
        return { icon: 'fa-shield-alt', label: 'Lab & Sistem' };
    }

    function updateNotifBadges() {
        const unreadCount = appNotifications.filter(function (n) { return n.unread; }).length;

        if (notifPageUnreadBadge) {
            notifPageUnreadBadge.textContent = unreadCount + ' Belum Dibaca';
            notifPageUnreadBadge.className = unreadCount > 0
                ? 'bg-teal-600 text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full'
                : 'bg-slate-100 text-slate-600 text-[10px] font-semibold px-2.5 py-0.5 rounded-full';
        }
        if (desktopNotifBadge) {
            if (unreadCount > 0) {
                desktopNotifBadge.textContent = unreadCount + ' Baru';
                desktopNotifBadge.classList.remove('hidden');
            } else {
                desktopNotifBadge.classList.add('hidden');
            }
        }
        if (headerNotifBadge) {
            if (unreadCount > 0) {
                headerNotifBadge.textContent = String(unreadCount);
                headerNotifBadge.classList.remove('hidden');
            } else {
                headerNotifBadge.classList.add('hidden');
            }
        }
        if (notifBadge) {
            notifBadge.classList.toggle('hidden', unreadCount === 0);
        }
    }

    function renderNotificationCenter() {
        updateNotifBadges();
        if (!notifListContainer || !emptyNotifState) return;

        const filtered = appNotifications.filter(function (n) {
            if (currentNotifFilter === 'ALL') return true;
            if (currentNotifFilter === 'UNREAD') return n.unread;
            return n.category === currentNotifFilter;
        });

        notifListContainer.innerHTML = '';
        if (filtered.length === 0) {
            notifListContainer.classList.add('hidden');
            emptyNotifState.classList.remove('hidden');
            return;
        }
        notifListContainer.classList.remove('hidden');
        emptyNotifState.classList.add('hidden');

        filtered.forEach(function (notif) {
            const meta = getNotifCategoryMeta(notif.category);
            const row = document.createElement('div');
            row.className = 'p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 transition-colors ' +
                (notif.unread ? 'bg-teal-50/40' : 'bg-white hover:bg-slate-50');

            const leftDiv = document.createElement('div');
            leftDiv.className = 'flex items-start space-x-3.5';
            leftDiv.innerHTML =
                '<div class="w-10 h-10 rounded-xl ' + (notif.unread ? 'bg-teal-600 text-white' : 'bg-slate-100 text-teal-600') + ' flex items-center justify-center text-sm shrink-0 mt-0.5">' +
                    '<i class="fas ' + meta.icon + '"></i>' +
                '</div>' +
                '<div class="space-y-1">' +
                    '<div class="flex flex-wrap items-center gap-2">' +
                        '<span class="text-[10px] font-bold uppercase tracking-wider text-teal-700 bg-teal-50 px-2 py-0.5 rounded border border-teal-200">' + meta.label + '</span>' +
                        '<span class="text-[11px] text-slate-400"><i class="far fa-clock mr-1"></i>' + notif.time + '</span>' +
                        (notif.unread ? '<span class="inline-flex items-center text-[10px] font-bold text-red-600"><span class="w-2 h-2 rounded-full bg-red-500 mr-1"></span>Baru</span>' : '') +
                    '</div>' +
                    '<h4 class="text-xs sm:text-sm font-bold text-slate-800">' + notif.title + '</h4>' +
                    '<p class="text-xs text-slate-600 leading-relaxed">' + notif.desc + '</p>' +
                '</div>';

            const rightDiv = document.createElement('div');
            rightDiv.className = 'flex flex-wrap items-center gap-2 shrink-0 sm:ml-4';

            if (notif.targetView) {
                const openBtn = document.createElement('button');
                openBtn.type = 'button';
                openBtn.className = 'px-3 py-1.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold transition-colors';
                openBtn.textContent = notif.actionLabel || 'Lihat Detail';
                openBtn.addEventListener('click', function () {
                    notif.unread = false;
                    renderNotificationCenter();
                    switchDashboardSubView(notif.targetView);
                });
                rightDiv.appendChild(openBtn);
            }

            if (notif.unread) {
                const readBtn = document.createElement('button');
                readBtn.type = 'button';
                readBtn.className = 'px-2.5 py-1.5 rounded-xl bg-white hover:bg-slate-100 text-slate-600 border border-slate-200 text-xs font-semibold transition-colors';
                readBtn.textContent = 'Tandai Dibaca';
                readBtn.addEventListener('click', function () {
                    notif.unread = false;
                    renderNotificationCenter();
                });
                rightDiv.appendChild(readBtn);
            }

            const delBtn = document.createElement('button');
            delBtn.type = 'button';
            delBtn.className = 'p-1.5 rounded-lg text-slate-400 hover:text-red-500 text-xs transition-colors';
            delBtn.title = 'Hapus Notifikasi';
            delBtn.innerHTML = '<i class="fas fa-times"></i>';
            delBtn.addEventListener('click', function () {
                appNotifications = appNotifications.filter(function (item) { return item !== notif; });
                renderNotificationCenter();
            });
            rightDiv.appendChild(delBtn);

            row.appendChild(leftDiv);
            row.appendChild(rightDiv);
            notifListContainer.appendChild(row);
        });
    }

    function pushAppNotification(category, title, desc, targetView, ignorePref) {
        if (!ignorePref) {
            if (category === 'KONSULTASI' && prefNotifKonsultasi && !prefNotifKonsultasi.checked) return;
            if (category === 'OBAT' && prefNotifObat && !prefNotifObat.checked) return;
            if (category === 'HEALTHY' && prefNotifHealthy && !prefNotifHealthy.checked) return;
            if (category === 'SISTEM' && prefNotifSistem && !prefNotifSistem.checked) return;
        }
        const now = new Date();
        const timeStr = String(now.getHours()).padStart(2, '0') + ':' + String(now.getMinutes()).padStart(2, '0') + ' WIB';
        appNotifications.unshift({
            id: 'notif-' + Date.now() + '-' + Math.floor(Math.random() * 1000),
            category: category || 'SISTEM',
            title: title,
            desc: desc,
            time: timeStr,
            unread: true,
            targetView: targetView || 'main',
            actionLabel: 'Buka Halaman'
        });
        renderNotificationCenter();
    }

    notifFilterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            currentNotifFilter = btn.getAttribute('data-notif-filter') || 'ALL';
            notifFilterBtns.forEach(function (b) {
                const active = b === btn;
                b.className = active
                    ? 'notif-filter-btn px-3 py-1.5 rounded-xl text-xs font-semibold bg-teal-600 text-white transition-colors'
                    : 'notif-filter-btn px-3 py-1.5 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors';
            });
            renderNotificationCenter();
        });
    });

    if (markAllNotifReadBtn) {
        markAllNotifReadBtn.addEventListener('click', function () {
            appNotifications.forEach(function (n) { n.unread = false; });
            renderNotificationCenter();
        });
    }

    if (toggleNotifSettingsBtn && notifSettingsPanel) {
        toggleNotifSettingsBtn.addEventListener('click', function () {
            notifSettingsPanel.classList.toggle('hidden');
        });
    }
    if (closeNotifSettingsBtn && notifSettingsPanel) {
        closeNotifSettingsBtn.addEventListener('click', function () {
            notifSettingsPanel.classList.add('hidden');
        });
    }

    if (clearAllNotifBtn) {
        clearAllNotifBtn.addEventListener('click', function () {
            appNotifications = [];
            renderNotificationCenter();
        });
    }

    if (toggleAddCustomReminderBtn && addCustomReminderForm) {
        toggleAddCustomReminderBtn.addEventListener('click', function () {
            addCustomReminderForm.classList.toggle('hidden');
        });
    }
    if (cancelCustomReminderBtn && addCustomReminderForm) {
        cancelCustomReminderBtn.addEventListener('click', function () {
            addCustomReminderForm.classList.add('hidden');
        });
    }
    if (addCustomReminderForm) {
        addCustomReminderForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const title = document.getElementById('customNotifTitleInput').value.trim();
            const cat = document.getElementById('customNotifCategorySelect').value;
            const desc = document.getElementById('customNotifDescInput').value.trim();
            const targetMap = { OBAT: 'resep', KONSULTASI: 'chat', HEALTHY: 'healthy', SISTEM: 'main' };
            pushAppNotification(cat, title, desc, targetMap[cat] || 'main', true);
            addCustomReminderForm.reset();
            addCustomReminderForm.classList.add('hidden');
        });
    }

    renderNotificationCenter();

    // =========================================================================
    // 22. LOGIKA 3 JENIS AKUN BERBEDA: USER (PASIEN), DOKTER, DAN ADMIN (TANPA DUMMY)
    // =========================================================================

    // A. Navigasi Tab Khusus Workspace Dokter
    const docNavBtns = document.querySelectorAll('.doc-nav-btn');
    const docPanelOverview = document.getElementById('docPanelOverview');
    const docPanelAntrean = document.getElementById('docPanelAntrean');
    const docPanelResepLab = document.getElementById('docPanelResepLab');
    const docPanelRiwayat = document.getElementById('docPanelRiwayat');
    const docPanelProfilDokter = document.getElementById('docPanelProfilDokter');

    function switchDoctorWorkspaceTab(tabKey) {
        const targetTab = tabKey || 'overview';
        if (targetTab === 'chat') {
            const docName = (currentLoggedInUser && currentLoggedInUser.fullName) ? currentLoggedInUser.fullName : 'Dokter Praktik';
            selectedConsultDoctor = {
                name: docName,
                specialty: (currentLoggedInUser && currentLoggedInUser.specialty) || 'Dokter Praktik',
                hospital: (currentLoggedInUser && currentLoggedInUser.hospital) || 'RS Pekanbaru',
                status: 'Aktif Praktik'
            };
            syncDoctorSelectAndDatalist();
            setChatRole('doctor');
            switchDashboardSubView('chat');
            switchKonsultasiTab('ruang');
            return;
        }

        switchDashboardSubView('main');

        docNavBtns.forEach(function (btn) {
            const isAct = btn.getAttribute('data-doc-nav') === targetTab;
            if (btn.closest('aside')) {
                btn.classList.toggle('bg-teal-50', isAct);
                btn.classList.toggle('text-teal-600', isAct);
                btn.classList.toggle('font-semibold', isAct);
                btn.classList.toggle('text-gray-600', !isAct);
            } else if (btn.closest('#bottomNavDokter')) {
                btn.classList.toggle('text-teal-600', isAct);
                btn.classList.toggle('font-medium', isAct);
            } else {
                btn.className = isAct
                    ? 'doc-nav-btn py-2 px-3 rounded-xl text-xs font-semibold bg-teal-600 text-white shadow-sm flex items-center justify-center space-x-1.5 transition-colors focus:outline-none'
                    : 'doc-nav-btn py-2 px-3 rounded-xl text-xs font-semibold bg-slate-50 text-slate-700 hover:bg-teal-50 hover:text-teal-700 border border-slate-200 flex items-center justify-center space-x-1.5 transition-colors focus:outline-none';
            }
        });

        const showAllOverview = targetTab === 'overview';
        if (docPanelOverview) docPanelOverview.classList.toggle('hidden', !showAllOverview);
        if (docPanelAntrean) docPanelAntrean.classList.toggle('hidden', !(showAllOverview || targetTab === 'antrean'));
        if (docPanelResepLab) docPanelResepLab.classList.toggle('hidden', !(showAllOverview || targetTab === 'resep_lab'));
        if (docPanelRiwayat) docPanelRiwayat.classList.toggle('hidden', targetTab !== 'riwayat');
        if (docPanelProfilDokter) docPanelProfilDokter.classList.toggle('hidden', targetTab !== 'profil_dokter');
        renderDoctorRoleDashboard();
    }

    docNavBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            switchDoctorWorkspaceTab(btn.getAttribute('data-doc-nav'));
        });
    });

    // B. Portal Dashboard Khusus Akun Dokter (Hanya Menampilkan Data Terkait Akun Pasien)
    const docStatConnectedPatientsCount = document.getElementById('docStatConnectedPatientsCount');
    const docStatScheduleCount = document.getElementById('docStatScheduleCount');
    const docStatChatCount = document.getElementById('docStatChatCount');
    const docStatResepCount = document.getElementById('docStatResepCount');
    const docStatHistoryCount = document.getElementById('docStatHistoryCount');
    const sidebarDocQueueBadge = document.getElementById('sidebarDocQueueBadge');
    const sidebarDocChatBadge = document.getElementById('sidebarDocChatBadge');
    const docConnectedPatientsContainer = document.getElementById('docConnectedPatientsContainer');
    const docEmptyConnectedPatients = document.getElementById('docEmptyConnectedPatients');
    const docScheduleQueueContainer = document.getElementById('docScheduleQueueContainer');
    const docEmptyScheduleQueue = document.getElementById('docEmptyScheduleQueue');
    const docIssuedPrescriptionsList = document.getElementById('docIssuedPrescriptionsList');
    const docIssuedLabsList = document.getElementById('docIssuedLabsList');
    const docCompletedHistoryList = document.getElementById('docCompletedHistoryList');
    const docOpenChatRoomBtn = document.getElementById('docOpenChatRoomBtn');
    const docAddPatientScheduleToggleBtn = document.getElementById('docAddPatientScheduleToggleBtn');
    const docQuickScheduleForm = document.getElementById('docQuickScheduleForm');
    const docIssuePrescriptionForm = document.getElementById('docIssuePrescriptionForm');
    const docIssueLabResultForm = document.getElementById('docIssueLabResultForm');
    const docUpdatePracticeProfileForm = document.getElementById('docUpdatePracticeProfileForm');

    function getRegisteredPatientsList() {
        return registeredUsers.filter(function (u) {
            return u && (u.role || 'user') === 'user';
        });
    }

    function renderDoctorRoleDashboard() {
        const patientAccounts = getRegisteredPatientsList();
        if (docStatConnectedPatientsCount) docStatConnectedPatientsCount.textContent = String(patientAccounts.length);
        if (docStatScheduleCount) docStatScheduleCount.textContent = String(jadwalItems.length);
        if (docStatChatCount) docStatChatCount.textContent = String(chatMessages.length);
        if (docStatResepCount) docStatResepCount.textContent = String(resepItems.length);
        if (docStatHistoryCount) docStatHistoryCount.textContent = String(consultHistories.length);
        if (sidebarDocQueueBadge) sidebarDocQueueBadge.textContent = String(jadwalItems.length);
        if (sidebarDocChatBadge) sidebarDocChatBadge.textContent = String(chatMessages.length);

        // 1. Render Daftar Akun Pasien Terkait (Tanpa Dummy)
        if (docConnectedPatientsContainer && docEmptyConnectedPatients) {
            docConnectedPatientsContainer.querySelectorAll('.doc-patient-card').forEach(function (el) { el.remove(); });
            if (patientAccounts.length === 0) {
                docEmptyConnectedPatients.classList.remove('hidden');
            } else {
                docEmptyConnectedPatients.classList.add('hidden');
                patientAccounts.forEach(function (pat) {
                    const card = document.createElement('div');
                    card.className = 'doc-patient-card p-3.5 rounded-xl border border-slate-200 bg-slate-50 flex flex-wrap items-center justify-between gap-3 text-xs';
                    card.innerHTML =
                        '<div class="flex items-center space-x-3">' +
                            '<div class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center font-bold">' +
                                '<i class="fas fa-user"></i>' +
                            '</div>' +
                            '<div>' +
                                '<div class="flex flex-wrap items-center gap-2">' +
                                    '<span class="font-bold text-slate-800">' + pat.fullName + '</span>' +
                                    '<span class="text-[10px] font-semibold bg-teal-50 text-teal-700 border border-teal-200 px-2 py-0.5 rounded-full">' + (pat.rmNumber || 'Pasien') + '</span>' +
                                '</div>' +
                                '<p class="text-[11px] text-slate-500 mt-0.5">' + (pat.gender || '-') + ' • Tgl Lahir: ' + (pat.birthDate || '-') + ' • HP: ' + (pat.phone || '-') + '</p>' +
                            '</div>' +
                        '</div>' +
                        '<div class="flex flex-wrap items-center gap-2 text-[11px]">' +
                            '<span class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-700"><strong>' + jadwalItems.length + '</strong> Jadwal</span>' +
                            '<span class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-700"><strong>' + resepItems.length + '</strong> Resep</span>' +
                            '<span class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-700"><strong>' + labItems.length + '</strong> Hasil Lab</span>' +
                        '</div>';
                    docConnectedPatientsContainer.appendChild(card);
                });
            }
        }

        // 2. Render Antrean Jadwal Pasien
        if (docScheduleQueueContainer && docEmptyScheduleQueue) {
            docScheduleQueueContainer.querySelectorAll('.doc-queue-item').forEach(function (el) { el.remove(); });
            if (jadwalItems.length === 0) {
                docEmptyScheduleQueue.classList.remove('hidden');
            } else {
                docEmptyScheduleQueue.classList.add('hidden');
                jadwalItems.forEach(function (j, idx) {
                    const row = document.createElement('div');
                    row.className = 'doc-queue-item p-3.5 rounded-xl border border-slate-200 bg-slate-50 flex flex-wrap items-center justify-between gap-2.5 text-xs';
                    row.innerHTML =
                        '<div>' +
                            '<div class="flex items-center space-x-2">' +
                                '<span class="text-[10px] font-bold bg-teal-50 text-teal-700 border border-teal-200 px-2 py-0.5 rounded-full">Antrean #' + (idx + 1) + '</span>' +
                                '<span class="font-bold text-slate-800">' + j.doctor + '</span>' +
                            '</div>' +
                            '<p class="text-[11px] text-slate-500 mt-1"><i class="far fa-calendar-alt mr-1 text-teal-600"></i>' + j.date + ' • <i class="far fa-clock mr-1 text-teal-600"></i>' + j.time + (j.notes ? ' — ' + j.notes : '') + '</p>' +
                        '</div>';

                    const btnWrap = document.createElement('div');
                    btnWrap.className = 'flex items-center space-x-2';

                    const chatBtn = document.createElement('button');
                    chatBtn.type = 'button';
                    chatBtn.className = 'px-3 py-1.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-[11px] font-semibold transition-colors';
                    chatBtn.innerHTML = '<i class="fas fa-comments mr-1"></i>Layani Chat';
                    chatBtn.addEventListener('click', function () {
                        switchDoctorWorkspaceTab('chat');
                    });

                    const doneBtn = document.createElement('button');
                    doneBtn.type = 'button';
                    doneBtn.className = 'px-3 py-1.5 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-700 text-[11px] font-semibold transition-colors';
                    doneBtn.textContent = 'Selesaikan Pemeriksaan';
                    doneBtn.addEventListener('click', function () {
                        consultHistories.unshift({
                            doctor: (currentLoggedInUser && currentLoggedInUser.fullName) ? currentLoggedInUser.fullName : j.doctor,
                            specialty: (currentLoggedInUser && currentLoggedInUser.specialty) || 'Pemeriksaan Dokter',
                            date: j.date,
                            time: j.time,
                            type: j.type || 'Konsultasi Terjadwal',
                            complaint: j.notes || 'Pemeriksaan jadwal pasien',
                            diagnosis: 'Pemeriksaan jadwal konsultasi pasien telah diselesaikan oleh dokter.',
                            followup: 'Terapi sesuai instruksi dokter',
                            transcript: chatMessages.slice()
                        });
                        jadwalItems.splice(idx, 1);
                        renderJadwalList();
                        renderKonsulScheduleList();
                        renderKonsulRiwayatList();
                        renderDoctorRoleDashboard();
                    });

                    btnWrap.appendChild(chatBtn);
                    btnWrap.appendChild(doneBtn);
                    row.appendChild(btnWrap);
                    docScheduleQueueContainer.appendChild(row);
                });
            }
        }

        // 3. Render Daftar e-Resep & Hasil Lab pada Akun Pasien
        if (docIssuedPrescriptionsList) {
            if (resepItems.length === 0) {
                docIssuedPrescriptionsList.innerHTML = '<p class="text-slate-400 text-xs py-3 text-center border border-dashed border-slate-200 rounded-xl">Belum ada resep yang diterbitkan untuk akun pasien.</p>';
            } else {
                docIssuedPrescriptionsList.innerHTML = resepItems.map(function (r) {
                    return '<div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between gap-2">' +
                        '<div><p class="font-bold text-slate-800">' + r.medName + '</p><p class="text-[11px] text-slate-500">' + r.rule + ' • ' + r.doctor + '</p></div>' +
                        '<span class="text-[10px] font-semibold bg-teal-50 text-teal-700 border border-teal-200 px-2 py-0.5 rounded-full">Terkirim ke Pasien</span>' +
                    '</div>';
                }).join('');
            }
        }

        if (docIssuedLabsList) {
            if (labItems.length === 0) {
                docIssuedLabsList.innerHTML = '<p class="text-slate-400 text-xs py-3 text-center border border-dashed border-slate-200 rounded-xl">Belum ada hasil lab yang dicatat untuk akun pasien.</p>';
            } else {
                docIssuedLabsList.innerHTML = labItems.map(function (l) {
                    return '<div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between gap-2">' +
                        '<div><p class="font-bold text-slate-800">' + l.testName + '</p><p class="text-[11px] text-slate-500">' + l.result + ' • ' + l.clinic + '</p></div>' +
                        '<span class="text-[10px] font-semibold bg-teal-50 text-teal-700 border border-teal-200 px-2 py-0.5 rounded-full">Rekam Medis Pasien</span>' +
                    '</div>';
                }).join('');
            }
        }

        // 4. Render Riwayat Pemeriksaan Selesai
        if (docCompletedHistoryList) {
            if (consultHistories.length === 0) {
                docCompletedHistoryList.innerHTML = '<p class="text-slate-400 text-xs py-8 text-center border border-dashed border-slate-200 rounded-xl">Belum ada riwayat pemeriksaan selesai dari akun pasien.</p>';
            } else {
                docCompletedHistoryList.innerHTML = consultHistories.map(function (h) {
                    return '<div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 space-y-1 text-xs">' +
                        '<div class="flex items-center justify-between"><span class="font-bold text-slate-800">' + h.doctor + '</span><span class="text-[11px] text-slate-500">' + h.date + ' • ' + h.time + '</span></div>' +
                        '<p class="text-slate-600"><strong>Keluhan Pasien:</strong> ' + h.complaint + '</p>' +
                        '<p class="text-teal-700"><strong>Diagnosis / Catatan Dokter:</strong> ' + h.diagnosis + '</p>' +
                    '</div>';
                }).join('');
            }
        }
    }

    if (docOpenChatRoomBtn) {
        docOpenChatRoomBtn.addEventListener('click', function () {
            switchDoctorWorkspaceTab('chat');
        });
    }

    if (docAddPatientScheduleToggleBtn && docQuickScheduleForm) {
        docAddPatientScheduleToggleBtn.addEventListener('click', function () {
            docQuickScheduleForm.classList.toggle('hidden');
        });
    }

    if (docQuickScheduleForm) {
        docQuickScheduleForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const docName = (currentLoggedInUser && currentLoggedInUser.fullName) ? currentLoggedInUser.fullName : 'Dokter Praktik';
            const note = document.getElementById('docSchedPatientNoteInput').value.trim();
            const date = document.getElementById('docSchedDateInput').value;
            const time = document.getElementById('docSchedTimeInput').value;
            jadwalItems.unshift({
                doctor: docName,
                date: date,
                time: time,
                type: 'Kontrol Dokter',
                notes: note
            });
            if (window.SehatinXamppApi) {
                window.SehatinXamppApi.addConsultSchedule({ doctor_name: docName, schedule_date: date, schedule_time: time, consult_type: 'Kontrol Dokter', complaint_notes: note });
            }
            docQuickScheduleForm.reset();
            docQuickScheduleForm.classList.add('hidden');
            renderJadwalList();
            renderKonsulScheduleList();
            renderDoctorRoleDashboard();
            if (typeof pushAppNotification === 'function') {
                pushAppNotification('KONSULTASI', 'Jadwal Kontrol Dokter Ditambahkan', 'Jadwal kontrol (' + note + ') bersama ' + docName + ' pada ' + date + ' pukul ' + time + '.', 'jadwal');
            }
        });
    }

    if (docIssuePrescriptionForm) {
        docIssuePrescriptionForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const medName = document.getElementById('docResepMedName').value.trim();
            const rule = document.getElementById('docResepUsageRule').value.trim();
            const docName = (currentLoggedInUser && currentLoggedInUser.fullName) ? currentLoggedInUser.fullName : 'Dokter Praktik';
            if (!medName || !rule) return;

            resepItems.unshift({
                medName: medName,
                doctor: docName,
                rule: rule
            });
            if (window.SehatinXamppApi) {
                window.SehatinXamppApi.addPrescription({ med_name: medName, doctor_name: docName, usage_rule: rule });
            }
            docIssuePrescriptionForm.reset();
            renderResepList();
            renderDoctorRoleDashboard();
            if (typeof pushAppNotification === 'function') {
                pushAppNotification('OBAT', 'e-Resep Baru dari ' + docName, 'Resep obat ' + medName + ' (' + rule + ') telah diterbitkan oleh dokter ke akun Anda.', 'resep');
            }
            showModal('e-Resep Berhasil Diterbitkan', 'Resep obat ' + medName + ' telah dikirim langsung ke halaman Resep Obat pada akun Pasien.');
        });
    }

    if (docIssueLabResultForm) {
        docIssueLabResultForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const testName = document.getElementById('docLabTestName').value.trim();
            const resultVal = document.getElementById('docLabResultSummary').value.trim();
            const hosp = (currentLoggedInUser && currentLoggedInUser.hospital) || 'RS Pekanbaru';
            if (!testName || !resultVal) return;

            labItems.unshift({
                testName: testName,
                clinic: hosp,
                result: resultVal
            });
            if (window.SehatinXamppApi) {
                window.SehatinXamppApi.addLabResult({ test_name: testName, clinic_name: hosp, result_value: resultVal });
            }
            docIssueLabResultForm.reset();
            renderLabList();
            renderDoctorRoleDashboard();
            if (typeof pushAppNotification === 'function') {
                pushAppNotification('SISTEM', 'Hasil Pemeriksaan Lab: ' + testName, 'Dokter telah mencatat hasil pemeriksaan ' + testName + ' (' + resultVal + ') ke akun Anda.', 'lab');
            }
            showModal('Hasil Pemeriksaan Tersimpan', 'Catatan pemeriksaan ' + testName + ' telah disimpan ke halaman Hasil Lab akun Pasien.');
        });
    }

    if (docUpdatePracticeProfileForm) {
        docUpdatePracticeProfileForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const nameVal = document.getElementById('docProfileNameInput').value.trim();
            const specVal = document.getElementById('docProfileSpecInput').value.trim();
            const statusVal = document.getElementById('docProfileStatusSelect').value;
            const hospVal = document.getElementById('docProfileHospitalInput').value.trim();
            const hoursVal = document.getElementById('docProfileHoursInput').value.trim();

            if (currentLoggedInUser) {
                currentLoggedInUser.fullName = nameVal;
                currentLoggedInUser.specialty = specVal;
                currentLoggedInUser.hospital = hospVal;
                saveRegisteredUsers();
                displayPatientName.textContent = nameVal;
            }
            const docNameEl = document.getElementById('docDashDoctorName');
            const docMetaEl = document.getElementById('docDashDoctorMeta');
            const docBadgeEl = document.getElementById('docDashStatusBadge');
            if (docNameEl) docNameEl.textContent = nameVal;
            if (docMetaEl) docMetaEl.textContent = specVal + ' • ' + hospVal + ' • ' + hoursVal;
            if (docBadgeEl) docBadgeEl.textContent = '● ' + statusVal;
            showModal('Profil Praktik Dokter Diperbarui', 'Informasi praktik ' + nameVal + ' di ' + hospVal + ' berhasil disimpan.');
        });
    }

    // C. Navigasi Tab & Panel Kontrol Khusus Akun Admin (Tanpa Data Dummy)
    const adminNavBtns = document.querySelectorAll('.admin-nav-btn');
    const adminPanelAccounts = document.getElementById('adminPanelAccounts');
    const adminPanelMasterData = document.getElementById('adminPanelMasterData');
    const adminSubPanelTkpi = document.getElementById('adminSubPanelTkpi');

    function switchAdminWorkspaceTab(tabKey) {
        const targetTab = tabKey || 'overview';
        if (targetTab === 'doctors') {
            switchDashboardSubView('chat');
            switchKonsultasiTab('daftar');
            return;
        }

        switchDashboardSubView('main');

        adminNavBtns.forEach(function (btn) {
            const isAct = btn.getAttribute('data-admin-nav') === targetTab;
            if (btn.closest('aside')) {
                btn.classList.toggle('bg-teal-50', isAct);
                btn.classList.toggle('text-teal-600', isAct);
                btn.classList.toggle('font-semibold', isAct);
                btn.classList.toggle('text-gray-600', !isAct);
            } else if (btn.closest('#bottomNavAdmin')) {
                btn.classList.toggle('text-teal-600', isAct);
                btn.classList.toggle('font-medium', isAct);
            } else {
                btn.className = isAct
                    ? 'admin-nav-btn py-2 px-3 rounded-xl text-xs font-semibold bg-teal-600 text-white shadow-sm flex items-center justify-center space-x-1.5 transition-colors focus:outline-none'
                    : 'admin-nav-btn py-2 px-3 rounded-xl text-xs font-semibold bg-slate-50 text-slate-700 hover:bg-teal-50 hover:text-teal-700 border border-slate-200 flex items-center justify-center space-x-1.5 transition-colors focus:outline-none';
            }
        });

        const showOverview = targetTab === 'overview';
        if (adminPanelAccounts) adminPanelAccounts.classList.toggle('hidden', !(showOverview || targetTab === 'accounts'));
        if (adminPanelMasterData) adminPanelMasterData.classList.toggle('hidden', !(showOverview || targetTab === 'tkpi'));
        renderAdminRoleDashboard();
    }

    adminNavBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            switchAdminWorkspaceTab(btn.getAttribute('data-admin-nav'));
        });
    });

    const adminStatUsersCount = document.getElementById('adminStatUsersCount');
    const adminStatRoleBreakdown = document.getElementById('adminStatRoleBreakdown');
    const adminStatPatientActivityCount = document.getElementById('adminStatPatientActivityCount');
    const adminStatPatientActivitySub = document.getElementById('adminStatPatientActivitySub');
    const adminStatDoctorsCount = document.getElementById('adminStatDoctorsCount');
    const adminStatTkpiCount = document.getElementById('adminStatTkpiCount');
    const adminAccountsTableBody = document.getElementById('adminAccountsTableBody');
    const adminPatientLinkedSummaryBox = document.getElementById('adminPatientLinkedSummaryBox');
    const adminToggleAddAccountBtn = document.getElementById('adminToggleAddAccountBtn');
    const adminCancelAddAccountBtn = document.getElementById('adminCancelAddAccountBtn');
    const adminCreateAccountForm = document.getElementById('adminCreateAccountForm');
    const adminAddTkpiFoodForm = document.getElementById('adminAddTkpiFoodForm');
    const adminBroadcastNotifForm = document.getElementById('adminBroadcastNotifForm');
    const adminQuickManageDoctorsBtn = document.getElementById('adminQuickManageDoctorsBtn');

    function renderAdminRoleDashboard() {
        const totalAcc = registeredUsers.length;
        let uCount = 0, dCount = 0, aCount = 0;
        registeredUsers.forEach(function (u) {
            if (u.role === 'dokter') dCount++;
            else if (u.role === 'admin') aCount++;
            else uCount++;
        });

        const totalMedActivity = jadwalItems.length + resepItems.length + labItems.length;
        if (adminStatUsersCount) adminStatUsersCount.textContent = String(totalAcc);
        if (adminStatRoleBreakdown) {
            adminStatRoleBreakdown.textContent = uCount + ' Pasien • ' + dCount + ' Dokter • ' + aCount + ' Admin';
        }
        if (adminStatPatientActivityCount) adminStatPatientActivityCount.textContent = String(totalMedActivity);
        if (adminStatPatientActivitySub) {
            adminStatPatientActivitySub.textContent = jadwalItems.length + ' Jadwal • ' + resepItems.length + ' Resep • ' + labItems.length + ' Lab';
        }
        if (adminStatDoctorsCount) adminStatDoctorsCount.textContent = String(getAllConsultDoctors().length);
        if (adminStatTkpiCount) adminStatTkpiCount.textContent = String(tkpiFoodsCatalog.length);

        if (adminPatientLinkedSummaryBox) {
            adminPatientLinkedSummaryBox.innerHTML =
                '<div class="p-3 rounded-xl bg-slate-50 border border-slate-200"><p class="font-bold text-slate-700">Jadwal & Chat Pasien</p><p class="text-slate-500 mt-1">' + jadwalItems.length + ' jadwal aktif • ' + chatMessages.length + ' pesan chat</p></div>' +
                '<div class="p-3 rounded-xl bg-slate-50 border border-slate-200"><p class="font-bold text-slate-700">e-Resep & Hasil Lab Pasien</p><p class="text-slate-500 mt-1">' + resepItems.length + ' resep obat • ' + labItems.length + ' hasil lab</p></div>' +
                '<div class="p-3 rounded-xl bg-slate-50 border border-slate-200"><p class="font-bold text-slate-700">Riwayat Konsultasi Pasien</p><p class="text-slate-500 mt-1">' + consultHistories.length + ' riwayat selesai</p></div>';
        }

        if (!adminAccountsTableBody) return;
        adminAccountsTableBody.innerHTML = '';

        if (registeredUsers.length === 0) {
            const emptyTr = document.createElement('tr');
            emptyTr.innerHTML = '<td colspan="5" class="py-6 px-3 text-center text-slate-400 text-xs">Belum ada akun yang terdaftar (0 data dummy).</td>';
            adminAccountsTableBody.appendChild(emptyTr);
            return;
        }

        registeredUsers.forEach(function (acc, idx) {
            const tr = document.createElement('tr');
            tr.className = 'hover:bg-slate-50 transition-colors';

            const roleVal = acc.role || 'user';
            const roleBadgeLabel = roleVal === 'dokter' ? 'DOKTER PRAKTIK' : (roleVal === 'admin' ? 'ADMINISTRATOR' : 'PASIEN (USER)');

            tr.innerHTML =
                '<td class="py-2.5 px-3 font-bold text-slate-800">' + acc.fullName + '</td>' +
                '<td class="py-2.5 px-3 text-slate-600">' + acc.identifier + '</td>' +
                '<td class="py-2.5 px-3">' +
                    '<span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-teal-50 text-teal-700 border border-teal-200">' + roleBadgeLabel + '</span>' +
                '</td>' +
                '<td class="py-2.5 px-3 font-mono text-[11px] text-slate-500">' + (acc.rmNumber || '-') + '</td>' +
                '<td class="py-2.5 px-3 text-right space-x-1.5 whitespace-nowrap cell-actions"></td>';

            const actionsCell = tr.querySelector('.cell-actions');

            const roleSelect = document.createElement('select');
            roleSelect.className = 'px-2 py-1 text-[11px] border border-slate-200 rounded-lg bg-white text-slate-700 font-semibold';
            roleSelect.innerHTML =
                '<option value="user"' + (roleVal === 'user' ? ' selected' : '') + '>Pasien (User)</option>' +
                '<option value="dokter"' + (roleVal === 'dokter' ? ' selected' : '') + '>Dokter</option>' +
                '<option value="admin"' + (roleVal === 'admin' ? ' selected' : '') + '>Admin</option>';
            roleSelect.addEventListener('change', function () {
                acc.role = roleSelect.value;
                saveRegisteredUsers();
                renderAdminRoleDashboard();
            });

            const delBtn = document.createElement('button');
            delBtn.type = 'button';
            delBtn.className = 'px-2 py-1 rounded-lg text-red-500 hover:bg-red-50 text-[11px] font-semibold transition-colors';
            delBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
            delBtn.addEventListener('click', function () {
                if (registeredUsers.length <= 1) return;
                registeredUsers.splice(idx, 1);
                saveRegisteredUsers();
                renderAdminRoleDashboard();
            });

            actionsCell.appendChild(roleSelect);
            actionsCell.appendChild(delBtn);
            adminAccountsTableBody.appendChild(tr);
        });
    }

    if (adminToggleAddAccountBtn && adminCreateAccountForm) {
        adminToggleAddAccountBtn.addEventListener('click', function () {
            adminCreateAccountForm.classList.toggle('hidden');
        });
    }
    if (adminCancelAddAccountBtn && adminCreateAccountForm) {
        adminCancelAddAccountBtn.addEventListener('click', function () {
            adminCreateAccountForm.classList.add('hidden');
        });
    }
    if (adminCreateAccountForm) {
        adminCreateAccountForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            const name = document.getElementById('adminNewAccName').value.trim();
            const idf = document.getElementById('adminNewAccIdentifier').value.trim();
            const phone = document.getElementById('adminNewAccPhone').value.trim();
            const role = document.getElementById('adminNewAccRole').value;
            const pass = document.getElementById('adminNewAccPassword').value.trim();
            if (!name || !idf || !pass) return;

            if (role === 'admin') {
                showModal('Penolakan Keamanan', 'Jumlah akun Admin dikunci maksimal 2 akun tetap di database dan tidak dapat ditambah.');
                return;
            }

            if (window.SehatinXamppApi) {
                let apiRes = null;
                if (role === 'dokter') {
                    const strNum = 'STR-' + new Date().getFullYear() + '-' + String(Math.floor(1000 + Math.random() * 9000));
                    apiRes = await window.SehatinXamppApi.createDokter({
                        nama_lengkap: name,
                        email: idf,
                        no_hp: phone || '-',
                        password: pass,
                        spesialisasi: 'Dokter Spesialis',
                        no_str: strNum,
                        rumah_sakit: 'RS Mitra Sehatin'
                    });
                } else {
                    apiRes = await window.SehatinXamppApi.register({
                        nama_lengkap: name,
                        email: idf,
                        no_hp: phone || '-',
                        password: pass
                    });
                }

                if (apiRes && apiRes.status !== 'success') {
                    showModal('Gagal Mendaftarkan Akun', apiRes.message || 'Terjadi kesalahan saat menyimpan ke database.');
                    return;
                }
                await syncFromXamppDatabase();
            }

            adminCreateAccountForm.reset();
            adminCreateAccountForm.classList.add('hidden');
            renderAdminRoleDashboard();
            showModal('Akun Resmi Berhasil Didaftarkan', 'Akun ' + name + ' telah disimpan ke database MySQL.');
        });
    }

    if (adminAddTkpiFoodForm) {
        adminAddTkpiFoodForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const code = document.getElementById('adminTkpiCodeInput').value.trim().toUpperCase();
            const name = document.getElementById('adminTkpiNameInput').value.trim();
            const cat = document.getElementById('adminTkpiCategorySelect').value;
            const portion = document.getElementById('adminTkpiPortionInput').value.trim();
            const cal = parseFloat(document.getElementById('adminTkpiCalInput').value) || 0;
            const carb = parseFloat(document.getElementById('adminTkpiCarbInput').value) || 0;
            const prot = parseFloat(document.getElementById('adminTkpiProtInput').value) || 0;
            const fat = parseFloat(document.getElementById('adminTkpiFatInput').value) || 0;
            const fib = parseFloat(document.getElementById('adminTkpiFiberInput').value) || 0;
            if (!code || !name) return;

            tkpiFoodsCatalog.unshift({
                code: code,
                name: name,
                portion: portion,
                category: cat,
                calories: Math.round(cal),
                carbs: carb,
                protein: prot,
                fat: fat,
                fiber: fib
            });
            adminAddTkpiFoodForm.reset();
            renderTkpiFoodCatalog();
            renderAdminRoleDashboard();
            showModal('Data TKPI Kemenkes Ditambahkan', name + ' (' + code + ' • ' + Math.round(cal) + ' kkal) berhasil ditambahkan ke katalog Healthy.');
        });
    }

    if (adminBroadcastNotifForm) {
        adminBroadcastNotifForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const titleEl = document.getElementById('adminBroadcastTitleInput');
            const descEl = document.getElementById('adminBroadcastDescInput');
            const title = titleEl ? titleEl.value.trim() : '';
            const desc = descEl ? descEl.value.trim() : '';
            if (!title || !desc) return;
            if (typeof pushAppNotification === 'function') {
                pushAppNotification('SISTEM', '[Pengumuman Admin] ' + title, desc, 'notifikasi', true);
            }
            adminBroadcastNotifForm.reset();
            showModal('Pengumuman Sistem Terkirim', 'Notifikasi pengumuman administrator telah dikirim ke Pusat Notifikasi pasien.');
        });
    }

    if (adminQuickManageDoctorsBtn) {
        adminQuickManageDoctorsBtn.addEventListener('click', function () {
            switchAdminWorkspaceTab('doctors');
        });
    }

    // =========================================================================
    // 23. INTEGRASI PENUH PANEL ADMIN & DOKTER SESUAI BLUEPRINT TAHAP 4 & 5
    // =========================================================================
    function populateAdminAndDoctorDropdowns() {
        const patients = registeredUsers.filter(function (u) { return (u.role || 'user') === 'user'; });
        const doctors  = registeredUsers.filter(function (u) { return u.role === 'dokter'; });

        const admLabPasienSelect = document.getElementById('admLabPasienSelect');
        const admLabDokterSelect = document.getElementById('admLabDokterSelect');
        const docResepPasienSelect = document.getElementById('docResepPasienSelect');
        const docResepObatSelect = document.getElementById('docResepObatSelect');
        const docLabPasienSelect = document.getElementById('docLabPasienSelect');
        const adminStatObatCount = document.getElementById('adminStatObatCount');
        const adminMasterObatListContainer = document.getElementById('adminMasterObatListContainer');

        if (adminStatObatCount) {
            adminStatObatCount.textContent = String(masterObatCatalog.length);
        }

        [admLabPasienSelect, docResepPasienSelect, docLabPasienSelect].forEach(function (sel) {
            if (!sel) return;
            const prev = sel.value;
            sel.innerHTML = '<option value="">-- Pilih Pasien Terdaftar --</option>';
            patients.forEach(function (p) {
                const opt = document.createElement('option');
                opt.value = String(p.id || '');
                opt.textContent = p.fullName + ' (' + (p.rmNumber || '-') + ')';
                sel.appendChild(opt);
            });
            if (prev) sel.value = prev;
            else if (patients.length === 1 && patients[0].id) sel.value = String(patients[0].id);
        });

        if (admLabDokterSelect) {
            const prevDoc = admLabDokterSelect.value;
            admLabDokterSelect.innerHTML = '<option value="">-- Pilih Dokter Pengirim (Opsional) --</option>';
            doctors.forEach(function (d) {
                const opt = document.createElement('option');
                opt.value = String(d.id || '');
                opt.textContent = d.fullName + ' (' + (d.specialty || 'Dokter') + ')';
                admLabDokterSelect.appendChild(opt);
            });
            if (prevDoc) admLabDokterSelect.value = prevDoc;
        }

        if (docResepObatSelect) {
            const prevObat = docResepObatSelect.value;
            docResepObatSelect.innerHTML = '<option value="">-- Pilih Obat dari Master Obat Admin --</option>';
            masterObatCatalog.forEach(function (m) {
                const opt = document.createElement('option');
                opt.value = String(m.id);
                opt.setAttribute('data-nama-obat', m.nama_obat);
                opt.textContent = m.nama_obat + ' — ' + (m.satuan || 'Strip') + ' (Stok: ' + m.stok + ')';
                docResepObatSelect.appendChild(opt);
            });
            if (prevObat) docResepObatSelect.value = prevObat;
        }

        if (adminMasterObatListContainer) {
            if (masterObatCatalog.length === 0) {
                adminMasterObatListContainer.innerHTML = '<p class="text-slate-400 text-xs py-3 text-center border border-dashed border-slate-200 rounded-xl">Belum ada data obat di Master Obat.</p>';
            } else {
                adminMasterObatListContainer.innerHTML = '';
                masterObatCatalog.forEach(function (m) {
                    const row = document.createElement('div');
                    row.className = 'p-2.5 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between gap-2';
                    row.innerHTML =
                        '<div>' +
                            '<p class="font-bold text-slate-800">' + m.nama_obat + ' <span class="text-[10px] font-semibold text-teal-700 bg-teal-50 px-2 py-0.5 rounded-full ml-1">' + (m.kategori || 'Obat') + '</span></p>' +
                            '<p class="text-[11px] text-slate-500">Satuan: <strong>' + (m.satuan || 'Strip') + '</strong> • Stok: <strong>' + m.stok + '</strong></p>' +
                        '</div>';
                    const delBtn = document.createElement('button');
                    delBtn.type = 'button';
                    delBtn.className = 'px-2.5 py-1 rounded-lg text-red-500 hover:bg-red-50 text-[11px] font-semibold';
                    delBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
                    delBtn.addEventListener('click', async function () {
                        if (window.SehatinXamppApi) {
                            await window.SehatinXamppApi.deleteMasterObat(m.id);
                            await syncFromXamppDatabase();
                        }
                    });
                    row.appendChild(delBtn);
                    adminMasterObatListContainer.appendChild(row);
                });
            }
        }

        // Tambahkan tombol Lihat Rekam Medis pada kartu pasien di Dashboard Dokter
        if (docConnectedPatientsContainer && patients.length > 0) {
            docConnectedPatientsContainer.querySelectorAll('.doc-patient-card').forEach(function (el) { el.remove(); });
            if (docEmptyConnectedPatients) docEmptyConnectedPatients.classList.add('hidden');
            patients.forEach(function (pat) {
                const card = document.createElement('div');
                card.className = 'doc-patient-card p-3.5 rounded-xl border border-slate-200 bg-slate-50 flex flex-wrap items-center justify-between gap-3 text-xs';
                card.innerHTML =
                    '<div class="flex items-center space-x-3">' +
                        '<div class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center font-bold">' +
                            '<i class="fas fa-user"></i>' +
                        '</div>' +
                        '<div>' +
                            '<div class="flex flex-wrap items-center gap-2">' +
                                '<span class="font-bold text-slate-800">' + pat.fullName + '</span>' +
                                '<span class="text-[10px] font-semibold bg-teal-50 text-teal-700 border border-teal-200 px-2 py-0.5 rounded-full">' + (pat.rmNumber || 'Pasien') + '</span>' +
                            '</div>' +
                            '<p class="text-[11px] text-slate-500 mt-0.5">' + (pat.gender || '-') + ' • Tgl Lahir: ' + (pat.birthDate || '-') + ' • HP: ' + (pat.phone || '-') + '</p>' +
                        '</div>' +
                    '</div>';
                const btnGroup = document.createElement('div');
                btnGroup.className = 'flex items-center gap-2';
                const medBtn = document.createElement('button');
                medBtn.type = 'button';
                medBtn.className = 'px-3 py-1.5 rounded-xl bg-white hover:bg-teal-50 text-teal-700 border border-teal-200 text-[11px] font-semibold';
                medBtn.innerHTML = '<i class="fas fa-notes-medical mr-1"></i>Lihat Rekam Medis';
                medBtn.addEventListener('click', async function () {
                    if (!window.SehatinXamppApi || !pat.id) return;
                    const res = await window.SehatinXamppApi.getMedicalProfile(pat.id);
                    const box = document.getElementById('docSelectedPatientMedicalBox');
                    if (res && res.status === 'success' && box) {
                        const pm = res.profil_medis || {};
                        box.innerHTML =
                            '<div class="flex items-center justify-between border-b border-teal-200 pb-2">' +
                                '<strong class="text-teal-900"><i class="fas fa-id-card-alt mr-1.5"></i>Rekam Medis Pasien: ' + pat.fullName + ' (' + (pat.rmNumber || '-') + ')</strong>' +
                                '<span class="text-[10px] bg-white px-2 py-0.5 rounded-full border border-teal-200 text-teal-700">Data Real-Time Pasien</span>' +
                            '</div>' +
                            '<div class="grid grid-cols-2 sm:grid-cols-4 gap-2 pt-1">' +
                                '<div class="bg-white p-2 rounded-lg border border-teal-100"><span class="text-[10px] text-slate-400 block">Golongan Darah</span><strong>' + (pm.golongan_darah || '-') + '</strong></div>' +
                                '<div class="bg-white p-2 rounded-lg border border-teal-100"><span class="text-[10px] text-slate-400 block">Tinggi / Berat / IMT</span><strong>' + (pm.tinggi_badan || 0) + 'cm / ' + (pm.berat_badan || 0) + 'kg (' + (pm.imt_status || '-') + ')</strong></div>' +
                                '<div class="bg-white p-2 rounded-lg border border-teal-100"><span class="text-[10px] text-slate-400 block">Riwayat Alergi</span><strong class="text-rose-600">' + (pm.riwayat_alergi || 'Tidak Ada') + '</strong></div>' +
                                '<div class="bg-white p-2 rounded-lg border border-teal-100"><span class="text-[10px] text-slate-400 block">Tekanan Darah</span><strong>' + (pm.tekanan_darah || '-') + '</strong></div>' +
                            '</div>';
                        box.classList.remove('hidden');
                    }
                });
                btnGroup.appendChild(medBtn);
                card.appendChild(btnGroup);
                docConnectedPatientsContainer.appendChild(card);
            });
        }
    }

    // Handler Form Pendaftaran Dokter Baru oleh Admin (`#adminCreateDoctorDatabaseForm`)
    const adminCreateDoctorDatabaseForm = document.getElementById('adminCreateDoctorDatabaseForm');
    if (adminCreateDoctorDatabaseForm) {
        adminCreateDoctorDatabaseForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            const nama  = document.getElementById('admDocNamaInput').value.trim();
            const email = document.getElementById('admDocEmailInput').value.trim();
            const pass  = document.getElementById('admDocPassInput').value;
            const spec  = document.getElementById('admDocSpecInput').value.trim();
            const str   = document.getElementById('admDocStrInput').value.trim();
            const hosp  = document.getElementById('admDocPhoneHospInput').value.trim() || 'RS Mitra Sehatin';

            if (!nama || !email || !pass || !spec || !str) return;
            if (window.SehatinXamppApi) {
                const res = await window.SehatinXamppApi.createDokter({
                    nama_lengkap: nama,
                    email: email,
                    password: pass,
                    no_hp: '-',
                    spesialisasi: spec,
                    no_str: str,
                    rumah_sakit: hosp
                });
                if (!res || res.status !== 'success') {
                    showModal('Gagal Mendaftarkan Dokter', (res && res.message) ? res.message : 'Periksa kembali email dan Nomor STR dokter.');
                    return;
                }
                adminCreateDoctorDatabaseForm.reset();
                await syncFromXamppDatabase();
                populateAdminAndDoctorDropdowns();
                showModal('Akun Dokter Berhasil Dibuat', 'Akun ' + nama + ' (' + spec + ' • STR: ' + str + ') telah aktif dan siap digunakan login.');
            }
        });
    }

    // Handler Form Master Obat oleh Admin (`#adminMasterObatForm`)
    const adminMasterObatForm = document.getElementById('adminMasterObatForm');
    if (adminMasterObatForm) {
        adminMasterObatForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            const nama   = document.getElementById('admObatNamaInput').value.trim();
            const kat    = document.getElementById('admObatKategoriInput').value;
            const stok   = parseInt(document.getElementById('admObatStokInput').value, 10) || 0;
            const satuan = document.getElementById('admObatSatuanInput').value.trim() || 'Strip';

            if (!nama) return;
            if (window.SehatinXamppApi) {
                const res = await window.SehatinXamppApi.saveMasterObat({
                    nama_obat: nama,
                    kategori: kat,
                    stok: stok,
                    satuan: satuan
                });
                if (res && res.status === 'success') {
                    adminMasterObatForm.reset();
                    await syncFromXamppDatabase();
                    populateAdminAndDoctorDropdowns();
                    showModal('Master Obat Ditambahkan', nama + ' berhasil disimpan ke database Master Obat.');
                }
            }
        });
    }

    // Handler Form Upload Hasil Lab oleh Admin (`#adminUploadLabDatabaseForm`)
    const adminUploadLabDatabaseForm = document.getElementById('adminUploadLabDatabaseForm');
    if (adminUploadLabDatabaseForm) {
        adminUploadLabDatabaseForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            const pasienId = parseInt(document.getElementById('admLabPasienSelect').value, 10) || 0;
            const dokterId = parseInt(document.getElementById('admLabDokterSelect').value, 10) || 0;
            const jenis    = document.getElementById('admLabJenisInput').value.trim();
            const tanggal  = document.getElementById('admLabTanggalInput').value;
            const hasil    = document.getElementById('admLabRingkasanInput').value.trim();

            if (!pasienId || !jenis || !hasil) return;
            if (window.SehatinXamppApi) {
                const res = await window.SehatinXamppApi.addLabResult({
                    pasien_id: pasienId,
                    dokter_pengirim_id: dokterId > 0 ? dokterId : null,
                    jenis_pemeriksaan: jenis,
                    tanggal_periksa: tanggal,
                    hasil_ringkasan: hasil,
                    status_lab: 'selesai'
                });
                if (res && res.status === 'success') {
                    adminUploadLabDatabaseForm.reset();
                    await syncFromXamppDatabase();
                    populateAdminAndDoctorDropdowns();
                    showModal('Hasil Lab Terkirim', 'Hasil pemeriksaan ' + jenis + ' berhasil dikirim ke akun Pasien.');
                }
            }
        });
    }

    // Sinkronisasi Pilihan Obat pada Form Resep Dokter (`#docResepObatSelect`)
    const docResepObatSelectEl = document.getElementById('docResepObatSelect');
    if (docResepObatSelectEl) {
        docResepObatSelectEl.addEventListener('change', function () {
            const selectedOpt = docResepObatSelectEl.options[docResepObatSelectEl.selectedIndex];
            const medNameInput = document.getElementById('docResepMedName');
            if (medNameInput && selectedOpt) {
                medNameInput.value = selectedOpt.getAttribute('data-nama-obat') || '';
            }
        });
    }

    // Override submit form resep Dokter agar menyimpan obat_id, pasien_id, dosis, catatan, dan diagnosis ke database
    if (docIssuePrescriptionForm) {
        docIssuePrescriptionForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            const pasienId  = parseInt((document.getElementById('docResepPasienSelect') || {}).value, 10) || 0;
            const obatId    = parseInt((document.getElementById('docResepObatSelect') || {}).value, 10) || 0;
            const diagnosis = ((document.getElementById('docResepDiagnosisInput') || {}).value || '').trim();
            const dosis     = ((document.getElementById('docResepUsageRule') || {}).value || '').trim();
            const catatan   = ((document.getElementById('docResepCatatanInput') || {}).value || '').trim();

            if (!pasienId || !obatId || !dosis) {
                showModal('Data Resep Belum Lengkap', 'Pastikan Anda telah memilih Pasien, memilih Obat dari Master Obat Admin, dan mengisi Dosis.');
                return;
            }

            if (window.SehatinXamppApi) {
                const res = await window.SehatinXamppApi.addPrescription({
                    konsultasi_id: activeKonsultasiId || null,
                    pasien_id: pasienId,
                    obat_id: obatId,
                    dosis: dosis,
                    catatan_dokter: catatan,
                    diagnosis_dokter: diagnosis
                });
                if (!res || res.status !== 'success') {
                    showModal('Gagal Mengirim Resep', (res && res.message) ? res.message : 'Terjadi kesalahan.');
                    return;
                }
                docIssuePrescriptionForm.reset();
                await syncFromXamppDatabase();
                populateAdminAndDoctorDropdowns();
                showModal('Resep & Diagnosis Terkirim', 'Resep obat dan diagnosis dokter telah langsung tampil di halaman Resep Obat dan Diagnosis pada akun Pasien.');
            }
        }, true);
    }

    // Override submit form jadwal praktik Dokter (`#docQuickScheduleForm`) agar tersimpan ke `jadwal_dokter`
    if (docQuickScheduleForm) {
        docQuickScheduleForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            const hari       = document.getElementById('docSchedPatientNoteInput').value || 'Senin';
            const jamMulai   = document.getElementById('docSchedDateInput').value || '08:00';
            const jamSelesai = document.getElementById('docSchedTimeInput').value || '15:00';
            const kuota      = parseInt((document.getElementById('docSchedKuotaInput') || {}).value, 10) || 10;

            if (window.SehatinXamppApi) {
                await window.SehatinXamppApi.addSchedule({
                    hari: hari,
                    jam_mulai: jamMulai,
                    jam_selesai: jamSelesai,
                    kuota: kuota,
                    status_tersedia: 1
                });
                docQuickScheduleForm.classList.add('hidden');
                await syncFromXamppDatabase();
                populateAdminAndDoctorDropdowns();
                showModal('Jadwal Praktik Disimpan', 'Jadwal praktik ' + hari + ' (' + jamMulai + ' - ' + jamSelesai + ') telah aktif dan tampil di akun seluruh Pasien.');
            }
        }, true);
    }

    renderDoctorRoleDashboard();
    renderAdminRoleDashboard();

    // Inisialisasi otomatis dari Session PHP (`window.SEHATIN_SESSION`) & Database MySQL saat halaman dibuka
    if (window.SEHATIN_SESSION && window.SEHATIN_SESSION.authenticated) {
        const s = window.SEHATIN_SESSION;
        applyLoggedInUserToUI({
            id: s.user_id,
            role: s.ui_role || (s.role === 'pasien' ? 'user' : s.role),
            rmNumber: '-',
            fullName: s.nama || 'Pengguna Sehatin',
            identifier: s.email || ''
        }, s.email || '');
        loginView.classList.add('hidden');
        dashboardView.classList.remove('hidden');
        switchDashboardSubView('main');
    }
    syncFromXamppDatabase();

})();
