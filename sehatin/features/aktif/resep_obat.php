<!-- SUB-VIEW F: HALAMAN RESEP OBAT (TANPA DATA DUMMY)     -->
                <!-- ===================================================== -->
                <div id="resepSubView" class="hidden max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8 mt-5 space-y-4 animate-fade-in">
                    <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200 flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center space-x-3">
                            <button type="button" class="back-to-dashboard-btn px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-gray-700 text-xs font-semibold flex items-center space-x-1.5">
                                <i class="fas fa-arrow-left"></i>
                                <span>Kembali</span>
                            </button>
                            <div>
                                <h2 class="text-sm sm:text-base font-bold text-gray-800">Resep Obat Digital</h2>
                                <p class="text-[11px] text-gray-400">Lihat dan kelola resep obat yang diberikan dokter</p>
                            </div>
                        </div>
                        <button type="button" id="toggleAddResepFormBtn" class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold px-3.5 py-2 rounded-xl shadow-sm flex items-center space-x-1.5">
                            <i class="fas fa-plus"></i>
                            <span>Input Resep Baru</span>
                        </button>
                    </div>

                    <!-- Form Input Resep Baru (Collapsible) -->
                    <form id="addResepForm" class="hidden bg-white rounded-2xl shadow-sm p-4 border border-slate-200 space-y-3">
                        <h3 class="text-xs font-bold text-blue-700 uppercase tracking-wider">Tambah Catatan Resep Obat</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <input type="text" id="resepMedNameInput" placeholder="Nama Obat & Dosis (contoh: Paracetamol 500mg)" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                            <input type="text" id="resepDoctorInput" placeholder="Nama Dokter Pemberi Resep" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                            <input type="text" id="resepRuleInput" placeholder="Aturan Pakai (contoh: 3x1 Sesudah Makan)" class="px-3 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button type="submit" class="px-4 py-2 bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold rounded-xl">Simpan Resep</button>
                        </div>
                    </form>

                    <!-- Daftar Resep (Kosong Tanpa Data Dummy) -->
                    <div class="bg-white rounded-2xl shadow-sm p-5 border border-slate-200">
                        <div id="resepListContainer" class="space-y-3">
                            <div id="emptyResepState" class="py-12 text-center text-gray-400">
                                <div class="w-14 h-14 rounded-full bg-teal-50 text-teal-600 flex items-center justify-center mx-auto mb-3 text-2xl">
                                    <i class="fas fa-prescription-bottle-alt"></i>
                                </div>
                                <p class="text-xs sm:text-sm font-semibold text-gray-600">Belum Ada Resep Obat Aktif</p>
                                <p class="text-[11px] text-gray-400 mt-1 max-w-sm mx-auto">
                                    Halaman ini bersih tanpa data dummy. Resep digital dari hasil konsultasi dokter atau yang Anda input akan tampil di sini.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
