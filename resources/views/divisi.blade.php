<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisi - PT. Bumi Laksamana Jaya</title>
    <meta name="description"
        content="Struktur divisi dan unit kerja PT. Bumi Laksamana Jaya yang mengelola berbagai aspek bisnis oil & gas secara profesional dan terintegrasi.">

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

        /* White Background with Oil Droplets */
        .oil-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 50%, #ffffff 100%);
            z-index: -1000;
        }

        /* Animated Oil Droplets */
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

        /* Different sized oil droplets */
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

        /* Oil Rig Silhouettes */
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

        /* Oil Pump Animation */
        .oil-pump {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 80px;
            height: 80px;
            opacity: 0.1;
            z-index: -997;
            animation: oilPump 3s ease-in-out infinite;
        }

        @keyframes oilPump {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            25% {
                transform: translateY(-5px) rotate(2deg);
            }

            50% {
                transform: translateY(-10px) rotate(0deg);
            }

            75% {
                transform: translateY(-5px) rotate(-2deg);
            }
        }

        /* Glassmorphism Components */
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

        /* Light Glassmorphism for Dialog */
        .glass-light {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 24px;
            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.7),
                0 0 0 1px rgba(255, 255, 255, 0.1);
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Fixed Glassmorphism Navbar */
        .glassmorphism-navbar {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            max-width: calc(100vw - 40px);
            width: auto;
            padding: 0 20px;
        }

        .glass-container {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 28px;
            box-shadow:
                0 16px 40px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            padding: 16px 32px;
            min-height: 72px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .glass-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--primary-500);
            opacity: 0;
            transition: opacity 0.6s ease;
            border-radius: 2px;
        }

        .glass-container:hover::before {
            opacity: 0.8;
        }

        .glass-container:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }

        /* Logo Section */
        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-shrink: 0;
        }

        .logo-wrapper {
            position: relative;
        }

        .logo-circle {
            width: 48px;
            height: 48px;
            background: var(--primary-500);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 8px 30px rgba(59, 130, 246, 0.3);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            overflow: hidden;
        }

        .logo-circle:hover {
            transform: scale(1.1) rotate(8deg);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.4);
        }

        .logo-text {
            font-family: 'Montserrat', sans-serif;
            font-size: 18px;
            font-weight: 800;
            color: white;
            position: relative;
            z-index: 2;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .company-info {
            overflow: hidden;
        }

        .company-name {
            font-family: 'Montserrat', sans-serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--primary-600);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            white-space: nowrap;
            letter-spacing: -0.4px;
        }

        .company-name-full {
            display: inline;
        }

        .company-name-short {
            display: none;
        }

        /* Navigation Links */
        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 6px;
            position: relative;
        }

        .nav-moving-bg {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            background: rgba(59, 130, 246, 0.15);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 18px;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            opacity: 0;
            z-index: 1;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.2);
        }

        .nav-moving-bg.active {
            opacity: 1;
        }

        .nav-moving-indicator {
            position: absolute;
            bottom: 3px;
            left: 0;
            height: 3px;
            background: var(--primary-500);
            border-radius: 2px;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            opacity: 0;
            z-index: 2;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.4);
        }

        .nav-moving-indicator.active {
            opacity: 1;
        }

        .nav-link {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border-radius: 18px;
            font-family: 'Montserrat', sans-serif;
            font-size: 15px;
            font-weight: 600;
            color: var(--gray-700);
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            cursor: pointer;
            overflow: hidden;
            white-space: nowrap;
            z-index: 2;
        }

        .nav-text {
            position: relative;
            z-index: 3;
            transition: color 0.3s ease;
        }

        .nav-glass-bg {
            position: absolute;
            inset: 0;
            background: rgba(59, 130, 246, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: inherit;
            opacity: 0;
            transform: scale(0.9);
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .nav-link:hover .nav-glass-bg {
            opacity: 1;
            transform: scale(1);
        }

        .nav-active {
            color: var(--primary-600);
            font-weight: 700;
        }

        .nav-link:hover {
            color: var(--primary-600);
            transform: translateY(-1px) scale(1.02);
        }

        /* CTA Button */
        .navbar-cta {
            flex-shrink: 0;
        }

        .cta-btn {
            position: relative;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 22px;
            background: rgba(59, 130, 246, 0.1);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(59, 130, 246, 0.3);
            color: var(--primary-600);
            font-family: 'Montserrat', sans-serif;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(59, 130, 246, 0.2);
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            cursor: pointer;
            overflow: hidden;
            white-space: nowrap;
        }

        .cta-btn:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.3);
            background: rgba(59, 130, 246, 0.15);
        }

        /* Mobile Toggle */
        .mobile-toggle {
            display: none;
        }

        .mobile-btn {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
            background: transparent;
        }

        .mobile-glass-bg {
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .mobile-btn:hover .mobile-glass-bg {
            background: rgba(59, 130, 246, 0.15);
            border-color: rgba(59, 130, 246, 0.3);
            transform: scale(1.05);
            box-shadow: 0 8px 30px rgba(59, 130, 246, 0.2);
        }

        .hamburger {
            width: 20px;
            height: 16px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            z-index: 2;
        }

        .hamburger-line {
            width: 100%;
            height: 2.5px;
            background: var(--gray-700);
            border-radius: 2px;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            transform-origin: center;
        }

        .mobile-btn:hover .hamburger-line {
            background: var(--primary-600);
        }

        .line-1-active {
            transform: translateY(6.75px) rotate(45deg);
        }

        .line-2-active {
            opacity: 0;
            transform: scaleX(0);
        }

        .line-3-active {
            transform: translateY(-6.75px) rotate(-45deg);
        }

        /* Mobile Menu */
        .mobile-menu {
            position: absolute;
            top: calc(100% + 16px);
            left: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 24px;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15);
            padding: 24px;
            max-width: 400px;
            margin: 0 auto;
            min-width: 280px;
        }

        .mobile-nav {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 24px;
        }

        .mobile-link {
            position: relative;
            display: flex;
            align-items: center;
            padding: 16px 20px;
            border-radius: 16px;
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            font-weight: 600;
            color: var(--gray-700);
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            cursor: pointer;
            overflow: hidden;
        }

        .mobile-active {
            color: var(--primary-600);
            font-weight: 700;
        }

        .mobile-link:hover {
            color: var(--primary-600);
            transform: translateX(6px) scale(1.02);
        }

        .mobile-indicator {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--primary-500);
            border-radius: 0 4px 4px 0;
            transform: scaleY(0);
            transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .mobile-indicator-show {
            transform: scaleY(1);
        }

        .mobile-link .mobile-glass-bg {
            position: absolute;
            inset: 0;
            background: rgba(59, 130, 246, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: inherit;
            opacity: 0;
            transform: scale(0.95);
            transition: all 0.3s ease;
        }

        .mobile-link:hover .mobile-glass-bg {
            opacity: 1;
            transform: scale(1);
        }

        .mobile-text {
            position: relative;
            z-index: 2;
        }

        .mobile-cta {
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .mobile-cta-btn {
            position: relative;
            display: block;
            width: 100%;
            text-align: center;
            padding: 16px 24px;
            background: rgba(59, 130, 246, 0.1);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(59, 130, 246, 0.3);
            color: var(--primary-600);
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(59, 130, 246, 0.2);
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            overflow: hidden;
        }

        .mobile-cta-btn:hover {
            background: rgba(59, 130, 246, 0.15);
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.3);
        }

        .mobile-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            z-index: -1;
        }

        /* Responsive Design */
        @media (min-width: 1025px) {
            .desktop-nav {
                display: flex;
            }

            .navbar-cta {
                display: block;
            }

            .mobile-toggle {
                display: none;
            }
        }

        @media (max-width: 1024px) {
            .desktop-nav {
                display: none;
            }

            .navbar-cta {
                display: none;
            }

            .mobile-toggle {
                display: block;
            }

            .glass-container {
                padding: 12px 24px;
                min-height: 60px;
                gap: 16px;
            }

            .logo-circle {
                width: 40px;
                height: 40px;
            }

            .logo-text {
                font-size: 16px;
            }

            .company-name {
                font-size: 16px;
            }

            .company-name-full {
                display: none;
            }

            .company-name-short {
                display: inline;
            }
        }

        @media (max-width: 640px) {
            .glassmorphism-navbar {
                top: 16px;
                left: 16px;
                right: 16px;
                transform: none;
                padding: 0;
                max-width: calc(100vw - 32px);
            }

            .glass-container {
                padding: 10px 20px;
                min-height: 56px;
                gap: 12px;
                border-radius: 24px;
            }

            .navbar-logo {
                gap: 12px;
            }

            .logo-circle {
                width: 36px;
                height: 36px;
            }

            .logo-text {
                font-size: 14px;
            }

            .company-name {
                font-size: 14px;
            }

            .mobile-btn {
                width: 44px;
                height: 44px;
            }

            .hamburger {
                width: 18px;
                height: 14px;
            }

            .mobile-menu {
                left: 16px;
                right: 16px;
                padding: 20px;
                border-radius: 20px;
                min-width: auto;
            }
        }

        /* Mobile Menu Transitions */
        .mobile-enter {
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .mobile-enter-start {
            opacity: 0;
            transform: scale(0.95) translateY(-12px);
            filter: blur(4px);
        }

        .mobile-enter-end {
            opacity: 1;
            transform: scale(1) translateY(0);
            filter: blur(0px);
        }

        .mobile-leave {
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .mobile-leave-start {
            opacity: 1;
            transform: scale(1) translateY(0);
            filter: blur(0px);
        }

        .mobile-leave-end {
            opacity: 0;
            transform: scale(0.95) translateY(-12px);
            filter: blur(4px);
        }

        /* Backdrop Transitions */
        .backdrop-enter {
            transition: all 0.5s ease;
        }

        .backdrop-enter-start {
            opacity: 0;
            backdrop-filter: blur(0px);
            -webkit-backdrop-filter: blur(0px);
        }

        .backdrop-enter-end {
            opacity: 1;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .backdrop-leave {
            transition: all 0.3s ease;
        }

        .backdrop-leave-start {
            opacity: 1;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .backdrop-leave-end {
            opacity: 0;
            backdrop-filter: blur(0px);
            -webkit-backdrop-filter: blur(0px);
        }

        /* Main Content */
        .main {
            padding-top: 120px;
            min-height: 100vh;
        }

        /* Section Styles */
        .section {
            padding: 4rem 0;
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

        /* Compact Division Cards */
        .divisions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .division-card {
            padding: 2rem;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            height: 420px; /* Fixed height for all cards */
            display: flex;
            flex-direction: column;
        }

        .division-card:hover {
            transform: translateY(-10px) scale(1.02);
        }

        .division-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--primary-500);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .division-card:hover::before {
            opacity: 1;
        }

        .division-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
        }

        .division-icon.blue {
            background: var(--primary-500);
            color: white;
            box-shadow: 0 8px 30px rgba(59, 130, 246, 0.3);
        }

        .division-icon.red {
            background: var(--secondary-500);
            color: white;
            box-shadow: 0 8px 30px rgba(239, 68, 68, 0.3);
        }

        .division-icon.oil {
            background: var(--oil-dark);
            color: white;
            box-shadow: 0 8px 30px rgba(31, 41, 55, 0.3);
        }

        .division-icon.gold {
            background: var(--oil-gold);
            color: var(--gray-900);
            box-shadow: 0 8px 30px rgba(251, 191, 36, 0.3);
        }

        .division-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--gray-900);
            line-height: 1.3;
            flex-shrink: 0;
        }

        .division-description {
            color: var(--gray-600);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            flex-grow: 1;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
        }

        /* Division Detail Button */
        .division-detail-btn {
            width: 100%;
            padding: 0.875rem 1.25rem;
            background: var(--primary-500);
            color: white;
            border: none;
            border-radius: 12px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
            flex-shrink: 0;
            margin-top: auto;
        }

        .division-detail-btn:hover {
            background: var(--primary-600);
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(59, 130, 246, 0.4);
        }

        .division-detail-btn i {
            transition: transform 0.3s ease;
        }

        .division-detail-btn:hover i {
            transform: translateX(3px);
        }

        /* Light Dialog Overlay */
        .division-dialog-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            animation: dialogOverlayFadeIn 0.3s ease;
        }

        .division-dialog {
            max-width: 550px;
            width: 100%;
            max-height: 85vh;
            overflow-y: auto;
            position: relative;
            animation: dialogSlideIn 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .division-dialog-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem 2rem 1.5rem;
            border-bottom: 1px solid rgba(59, 130, 246, 0.15);
        }

        .division-dialog-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-900);
            margin: 0;
            line-height: 1.3;
        }

        .division-dialog-close {
            width: 44px;
            height: 44px;
            border: none;
            background: rgba(239, 68, 68, 0.1);
            color: var(--secondary-500);
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            flex-shrink: 0;
            font-size: 1.1rem;
        }

        .division-dialog-close:hover {
            background: var(--secondary-500);
            color: white;
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3);
        }

        .division-dialog-content {
            padding: 1rem 2rem 2rem;
        }

        .division-dialog-services {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .division-dialog-service-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1.25rem;
            margin-bottom: 1rem;
            background: rgba(59, 130, 246, 0.08);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(59, 130, 246, 0.15);
            border-radius: 16px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .division-dialog-service-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 3px;
            height: 100%;
            background: var(--primary-500);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .division-dialog-service-item:hover {
            background: rgba(59, 130, 246, 0.12);
            transform: translateX(8px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
        }

        .division-dialog-service-item:hover::before {
            opacity: 1;
        }

        .division-dialog-service-item:last-child {
            margin-bottom: 0;
        }

        .division-dialog-service-icon {
            width: 44px;
            height: 44px;
            background: var(--primary-500);
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
            transition: all 0.3s ease;
        }

        .division-dialog-service-item:hover .division-dialog-service-icon {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }

        .division-dialog-service-text {
            color: var(--gray-700);
            font-weight: 500;
            line-height: 1.5;
            font-size: 0.95rem;
        }

        @keyframes dialogOverlayFadeIn {
            from {
                opacity: 0;
                backdrop-filter: blur(0px);
                -webkit-backdrop-filter: blur(0px);
            }
            to {
                opacity: 1;
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }
        }

        @keyframes dialogSlideIn {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(-30px);
                filter: blur(4px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
                filter: blur(0px);
            }
        }

        /* SPBU Special Section */
        .spbu-section {
            background: rgba(59, 130, 246, 0.05);
            border-radius: 24px;
            padding: 3rem;
            margin-top: 3rem;
        }

        .spbu-products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .product-card {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            backdrop-filter: blur(20px);
        }

        .product-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.3);
        }

        .product-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary-500);
        }

        .product-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .product-desc {
            color: var(--gray-600);
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .divisions-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .division-card {
                padding: 1.5rem;
                height: auto;
                min-height: 380px;
            }

            .container {
                padding: 0 1rem;
            }

            .main {
                padding-top: 100px;
            }

            .spbu-products {
                grid-template-columns: 1fr;
            }

            .division-dialog {
                max-width: calc(100vw - 2rem);
                margin: 1rem;
            }

            .division-dialog-header {
                padding: 1.5rem 1.5rem 1rem;
            }

            .division-dialog-content {
                padding: 1rem 1.5rem 1.5rem;
            }

            .division-dialog-service-item {
                padding: 1rem;
                gap: 0.875rem;
            }

            .division-dialog-service-icon {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
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

        /* Service item slide animation */
        @keyframes slideInFromLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>

<body class="loading">
    <!-- White Background with Oil Elements -->
    <div class="oil-bg"></div>

    <!-- Animated Oil Droplets -->
    <div class="oil-droplets">
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
    </div>

    <!-- Oil Rig Silhouettes -->
    <div class="oil-rig-bg"></div>

    <!-- Oil Pump Animation -->
    <div class="oil-pump">
        <svg viewBox="0 0 100 100" fill="currentColor">
            <path d="M20 80h60v10H20z"/>
            <path d="M30 70h40v10H30z"/>
            <path d="M40 60h20v10H40z"/>
            <path d="M45 40h10v20H45z"/>
            <path d="M35 30h30v10H35z"/>
            <path d="M40 20h20v10H40z"/>
            <circle cx="50" cy="25" r="3"/>
        </svg>
    </div>

    <!-- Include Navbar Component -->
    @include('components.navbar', ['isLandingPage' => false, 'currentPage' => 'divisi'])

    <!-- Main Content -->
    <main class="main">
        <!-- Divisions Section -->
        <section class="section">
            <div class="container">
                <div class="section-header" data-aos="fade-up">
                    <div class="section-badge">
                        <i class="fas fa-sitemap"></i>
                        <span>Struktur Organisasi</span>
                    </div>
                    <h1 class="section-title">
                        Divisi <span class="accent-text">Perusahaan</span>
                    </h1>
                    <p class="section-description">
                        Struktur organisasi PT BLJ terdiri dari berbagai divisi yang bekerja secara sinergis untuk mendukung 
                        operasional perusahaan oil & gas yang profesional dan terintegrasi.
                    </p>
                </div>

                <div class="divisions-grid">
                    <!-- HRD Division -->
                    <div class="glass-light division-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="division-icon blue">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="division-title">DIVISI HRD</h3>
                        <p class="division-description">
                            Fokus utama Divisi HRD dan Umum meliputi pengelolaan administrasi kepegawaian, pelatihan dan 
                            pengembangan karyawan, serta peningkatan kesejahteraan tenaga kerja. Selain itu, divisi ini juga 
                            bertanggung jawab dalam pengelolaan sarana dan prasarana perusahaan guna mendukung kelancaran operasional.
                        </p>
                        <button class="division-detail-btn" onclick="openDivisionDialog('hrd')">
                            <span>Lihat Layanan</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>

                    <!-- Business Development Division -->
                    <div class="glass-light division-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="division-icon red">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="division-title">DIVISI RENCANA PENGEMBANGAN BISNIS</h3>
                        <p class="division-description">
                            Divisi Rencana Pengembangan Bisnis adalah unit strategis dalam organisasi yang bertanggung jawab 
                            untuk merumuskan dan mengimplementasikan rencana pengembangan jangka panjang guna mendukung 
                            pertumbuhan dan kesuksesan perusahaan.
                        </p>
                        <button class="division-detail-btn" onclick="openDivisionDialog('pengembangan')">
                            <span>Lihat Layanan</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>

                    <!-- Public Relations Division -->
                    <div class="glass-light division-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="division-icon oil">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <h3 class="division-title">DIVISI HUMAS</h3>
                        <p class="division-description">
                            Divisi Humas sendiri adalah menciptakan, mempertahankan dan melindungi reputasi organisasi/perusahaan, 
                            memperluas prestis, menampilkan citra-citra yang mendukung.
                        </p>
                        <button class="division-detail-btn" onclick="openDivisionDialog('humas')">
                            <span>Lihat Layanan</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>

                    <!-- Business Division -->
                    <div class="glass-light division-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="division-icon gold">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3 class="division-title">DIVISI USAHA</h3>
                        <p class="division-description">
                            Divisi usaha bertanggung jawab atas berbagai kegiatan yang berkaitan dengan pengembangan dan 
                            pengelolaan bisnis perusahaan.
                        </p>
                        <button class="division-detail-btn" onclick="openDivisionDialog('usaha')">
                            <span>Lihat Layanan</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>

                    <!-- Finance Division -->
                    <div class="glass-light division-card" data-aos="fade-up" data-aos-delay="500">
                        <div class="division-icon blue">
                            <i class="fas fa-calculator"></i>
                        </div>
                        <h3 class="division-title">DIVISI KEUANGAN</h3>
                        <p class="division-description">
                            Divisi keuangan mencakup aktivitas pengelolaan, perencanaan dan pengawasan dana perusahaan.
                        </p>
                        <button class="division-detail-btn" onclick="openDivisionDialog('keuangan')">
                            <span>Lihat Layanan</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>

                    <!-- SPBU Division -->
                    <div class="glass-light division-card" data-aos="fade-up" data-aos-delay="600">
                        <div class="division-icon red">
                            <i class="fas fa-gas-pump"></i>
                        </div>
                        <h3 class="division-title">DIVISI SPBU</h3>
                        <p class="division-description">
                            Divisi SPBU Berkomitmen untuk terus berkembang memenuhi kebutuhan masyarakat akan BBM Berkelanjutan 
                            dan SPBU tetap kompak menjaga kualitas BBM, dan berusaha meningkatkan jumlah hasil penjualan di 
                            setiap bulan sesuai dengan tuntutan perusahaan.
                        </p>
                        <button class="division-detail-btn" onclick="openDivisionDialog('spbu')">
                            <span>Lihat Layanan</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- SPBU Products Special Section -->
                <div class="spbu-section glass-strong" data-aos="fade-up">
                    <div class="section-header" style="margin-bottom: 2rem;">
                        <h2 style="font-size: 2rem; font-weight: 700; color: var(--gray-900); margin-bottom: 1rem;">
                            Produk & Layanan <span style="color: var(--primary-600);">SPBU</span>
                        </h2>
                        <p style="color: var(--gray-600); font-size: 1.1rem;">
                            Unit SPBU menghasilkan beberapa layanan utama dan tambahan untuk memenuhi kebutuhan BBM masyarakat
                        </p>
                    </div>

                    <div class="spbu-products">
                        <div class="product-card" data-aos="zoom-in" data-aos-delay="100">
                            <div class="product-icon">
                                <i class="fas fa-tint"></i>
                            </div>
                            <h4 class="product-name">Pertalite</h4>
                            <p class="product-desc">Bahan bakar berkualitas untuk kendaraan roda dua dan empat</p>
                        </div>

                        <div class="product-card" data-aos="zoom-in" data-aos-delay="200">
                            <div class="product-icon">
                                <i class="fas fa-oil-can"></i>
                            </div>
                            <h4 class="product-name">Solar</h4>
                            <p class="product-desc">Bahan bakar diesel untuk kendaraan berat dan industri</p>
                        </div>

                        <div class="product-card" data-aos="zoom-in" data-aos-delay="300">
                            <div class="product-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            <h4 class="product-name">Layanan Kendaraan Berat</h4>
                            <p class="product-desc">Melayani pengisian BBM untuk truck dan kendaraan komersial</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Division Detail Dialog -->
    <div id="divisionDialog" class="division-dialog-overlay" style="display: none;" onclick="closeDivisionDialog()">
        <div class="division-dialog glass-light" onclick="event.stopPropagation()">
            <div class="division-dialog-header">
                <h3 id="dialogTitle" class="division-dialog-title"></h3>
                <button class="division-dialog-close" onclick="closeDivisionDialog()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="division-dialog-content">
                <div id="dialogServices" class="division-dialog-services">
                    <!-- Services will be populated by JavaScript -->
                </div>
            </div>
        </div>
    </div>

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

        // Parallax effect for oil droplets (optimized)
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

        // Add loading animation completion
        window.addEventListener('load', () => {
            document.body.classList.remove('loading');
        });

        // Enhanced scroll animations (optimized)
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target); // Stop observing once visible
                }
            });
        }, observerOptions);

        // Observe elements when DOM is ready
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.glass, .glass-strong, .glass-blue, .glass-red, .glass-light').forEach(el => {
                observer.observe(el);
            });
        });

        console.log('🏢 PT BLJ Divisi Page loaded successfully!');
        console.log('✨ Oil droplets floating effect activated!');
        console.log('🎯 Glassmorphism theme with white background applied!');
        console.log('📱 Mobile responsive design optimized!');

        // Division Dialog Data
        const divisionData = {
            hrd: {
                title: 'DIVISI HRD',
                services: [
                    { icon: 'fas fa-user-plus', text: 'Administrasi Kepegawaian' },
                    { icon: 'fas fa-graduation-cap', text: 'Pelatihan & Pengembangan Karyawan' },
                    { icon: 'fas fa-heart', text: 'Peningkatan Kesejahteraan' },
                    { icon: 'fas fa-building', text: 'Pengelolaan Sarana & Prasarana' }
                ]
            },
            pengembangan: {
                title: 'DIVISI RENCANA PENGEMBANGAN BISNIS',
                services: [
                    { icon: 'fas fa-lightbulb', text: 'Perumusan Strategi Bisnis' },
                    { icon: 'fas fa-chart-bar', text: 'Analisis Peluang Pasar' },
                    { icon: 'fas fa-road', text: 'Rencana Pengembangan Jangka Panjang' },
                    { icon: 'fas fa-rocket', text: 'Implementasi Strategi Pertumbuhan' }
                ]
            },
            humas: {
                title: 'DIVISI HUMAS',
                services: [
                    { icon: 'fas fa-shield-alt', text: 'Manajemen Reputasi Perusahaan' },
                    { icon: 'fas fa-newspaper', text: 'Hubungan Media & Pers' },
                    { icon: 'fas fa-comments', text: 'Komunikasi Internal & Eksternal' },
                    { icon: 'fas fa-eye', text: 'Pengelolaan Citra Perusahaan' }
                ]
            },
            usaha: {
                title: 'DIVISI USAHA',
                services: [
                    { icon: 'fas fa-expand-arrows-alt', text: 'Pengembangan Unit Bisnis' },
                    { icon: 'fas fa-cogs', text: 'Pengelolaan Operasional Usaha' },
                    { icon: 'fas fa-handshake', text: 'Koordinasi Antar Unit' },
                    { icon: 'fas fa-chart-line', text: 'Optimalisasi Kinerja Bisnis' }
                ]
            },
            keuangan: {
                title: 'DIVISI KEUANGAN',
                services: [
                    { icon: 'fas fa-wallet', text: 'Pengelolaan Keuangan Perusahaan' },
                    { icon: 'fas fa-calculator', text: 'Perencanaan Anggaran' },
                    { icon: 'fas fa-search-dollar', text: 'Pengawasan Dana & Cash Flow' },
                    { icon: 'fas fa-file-invoice-dollar', text: 'Pelaporan Keuangan' }
                ]
            },
            spbu: {
                title: 'DIVISI SPBU',
                services: [
                    { icon: 'fas fa-gas-pump', text: 'Operasional SPBU' },
                    { icon: 'fas fa-award', text: 'Manajemen Kualitas BBM' },
                    { icon: 'fas fa-users', text: 'Pelayanan Konsumen' },
                    { icon: 'fas fa-chart-bar', text: 'Peningkatan Penjualan' }
                ]
            }
        };

        // Dialog Functions
        function openDivisionDialog(divisionKey) {
            const division = divisionData[divisionKey];
            if (!division) return;

            const dialog = document.getElementById('divisionDialog');
            const title = document.getElementById('dialogTitle');
            const services = document.getElementById('dialogServices');

            // Set title
            title.textContent = division.title;

            // Clear and populate services
            services.innerHTML = '';
            division.services.forEach((service, index) => {
                const serviceItem = document.createElement('div');
                serviceItem.className = 'division-dialog-service-item';
                serviceItem.style.animationDelay = `${index * 100}ms`;
                serviceItem.innerHTML = `
                    <div class="division-dialog-service-icon">
                        <i class="${service.icon}"></i>
                    </div>
                    <div class="division-dialog-service-text">${service.text}</div>
                `;
                services.appendChild(serviceItem);
            });

            // Show dialog
            dialog.style.display = 'flex';
            document.body.style.overflow = 'hidden';

            // Add animation for service items
            setTimeout(() => {
                const serviceItems = services.querySelectorAll('.division-dialog-service-item');
                serviceItems.forEach((item, index) => {
                    item.style.animation = `slideInFromLeft 0.5s ease forwards`;
                });
            }, 100);
        }

        function closeDivisionDialog() {
            const dialog = document.getElementById('divisionDialog');
            dialog.style.display = 'none';
            document.body.style.overflow = '';
        }

        // Close dialog with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeDivisionDialog();
            }
        });
    </script>
</body>

</html>