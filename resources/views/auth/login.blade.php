<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - PT. Bumi Laksamana Jaya</title>
    <meta name="description" content="Masuk ke sistem PT. Bumi Laksamana Jaya - Oil & Gas Solutions">

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
            background: var(--bg-white);
            color: var(--gray-900);
            overflow-x: hidden;
            line-height: 1.6;
            min-height: 100vh;
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
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 24px;
            box-shadow:
                0 16px 40px rgba(0, 0, 0, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }

        /* Login Container */
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            z-index: 10;
        }

        .login-card {
            width: 100%;
            max-width: 480px;
            padding: 3rem;
            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-500), var(--oil-gold), var(--secondary-500));
            border-radius: 3px 3px 0 0;
        }

        /* Logo Section */
        .login-logo {
            text-align: center;
            margin-bottom: 3rem;
        }

        .logo-wrapper {
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .logo-circle {
            width: 60px;
            height: 60px;
            background: var(--primary-500);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 8px 30px rgba(59, 130, 246, 0.3);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .logo-circle:hover {
            transform: scale(1.05) rotate(5deg);
            box-shadow: 0 12px 40px rgba(59, 130, 246, 0.4);
        }

        .logo-text {
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            font-weight: 800;
            color: white;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .company-name {
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: var(--primary-600);
            letter-spacing: -0.4px;
        }

        .login-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .login-subtitle {
            color: var(--gray-600);
            font-size: 1rem;
        }

        /* Form Styles */
        .login-form {
            space-y: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 600;
            color: var(--gray-700);
            font-size: 0.95rem;
        }

        .form-input-wrapper {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 16px;
            color: var(--gray-700);
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-500);
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            transform: translateY(-1px);
        }

        .form-input::placeholder {
            color: var(--gray-500);
        }

        .form-input.error {
            border-color: var(--secondary-500);
            background: rgba(239, 68, 68, 0.1);
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-500);
            font-size: 1.1rem;
            transition: color 0.3s ease;
            pointer-events: none;
        }

        .form-input:focus~.input-icon {
            color: var(--primary-500);
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray-500);
            cursor: pointer;
            padding: 0.25rem;
            transition: color 0.3s ease;
            z-index: 10;
        }

        .password-toggle:hover {
            color: var(--primary-500);
        }

        /* Checkbox */
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 1.5rem 0;
        }

        .checkbox-wrapper {
            position: relative;
        }

        .checkbox {
            appearance: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            position: relative;
        }

        .checkbox:checked {
            background: var(--primary-500);
            border-color: var(--primary-500);
        }

        .checkbox:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .checkbox-label {
            color: var(--gray-600);
            font-size: 0.9rem;
            cursor: pointer;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 1rem 2rem;
            background: var(--primary-500);
            color: white;
            border: none;
            border-radius: 16px;
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 30px rgba(59, 130, 246, 0.3);
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            background: var(--primary-600);
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(59, 130, 246, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn:disabled {
            background: var(--gray-400);
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        /* Error Messages */
        .error-message {
            color: var(--secondary-500);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .error-icon {
            font-size: 0.9rem;
        }

        /* Alert Messages */
        .alert {
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: var(--secondary-700);
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #15803d;
        }

        /* Back to Home Link */
        .back-link {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .back-link a {
            color: var(--gray-600);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .back-link a:hover {
            color: var(--primary-600);
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
        @media (max-width: 640px) {
            .login-container {
                padding: 1rem;
            }

            .login-card {
                padding: 2rem;
            }

            .login-title {
                font-size: 1.75rem;
            }

            .company-name {
                font-size: 18px;
            }

            .logo-circle {
                width: 50px;
                height: 50px;
            }

            .logo-text {
                font-size: 18px;
            }

            .form-input {
                padding: 0.875rem 0.875rem 0.875rem 2.75rem;
            }

            .input-icon {
                left: 0.875rem;
            }

            .password-toggle {
                right: 0.875rem;
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

    <!-- Login Container -->
    <div class="login-container">
        <div class="glass-strong login-card" x-data="loginForm()">
            <!-- Logo Section -->
            <div class="login-logo">
                <div class="logo-wrapper">
                    <div class="logo-circle">
                        <div class="logo-text">BLJ</div>
                    </div>
                    <div class="company-name">PT. Bumi Laksamana Jaya</div>
                </div>
                <h1 class="login-title">Masuk</h1>
                <p class="login-subtitle">Masuk ke sistem Oil & Gas PT BLJ</p>
            </div>

            <!-- Alert Messages -->
            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->has('email') && !$errors->has('password'))
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $errors->first('email') }}</span>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login.submit') }}" class="login-form">
                @csrf

                <!-- Email Field -->
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <div class="form-input-wrapper">
                        <input type="email" id="email" name="email" class="form-input @error('email') error @enderror"
                            placeholder="Masukkan email Anda" value="{{ old('email') }}" required x-model="email"
                            @input="clearError('email')">
                        <i class="fas fa-envelope input-icon"></i>
                    </div>
                    @error('email')
                        <div class="error-message">
                            <i class="fas fa-exclamation-triangle error-icon"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="form-input-wrapper">
                        <input :type="showPassword ? 'text' : 'password'" id="password" name="password"
                            class="form-input @error('password') error @enderror" placeholder="Masukkan password Anda"
                            required x-model="password" @input="clearError('password')">
                        <i class="fas fa-lock input-icon"></i>
                        <button type="button" class="password-toggle" @click="showPassword = !showPassword">
                            <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="error-message">
                            <i class="fas fa-exclamation-triangle error-icon"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="checkbox-group">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" id="remember" name="remember" class="checkbox" x-model="remember">
                    </div>
                    <label for="remember" class="checkbox-label">Ingat saya</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn" :disabled="isSubmitting" @click="handleSubmit">
                    <span x-show="!isSubmitting">Masuk</span>
                    <span x-show="isSubmitting" style="display: none;">
                        <i class="fas fa-spinner fa-spin"></i> Memproses...
                    </span>
                </button>
            </form>

            <!-- Back to Home -->
            <div class="back-link">
                <a href="{{ route('landing') }}">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function loginForm() {
            return {
                email: '{{ old('email') }}',
                password: '',
                remember: false,
                showPassword: false,
                isSubmitting: false,
                errors: {},

                clearError(field) {
                    if (this.errors[field]) {
                        delete this.errors[field];

                        // Remove error class from input
                        const input = document.querySelector(`[name="${field}"]`);
                        if (input) {
                            input.classList.remove('error');
                        }
                    }
                },

                handleSubmit() {
                    this.isSubmitting = true;

                    // Reset form will happen on page reload anyway
                    setTimeout(() => {
                        if (this.isSubmitting) {
                            this.isSubmitting = false;
                        }
                    }, 5000);
                }
            }
        }

        // Add loading animation completion
        window.addEventListener('load', () => {
            document.body.classList.remove('loading');
        });

        // Parallax effect for oil droplets
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const droplets = document.querySelectorAll('.oil-droplet');

            droplets.forEach((droplet, index) => {
                const speed = (index % 3 + 1) * 0.02;
                const direction = index % 2 === 0 ? 1 : -1;
                const currentTransform = droplet.style.transform || '';

                if (!currentTransform.includes('translateY')) {
                    droplet.style.transform += ` translateY(${scrolled * speed * direction}px)`;
                }
            });
        });

        // Enhanced form validation
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const inputs = form.querySelectorAll('.form-input');

            inputs.forEach(input => {
                input.addEventListener('blur', function () {
                    validateField(this);
                });

                input.addEventListener('input', function () {
                    if (this.classList.contains('error')) {
                        this.classList.remove('error');
                    }
                });
            });

            function validateField(field) {
                const value = field.value.trim();
                const name = field.name;

                // Remove existing error
                field.classList.remove('error');

                // Basic validation
                if (name === 'email') {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!value) {
                        field.classList.add('error');
                    } else if (!emailRegex.test(value)) {
                        field.classList.add('error');
                    }
                } else if (name === 'password') {
                    if (!value) {
                        field.classList.add('error');
                    } else if (value.length < 6) {
                        field.classList.add('error');
                    }
                }
            }

            // Form submission handling
            form.addEventListener('submit', function (e) {
                let hasErrors = false;

                inputs.forEach(input => {
                    validateField(input);
                    if (input.classList.contains('error')) {
                        hasErrors = true;
                    }
                });

                if (hasErrors) {
                    e.preventDefault();

                    // Focus on first error field
                    const firstError = form.querySelector('.form-input.error');
                    if (firstError) {
                        firstError.focus();
                    }
                }
            });
        });

        console.log('🛢️ PT BLJ Login Page loaded successfully!');
        console.log('✨ Oil droplets floating effect activated!');
        console.log('🎯 Glassmorphism login form ready!');
        console.log('🔐 Authentication system initialized!');
    </script>
</body>

</html>