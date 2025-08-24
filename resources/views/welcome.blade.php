<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita - Berita Terkini Indonesia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Animasi untuk breaking news ticker */
        .animate-marquee {
            display: inline-block;
            animation: marquee 20s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        /* Menghentikan animasi saat hover */
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="bg-gray-50 font-inter">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold text-blue-600">Portal<span class="text-gray-800">News</span></h1>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="#" class="text-blue-600 hover:text-blue-800 px-3 py-2 text-sm font-medium border-b-2 border-blue-600">Beranda</a>
                        <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium hover:border-b-2 hover:border-blue-600 transition-all">Politik</a>
                        <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium hover:border-b-2 hover:border-blue-600 transition-all">Ekonomi</a>
                        <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium hover:border-b-2 hover:border-blue-600 transition-all">Teknologi</a>
                        <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium hover:border-b-2 hover:border-blue-600 transition-all">Olahraga</a>
                        <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium hover:border-b-2 hover:border-blue-600 transition-all">Hiburan</a>
                    </div>
                </div>

                <!-- Search & Mobile Menu Button -->
                <div class="flex items-center space-x-4">
                    <!-- Search -->
                    <div class="hidden md:block">
                        <div class="relative">
                            <input type="text" placeholder="Cari berita..." class="bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <button class="md:hidden text-gray-700 hover:text-blue-600" onclick="toggleMobileMenu()">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#" class="text-blue-600 block px-3 py-2 text-base font-medium bg-blue-50 rounded-md">Beranda</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 block px-3 py-2 text-base font-medium hover:bg-gray-50 rounded-md">Politik</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 block px-3 py-2 text-base font-medium hover:bg-gray-50 rounded-md">Ekonomi</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 block px-3 py-2 text-base font-medium hover:bg-gray-50 rounded-md">Teknologi</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 block px-3 py-2 text-base font-medium hover:bg-gray-50 rounded-md">Olahraga</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 block px-3 py-2 text-base font-medium hover:bg-gray-50 rounded-md">Hiburan</a>
            </div>
            <div class="px-4 py-3 border-t border-gray-200">
                <input type="text" placeholder="Cari berita..." class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
    </nav>

    <!-- Breaking News Ticker -->
    <div class="bg-red-600 text-white py-2 overflow-hidden">
        <div class="flex items-center">
            <div class="bg-red-800 px-4 py-1 text-sm font-bold uppercase">Breaking News</div>
            <div class="flex-1 ml-4">
                <div class="animate-marquee whitespace-nowrap text-sm">
                    <span class="mx-8">🔴 Pemerintah mengumumkan kebijakan ekonomi baru untuk mendorong pertumbuhan UMKM</span>
                    <span class="mx-8">🔴 Tim Garuda menang 2-1 melawan Malaysia di Piala AFF</span>
                    <span class="mx-8">🔴 Teknologi AI terbaru diluncurkan oleh startup Indonesia</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Hero Section -->
        <section class="mb-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Featured Article -->
                <div class="lg:col-span-2">
                    <article class="relative group cursor-pointer overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300">
                        <img src="https://images.unsplash.com/photo-1495020689067-958852a7765e?w=800&h=500&fit=crop" alt="Featured News" class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <span class="inline-block bg-blue-600 text-xs font-semibold px-3 py-1 rounded-full mb-3">POLITIK</span>
                            <h2 class="text-2xl md:text-3xl font-bold mb-3 leading-tight">Presiden Jokowi Resmikan Infrastruktur Baru di Kawasan Timur Indonesia</h2>
                            <p class="text-gray-200 mb-4 line-clamp-2">Pembangunan infrastruktur besar-besaran di wilayah timur Indonesia diharapkan dapat meningkatkan konektivitas dan perekonomian daerah...</p>
                            <div class="flex items-center text-sm text-gray-300">
                                <span>By Admin Portal</span>
                                <span class="mx-2">•</span>
                                <span>2 jam yang lalu</span>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Side Articles -->
                <div class="space-y-6">
                    <article class="group cursor-pointer">
                        <div class="flex space-x-4">
                            <img src="https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=150&h=100&fit=crop" alt="News" class="w-24 h-20 object-cover rounded-lg group-hover:opacity-75 transition-opacity">
                            <div class="flex-1">
                                <span class="text-xs text-blue-600 font-semibold">EKONOMI</span>
                                <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-blue-600 transition-colors line-clamp-2">Bursa Saham Indonesia Menguat di Pembukaan Perdagangan</h3>
                                <p class="text-xs text-gray-500">1 jam yang lalu</p>
                            </div>
                        </div>
                    </article>

                    <article class="group cursor-pointer">
                        <div class="flex space-x-4">
                            <img src="https://images.unsplash.com/photo-1518709268805-4e9042af2176?w=150&h=100&fit=crop" alt="News" class="w-24 h-20 object-cover rounded-lg group-hover:opacity-75 transition-opacity">
                            <div class="flex-1">
                                <span class="text-xs text-green-600 font-semibold">TEKNOLOGI</span>
                                <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-blue-600 transition-colors line-clamp-2">Startup Indonesia Raih Pendanaan Seri A Senilai $10 Juta</h3>
                                <p class="text-xs text-gray-500">3 jam yang lalu</p>
                            </div>
                        </div>
                    </article>

                    <article class="group cursor-pointer">
                        <div class="flex space-x-4">
                            <img src="https://images.unsplash.com/photo-1431324155629-1a6deb1dec8d?w=150&h=100&fit=crop" alt="News" class="w-24 h-20 object-cover rounded-lg group-hover:opacity-75 transition-opacity">
                            <div class="flex-1">
                                <span class="text-xs text-purple-600 font-semibold">OLAHRAGA</span>
                                <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-blue-600 transition-colors line-clamp-2">Timnas Indonesia Lolos ke Semifinal Piala AFF 2024</h3>
                                <p class="text-xs text-gray-500">4 jam yang lalu</p>
                            </div>
                        </div>
                    </article>

                    <article class="group cursor-pointer">
                        <div class="flex space-x-4">
                            <img src="https://images.unsplash.com/photo-1444418776041-9c7e33cc5a9c?w=150&h=100&fit=crop" alt="News" class="w-24 h-20 object-cover rounded-lg group-hover:opacity-75 transition-opacity">
                            <div class="flex-1">
                                <span class="text-xs text-red-600 font-semibold">HIBURAN</span>
                                <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-blue-600 transition-colors line-clamp-2">Film Indonesia Raih Penghargaan di Festival Cannes</h3>
                                <p class="text-xs text-gray-500">5 jam yang lalu</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Latest News Section -->
        <section class="mb-12">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Berita Terbaru</h2>
                <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Lihat Semua →</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- News Card 1 -->
                <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=400&h=250&fit=crop" alt="News" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full">POLITIK</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">DPR Setujui RUU Omnibus Law Cipta Kerja dengan Berbagai Revisi</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">Dewan Perwakilan Rakyat menyetujui Rancangan Undang-Undang Omnibus Law Cipta Kerja setelah melalui berbagai diskusi dan revisi...</p>
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span>By Redaksi</span>
                            <span>6 jam yang lalu</span>
                        </div>
                    </div>
                </article>

                <!-- News Card 2 -->
                <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1559526324-4b87b5e36e44?w=400&h=250&fit=crop" alt="News" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-4 left-4 bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full">EKONOMI</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">Inflasi Indonesia Turun ke Level Terendah dalam 5 Tahun Terakhir</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">Badan Pusat Statistik melaporkan bahwa tingkat inflasi Indonesia berhasil ditekan hingga mencapai level terendah...</p>
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span>By Tim Ekonomi</span>
                            <span>8 jam yang lalu</span>
                        </div>
                    </div>
                </article>

                <!-- News Card 3 -->
                <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=400&h=250&fit=crop" alt="News" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-4 left-4 bg-purple-600 text-white text-xs font-semibold px-3 py-1 rounded-full">TEKNOLOGI</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">Google Luncurkan Data Center Pertama di Indonesia</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">Raksasa teknologi Google resmi mengoperasikan pusat data pertamanya di Indonesia yang berlokasi di Jakarta...</p>
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span>By Tech Reporter</span>
                            <span>10 jam yang lalu</span>
                        </div>
                    </div>
                </article>

                <!-- News Card 4 -->
                <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1574781330855-d0db70d17027?w=400&h=250&fit=crop" alt="News" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-4 left-4 bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded-full">OLAHRAGA</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">Atlet Indonesia Raih Medali Emas di Kejuaraan Dunia Badminton</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">Prestasi membanggakan ditorehkan atlet bulutangkis Indonesia dalam kejuaraan dunia yang berlangsung di Denmark...</p>
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span>By Sports Desk</span>
                            <span>12 jam yang lalu</span>
                        </div>
                    </div>
                </article>

                <!-- News Card 5 -->
                <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=250&fit=crop" alt="News" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-4 left-4 bg-yellow-600 text-white text-xs font-semibold px-3 py-1 rounded-full">KESEHATAN</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">Vaksin COVID-19 Produksi Dalam Negeri Mulai Didistribusikan</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">Kementerian Kesehatan mengumumkan dimulainya distribusi vaksin COVID-19 yang diproduksi oleh perusahaan farmasi lokal...</p>
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span>By Health Reporter</span>
                            <span>1 hari yang lalu</span>
                        </div>
                    </div>
                </article>

                <!-- News Card 6 -->
                <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=400&h=250&fit=crop" alt="News" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-4 left-4 bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full">PENDIDIKAN</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">Universitas Indonesia Masuk 100 Besar Universitas Terbaik Dunia</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">Dalam pemeringkatan QS World University Rankings terbaru, Universitas Indonesia berhasil masuk ke dalam 100 besar...</p>
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span>By Education Desk</span>
                            <span>1 hari yang lalu</span>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <!-- Popular Categories -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Kategori Populer</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white p-4 rounded-lg text-center transition-colors">
                    <div class="text-2xl mb-2">🏛️</div>
                    <div class="font-semibold">Politik</div>
                </a>
                <a href="#" class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-lg text-center transition-colors">
                    <div class="text-2xl mb-2">💰</div>
                    <div class="font-semibold">Ekonomi</div>
                </a>
                <a href="#" class="bg-purple-500 hover:bg-purple-600 text-white p-4 rounded-lg text-center transition-colors">
                    <div class="text-2xl mb-2">💻</div>
                    <div class="font-semibold">Teknologi</div>
                </a>
                <a href="#" class="bg-red-500 hover:bg-red-600 text-white p-4 rounded-lg text-center transition-colors">
                    <div class="text-2xl mb-2">⚽</div>
                    <div class="font-semibold">Olahraga</div>
                </a>
                <a href="#" class="bg-pink-500 hover:bg-pink-600 text-white p-4 rounded-lg text-center transition-colors">
                    <div class="text-2xl mb-2">🎬</div>
                    <div class="font-semibold">Hiburan</div>
                </a>
                <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-white p-4 rounded-lg text-center transition-colors">
                    <div class="text-2xl mb-2">🏥</div>
                    <div class="font-semibold">Kesehatan</div>
                </a>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section class="bg-blue-600 rounded-2xl p-8 text-white text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Dapatkan Berita Terbaru</h2>
            <p class="text-blue-100 mb-6 max-w-2xl mx-auto">Berlangganan newsletter kami untuk mendapatkan update berita terkini langsung di email Anda</p>
            <div class="max-w-md mx-auto flex gap-4">
                <input type="email" placeholder="Masukkan email Anda" class="flex-1 px-4 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300">
                <button class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">Berlangganan</button>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold mb-4">Portal<span class="text-blue-400">News</span></h3>
                    <p class="text-gray-400 mb-6 max-w-md">Portal berita terpercaya yang menyajikan informasi terkini dan akurat dari berbagai bidang untuk masyarakat Indonesia.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.849.07 1.366.062 2.633.326 3.608 1.301.975.975 1.24 2.242 1.301 3.608.058 1.265.07 1.645.07 4.849s-.012 3.584-.07 4.849c-.062 1.366-.326 2.633-1.301 3.608-.975.975-2.242 1.24-3.608 1.301-1.265.058-1.645.07-4.849.07s-3.584-.012-4.849-.07c-1.366-.062-2.633-.326-3.608-1.301-.975-.975-1.24-2.242-1.301-3.608-.058-1.265-.07-1.645-.07-4.849s.012-3.584.07-4.849c.062-1.366.326-2.633 1.301-3.608.975-.975 2.242-1.24 3.608-1.301 1.265-.058 1.645-.07 4.849-.07zm0-2.163c-3.259 0-3.667.014-4.947.072-1.406.062-2.713.335-3.897 1.519-1.184 1.184-1.457 2.491-1.519 3.897-.058 1.28-.072 1.688-.072 4.947s.014 3.667.072 4.947c.062 1.406.335 2.713 1.519 3.897 1.184 1.184 2.491 1.457 3.897 1.519 1.28.058 1.688.072 4.947.072s3.667-.014 4.947-.072c1.406-.062 2.713-.335 3.897-1.519 1.184-1.184 1.457-2.491 1.519-3.897.058-1.28.072-1.688.072-4.947s-.014-3.667-.072-4.947c-.062-1.406-.335-2.713-1.519-3.897-1.184-1.184-2.491-1.457-3.897-1.519-1.28-.058-1.688-.072-4.947-.072z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Tautan Cepat</h4>
                    <ul class="text-gray-400 space-y-2">
                        <li><a href="#" class="hover:text-white transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                    <ul class="text-gray-400 space-y-2">
                        <li>Email: info@portalnews.id</li>
                        <li>Telepon: +62 21 1234 5678</li>
                        <li>Alamat: Jl. Berita No. 123, Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="mt-8 border-t border-gray-700 pt-6 text-center text-gray-400">
                <p>&copy; 2025 PortalNews. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        }
    </script>
</body>
</html>