<!-- SUB-VIEW B: BAGIAN PROFIL SAYA                        -->
                <!-- (HANYA Berisi Profil / Data Diri & Data Medis Saya)   -->
                <!-- ===================================================== -->
                <div id="profilePageSubView" class="hidden max-w-5xl mx-auto w-full px-4 sm:px-6 lg:px-8 mt-5 space-y-5 animate-fade-in">
                    <!-- Header Khusus Bagian Profil Saya -->
                    <div class="bg-teal-600 rounded-2xl shadow-sm p-5 text-white flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center space-x-3.5">
                            <button
                                type="button"
                                id="backFromProfileBtn"
                                class="px-3 py-2 rounded-xl bg-white/20 hover:bg-white/30 text-white text-xs font-semibold flex items-center space-x-1.5 transition-colors focus:outline-none"
                            >
                                <i class="fas fa-arrow-left"></i>
                                <span>Kembali ke Dashboard</span>
                            </button>
                            <div>
                                <h2 class="text-base sm:text-lg font-bold">Profil & Data Medis Saya</h2>
                                <p class="text-xs text-teal-50">Data diri pasien dan ringkasan profil medis pribadi</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button
                                type="button"
                                id="profilePageSwitchAvatarBtn"
                                class="bg-white/20 hover:bg-white/30 text-white font-semibold text-xs px-3.5 py-2.5 rounded-xl flex items-center space-x-1.5 transition-colors focus:outline-none"
                            >
                                <i class="fas fa-camera"></i>
                                <span>Ganti Profil / Foto</span>
                            </button>
                            <button
                                type="button"
                                id="openEditProfileBtn"
                                class="bg-white text-teal-600 hover:bg-teal-50 font-semibold text-xs px-4 py-2.5 rounded-xl shadow-sm flex items-center space-x-1.5 transition-colors focus:outline-none"
                            >
                                <i class="fas fa-user-edit"></i>
                                <span>Edit Profil & Data Medis</span>
                            </button>
                        </div>
                    </div>

                    <!-- Hanya 2 Kartu: Profil (Data Diri Pasien) & Data Medis Saya (Ringkasan Profil Medis) -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
                        <!-- 1. Profil / Data Diri Pasien -->
                        <div class="lg:col-span-5 bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="font-semibold text-gray-800 text-sm sm:text-base">Profil Data Diri Pasien</h3>
                                <span class="bg-teal-50 text-teal-700 text-[10px] font-semibold px-2.5 py-0.5 rounded-full border border-teal-200">
                                    Aktif
                                </span>
                            </div>

                            <div class="divide-y divide-gray-100 text-xs">
                                <div class="py-2.5 flex justify-between items-center">
                                    <span class="text-gray-500">Nama Lengkap</span>
                                    <span id="bioFullName" class="font-semibold text-gray-800">-</span>
                                </div>
                                <div class="py-2.5 flex justify-between items-center">
                                    <span class="text-gray-500">Nomor Rekam Medis</span>
                                    <span id="bioRmNumber" class="font-semibold text-teal-600">-</span>
                                </div>
                                <div class="py-2.5 flex justify-between items-center">
                                    <span class="text-gray-500">Tanggal Lahir / Usia</span>
                                    <span id="bioBirthDate" class="font-semibold text-gray-800">-</span>
                                </div>
                                <div class="py-2.5 flex justify-between items-center">
                                    <span class="text-gray-500">Jenis Kelamin</span>
                                    <span id="bioGender" class="font-semibold text-gray-800">-</span>
                                </div>
                                <div class="py-2.5 flex justify-between items-center">
                                    <span class="text-gray-500">Nomor Telepon</span>
                                    <span id="bioPhone" class="font-semibold text-gray-800">-</span>
                                </div>
                                <div class="py-2.5 flex justify-between items-start gap-4">
                                    <span class="text-gray-500 shrink-0">Alamat Domisili</span>
                                    <span id="bioAddress" class="font-semibold text-gray-800 text-right">-</span>
                                </div>
                                <div class="py-2.5 flex justify-between items-center">
                                    <span class="text-gray-500">Faskes Utama</span>
                                    <span id="bioFaskes" class="font-semibold text-teal-600">Sehatin Care</span>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Data Medis Saya / Ringkasan Profil Medis -->
                        <div class="lg:col-span-7 bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200">
                            <div class="flex justify-between items-center mb-3">
                                <div>
                                    <h3 class="font-semibold text-gray-800 text-sm sm:text-base">Data Medis Saya (Ringkasan Profil Medis)</h3>
                                    <p class="text-[11px] text-gray-400">Indikator biometrik dan tanda vital dasar pasien</p>
                                </div>
                                <button
                                    type="button"
                                    id="quickEditVitalBtn"
                                    class="text-xs text-teal-600 font-medium hover:underline flex items-center focus:outline-none"
                                >
                                    <i class="fas fa-pen mr-1 text-[10px]"></i> Perbarui Data
                                </button>
                            </div>

                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5">
                                <!-- Golongan Darah -->
                                <div class="bg-slate-50 border border-slate-200 rounded-xl p-3">
                                    <div class="flex items-center justify-between text-red-500 mb-1">
                                        <span class="text-[10px] font-medium text-gray-500">Gol. Darah</span>
                                        <i class="fas fa-tint text-xs"></i>
                                    </div>
                                    <p id="vitalBlood" class="text-base font-bold text-gray-800">-</p>
                                    <span class="text-[10px] text-gray-400">Klik Perbarui</span>
                                </div>

                                <!-- Tinggi Badan -->
                                <div class="bg-slate-50 border border-slate-200 rounded-xl p-3">
                                    <div class="flex items-center justify-between text-teal-600 mb-1">
                                        <span class="text-[10px] font-medium text-gray-500">Tinggi Badan</span>
                                        <i class="fas fa-ruler-vertical text-xs"></i>
                                    </div>
                                    <p class="text-base font-bold text-gray-800"><span id="vitalHeight">0</span> <span class="text-xs font-normal text-gray-500">cm</span></p>
                                    <span class="text-[10px] text-gray-400">Terukur</span>
                                </div>

                                <!-- Berat Badan -->
                                <div class="bg-slate-50 border border-slate-200 rounded-xl p-3">
                                    <div class="flex items-center justify-between text-teal-600 mb-1">
                                        <span class="text-[10px] font-medium text-gray-500">Berat Badan</span>
                                        <i class="fas fa-weight text-xs"></i>
                                    </div>
                                    <p class="text-base font-bold text-gray-800"><span id="vitalWeight">0</span> <span class="text-xs font-normal text-gray-500">kg</span></p>
                                    <span class="text-[10px] text-gray-400">Terukur</span>
                                </div>

                                <!-- IMT / BMI -->
                                <div class="bg-slate-50 border border-slate-200 rounded-xl p-3">
                                    <div class="flex items-center justify-between text-emerald-600 mb-1">
                                        <span class="text-[10px] font-medium text-gray-500">Indeks BMI</span>
                                        <i class="fas fa-chart-line text-xs"></i>
                                    </div>
                                    <p id="vitalBmi" class="text-base font-bold text-gray-800">-</p>
                                    <span id="vitalBmiStatus" class="text-[10px] font-semibold text-gray-400">Belum Diisi</span>
                                </div>
                            </div>

                            <!-- Catatan Alergi & Kondisi Khusus -->
                            <div class="mt-3.5 pt-3.5 border-t border-slate-200 grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs">
                                <div class="flex items-center justify-between bg-gray-50 rounded-lg px-3 py-2.5">
                                    <span class="text-gray-500"><i class="fas fa-allergies text-teal-600 mr-1.5"></i>Alergi Obat/Makanan:</span>
                                    <span id="vitalAllergy" class="font-semibold text-gray-700">Tidak Ada</span>
                                </div>
                                <div class="flex items-center justify-between bg-gray-50 rounded-lg px-3 py-2.5">
                                    <span class="text-gray-500"><i class="fas fa-heartbeat text-teal-600 mr-1.5"></i>Tekanan Darah:</span>
                                    <span id="vitalBp" class="font-semibold text-gray-700">-</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
