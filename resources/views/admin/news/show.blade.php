<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }} - PT. Bumi Laksamana Jaya</title>
    <meta name="description" content="{{ $news->excerpt }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        :root {
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

            --sidebar-width: 260px;
            --sidebar-collapsed-width: 70px;
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
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 50%, #ffffff 100%);
            color: var(--gray-900);
            overflow-x: hidden;
            line-height: 1.6;
            min-height: 100vh;
        }

        .dashboard-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 25%, #f0f9ff 50%, #f1f5f9 75%, #ffffff 100%);
            background-size: 400% 400%;
            animation: gradientShift 20s ease infinite;
            z-index: -1000;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 16px;
            box-shadow:
                0 8px 32px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
        }

        .glass-strong {
            background: rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 20px;
            box-shadow:
                0 16px 40px rgba(0, 0, 0, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }

        .dashboard-layout {
            display: flex;
            min-height: 100vh;
            position: relative;
            z-index: 10;
        }

        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 1.5rem;
            transition: margin-left 0.3s ease;
        }

        .main-content.sidebar-collapsed {
            margin-left: var(--sidebar-collapsed-width);
        }

        .mobile-menu-btn {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1200;
            width: 48px;
            height: 48px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            cursor: pointer;
            align-items: center;
            justify-content: center;
            color: var(--primary-600);
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .mobile-menu-btn:hover {
            background: rgba(59, 130, 246, 0.1);
            border-color: rgba(59, 130, 246, 0.3);
            transform: scale(1.05);
            box-shadow: 0 12px 40px rgba(59, 130, 246, 0.2);
        }

        .page-header {
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .header-left h1 {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 0.25rem;
        }

        .header-left p {
            color: var(--gray-600);
            font-size: 0.9rem;
        }

        .header-actions {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.75rem 1.25rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            min-width: 100px;
            justify-content: center;
        }

        .btn-secondary {
            background: rgba(107, 114, 128, 0.1);
            color: var(--gray-700);
            border: 1px solid rgba(107, 114, 128, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(107, 114, 128, 0.2);
            transform: translateY(-1px);
        }

        .btn-warning {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .btn-warning:hover {
            background: rgba(245, 158, 11, 0.2);
            transform: translateY(-1px);
        }

        .btn-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .btn-danger:hover {
            background: rgba(239, 68, 68, 0.2);
            transform: translateY(-1px);
        }

        .news-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .news-header {
            background: rgba(255, 255, 255, 0.35);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            backdrop-filter: blur(30px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15);
        }

        .news-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--gray-600);
            font-size: 0.9rem;
        }

        .meta-item i {
            color: var(--primary-500);
        }

        .category-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, var(--primary-100), var(--primary-200));
            color: var(--primary-700);
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .news-title {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--gray-900);
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .news-thumbnail {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 16px;
            margin-bottom: 2rem;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15);
        }

        .news-content {
            background: rgba(255, 255, 255, 0.35);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 20px;
            padding: 2.5rem;
            backdrop-filter: blur(30px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15);
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .news-content h1,
        .news-content h2,
        .news-content h3,
        .news-content h4,
        .news-content h5,
        .news-content h6 {
            color: var(--gray-900);
            font-weight: 700;
            margin-top: 2rem;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .news-content h1 {
            font-size: 2rem;
            border-bottom: 2px solid var(--primary-200);
            padding-bottom: 0.5rem;
        }

        .news-content h2 {
            font-size: 1.75rem;
            color: var(--primary-700);
        }

        .news-content h3 {
            font-size: 1.5rem;
            color: var(--primary-600);
        }

        .news-content p {
            margin-bottom: 1.5rem;
            text-align: justify;
        }

        .news-content img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 1.5rem 0;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .news-content blockquote {
            border-left: 4px solid var(--primary-500);
            padding: 1rem 1.5rem;
            margin: 1.5rem 0;
            background: rgba(59, 130, 246, 0.05);
            border-radius: 0 12px 12px 0;
            font-style: italic;
            color: var(--gray-700);
        }

        .news-content ul,
        .news-content ol {
            margin-bottom: 1.5rem;
            padding-left: 2rem;
        }

        .news-content li {
            margin-bottom: 0.5rem;
        }

        .news-content table {
            width: 100%;
            border-collapse: collapse;
            margin: 1.5rem 0;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .news-content th,
        .news-content td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .news-content th {
            background: rgba(59, 130, 246, 0.1);
            font-weight: 600;
            color: var(--primary-700);
        }

        .news-content a {
            color: var(--primary-600);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .news-content a:hover {
            color: var(--primary-700);
            text-decoration: underline;
        }

        .alert {
            padding: 0.875rem 1.25rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #15803d;
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: var(--secondary-700);
        }

        @media (max-width: 1024px) {
            .mobile-menu-btn {
                display: flex;
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
                padding-top: 5rem;
            }

            .main-content.sidebar-collapsed {
                margin-left: 0;
                padding-top: 5rem;
            }

            .page-header {
                flex-direction: column;
                text-align: center;
                margin-bottom: 1.5rem;
            }

            .header-left h1 {
                font-size: 1.5rem;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
            }

            .news-header,
            .news-content {
                padding: 1.5rem;
            }

            .news-title {
                font-size: 1.75rem;
            }

            .news-thumbnail {
                height: 250px;
            }

            .news-meta {
                flex-direction: column;
                gap: 0.75rem;
            }
        }

        @media (max-width: 768px) {
            .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }

            .news-content {
                font-size: 1rem;
                line-height: 1.7;
            }

            .news-title {
                font-size: 1.5rem;
            }
        }

        .loading {
            opacity: 0;
            animation: fadeIn 1s ease forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body class="loading">
    <!-- Clean Background -->
    <div class="dashboard-bg"></div>

    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn" onclick="window.toggleMobileSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Dashboard Layout -->
    <div class="dashboard-layout" x-data="newsShow()">
        <!-- Include Sidebar -->
        @include('components.sidebar')

        <!-- Main Content -->
        <main class="main-content" :class="{ 'sidebar-collapsed': sidebarCollapsed }">
            <!-- Header -->
            <header class="page-header">
                <div class="header-left">
                    <h1>Detail Berita</h1>
                    <p>Preview dan kelola berita: {{ Str::limit($news->title, 50) }}</p>
                </div>
                <div class="header-actions">
                    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>

                    <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                        <span>Edit</span>
                    </a>

                    <form method="POST" action="{{ route('admin.news.destroy', $news) }}" style="display: inline;"
                        onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                            <span>Hapus</span>
                        </button>
                    </form>
                </div>
            </header>

            <!-- Alert Messages -->
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- News Container -->
            <div class="news-container">
                <!-- News Header -->
                <div class="news-header glass-strong">
                    <div class="news-meta">
                        <div class="meta-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>{{ $news->formatted_published_date }}</span>
                        </div>

                        <div class="meta-item">
                            <i class="fas fa-clock"></i>
                            <span>{{ $news->reading_time }}</span>
                        </div>

                        <div class="meta-item">
                            <i class="fas fa-user"></i>
                            <span>Admin</span>
                        </div>

                        <div class="meta-item">
                            <i class="fas fa-eye"></i>
                            <span>Preview Mode</span>
                        </div>
                    </div>

                    <div class="category-badge">
                        <i class="fas fa-tag"></i>
                        {{ $news->category }}
                    </div>

                    <h1 class="news-title">{{ $news->title }}</h1>
                </div>

                <!-- News Thumbnail -->
                <img src="{{ $news->thumbnail_url }}" alt="{{ $news->title }}" class="news-thumbnail">

                <!-- News Content -->
                <div class="news-content glass-strong">
                    {!! $news->content !!}
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script>
        function newsShow() {
            return {
                sidebarCollapsed: false,

                init() {
                    // Listen for sidebar toggle events
                    window.addEventListener('sidebarToggle', (event) => {
                        this.sidebarCollapsed = event.detail.collapsed;
                    });
                }
            }
        }

        // Add loading animation completion
        window.addEventListener('load', () => {
            document.body.classList.remove('loading');
        });

        console.log('👁️ News Show Page loaded successfully!');
    </script>
</body>

</html>