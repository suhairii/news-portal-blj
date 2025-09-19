<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Partnership - PT. Bumi Laksamana Jaya</title>
    <meta name="description" content="Tambah Partnership PT. Bumi Laksamana Jaya - Oil & Gas Solutions">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

            --oil-gold: #fbbf24;
            --oil-amber: #f59e0b;
            --oil-orange: #ea580c;

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

        .form-container {
            background: rgba(255, 255, 255, 0.35);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 20px;
            padding: 2rem;
            backdrop-filter: blur(30px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15);
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
            align-items: start;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .form-description {
            font-size: 0.85rem;
            color: var(--gray-600);
            line-height: 1.5;
        }

        .required {
            color: var(--secondary-600);
        }

        .form-control {
            width: 100%;
            padding: 0.875rem;
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
            font-family: inherit;
            transition: all 0.3s ease;
            resize: vertical;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-500);
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        textarea.form-control {
            min-height: 120px;
            max-height: 200px;
        }

        .image-upload {
            position: relative;
            width: 250px;
            height: 200px;
            border: 2px dashed rgba(59, 130, 246, 0.3);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .image-upload:hover {
            border-color: rgba(59, 130, 246, 0.5);
            background: rgba(59, 130, 246, 0.05);
        }

        .image-upload input {
            display: none;
        }

        .upload-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: var(--gray-500);
            text-align: center;
            padding: 1rem;
            cursor: pointer;
        }

        .upload-placeholder i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: var(--primary-500);
        }

        .image-preview {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.7));
            display: flex;
            align-items: flex-end;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 10px;
        }

        .image-preview:hover .image-overlay {
            opacity: 1;
        }

        .change-image {
            color: white;
            padding: 0.5rem 1rem;
            margin-bottom: 0.5rem;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .error-message {
            color: var(--secondary-600);
            font-size: 0.8rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn {
            padding: 0.875rem 1.5rem;
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
            min-width: 120px;
            justify-content: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--oil-gold), var(--oil-amber));
            color: white;
            box-shadow: 0 6px 20px rgba(251, 191, 36, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(251, 191, 36, 0.4);
            background: linear-gradient(135deg, var(--oil-amber), var(--oil-orange));
        }

        .btn-primary:disabled {
            opacity: 0.7;
            transform: none;
            cursor: not-allowed;
        }

        .btn-secondary {
            background: rgba(107, 114, 128, 0.1);
            color: var(--gray-700);
            border: 1px solid rgba(107, 114, 128, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(107, 114, 128, 0.15);
            transform: translateY(-1px);
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

        .file-input-hidden {
            position: absolute;
            left: -9999px;
            opacity: 0;
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

            .form-row {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .form-container {
                padding: 1.5rem;
            }

            .image-upload {
                width: 100%;
                max-width: 300px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
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
    <div class="dashboard-bg"></div>

    <button class="mobile-menu-btn" onclick="window.toggleMobileSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="dashboard-layout">
        @include('components.sidebar')

        <main class="main-content" id="main-content">
            <header class="page-header">
                <div class="header-left">
                    <h1>Tambah Partnership</h1>
                    <p>Buat partnership baru untuk PT. Bumi Laksamana Jaya</p>
                </div>
                <a href="{{ route('admin.partnerships.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
            </header>

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

            <div class="form-container">
                <form method="POST" action="{{ route('admin.partnerships.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name Field -->
                    <div class="form-group">
                        <div class="form-row">
                            <div>
                                <label for="name" class="form-label">
                                    Nama Partnership <span class="required">*</span>
                                </label>
                                <p class="form-description">
                                    Masukkan nama lengkap perusahaan partner yang akan bekerja sama.
                                </p>
                            </div>
                            <div>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Masukkan nama perusahaan partner" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Logo Field -->
                    <div class="form-group">
                        <div class="form-row">
                            <div>
                                <label for="logo" class="form-label">
                                    Logo Partnership <span class="required">*</span>
                                </label>
                                <p class="form-description">
                                    Upload logo perusahaan partner. Format yang didukung: PNG, JPG, GIF, SVG. Maksimal
                                    2MB.
                                </p>
                            </div>
                            <div>
                                <div class="image-upload" id="logo-container">
                                    <label for="logo" class="upload-placeholder">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <span style="font-size: 0.9rem; font-weight: 500;">Klik untuk upload logo</span>
                                        <small style="font-size: 0.75rem; margin-top: 0.25rem; opacity: 0.8;">Format:
                                            PNG, JPG, GIF, SVG (Max: 2MB)</small>
                                    </label>

                                    <input type="file" id="logo" name="logo" class="file-input-hidden"
                                        accept="image/png,image/jpg,image/jpeg,image/gif,image/svg+xml"
                                        onchange="previewLogo(this)" required>
                                </div>
                                @error('logo')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Description Field -->
                    <div class="form-group">
                        <div class="form-row">
                            <div>
                                <label for="description" class="form-label">
                                    Deskripsi
                                </label>
                                <p class="form-description">
                                    Berikan deskripsi singkat tentang partnership ini dan jenis kerja sama yang
                                    dilakukan.
                                </p>
                            </div>
                            <div>
                                <textarea id="description" name="description" class="form-control"
                                    placeholder="Deskripsi tentang partnership ini...">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Website Field -->
                    <div class="form-group">
                        <div class="form-row">
                            <div>
                                <label for="website" class="form-label">
                                    Website
                                </label>
                                <p class="form-description">
                                    URL website resmi perusahaan partner (opsional).
                                </p>
                            </div>
                            <div>
                                <input type="url" id="website" name="website" class="form-control"
                                    placeholder="https://example.com" value="{{ old('website') }}">
                                @error('website')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('admin.partnerships.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i>
                            <span>Batal</span>
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            <span>Simpan Partnership</span>
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function () {
            // Page loading animation
            document.body.classList.remove('loading');
        });

        // Logo preview function - Fixed version
        function previewLogo(input) {
            const file = input.files[0];
            const container = input.closest('.image-upload');

            if (file) {
                console.log('File selected:', file.name, 'Size:', file.size, 'Type:', file.type);

                // Validate file size
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar. Maksimal 2MB.');
                    input.value = '';
                    return;
                }

                // Validate file type
                const allowedTypes = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif', 'image/svg+xml'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Format file tidak didukung. Gunakan PNG, JPG, GIF, atau SVG.');
                    input.value = '';
                    return;
                }

                // Create preview
                const reader = new FileReader();
                reader.onload = function (e) {
                    console.log('File read successfully, creating preview');

                    // Find the label element and update it
                    const labelElement = container.querySelector('label');
                    if (labelElement) {
                        labelElement.innerHTML = `
                            <div class="image-preview">
                                <img src="${e.target.result}" alt="Logo Preview" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                                <div class="image-overlay">
                                    <span class="change-image">Klik untuk ganti logo</span>
                                </div>
                            </div>
                        `;
                        console.log('Preview created successfully');
                    }
                };

                reader.onerror = function (error) {
                    console.error('Error reading file:', error);
                    alert('Gagal membaca file. Silakan coba lagi.');
                };

                // Read the file
                reader.readAsDataURL(file);
            } else {
                console.log('No file selected');
            }
        }

        console.log('🤝 Partnership Create Page loaded successfully!');
    </script>
</body>

</html>