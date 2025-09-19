<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - PT. Bumi Laksamana Jaya</title>
    <meta name="description" content="Dashboard Admin PT. Bumi Laksamana Jaya - Oil & Gas Solutions">
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

            /* Sidebar width */
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

        /* Clean Background */
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

        /* Glassmorphism Components */
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

        /* Dashboard Layout */
        .dashboard-layout {
            display: flex;
            min-height: 100vh;
            position: relative;
            z-index: 10;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 1.5rem;
            transition: margin-left 0.3s ease;
        }

        .main-content.sidebar-collapsed {
            margin-left: var(--sidebar-collapsed-width);
        }

        /* Mobile Menu Button */
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

        /* Header */
        .dashboard-header {
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-text h1 {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 0.25rem;
        }

        .header-text p {
            color: var(--gray-600);
            font-size: 0.9rem;
        }

        /* Welcome Card - Compact */
        .welcome-card {
            padding: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-500), var(--oil-gold), var(--secondary-500));
            border-radius: 3px 3px 0 0;
        }

        .welcome-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 0.75rem;
            background: linear-gradient(135deg, var(--primary-600), var(--primary-500));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .welcome-subtitle {
            font-size: 1rem;
            color: var(--gray-600);
            margin-bottom: 1.5rem;
        }

        /* User Info - Compact */
        .user-info {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.25rem;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 12px;
            margin-bottom: 1.5rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: var(--primary-500);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
            flex-shrink: 0;
        }

        .user-details h3 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.2rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
        }

        .user-details p {
            font-size: 0.8rem;
            color: var(--gray-600);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 250px;
        }

        /* Stats Grid - Compact */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            padding: 1.5rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow:
                0 16px 40px rgba(0, 0, 0, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 1.2rem;
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
        }

        .stat-number {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--gray-600);
            font-size: 0.9rem;
        }

        /* Quick Actions - Compact */
        .quick-actions {
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .quick-actions h2 {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 1rem;
            text-align: center;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 0.75rem;
        }

        .action-btn {
            padding: 1.25rem;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            color: var(--gray-700);
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .action-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            color: var(--primary-600);
        }

        .action-btn i {
            font-size: 1.25rem;
            color: var(--primary-500);
        }

        .action-btn span {
            font-size: 0.9rem;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }

        /* Alert Messages */
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

        /* Mobile Responsive */
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

            .dashboard-header {
                flex-direction: column;
                text-align: center;
                margin-bottom: 1.5rem;
            }

            .header-text h1 {
                font-size: 1.5rem;
            }

            .welcome-card {
                padding: 1.5rem;
            }

            .welcome-title {
                font-size: 1.75rem;
            }

            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }

            .user-info {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }

            .user-details h3,
            .user-details p {
                max-width: none;
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .actions-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .header-text h1 {
                font-size: 1.25rem;
            }

            .welcome-title {
                font-size: 1.5rem;
            }

            .welcome-card {
                padding: 1rem;
            }

            .stat-card {
                padding: 1rem;
            }

            .quick-actions {
                padding: 1rem;
            }

            .actions-grid {
                grid-template-columns: 1fr;
            }

            .action-btn {
                padding: 1rem;
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
    <div class="dashboard-layout" x-data="dashboard()">
        <!-- Include Sidebar -->
        @include('components.sidebar')

        <!-- Main Content -->
        <main class="main-content" :class="{ 'sidebar-collapsed': sidebarCollapsed }">
            <!-- Header -->
            <header class="dashboard-header">
                <div class="header-left">
                    <div class="header-text">
                        <h1>Dashboard Admin</h1>
                        <p>PT. Bumi Laksamana Jaya - Oil & Gas Solutions</p>
                    </div>
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

            <div x-show="showSuccessAlert" x-transition class="alert alert-success" style="display: none;">
                <i class="fas fa-check-circle"></i>
                <span>Selamat datang di Dashboard Admin PT BLJ!</span>
            </div>

            <!-- Welcome Card -->
            <div class="glass-strong welcome-card">
                <h1 class="welcome-title">Selamat Datang!</h1>
                <p class="welcome-subtitle">Sistem Manajemen Oil & Gas PT. Bumi Laksamana Jaya</p>

                <!-- User Info -->
                <div class="user-info">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-details">
                        <h3>{{ Auth::user()->name ?? 'Administrator' }}</h3>
                        <p>Role: {{ Auth::user()->role ?? 'Admin' }} | Terakhir login: <span x-text="currentDateTime"></span></p>
                    </div>
                </div>

                <p style="color: var(--gray-600); font-size: 0.9rem;">
                    Dashboard ini masih dalam tahap pengembangan. Fitur-fitur lengkap akan segera tersedia.
                </p>
            </div>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="glass stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="stat-number">0</div>
                    <div class="stat-label">Total Berita</div>
                </div>

                <div class="glass stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number">1</div>
                    <div class="stat-label">Total Admin</div>
                </div>

                <div class="glass stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="stat-number">0</div>
                    <div class="stat-label">Total Views</div>
                </div>

                <div class="glass stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="stat-number" x-text="todayDate"></div>
                    <div class="stat-label">Hari Ini</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="glass quick-actions">
                <h2>Menu Cepat</h2>
                <div class="actions-grid">
                    <a href="#" class="action-btn">
                        <i class="fas fa-plus"></i>
                        <span>Tambah Berita</span>
                    </a>
                    <a href="#" class="action-btn">
                        <i class="fas fa-list"></i>
                        <span>Kelola Berita</span>
                    </a>
                    <a href="#" class="action-btn">
                        <i class="fas fa-cog"></i>
                        <span>Pengaturan</span>
                    </a>
                    <a href="{{ route('landing') }}" class="action-btn">
                        <i class="fas fa-home"></i>
                        <span>Lihat Website</span>
                    </a>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script>
        function dashboard() {
            return {
                showSuccessAlert: false,
                currentDateTime: '',
                todayDate: '',
                sidebarCollapsed: false,

                init() {
                    this.updateDateTime();
                    this.showWelcomeAlert();

                    // Update time every minute
                    setInterval(() => {
                        this.updateDateTime();
                    }, 60000);

                    // Listen for sidebar toggle events
                    window.addEventListener('sidebarToggle', (event) => {
                        this.sidebarCollapsed = event.detail.collapsed;
                    });
                },

                updateDateTime() {
                    const now = new Date();
                    const options = {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                        timeZone: 'Asia/Jakarta'
                    };
                    this.currentDateTime = now.toLocaleDateString('id-ID', options);
                    this.todayDate = now.getDate().toString();
                },

                showWelcomeAlert() {
                    // Show success alert for 5 seconds only if no session message
                    @if(!session('success') && !session('error'))
                        this.showSuccessAlert = true;
                        setTimeout(() => {
                            this.showSuccessAlert = false;
                        }, 5000);
                    @endif
                }
            }
        }

        // Add loading animation completion
        window.addEventListener('load', () => {
            document.body.classList.remove('loading');
        });

        // Set up CSRF token for all AJAX requests
        document.addEventListener('DOMContentLoaded', function () {
            // Setup CSRF token
            const token = document.querySelector('meta[name="csrf-token"]');
            if (token) {
                window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.getAttribute('content');
            }
        });

        // Console logging for debugging
        console.log('🛢️ PT BLJ Compact Dashboard loaded successfully!');
        console.log('✨ Compact design with glassmorphism effects activated!');
        console.log('📱 Mobile responsive with sidebar toggle!');
        console.log('🎯 Admin interface ready!');
        console.log('📊 Dashboard stats initialized!');
        console.log('👤 Current user: {{ Auth::user()->name ?? "Unknown" }}');
    </script>
</body>

</html>