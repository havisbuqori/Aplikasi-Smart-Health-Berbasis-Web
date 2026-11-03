<!-- SUB-VIEW G: HALAMAN JADWAL DOKTER (TANPA DATA DUMMY)  -->
                <!-- ===================================================== -->
                <div id="jadwalSubView" class="hidden max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8 mt-5 space-y-4 animate-fade-in">
                    <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200 flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center space-x-3">
                            <button type="button" class="back-to-dashboard-btn px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-gray-700 text-xs font-semibold flex items-center space-x-1.5">
                                <i class="fas fa-arrow-left"></i>
                                <span>Kembali</span>
                            </button>
                            <div>
                                <h2 class="text-sm sm:text-base font-bold text-gray-800">Jadwal Janji Temu & Konsultasi Dokter</h2>
                                <p class="text-[11px] text-gray-400">Pantau jadwal konsultasi tatap muka maupun daring Anda</p>
                            </div>
                        </div>
                        <button type="button" id="toggleAddJadwalFormBtn" class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold px-3.5 py-2 rounded-xl shadow-sm flex items-center space-x-1.5">
                            <i class="fas fa-calendar-plus"></i>
                            <span>Buat Jadwal Baru</span>
                        </button>
                    </div>

                    <!-- Form Buat Jadwal Baru -->
                    <form id="addJadwalForm" class="hidden bg-white rounded-2xl shadow-sm p-4 border border-slate-200 space-y-3">
                        <h3 class="text-xs font-bold text-teal-700 uppercase tracking-wider">Buat Janji Temu Dokter</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <input type="text" id="jadwalDoctorInput" placeholder="Nama Dokter & Spesialis" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                            <input type="date" id="jadwalDateInput" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                            <input type="time" id="jadwalTimeInput" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold rounded-xl">Simpan Jadwal</button>
                        </div>
                    </form>

                    <!-- Daftar Jadwal (Kosong Tanpa Data Dummy) -->
                    <div class="bg-white rounded-2xl shadow-sm p-5 border border-slate-200">
                        <div id="jadwalListContainer" class="space-y-3">
                            <div id="emptyJadwalState" class="py-12 text-center text-gray-400">
                                <div class="w-14 h-14 rounded-full bg-teal-50 text-teal-600 flex items-center justify-center mx-auto mb-3 text-2xl">
                                    <i class="far fa-calendar-check"></i>
                                </div>
                                <p class="text-xs sm:text-sm font-semibold text-gray-600">Belum Ada Jadwal Dokter</p>
                                <p class="text-[11px] text-gray-400 mt-1 max-w-sm mx-auto">
                                    Anda belum memiliki janji temu aktif. Tekan tombol <strong>Buat Jadwal Baru</strong> di atas untuk menjadwalkan sesi konsultasi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
