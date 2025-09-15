<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - PT. Bumi Laksamana Jaya</title>
    <meta name="description" content="Dashboard Admin PT. Bumi Laksamana Jaya - Oil & Gas Solutions">

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
            background: linear-gradient(135deg, var(--gray-50) 0%, var(--primary-50) 50%, var(--gray-50) 100%);
            color: var(--gray-900);
            overflow-x: hidden;
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Background Animation */
        .dashboard-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f8fafc 0%, #e0f2fe 25%, #f0f9ff 50%, #f1f5f9 75%, #f8fafc 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
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

        /* Floating Oil Particles */
        .oil-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -999;
            overflow: hidden;
            pointer-events: none;
        }

        .oil-particle {
            position: absolute;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, rgba(59, 130, 246, 0.05) 70%, transparent 100%);
            border-radius: 50%;
            animation: floatParticle 20s linear infinite;
        }

        .oil-particle:nth-child(1) {
            width: 4px;
            height: 4px;
            left: 10%;
            animation-delay: 0s;
        }

        .oil-particle:nth-child(2) {
            width: 6px;
            height: 6px;
            left: 20%;
            animation-delay: 2s;
        }

        .oil-particle:nth-child(3) {
            width: 3px;
            height: 3px;
            left: 30%;
            animation-delay: 4s;
        }

        .oil-particle:nth-child(4) {
            width: 5px;
            height: 5px;
            left: 40%;
            animation-delay: 6s;
        }

        .oil-particle:nth-child(5) {
            width: 4px;
            height: 4px;
            left: 50%;
            animation-delay: 8s;
        }

        .oil-particle:nth-child(6) {
            width: 3px;
            height: 3px;
            left: 60%;
            animation-delay: 10s;
        }

        .oil-particle:nth-child(7) {
            width: 5px;
            height: 5px;
            left: 70%;
            animation-delay: 12s;
        }

        .oil-particle:nth-child(8) {
            width: 4px;
            height: 4px;
            left: 80%;
            animation-delay: 14s;
        }

        @keyframes floatParticle {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Glassmorphism Components */
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            box-shadow:
                0 8px 32px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
        }

        .glass-strong {
            background: rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 24px;
            box-shadow:
                0 16px 40px rgba(0, 0, 0, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }

        /* Dashboard Layout */
        .dashboard-container {
            min-height: 100vh;
            padding: 2rem;
            position: relative;
            z-index: 10;
        }

        /* Header */
        .dashboard-header {
            margin-bottom: 3rem;
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

        .logo-circle {
            width: 50px;
            height: 50px;
            background: var(--primary-500);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .logo-circle:hover {
            transform: scale(1.05) rotate(5deg);
            box-shadow: 0 12px 35px rgba(59, 130, 246, 0.4);
        }

        .logo-text {
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            font-weight: 800;
            color: white;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .header-text h1 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 0.25rem;
        }

        .header-text p {
            color: var(--gray-600);
            font-size: 1rem;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        /* Welcome Card */
        .welcome-card {
            padding: 3rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            margin-bottom: 2rem;
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
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--primary-600), var(--primary-500));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .welcome-subtitle {
            font-size: 1.2rem;
            color: var(--gray-600);
            margin-bottom: 2rem;
        }

        /* User Info */
        .user-info {
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.5rem;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 16px;
            margin-bottom: 2rem;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            background: var(--primary-500);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .user-details h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.25rem;
        }

        .user-details p {
            font-size: 0.9rem;
            color: var(--gray-600);
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            padding: 2rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--gray-600);
            font-size: 1rem;
        }

        /* Logout Button */
        .logout-btn {
            padding: 0.75rem 2rem;
            background: var(--secondary-500);
            color: white;
            border: none;
            border-radius: 16px;
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .logout-btn:hover {
            background: var(--secondary-600);
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(239, 68, 68, 0.4);
        }

        .logout-btn:active {
            transform: translateY(0);
        }

        /* Alert Messages */
        .alert {
            padding: 1rem 1.5rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1rem;
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

        /* Quick Actions */
        .quick-actions {
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .quick-actions h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .action-btn {
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 16px;
            color: var(--gray-700);
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.75rem;
        }

        .action-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            color: var(--primary-600);
        }

        .action-btn i {
            font-size: 1.5rem;
            color: var(--primary-500);
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
            .dashboard-container {
                padding: 1rem;
            }

            .dashboard-header {
                flex-direction: column;
                text-align: center;
            }

            .header-text h1 {
                font-size: 1.75rem;
            }

            .welcome-card {
                padding: 2rem;
            }

            .welcome-title {
                font-size: 2rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .user-info {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .header-text h1 {
                font-size: 1.5rem;
            }

            .welcome-title {
                font-size: 1.75rem;
            }

            .welcome-card {
                padding: 1.5rem;
            }

            .stat-card {
                padding: 1.5rem;
            }

            .quick-actions {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body class="loading">
    <!-- Animated Background -->
    <div class="dashboard-bg"></div>

    <!-- Floating Oil Particles -->
    <div class="oil-particles">
        <div class="oil-particle"></div>
        <div class="oil-particle"></div>
        <div class="oil-particle"></div>
        <div class="oil-particle"></div>
        <div class="oil-particle"></div>
        <div class="oil-particle"></div>
        <div class="oil-particle"></div>
        <div class="oil-particle"></div>
    </div>

    <!-- Dashboard Container -->
    <div class="dashboard-container" x-data="dashboard()">
        <!-- Header -->
        <header class="dashboard-header">
            <div class="header-left">
                <div class="logo-circle">
                    <div class="logo-text">BLJ</div>
                </div>
                <div class="header-text">
                    <h1>Dashboard Admin</h1>
                    <p>PT. Bumi Laksamana Jaya</p>
                </div>
            </div>
            <div class="header-right">
                <!-- Form for logout -->
                <form method="POST" action="/keluar" style="display: inline;">
                    <input type="hidden" name="_token" value="csrf_token_here">
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </header>

        <!-- Alert Messages -->
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
                    <h3>Administrator</h3>
                    <p>Terakhir login: <span x-text="currentDateTime"></span></p>
                </div>
            </div>

            <p style="color: var(--gray-600); font-size: 1rem;">
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
                <a href="/" class="action-btn">
                    <i class="fas fa-home"></i>
                    <span>Lihat Website</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function dashboard() {
            return {
                showSuccessAlert: false,
                currentDateTime: '',
                todayDate: '',

                init() {
                    this.updateDateTime();
                    this.showWelcomeAlert();

                    // Update time every minute
                    setInterval(() => {
                        this.updateDateTime();
                    }, 60000);
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
                    // Show success alert for 5 seconds
                    this.showSuccessAlert = true;
                    setTimeout(() => {
                        this.showSuccessAlert = false;
                    }, 5000);
                }
            }
        }

        // Add loading animation completion
        window.addEventListener('load', () => {
            document.body.classList.remove('loading');
        });

        // Enhanced logout confirmation
        document.addEventListener('DOMContentLoaded', function () {
            const logoutBtn = document.querySelector('.logout-btn');

            if (logoutBtn) {
                logoutBtn.addEventListener('click', function (e) {
                    const confirmed = confirm('Apakah Anda yakin ingin logout?');

                    if (!confirmed) {
                        e.preventDefault();
                    }
                });
            }
        });

        // Console logging for debugging
        console.log('🛢️ PT BLJ Admin Dashboard loaded successfully!');
        console.log('✨ Glass morphism effects activated!');
        console.log('🎯 Admin interface ready!');
        console.log('📊 Dashboard stats initialized!');
    </script>
</body>

</html>