<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian: {{ $query }} - PT. Bumi Laksamana Jaya</title>
    <meta name="description" content="Hasil pencarian untuk '{{ $query }}' di website PT. Bumi Laksamana Jaya">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        :root {
            /* Same CSS variables as news index */
            --primary-50: #eff6ff;
            --primary-100: #dbeafe;
            --primary-200: #bfdbfe;
            --primary-300: #93c5fd;
            --primary-400: #60a5fa;
            --primary-500: #3b82f6;
            --primary-600: #2563eb;
            --primary-700: #1d4ed8;
            --primary-800: #1e40af;
            --primary-900: #1e3a8a;
            --secondary-500: #ef4444;
            --secondary-600: #dc2626;
            --oil-gold: #fbbf24;
            --oil-dark: #1f2937;
            --oil-amber: #f59e0b;
            --oil-orange: #ea580c;
            --oil-black: #111827;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --bg-white: #ffffff;
            --bg-light: #fefefe;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: var(--bg-white);
            color: var(--gray-900);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* Background Elements - Same as other pages */
        .oil-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 50%, #ffffff 100%);
            z-index: -1000;
        }

        .oil-droplets {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -999;
            overflow: hidden;
            pointer-events: none;
        }

        .oil-droplet {
            position: absolute;
            background: var(--oil-dark);
            border-radius: 50% 50% 50% 70%;
            animation: floatOil 12s ease-in-out infinite;
            box-shadow: 0 4px 15px rgba(31, 41, 55, 0.3), inset 2px 2px 5px rgba(255, 255, 255, 0.2);
            opacity: 0.1;
            will-change: transform, opacity;
            backface-visibility: hidden;
        }

        .oil-droplet::before {
            content: '';
            position: absolute;
            top: 15%;
            left: 20%;
            width: 30%;
            height: 30%;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            filter: blur(1px);
        }

        .oil-droplet:nth-child(1) {
            width: 20px;
            height: 25px;
            left: 5%;
            animation-delay: 0s;
            animation-duration: 10s;
        }

        .oil-droplet:nth-child(2) {
            width: 15px;
            height: 20px;
            left: 15%;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .oil-droplet:nth-child(3) {
            width: 25px;
            height: 30px;
            left: 25%;
            animation-delay: 4s;
            animation-duration: 11s;
        }

        .oil-droplet:nth-child(4) {
            width: 18px;
            height: 22px;
            left: 35%;
            animation-delay: 1s;
            animation-duration: 13s;
        }

        .oil-droplet:nth-child(5) {
            width: 22px;
            height: 28px;
            left: 45%;
            animation-delay: 3s;
            animation-duration: 9s;
        }

        .oil-droplet:nth-child(6) {
            width: 16px;
            height: 20px;
            left: 55%;
            animation-delay: 5s;
            animation-duration: 14s;
        }

        @keyframes floatOil {
            0% {
                transform: translateY(100vh) translateX(0px) rotate(0deg) scale(0);
                opacity: 0;
            }

            10% {
                opacity: 0.1;
                transform: translateY(90vh) translateX(20px) rotate(20deg) scale(1);
            }

            25% {
                transform: translateY(75vh) translateX(-30px) rotate(45deg) scale(1.1);
            }

            50% {
                transform: translateY(50vh) translateX(40px) rotate(90deg) scale(0.9);
            }

            75% {
                transform: translateY(25vh) translateX(-20px) rotate(135deg) scale(1.2);
            }

            90% {
                opacity: 0.1;
                transform: translateY(10vh) translateX(10px) rotate(160deg) scale(0.8);
            }

            100% {
                transform: translateY(-10vh) translateX(0px) rotate(180deg) scale(0);
                opacity: 0;
            }
        }

        .oil-rig-bg {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 200px;
            z-index: -998;
            opacity: 0.05;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 200'%3E%3Cpath d='M100 200V100L120 80V60L140 40V20H160V40L180 60V80L200 100V200H100Z' fill='%23111827'/%3E%3Cpath d='M400 200V120L420 100V80L440 60V40H460V60L480 80V100L500 120V200H400Z' fill='%23111827'/%3E%3Cpath d='M700 200V110L720 90V70L740 50V30H760V50L780 70V90L800 110V200H700Z' fill='%23111827'/%3E%3Cpath d='M1000 200V105L1020 85V65L1040 45V25H1060V45L1080 65V85L1100 105V200H1000Z' fill='%23111827'/%3E%3C/svg%3E") repeat-x;
            background-size: 1200px 200px;
        }

        /* Glassmorphism Components */
        .glass-light {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1), inset 0 1px 0 rgba(255, 255, 255, 0.7), 0 0 0 1px rgba(255, 255, 255, 0.1);
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Main Content */
        .main {
            padding-top: 120px;
            min-height: 100vh;
        }

        /* Search Header */
        .search-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .search-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(59, 130, 246, 0.1);
            color: var(--primary-600);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1rem;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .search-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--gray-900);
        }

        .search-title .query-text {
            color: var(--primary-600);
        }

        .search-subtitle {
            font-size: 1.1rem;
            color: var(--gray-600);
            margin-bottom: 2rem;
        }

        /* Search Box */
        .search-box-container {
            max-width: 600px;
            margin: 0 auto 3rem;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 1.25rem 1.25rem 1.25rem 3.5rem;
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            font-family: 'Montserrat', sans-serif;
            font-size: 1.1rem;
            color: var(--gray-700);
            transition: all 0.3s ease;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-500);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1), 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .search-icon {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 1.2rem;
        }

        /* Results Section */
        .results-info {
            margin-bottom: 2rem;
            padding: 1.5rem;
            text-align: center;
            color: var(--gray-600);
        }

        .results-count {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-600);
        }

        /* News Grid - Same as index */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .news-card {
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            cursor: pointer;
            height: 480px;
            display: flex;
            flex-direction: column;
        }

        .news-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.15);
        }

        .news-image-container {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .news-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .news-card:hover .news-image {
            transform: scale(1.1);
        }

        .news-category-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--primary-500);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .news-content {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .news-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--gray-900);
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .news-excerpt {
            color: var(--gray-600);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .news-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.85rem;
            color: var(--gray-500);
            margin-top: auto;
        }

        .news-date {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .news-read-time {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-icon {
            font-size: 4rem;
            color: var(--gray-300);
            margin-bottom: 1.5rem;
        }

        .empty-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-600);
            margin-bottom: 1rem;
        }

        .empty-description {
            color: var(--gray-500);
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .empty-suggestions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }

        .suggestion-btn {
            padding: 0.75rem 1.5rem;
            background: rgba(59, 130, 246, 0.1);
            color: var(--primary-600);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .suggestion-btn:hover {
            background: var(--primary-500);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        /* Pagination - Same as index */
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 3rem;
        }

        .pagination {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .pagination a,
        .pagination span {
            padding: 0.75rem 1rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .pagination a {
            background: rgba(255, 255, 255, 0.8);
            color: var(--gray-700);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .pagination a:hover {
            background: var(--primary-500);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        .pagination .current {
            background: var(--primary-500);
            color: white;
            border: 1px solid var(--primary-500);
        }

        .pagination .disabled {
            background: var(--gray-100);
            color: var(--gray-400);
            cursor: not-allowed;
            border: 1px solid var(--gray-200);
        }

        /* Loading Animation */
        .loading {
            opacity: 0;
            animation: fadeIn 1s ease forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }

            .main {
                padding-top: 100px;
            }

            .news-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .news-card {
                height: auto;
                min-height: 420px;
            }

            .search-input {
                font-size: 1rem;
                padding: 1rem 1rem 1rem 3rem;
            }

            .empty-suggestions {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 480px) {
            .search-title {
                font-size: 1.8rem;
            }

            .news-card {
                min-height: 380px;
            }

            .news-content {
                padding: 1.25rem;
            }
        }
    </style>
</head>

<body class="loading">
    <!-- Background Elements -->
    <div class="oil-bg"></div>
    <div class="oil-droplets">
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
    </div>
    <div class="oil-rig-bg"></div>

    <!-- Include Navbar Component -->
    @include('components.navbar', ['isLandingPage' => false, 'currentPage' => 'news'])

    <!-- Main Content -->
    <main class="main">
        <section class="section">
            <div class="container">
                <!-- Search Header -->
                <div class="search-header" data-aos="fade-up">
                    <div class="search-badge">
                        <i class="fas fa-search"></i>
                        <span>Hasil Pencarian</span>
                    </div>
                    <h1 class="search-title">
                        Hasil untuk "<span class="query-text">{{ $query }}</span>"
                    </h1>
                    <p class="search-subtitle">
                        Menampilkan artikel dan berita yang relevan dengan pencarian Anda
                    </p>
                </div>

                <!-- Search Box -->
                <div class="search-box-container" data-aos="fade-up" data-aos-delay="100">
                    <form action="{{ route('news.search') }}" method="GET">
                        <div style="position: relative;">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" name="q" class="search-input" placeholder="Cari artikel atau berita..."
                                value="{{ $query }}" autofocus>
                        </div>
                    </form>
                </div>

                <!-- Results Info -->
                <div class="results-info glass-light" data-aos="fade-up" data-aos-delay="200">
                    @if($news->total() > 0)
                        <p class="results-count">
                            Ditemukan <strong>{{ $news->total() }}</strong> artikel yang cocok dengan pencarian
                            "{{ $query }}"
                        </p>
                    @else
                        <p class="results-count">
                            Tidak ditemukan artikel untuk pencarian "{{ $query }}"
                        </p>
                    @endif
                </div>

                <!-- Search Results -->
                @if($news->count() > 0)
                    <div class="news-grid">
                        @foreach($news as $index => $article)
                            <article class="news-card glass-light" data-aos="fade-up"
                                data-aos-delay="{{ ($index % 3) * 100 + 300 }}"
                                onclick="location.href='{{ route('news.show', $article->slug) }}'">
                                <div class="news-image-container">
                                    <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" class="news-image">
                                    <span class="news-category-badge">{{ $article->category }}</span>
                                </div>
                                <div class="news-content">
                                    <h3 class="news-title">{{ $article->title }}</h3>
                                    <p class="news-excerpt">{{ $article->excerpt }}</p>
                                    <div class="news-meta">
                                        <span class="news-date">
                                            <i class="fas fa-calendar-alt"></i>
                                            {{ $article->published_at->format('d M Y') }}
                                        </span>
                                        <span class="news-read-time">
                                            <i class="fas fa-clock"></i>
                                            {{ $article->reading_time }}
                                        </span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if($news->hasPages())
                        <div class="pagination-container">
                            {{ $news->appends(['q' => $query])->links() }}
                        </div>
                    @endif

                @else
                    <!-- Empty State -->
                    <div class="empty-state glass-light" data-aos="fade-up" data-aos-delay="300">
                        <i class="fas fa-search empty-icon"></i>
                        <h2 class="empty-title">Tidak Ada Hasil Ditemukan</h2>
                        <p class="empty-description">
                            Maaf, tidak ada artikel atau berita yang cocok dengan pencarian "<strong>{{ $query }}</strong>".
                            Coba gunakan kata kunci yang berbeda atau lebih umum.
                        </p>

                        <div class="empty-suggestions">
                            <h3 style="width: 100%; margin-bottom: 1rem; color: var(--gray-600);">Coba pencarian lain:</h3>
                            <a href="{{ route('news.search', ['q' => 'oil']) }}" class="suggestion-btn">Oil & Gas</a>
                            <a href="{{ route('news.search', ['q' => 'teknologi']) }}" class="suggestion-btn">Teknologi</a>
                            <a href="{{ route('news.search', ['q' => 'bisnis']) }}" class="suggestion-btn">Bisnis</a>
                            <a href="{{ route('news.search', ['q' => 'lingkungan']) }}"
                                class="suggestion-btn">Lingkungan</a>
                            <a href="{{ route('berita') }}" class="suggestion-btn">Lihat Semua Berita</a>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </main>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            easing: 'ease-out-cubic',
            once: true,
            offset: 100
        });

        // Parallax effect for oil droplets
        let ticking = false;

        function updateDroplets() {
            const scrolled = window.pageYOffset;
            const droplets = document.querySelectorAll('.oil-droplet');

            droplets.forEach((droplet, index) => {
                const speed = (index % 3 + 1) * 0.02;
                const direction = index % 2 === 0 ? 1 : -1;
                droplet.style.transform = `translateY(${scrolled * speed * direction}px)`;
            });

            ticking = false;
        }

        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(updateDroplets);
                ticking = true;
            }
        });

        // Loading animation completion
        window.addEventListener('load', () => {
            document.body.classList.remove('loading');
        });

        // Search form handling
        const searchForm = document.querySelector('form');
        const searchInput = document.querySelector('.search-input');

        if (searchForm && searchInput) {
            searchForm.addEventListener('submit', function (e) {
                const query = searchInput.value.trim();
                if (!query) {
                    e.preventDefault();
                    searchInput.focus();
                    return false;
                }
            });
        }

        console.log('🔍 Search page loaded successfully!');
        console.log('✨ Oil droplets floating effect activated!');
        console.log('🎯 Glassmorphism theme applied!');
    </script>
</body>

</html>