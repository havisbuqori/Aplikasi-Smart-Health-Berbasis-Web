<!-- SUB-VIEW C: BAGIAN KONSULTASI (DAFTAR DOKTER AKTIF PEKANBARU, JADWAL KONSULTASI, RUANG KONSULTASI/CHAT DOKTER, RIWAYAT KONSULTASI) -->
                <!-- ===================================================== -->
                <div id="doctorChatSubView" class="hidden max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8 mt-5 space-y-4 animate-fade-in">

                    <!-- Header Utama Bagian Konsultasi & Navigasi 4 Fitur Konsultasi -->
                    <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200 space-y-3.5">
                        <div class="flex flex-wrap items-center justify-between gap-3">
                            <div class="flex items-center space-x-3">
                                <button
                                    type="button"
                                    class="back-to-dashboard-btn px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-gray-700 text-xs font-semibold flex items-center space-x-1.5 transition-colors focus:outline-none"
                                >
                                    <i class="fas fa-arrow-left"></i>
                                    <span>Kembali ke Beranda</span>
                                </button>
                                <div>
                                    <div class="flex items-center space-x-2">
                                        <h2 class="text-sm sm:text-base font-bold text-gray-800">Layanan Konsultasi Dokter Aktif Pekanbaru</h2>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-teal-50 text-teal-600 border border-teal-200">
                                            Data Dokter RS Pekanbaru
                                        </span>
                                    </div>
                                    <p class="text-[11px] text-gray-400">Direktori dokter spesialis aktif di rumah sakit Kota Pekanbaru (RS Awal Bros, Eka Hospital, RSUD Arifin Achmad, RS Santa Maria, RS Syafira, RS Hermina)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Bar Tab 4 Fitur Bagian Konsultasi -->
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 pt-1 border-t border-slate-200">
                            <button
                                type="button"
                                id="tabKonsulDaftarBtn"
                                data-konsul-tab="daftar"
                                class="konsul-tab-btn flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold bg-teal-600 text-white shadow-sm transition-all focus:outline-none"
                            >
                                <span class="flex items-center space-x-2">
                                    <i class="fas fa-user-md"></i>
                                    <span>Daftar Dokter</span>
                                </span>
                                <span id="badgeKonsulDaftarCount" class="px-1.5 py-0.5 text-[10px] rounded-full bg-white/20 text-white font-bold">0</span>
                            </button>

                            <button
                                type="button"
                                id="tabKonsulJadwalBtn"
                                data-konsul-tab="jadwal"
                                class="konsul-tab-btn flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold bg-slate-50 text-gray-600 hover:bg-teal-50 hover:text-teal-600 border border-gray-200/80 transition-all focus:outline-none"
                            >
                                <span class="flex items-center space-x-2">
                                    <i class="fas fa-calendar-check"></i>
                                    <span>Jadwal Konsultasi</span>
                                </span>
                                <span id="badgeKonsulJadwalCount" class="px-1.5 py-0.5 text-[10px] rounded-full bg-teal-50 text-teal-700 font-bold">0</span>
                            </button>

                            <button
                                type="button"
                                id="tabKonsulRuangBtn"
                                data-konsul-tab="ruang"
                                class="konsul-tab-btn flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold bg-slate-50 text-gray-600 hover:bg-teal-50 hover:text-teal-600 border border-gray-200/80 transition-all focus:outline-none"
                            >
                                <span class="flex items-center space-x-2">
                                    <i class="fas fa-comments"></i>
                                    <span>Ruang Konsultasi</span>
                                </span>
                                <span id="badgeKonsulRuangStatus" class="px-1.5 py-0.5 text-[9px] rounded-full bg-slate-200 text-slate-700 font-bold">Kosong</span>
                            </button>

                            <button
                                type="button"
                                id="tabKonsulRiwayatBtn"
                                data-konsul-tab="riwayat"
                                class="konsul-tab-btn flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold bg-slate-50 text-gray-600 hover:bg-teal-50 hover:text-teal-600 border border-gray-200/80 transition-all focus:outline-none"
                            >
                                <span class="flex items-center space-x-2">
                                    <i class="fas fa-history"></i>
                                    <span>Riwayat Konsultasi</span>
                                </span>
                                <span id="badgeKonsulRiwayatCount" class="px-1.5 py-0.5 text-[10px] rounded-full bg-teal-50 text-teal-700 font-bold">0</span>
                            </button>
                        </div>
                    </div>

                    <!-- ===================================================== -->
                    <!-- FITUR 1: DAFTAR DOKTER AKTIF PEKANBARU                -->
                    <!-- ===================================================== -->
                    <div id="konsulDaftarPanel" class="space-y-4">
                        <!-- Filter, Pencarian, & Tombol Tambah Dokter -->
                        <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200 flex flex-col lg:flex-row lg:items-center justify-between gap-3">
                            <div class="flex flex-1 flex-col sm:flex-row gap-2.5">
                                <div class="relative flex-1">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400 text-xs">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input
                                        type="text"
                                        id="searchKonsulDoctorInput"
                                        placeholder="Cari nama dokter Pekanbaru, gelar spesialis, atau rumah sakit..."
                                        class="w-full pl-8 pr-3 py-2 text-xs bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 focus:bg-white"
                                    >
                                </div>
                                <select
                                    id="filterKonsulSpecSelect"
                                    class="px-3 py-2 text-xs bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 text-gray-700"
                                >
                                    <option value="ALL">Semua Spesialis</option>
                                    <option value="Spesialis Penyakit Dalam">Spesialis Penyakit Dalam (Sp.PD)</option>
                                    <option value="Spesialis Jantung">Spesialis Jantung & Pembuluh Darah (Sp.JP)</option>
                                    <option value="Spesialis Anak">Spesialis Anak (Sp.A)</option>
                                    <option value="Spesialis Kandungan">Spesialis Kandungan & Kebidanan (Sp.OG)</option>
                                    <option value="Spesialis Saraf">Spesialis Saraf / Neurologi (Sp.N / Sp.S)</option>
                                    <option value="Spesialis Paru">Spesialis Paru & Pernapasan (Sp.P)</option>
                                    <option value="Spesialis Kulit">Spesialis Kulit & Kelamin (Sp.DVE / Sp.KK)</option>
                                </select>
                                <select
                                    id="filterKonsulHospitalSelect"
                                    class="px-3 py-2 text-xs bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 text-gray-700"
                                >
                                    <option value="ALL">Semua Rumah Sakit Pekanbaru</option>
                                    <option value="Eka Hospital Pekanbaru">Eka Hospital Pekanbaru</option>
                                    <option value="RS Awal Bros">RS Awal Bros Pekanbaru (Sudirman / A. Yani)</option>
                                    <option value="RSUD Arifin Achmad">RSUD Arifin Achmad Provinsi Riau</option>
                                    <option value="RS Santa Maria Pekanbaru">RS Santa Maria Pekanbaru</option>
                                    <option value="RS Syafira Pekanbaru">RS Syafira Pekanbaru</option>
                                    <option value="RS Hermina Pekanbaru">RS Hermina Pekanbaru</option>
                                    <option value="RS Aulia Hospital">RS Aulia Hospital Pekanbaru</option>
                                </select>
                            </div>
                            <button
                                type="button"
                                id="toggleAddKonsulDoctorBtn"
                                class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold px-3.5 py-2 rounded-xl shadow-sm flex items-center justify-center space-x-1.5 transition-colors focus:outline-none shrink-0"
                            >
                                <i class="fas fa-user-plus"></i>
                                <span>Tambah Dokter</span>
                            </button>
                        </div>

                        <!-- Form Tambah Dokter Baru (Collapsible) -->
                        <form id="addKonsulDoctorForm" class="hidden bg-white rounded-2xl shadow-sm p-4 border border-teal-100 space-y-3">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xs font-bold text-teal-700 uppercase tracking-wider">Tambah Data Dokter Praktik Pekanbaru</h3>
                                <span class="text-[10px] text-gray-400">Tersimpan di Daftar Dokter</span>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <input type="text" id="newDocNameInput" placeholder="Nama Dokter & Gelar (cth: dr. Rina, Sp.A)" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                                <input type="text" id="newDocSpecInput" placeholder="Spesialis (cth: Spesialis Anak)" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                                <input type="text" id="newDocHospInput" placeholder="Rumah Sakit di Pekanbaru (cth: RS Awal Bros Pekanbaru)" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <input type="text" id="newDocHoursInput" placeholder="Jam Praktik (cth: Senin-Jumat 09:00-15:00 WIB)" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" value="Senin - Sabtu 09:00 - 16:00 WIB">
                                <input type="text" id="newDocExpInput" placeholder="STR / Status Praktik" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" value="Dokter Spesialis Aktif">
                                <select id="newDocStatusInput" class="px-3 py-2 text-xs border border-gray-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600">
                                    <option value="Aktif Praktik">Status: Aktif Praktik</option>
                                    <option value="Tersedia Terjadwal">Status: Tersedia Terjadwal</option>
                                </select>
                            </div>
                            <div class="flex justify-end space-x-2">
                                <button type="button" id="cancelAddKonsulDoctorBtn" class="px-3.5 py-2 border border-gray-200 text-gray-600 text-xs font-semibold rounded-xl hover:bg-gray-50">Batal</button>
                                <button type="submit" class="px-4 py-2 bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold rounded-xl shadow-sm">Simpan ke Daftar Dokter</button>
                            </div>
                        </form>

                        <!-- Grid Daftar Dokter -->
                        <div id="konsulDoctorListContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"></div>
                    </div>

                    <!-- ===================================================== -->
                    <!-- FITUR 2: JADWAL KONSULTASI                            -->
                    <!-- ===================================================== -->
                    <div id="konsulJadwalPanel" class="hidden space-y-4">
                        <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200 flex flex-wrap items-center justify-between gap-3">
                            <div>
                                <h3 class="text-sm sm:text-base font-bold text-gray-800">Jadwal Konsultasi Dokter</h3>
                                <p class="text-[11px] text-gray-400">Kelola jadwal sesi konsultasi daring (chat/video) maupun tatap muka di Rumah Sakit Pekanbaru</p>
                            </div>
                            <button
                                type="button"
                                id="toggleKonsulScheduleFormBtn"
                                class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold px-3.5 py-2 rounded-xl shadow-sm flex items-center space-x-1.5 transition-colors focus:outline-none"
                            >
                                <i class="fas fa-calendar-plus"></i>
                                <span>Buat Jadwal Konsultasi</span>
                            </button>
                        </div>

                        <!-- Form Buat Jadwal Konsultasi -->
                        <form id="konsulScheduleForm" class="hidden bg-white rounded-2xl shadow-sm p-4 border border-slate-200 space-y-3">
                            <h4 class="text-xs font-bold text-teal-700 uppercase tracking-wider">Formulir Penjadwalan Konsultasi Baru</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                                <div>
                                    <label for="konsulScheduleDoctorSelect" class="block text-[11px] font-medium text-gray-600 mb-1">Pilih / Ketik Nama Dokter</label>
                                    <input
                                        type="text"
                                        id="konsulScheduleDoctorSelect"
                                        list="konsulDoctorDatalist"
                                        placeholder="Pilih dokter RS Pekanbaru"
                                        class="w-full px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600"
                                        required
                                    >
                                    <datalist id="konsulDoctorDatalist"></datalist>
                                </div>
                                <div>
                                    <label for="konsulScheduleDateInput" class="block text-[11px] font-medium text-gray-600 mb-1">Tanggal Konsultasi</label>
                                    <input
                                        type="date"
                                        id="konsulScheduleDateInput"
                                        class="w-full px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600"
                                        required
                                    >
                                </div>
                                <div>
                                    <label for="konsulScheduleTimeInput" class="block text-[11px] font-medium text-gray-600 mb-1">Jam Konsultasi</label>
                                    <input
                                        type="time"
                                        id="konsulScheduleTimeInput"
                                        class="w-full px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600"
                                        required
                                    >
                                </div>
                                <div>
                                    <label for="konsulScheduleTypeInput" class="block text-[11px] font-medium text-gray-600 mb-1">Metode Konsultasi</label>
                                    <select
                                        id="konsulScheduleTypeInput"
                                        class="w-full px-3 py-2 text-xs border border-gray-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600"
                                    >
                                        <option value="Chat Dokter (Ruang Konsultasi)">Chat Dokter (Ruang Konsultasi)</option>
                                        <option value="Video Call Medis">Video Call Medis</option>
                                        <option value="Tatap Muka Poliklinik RS Pekanbaru">Tatap Muka Poliklinik RS Pekanbaru</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="konsulScheduleNotesInput" class="block text-[11px] font-medium text-gray-600 mb-1">Keluhan Singkat / Catatan Konsultasi</label>
                                <input
                                    type="text"
                                    id="konsulScheduleNotesInput"
                                    placeholder="Contoh: Demam 2 hari disertai batuk kering, ingin konsultasi pemeriksaan"
                                    class="w-full px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600"
                                >
                            </div>
                            <div class="flex justify-end space-x-2">
                                <button type="button" id="cancelKonsulScheduleBtn" class="px-3.5 py-2 border border-gray-200 text-gray-600 text-xs font-semibold rounded-xl hover:bg-gray-50">Batal</button>
                                <button type="submit" class="px-4 py-2 bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold rounded-xl shadow-sm">Simpan Jadwal Konsultasi</button>
                            </div>
                        </form>

                        <!-- Daftar Jadwal Konsultasi Aktif -->
                        <div class="bg-white rounded-2xl shadow-sm p-5 border border-slate-200">
                            <div id="konsulScheduleListContainer" class="space-y-3">
                                <div id="emptyKonsulScheduleState" class="py-10 text-center text-gray-400">
                                    <div class="w-14 h-14 rounded-full bg-teal-50 text-teal-600 flex items-center justify-center mx-auto mb-3 text-2xl">
                                        <i class="far fa-calendar-check"></i>
                                    </div>
                                    <p class="text-xs sm:text-sm font-semibold text-gray-600">Belum Ada Jadwal Konsultasi</p>
                                    <p class="text-[11px] text-gray-400 mt-1 max-w-sm mx-auto">
                                        Pilih dokter dari tab <strong>Daftar Dokter</strong> atau klik tombol <strong>Buat Jadwal Konsultasi</strong> di atas untuk menjadwalkan sesi konsultasi baru.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===================================================== -->
                    <!-- FITUR 3: RUANG KONSULTASI (KOSONG JIKA TIDAK ADA SESI) -->
                    <!-- ===================================================== -->
                    <div id="konsulRuangPanel" class="hidden space-y-3">
                        <!-- STATE KOSONG: Tampil saat belum ada sesi konsultasi yang dimulai (Tanpa Data Dummy) -->
                        <div id="emptyActiveConsultationBanner" class="bg-white rounded-2xl shadow-sm p-8 border border-slate-200 text-center space-y-3">
                            <div class="w-16 h-16 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto text-2xl">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div class="max-w-md mx-auto">
                                <h3 class="text-sm sm:text-base font-bold text-slate-800">Belum Ada Sesi Konsultasi Aktif</h3>
                                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                                    Ruang konsultasi saat ini kosong karena belum ada sesi konsultasi yang sedang berlangsung. Silakan pilih dokter pada tab <strong>Daftar Dokter</strong> atau <strong>Jadwal Konsultasi</strong> untuk memulai percakapan.
                                </p>
                            </div>
                            <div class="pt-2 flex flex-wrap items-center justify-center gap-2.5">
                                <button
                                    type="button"
                                    id="goSelectDoctorForChatBtn"
                                    class="px-4 py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold shadow-sm flex items-center space-x-1.5 transition-colors focus:outline-none"
                                >
                                    <i class="fas fa-user-md"></i>
                                    <span>Pilih Dokter di Daftar Dokter Pekanbaru</span>
                                </button>
                                <button
                                    type="button"
                                    id="goScheduleFromEmptyRoomBtn"
                                    class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold flex items-center space-x-1.5 transition-colors focus:outline-none"
                                >
                                    <i class="fas fa-calendar-check text-teal-600"></i>
                                    <span>Lihat Jadwal Konsultasi</span>
                                </button>
                            </div>
                        </div>

                        <!-- WRAPPER RUANG KONSULTASI AKTIF (Hanya tampil setelah pengguna memulai konsultasi dengan dokter) -->
                        <div id="activeConsultationRoomWrap" class="hidden space-y-3">
                            <!-- Bar Pilihan Dokter Konsultan Aktif & Simpan ke Riwayat -->
                            <div class="bg-white rounded-2xl shadow-sm p-3.5 border border-teal-100 flex flex-wrap items-center justify-between gap-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-lg shrink-0">
                                        <i class="fas fa-user-md"></i>
                                    </div>
                                    <div>
                                        <div class="flex items-center space-x-2">
                                            <span class="text-[10px] font-bold uppercase tracking-wider text-teal-600">Dokter Ruang Konsultasi:</span>
                                            <span id="activeConsultDoctorSpecBadge" class="text-[10px] bg-teal-50 text-teal-700 border border-teal-200 px-2 py-0.5 rounded-full font-medium">Belum Dipilih</span>
                                        </div>
                                        <div class="flex flex-wrap items-center gap-2 mt-1">
                                            <select
                                                id="selectActiveConsultDoctor"
                                                class="text-xs sm:text-sm font-bold text-gray-800 bg-gray-50 border border-gray-200 rounded-lg px-2.5 py-1 focus:outline-none focus:ring-2 focus:ring-teal-600"
                                            ></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-center gap-2">
                                    <button
                                        type="button"
                                        id="openSaveChatToHistoryBtn"
                                        class="px-3.5 py-2 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold shadow-sm flex items-center space-x-1.5 transition-colors focus:outline-none"
                                    >
                                        <i class="fas fa-check-double"></i>
                                        <span>Selesai & Simpan ke Riwayat</span>
                                    </button>
                                    <button
                                        type="button"
                                        id="endActiveConsultSessionBtn"
                                        class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-red-50 text-slate-600 hover:text-red-600 text-xs font-semibold flex items-center space-x-1 transition-colors focus:outline-none"
                                        title="Tutup & kosongkan sesi ruang konsultasi"
                                    >
                                        <i class="fas fa-door-closed"></i>
                                        <span>Tutup Sesi</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Form Ringkas Simpan Sesi Chat ke Riwayat Konsultasi (Collapsible) -->
                            <form id="saveChatToHistoryForm" class="hidden bg-white rounded-2xl shadow-sm p-4 border border-slate-200 space-y-3">
                                <div class="flex items-center justify-between">
                                    <h4 class="text-xs font-bold text-teal-700 uppercase tracking-wider">
                                        <i class="fas fa-file-medical-alt mr-1.5"></i>Simpan Hasil Sesi ke Riwayat Konsultasi
                                    </h4>
                                    <span class="text-[10px] text-gray-400">Transkrip chat akan ikut tersimpan</span>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                    <input type="text" id="chatHistComplaintInput" placeholder="Keluhan Utama Pasien" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                                    <input type="text" id="chatHistDiagnosisInput" placeholder="Catatan / Diagnosis / Saran Dokter" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                                    <input type="text" id="chatHistActionInput" placeholder="Resep / Tindakan Lanjutan (Opsional)" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600">
                                </div>
                                <div class="flex justify-end space-x-2">
                                    <button type="button" id="cancelSaveChatToHistoryBtn" class="px-3 py-1.5 border border-gray-200 text-gray-600 text-xs font-semibold rounded-xl hover:bg-gray-50">Batal</button>
                                    <button type="submit" class="px-4 py-1.5 bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold rounded-xl shadow-sm">Simpan ke Riwayat Konsultasi</button>
                                </div>
                            </form>

                            <!-- KODE RUANG CHAT DOKTER & PASIEN -->
                            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden flex flex-col h-[70vh] min-h-[450px]">

                                <!-- Header Ruang Chat -->
                                <div class="p-4 border-b border-slate-200 bg-slate-50 flex flex-wrap items-center justify-between gap-3">
                                    <div class="flex items-center space-x-3">
                                        <button
                                            type="button"
                                            id="backFromChatBtn"
                                            class="px-3 py-1.5 rounded-xl bg-white border border-gray-200 hover:bg-gray-100 text-gray-700 text-xs font-semibold flex items-center space-x-1.5 transition-colors focus:outline-none"
                                        >
                                            <i class="fas fa-arrow-left"></i>
                                            <span>Kembali</span>
                                        </button>
                                        <div>
                                            <div class="flex items-center space-x-2">
                                                <h2 class="text-sm sm:text-base font-bold text-gray-800">Ruang Chat Dokter & Pasien</h2>
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-emerald-50 text-emerald-600 border border-emerald-200">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1"></span> Sesi Aktif
                                                </span>
                                            </div>
                                            <p class="text-[11px] text-gray-400">Komunikasi dua arah secara langsung tanpa data dummy</p>
                                        </div>
                                    </div>

                                    <!-- Status Peran Pengirim Terkunci Sesuai Akun Login -->
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span id="lockedChatRoleStatusBadge" class="inline-flex items-center px-3 py-1.5 rounded-xl bg-teal-50 text-teal-700 border border-teal-200 text-xs font-semibold">
                                            <i class="fas fa-lock mr-1.5 text-[10px]"></i>Mode Pasien (Terkunci)
                                        </span>
                                        <div id="legacyChatRoleSwitchWrap" class="hidden">
                                            <button type="button" id="rolePatientBtn">Sebagai Pasien</button>
                                            <button type="button" id="roleDoctorBtn">Sebagai Dokter</button>
                                        </div>

                                        <button
                                            type="button"
                                            id="clearChatBtn"
                                            class="px-2.5 py-1.5 rounded-xl text-xs text-red-500 hover:bg-red-50 border border-transparent hover:border-red-100 transition-colors focus:outline-none"
                                            title="Bersihkan seluruh percakapan"
                                        >
                                            <i class="fas fa-trash-alt mr-1"></i>Bersihkan
                                        </button>
                                    </div>
                                </div>

                                <!-- Bar Input Nama Dokter -->
                                <div id="doctorNameInputBar" class="hidden px-4 py-2 bg-teal-50/70 border-b border-teal-100 flex items-center justify-between gap-2 text-xs">
                                    <span class="text-teal-700 font-medium"><i class="fas fa-stethoscope mr-1.5"></i>Identitas Dokter Pengirim:</span>
                                    <input
                                        type="text"
                                        id="customDoctorNameInput"
                                        placeholder="Ketik nama dokter (opsional, default: Dokter)"
                                        class="flex-1 max-w-xs px-2.5 py-1 bg-white border border-teal-200 rounded-lg text-xs text-gray-800 focus:outline-none focus:ring-1 focus:ring-teal-600"
                                    >
                                </div>

                                <!-- Area Pesan Chat (Kosong Tanpa Data Dummy) -->
                                <div id="chatMessagesContainer" class="flex-1 overflow-y-auto p-4 space-y-3 bg-slate-50/50">
                                    <div id="emptyChatState" class="h-full flex flex-col items-center justify-center text-center px-4 py-10 text-gray-400">
                                        <div class="w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 text-2xl mb-3">
                                            <i class="fas fa-comments"></i>
                                        </div>
                                        <p class="text-xs sm:text-sm font-semibold text-gray-600">Belum Ada Pesan pada Sesi Ini</p>
                                        <p class="text-[11px] text-gray-400 max-w-sm mt-1 leading-relaxed">
                                            Ruang chat ini bersih tanpa data dummy. Ketik pesan keluhan Anda di bawah sebagai <strong>Pasien</strong> untuk memulai percakapan dengan dokter.
                                        </p>
                                    </div>
                                </div>

                                <!-- Form Input Kirim Pesan -->
                                <form id="doctorChatForm" class="p-3.5 bg-white border-t border-slate-200 flex items-center gap-2">
                                    <span id="activeSenderBadge" class="shrink-0 text-[11px] font-semibold px-2.5 py-1.5 rounded-lg bg-teal-50 text-teal-700 border border-teal-200">
                                        Pasien
                                    </span>
                                    <input
                                        type="text"
                                        id="chatMessageInput"
                                        placeholder="Ketik pesan konsultasi..."
                                        class="flex-1 px-3.5 py-2.5 text-xs sm:text-sm bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 focus:bg-white text-gray-800"
                                        autocomplete="off"
                                    >
                                    <button
                                        type="submit"
                                        class="px-4 py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs sm:text-sm font-semibold shadow-sm flex items-center space-x-1.5 transition-colors focus:outline-none"
                                    >
                                        <span>Kirim</span>
                                        <i class="fas fa-paper-plane text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- ===================================================== -->
                    <!-- FITUR 4: RIWAYAT KONSULTASI                           -->
                    <!-- ===================================================== -->
                    <div id="konsulRiwayatPanel" class="hidden space-y-4">
                        <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div>
                                <h3 class="text-sm sm:text-base font-bold text-gray-800">Riwayat Konsultasi Dokter</h3>
                                <p class="text-[11px] text-gray-400">Arsip rekam jejak sesi konsultasi, keluhan, catatan diagnosis dokter, dan transkrip percakapan</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400 text-xs">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input
                                        type="text"
                                        id="searchKonsulRiwayatInput"
                                        placeholder="Cari riwayat / dokter..."
                                        class="pl-8 pr-3 py-2 text-xs bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600"
                                    >
                                </div>
                                <button
                                    type="button"
                                    id="toggleAddKonsulRiwayatBtn"
                                    class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold px-3.5 py-2 rounded-xl shadow-sm flex items-center space-x-1.5 transition-colors focus:outline-none shrink-0"
                                >
                                    <i class="fas fa-plus"></i>
                                    <span>Catat Riwayat</span>
                                </button>
                            </div>
                        </div>

                        <!-- Form Tambah Catatan Riwayat Konsultasi Manual -->
                        <form id="addKonsulRiwayatForm" class="hidden bg-white rounded-2xl shadow-sm p-4 border border-slate-200 space-y-3">
                            <h4 class="text-xs font-bold text-teal-700 uppercase tracking-wider">Tambah Catatan Riwayat Konsultasi</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <input type="text" id="riwayatDocNameInput" list="konsulDoctorDatalist" placeholder="Nama Dokter & Spesialis" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                                <input type="date" id="riwayatDateInput" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                                <select id="riwayatTypeInput" class="px-3 py-2 text-xs border border-gray-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600">
                                    <option value="Chat Dokter">Metode: Chat Dokter</option>
                                    <option value="Video Call Medis">Metode: Video Call Medis</option>
                                    <option value="Tatap Muka Klinik/RS">Metode: Tatap Muka Klinik/RS</option>
                                </select>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <input type="text" id="riwayatComplaintInput" placeholder="Keluhan Pasien (cth: Nyeri lambung & mual)" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                                <input type="text" id="riwayatDiagnosisInput" placeholder="Hasil Diagnosis / Saran Dokter" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                                <input type="text" id="riwayatFollowupInput" placeholder="Resep / Tindakan Lanjutan" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600">
                            </div>
                            <div class="flex justify-end space-x-2">
                                <button type="button" id="cancelAddKonsulRiwayatBtn" class="px-3.5 py-2 border border-gray-200 text-gray-600 text-xs font-semibold rounded-xl hover:bg-gray-50">Batal</button>
                                <button type="submit" class="px-4 py-2 bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold rounded-xl shadow-sm">Simpan Riwayat</button>
                            </div>
                        </form>

                        <!-- Daftar Riwayat Konsultasi -->
                        <div class="bg-white rounded-2xl shadow-sm p-5 border border-slate-200">
                            <div id="konsulRiwayatListContainer" class="space-y-3">
                                <div id="emptyKonsulRiwayatState" class="py-10 text-center text-gray-400">
                                    <div class="w-14 h-14 rounded-full bg-teal-50 text-teal-600 flex items-center justify-center mx-auto mb-3 text-2xl">
                                        <i class="fas fa-history"></i>
                                    </div>
                                    <p class="text-xs sm:text-sm font-semibold text-gray-600">Belum Ada Riwayat Konsultasi</p>
                                    <p class="text-[11px] text-gray-400 mt-1 max-w-sm mx-auto">
                                        Setiap sesi konsultasi yang diselesaikan dari <strong>Jadwal Konsultasi</strong> maupun <strong>Ruang Konsultasi (Chat Dokter)</strong> akan tercatat otomatis di sini.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
