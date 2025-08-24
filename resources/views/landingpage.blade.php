<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Bumi Laksamana Jaya - Excellence in Oil & Gas Solutions</title>
    <meta name="description"
        content="PT. Bumi Laksamana Jaya adalah perusahaan terpercaya yang bergerak di bidang minyak dan gas, teknologi, perdagangan, dan solusi bisnis terintegrasi untuk masa depan yang berkelanjutan.">

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

        /* Oil Rig Silhouettes
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
        } */

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

        /* Buttons */
        .btn {
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            font-family: 'Montserrat', sans-serif;
        }

        .btn-primary {
            background: var(--primary-500);
            color: white;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            background: var(--primary-600);
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(59, 130, 246, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: var(--gray-700);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .btn-oil {
            background: var(--oil-dark);
            color: white;
            box-shadow: 0 4px 20px rgba(31, 41, 55, 0.3);
        }

        .btn-oil:hover {
            background: var(--oil-black);
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(31, 41, 55, 0.4);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            padding-top: 120px;
            z-index: 1;
        }

        .hero-glow {
            z-index: 3;
        }


        .hero-with-background {
            position: relative;
            overflow: hidden;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .hero-background img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            z-index: 2;
        }


        @keyframes pulse {

            0%,
            100% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0.5;
            }

            50% {
                transform: translate(-50%, -50%) scale(1.1);
                opacity: 0.8;
            }
        }

        .hero-content {
            position: relative;
            z-index: 10;
            max-width: 900px;
        }

        .hero-title {
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 2rem;
            font-family: 'Montserrat', sans-serif;
            color: var(--gray-900);
        }

        .hero-title .company-name {
            color: var(--primary-600);
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: var(--gray-600);
            margin-bottom: 3rem;
            font-weight: 400;
        }

        .hero-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin: 4rem 0;
        }

        .stat-card {
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px) scale(1.02);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 900;
            font-family: 'Montserrat', sans-serif;
            color: var(--primary-600);
        }

        .stat-label {
            color: var(--gray-600);
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        /* Section Styles */
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

        /* Cards Grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            padding: 2.5rem;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card:hover {
            transform: translateY(-10px) scale(1.02);
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: var(--primary-500);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .feature-card:hover::before {
            opacity: 1;
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            font-size: 2rem;
            position: relative;
            overflow: hidden;
        }

        .feature-icon.blue {
            background: var(--primary-500);
            color: white;
            box-shadow: 0 8px 30px rgba(59, 130, 246, 0.3);
        }

        .feature-icon.red {
            background: var(--secondary-500);
            color: white;
            box-shadow: 0 8px 30px rgba(239, 68, 68, 0.3);
        }

        .feature-icon.oil {
            background: var(--oil-dark);
            color: white;
            box-shadow: 0 8px 30px rgba(31, 41, 55, 0.3);
        }

        .feature-icon.gold {
            background: var(--oil-gold);
            color: var(--gray-900);
            box-shadow: 0 8px 30px rgba(251, 191, 36, 0.3);
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--gray-900);
        }

        .feature-description {
            color: var(--gray-600);
            line-height: 1.6;
        }

        /* Director Section */
        .director-section {
            background: radial-gradient(ellipse at center, rgba(59, 130, 246, 0.05) 0%, transparent 70%);
        }

        .director-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            max-width: 1000px;
            margin: 0 auto;
            overflow: hidden;
        }

        .director-content {
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .director-image {
            position: relative;
            overflow: hidden;
            min-height: 500px;
        }

        .director-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .director-image::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(59, 130, 246, 0.1);
        }

        .quote {
            font-size: 1.25rem;
            font-style: italic;
            color: var(--gray-700);
            line-height: 1.8;
            margin-bottom: 2rem;
            position: relative;
        }

        .quote::before {
            content: '"';
            font-size: 4rem;
            color: var(--primary-500);
            position: absolute;
            top: -1rem;
            left: -1rem;
            font-family: serif;
        }

        .director-info {
            padding: 2rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .director-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .director-title {
            color: var(--primary-600);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .director-details {
            display: flex;
            gap: 2rem;
            font-size: 0.9rem;
            color: var(--gray-600);
        }

        .director-details span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Office Section */
        .office-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .office-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .office-background img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .office-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            z-index: 2;
        }

        .office-content {
            position: relative;
            z-index: 10;
            width: 100%;
            padding: 4rem 0;
        }

        .office-info-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .office-info-left {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .office-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(59, 130, 246, 0.1);
            color: var(--primary-600);
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-size: 0.95rem;
            font-weight: 600;
            border: 1px solid rgba(59, 130, 246, 0.3);
            width: fit-content;
            backdrop-filter: blur(20px);
        }

        .office-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            font-family: 'Montserrat', sans-serif;
            color: var(--gray-900);
        }

        .office-title .accent-text {
            color: var(--primary-600);
        }

        .office-description {
            font-size: 1.25rem;
            color: var(--gray-600);
            line-height: 1.7;
            margin-bottom: 2rem;
        }

        .office-features {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .office-feature {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1.1rem;
            color: var(--gray-700);
        }

        .office-feature-icon {
            width: 24px;
            height: 24px;
            color: var(--primary-500);
        }

        .office-info-right {
            position: relative;
        }

        .office-details-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .office-details-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--primary-500);
            border-radius: 2px 2px 0 0;
        }

        .office-detail-item {
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .office-detail-item:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateX(5px);
        }

        .office-detail-item:last-child {
            margin-bottom: 0;
        }

        .office-detail-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .office-detail-icon.address {
            background: var(--primary-500);
            color: white;
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
        }

        .office-detail-icon.coordinates {
            background: var(--oil-dark);
            color: white;
            box-shadow: 0 8px 20px rgba(31, 41, 55, 0.3);
        }

        .office-detail-icon.phone {
            background: var(--oil-gold);
            color: var(--gray-900);
            box-shadow: 0 8px 20px rgba(251, 191, 36, 0.3);
        }

        .office-detail-content h4 {
            color: var(--gray-900);
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .office-detail-content p {
            color: var(--gray-600);
            line-height: 1.5;
            margin: 0;
        }

        .office-cta {
            margin-top: 2rem;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .office-btn {
            padding: 1rem 2rem;
            border-radius: 16px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            font-size: 1rem;
            font-family: 'Montserrat', sans-serif;
        }

        .office-btn-primary {
            background: var(--primary-500);
            color: white;
            box-shadow: 0 8px 30px rgba(59, 130, 246, 0.3);
        }

        .office-btn-primary:hover {
            background: var(--primary-600);
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 12px 40px rgba(59, 130, 246, 0.4);
        }

        .office-btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            color: var(--gray-700);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .office-btn-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px) scale(1.02);
        }

        /* Contact Section */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: start;
        }

        .contact-info {
            space-y: 2rem;
        }

        .contact-item {
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .contact-item:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateX(5px);
        }

        .contact-item-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0.5rem;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .contact-form {
            padding: 2.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--gray-700);
        }

        .form-input,
        .form-textarea,
        .form-select {
            width: 100%;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            color: var(--gray-700);
            font-family: 'Montserrat', sans-serif;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .form-input:focus,
        .form-textarea:focus,
        .form-select:focus {
            outline: none;
            border-color: var(--primary-500);
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: var(--gray-500);
        }

        /* Footer */
        .footer {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding: 4rem 0 2rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-section h3 {
            color: var(--gray-900);
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.25rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.75rem;
        }

        .footer-section ul li a {
            color: var(--gray-600);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: var(--primary-600);
            transform: translateX(5px);
            display: inline-block;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 2rem;
            text-align: center;
            color: var(--gray-600);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1rem;
        }

        .social-link {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-600);
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .social-link:hover {
            background: var(--primary-500);
            color: white;
            transform: translateY(-3px);
        }

        /* Oil-specific animations and elements */
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

        /* Responsive Design */
        @media (max-width: 968px) {
            .office-info-container {
                grid-template-columns: 1fr;
                gap: 3rem;
                text-align: center;
            }

            .office-info-left {
                order: 2;
            }

            .office-info-right {
                order: 1;
            }

            .office-details-card {
                padding: 2rem;
            }
        }

        @media (max-width: 768px) {
            .hero-cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .cards-grid {
                grid-template-columns: 1fr;
            }

            .director-card {
                grid-template-columns: 1fr;
            }

            .contact-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .container {
                padding: 0 1rem;
            }

            .hero {
                padding-top: 100px;
            }
        }

        @media (max-width: 640px) {
            .office-section {
                min-height: auto;
                padding: 4rem 0;
            }

            .office-content {
                padding: 2rem 0;
            }

            .office-info-container {
                gap: 2rem;
                padding: 0 1rem;
            }

            .office-details-card {
                padding: 1.5rem;
            }

            .office-detail-item {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .office-cta {
                flex-direction: column;
            }

            .office-btn {
                justify-content: center;
                padding: 0.875rem 1.5rem;
            }
        }

        /* Scroll Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
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
        <div class="oil-droplet"></div>
        <div class="oil-droplet"></div>
    </div>

    <!-- Oil Rig Silhouettes
    <div class="oil-rig-bg"></div> -->

    <!-- Oil Pump Animation -->
    <div class="oil-pump">
        <svg viewBox="0 0 100 100" fill="currentColor">
            <path d="M20 80h60v10H20z" />
            <path d="M30 70h40v10H30z" />
            <path d="M40 60h20v10H40z" />
            <path d="M45 40h10v20H45z" />
            <path d="M35 30h30v10H35z" />
            <path d="M40 20h20v10H40z" />
            <circle cx="50" cy="25" r="3" />
        </svg>
    </div>

    <!-- Include Navbar Component -->
    @include('components.navbar', ['isLandingPage' => true, 'currentPage' => 'home'])

    <!-- Hero Section -->
    <section id="home" class="hero hero-with-background">
        <!-- Background Image -->
        <div class="hero-background">
            <img src="assets/image/kantorblj.jpeg" alt="PT. Bumi Laksamana Jaya Background"
                onerror="this.src='https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80'">
        </div>

        <!-- Enhanced Light Overlay (sama seperti office section) -->
        <div class="hero-overlay"></div>

        <div class="hero-glow"></div>
        <div class="container">
            <div class="hero-content" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="section-title">
                    <span class="accent-text">PT. BUMI LAKSMANA JAYA</span>
                </h2>
                <p class="hero-subtitle">
                    BUMI LAKSAMANA JAYA ("Perusahaan") yang merupakan BUMD milik Kabupaten Bengkalis yang didirikan di
                    Bengkalis tanggal 6 Desember 2001.
                </p>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section about-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <div class="section-badge">
                    <i class="fas fa-oil-can"></i>
                    <span>Visi & Misi</span>
                </div>
                <h2 class="section-title">
                    Visi & <span class="accent-text">Misi</span>
                </h2>
                <p class="section-description">
                    Komitmen PT BLJ sebagai perusahaan Oil & Gas yang unggul dalam membangun industri energi yang
                    berkelanjutan
                </p>
            </div>

            <div class="cards-grid">
                <div class="glass-strong feature-card" data-aos="fade-right">
                    <div class="feature-icon blue">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="feature-title">Visi Kami</h3>
                    <p class="feature-description">
                        Menjadi perusahaan Oil & Gas terdepan yang memberikan solusi energi berkelanjutan dan
                        berkontribusi
                        besar dalam perekonomian nasional dengan inovasi dan teknologi terdepan.
                    </p>
                </div>

                <div class="glass-strong feature-card" data-aos="fade-left">
                    <div class="feature-icon oil">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-current-location">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M12 12m-8 0a8 8 0 1 0 16 0a8 8 0 1 0 -16 0" />
                            <path d="M12 2l0 2" />
                            <path d="M12 20l0 2" />
                            <path d="M20 12l2 0" />
                            <path d="M2 12l2 0" />
                        </svg>
                    </div>
                    <h3 class="feature-title">Misi Kami</h3>
                    <div class="feature-description">
                        <p>• Mengembangkan eksplorasi dan produksi minyak & gas dengan teknologi ramah lingkungan</p>
                        <p>• Meningkatkan efisiensi operasional dan memberikan nilai tambah bagi stakeholder</p>
                        <p>• Berkomitmen pada keselamatan kerja dan kelestarian lingkungan</p>
                    </div>
                </div>
            </div>

            <!-- Company Values -->
            <div style="margin-top: 6rem;">
                <div class="section-header" data-aos="fade-up">
                    <div class="section-badge">
                        <i class="fas fa-flame"></i>
                        <span>Nilai-Nilai Perusahaan</span>
                    </div>
                    <h3 class="section-title">
                        Filosofi & <span class="accent-text">Budaya Kerja</span>
                    </h3>
                </div>

                <div class="cards-grid">
                    <div class="glass feature-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-icon blue">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4 class="feature-title">Integritas</h4>
                        <p class="feature-description">
                            Menjunjung tinggi kejujuran dan transparansi dalam setiap kegiatan perusahaan.
                        </p>
                    </div>

                    <div class="glass feature-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-icon red">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h4 class="feature-title">Tanggung Jawab</h4>
                        <p class="feature-description">
                            Bertanggung jawab atas dampak kegiatan perusahaan terhadap masyarakat dan lingkungan.
                        </p>
                    </div>

                    <div class="glass feature-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-icon oil">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h4 class="feature-title">Kemitraan</h4>
                        <p class="feature-description">
                            Membangun hubungan yang harmonis dengan masyarakat, pemerintah, dan stakeholder lainnya.
                        </p>
                    </div>

                    <div class="glass feature-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="feature-icon gold">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h4 class="feature-title">Inovasi</h4>
                        <p class="feature-description">
                            Terus berinovasi untuk meningkatkan kinerja dan kontribusi bagi perekonomian daerah.
                        </p>
                    </div>

                    <div class="glass feature-card" data-aos="fade-up" data-aos-delay="500">
                        <div class="feature-icon blue">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4 class="feature-title">Kesejahteraan</h4>
                        <p class="feature-description">
                            Berkomitmen untuk meningkatkan kesejahteraan masyarakat dan karyawan.
                        </p>
                    </div>

                    <div class="glass feature-card" data-aos="fade-up" data-aos-delay="600">
                        <div class="feature-icon oil">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h4 class="feature-title">Lingkungan</h4>
                        <p class="feature-description">
                            Mengelola sumber daya alam dengan ramah lingkungan dan berkelanjutan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Units Section -->
    <section id="business" class="section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <div class="section-badge">
                    <i class="fas fa-industry"></i>
                    <span>Unit Usaha</span>
                </div>
                <h2 class="section-title">
                    Unit <span class="accent-text">Usaha</span>
                </h2>
                <p class="section-description">
                    Berbagai unit usaha Oil & Gas yang saling terintegrasi dalam memberikan solusi energi komprehensif
                </p>
            </div>

            <div class="cards-grid">
                <div class="glass-blue feature-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-icon blue">
                        <i class="fas fa-search-location"></i>
                    </div>
                    <h3 class="feature-title">Eksplorasi & Produksi</h3>
                    <p class="feature-description">
                        Kegiatan hulu migas meliputi eksplorasi, pengeboran, dan produksi minyak & gas dengan teknologi
                        terdepan
                    </p>
                </div>

                <div class="glass-red feature-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-icon red">
                        <i class="fas fa-fire-flame-curved"></i>
                    </div>
                    <h3 class="feature-title">Pengolahan Gas</h3>
                    <p class="feature-description">
                        Fasilitas pengolahan gas alam terpadu untuk memenuhi kebutuhan industri dan rumah tangga
                    </p>
                </div>

                <div class="glass feature-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-icon gold">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="feature-title">Pembangkit Listrik</h3>
                    <p class="feature-description">
                        Pembangkit listrik berbahan bakar gas untuk mendukung kebutuhan energi listrik nasional
                    </p>
                </div>

                <div class="glass-blue feature-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-icon blue">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="feature-title">Trading Energi</h3>
                    <p class="feature-description">
                        Perdagangan minyak mentah, produk minyak, dan gas dengan jaringan global dan manajemen risiko
                        terpadu
                    </p>
                </div>

                <div class="glass feature-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-icon oil">
                        <i class="fas fa-flask"></i>
                    </div>
                    <h3 class="feature-title">Kilang & Petrokimia</h3>
                    <p class="feature-description">
                        Fasilitas kilang minyak dan pabrik petrokimia untuk menghasilkan berbagai produk turunan minyak
                    </p>
                </div>

                <div class="glass-red feature-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-icon red">
                        <i class="fas fa-ship"></i>
                    </div>
                    <h3 class="feature-title">Logistik Migas</h3>
                    <p class="feature-description">
                        Jaringan logistik dan distribusi terintegrasi untuk mendukung supply chain migas nasional
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Director Section -->
    <section id="director" class="section director-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <div class="section-badge">
                    <i class="fas fa-user-tie"></i>
                    <span>Kepemimpinan</span>
                </div>
                <h2 class="section-title">
                    Pesan <span class="accent-text">Direktur</span>
                </h2>
            </div>

            <div class="glass-strong director-card" data-aos="fade-up" data-aos-duration="1000">
                <div class="director-content">
                    <div class="quote">
                        Sebagai perusahaan yang bergerak di sektor strategis migas, PT BLJ berkomitmen untuk terus
                        berinovasi dalam mengembangkan sumber daya energi Indonesia. Kami percaya bahwa dengan
                        menerapkan teknologi terdepan dan menjaga kelestarian lingkungan, kita dapat memberikan
                        kontribusi terbaik bagi ketahanan energi nasional dan kesejahteraan masyarakat.
                    </div>

                    <div class="director-info">
                        <h3 class="director-name">Abdul Rahman</h3>
                        <p class="director-title">Direktur Utama PT BLJ</p>
                        <div class="director-details">
                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                Bengkalis, Riau
                            </span>
                        </div>
                    </div>
                </div>

                <div class="director-image">
                    <img src="assets/image/direktur-.jpeg" alt="Abdul Rahman - Direktur Utama PT BLJ"
                        onerror="this.src='https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'">
                </div>
            </div>
        </div>
    </section>

    <!-- CSR Section -->
    <section id="csr" class="sectioan">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <div class="section-badge">
                    <i class="fas fa-hands-helping"></i>
                    <span>Sosial Kemasyarakatan</span>
                </div>
                <h2 class="section-title">
                    Program <span class="accent-text">CSR</span>
                </h2>
                <p class="section-description">
                    Komitmen PT BLJ dalam membangun masyarakat dan berkontribusi untuk kesejahteraan bersama
                </p>
            </div>

            <!-- CSR Programs -->
            <div style="margin-bottom: 4rem;">
                <h3
                    style="text-align: center; font-size: 2rem; font-weight: 700; color: var(--gray-900); margin-bottom: 3rem;">
                    Program yang Telah Dijalankan
                </h3>

                <div class="cards-grid">
                    <div class="glass-blue feature-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-icon blue">
                            <i class="fas fa-mosque"></i>
                        </div>
                        <h3 class="feature-title">Bantuan Rumah Ibadah</h3>
                        <p class="feature-description">
                            Bantuan renovasi dan pembangunan rumah ibadah di 11 Kecamatan di Kabupaten Bengkalis
                            untuk memperkuat kerukunan umat beragama.
                        </p>
                    </div>

                    <div class="glass-red feature-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-icon red">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <h3 class="feature-title">Program Sembako</h3>
                        <p class="feature-description">
                            Penyaluran 10.000 paket sembako kepada masyarakat di 11 Kecamatan di Kabupaten Bengkalis
                            untuk membantu kebutuhan pokok.
                        </p>
                    </div>

                    <div class="glass feature-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-icon oil">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <h3 class="feature-title">Hewan Kurban</h3>
                        <p class="feature-description">
                            Bantuan hewan kurban yang disalurkan ke 11 Kecamatan di Kabupaten Bengkalis
                            dalam rangka Hari Raya Idul Adha.
                        </p>
                    </div>

                    <div class="glass feature-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="feature-icon gold">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <h3 class="feature-title">Sunat Massal</h3>
                        <p class="feature-description">
                            Kegiatan sunat massal dalam rangka HUT PT Bumi Laksamana Jaya sebagai bentuk
                            kepedulian terhadap kesehatan anak-anak.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CSR Impact -->
            <div style="margin-bottom: 4rem;">
                <h3
                    style="text-align: center; font-size: 2rem; font-weight: 700; color: var(--gray-900); margin-bottom: 3rem;">
                    Dampak Sosial yang Dicapai
                </h3>

                <div class="cards-grid">
                    <div class="glass feature-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-icon blue">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4 class="feature-title">Penguatan Kerukunan Umat Beragama</h4>
                        <p class="feature-description">
                            Bantuan rumah ibadah memperkuat rasa saling menghormati antarumat beragama
                            dengan pemberian yang adil dan merata.
                        </p>
                    </div>

                    <div class="glass feature-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-icon red">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4 class="feature-title">Peningkatan Kualitas Hidup</h4>
                        <p class="feature-description">
                            Fasilitas yang layak meningkatkan kenyamanan dan akses masyarakat terhadap
                            layanan spiritual dan sosial.
                        </p>
                    </div>

                    <div class="glass feature-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-icon oil">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h4 class="feature-title">Pemberdayaan Komunitas Lokal</h4>
                        <p class="feature-description">
                            Program TJSL mendorong partisipasi aktif masyarakat dalam pembangunan,
                            menciptakan rasa memiliki dan solidaritas.
                        </p>
                    </div>

                    <div class="glass feature-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="feature-icon gold">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4 class="feature-title">Mengurangi Beban Ekonomi</h4>
                        <p class="feature-description">
                            Bantuan sembako membantu masyarakat berpenghasilan rendah memenuhi kebutuhan dasar,
                            terutama saat mengalami kesulitan ekonomi.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CSR Gallery -->
            <div class="glass-strong" style="padding: 3rem; border-radius: 24px;" data-aos="fade-up">
                <h3
                    style="text-align: center; font-size: 2rem; font-weight: 700; color: var(--gray-900); margin-bottom: 2rem;">
                    Dokumentasi Kegiatan
                </h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
                    <div class="glass" style="padding: 1.5rem; text-align: center; border-radius: 16px;">
                        <div
                            style="width: 100%; height: 200px; background: var(--gray-200); border-radius: 12px; margin-bottom: 1rem; overflow: hidden;">
                            <img src="assets/image/Bantuan rumah ibadah.jpg" alt="Bantuan Rumah Ibadah"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 12px;"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div
                                style="width: 100%; height: 100%; display: none; align-items: center; justify-content: center; background: var(--gray-200); border-radius: 12px;">
                                <i class="fas fa-mosque" style="font-size: 3rem; color: var(--gray-400);"></i>
                            </div>
                        </div>
                        <h4 style="color: var(--gray-900); margin-bottom: 0.5rem;">Bantuan Rumah Ibadah</h4>
                        <p style="color: var(--gray-600); font-size: 0.9rem;">11 Kecamatan di Kabupaten Bengkalis</p>
                    </div>

                    <div class="glass" style="padding: 1.5rem; text-align: center; border-radius: 16px;">
                        <div
                            style="width: 100%; height: 200px; background: var(--gray-200); border-radius: 12px; margin-bottom: 1rem; overflow: hidden;">
                            <img src="assets/image/sunat masal hut blj.jpg" alt="Sunat Massal HUT BLJ"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 12px;"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div
                                style="width: 100%; height: 100%; display: none; align-items: center; justify-content: center; background: var(--gray-200); border-radius: 12px;">
                                <i class="fas fa-user-friends" style="font-size: 3rem; color: var(--gray-400);"></i>
                            </div>
                        </div>
                        <h4 style="color: var(--gray-900); margin-bottom: 0.5rem;">Sunat Massal HUT BLJ</h4>
                        <p style="color: var(--gray-600); font-size: 0.9rem;">Program kesehatan anak</p>
                    </div>

                    <div class="glass" style="padding: 1.5rem; text-align: center; border-radius: 16px;">
                        <div
                            style="width: 100%; height: 200px; background: var(--gray-200); border-radius: 12px; margin-bottom: 1rem; overflow: hidden;">
                            <img src="assets/image/bantuan hewan qurban.jpg" alt="Bantuan Hewan Kurban"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 12px;"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div
                                style="width: 100%; height: 100%; display: none; align-items: center; justify-content: center; background: var(--gray-200); border-radius: 12px;">
                                <i class="fas fa-hand-holding-heart"
                                    style="font-size: 3rem; color: var(--gray-400);"></i>
                            </div>
                        </div>
                        <h4 style="color: var(--gray-900); margin-bottom: 0.5rem;">Bantuan Hewan Kurban</h4>
                        <p style="color: var(--gray-600); font-size: 0.9rem;">Seluruh Kabupaten Bengkalis</p>
                    </div>

                    <div class="glass" style="padding: 1.5rem; text-align: center; border-radius: 16px;">
                        <div
                            style="width: 100%; height: 200px; background: var(--gray-200); border-radius: 12px; margin-bottom: 1rem; overflow: hidden;">
                            <img src="assets/image/salurkan sembako.jpg" alt="10.000 Paket Sembako"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 12px;"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div
                                style="width: 100%; height: 100%; display: none; align-items: center; justify-content: center; background: var(--gray-200); border-radius: 12px;">
                                <i class="fas fa-box-open" style="font-size: 3rem; color: var(--gray-400);"></i>
                            </div>
                        </div>
                        <h4 style="color: var(--gray-900); margin-bottom: 0.5rem;">10.000 Paket Sembako</h4>
                        <p style="color: var(--gray-600); font-size: 0.9rem;">Bantuan kebutuhan pokok</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Office Section -->
    <section id="office" class="office-section">
        <!-- Background Image -->
        <div class="office-background">
            <img src="assets/image/kantorblj.jpeg" alt="Kantor PT. Bumi Laksamana Jaya"
                onerror="this.src='https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80'">
        </div>

        <!-- Enhanced Light Overlay -->
        <div class="office-overlay"></div>

        <div class="office-content">
            <div class="office-info-container">
                <!-- Left Content -->
                <div class="office-info-left" data-aos="fade-right" data-aos-duration="1000">
                    <div class="office-badge">
                        <i class="fas fa-building"></i>
                        <span>Kantor Pusat</span>
                    </div>

                    <h2 class="office-title">
                        Kantor <span class="accent-text">Pusat</span> PT BLJ
                    </h2>

                    <p class="office-description">
                        Berlokasi strategis di jantung kota Bengkalis, kantor pusat PT. Bumi Laksamana Jaya dirancang
                        dengan
                        konsep modern dan berkelanjutan untuk mendukung operasional perusahaan migas yang efisien dan
                        inovatif.
                    </p>

                    <div class="office-features">
                        <div class="office-feature">
                            <i class="fas fa-check-circle office-feature-icon"></i>
                            <span>Fasilitas Operasional Migas Modern</span>
                        </div>
                        <div class="office-feature">
                            <i class="fas fa-check-circle office-feature-icon"></i>
                            <span>Lokasi Strategis di Bengkalis</span>
                        </div>
                        <div class="office-feature">
                            <i class="fas fa-check-circle office-feature-icon"></i>
                            <span>Standar Keselamatan HSE Tinggi</span>
                        </div>
                        <div class="office-feature">
                            <i class="fas fa-check-circle office-feature-icon"></i>
                            <span>Akses Mudah ke Fasilitas Migas</span>
                        </div>
                    </div>

                    <div class="office-cta">
                        <a href="#contact" class="office-btn office-btn-primary"
                            onclick="smoothScrollTo('contact', event)">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Kunjungi Kami</span>
                        </a>
                        <a href="https://maps.google.com" target="_blank" rel="noopener"
                            class="office-btn office-btn-secondary">
                            <i class="fas fa-directions"></i>
                            <span>Lihat Peta</span>
                        </a>
                    </div>
                </div>

                <!-- Right Content - Office Details -->
                <div class="office-info-right" data-aos="fade-left" data-aos-duration="1000">
                    <div class="office-details-card">
                        <div class="office-detail-item">
                            <div class="office-detail-icon address">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="office-detail-content">
                                <h4>Alamat Kantor</h4>
                                <p> Jl. Panglima Minal Komplek SPBU Desa Air Putih Bengkalis 28712<br>Riau, Indonesia
                                </p>
                            </div>
                        </div>

                        <div class="office-detail-item">
                            <div class="office-detail-icon coordinates">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="office-detail-content">
                                <h4>Koordinat GPS</h4>
                                <p>1°29'15.0"N 102°08'30.0"E<br>Koordinat: 1.4875, 102.1417</p>
                            </div>
                        </div>

                        <div class="office-detail-item">
                            <div class="office-detail-icon phone">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="office-detail-content">
                                <h4>Kontak & Jam Operasional</h4>
                                <p>Telepon: +62 761 21234<br>Senin - Jumat: 08:00 - 17:00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <div class="section-badge">
                    <i class="fas fa-phone"></i>
                    <span>Hubungi Kami</span>
                </div>
                <h2 class="section-title">
                    Hubungi <span class="accent-text">Kami</span>
                </h2>
                <p class="section-description">
                    Kami siap membantu mewujudkan kebutuhan energi Anda dengan solusi oil & gas terbaik dan pelayanan
                    profesional
                </p>
            </div>

            <div class="contact-grid">
                <div class="contact-info" data-aos="fade-right">
                    <div class="contact-item">
                        <div class="contact-item-header">
                            <div class="contact-icon blue" style="background: var(--primary-500); color: white;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4 style="color: var(--gray-900); font-weight: 600;">Alamat Kantor</h4>
                                <p style="color: var(--gray-600); margin: 0;">Jl. Panglima Minal Komplek SPBU Desa Air
                                    Putih Bengkalis 28712, Riau,
                                    Indonesia</p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-item-header">
                            <div class="contact-icon oil" style="background: var(--oil-dark); color: white;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h4 style="color: var(--gray-900); font-weight: 600;">Email Resmi</h4>
                                <p style="color: var(--gray-600); margin: 0;">info@bumilaksamanajaya.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-item-header">
                            <div class="contact-icon red" style="background: var(--secondary-500); color: white;">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h4 style="color: var(--gray-900); font-weight: 600;">Telepon</h4>
                                <p style="color: var(--gray-600); margin: 0;">+62 761 21234</p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-item-header">
                            <div class="contact-icon gold" style="background: var(--oil-gold); color: var(--gray-900);">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h4 style="color: var(--gray-900); font-weight: 600;">Jam Operasional</h4>
                                <p style="color: var(--gray-600); margin: 0;">Senin - Jumat: 08:00 - 17:00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="glass-strong contact-form" data-aos="fade-left">
                    <h3 style="margin-bottom: 2rem; font-size: 1.5rem; color: var(--gray-900);">Kirim Pesan</h3>
                    <form id="contactForm">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div class="form-group">
                                <label class="form-label">Nama Lengkap *</label>
                                <input type="text" class="form-input" placeholder="Masukkan nama lengkap Anda" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-input" placeholder="nama@email.com" required>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div class="form-group">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-input" placeholder="+62 xxx xxxx xxxx">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Perusahaan</label>
                                <input type="text" class="form-input" placeholder="Nama perusahaan (opsional)">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Subjek *</label>
                            <select class="form-select" required>
                                <option value="">Pilih subjek pesan</option>
                                <option value="general">Pertanyaan Umum</option>
                                <option value="business">Kerjasama Oil & Gas</option>
                                <option value="exploration">Eksplorasi & Produksi</option>
                                <option value="trading">Trading Energi</option>
                                <option value="career">Karir & Rekrutmen</option>
                                <option value="other">Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Pesan *</label>
                            <textarea class="form-textarea" rows="5" placeholder="Tuliskan pesan Anda dengan detail..."
                                required></textarea>
                        </div>

                        <button type="submit" class="btn btn-oil" style="width: 100%; justify-content: center;">
                            <span>Kirim Pesan</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>PT. Bumi Laksamana Jaya</h3>
                    <p style="color: var(--gray-600); line-height: 1.6; margin-bottom: 2rem;">
                        PT. Bumi Laksamana Jaya berkomitmen memberikan solusi oil & gas terbaik dengan teknologi
                        terdepan
                        untuk membangun ketahanan energi Indonesia yang berkelanjutan.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div class="footer-section">
                    <h3>Tautan Cepat</h3>
                    <ul>
                        <li><a href="#about" onclick="smoothScrollTo('about', event)">Tentang Kami</a></li>
                        <li><a href="#business" onclick="smoothScrollTo('business', event)">Unit Usaha</a></li>
                        <li><a href="#director" onclick="smoothScrollTo('director', event)">Direktur</a></li>
                        <li><a href="#office" onclick="smoothScrollTo('office', event)">Kantor Kami</a></li>
                        <li><a href="#contact" onclick="smoothScrollTo('contact', event)">Kontak</a></li>
                        <li><a href="#">Karir</a></li>
                        <li><a href="#">Berita</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Unit Usaha Oil & Gas</h3>
                    <ul>
                        <li><a href="#">Eksplorasi & Produksi</a></li>
                        <li><a href="#">Pengolahan Gas</a></li>
                        <li><a href="#">Pembangkit Listrik</a></li>
                        <li><a href="#">Trading Energi</a></li>
                        <li><a href="#">Kilang & Petrokimia</a></li>
                        <li><a href="#">Logistik Migas</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Informasi Kontak</h3>
                    <ul style="list-style: none;">
                        <li style="margin-bottom: 1rem; color: var(--gray-600);">
                            <i class="fas fa-map-marker-alt"
                                style="color: var(--primary-500); margin-right: 0.5rem;"></i>
                            Jl. Panglima Minal Komplek SPBU Desa Air Putih Bengkalis 28712, Riau
                        </li>
                        <li style="margin-bottom: 1rem; color: var(--gray-600);">
                            <i class="fas fa-phone" style="color: var(--oil-dark); margin-right: 0.5rem;"></i>
                            +62 761 21234
                        </li>
                        <li style="margin-bottom: 1rem; color: var(--gray-600);">
                            <i class="fas fa-envelope" style="color: var(--oil-gold); margin-right: 0.5rem;"></i>
                            info@bumilaksamanajaya.com
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2024 PT. Bumi Laksamana Jaya. Semua hak cipta dilindungi.</p>
                <p style="font-size: 0.9rem; margin-top: 0.5rem; color: var(--gray-500);">
                    Membangun Ketahanan Energi Indonesia 🛢️ untuk Masa Depan yang Berkelanjutan
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Fixed Navbar Alpine.js Component Script (for landing page compatibility)
        function fixedNavbar() {
            return {
                mobileMenuOpen: false,
                activeSection: 'home',

                navLinks: [
                    { name: 'Beranda', href: '{{ route("landing") }}', section: 'home' },
                    { name: 'Tentang', href: '#about', section: 'about' },
                    { name: 'Divisi', href: '{{ route("divisi") }}', section: 'divisi' },
                    { name: 'Unit Usaha', href: '#business', section: 'business' },
                    { name: 'Direktur', href: '#director', section: 'director' },
                    { name: 'CSR', href: '#csr', section: 'csr' },
                    { name: 'Kantor', href: '#office', section: 'office' },
                    { name: 'Kontak', href: '#contact', section: 'contact' }
                ],

                init() {
                    this.setupIntersectionObserver();
                    this.setupMovingElements();
                    console.log('🛢️ PT BLJ Oil & Gas Landing Page initialized with glassmorphism theme');
                },

                toggleMobileMenu() {
                    this.mobileMenuOpen = !this.mobileMenuOpen;

                    if (this.mobileMenuOpen) {
                        document.body.style.overflow = 'hidden';
                    } else {
                        document.body.style.overflow = '';
                    }
                },

                closeMobileMenu() {
                    this.mobileMenuOpen = false;
                    document.body.style.overflow = '';
                },

                setActiveSection(section) {
                    this.activeSection = section;
                    this.updateMovingElementsForActiveSection();
                },

                setupIntersectionObserver() {
                    const sections = document.querySelectorAll('section[id]');

                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting && entry.intersectionRatio > 0.3) {
                                this.activeSection = entry.target.id;
                                this.updateMovingElementsForActiveSection();
                            }
                        });
                    }, {
                        threshold: [0.2, 0.3, 0.5],
                        rootMargin: '-20% 0px -50% 0px'
                    });

                    sections.forEach(section => observer.observe(section));
                },

                setupMovingElements() {
                    this.$nextTick(() => {
                        this.updateMovingElementsForActiveSection();
                    });
                },

                updateMovingElementsForActiveSection() {
                    const activeLink = this.$refs[`link-${this.activeSection}`];
                    if (activeLink && this.$refs.movingBg && this.$refs.movingIndicator) {
                        this.updateMovingElements(activeLink, true);
                    }
                },

                updateMovingElements(element, isActive = false) {
                    if (!this.$refs.movingBg || !this.$refs.movingIndicator) return;

                    const rect = element.getBoundingClientRect();
                    const navRect = element.closest('.navbar-nav').getBoundingClientRect();

                    const left = rect.left - navRect.left;
                    const width = rect.width;

                    // Update moving background
                    this.$refs.movingBg.style.left = `${left}px`;
                    this.$refs.movingBg.style.width = `${width}px`;
                    this.$refs.movingBg.classList.add('active');

                    // Update moving indicator
                    this.$refs.movingIndicator.style.left = `${left + (width * 0.2)}px`;
                    this.$refs.movingIndicator.style.width = `${width * 0.6}px`;
                    this.$refs.movingIndicator.classList.add('active');
                },

                resetMovingElements() {
                    // When hovering out, return to active section
                    this.updateMovingElementsForActiveSection();
                },

                smoothScrollToSection(sectionId, event) {
                    event.preventDefault();

                    const target = document.getElementById(sectionId);
                    if (target) {
                        const offsetTop = target.offsetTop - 120;
                        const startPosition = window.pageYOffset;
                        const distance = Math.max(0, offsetTop) - startPosition;
                        const duration = Math.abs(distance) > 1000 ? 1200 : 800;
                        let startTime = null;

                        function animation(currentTime) {
                            if (startTime === null) startTime = currentTime;
                            const timeElapsed = currentTime - startTime;
                            const progress = Math.min(timeElapsed / duration, 1);

                            // Easing function for smooth animation
                            const easeInOutCubic = progress < 0.5
                                ? 4 * progress * progress * progress
                                : 1 - Math.pow(-2 * progress + 2, 3) / 2;

                            window.scrollTo(0, startPosition + distance * easeInOutCubic);

                            if (timeElapsed < duration) {
                                requestAnimationFrame(animation);
                            } else {
                                window.scrollTo(0, Math.max(0, offsetTop));
                                this.setActiveSection(sectionId);
                            }
                        }

                        requestAnimationFrame(animation);
                    }
                }
            }
        }

        // Global smooth scroll function for non-Alpine elements
        function smoothScrollTo(sectionId, event) {
            event.preventDefault();

            const target = document.getElementById(sectionId);
            if (target) {
                const offsetTop = target.offsetTop - 120;
                const startPosition = window.pageYOffset;
                const distance = Math.max(0, offsetTop) - startPosition;
                const duration = Math.abs(distance) > 1000 ? 1200 : 800;
                let startTime = null;

                function animation(currentTime) {
                    if (startTime === null) startTime = currentTime;
                    const timeElapsed = currentTime - startTime;
                    const progress = Math.min(timeElapsed / duration, 1);

                    const easeInOutCubic = progress < 0.5
                        ? 4 * progress * progress * progress
                        : 1 - Math.pow(-2 * progress + 2, 3) / 2;

                    window.scrollTo(0, startPosition + distance * easeInOutCubic);

                    if (timeElapsed < duration) {
                        requestAnimationFrame(animation);
                    } else {
                        window.scrollTo(0, Math.max(0, offsetTop));
                    }
                }

                requestAnimationFrame(animation);
            }
        }

        // Initialize AOS
        AOS.init({
            duration: 1000,
            easing: 'ease-out-cubic',
            once: true,
            offset: 100
        });

        // Counter animation
        function animateCounters() {
            const counters = document.querySelectorAll('[data-count]');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-count'));
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 16);
            });
        }

        // Intersection Observer for counter animation
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        // Observe the hero section for counter animation
        const heroSection = document.querySelector('.hero');
        if (heroSection) {
            counterObserver.observe(heroSection);
        }

        // Form submission
        document.getElementById('contactForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Simple form validation
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = 'var(--secondary-500)';
                } else {
                    field.style.borderColor = 'rgba(255, 255, 255, 0.3)';
                }
            });

            if (isValid) {
                // Simulate form submission
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;

                submitBtn.innerHTML = '<span>Mengirim...</span> <i class="fas fa-spinner fa-spin"></i>';
                submitBtn.disabled = true;

                setTimeout(() => {
                    alert('Pesan Anda telah berhasil dikirim! Tim kami akan menghubungi Anda segera.');
                    this.reset();
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            } else {
                alert('Mohon lengkapi semua field yang wajib diisi.');
            }
        });

        // Parallax effect for oil droplets
        window.addEventListener('scroll', () => {
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
        });

        // Add loading animation completion
        window.addEventListener('load', () => {
            document.body.classList.remove('loading');
        });

        // Enhanced scroll animations
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

        // Resize handler
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1025) {
                const navbar = document.querySelector('[x-data="fixedNavbar()"]');
                if (navbar && navbar._x_dataStack) {
                    navbar._x_dataStack[0].closeMobileMenu();
                }
            }
        });

        console.log('🛢️ PT BLJ Oil & Gas Landing Page loaded successfully!');
        console.log('✨ Oil droplets floating effect activated!');
        console.log('🎯 White background with glassmorphism theme applied!');
        console.log('🎨 Montserrat font and oil industry elements integrated!');
        console.log('📱 Mobile responsive design optimized!');
    </script>
</body>

</html>