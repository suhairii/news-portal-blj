<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - PT. Bumi Laksamana Jaya</title>
    <meta name="description" content="Registrasi Portal PT. Bumi Laksamana Jaya - Oil & Gas Solutions">
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

            /* Secondary Colors - Red */
            --secondary-500: #ef4444;
            --secondary-600: #dc2626;
            --secondary-700: #b91c1c;

            /* Success Color */
            --success-500: #22c55e;
            --success-600: #16a34a;
            --success-700: #15803d;

            /* Oil-themed Colors */
            --oil-gold: #fbbf24;
            --oil-dark: #1f2937;
            --oil-amber: #f59e0b;

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

        body {
            font-family: 'Montserrat', sans-serif;
            background: var(--bg-white);
            color: var(--gray-900);
            overflow-x: hidden;
            line-height: 1.6;
            min-height: 100vh;
            position: relative;
        }

        /* White Background with Oil Elements */
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

        /* Glass Container */
        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            z-index: 10;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 24px;
            box-shadow:
                0 16px 40px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
            padding: 3rem;
            width: 100%;
            max-width: 500px;
            position: relative;
            overflow: hidden;
        }

        .register-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--oil-dark);
            border-radius: 2px 2px 0 0;
        }

        /* Logo Section */
        .logo-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-circle {
            width: 80px;
            height: 80px;
            background: var(--oil-dark);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            box-shadow: 0 8px 30px rgba(31, 41, 55, 0.3);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .logo-circle:hover {
            transform: scale(1.05) rotate(5deg);
            box-shadow: 0 12px 40px rgba(31, 41, 55, 0.4);
        }

        .logo-text {
            font-size: 24px;
            font-weight: 800;
            color: white;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .company-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--oil-dark);
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 4px rgba(31, 41, 55, 0.2);
        }

        .company-tagline {
            font-size: 1rem;
            color: var(--gray-600);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        /* Form Styles */
        .register-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--gray-900);
            text-align: center;
            margin-bottom: 2rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .form-input,
        .form-select {
            width: 100%;
            padding: 1rem 1.5rem;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 16px;
            color: var(--gray-700);
            font-size: 1rem;
            font-family: 'Montserrat', sans-serif;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .form-input::placeholder {
            color: var(--gray-500);
        }

        .form-input:focus,
        .form-select:focus {
            outline: none;
            border-color: var(--oil-dark);
            box-shadow: 0 0 0 3px rgba(31, 41, 55, 0.1);
            background: rgba(255, 255, 255, 0.3);
        }

        .password-container {
            position: relative;
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
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--gray-700);
        }

        /* Buttons */
        .btn {
            width: 100%;
            padding: 1rem 2rem;
            border: none;
            border-radius: 16px;
            font-family: 'Montserrat', sans-serif;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-oil {
            background: var(--oil-dark);
            color: white;
            box-shadow: 0 8px 25px rgba(31, 41, 55, 0.4);
        }

        .btn-oil:hover {
            background: var(--gray-800);
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(31, 41, 55, 0.5);
        }

        .btn-oil:active {
            transform: translateY(0);
        }

        .btn-oil:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: var(--gray-700);
            border: 1px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        /* Alert Messages */
        .alert {
            padding: 1rem 1.5rem;
            border-radius: 16px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.2);
            border: 1px solid rgba(34, 197, 94, 0.4);
            color: var(--success-700);
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid rgba(239, 68, 68, 0.4);
            color: var(--secondary-700);
        }

        /* Action Links */
        .action-links {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .action-link {
            color: var(--oil-dark);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
            margin: 0 0.5rem;
        }

        .action-link:hover {
            color: var(--gray-800);
            transform: translateY(-1px);
        }

        /* Oil Pump Animation */
        .oil-pump {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            opacity: 0.1;
            z-index: -997;
            animation: oilPump 3s ease-in-out infinite;
            color: var(--oil-dark);
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

        /* Password Strength Indicator */
        .password-strength {
            margin-top: 0.5rem;
            display: none;
        }

        .password-strength.show {
            display: block;
        }

        .strength-bar {
            height: 4px;
            border-radius: 2px;
            margin-bottom: 0.5rem;
            background: var(--gray-200);
            overflow: hidden;
        }

        .strength-fill {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak {
            background: var(--secondary-500);
            width: 25%;
        }

        .strength-fair {
            background: var(--oil-amber);
            width: 50%;
        }

        .strength-good {
            background: var(--primary-500);
            width: 75%;
        }

        .strength-strong {
            background: var(--success-500);
            width: 100%;
        }

        .strength-text {
            font-size: 0.8rem;
            color: var(--gray-600);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .register-container {
                padding: 1rem;
            }

            .register-card {
                padding: 2rem;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .logo-circle {
                width: 70px;
                height: 70px;
            }

            .logo-text {
                font-size: 20px;
            }

            .company-name {
                font-size: 1.3rem;
            }

            .register-title {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 480px) {
            .register-card {
                padding: 1.5rem;
            }

            .logo-circle {
                width: 60px;
                height: 60px;
            }

            .logo-text {
                font-size: 18px;
            }

            .company-name {
                font-size: 1.2rem;
            }

            .register-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
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

    <!-- Register Container -->
    <div class="register-container" x-data="registerForm()">
        <div class="register-card">
            <!-- Logo Section -->
            <div class="logo-section">
                <div class="logo-circle">
                    <div class="logo-text">BLJ</div>
                </div>
                <h1 class="company-name">PT. Bumi Laksamana Jaya</h1>
                <p class="company-tagline">Oil & Gas Solutions</p>
            </div>

            <!-- Register Title -->
            <h2 class="register-title">Daftar Akun</h2>

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

            @if($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div>
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div x-show="alertMessage" x-transition>
                <div :class="alertType === 'success' ? 'alert alert-success' : 'alert alert-error'">
                    <i :class="alertType === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle'"></i>
                    <span x-text="alertMessage"></span>
                </div>
            </div>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}" x-on:submit="handleSubmit">
                @csrf

                <!-- Name Field -->
                <div class="form-group">
                    <label for="name" class="form-label">Nama Lengkap *</label>
                    <input type="text" id="name" name="name" class="form-input" placeholder="Masukkan nama lengkap Anda"
                        value="{{ old('name') }}" required autocomplete="name" x-model="name">
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="nama@email.com"
                        value="{{ old('email') }}" required autocomplete="email" x-model="email">
                </div>

                <!-- Password Fields Row -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="password" class="form-label">Password *</label>
                        <div class="password-container">
                            <input :type="showPassword ? 'text' : 'password'" id="password" name="password"
                                class="form-input" placeholder="Minimal 8 karakter" required autocomplete="new-password"
                                x-model="password" x-on:input="checkPasswordStrength">
                            <button type="button" class="password-toggle" x-on:click="showPassword = !showPassword">
                                <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                            </button>
                        </div>

                        <!-- Password Strength Indicator -->
                        <div class="password-strength" :class="password.length > 0 ? 'show' : ''">
                            <div class="strength-bar">
                                <div class="strength-fill" :class="passwordStrengthClass"></div>
                            </div>
                            <div class="strength-text" x-text="passwordStrengthText"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password *</label>
                        <div class="password-container">
                            <input :type="showPasswordConfirm ? 'text' : 'password'" id="password_confirmation"
                                name="password_confirmation" class="form-input" placeholder="Ulangi password" required
                                autocomplete="new-password" x-model="passwordConfirm">
                            <button type="button" class="password-toggle"
                                x-on:click="showPasswordConfirm = !showPasswordConfirm">
                                <i :class="showPasswordConfirm ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Role Selection -->
                <div class="form-group">
                    <label for="role" class="form-label">Jenis Akun *</label>
                    <select id="role" name="role" class="form-select" required x-model="role">
                        <option value="">Pilih jenis akun</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <!-- Register Button -->
                <button type="submit" class="btn btn-oil" :disabled="isLoading">
                    <span x-text="isLoading ? 'Memproses...' : 'Daftar Akun'"></span>
                    <i :class="isLoading ? 'fas fa-spinner fa-spin' : 'fas fa-user-plus'"></i>
                </button>

                <!-- Login Link Button -->
                <a href="{{ route('login') }}" class="btn btn-secondary">
                    <span>Sudah Punya Akun? Login</span>
                    <i class="fas fa-sign-in-alt"></i>
                </a>
            </form>

            <!-- Action Links -->
            <div class="action-links">
                <a href="{{ route('landing') }}" class="action-link">Kembali ke Website</a>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function registerForm() {
            return {
                name: '',
                email: '',
                password: '',
                passwordConfirm: '',
                role: '',
                showPassword: false,
                showPasswordConfirm: false,
                isLoading: false,
                alertMessage: '',
                alertType: 'error',
                passwordStrengthClass: '',
                passwordStrengthText: '',

                init() {
                    console.log('🛢️ PT BLJ Register Portal initialized with oil theme');
                },

                showAlert(message, type = 'error') {
                    this.alertMessage = message;
                    this.alertType = type;

                    // Auto hide alert after 5 seconds
                    setTimeout(() => {
                        this.alertMessage = '';
                    }, 5000);
                },

                checkPasswordStrength() {
                    const password = this.password;
                    let strength = 0;
                    let strengthText = '';
                    let strengthClass = '';

                    if (password.length >= 8) strength++;
                    if (password.match(/[a-z]/)) strength++;
                    if (password.match(/[A-Z]/)) strength++;
                    if (password.match(/[0-9]/)) strength++;
                    if (password.match(/[^a-zA-Z0-9]/)) strength++;

                    switch (strength) {
                        case 0:
                        case 1:
                            strengthText = 'Password terlalu lemah';
                            strengthClass = 'strength-weak';
                            break;
                        case 2:
                            strengthText = 'Password lemah';
                            strengthClass = 'strength-fair';
                            break;
                        case 3:
                        case 4:
                            strengthText = 'Password cukup kuat';
                            strengthClass = 'strength-good';
                            break;
                        case 5:
                            strengthText = 'Password sangat kuat';
                            strengthClass = 'strength-strong';
                            break;
                    }

                    this.passwordStrengthText = strengthText;
                    this.passwordStrengthClass = strengthClass;
                },

                handleSubmit(event) {
                    event.preventDefault();

                    // Clear previous alerts
                    this.alertMessage = '';

                    // Basic validation
                    if (!this.name || !this.email || !this.password || !this.passwordConfirm || !this.role) {
                        this.showAlert('Harap lengkapi semua field yang wajib diisi');
                        return;
                    }

                    // Email validation
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(this.email)) {
                        this.showAlert('Format email tidak valid');
                        return;
                    }

                    // Password validation
                    if (this.password.length < 8) {
                        this.showAlert('Password minimal 8 karakter');
                        return;
                    }

                    // Password confirmation
                    if (this.password !== this.passwordConfirm) {
                        this.showAlert('Konfirmasi password tidak cocok');
                        return;
                    }

                    // Name validation
                    if (this.name.length < 2) {
                        this.showAlert('Nama minimal 2 karakter');
                        return;
                    }

                    // Show loading state
                    this.isLoading = true;

                    // Submit form (Laravel will handle the rest)
                    event.target.submit();
                }
            }
        }

        // Console logging for debugging
        console.log('🛢️ PT BLJ Register Portal loaded successfully!');
        console.log('✨ Oil droplets animation activated!');
        console.log('🔐 Registration form ready with glassmorphism theme!');
        console.log('🎯 User registration interface ready!');
    </script>
</body>

</html>