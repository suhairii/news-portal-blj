<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Berita BLJ')</title>
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'PT. Bumi Laksamana Jaya - Solusi bisnis terintegrasi dengan standar internasional untuk membangun Indonesia yang lebih maju.')">
    <meta name="keywords" content="@yield('keywords', 'BLJ, Bumi Laksamana Jaya, bisnis, teknologi, perdagangan, solusi terintegrasi')">
    <meta name="author" content="PT. Bumi Laksamana Jaya">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('title', 'Portal Berita BLJ')">
    <meta property="og:description" content="@yield('description', 'PT. Bumi Laksamana Jaya - Solusi bisnis terintegrasi dengan standar internasional')">
    <meta property="og:image" content="@yield('og_image', asset('assets/image/kantorblj.jpeg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="PT. Bumi Laksamana Jaya">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Portal Berita BLJ')">
    <meta name="twitter:description" content="@yield('description', 'PT. Bumi Laksamana Jaya - Solusi bisnis terintegrasi')">
    <meta name="twitter:image" content="@yield('og_image', asset('assets/image/kantorblj.jpeg'))">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    
    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- CSS Dependencies -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Tailwind Configuration with Enhanced Color Scheme -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Primary Colors - Blue & Red
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                            950: '#172554'
                        },
                        secondary: {
                            50: '#fef2f2',
                            100: '#fee2e2',
                            200: '#fecaca',
                            300: '#fca5a5',
                            400: '#f87171',
                            500: '#ef4444',
                            600: '#dc2626',
                            700: '#b91c1c',
                            800: '#991b1b',
                            900: '#7f1d1d',
                            950: '#450a0a'
                        },
                        // Accent Colors - Yellow & Green
                        accent: {
                            yellow: {
                                50: '#fefce8',
                                100: '#fef9c3',
                                200: '#fef08a',
                                300: '#fde047',
                                400: '#facc15',
                                500: '#eab308',
                                600: '#ca8a04',
                                700: '#a16207',
                                800: '#854d0e',
                                900: '#713f12'
                            },
                            green: {
                                50: '#ecfdf5',
                                100: '#d1fae5',
                                200: '#a7f3d0',
                                300: '#6ee7b7',
                                400: '#34d399',
                                500: '#10b981',
                                600: '#059669',
                                700: '#047857',
                                800: '#065f46',
                                900: '#064e3b'
                            }
                        },
                        // Neutral Colors
                        gray: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#020617'
                        }
                    },
                    fontFamily: {
                        'sans': ['Inter', 'Poppins', 'system-ui', 'sans-serif'],
                        'display': ['Poppins', 'Inter', 'system-ui', 'sans-serif'],
                    },
                    fontSize: {
                        'xs': ['0.75rem', { lineHeight: '1rem' }],
                        'sm': ['0.875rem', { lineHeight: '1.25rem' }],
                        'base': ['1rem', { lineHeight: '1.5rem' }],
                        'lg': ['1.125rem', { lineHeight: '1.75rem' }],
                        'xl': ['1.25rem', { lineHeight: '1.75rem' }],
                        '2xl': ['1.5rem', { lineHeight: '2rem' }],
                        '3xl': ['1.875rem', { lineHeight: '2.25rem' }],
                        '4xl': ['2.25rem', { lineHeight: '2.5rem' }],
                        '5xl': ['3rem', { lineHeight: '1' }],
                        '6xl': ['3.75rem', { lineHeight: '1' }],
                        '7xl': ['4.5rem', { lineHeight: '1' }],
                        '8xl': ['6rem', { lineHeight: '1' }],
                        '9xl': ['8rem', { lineHeight: '1' }],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)',
                        'fade-up': 'fadeUp 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)',
                        'fade-down': 'fadeDown 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)',
                        'slide-up': 'slideUp 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)',
                        'slide-down': 'slideDown 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)',
                        'slide-left': 'slideLeft 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)',
                        'slide-right': 'slideRight 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)',
                        'scale-in': 'scaleIn 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-soft': 'bounceSoft 2s infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'float-delayed': 'floatDelayed 6s ease-in-out infinite 2s',
                        'shimmer': 'shimmer 2s linear infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        fadeUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        fadeDown: {
                            '0%': { opacity: '0', transform: 'translateY(-30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(50px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideDown: {
                            '0%': { opacity: '0', transform: 'translateY(-50px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideLeft: {
                            '0%': { opacity: '0', transform: 'translateX(-50px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' }
                        },
                        slideRight: {
                            '0%': { opacity: '0', transform: 'translateX(50px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' }
                        },
                        scaleIn: {
                            '0%': { opacity: '0', transform: 'scale(0.9)' },
                            '100%': { opacity: '1', transform: 'scale(1)' }
                        },
                        bounceSoft: {
                            '0%, 20%, 50%, 80%, 100%': { transform: 'translateY(0)' },
                            '40%': { transform: 'translateY(-10px)' },
                            '60%': { transform: 'translateY(-5px)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' }
                        },
                        floatDelayed: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-15px)' }
                        },
                        shimmer: {
                            '0%': { transform: 'translateX(-100%)' },
                            '100%': { transform: 'translateX(100%)' }
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 5px currentColor' },
                            '100%': { boxShadow: '0 0 20px currentColor, 0 0 30px currentColor' }
                        }
                    },
                    backdropBlur: {
                        'xs': '2px',
                        'sm': '4px',
                        'md': '8px',
                        'lg': '12px',
                        'xl': '16px',
                        '2xl': '24px',
                        '3xl': '40px',
                    },
                    boxShadow: {
                        'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                        'medium': '0 4px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 30px -5px rgba(0, 0, 0, 0.05)',
                        'large': '0 10px 40px -10px rgba(0, 0, 0, 0.15), 0 20px 40px -10px rgba(0, 0, 0, 0.08)',
                        'colored': '0 10px 40px -10px rgba(59, 130, 246, 0.3)',
                        'colored-red': '0 10px 40px -10px rgba(220, 38, 38, 0.3)',
                        'colored-yellow': '0 10px 40px -10px rgba(245, 158, 11, 0.3)',
                        'colored-green': '0 10px 40px -10px rgba(16, 185, 129, 0.3)',
                        'glass': '0 8px 32px 0 rgba(31, 38, 135, 0.37)',
                        'glass-inset': 'inset 0 2px 4px 0 rgba(255, 255, 255, 0.05)'
                    },
                    backgroundImage: {
                        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                        'gradient-conic': 'conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))',
                        'gradient-primary': 'linear-gradient(135deg, #3b82f6, #dc2626)',
                        'gradient-accent': 'linear-gradient(135deg, #eab308, #10b981)',
                        'glass': 'linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05))'
                    },
                    borderRadius: {
                        'xl': '1rem',
                        '2xl': '1.5rem',
                        '3xl': '2rem',
                        '4xl': '2.5rem',
                        '5xl': '3rem'
                    }
                }
            }
        }
    </script>
    
    <!-- Enhanced Global Styles -->
    <style>
        /* Enhanced CSS Variables */
        :root {
            --primary-blue: theme('colors.primary.600');
            --primary-red: theme('colors.secondary.600');
            --accent-yellow: theme('colors.accent.yellow.500');
            --accent-green: theme('colors.accent.green.500');
            --glass-bg: rgba(255, 255, 255, 0.85);
            --glass-border: rgba(255, 255, 255, 0.2);
            --backdrop-blur: 20px;
            --transition-smooth: cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* Enhanced Base Styles */
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }

        body {
            font-family: 'Inter', 'Poppins', system-ui, -apple-system, sans-serif;
            line-height: 1.6;
            color: theme('colors.gray.800');
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Enhanced Typography */
        .text-display {
            font-family: 'Poppins', 'Inter', system-ui, sans-serif;
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -0.025em;
        }

        .text-heading {
            font-family: 'Poppins', 'Inter', system-ui, sans-serif;
            font-weight: 600;
            line-height: 1.3;
            letter-spacing: -0.015em;
        }

        .text-body {
            font-family: 'Inter', system-ui, sans-serif;
            line-height: 1.6;
        }

        /* Enhanced Glassmorphism */
        .glass {
            background: var(--glass-bg);
            backdrop-filter: blur(var(--backdrop-blur)) saturate(180%);
            -webkit-backdrop-filter: blur(var(--backdrop-blur)) saturate(180%);
            border: 1px solid var(--glass-border);
        }

        .glass-strong {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(24px) saturate(200%);
            -webkit-backdrop-filter: blur(24px) saturate(200%);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Enhanced Buttons */
        .btn-primary {
            @apply inline-flex items-center justify-center px-6 py-3 text-base font-semibold text-white bg-gradient-to-r from-primary-600 to-secondary-600 rounded-2xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 ease-out focus:outline-none focus:ring-4 focus:ring-primary-500/50;
        }

        .btn-secondary {
            @apply inline-flex items-center justify-center px-6 py-3 text-base font-semibold text-primary-600 bg-white border-2 border-primary-600 rounded-2xl shadow-lg hover:bg-primary-600 hover:text-white hover:shadow-xl transform hover:scale-105 transition-all duration-300 ease-out focus:outline-none focus:ring-4 focus:ring-primary-500/50;
        }

        .btn-accent {
            @apply inline-flex items-center justify-center px-6 py-3 text-base font-semibold text-white bg-gradient-to-r from-accent-yellow-500 to-accent-green-500 rounded-2xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 ease-out focus:outline-none focus:ring-4 focus:ring-accent-yellow-500/50;
        }

        /* Enhanced Cards */
        .card {
            @apply bg-white rounded-2xl shadow-medium border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-large hover:scale-105;
        }

        .card-glass {
            @apply glass rounded-2xl shadow-glass overflow-hidden transition-all duration-300 hover:shadow-large hover:scale-105;
        }

        .card-interactive {
            @apply transform hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 cursor-pointer;
        }

        /* Enhanced Form Elements */
        .form-input {
            @apply w-full px-4 py-3 text-gray-900 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-primary-500/20 focus:border-primary-500 transition-all duration-200;
        }

        .form-textarea {
            @apply w-full px-4 py-3 text-gray-900 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-primary-500/20 focus:border-primary-500 transition-all duration-200 resize-none;
        }

        .form-select {
            @apply w-full px-4 py-3 text-gray-900 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-primary-500/20 focus:border-primary-500 transition-all duration-200 cursor-pointer;
        }

        /* Enhanced Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: theme('colors.gray.100');
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, theme('colors.primary.500'), theme('colors.secondary.500'));
            border-radius: 4px;
            transition: background 0.2s ease;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, theme('colors.primary.600'), theme('colors.secondary.600'));
        }

        /* Enhanced Selection */
        ::selection {
            background: theme('colors.primary.100');
            color: theme('colors.primary.900');
        }

        ::-moz-selection {
            background: theme('colors.primary.100');
            color: theme('colors.primary.900');
        }

        /* Enhanced Focus States */
        .focus-primary:focus {
            @apply outline-none ring-4 ring-primary-500/20 border-primary-500;
        }

        /* Loading States */
        .loading {
            opacity: 0.7;
            pointer-events: none;
            position: relative;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid transparent;
            border-top: 2px solid theme('colors.primary.600');
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Page Transitions */
        .page-transition {
            animation: fadeIn 0.6s var(--transition-smooth);
        }

        /* Enhanced Image Styles */
        img {
            max-width: 100%;
            height: auto;
            transition: all 0.3s var(--transition-smooth);
        }

        .img-hover {
            @apply transform hover:scale-110 transition-transform duration-700;
        }

        /* Utility Classes */
        .text-shadow {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .text-shadow-lg {
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .backdrop-blur-glass {
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
        }

        /* Enhanced Responsive */
        .container-custom {
            @apply max-w-7xl mx-auto px-4 sm:px-6 lg:px-8;
        }

        /* Print Styles */
        @media print {
            .no-print {
                display: none !important;
            }
            
            .print-break {
                page-break-before: always;
            }
            
            .print-avoid-break {
                page-break-inside: avoid;
            }
        }

        /* Dark Mode Support */
        @media (prefers-color-scheme: dark) {
            :root {
                --glass-bg: rgba(17, 24, 39, 0.85);
                --glass-border: rgba(255, 255, 255, 0.1);
            }

            body {
                @apply bg-gray-900 text-gray-100;
                background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            }

            .card {
                @apply bg-gray-800 border-gray-700;
            }

            .form-input,
            .form-textarea,
            .form-select {
                @apply bg-gray-800 border-gray-600 text-gray-100;
            }

            ::-webkit-scrollbar-track {
                background: theme('colors.gray.800');
            }

            ::selection {
                background: theme('colors.primary.800');
                color: theme('colors.primary.100');
            }
        }

        /* Reduced Motion */
        @media (prefers-reduced-motion: reduce) {
            *,
            ::before,
            ::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
    
    <!-- Additional Head Content -->
    @stack('head')
</head>

<body class="font-sans antialiased">
    <!-- Enhanced Page Loader -->
    <div id="page-loader" class="fixed inset-0 z-[9999] bg-gradient-to-br from-primary-50 to-secondary-50 flex items-center justify-center opacity-100 transition-all duration-700 ease-out">
        <div class="flex flex-col items-center space-y-6">
            <div class="relative">
                <!-- Enhanced Spinner -->
                <div class="w-16 h-16 border-4 border-primary-200 rounded-full animate-spin">
                    <div class="absolute inset-0 border-4 border-transparent border-t-primary-600 rounded-full animate-spin" style="animation-direction: reverse; animation-duration: 0.8s;"></div>
                </div>
                <!-- Logo Overlay -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-8 h-8 bg-gradient-to-br from-primary-600 to-secondary-600 rounded-full flex items-center justify-center">
                        <span class="text-white text-xs font-bold">BLJ</span>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Memuat Portal BLJ</h3>
                <p class="text-gray-600 animate-pulse">Menyiapkan pengalaman terbaik untuk Anda...</p>
            </div>
        </div>
    </div>

    <!-- Enhanced Scroll Progress Bar -->
    <div id="scroll-progress" class="fixed top-0 left-0 w-full h-1 z-[9998] bg-gray-200">
        <div class="h-full bg-gradient-to-r from-primary-600 to-secondary-600 transition-all duration-300 ease-out" style="width: 0%"></div>
    </div>

    <!-- Navigation Section -->
    @hasSection('navigation')
        <div class="no-print relative z-50">
            @yield('navigation')
        </div>
    @endif

    <!-- Header Section -->
    @hasSection('header')
        <header class="no-print">
            @yield('header')
        </header>
    @endif

    <!-- Main Content Area -->
    <main class="min-h-screen page-transition relative">
        <!-- Breadcrumb Section -->
        @hasSection('breadcrumb')
            <div class="no-print bg-gray-50 border-b border-gray-200">
                <div class="container-custom py-4">
                    @yield('breadcrumb')
                </div>
            </div>
        @endif

        <!-- Page Title Section -->
        @hasSection('page-title')
            <div class="container-custom py-8">
                @yield('page-title')
            </div>
        @endif

        <!-- Main Content -->
        <div class="@yield('container-class', 'container-custom')">
            @yield('content')
        </div>

        <!-- Sidebar Content -->
        @hasSection('sidebar')
            <aside class="@yield('sidebar-class', '')">
                @yield('sidebar')
            </aside>
        @endif
    </main>

    <!-- Footer Section -->
    @hasSection('footer')
        <footer class="no-print">
            @yield('footer')
        </footer>
    @endif

    <!-- Floating Elements -->
    @hasSection('floating')
        <div class="no-print">
            @yield('floating')
        </div>
    @endif

    <!-- Enhanced Back to Top Button -->
    <button id="back-to-top" 
            class="no-print fixed bottom-8 right-8 w-14 h-14 bg-gradient-to-br from-primary-600 to-secondary-600 hover:from-primary-700 hover:to-secondary-700 text-white rounded-full shadow-xl hover:shadow-2xl transition-all duration-300 opacity-0 pointer-events-none hover:scale-110 z-40 focus:outline-none focus:ring-4 focus:ring-primary-500/50 group">
        <svg class="w-6 h-6 transform group-hover:-translate-y-0.5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
        <div class="absolute inset-0 rounded-full bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-200"></div>
    </button>

    <!-- Enhanced Toast Notifications Container -->
    <div id="toast-container" class="no-print fixed top-20 right-4 z-[9997] space-y-3 max-w-sm w-full"></div>

    <!-- Enhanced Modal Container -->
    <div id="modal-container" class="no-print"></div>

    <!-- Enhanced Keyboard Navigation Indicator -->
    <div id="keyboard-nav-indicator" class="sr-only" aria-live="polite" aria-atomic="true"></div>

    <!-- Scripts Section -->
    @stack('scripts')

    <!-- Enhanced Core JavaScript -->
    <script>
        // Enhanced BLJ Utilities
        window.BLJ = {
            // Configuration
            config: {
                animationDuration: 300,
                scrollOffset: 120,
                toastDuration: 5000,
                apiBaseUrl: '{{ url("/") }}',
                csrfToken: '{{ csrf_token() }}'
            },

            // Enhanced Page Loader
            loader: {
                show() {
                    const loader = document.getElementById('page-loader');
                    if (loader) {
                        loader.classList.remove('opacity-0', 'pointer-events-none');
                        loader.classList.add('opacity-100');
                    }
                },

                hide() {
                    const loader = document.getElementById('page-loader');
                    if (loader) {
                        loader.style.opacity = '0';
                        loader.style.transform = 'scale(0.95)';
                        setTimeout(() => {
                            loader.style.display = 'none';
                        }, 700);
                    }
                }
            },

            // Enhanced Scroll Progress
            scrollProgress: {
                init() {
                    const progressBar = document.querySelector('#scroll-progress div');
                    if (!progressBar) return;

                    let ticking = false;

                    function updateProgress() {
                        const scrollable = document.documentElement.scrollHeight - window.innerHeight;
                        const scrolled = window.scrollY;
                        const progress = Math.min((scrolled / scrollable) * 100, 100);
                        
                        progressBar.style.width = progress + '%';
                        progressBar.style.opacity = scrolled > 100 ? '1' : '0';
                        
                        ticking = false;
                    }

                    window.addEventListener('scroll', () => {
                        if (!ticking) {
                            requestAnimationFrame(updateProgress);
                            ticking = true;
                        }
                    });
                }
            },

            // Enhanced Back to Top
            backToTop: {
                init() {
                    const button = document.getElementById('back-to-top');
                    if (!button) return;

                    let ticking = false;

                    function updateVisibility() {
                        if (window.scrollY > 500) {
                            button.classList.remove('opacity-0', 'pointer-events-none');
                            button.classList.add('opacity-100');
                        } else {
                            button.classList.add('opacity-0', 'pointer-events-none');
                            button.classList.remove('opacity-100');
                        }
                        ticking = false;
                    }

                    window.addEventListener('scroll', () => {
                        if (!ticking) {
                            requestAnimationFrame(updateVisibility);
                            ticking = true;
                        }
                    });

                    button.addEventListener('click', (e) => {
                        e.preventDefault();
                        
                        // Haptic feedback simulation
                        button.style.transform = 'scale(0.9)';
                        setTimeout(() => {
                            button.style.transform = 'scale(1)';
                        }, 150);

                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    });
                }
            },

            // Enhanced Toast System
            toast: {
                show(message, type = 'info', duration = null) {
                    const container = document.getElementById('toast-container');
                    if (!container) return;

                    duration = duration || BLJ.config.toastDuration;

                    const toast = document.createElement('div');
                    const toastId = 'toast-' + Date.now();
                    toast.id = toastId;

                    const colors = {
                        success: 'from-accent-green-500 to-accent-green-600',
                        error: 'from-secondary-500 to-secondary-600',
                        warning: 'from-accent-yellow-500 to-accent-yellow-600',
                        info: 'from-primary-500 to-primary-600'
                    };

                    const icons = {
                        success: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>',
                        error: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>',
                        warning: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>',
                        info: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
                    };

                    toast.className = `max-w-sm w-full bg-gradient-to-r ${colors[type]} text-white shadow-xl rounded-2xl pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden transform transition-all duration-300 translate-x-full opacity-0`;
                    
                    toast.innerHTML = `
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        ${icons[type]}
                                    </svg>
                                </div>
                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p class="text-sm font-medium">${message}</p>
                                </div>
                                <div class="ml-4 flex-shrink-0 flex">
                                    <button onclick="BLJ.toast.hide('${toastId}')" class="bg-transparent rounded-md inline-flex text-white hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">
                                        <span class="sr-only">Close</span>
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 h-1 bg-white bg-opacity-30 animate-pulse" style="animation-duration: ${duration}ms; width: 100%;"></div>
                    `;

                    container.appendChild(toast);

                    // Animate in
                    setTimeout(() => {
                        toast.classList.remove('translate-x-full', 'opacity-0');
                        toast.classList.add('translate-x-0', 'opacity-100');
                    }, 100);

                    // Auto remove
                    setTimeout(() => {
                        this.hide(toastId);
                    }, duration);

                    return toastId;
                },

                hide(toastId) {
                    const toast = document.getElementById(toastId);
                    if (toast) {
                        toast.classList.add('translate-x-full', 'opacity-0');
                        setTimeout(() => {
                            if (toast.parentNode) {
                                toast.parentNode.removeChild(toast);
                            }
                        }, 300);
                    }
                }
            },

            // Enhanced Utilities
            utils: {
                // Smooth scroll to element
                scrollTo(element, offset = null) {
                    offset = offset || BLJ.config.scrollOffset;
                    const target = typeof element === 'string' ? document.querySelector(element) : element;
                    
                    if (target) {
                        const offsetTop = target.offsetTop - offset;
                        window.scrollTo({
                            top: Math.max(0, offsetTop),
                            behavior: 'smooth'
                        });
                    }
                },

                // Enhanced loading state
                setLoading(element, loading = true) {
                    const target = typeof element === 'string' ? document.querySelector(element) : element;
                    
                    if (target) {
                        if (loading) {
                            target.classList.add('loading');
                            target.setAttribute('aria-busy', 'true');
                        } else {
                            target.classList.remove('loading');
                            target.setAttribute('aria-busy', 'false');
                        }
                    }
                },

                // Enhanced form validation
                validateForm(form) {
                    const target = typeof form === 'string' ? document.querySelector(form) : form;
                    if (!target) return false;

                    const inputs = target.querySelectorAll('input[required], textarea[required], select[required]');
                    let isValid = true;

                    inputs.forEach(input => {
                        const value = input.value.trim();
                        const isValidField = this.validateField(input, value);
                        
                        if (!isValidField) {
                            isValid = false;
                            this.showFieldError(input);
                        } else {
                            this.hideFieldError(input);
                        }
                    });

                    return isValid;
                },

                validateField(input, value) {
                    if (!value) return false;
                    
                    if (input.type === 'email') {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        return emailRegex.test(value);
                    }
                    
                    if (input.type === 'tel') {
                        const phoneRegex = /^[\d\s\-\+\(\)]+$/;
                        return phoneRegex.test(value) && value.length >= 10;
                    }
                    
                    return true;
                },

                showFieldError(input) {
                    input.classList.add('border-secondary-500', 'focus:ring-secondary-500/20');
                    input.classList.remove('border-gray-200', 'focus:ring-primary-500/20');
                },

                hideFieldError(input) {
                    input.classList.remove('border-secondary-500', 'focus:ring-secondary-500/20');
                    input.classList.add('border-gray-200', 'focus:ring-primary-500/20');
                },

                // Format number with animation
                animateNumber(element, target, duration = 2000) {
                    const start = parseInt(element.textContent) || 0;
                    const range = target - start;
                    const startTime = performance.now();

                    function updateNumber(currentTime) {
                        const elapsed = currentTime - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        
                        // Easing function
                        const easeOut = 1 - Math.pow(1 - progress, 3);
                        const current = Math.floor(start + (range * easeOut));
                        
                        element.textContent = current.toLocaleString();
                        
                        if (progress < 1) {
                            requestAnimationFrame(updateNumber);
                        }
                    }

                    requestAnimationFrame(updateNumber);
                },

                // Debounce function
                debounce(func, wait, immediate) {
                    let timeout;
                    return function executedFunction(...args) {
                        const later = () => {
                            timeout = null;
                            if (!immediate) func(...args);
                        };
                        const callNow = immediate && !timeout;
                        clearTimeout(timeout);
                        timeout = setTimeout(later, wait);
                        if (callNow) func(...args);
                    };
                },

                // Throttle function
                throttle(func, limit) {
                    let inThrottle;
                    return function executedFunction(...args) {
                        if (!inThrottle) {
                            func.apply(this, args);
                            inThrottle = true;
                            setTimeout(() => inThrottle = false, limit);
                        }
                    };
                }
            },

            // Enhanced Accessibility
            a11y: {
                init() {
                    // Keyboard navigation
                    document.addEventListener('keydown', (e) => {
                        if (e.key === 'Tab') {
                            document.body.classList.add('keyboard-navigation');
                        }
                        
                        // ESC key handling
                        if (e.key === 'Escape') {
                            this.handleEscape();
                        }
                    });

                    document.addEventListener('mousedown', () => {
                        document.body.classList.remove('keyboard-navigation');
                    });

                    // Skip links
                    this.addSkipLinks();
                },

                handleEscape() {
                    // Close modals
                    const modals = document.querySelectorAll('[data-modal]');
                    modals.forEach(modal => {
                        if (modal.style.display !== 'none') {
                            modal.style.display = 'none';
                        }
                    });

                    // Close mobile menus
                    const navbar = document.querySelector('[x-data]');
                    if (navbar && navbar._x_dataStack && navbar._x_dataStack[0].mobileMenuOpen) {
                        navbar._x_dataStack[0].mobileMenuOpen = false;
                        document.body.style.overflow = '';
                    }
                },

                addSkipLinks() {
                    const skipLink = document.createElement('a');
                    skipLink.href = '#main-content';
                    skipLink.textContent = 'Skip to main content';
                    skipLink.className = 'sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-primary-600 text-white px-4 py-2 rounded-lg z-[9999]';
                    
                    document.body.insertBefore(skipLink, document.body.firstChild);
                },

                announceToScreenReader(message) {
                    const indicator = document.getElementById('keyboard-nav-indicator');
                    if (indicator) {
                        indicator.textContent = message;
                        setTimeout(() => {
                            indicator.textContent = '';
                        }, 1000);
                    }
                }
            },

            // Performance monitoring
            performance: {
                init() {
                    if ('performance' in window) {
                        window.addEventListener('load', () => {
                            setTimeout(() => {
                                this.logPerformance();
                            }, 0);
                        });
                    }
                },

                logPerformance() {
                    const perfData = performance.getEntriesByType('navigation')[0];
                    const paintEntries = performance.getEntriesByType('paint');
                    
                    console.group('🚀 BLJ Portal Performance');
                    console.log('DOM Content Loaded:', Math.round(perfData.domContentLoadedEventEnd - perfData.navigationStart) + 'ms');
                    console.log('Full Load Time:', Math.round(perfData.loadEventEnd - perfData.navigationStart) + 'ms');
                    
                    paintEntries.forEach(entry => {
                        console.log(entry.name + ':', Math.round(entry.startTime) + 'ms');
                    });
                    
                    console.groupEnd();
                }
            },

            // Initialize all modules
            init() {
                console.log('🌟 Initializing BLJ Portal...');

                // Initialize modules
                this.scrollProgress.init();
                this.backToTop.init();
                this.a11y.init();
                this.performance.init();

                // Enhanced form interactions
                this.initFormEnhancements();

                // Enhanced image loading
                this.initImageEnhancements();

                // Enhanced smooth scrolling
                this.initSmoothScrolling();

                console.log('✅ BLJ Portal initialized successfully!');
            },

            initFormEnhancements() {
                // Enhanced form field interactions
                document.querySelectorAll('.form-input, .form-textarea, .form-select').forEach(field => {
                    field.addEventListener('focus', function() {
                        this.parentElement?.classList.add('focused');
                    });

                    field.addEventListener('blur', function() {
                        this.parentElement?.classList.remove('focused');
                        
                        // Real-time validation
                        if (this.hasAttribute('required')) {
                            const isValid = BLJ.utils.validateField(this, this.value.trim());
                            if (!isValid && this.value.trim()) {
                                BLJ.utils.showFieldError(this);
                            } else if (isValid) {
                                BLJ.utils.hideFieldError(this);
                            }
                        }
                    });
                });
            },

            initImageEnhancements() {
                // Progressive image loading
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            
                            if (img.dataset.src) {
                                img.src = img.dataset.src;
                                img.removeAttribute('data-src');
                            }
                            
                            img.classList.add('loaded');
                            observer.unobserve(img);
                        }
                    });
                }, {
                    threshold: 0.1,
                    rootMargin: '50px'
                });

                document.querySelectorAll('img[data-src]').forEach(img => {
                    imageObserver.observe(img);
                });
            },

            initSmoothScrolling() {
                // Enhanced smooth scrolling for anchor links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', (e) => {
                        e.preventDefault();
                        const targetId = anchor.getAttribute('href');
                        const target = document.querySelector(targetId);
                        
                        if (target) {
                            BLJ.utils.scrollTo(target);
                            
                            // Update URL without triggering navigation
                            if (history.pushState) {
                                history.pushState(null, null, targetId);
                            }
                        }
                    });
                });
            }
        };

        // Initialize when DOM is ready
        document.addEventListener('DOMContentLoaded', () => {
            BLJ.init();
        });

        // Hide loader when page is fully loaded
        window.addEventListener('load', () => {
            setTimeout(() => {
                BLJ.loader.hide();
            }, 500);
        });

        // Service Worker registration (optional)
        if ('serviceWorker' in navigator && 'PushManager' in window) {
            window.addEventListener('load', () => {
                // navigator.serviceWorker.register('/sw.js');
            });
        }
    </script>

    <!-- Additional Scripts -->
    @stack('bottom-scripts')
</body>
</html>