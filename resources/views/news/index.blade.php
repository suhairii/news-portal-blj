<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel & Berita - PT. Bumi Laksamana Jaya</title>
    <meta name="description"
        content="Artikel dan berita terkini seputar PT. Bumi Laksamana Jaya, industri oil & gas, dan perkembangan bisnis terbaru.">

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
            /* Primary Colors - Blue */
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

            --primary-950: #172554;

            /* Secondary Colors - Red */
            --secondary-50: #fef2f2;
            --secondary-100: #fee2e2;
            --secondary-200: #fecaca;
            --secondary-300: #fca5a5;
            --secondary-400: #f87171;
            --secondary-500: #ef4444;
            --secondary-600: #dc2626;
            --secondary-700: #b91c1c;
            --secondary-800: #991b1b;
            --secondary-900: #7f1d1d;
            --secondary-950: #450a0a;

            /* Oil-themed Colors */
            --oil-gold: #fbbf24;
            --oil-dark: #1f2937;
            --oil-amber: #f59e0b;
            --oil-orange: #ea580c;
            --oil-black: #111827;

            /* Neutral Colors */
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

            /* White background */
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

        /* White Background with Oil Droplets - SAMA PERSIS SEPERTI LANDING PAGE */
        .oil-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 50%, #ffffff 100%);
            z-index: -1000;
        }

        /* Animated Oil Droplets - SAMA PERSIS SEPERTI LANDING PAGE */
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
            box-shadow:
                0 4px 15px rgba(31, 41, 55, 0.3),
                inset 2px 2px 5px rgba(255, 255, 255, 0.2);
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

        /* Different sized oil droplets - SAMA PERSIS SEPERTI LANDING PAGE */
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

        .oil-droplet:nth-child(7) {
            width: 24px;
            height: 30px;
            left: 65%;
            animation-delay: 2.5s;
            animation-duration: 10.5s;
        }

        .oil-droplet:nth-child(8) {
            width: 19px;
            height: 24px;
            left: 75%;
            animation-delay: 4.5s;
            animation-duration: 12.5s;
        }

        .oil-droplet:nth-child(9) {
            width: 17px;
            height: 21px;
            left: 85%;
            animation-delay: 1.5s;
            animation-duration: 11.5s;
        }

        .oil-droplet:nth-child(10) {
            width: 21px;
            height: 26px;
            left: 95%;
            animation-delay: 3.5s;
            animation-duration: 13.5s;
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

        /* Glassmorphism Components - SAMA PERSIS SEPERTI LANDING PAGE */
        .glass {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow:
                0 8px 32px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
        }

        .glass-strong {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 24px;
            box-shadow:
                0 16px 40px rgba(0, 0, 0, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }

        .glass-blue {
            background: rgba(59, 130, 246, 0.1);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 20px;
            box-shadow:
                0 8px 32px rgba(59, 130, 246, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .glass-red {
            background: rgba(239, 68, 68, 0.1);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 20px;
            box-shadow:
                0 8px 32px rgba(239, 68, 68, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        /* Container - SAMA SEPERTI LANDING PAGE */
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

        /* Section Styles - SAMA SEPERTI LANDING PAGE */
        .section {
            padding: 6rem 0;
            position: relative;
            z-index: 1;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-badge {
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

        .section-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            margin-bottom: 1rem;
            font-family: 'Montserrat', sans-serif;
            color: var(--gray-900);
        }

        .section-title .accent-text {
            color: var(--primary-600);
        }

        .section-description {
            font-size: 1.25rem;
            color: var(--gray-600);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Search & Filter Section */
        .search-filter-section {
            margin-bottom: 3rem;
        }

        .search-filter-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 300px;
            max-width: 500px;
        }

        .search-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            color: var(--gray-700);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-500);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 1.1rem;
        }

        .filter-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .filter-btn {
            padding: 0.75rem 1.25rem;
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.8);
            color: var(--gray-700);
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--primary-500);
            color: white;
            border-color: var(--primary-500);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        /* Featured News Section */
        .featured-section {
            margin-bottom: 4rem;
        }

        .featured-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .featured-main {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            height: 500px;
            cursor: pointer;
            transition: all 0.4s ease;
        }

        .featured-main:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.2);
        }

        .featured-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .featured-main:hover .featured-image {
            transform: scale(1.1);
        }

        .featured-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            padding: 2rem;
            color: white;
        }

        .featured-category {
            display: inline-block;
            background: var(--primary-500);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .featured-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .featured-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .featured-sidebar {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .featured-small {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            height: 160px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .featured-small:hover {
            transform: translateX(8px) scale(1.05);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .featured-small .featured-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .featured-small .featured-overlay {
            padding: 1.5rem;
        }

        .featured-small .featured-title {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .featured-small .featured-meta {
            font-size: 0.8rem;
        }

        /* News Grid */
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

        /* Scroll Animations - SAMA SEPERTI LANDING PAGE */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }

            .main {
                padding-top: 100px;
            }

            .section {
                padding: 4rem 0;
            }

            .featured-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .featured-main {
                height: 400px;
            }

            .featured-sidebar {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1rem;
            }

            .news-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .news-card {
                height: auto;
                min-height: 420px;
            }

            .search-filter-container {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                min-width: auto;
                max-width: none;
            }

            .filter-buttons {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .featured-sidebar {
                grid-template-columns: 1fr;
            }

            .section-title {
                font-size: 2rem;
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

    <div class="oil-bg"></div>
    <div class="oil-droplets">
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
    </div>

    <!-- Include Navbar Component -->
    @include('components.navbar', ['isLandingPage' => false, 'currentPage' => 'news'])

    <!-- Main Content -->
    <main class="main">
        <!-- News Section -->
        <section class="section">
            <div class="container">
                <!-- Section Header -->
                <div class="section-header" data-aos="fade-up">
                    <div class="section-badge">
                        <i class="fas fa-newspaper"></i>
                        <span>Informasi Terkini</span>
                    </div>
                    <h1 class="section-title">
                        Artikel & <span class="accent-text">Berita</span>
                    </h1>
                    <p class="section-description">
                        Dapatkan informasi terbaru seputar PT BLJ, industri oil & gas, dan perkembangan bisnis terkini
                        dari sumber terpercaya.
                    </p>
                </div>

                <!-- Search & Filter -->
                <div class="search-filter-section glass-strong" data-aos="fade-up" data-aos-delay="100">
                    <div style="padding: 2rem;">
                        <div class="search-filter-container">
                            <div class="search-box">
                                <i class="fas fa-search search-icon"></i>
                                <form action="{{ route('news.search') }}" method="GET">
                                    <input type="text" name="q" class="search-input"
                                        placeholder="Cari artikel atau berita..." value="{{ request('q') }}">
                                </form>
                            </div>
                            <div class="filter-buttons">
                                <a href="{{ route('berita') }}"
                                    class="filter-btn {{ !request('category') ? 'active' : '' }}">Semua</a>
                                @foreach($categories as $category)
                                    <a href="{{ route('news.category', $category) }}"
                                        class="filter-btn {{ request('category') == $category ? 'active' : '' }}">{{ $category }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Featured News -->
                @if($featuredNews->count() > 0)
                    <div class="featured-section" data-aos="fade-up" data-aos-delay="200">
                        <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 2rem; color: var(--gray-900);">
                            Berita <span style="color: var(--primary-600);">Utama</span>
                        </h2>

                        <div class="featured-grid">
                            @if($featuredNews->first())
                                <div class="featured-main glass-strong"
                                    onclick="location.href='{{ route('news.show', $featuredNews->first()->slug) }}'">
                                    <img src="{{ $featuredNews->first()->thumbnail_url }}"
                                        alt="{{ $featuredNews->first()->title }}" class="featured-image">
                                    <div class="featured-overlay">
                                        <span class="featured-category">{{ $featuredNews->first()->category }}</span>
                                        <h3 class="featured-title">{{ $featuredNews->first()->title }}</h3>
                                        <div class="featured-meta">
                                            <span><i class="fas fa-calendar-alt"></i>
                                                {{ $featuredNews->first()->published_at->format('d M Y') }}</span>
                                            <span><i class="fas fa-clock"></i> {{ $featuredNews->first()->reading_time }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="featured-sidebar">
                                @foreach($featuredNews->skip(1)->take(2) as $news)
                                    <div class="featured-small glass-strong"
                                        onclick="location.href='{{ route('news.show', $news->slug) }}'">
                                        <img src="{{ $news->thumbnail_url }}" alt="{{ $news->title }}" class="featured-image">
                                        <div class="featured-overlay">
                                            <span class="featured-category">{{ $news->category }}</span>
                                            <h4 class="featured-title">{{ Str::limit($news->title, 60) }}</h4>
                                            <div class="featured-meta">
                                                <span><i class="fas fa-calendar-alt"></i>
                                                    {{ $news->published_at->format('d M Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Latest News Grid -->
                <div class="latest-section">
                    <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 2rem; color: var(--gray-900);"
                        data-aos="fade-up">
                        Berita <span style="color: var(--primary-600);">Terbaru</span>
                    </h2>

                    @if($latestNews->count() > 0)
                        <div class="news-grid">
                            @foreach($latestNews as $index => $news)
                                <article class="news-card glass-strong" data-aos="fade-up"
                                    data-aos-delay="{{ ($index % 3) * 100 + 300 }}"
                                    onclick="location.href='{{ route('news.show', $news->slug) }}'">
                                    <div class="news-image-container">
                                        <img src="{{ $news->thumbnail_url }}" alt="{{ $news->title }}" class="news-image">
                                        <span class="news-category-badge">{{ $news->category }}</span>
                                    </div>
                                    <div class="news-content">
                                        <h3 class="news-title">{{ $news->title }}</h3>
                                        <p class="news-excerpt">{{ $news->excerpt }}</p>
                                        <div class="news-meta">
                                            <span class="news-date">
                                                <i class="fas fa-calendar-alt"></i>
                                                {{ $news->published_at->format('d M Y') }}
                                            </span>
                                            <span class="news-read-time">
                                                <i class="fas fa-clock"></i>
                                                {{ $news->reading_time }}
                                            </span>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @else
                        <div class="glass-strong" style="padding: 3rem; text-align: center;" data-aos="fade-up">
                            <i class="fas fa-newspaper"
                                style="font-size: 4rem; color: var(--gray-300); margin-bottom: 1rem;"></i>
                            <h3 style="color: var(--gray-600); margin-bottom: 0.5rem;">Belum ada berita</h3>
                            <p style="color: var(--gray-500);">Belum ada artikel atau berita yang dipublikasikan.</p>
                        </div>
                    @endif
                </div>
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

        // Parallax effect for oil droplets - SAMA SEPERTI LANDING PAGE
        let ticking = false;

        function updateDroplets() {
            const scrolled = window.pageYOffset;
            const droplets = document.querySelectorAll('.oil-droplet');

            droplets.forEach((droplet, index) => {
                const speed = (index % 3 + 1) * 0.02;
                const direction = index % 2 === 0 ? 1 : -1;
                const currentTransform = droplet.style.transform || '';

                // Only add parallax if it doesn't interfere with existing animation
                if (!currentTransform.includes('translateY')) {
                    droplet.style.transform += ` translateY(${scrolled * speed * direction}px)`;
                }
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

        // Enhanced scroll animations - SAMA SEPERTI LANDING PAGE
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all elements that should fade in
        document.querySelectorAll('.glass, .glass-strong, .glass-blue, .glass-red').forEach(el => {
            el.classList.add('fade-in');
            observer.observe(el);
        });

        // Search functionality
        const searchInput = document.querySelector('.search-input');
        if (searchInput) {
            searchInput.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    this.closest('form').submit();
                }
            });
        }

        console.log('📰 PT BLJ News Page loaded successfully!');
        console.log('✨ Oil droplets floating effect activated!');
        console.log('🎯 Glassmorphism theme with white background applied!');
        console.log('🔧 Styling konsisten dengan Landing Page!');
    </script>
</body>

</html>