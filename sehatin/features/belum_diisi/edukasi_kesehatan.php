<!-- ====================================================================== -->
<!-- MODUL FITUR EDUKASI & PUSTAKA ARTIKEL KESEHATAN POPULER MASA KINI      -->
<!-- ====================================================================== -->
<div id="featureEdukasiSubView" class="unfilled-feature-view hidden max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8 mt-5 space-y-4 animate-fade-in">
    <!-- Header Edukasi Kesehatan (Tanpa Tulisan Jumlah Total Artikel) -->
    <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200 flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center space-x-3">
            <button type="button" class="back-to-dashboard-btn px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-gray-700 text-xs font-semibold flex items-center space-x-1.5 transition-colors focus:outline-none">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Beranda</span>
            </button>
            <div>
                <div class="flex items-center space-x-2">
                    <h2 class="text-sm sm:text-base font-bold text-gray-800">Pusat Edukasi & Artikel Kesehatan Populer Masa Kini</h2>
                    <span id="edukasiTotalBadge" class="bg-teal-50 text-teal-700 border border-teal-200 text-[10px] font-bold px-2.5 py-0.5 rounded-full">
                        Topik Populer & Terkini
                    </span>
                </div>
                <p class="text-[11px] text-gray-400">Kumpulan artikel kesehatan populer zaman sekarang, gaya hidup modern, kesehatan mental, diet nutrisi, dan panduan medis sehari-hari</p>
            </div>
        </div>
        <a
            id="openGoogleHealthPortalLink"
            href="https://www.google.com/search?q=artikel+kesehatan+populer+kemenkes+who+indonesia"
            target="_blank"
            rel="noopener noreferrer"
            class="px-3.5 py-2 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold shadow-sm flex items-center space-x-1.5 transition-colors"
        >
            <i class="fab fa-google"></i>
            <span>Cari di Google Kesehatan</span>
        </a>
    </div>

    <!-- Bar Pencarian, Filter Kategori, & Tag Tren Kesehatan Zaman Sekarang -->
    <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-200 space-y-3">
        <div class="flex flex-col md:flex-row gap-2.5">
            <div class="relative flex-1">
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400 text-xs">
                    <i class="fas fa-search"></i>
                </span>
                <input
                    type="text"
                    id="searchEdukasiArticleInput"
                    placeholder="Cari artikel kesehatan populer (contoh: burnout, intermittent fasting, gula tersembunyi, gut health, kolesterol, insomnia)..."
                    class="w-full pl-9 pr-4 py-2 text-xs bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 focus:bg-white"
                >
            </div>
            <select
                id="filterEdukasiCategorySelect"
                class="px-3.5 py-2 text-xs bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-600 text-gray-700 font-medium"
            >
                <option value="ALL">Semua Kategori Artikel Populer</option>
                <option value="Tren Kesehatan & Gaya Hidup Modern">Tren Kesehatan & Gaya Hidup Modern</option>
                <option value="Penyakit Dalam & Metabolik">Penyakit Dalam & Metabolik</option>
                <option value="Kesehatan Jantung & Pembuluh Darah">Kesehatan Jantung & Pembuluh Darah</option>
                <option value="Nutrisi, Gizi & Diet Sehat">Nutrisi, Gizi & Diet Sehat</option>
                <option value="Kesehatan Mental & Kualitas Tidur">Kesehatan Mental & Kualitas Tidur</option>
                <option value="Olahraga, Kebugaran & Fisik">Olahraga, Kebugaran & Fisik</option>
                <option value="Kesehatan Kulit & Dermatologi">Kesehatan Kulit & Dermatologi</option>
                <option value="Kesehatan Ibu, Bayi & Anak">Kesehatan Ibu, Bayi & Anak</option>
                <option value="Pencegahan Infeksi & Imunisasi">Pencegahan Infeksi & Imunisasi</option>
                <option value="Obat, Suplemen & Farmasi">Obat, Suplemen & Farmasi</option>
                <option value="Kesehatan Mata, Gigi & Lansia">Kesehatan Mata, Gigi & Lansia</option>
            </select>
        </div>

        <!-- Bar Pilihan Cepat Topik Populer Zaman Sekarang -->
        <div class="flex flex-wrap items-center gap-1.5 pt-1">
            <span class="text-[11px] font-semibold text-slate-500 mr-1"><i class="fas fa-fire text-teal-600 mr-1"></i>Topik Populer:</span>
            <button type="button" data-edukasi-topic="" class="edukasi-topic-pill px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-teal-600 text-white transition-colors">Semua Topik</button>
            <button type="button" data-edukasi-topic="Intermittent Fasting" class="edukasi-topic-pill px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">Intermittent Fasting</button>
            <button type="button" data-edukasi-topic="Burnout" class="edukasi-topic-pill px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">Burnout & Stres</button>
            <button type="button" data-edukasi-topic="Gula" class="edukasi-topic-pill px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">Bahaya Gula & UPF</button>
            <button type="button" data-edukasi-topic="Tidur" class="edukasi-topic-pill px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">Sleep Hygiene</button>
            <button type="button" data-edukasi-topic="Usus" class="edukasi-topic-pill px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">Gut Microbiome</button>
            <button type="button" data-edukasi-topic="Jantung" class="edukasi-topic-pill px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">Kesehatan Jantung Muda</button>
            <button type="button" data-edukasi-topic="Skin Barrier" class="edukasi-topic-pill px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 transition-colors">Skin Barrier & UV</button>
        </div>

        <!-- Navigasi Halaman (Tanpa Menampilkan Angka Total Seluruh Artikel) -->
        <div class="flex flex-wrap items-center justify-between gap-2 pt-2 border-t border-slate-200 text-xs">
            <span id="edukasiShowingStatus" class="text-gray-500 font-medium">
                Menampilkan daftar artikel kesehatan populer & terkini
            </span>
            <div class="flex items-center space-x-2">
                <button type="button" id="edukasiPrevPageBtn" class="px-3 py-1.5 rounded-xl border border-gray-200 hover:bg-gray-50 text-gray-700 font-semibold transition-colors">
                    <i class="fas fa-chevron-left mr-1"></i>Sebelumnya
                </button>
                <select id="edukasiPageSelect" class="px-2.5 py-1.5 rounded-xl border border-gray-200 bg-gray-50 text-gray-700 font-semibold focus:outline-none focus:ring-2 focus:ring-teal-600"></select>
                <button type="button" id="edukasiNextPageBtn" class="px-3 py-1.5 rounded-xl border border-gray-200 hover:bg-gray-50 text-gray-700 font-semibold transition-colors">
                    Berikutnya<i class="fas fa-chevron-right ml-1"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Panel Baca Artikel Lengkap (Tampil Saat Artikel Diklik) -->
    <div id="edukasiReaderPanel" class="hidden bg-white rounded-2xl shadow-md p-5 border-2 border-teal-200 space-y-3 animate-fade-in">
        <div class="flex flex-wrap items-start justify-between gap-3 border-b border-slate-200 pb-3">
            <div>
                <div class="flex items-center space-x-2">
                    <span id="readerArticleNumberBadge" class="text-[10px] font-bold bg-teal-600 text-white px-2.5 py-0.5 rounded-full">Artikel Populer</span>
                    <span id="readerArticleCategoryBadge" class="text-[10px] font-semibold bg-teal-50 text-teal-700 border border-teal-200 px-2.5 py-0.5 rounded-full">Kategori</span>
                </div>
                <h3 id="readerArticleTitle" class="text-base sm:text-lg font-bold text-gray-800 mt-1.5">Judul Artikel Kesehatan</h3>
                <p id="readerArticleMeta" class="text-[11px] text-gray-400 mt-0.5">Referensi Edukasi Kesehatan • 4 Menit Baca</p>
            </div>
            <button type="button" id="closeEdukasiReaderBtn" class="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-gray-700 text-xs font-semibold flex items-center space-x-1">
                <i class="fas fa-times"></i>
                <span>Tutup Artikel</span>
            </button>
        </div>
        <div id="readerArticleBody" class="text-xs sm:text-sm text-gray-700 leading-relaxed space-y-2.5"></div>
        <div class="pt-3 border-t border-slate-200 flex flex-wrap items-center justify-between gap-2">
            <span class="text-[11px] text-gray-400">Ingin membaca referensi jurnal dan artikel serupa langsung di mesin pencari Google?</span>
            <a
                id="readerOpenGoogleLink"
                href="https://www.google.com"
                target="_blank"
                rel="noopener noreferrer"
                class="px-4 py-2 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold flex items-center space-x-1.5 shadow-sm transition-colors"
            >
                <i class="fab fa-google"></i>
                <span>Buka Artikel Ini di Google</span>
            </a>
        </div>
    </div>

    <!-- Grid Kartu Artikel Kesehatan Populer -->
    <div id="edukasiArticlesGrid" class="grid grid-cols-1 md:grid-cols-2 gap-4"></div>
</div>
