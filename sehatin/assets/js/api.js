/**
 * FILE: assets/js/api.js
 * Modul Koneksi Front-End Sehatin ke Back-End PHP & MySQL (XAMPP)
 * Terhubung Penuh ke Seluruh Endpoint `api/*.php` Tanpa Data Dummy (Tahap 3 & Tahap 6)
 */
window.SehatinXamppApi = (function () {
    let xamppConnected = false;

    async function request(endpoint, payload = null, methodOverride = null) {
        try {
            const method = methodOverride || (payload ? 'POST' : 'GET');
            const opts = {
                method: method,
                credentials: 'same-origin'
            };
            if (payload && method !== 'GET') {
                opts.headers = {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                };
                opts.body = JSON.stringify(payload);
            } else {
                opts.headers = {
                    'X-Requested-With': 'XMLHttpRequest'
                };
            }

            const res = await fetch(endpoint, opts);
            const text = await res.text();
            let data = null;
            try {
                data = JSON.parse(text);
            } catch (parseErr) {
                return null;
            }
            xamppConnected = true;
            return data;
        } catch (err) {
            return null;
        }
    }

    return {
        isConnected: function () {
            return xamppConnected;
        },

        // 1. OTENTIKASI & SESSION (`api/auth.php`)
        register: function (regData) {
            return request('api/auth.php?action=register', Object.assign({ action: 'register' }, regData));
        },
        login: function (identifier, password) {
            return request('api/auth.php?action=login', {
                action: 'login',
                email: identifier,
                identifier: identifier,
                password: password
            });
        },
        createDokter: function (docData) {
            return request('api/auth.php?action=create_dokter', Object.assign({ action: 'create_dokter' }, docData));
        },
        logout: function () {
            return request('api/auth.php?action=logout', { action: 'logout' });
        },
        fetchAllData: function () {
            return request('api/auth.php?action=status');
        },

        // 2. PROFIL DIRI & REKAM MEDIS (`api/profil_medis.php`)
        getMedicalProfile: function (pasienId) {
            const q = pasienId ? ('&pasien_id=' + encodeURIComponent(pasienId)) : '';
            return request('api/profil_medis.php?action=get' + q);
        },
        updateProfileAndMedical: function (data) {
            return request('api/profil_medis.php?action=update_profile', Object.assign({ action: 'update_profile' }, data));
        },
        updateAvatar: function (iconClass, imgBase64) {
            return request('api/profil_medis.php?action=update_avatar', {
                action: 'update_avatar',
                avatar_icon: iconClass,
                avatar_img: imgBase64
            });
        },
        switchProfile: function (fullName) {
            return request('api/profil_medis.php?action=update_profile', {
                action: 'update_profile',
                nama_lengkap: fullName,
                full_name: fullName
            });
        },

        // 3. KEAMANAN AKUN & MANAJEMEN AKUN DOKTER (`api/keamanan.php`)
        changePassword: function (newPassword) {
            return request('api/keamanan.php?action=change_password', {
                action: 'change_password',
                new_password: newPassword
            });
        },
        setMedicalPin: function (pin) {
            return request('api/keamanan.php?action=set_pin', {
                action: 'set_pin',
                medical_pin: pin
            });
        },
        toggle2FA: function (enabled, method) {
            return request('api/keamanan.php?action=toggle_2fa', {
                action: 'toggle_2fa',
                enabled: enabled,
                method: method
            });
        },
        getUsersAndDoctors: function () {
            return request('api/keamanan.php?action=list_dokter');
        },
        toggleUserStatus: function (userId, statusAktif) {
            return request('api/keamanan.php?action=toggle_status_dokter', {
                action: 'toggle_status_dokter',
                user_id: userId,
                status_aktif: statusAktif
            });
        },

        // 5. JADWAL PRAKTIK DOKTER (`api/jadwal.php`)
        getSchedules: function (dokterId, onlyMine) {
            let url = 'api/jadwal.php?action=list';
            if (dokterId) url += '&dokter_id=' + encodeURIComponent(dokterId);
            if (onlyMine) url += '&mine=1';
            return request(url);
        },
        addSchedule: function (jadwalObj) {
            return request('api/jadwal.php?action=create', Object.assign({ action: 'create' }, jadwalObj));
        },
        updateSchedule: function (jadwalObj) {
            return request('api/jadwal.php?action=update', Object.assign({ action: 'update' }, jadwalObj));
        },
        toggleScheduleStatus: function (jadwalId, statusTersedia) {
            return request('api/jadwal.php?action=toggle_status', {
                action: 'toggle_status',
                id: jadwalId,
                status_tersedia: statusTersedia
            });
        },
        deleteSchedule: function (jadwalId) {
            return request('api/jadwal.php?action=delete', { action: 'delete', id: jadwalId });
        },

        // 6. KONSULTASI & ANTREAN PASIEN (`api/konsultasi.php`)
        getConsultations: function (statusFilter) {
            let url = 'api/konsultasi.php?action=list';
            if (statusFilter) url += '&status=' + encodeURIComponent(statusFilter);
            return request(url);
        },
        addConsultSchedule: function (schedObj) {
            return request('api/konsultasi.php?action=booking', Object.assign({ action: 'booking' }, schedObj));
        },
        deleteConsultSchedule: function (schedId) {
            return request('api/konsultasi.php?action=batal', { action: 'batal', id: schedId });
        },
        addConsultHistory: function (histObj) {
            return request('api/konsultasi.php?action=add_history', Object.assign({ action: 'add_history' }, histObj));
        },
        updateConsultationDiagnosis: function (konsultasiId, diagnosisDokter, status) {
            return request('api/konsultasi.php?action=update_diagnosis', {
                action: 'update_diagnosis',
                konsultasi_id: konsultasiId,
                diagnosis_dokter: diagnosisDokter,
                status: status || 'selesai'
            });
        },
        deleteConsultHistory: function (histId) {
            return request('api/konsultasi.php?action=batal', { action: 'batal', id: histId });
        },
        addConsultDoctor: function (docObj) {
            return request('api/keamanan.php?action=create_dokter', Object.assign({ action: 'create_dokter' }, docObj));
        },
        deleteConsultDoctor: function (docId) {
            return request('api/keamanan.php?action=toggle_status_dokter', {
                action: 'toggle_status_dokter',
                user_id: docId,
                status_aktif: 0
            });
        },

        // 7. RUANG CHAT REAL-TIME / POLLING AJAX (`api/chat.php`)
        getChatMessages: function (konsultasiId, afterId, partnerId) {
            let url = 'api/chat.php?action=poll';
            if (konsultasiId) url += '&konsultasi_id=' + encodeURIComponent(konsultasiId);
            if (afterId) url += '&after_id=' + encodeURIComponent(afterId);
            if (partnerId) url += '&partner_id=' + encodeURIComponent(partnerId);
            return request(url);
        },
        sendChatMessage: function (msgObj) {
            return request('api/chat.php?action=send', Object.assign({ action: 'send' }, msgObj));
        },
        clearChat: function (konsultasiId) {
            return request('api/chat.php?action=clear', {
                action: 'clear',
                konsultasi_id: konsultasiId || 0
            });
        },

        // 8. RESEP OBAT & MASTER OBAT (`api/resep.php`)
        getPrescriptions: function (pasienId) {
            let url = 'api/resep.php?action=list';
            if (pasienId) url += '&pasien_id=' + encodeURIComponent(pasienId);
            return request(url);
        },
        getMasterObat: function () {
            return request('api/resep.php?action=master_obat');
        },
        saveMasterObat: function (obatObj) {
            return request('api/resep.php?action=save_obat', Object.assign({ action: 'save_obat' }, obatObj));
        },
        deleteMasterObat: function (obatId) {
            return request('api/resep.php?action=delete_obat', { action: 'delete_obat', id: obatId });
        },
        addPrescription: function (resepObj) {
            return request('api/resep.php?action=create', Object.assign({ action: 'create' }, resepObj));
        },

        // 9. HASIL LABORATORIUM (`api/lab.php`)
        getLabResults: function (pasienId) {
            let url = 'api/lab.php?action=list';
            if (pasienId) url += '&pasien_id=' + encodeURIComponent(pasienId);
            return request(url);
        },
        addLabResult: function (labObj) {
            return request('api/lab.php?action=create', Object.assign({ action: 'create' }, labObj));
        },
        updateLabResult: function (labObj) {
            return request('api/lab.php?action=update', Object.assign({ action: 'update' }, labObj));
        },
        deleteLabResult: function (labId) {
            return request('api/lab.php?action=delete', { action: 'delete', id: labId });
        }
    };
})();
