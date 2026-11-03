<!-- ====================================================================== -->
<!-- MODUL FITUR HEALTHY — NUTRISI HARIAN (TKPI KEMENKES), AIR MINUM &       -->
<!-- KALKULATOR KEBUTUHAN KALORI HARIAN (DESAIN SIMPEL & MUDAH DIGUNAKAN)   -->
<!-- ====================================================================== -->
<div id="featureHealthySubView" class="unfilled-feature-view hidden max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8 mt-5 space-y-4 animate-fade-in">

    <!-- Header Simpel Healthy -->
    <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200 flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center space-x-3">
            <button type="button" class="back-to-dashboard-btn px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold flex items-center space-x-1.5 transition-colors focus:outline-none">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Beranda</span>
            </button>
            <div>
                <h2 class="text-sm sm:text-base font-bold text-slate-800">Healthy — Nutrisi Harian, Asupan Minum &amp; Kalkulator Kalori</h2>
                <p class="text-[11px] text-slate-500">Sumber data gizi makanan: <strong>Tabel Komposisi Pangan Indonesia (TKPI) Kementerian Kesehatan RI</strong></p>
            </div>
        </div>
        <button
            type="button"
            id="resetHealthyTrackerBtn"
            class="px-3 py-1.5 rounded-xl border border-slate-200 hover:bg-red-50 hover:text-red-600 text-slate-600 text-xs font-semibold transition-colors focus:outline-none"
        >
            <i class="fas fa-redo-alt mr-1"></i>Reset Catatan Hari Ini
        </button>
    </div>

    <!-- BAGIAN 1: RINGKASAN NUTRISI HARIAN & ASUPAN AIR MINUM -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">

        <!-- Kartu Ringkasan Nutrisi Harian (7 Kolom) -->
        <div class="lg:col-span-7 bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-4">
            <div class="flex flex-wrap items-center justify-between gap-2">
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-teal-700 bg-teal-50 px-2.5 py-0.5 rounded-full border border-teal-200">
                        Ringkasan Nutrisi Harian
                    </span>
                    <h3 class="text-sm sm:text-base font-bold text-slate-800 mt-1">Total Asupan Kalori &amp; Gizi Hari Ini</h3>
                </div>
                <div class="flex items-center space-x-2 text-xs">
                    <label for="healthyDailyTargetInput" class="text-slate-500 font-medium">Target Kalori:</label>
                    <input
                        type="number"
                        id="healthyDailyTargetInput"
                        value="2000"
                        min="800"
                        max="6000"
                        step="50"
                        class="w-20 px-2.5 py-1 text-xs font-bold text-teal-700 border border-slate-200 rounded-lg bg-slate-50 focus:outline-none focus:ring-2 focus:ring-teal-600"
                    >
                    <span class="text-slate-500 font-semibold">kkal</span>
                </div>
            </div>

            <!-- Bar Progres Kalori Harian -->
            <div class="bg-slate-50 rounded-xl p-3.5 border border-slate-200 space-y-2">
                <div class="flex flex-wrap items-baseline justify-between gap-2">
                    <div>
                        <span class="text-xs text-slate-500">Kalori Terpenuhi:</span>
                        <span id="healthyIntakeCalories" class="text-xl sm:text-2xl font-bold text-teal-600 ml-1">0</span>
                        <span class="text-xs text-slate-500">/ <strong id="healthyTargetCaloriesLabel">2.000</strong> kkal</span>
                    </div>
                    <div class="text-xs text-slate-600">
                        Sisa Kebutuhan: <strong id="healthyRemainingCalories" class="text-slate-800">2.000</strong> kkal
                        (<span id="healthyCaloriePercentText" class="font-semibold text-teal-700">0%</span>)
                    </div>
                </div>
                <div class="w-full h-2.5 bg-slate-200 rounded-full overflow-hidden">
                    <div id="healthyCalorieProgressBar" class="h-full bg-teal-600 rounded-full transition-all duration-300" style="width: 0%"></div>
                </div>
            </div>

            <!-- 4 Kotak Makronutrisi & Serat Harian -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 text-center">
                <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <p class="text-[11px] text-slate-500 font-medium">Karbohidrat</p>
                    <p class="text-base font-bold text-slate-800 mt-0.5"><span id="healthyTotalCarbs">0</span> <span class="text-xs font-normal text-slate-500">g</span></p>
                    <p class="text-[10px] text-teal-700 mt-0.5">Target: <span id="healthyTargetCarbs">275</span>g</p>
                </div>
                <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <p class="text-[11px] text-slate-500 font-medium">Protein</p>
                    <p class="text-base font-bold text-slate-800 mt-0.5"><span id="healthyTotalProtein">0</span> <span class="text-xs font-normal text-slate-500">g</span></p>
                    <p class="text-[10px] text-teal-700 mt-0.5">Target: <span id="healthyTargetProtein">75</span>g</p>
                </div>
                <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <p class="text-[11px] text-slate-500 font-medium">Lemak</p>
                    <p class="text-base font-bold text-slate-800 mt-0.5"><span id="healthyTotalFat">0</span> <span class="text-xs font-normal text-slate-500">g</span></p>
                    <p class="text-[10px] text-teal-700 mt-0.5">Target: <span id="healthyTargetFat">67</span>g</p>
                </div>
                <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <p class="text-[11px] text-slate-500 font-medium">Serat Pangan</p>
                    <p class="text-base font-bold text-slate-800 mt-0.5"><span id="healthyTotalFiber">0</span> <span class="text-xs font-normal text-slate-500">g</span></p>
                    <p class="text-[10px] text-teal-700 mt-0.5">Target: 25g</p>
                </div>
            </div>
        </div>

        <!-- Kartu Asupan Air Minum Harian (5 Kolom) -->
        <div class="lg:col-span-5 bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 flex flex-col justify-between space-y-4">
            <div>
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-teal-700 bg-teal-50 px-2.5 py-0.5 rounded-full border border-teal-200">
                        Hidrasi Harian
                    </span>
                    <span class="text-[11px] text-slate-500 font-medium">1 Gelas = 250 ml</span>
                </div>
                <h3 class="text-sm sm:text-base font-bold text-slate-800 mt-1">Pencatat Asupan Air Minum</h3>
                <p class="text-xs text-slate-500 mt-0.5">Target hidrasi harian yang dianjurkan Kemenkes RI adalah 8 gelas (2.000 ml) per hari.</p>

                <div class="mt-4 p-4 rounded-xl bg-teal-50/60 border border-teal-200 text-center space-y-2">
                    <div class="flex items-center justify-center space-x-2 text-teal-700">
                        <i class="fas fa-tint text-xl"></i>
                        <span class="text-2xl font-bold"><span id="healthyWaterGlasses">0</span> / 8 Gelas</span>
                    </div>
                    <p class="text-xs text-slate-600 font-medium">
                        Total Volume: <strong id="healthyWaterMl" class="text-teal-700">0</strong> ml dari 2.000 ml
                    </p>
                    <div class="w-full h-2 bg-white rounded-full overflow-hidden border border-teal-200">
                        <div id="healthyWaterProgressBar" class="h-full bg-teal-600 rounded-full transition-all duration-300" style="width: 0%"></div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-2.5">
                <button
                    type="button"
                    id="subHealthyWaterBtn"
                    class="py-2.5 px-3 rounded-xl border border-slate-200 hover:bg-slate-100 text-slate-700 text-xs font-semibold transition-colors focus:outline-none"
                >
                    <i class="fas fa-minus mr-1"></i>Kurangi 1 Gelas
                </button>
                <button
                    type="button"
                    id="addHealthyWaterBtn"
                    class="py-2.5 px-3 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold shadow-sm transition-colors focus:outline-none"
                >
                    <i class="fas fa-plus mr-1"></i>Tambah 1 Gelas (250 ml)
                </button>
            </div>
        </div>

    </div>

    <!-- BAGIAN 2: KALKULATOR KEBUTUHAN KALORI HARIAN SESEORANG -->
    <div class="bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-4">
        <div class="flex flex-wrap items-center justify-between gap-2 border-b border-slate-100 pb-3">
            <div>
                <h3 class="text-sm sm:text-base font-bold text-slate-800">
                    <i class="fas fa-calculator text-teal-600 mr-1.5"></i>Kalkulator Kebutuhan Kalori Harian
                </h3>
                <p class="text-xs text-slate-500">Hitung kebutuhan energi harian (BMR &amp; TDEE) berdasarkan jenis kelamin, usia, tinggi badan, berat badan, dan tingkat aktivitas</p>
            </div>
            <button
                type="button"
                id="fillCalCalcFromProfileBtn"
                class="px-3 py-1.5 rounded-xl bg-teal-50 hover:bg-teal-100 text-teal-700 border border-teal-200 text-xs font-semibold transition-colors focus:outline-none"
            >
                <i class="fas fa-user-check mr-1"></i>Isi Otomatis dari Profil Saya
            </button>
        </div>

        <form id="calorieCalculatorForm" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-3 items-end">
            <div>
                <label for="calcGenderInput" class="block text-xs font-semibold text-slate-700 mb-1">Jenis Kelamin</label>
                <select id="calcGenderInput" class="w-full px-3 py-2 text-xs border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div>
                <label for="calcAgeInput" class="block text-xs font-semibold text-slate-700 mb-1">Usia (Tahun)</label>
                <input type="number" id="calcAgeInput" value="25" min="10" max="100" class="w-full px-3 py-2 text-xs border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
            </div>
            <div>
                <label for="calcHeightInput" class="block text-xs font-semibold text-slate-700 mb-1">Tinggi Badan (cm)</label>
                <input type="number" id="calcHeightInput" value="165" min="100" max="230" class="w-full px-3 py-2 text-xs border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
            </div>
            <div>
                <label for="calcWeightInput" class="block text-xs font-semibold text-slate-700 mb-1">Berat Badan (kg)</label>
                <input type="number" id="calcWeightInput" value="60" min="25" max="250" class="w-full px-3 py-2 text-xs border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
            </div>
            <div>
                <label for="calcActivityInput" class="block text-xs font-semibold text-slate-700 mb-1">Tingkat Aktivitas</label>
                <select id="calcActivityInput" class="w-full px-3 py-2 text-xs border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600">
                    <option value="1.2">Jarang Olahraga / Kerja Duduk</option>
                    <option value="1.375" selected>Aktivitas Ringan (1-3x/minggu)</option>
                    <option value="1.55">Aktivitas Sedang (3-5x/minggu)</option>
                    <option value="1.725">Aktivitas Berat / Aktif Fisik</option>
                </select>
            </div>
            <div>
                <label for="calcGoalInput" class="block text-xs font-semibold text-slate-700 mb-1">Tujuan Berat Badan</label>
                <select id="calcGoalInput" class="w-full px-3 py-2 text-xs border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600">
                    <option value="0" selected>Pertahankan Berat Badan</option>
                    <option value="-500">Turunkan Berat Badan (-500 kkal)</option>
                    <option value="300">Naikkan Berat Badan (+300 kkal)</option>
                </select>
            </div>
            <div class="sm:col-span-2 lg:col-span-6 flex flex-wrap items-center justify-between gap-3 pt-1">
                <p class="text-[11px] text-slate-500">
                    Rumus: <strong>Mifflin-St Jeor</strong> &amp; Angka Kecukupan Gizi (AKG) Kemenkes RI. Hasil perhitungan langsung diterapkan sebagai Target Kalori Harian Anda.
                </p>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold shadow-sm transition-colors focus:outline-none">
                    <i class="fas fa-check-circle mr-1.5"></i>Hitung &amp; Terapkan Target Kalori
                </button>
            </div>
        </form>

        <!-- Hasil Perhitungan Kalkulator Kalori -->
        <div id="calorieCalculatorResultBox" class="hidden bg-teal-50/70 border border-teal-200 rounded-xl p-4">
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-3 text-xs">
                <div class="bg-white p-3 rounded-xl border border-slate-200">
                    <span class="text-[11px] text-slate-500 block">Kalori Basal (BMR)</span>
                    <strong id="calcResultBmr" class="text-sm sm:text-base font-bold text-slate-800">0 kkal/hari</strong>
                </div>
                <div class="bg-white p-3 rounded-xl border border-teal-200">
                    <span class="text-[11px] text-teal-700 font-semibold block">Kebutuhan Kalori Harian</span>
                    <strong id="calcResultTdee" class="text-sm sm:text-base font-bold text-teal-700">0 kkal/hari</strong>
                </div>
                <div class="bg-white p-3 rounded-xl border border-slate-200">
                    <span class="text-[11px] text-slate-500 block">Status IMT (BMI)</span>
                    <strong id="calcResultBmi" class="text-sm sm:text-base font-bold text-slate-800">-</strong>
                </div>
                <div class="bg-white p-3 rounded-xl border border-slate-200">
                    <span class="text-[11px] text-slate-500 block">Rekomendasi Makro Harian</span>
                    <strong id="calcResultMacros" class="text-xs font-bold text-slate-800 block mt-0.5">Karb: 0g • Prot: 0g • Lemak: 0g</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- BAGIAN 3: PILIH MAKANAN DARI TABEL KOMPOSISI PANGAN INDONESIA (TKPI KEMENKES RI) & CATATAN HARIAN -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">

        <!-- Kolom Kiri: Daftar Pangan TKPI Kemenkes RI (7 Kolom) -->
        <div class="lg:col-span-7 bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-3.5">
            <div class="flex flex-wrap items-center justify-between gap-2">
                <div>
                    <h3 class="text-sm sm:text-base font-bold text-slate-800">
                        <i class="fas fa-utensils text-teal-600 mr-1.5"></i>Daftar Makanan — TKPI Kemenkes RI
                    </h3>
                    <p class="text-[11px] text-slate-500">Data nilai gizi dikutip dari <strong>Tabel Komposisi Pangan Indonesia (TKPI) Kementerian Kesehatan RI</strong> (per 100g / 1 porsi BDD)</p>
                </div>
                <span id="tkpiFoodCountBadge" class="text-[11px] font-semibold bg-teal-50 text-teal-700 border border-teal-200 px-2.5 py-1 rounded-full">
                    TKPI Kemenkes RI
                </span>
            </div>

            <!-- Bar Pencarian, Filter Kategori TKPI, dan Pilihan Waktu Makan -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5">
                <div class="relative">
                    <i class="fas fa-search text-slate-400 text-xs absolute left-3 top-1/2 -translate-y-1/2"></i>
                    <input
                        type="text"
                        id="searchTkpiFoodInput"
                        placeholder="Cari makanan TKPI (nasi, tempe, ayam, sayur...)"
                        class="w-full pl-8 pr-3 py-2 text-xs border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600"
                    >
                </div>
                <select id="filterTkpiCategorySelect" class="px-3 py-2 text-xs border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-teal-600">
                    <option value="ALL">Semua Kategori TKPI</option>
                    <option value="Makanan Pokok">Makanan Pokok (Serealia &amp; Umbi)</option>
                    <option value="Lauk Pauk">Lauk Pauk (Hewani &amp; Nabati)</option>
                    <option value="Sayuran">Sayuran &amp; Olahan Sayur</option>
                    <option value="Buah-buahan">Buah-buahan Segar</option>
                    <option value="Masakan Nusantara">Masakan Siap Santap</option>
                    <option value="Minuman &amp; Camilan">Minuman &amp; Kudapan</option>
                </select>
                <select id="healthyMealTimeSelect" class="px-3 py-2 text-xs border border-teal-200 rounded-xl bg-teal-50 text-teal-800 font-semibold focus:outline-none focus:ring-2 focus:ring-teal-600">
                    <option value="Sarapan">Waktu: Sarapan</option>
                    <option value="Makan Siang">Waktu: Makan Siang</option>
                    <option value="Makan Malam">Waktu: Makan Malam</option>
                    <option value="Camilan">Waktu: Camilan / Selingan</option>
                </select>
            </div>

            <!-- Daftar Item Pangan TKPI Kemenkes -->
            <div id="tkpiFoodListContainer" class="divide-y divide-slate-100 border border-slate-200 rounded-xl max-h-96 overflow-y-auto"></div>
        </div>

        <!-- Kolom Kanan: Catatan Nutrisi Harian & Tambah Makanan Manual (5 Kolom) -->
        <div class="lg:col-span-5 space-y-4">

            <!-- Daftar Asupan Nutrisi yang Dicatat Hari Ini -->
            <div class="bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-3">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-bold text-slate-800">Catatan Asupan Nutrisi Hari Ini</h3>
                        <p class="text-[11px] text-slate-500">Daftar makanan yang Anda konsumsi hari ini</p>
                    </div>
                    <span id="healthyLogCountBadge" class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-2.5 py-0.5 rounded-full">0 Makanan</span>
                </div>

                <div id="healthyLogListContainer" class="space-y-2 max-h-72 overflow-y-auto">
                    <div id="emptyHealthyLogState" class="py-8 px-4 text-center border border-dashed border-slate-200 rounded-xl text-slate-400 text-xs">
                        <i class="fas fa-apple-alt text-2xl text-teal-600 mb-1.5 block"></i>
                        Belum ada makanan yang dicatat hari ini.<br>
                        Silakan pilih makanan dari daftar <strong>TKPI Kemenkes RI</strong> di samping untuk menghitung nutrisi harian Anda.
                    </div>
                </div>
            </div>

            <!-- Form Input Makanan Manual (Opsional jika belum ada di tabel) -->
            <form id="healthyManualFoodForm" class="bg-white rounded-2xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-3">
                <div>
                    <h4 class="text-xs sm:text-sm font-bold text-slate-800"><i class="fas fa-plus-circle text-teal-600 mr-1.5"></i>Catat Makanan Manual</h4>
                    <p class="text-[11px] text-slate-500">Gunakan form ini jika Anda ingin memasukkan nilai gizi makanan sendiri</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                    <input type="text" id="manualFoodNameInput" placeholder="Nama Makanan / Minuman" class="sm:col-span-2 px-3 py-2 text-xs border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                    <input type="number" id="manualFoodCaloriesInput" placeholder="Kalori (kkal)" min="0" class="px-3 py-2 text-xs border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                    <input type="number" id="manualFoodCarbsInput" placeholder="Karbohidrat (g)" min="0" step="0.1" class="px-3 py-2 text-xs border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600">
                    <input type="number" id="manualFoodProteinInput" placeholder="Protein (g)" min="0" step="0.1" class="px-3 py-2 text-xs border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600">
                    <input type="number" id="manualFoodFatInput" placeholder="Lemak (g)" min="0" step="0.1" class="px-3 py-2 text-xs border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600">
                </div>
                <button type="submit" class="w-full py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold shadow-sm transition-colors focus:outline-none">
                    + Tambahkan ke Nutrisi Harian
                </button>
            </form>

        </div>

    </div>

</div>
