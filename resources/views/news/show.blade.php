<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }} - PT. Bumi Laksamana Jaya</title>
    <meta name="description" content="{{ $news->excerpt }}">
    <meta name="keywords" content="{{ $news->category }}, PT BLJ, oil gas, berita">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $news->title }}">
    <meta property="og:description" content="{{ $news->excerpt }}">
    <meta property="og:image" content="{{ $news->thumbnail_url }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">

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

            /* Secondary Colors - Red */
            --secondary-500: #ef4444;
            --secondary-600: #dc2626;

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

        .glass-strong {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 24px;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }

        /* Container - Diperluas untuk card yang lebih luas */
        .container {
            max-width: 1400px;
            /* Diperluas dari 1200px */
            margin: 0 auto;
            padding: 0 2rem;
        }

        .article-container {
            max-width: 1200px;
            /* Diperluas dari 800px */
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Main Content */
        .main {
            padding-top: 120px;
            min-height: 100vh;
        }

        /* Breadcrumb */
        .breadcrumb {
            padding: 1rem 0;
            margin-bottom: 2rem;
        }

        .breadcrumb-list {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: var(--gray-600);
        }

        .breadcrumb-link {
            color: var(--primary-600);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-link:hover {
            color: var(--primary-700);
        }

        .breadcrumb-separator {
            color: var(--gray-400);
        }

        /* Article Header */
        .article-header {
            margin-bottom: 3rem;
            text-align: center;
        }

        .article-category {
            display: inline-block;
            background: var(--primary-500);
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 16px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .article-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: var(--gray-900);
            line-height: 1.2;
        }

        .article-meta {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            color: var(--gray-600);
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .article-featured-image {
            width: 100%;
            height: 500px;
            /* Diperbesar dari 400px */
            object-fit: cover;
            border-radius: 20px;
            margin-bottom: 3rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }

        /* Article Content */
        .article-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--gray-800);
        }

        .article-content p {
            margin-bottom: 1.5rem;
        }

        .article-content h1,
        .article-content h2,
        .article-content h3,
        .article-content h4,
        .article-content h5,
        .article-content h6 {
            margin: 2rem 0 1rem 0;
            color: var(--gray-900);
            font-weight: 700;
            line-height: 1.3;
        }

        .article-content h1 {
            font-size: 2.5rem;
        }

        .article-content h2 {
            font-size: 2rem;
        }

        .article-content h3 {
            font-size: 1.75rem;
        }

        .article-content h4 {
            font-size: 1.5rem;
        }

        .article-content h5 {
            font-size: 1.25rem;
        }

        .article-content h6 {
            font-size: 1.1rem;
        }

        .article-content img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 2rem 0;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            display: block;
        }

        .article-content blockquote {
            border-left: 4px solid var(--primary-500);
            padding: 1.5rem;
            margin: 2rem 0;
            background: rgba(59, 130, 246, 0.05);
            border-radius: 0 12px 12px 0;
            font-style: italic;
            color: var(--gray-700);
        }

        .article-content ul,
        .article-content ol {
            margin: 1.5rem 0;
            padding-left: 2rem;
        }

        .article-content li {
            margin-bottom: 0.5rem;
        }

        .article-content table {
            width: 100%;
            border-collapse: collapse;
            margin: 2rem 0;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        .article-content th,
        .article-content td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--gray-200);
        }

        .article-content th {
            background: var(--primary-500);
            color: white;
            font-weight: 600;
        }

        .article-content strong,
        .article-content b {
            color: var(--gray-900);
            font-weight: 700;
        }

        .article-content em,
        .article-content i {
            color: var(--gray-700);
        }

        .article-content a {
            color: var(--primary-600);
            text-decoration: none;
            border-bottom: 1px solid transparent;
            transition: all 0.3s ease;
        }

        .article-content a:hover {
            border-bottom-color: var(--primary-600);
        }

        /* Share Buttons */
        .share-section {
            margin: 3rem 0;
            padding: 2rem;
            text-align: center;
        }

        .share-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--gray-900);
        }

        .share-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .share-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            color: white;
        }

        .share-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .share-btn.facebook {
            background: #1877f2;
        }

        .share-btn.twitter {
            background: #1da1f2;
        }

        .share-btn.whatsapp {
            background: #25d366;
        }

        .share-btn.telegram {
            background: #0088cc;
        }

        /* Related News */
        .related-section {
            margin-top: 4rem;
        }

        .related-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: var(--gray-900);
            text-align: center;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            /* Diperluas dari 280px */
            gap: 2.5rem;
            /* Diperbesar gap */
        }

        .related-card {
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            cursor: pointer;
            height: 450px;
            /* Diperbesar dari 420px */
            display: flex;
            flex-direction: column;
        }

        .related-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.15);
        }

        .related-image {
            width: 100%;
            height: 220px;
            /* Diperbesar dari 200px */
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .related-card:hover .related-image {
            transform: scale(1.1);
        }

        .related-content {
            padding: 1.75rem;
            /* Diperbesar dari 1.5rem */
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .related-category {
            background: var(--primary-500);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            width: fit-content;
            margin-bottom: 1rem;
        }

        .related-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--gray-900);
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }

        .related-date {
            font-size: 0.85rem;
            color: var(--gray-500);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: auto;
        }

        /* Back Button */
        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: rgba(59, 130, 246, 0.1);
            color: var(--primary-600);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .back-button:hover {
            background: var(--primary-500);
            color: white;
            transform: translateX(-5px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
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
        @media (max-width: 1024px) {
            .article-container {
                max-width: 900px;
                padding: 0 1.5rem;
            }

            .related-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {

            .container,
            .article-container {
                padding: 0 1rem;
            }

            .main {
                padding-top: 100px;
            }

            .article-title {
                font-size: 1.8rem;
            }

            .article-meta {
                gap: 1rem;
                justify-content: center;
            }

            .article-featured-image {
                height: 350px;
                /* Diperbesar dari 300px */
            }

            .article-content {
                font-size: 1rem;
            }

            .share-buttons {
                gap: 0.75rem;
            }

            .share-btn {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }

            .related-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .related-card {
                height: auto;
                min-height: 400px;
                /* Diperbesar dari 380px */
            }
        }

        @media (max-width: 480px) {
            .article-meta {
                flex-direction: column;
                gap: 0.75rem;
            }

            .share-buttons {
                flex-direction: column;
                align-items: center;
            }

            .share-btn {
                width: 200px;
                justify-content: center;
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



    <!-- Main Content -->
    <main class="main">
        <div class="article-container">
            <!-- Breadcrumb -->
            <nav class="breadcrumb" data-aos="fade-up">
                <div class="breadcrumb-list">
                    <a href="{{ route('landing') }}" class="breadcrumb-link">Beranda</a>
                    <span class="breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
                    <a href="{{ route('berita') }}" class="breadcrumb-link">Berita</a>
                    <span class="breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
                    <span>{{ $news->title }}</span>
                </div>
            </nav>

            <!-- Back Button -->
            <a href="{{ route('berita') }}" class="back-button" data-aos="fade-up">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Berita
            </a>

            <!-- Article -->
            <article class="glass-light" style="padding: 4rem; margin-bottom: 3rem;" data-aos="fade-up"
                data-aos-delay="100">
                <!-- Article Header -->
                <header class="article-header">
                    <span class="article-category">{{ $news->category }}</span>
                    <h1 class="article-title">{{ $news->title }}</h1>
                    <div class="article-meta">
                        <div class="meta-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>{{ $news->published_at->format('d M Y') }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-clock"></i>
                            <span>{{ $news->reading_time }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-tag"></i>
                            <span>{{ $news->category }}</span>
                        </div>
                    </div>
                    <img src="{{ $news->thumbnail_url }}" alt="{{ $news->title }}" class="article-featured-image">
                </header>

                <!-- Article Content -->
                <div class="article-content">
                    {!! $news->processedContent !!}
                </div>

                <!-- Share Section -->
                <div class="share-section glass-strong">
                    <h3 class="share-title">Bagikan Artikel Ini</h3>
                    <div class="share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                            target="_blank" class="share-btn facebook">
                            <i class="fab fa-facebook-f"></i>
                            Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($news->title) }}"
                            target="_blank" class="share-btn twitter">
                            <i class="fab fa-twitter"></i>
                            Twitter
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($news->title . ' - ' . url()->current()) }}"
                            target="_blank" class="share-btn whatsapp">
                            <i class="fab fa-whatsapp"></i>
                            WhatsApp
                        </a>
                        <a href="https://t.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($news->title) }}"
                            target="_blank" class="share-btn telegram">
                            <i class="fab fa-telegram-plane"></i>
                            Telegram
                        </a>
                    </div>
                </div>
            </article>
        </div>

        <!-- Related News -->
        @if($relatedNews->count() > 0)
            <section class="related-section">
                <div class="container">
                    <h2 class="related-title" data-aos="fade-up">Berita <span
                            style="color: var(--primary-600);">Terkait</span></h2>
                    <div class="related-grid">
                        @foreach($relatedNews as $index => $related)
                            <div class="related-card glass-light" data-aos="fade-up" data-aos-delay="{{ $index * 100 + 200 }}"
                                onclick="location.href='{{ route('news.show', $related->slug) }}'">
                                <img src="{{ $related->thumbnail_url }}" alt="{{ $related->title }}" class="related-image">
                                <div class="related-content">
                                    <span class="related-category">{{ $related->category }}</span>
                                    <h3 class="related-title">{{ $related->title }}</h3>
                                    <div class="related-date">
                                        <i class="fas fa-calendar-alt"></i>
                                        {{ $related->published_at->format('d M Y') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
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

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        console.log('📄 Article page loaded successfully!');
        console.log('✨ Oil droplets floating effect activated!');
        console.log('🎯 Glassmorphism theme applied!');
    </script>
</body>

</html>