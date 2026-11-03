<!-- ====================================================================== -->
<!-- MODUL FITUR DIAGNOSIS MANDIRI, SKRINING GEJALA & PENCARIAN PENYAKIT    -->
<!-- ====================================================================== -->
<div id="featureDiagnosisSubView" class="unfilled-feature-view hidden max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8 mt-5 space-y-4 animate-fade-in">
    <!-- Header Diagnosis -->
    <div class="bg-white rounded-xl shadow-sm p-4 border border-slate-200 flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center space-x-3">
            <button type="button" class="back-to-dashboard-btn px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold flex items-center space-x-1.5 transition-colors focus:outline-none">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Beranda</span>
            </button>
            <div>
                <h2 class="text-sm sm:text-base font-bold text-slate-800">Diagnosis Mandiri, Skrining Gejala & Pencarian Penyakit</h2>
                <p class="text-[11px] text-slate-500">Pilih gejala berdasarkan area tubuh, cari informasi penyakit secara langsung, dan lihat rekomendasi triase medis</p>
            </div>
        </div>
        <span class="bg-teal-50 text-teal-700 border border-teal-200 text-[10px] font-semibold px-3 py-1 rounded-full flex items-center space-x-1.5">
            <i class="fas fa-stethoscope"></i>
            <span>Triase Klinis & Kamus Penyakit</span>
        </span>
    </div>

    <!-- Banner Deteksi Red Flag / Gawat Darurat (UGD) - Muncul Otomatis Saat Gejala Kritis Terdeteksi -->
    <div id="diagRedFlagEmergencyBanner" class="hidden bg-red-600 text-white rounded-xl p-4 shadow-md border border-red-700 animate-fade-in">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div class="flex items-start space-x-3">
                <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center text-xl shrink-0 mt-0.5">
                    <i class="fas fa-ambulance"></i>
                </div>
                <div>
                    <div class="flex items-center space-x-2">
                        <span class="text-[10px] font-bold uppercase tracking-wider bg-white text-red-700 px-2 py-0.5 rounded">PERINGATAN RED FLAG (GAWAT DARURAT / UGD)</span>
                    </div>
                    <h3 class="text-sm sm:text-base font-bold mt-1">Gejala Kritis Terdeteksi — Segera Cari Pertolongan Medis Darurat!</h3>
                    <p id="diagRedFlagReasonText" class="text-xs text-red-100 mt-0.5 leading-relaxed">
                        Anda memasukkan gejala kritis (seperti nyeri dada hebat atau kesulitan bernapas). Jangan tunda penanganan, segera hubungi layanan darurat atau menuju IGD terdekat.
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap items-center gap-2 shrink-0">
                <a href="tel:119" class="px-4 py-2.5 rounded-xl bg-white text-red-700 hover:bg-red-50 text-xs font-bold shadow-sm flex items-center space-x-1.5 transition-colors">
                    <i class="fas fa-phone-alt"></i>
                    <span>Panggilan Darurat 119</span>
                </a>
                <button type="button" id="dismissRedFlagBannerBtn" class="px-3 py-2.5 rounded-xl bg-red-700 hover:bg-red-800 text-white text-xs font-semibold transition-colors">
                    Mengerti
                </button>
            </div>
        </div>
    </div>

    <!-- FITUR PENCARIAN PENYAKIT (CARI PENYAKIT & PANDUAN KLINIS) -->
    <div class="bg-white rounded-xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-3.5">
        <div class="flex flex-wrap items-center justify-between gap-2 border-b border-slate-100 pb-3">
            <div>
                <h3 class="text-sm font-bold text-slate-800 flex items-center">
                    <i class="fas fa-book-medical text-teal-600 mr-2"></i>Pencarian Penyakit & Direktori Kondisi Medis
                </h3>
                <p class="text-[11px] text-slate-500">Cari nama penyakit untuk melihat gejala khas, penyebab, pertolongan pertama, rekomendasi obat bebas (OTC), dan dokter spesialis tujuan</p>
            </div>
            <span id="diagDiseaseCountBadge" class="text-[10px] font-semibold bg-teal-50 text-teal-700 border border-teal-200 px-2.5 py-1 rounded-full">Direktori Penyakit Aktif</span>
        </div>

        <div class="flex flex-col sm:flex-row gap-2.5">
            <div class="relative flex-1">
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-xs">
                    <i class="fas fa-search"></i>
                </span>
                <input
                    type="text"
                    id="diagDiseaseSearchInput"
                    placeholder="Cari penyakit (contoh: DBD, Tifus, GERD, Asam Urat, Hipertensi, Diabetes, Asma, Migrain, Vertigo, Kolesterol)..."
                    class="w-full pl-9 pr-3 py-2 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 focus:bg-white"
                    autocomplete="off"
                >
            </div>
            <select
                id="diagDiseaseCategorySelect"
                class="px-3.5 py-2 text-xs bg-slate-50 border border-slate-200 rounded-xl text-slate-700 font-medium focus:outline-none focus:ring-2 focus:ring-teal-600"
            >
                <option value="ALL">Semua Kategori Penyakit</option>
                <option value="Infeksi & Tropis">Infeksi & Penyakit Tropis</option>
                <option value="Pencernaan & Lambung">Pencernaan & Lambung</option>
                <option value="Pernapasan & Paru">Pernapasan, THT & Paru</option>
                <option value="Jantung & Pembuluh Darah">Jantung & Pembuluh Darah</option>
                <option value="Metabolik & Endokrin">Metabolik & Endokrin</option>
                <option value="Saraf & Kepala">Saraf & Kepala</option>
                <option value="Kulit & Alergi">Kulit & Alergi</option>
                <option value="Otot & Sendi">Otot, Tulang & Sendi</option>
            </select>
        </div>

        <!-- Daftar Hasil Pencarian Penyakit -->
        <div id="diagDiseaseCatalogGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 max-h-80 overflow-y-auto pr-1"></div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
        <!-- Kolom Kiri (7 Kolom): Pilihan Cepat Gejala pada Area Tubuh (Rapi) + Auto-Complete + Pertanyaan Spesifik -->
        <div class="lg:col-span-7 bg-white rounded-xl shadow-sm p-4 sm:p-5 border border-slate-200 space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div>
                    <h3 class="text-sm font-bold text-slate-800">1. Pencarian & Pilihan Cepat Gejala pada Area Tubuh</h3>
                    <p class="text-[11px] text-slate-500">Pilih kategori area tubuh atau ketik gejala yang Anda rasakan untuk dianalisis</p>
                </div>
                <span id="selectedSymptomCountBadge" class="text-[11px] font-semibold bg-teal-50 text-teal-700 px-2.5 py-1 rounded-full border border-teal-200">0 Gejala Dipilih</span>
            </div>

            <!-- Baris Pencarian Gejala Auto-Complete & Dropdown Area Tubuh -->
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-3">
                <div class="sm:col-span-7">
                    <label for="diagSymptomSearchInput" class="block text-xs font-semibold text-slate-700 mb-1">Cari Gejala (Auto-Complete)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400 text-xs">
                            <i class="fas fa-search"></i>
                        </span>
                        <input
                            type="text"
                            id="diagSymptomSearchInput"
                            placeholder="Ketik gejala (cth: demam, batuk, mual, pusing, nyeri dada)..."
                            class="w-full pl-8 pr-3 py-2 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 focus:bg-white"
                            autocomplete="off"
                        >
                        <!-- Auto-Complete Dropdown -->
                        <div id="diagAutoCompleteDropdown" class="hidden absolute left-0 right-0 mt-1 bg-white border border-slate-200 rounded-xl shadow-lg max-h-44 overflow-y-auto z-30 divide-y divide-slate-100 text-xs"></div>
                    </div>
                </div>

                <div class="sm:col-span-5">
                    <label for="diagBodyAreaSelect" class="block text-xs font-semibold text-slate-700 mb-1">Filter Area Tubuh</label>
                    <select id="diagBodyAreaSelect" class="w-full px-3 py-2 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 text-slate-700 font-medium">
                        <option value="ALL">Semua Area Tubuh</option>
                        <option value="UMUM">Keluhan Umum & Sistemik</option>
                        <option value="KEPALA">Kepala, Mata, THT & Leher</option>
                        <option value="PERNAPASAN">Pernapasan & Paru-paru</option>
                        <option value="JANTUNG">Dada & Jantung</option>
                        <option value="PENCERNAAN">Perut, Lambung & Pencernaan</option>
                        <option value="KULIT">Kulit & Reaksi Alergi</option>
                        <option value="OTOT">Otot, Tulang & Persendian</option>
                    </select>
                </div>
            </div>

            <!-- Tab Filter Cepat Area Tubuh yang Rapi -->
            <div class="space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-700">Pilihan Cepat Gejala pada Area Tubuh:</span>
                    <span id="activeBodyAreaFilterBadge" class="text-[10px] font-semibold text-teal-700 bg-teal-50 px-2.5 py-0.5 rounded-full border border-teal-200">Semua Area Tubuh</span>
                </div>

                <div class="flex flex-wrap gap-1.5 pb-1">
                    <button type="button" data-area-pill="ALL" class="diag-area-pill-btn px-2.5 py-1.5 rounded-lg text-[11px] font-semibold bg-teal-600 text-white transition-colors">
                        Semua Area
                    </button>
                    <button type="button" data-area-pill="UMUM" class="diag-area-pill-btn px-2.5 py-1.5 rounded-lg text-[11px] font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">
                        Umum & Demam
                    </button>
                    <button type="button" data-area-pill="KEPALA" class="diag-area-pill-btn px-2.5 py-1.5 rounded-lg text-[11px] font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">
                        Kepala & THT
                    </button>
                    <button type="button" data-area-pill="PERNAPASAN" class="diag-area-pill-btn px-2.5 py-1.5 rounded-lg text-[11px] font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">
                        Pernapasan
                    </button>
                    <button type="button" data-area-pill="PENCERNAAN" class="diag-area-pill-btn px-2.5 py-1.5 rounded-lg text-[11px] font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">
                        Perut & Lambung
                    </button>
                    <button type="button" data-area-pill="KULIT" class="diag-area-pill-btn px-2.5 py-1.5 rounded-lg text-[11px] font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">
                        Kulit & Alergi
                    </button>
                    <button type="button" data-area-pill="OTOT" class="diag-area-pill-btn px-2.5 py-1.5 rounded-lg text-[11px] font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">
                        Otot & Sendi
                    </button>
                    <button type="button" data-area-pill="JANTUNG" class="diag-area-pill-btn px-2.5 py-1.5 rounded-lg text-[11px] font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">
                        Dada & Jantung
                    </button>
                </div>

                <!-- Grid Tombol Pilihan Cepat Gejala yang Dirapikan dengan Sub-Label Area -->
                <div id="diagSymptomChipsContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2 text-xs pt-1">
                    <!-- Area Umum -->
                    <button type="button" data-symptom="Demam Tinggi" data-area="UMUM" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-thermometer-three-quarters text-teal-600 w-4 text-center"></i><span class="truncate">Demam Tinggi</span></span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 shrink-0">Umum</span>
                    </button>
                    <button type="button" data-symptom="Tubuh Lemas & Menggigil" data-area="UMUM" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-battery-quarter text-teal-600 w-4 text-center"></i><span class="truncate">Lemas & Menggigil</span></span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 shrink-0">Umum</span>
                    </button>
                    <button type="button" data-symptom="Keringat Dingin Malam Hari" data-area="UMUM" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-tint text-teal-600 w-4 text-center"></i><span class="truncate">Keringat Dingin</span></span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 shrink-0">Umum</span>
                    </button>

                    <!-- Area Kepala & THT -->
                    <button type="button" data-symptom="Sakit Kepala / Pusing" data-area="KEPALA" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-brain text-teal-600 w-4 text-center"></i><span class="truncate">Sakit Kepala / Pusing</span></span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 shrink-0">Kepala</span>
                    </button>
                    <button type="button" data-symptom="Vertigo / Pusing Berputar" data-area="KEPALA" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-sync-alt text-teal-600 w-4 text-center"></i><span class="truncate">Pusing Berputar (Vertigo)</span></span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 shrink-0">Kepala</span>
                    </button>
                    <button type="button" data-symptom="Nyeri Tenggorokan" data-area="KEPALA" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-comment-medical text-teal-600 w-4 text-center"></i><span class="truncate">Nyeri Tenggorokan</span></span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 shrink-0">THT</span>
                    </button>

                    <!-- Area Pernapasan -->
                    <button type="button" data-symptom="Batuk & Pilek" data-area="PERNAPASAN" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-head-side-cough text-teal-600 w-4 text-center"></i><span class="truncate">Batuk & Pilek</span></span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 shrink-0">Napas</span>
                    </button>
                    <button type="button" data-symptom="Hidung Tersumbat & Bersin" data-area="PERNAPASAN" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-wind text-teal-600 w-4 text-center"></i><span class="truncate">Hidung Tersumbat</span></span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 shrink-0">Napas</span>
                    </button>
                    <button type="button" data-symptom="Napas Berbunyi Mengi (Wheezing)" data-area="PERNAPASAN" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-lungs-virus text-teal-600 w-4 text-center"></i><span class="truncate">Napas Mengi / Asma</span></span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 shrink-0">Napas</span>
                    </button>

                    <!-- Area Perut & Pencernaan -->
                    <button type="button" data-symptom="Nyeri Ulu Hati / Maag" data-area="PENCERNAAN" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-fire-alt text-teal-600 w-4 text-center"></i><span class="truncate">Nyeri Ulu Hati / Maag</span></span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 shrink-0">Perut</span>
                    </button>
                    <button type="button" data-symptom="Mual & Muntah" data-area="PENCERNAAN" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-dizzy text-teal-600 w-4 text-center"></i><span class="truncate">Mual & Muntah</span></span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 shrink-0">Perut</span>
                    </button>
                    <button type="button" data-symptom="Diare / Gangguan BAB" data-area="PENCERNAAN" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-procedures text-teal-600 w-4 text-center"></i><span class="truncate">Diare / Gangguan BAB</span></span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 shrink-0">Perut</span>
                    </button>

                    <!-- Area Kulit & Otot/Sendi -->
                    <button type="button" data-symptom="Ruam Kulit & Gatal" data-area="KULIT" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-allergies text-teal-600 w-4 text-center"></i><span class="truncate">Ruam Kulit & Gatal</span></span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 shrink-0">Kulit</span>
                    </button>
                    <button type="button" data-symptom="Nyeri Otot & Sendi" data-area="OTOT" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-bone text-teal-600 w-4 text-center"></i><span class="truncate">Nyeri Otot & Sendi</span></span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 shrink-0">Sendi</span>
                    </button>
                    <button type="button" data-symptom="Sendi Lutut Kaku & Bengkak" data-area="OTOT" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-walking text-teal-600 w-4 text-center"></i><span class="truncate">Sendi Bengkak / Asam Urat</span></span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 shrink-0">Sendi</span>
                    </button>

                    <!-- Gejala Kritis (Red Flag) -->
                    <button type="button" data-symptom="Nyeri Dada Hebat Menjalar" data-area="JANTUNG" data-redflag="true" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-red-200 bg-white text-red-700 hover:border-red-500 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-heartbeat text-red-600 w-4 text-center"></i><span class="truncate">Nyeri Dada Menjalar</span></span>
                        <span class="text-[9px] font-bold px-1.5 py-0.5 rounded bg-red-50 text-red-600 shrink-0">Darurat</span>
                    </button>
                    <button type="button" data-symptom="Kesulitan Bernapas / Sesak Berat" data-area="PERNAPASAN" data-redflag="true" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-red-200 bg-white text-red-700 hover:border-red-500 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-lungs text-red-600 w-4 text-center"></i><span class="truncate">Sesak Napas Berat</span></span>
                        <span class="text-[9px] font-bold px-1.5 py-0.5 rounded bg-red-50 text-red-600 shrink-0">Darurat</span>
                    </button>
                    <button type="button" data-symptom="Jantung Berdebar Kencang (Palpitasi)" data-area="JANTUNG" class="diag-symptom-chip px-3 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:border-teal-600 text-left flex items-center justify-between gap-2 transition-all">
                        <span class="flex items-center space-x-2 truncate"><i class="fas fa-wave-square text-teal-600 w-4 text-center"></i><span class="truncate">Jantung Berdebar</span></span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500 shrink-0">Jantung</span>
                    </button>
                </div>
            </div>

            <!-- Daftar Gejala yang Dipilih Saat Ini -->
            <div class="bg-slate-50 rounded-xl p-3 border border-slate-200">
                <span class="text-[10px] font-semibold uppercase text-slate-400 block mb-1.5">Gejala yang Anda Pilih:</span>
                <div id="diagSelectedTagsList" class="flex flex-wrap gap-1.5 text-xs text-slate-500">
                    <span class="text-[11px] text-slate-400 italic">Belum ada gejala dipilih. Pilih gejala pada tombol di atas atau ketik di kolom pencarian.</span>
                </div>
            </div>

            <!-- Pertanyaan Spesifik Klinis (Durasi, Tingkat Nyeri 1-10, Faktor Pemicu, & Persetujuan Disclaimer) -->
            <form id="diagnosisCheckForm" class="space-y-3.5 pt-3 border-t border-slate-200">
                <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider">2. Detail Keluhan & Disclaimer Medis</h4>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div>
                        <label for="diagDurationInput" class="block text-xs font-semibold text-slate-700 mb-1">Durasi Keluhan</label>
                        <select id="diagDurationInput" class="w-full px-3 py-2 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600">
                            <option value="Kurang dari 24 Jam">Baru Hari Ini (&lt; 24 Jam)</option>
                            <option value="2 - 3 Hari">2 - 3 Hari</option>
                            <option value="4 - 7 Hari">4 - 7 Hari</option>
                            <option value="Lebih dari 1 Minggu">Lebih dari 1 Minggu</option>
                        </select>
                    </div>
                    <div>
                        <label for="diagSeverityInput" class="block text-xs font-semibold text-slate-700 mb-1">Intensitas Keluhan</label>
                        <select id="diagSeverityInput" class="w-full px-3 py-2 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600">
                            <option value="Ringan">Ringan (Masih Bisa Beraktivitas)</option>
                            <option value="Sedang">Sedang (Mulai Mengganggu)</option>
                            <option value="Berat">Berat (Sangat Mengganggu / Kritis)</option>
                        </select>
                    </div>
                    <div>
                        <label for="diagTempInput" class="block text-xs font-semibold text-slate-700 mb-1">Suhu Tubuh (°C)</label>
                        <input type="number" id="diagTempInput" step="0.1" min="34" max="43" placeholder="Contoh: 37.5" class="w-full px-3 py-2 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600">
                    </div>
                </div>

                <!-- Skala Tingkat Nyeri (1 - 10) & Faktor Pemicu -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 bg-slate-50 p-3 rounded-xl border border-slate-200">
                    <div>
                        <div class="flex items-center justify-between text-xs mb-1">
                            <label for="diagPainScaleInput" class="font-semibold text-slate-700">Tingkat Nyeri (Skala 1 - 10):</label>
                            <span id="diagPainScaleBadge" class="font-bold text-teal-700 bg-white px-2 py-0.5 rounded border border-slate-200">3 / 10 (Nyeri Ringan)</span>
                        </div>
                        <input type="range" id="diagPainScaleInput" min="1" max="10" value="3" class="w-full accent-teal-600 cursor-pointer">
                        <div class="flex justify-between text-[10px] text-slate-400">
                            <span>1 (Minimal)</span>
                            <span>5 (Sedang)</span>
                            <span>10 (Tak Tertahankan)</span>
                        </div>
                    </div>
                    <div>
                        <label for="diagTriggerFactorInput" class="block text-xs font-semibold text-slate-700 mb-1">Faktor Pemicu / Memperberat Gejala</label>
                        <select id="diagTriggerFactorInput" class="w-full px-3 py-2 text-xs bg-white border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600">
                            <option value="Muncul spontan saat istirahat">Muncul spontan / belum diketahui</option>
                            <option value="Setelah makan makanan pedas, asam, atau berlemak">Setelah makan pedas / asam / terlambat makan</option>
                            <option value="Saat aktivitas fisik berat atau naik tangga">Saat aktivitas fisik / kelelahan kerja</option>
                            <option value="Paparan udara dingin, debu, atau cuaca pancaroba">Paparan udara dingin / debu / alergen</option>
                            <option value="Kurang tidur malam dan stres pikiran">Kurang tidur malam / stres</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="diagAdditionalNotes" class="block text-xs font-semibold text-slate-700 mb-1">Keluhan Tambahan (Opsional)</label>
                    <input type="text" id="diagAdditionalNotes" placeholder="Ketik detail keluhan tambahan yang Anda rasakan..." class="w-full px-3.5 py-2 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 focus:bg-white">
                </div>

                <!-- Peringatan Medis (Disclaimer Wajib Disetujui) -->
                <div class="bg-slate-50 border border-slate-200 rounded-xl p-3">
                    <label class="flex items-start space-x-2.5 cursor-pointer select-none text-xs text-slate-700">
                        <input type="checkbox" id="diagDisclaimerCheckbox" checked class="mt-0.5 rounded border-slate-300 text-teal-600 focus:ring-teal-600">
                        <span class="text-[11px] leading-relaxed">
                            <strong>Peringatan Medis (Disclaimer Wajib):</strong> Saya memahami dan menyetujui bahwa fitur skrining ini hanya menampilkan kemungkinan indikasi awal berdasarkan algoritma triase dan <strong>bukan pengganti diagnosis medis final maupun saran dokter profesional</strong>.
                        </span>
                    </label>
                </div>

                <div class="flex flex-wrap items-center gap-2 pt-1">
                    <button type="submit" id="analyzeSymptomsBtn" class="flex-1 py-2.5 px-4 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold shadow-sm flex items-center justify-center space-x-2 transition-all focus:outline-none">
                        <i class="fas fa-notes-medical"></i>
                        <span>Analisis Gejala & Lihat Diagnosis Awal</span>
                    </button>
                    <button type="button" id="resetSymptomsBtn" class="py-2.5 px-3.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 text-xs font-semibold transition-colors focus:outline-none">
                        Reset
                    </button>
                </div>
            </form>
        </div>

        <!-- Kolom Kanan (5 Kolom): Hasil Triase Algoritma, Rekomendasi Obat OTC / Telemedicine & Riwayat -->
        <div class="lg:col-span-5 space-y-4">
            <div class="bg-white rounded-xl shadow-sm p-4 sm:p-5 border border-slate-200">
                <h3 class="text-sm font-bold text-slate-800 mb-3 flex items-center">
                    <i class="fas fa-clipboard-check text-teal-600 mr-2"></i>Hasil Triase & Informasi Medis
                </h3>

                <!-- State Sebelum Analisis -->
                <div id="diagEmptyResultState" class="py-8 text-center text-slate-400">
                    <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center mx-auto mb-2.5 text-xl">
                        <i class="fas fa-stethoscope"></i>
                    </div>
                    <p class="text-xs font-semibold text-slate-600">Belum Ada Gejala atau Penyakit yang Dipilih</p>
                    <p class="text-[11px] text-slate-400 mt-1 max-w-xs mx-auto">
                        Pilih penyakit pada kolom <strong>Pencarian Penyakit</strong> di atas atau pilih gejala di sebelah kiri untuk melihat hasil triase (<em>Perawatan Mandiri</em>, <em>Konsultasi Dokter</em>, atau <em>Gawat Darurat/UGD</em>).
                    </p>
                </div>

                <!-- State Hasil Analisis Triase Aktif -->
                <div id="diagActiveResultCard" class="hidden space-y-3 text-xs">
                    <!-- Banner Tingkat Urgensi Triase (3 Kategori) -->
                    <div id="diagTriageBannerBox" class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 space-y-1.5">
                        <div class="flex items-center justify-between gap-2">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Tingkat Urgensi Triase</span>
                            <span id="diagResultUrgencyBadge" class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-teal-50 text-teal-700 border border-teal-200">Perawatan Mandiri</span>
                        </div>
                        <p class="text-[10px] font-semibold text-slate-500">Kemungkinan Kondisi Medis (Bukan Diagnosis Final):</p>
                        <h4 id="diagResultTitle" class="text-sm font-bold text-slate-800">-</h4>
                        <p id="diagResultSummary" class="text-[11px] text-slate-600 leading-relaxed">-</p>
                    </div>

                    <!-- Detail Saran & Obat OTC -->
                    <div class="bg-slate-50 rounded-xl p-3 border border-slate-200 space-y-2">
                        <div>
                            <span class="text-[10px] font-bold uppercase text-slate-400 block">Pertolongan Pertama di Rumah:</span>
                            <p id="diagResultCareAdvice" class="text-slate-700 font-medium mt-0.5 leading-relaxed">-</p>
                        </div>

                        <!-- Rekomendasi Obat Bebas (OTC) -->
                        <div class="pt-2 border-t border-slate-200">
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] font-bold uppercase text-slate-400">Rekomendasi Obat Bebas (OTC):</span>
                                <span id="diagOtcAllergyCheckBadge" class="text-[10px] text-teal-700 font-semibold">Aman Sesuai Profil</span>
                            </div>
                            <p id="diagResultOtcRec" class="text-slate-800 font-semibold mt-0.5">-</p>
                        </div>

                        <div class="pt-2 border-t border-slate-200 flex items-center justify-between">
                            <span class="text-[11px] text-slate-500">Dokter Spesialis Relevan:</span>
                            <span id="diagResultSpecRec" class="font-bold text-teal-700">-</span>
                        </div>
                    </div>

                    <div class="bg-slate-50 rounded-lg p-2.5 border border-slate-200 text-[10px] text-slate-500 leading-relaxed">
                        <strong>Catatan Disclaimer:</strong> Hasil di atas merupakan kemungkinan kondisi medis berdasarkan algoritma skrining gejala dan <strong>bukan diagnosis medis final</strong>.
                    </div>

                    <!-- Tombol Rekomendasi Tindak Lanjut (Jadwalkan Telemedicine / Chat / IGD 119) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 pt-1">
                        <button type="button" id="diagScheduleTelemedicineBtn" class="py-2.5 px-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-semibold text-xs flex items-center justify-center space-x-1.5 border border-slate-200 transition-colors">
                            <i class="fas fa-calendar-plus text-teal-600"></i>
                            <span>Jadwalkan Telemedicine</span>
                        </button>
                        <button type="button" id="diagConsultDoctorNowBtn" class="py-2.5 px-3 rounded-xl bg-teal-600 hover:bg-teal-700 text-white font-semibold text-xs flex items-center justify-center space-x-1.5 shadow-sm transition-colors">
                            <i class="fas fa-user-md"></i>
                            <span>Konsultasi Dokter Pekanbaru</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Kartu Riwayat Cek Diagnosis Mandiri (Tanpa Data Dummy) -->
            <div class="bg-white rounded-xl shadow-sm p-4 sm:p-5 border border-slate-200">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-sm font-bold text-slate-800">Riwayat Skrining Gejala Saya</h3>
                    <span id="diagHistoryCountBadge" class="text-[10px] font-semibold bg-slate-100 text-slate-600 px-2.5 py-0.5 rounded-full">0 Riwayat</span>
                </div>
                <div id="diagHistoryListContainer" class="space-y-2.5 max-h-60 overflow-y-auto">
                    <div id="emptyDiagHistoryState" class="py-6 text-center text-slate-400 text-xs">
                        Belum ada riwayat pengecekan gejala yang dilakukan.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
