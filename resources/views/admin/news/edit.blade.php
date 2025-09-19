<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita - PT. Bumi Laksamana Jaya</title>
    <meta name="description" content="Edit Berita PT. Bumi Laksamana Jaya - Oil & Gas Solutions">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .dashboard-layout {
            display: flex;
            min-height: 100vh;
            position: relative;
            z-index: 10;
        }

        .sidebar-placeholder {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--gray-800) 0%, var(--gray-900) 100%);
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            z-index: 1000;
        }

        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 1.5rem;
            transition: margin-left 0.3s ease;
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

        /* Custom Rich Text Editor Styles */
        .custom-editor {
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.5);
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .editor-toolbar {
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1px solid rgba(255, 255, 255, 0.4);
            padding: 0.75rem;
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .editor-btn {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 8px;
            padding: 0.5rem;
            cursor: pointer;
            transition: all 0.2s ease;
            color: var(--gray-600);
            font-size: 0.875rem;
            min-width: 2rem;
            height: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .editor-btn:hover {
            background: rgba(59, 130, 246, 0.1);
            border-color: rgba(59, 130, 246, 0.3);
            color: var(--primary-600);
        }

        .editor-btn.active {
            background: var(--primary-500);
            color: white;
            border-color: var(--primary-600);
        }

        .editor-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .editor-content {
            min-height: 300px;
            padding: 1rem;
            border: none;
            outline: none;
            font-family: inherit;
            font-size: 0.9rem;
            line-height: 1.6;
            overflow-y: auto;
            max-height: 600px;
            background: rgba(255, 255, 255, 0.9);
            color: var(--gray-900);
        }

        .editor-content:empty:before {
            content: 'Tulis konten berita di sini...';
            color: var(--gray-400);
            font-style: italic;
        }

        .editor-content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 0.5rem 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .editor-content p {
            margin-bottom: 1rem;
        }

        .editor-content h1, .editor-content h2, .editor-content h3 {
            margin: 1.5rem 0 1rem 0;
            font-weight: 600;
        }

        .editor-content h1 { font-size: 1.5rem; }
        .editor-content h2 { font-size: 1.25rem; }
        .editor-content h3 { font-size: 1.125rem; }

        .editor-content ul, .editor-content ol {
            margin-left: 2rem;
            margin-bottom: 1rem;
        }

        .editor-content blockquote {
            border-left: 4px solid var(--primary-300);
            padding-left: 1rem;
            margin: 1rem 0;
            color: var(--gray-600);
            font-style: italic;
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
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            color: white;
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
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

            .editor-toolbar {
                padding: 0.5rem;
            }

            .editor-btn {
                min-width: 1.75rem;
                height: 1.75rem;
                font-size: 0.75rem;
            }
        }

        .loading {
            opacity: 0;
            animation: fadeIn 1s ease forwards;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        .spinner {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>

<body class="loading">
    <div class="dashboard-bg"></div>

    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn" onclick="window.toggleMobileSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="dashboard-layout">
        <!-- Include Sidebar -->
        @include('components.sidebar')

        <main class="main-content" id="main-content">
            <header class="page-header">
                <div class="header-left">
                    <h1>Edit Berita</h1>
                    <p>Edit artikel dan berita: {{ $news->title }}</p>
                </div>
                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
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
                <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data" onsubmit="return syncContentBeforeSubmit(this)">
                    @csrf
                    @method('PUT')

                    <!-- Title Field -->
                    <div class="form-group">
                        <div class="form-row">
                            <div>
                                <label for="title" class="form-label">
                                    Judul <span class="required">*</span>
                                </label>
                                <p class="form-description">
                                    Masukkan judul berita yang menarik dan informatif.
                                </p>
                            </div>
                            <div>
                                <textarea id="title" name="title" class="form-control"
                                    placeholder="Masukkan judul berita..." required>{{ old('title', $news->title) }}</textarea>
                                @error('title')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Thumbnail Field -->
                    <div class="form-group">
                        <div class="form-row">
                            <div>
                                <label for="thumbnail" class="form-label">
                                    Gambar Utama
                                </label>
                                <p class="form-description">
                                    Upload gambar utama berita baru atau biarkan kosong untuk mempertahankan gambar yang
                                    ada. Format yang didukung: JPG, PNG, GIF, WebP. Maksimal 2MB.
                                </p>
                            </div>
                            <div>
                                <div class="image-upload" id="thumbnail-container">
                                    <label for="thumbnail" class="image-preview" id="current-image">
                                        <img src="{{ $news->thumbnail_url }}" alt="Current thumbnail">
                                        <div class="image-overlay">
                                            <span class="change-image">Klik untuk ganti gambar</span>
                                        </div>
                                    </label>

                                    <input 
                                        type="file"
                                        id="thumbnail"
                                        name="thumbnail"
                                        class="file-input-hidden"
                                        accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
                                        onchange="previewThumbnail(this)"
                                    >
                                </div>
                                @error('thumbnail')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Category Field -->
                    <div class="form-group">
                        <div class="form-row">
                            <div>
                                <label for="category" class="form-label">
                                    Kategori <span class="required">*</span>
                                </label>
                                <p class="form-description">
                                    Pilih kategori yang sesuai dengan topik berita.
                                </p>
                            </div>
                            <div>
                                <select id="category" name="category" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Berita Umum" {{ old('category', $news->category) == 'Berita Umum' ? 'selected' : '' }}>Berita Umum</option>
                                    <option value="Oil & Gas" {{ old('category', $news->category) == 'Oil & Gas' ? 'selected' : '' }}>Oil & Gas</option>
                                    <option value="Teknologi" {{ old('category', $news->category) == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                                    <option value="Bisnis" {{ old('category', $news->category) == 'Bisnis' ? 'selected' : '' }}>Bisnis</option>
                                    <option value="Pengumuman" {{ old('category', $news->category) == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                                    <option value="Kegiatan" {{ old('category', $news->category) == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                    <option value="Press Release" {{ old('category', $news->category) == 'Press Release' ? 'selected' : '' }}>Press Release</option>
                                </select>
                                @error('category')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Published Date Field -->
                    <div class="form-group">
                        <div class="form-row">
                            <div>
                                <label for="published_at" class="form-label">
                                    Tanggal Publikasi <span class="required">*</span>
                                </label>
                                <p class="form-description">
                                    Tentukan tanggal kapan berita ini akan dipublikasikan.
                                </p>
                            </div>
                            <div>
                                <input type="text" id="published_at" name="published_at" class="form-control"
                                    placeholder="Pilih tanggal publikasi..." required
                                    value="{{ old('published_at', $news->published_at->format('Y-m-d')) }}">
                                @error('published_at')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Content Field -->
                    <div class="form-group">
                        <div class="form-row">
                            <div>
                                <label for="content" class="form-label">
                                    Konten Berita <span class="required">*</span>
                                </label>
                                <p class="form-description">
                                    Edit konten berita lengkap dengan detail. Gunakan toolbar untuk format teks dan upload gambar.
                                </p>
                            </div>
                            <div>
                                <div class="custom-editor">
                                    <!-- Toolbar -->
                                    <div class="editor-toolbar">
                                        <button type="button" class="editor-btn" onclick="formatText('bold')" title="Bold">
                                            <i class="fas fa-bold"></i>
                                        </button>
                                        <button type="button" class="editor-btn" onclick="formatText('italic')" title="Italic">
                                            <i class="fas fa-italic"></i>
                                        </button>
                                        <button type="button" class="editor-btn" onclick="formatText('underline')" title="Underline">
                                            <i class="fas fa-underline"></i>
                                        </button>
                                        <div style="width: 1px; height: 1.5rem; background: rgba(59, 130, 246, 0.2); margin: 0 0.25rem;"></div>
                                        <button type="button" class="editor-btn" onclick="formatText('formatBlock', 'h2')" title="Heading 1">
                                            H1
                                        </button>
                                        <button type="button" class="editor-btn" onclick="formatText('formatBlock', 'h3')" title="Heading 2">
                                            H2
                                        </button>
                                        <button type="button" class="editor-btn" onclick="formatText('formatBlock', 'p')" title="Paragraph">
                                            P
                                        </button>
                                        <div style="width: 1px; height: 1.5rem; background: rgba(59, 130, 246, 0.2); margin: 0 0.25rem;"></div>
                                        <button type="button" class="editor-btn" onclick="formatText('insertUnorderedList')" title="Bullet List">
                                            <i class="fas fa-list-ul"></i>
                                        </button>
                                        <button type="button" class="editor-btn" onclick="formatText('insertOrderedList')" title="Numbered List">
                                            <i class="fas fa-list-ol"></i>
                                        </button>
                                        <div style="width: 1px; height: 1.5rem; background: rgba(59, 130, 246, 0.2); margin: 0 0.25rem;"></div>
                                        <button type="button" class="editor-btn" onclick="uploadImage()" title="Upload Image" id="upload-btn">
                                            <i class="fas fa-image"></i>
                                        </button>
                                        <button type="button" class="editor-btn" onclick="insertLink()" title="Insert Link">
                                            <i class="fas fa-link"></i>
                                        </button>
                                    </div>

                                    <!-- Content Editable Area -->
                                    <div 
                                        id="editor-content"
                                        class="editor-content"
                                        contenteditable="true"
                                        oninput="document.getElementById('content').value = this.innerHTML"
                                    ></div>

                                    <!-- Hidden file input for images -->
                                    <input 
                                        type="file"
                                        id="image-upload"
                                        class="file-input-hidden"
                                        accept="image/*"
                                        onchange="handleImageUpload(this)"
                                    >
                                </div>

                                <!-- Hidden input to store content -->
                                <input type="hidden" id="content" name="content" value="{{ old('content', $news->content) }}" required>
                                
                                @error('content')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i>
                            <span>Batal</span>
                        </a>
                        <button type="submit" class="btn btn-primary" id="submit-btn">
                            <i class="fas fa-save"></i>
                            <span>Update Berita</span>
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        // Simple vanilla JavaScript - no complications
        let isUploading = false;
        let isSubmitting = false;

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Flatpickr
            flatpickr("#published_at", {
                dateFormat: "Y-m-d",
                allowInput: true,
                locale: {
                    weekdays: {
                        shorthand: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                        longhand: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']
                    },
                    months: {
                        shorthand: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                        longhand: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
                    },
                }
            });

            // Get content and clean it up using DOM manipulation
            const rawContent = {!! json_encode(old('content', $news->content)) !!};
            const cleanedContent = cleanContentWithDOM(rawContent);
            
            if (cleanedContent) {
                const editorElement = document.getElementById('editor-content');
                editorElement.innerHTML = cleanedContent;
                document.getElementById('content').value = cleanedContent;
                console.log('Editor loaded with cleaned content');
            }

            // Page loading animation
            document.body.classList.remove('loading');
        });

        // Function to clean content using DOM manipulation
        function cleanContentWithDOM(htmlString) {
            if (!htmlString) return '';
            
            // Create a temporary div to parse HTML
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = htmlString;
            
            // Remove empty divs and brs
            const emptyDivs = tempDiv.querySelectorAll('div');
            emptyDivs.forEach(div => {
                // If div only contains <br> or is empty, replace with its content or remove
                if (div.innerHTML === '<br>' || div.innerHTML === '' || div.innerHTML.trim() === '') {
                    div.remove();
                } else {
                    // Convert div to p tag for better formatting
                    const p = document.createElement('p');
                    p.innerHTML = div.innerHTML;
                    div.parentNode.replaceChild(p, div);
                }
            });
            
            // Clean up extra br tags
            const brs = tempDiv.querySelectorAll('br');
            brs.forEach(br => {
                // Remove br if it's immediately followed by another br or at the end
                const next = br.nextSibling;
                if (next && next.nodeType === 1 && next.tagName === 'BR') {
                    br.remove();
                }
            });
            
            // Fix images - ensure they have proper styling
            const images = tempDiv.querySelectorAll('img');
            images.forEach(img => {
                img.style.maxWidth = '100%';
                img.style.height = 'auto';
                img.style.borderRadius = '8px';
                img.style.margin = '0.5rem 0';
                img.style.boxShadow = '0 2px 8px rgba(0,0,0,0.1)';
                img.style.display = 'block';
                
                // Ensure alt attribute exists
                if (!img.getAttribute('alt')) {
                    img.setAttribute('alt', 'Uploaded image');
                }
            });
            
            // Remove empty paragraphs
            const emptyPs = tempDiv.querySelectorAll('p');
            emptyPs.forEach(p => {
                if (p.innerHTML === '' || p.innerHTML === '<br>' || p.innerHTML.trim() === '') {
                    p.remove();
                }
            });
            
            const result = tempDiv.innerHTML.trim();
            console.log('Original:', htmlString);
            console.log('Cleaned:', result);
            return result;
        }

        // Thumbnail preview function
        function previewThumbnail(input) {
            const file = input.files[0];
            const container = input.closest('.image-upload');
            
            if (file) {
                // Validate file size
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar. Maksimal 2MB.');
                    input.value = '';
                    return;
                }

                // Validate file type
                const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Format file tidak didukung. Gunakan JPG, PNG, GIF, atau WebP.');
                    input.value = '';
                    return;
                }

                // Create preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Update current image area with new preview
                    const currentImage = document.getElementById('current-image');
                    currentImage.innerHTML = `
                        <img src="${e.target.result}" alt="New preview" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                        <div class="image-overlay">
                            <span class="change-image">Klik untuk ganti gambar</span>
                        </div>
                    `;
                    console.log('New thumbnail preview created, file input still exists:', !!document.getElementById('thumbnail'));
                };
                reader.readAsDataURL(file);
            }
        }

        // Text formatting functions
        function formatText(command, value = null) {
            document.execCommand(command, false, value);
            document.getElementById('content').value = document.getElementById('editor-content').innerHTML;
        }

        // Upload image to content
        function uploadImage() {
            if (isUploading) return;
            document.getElementById('image-upload').click();
        }

        // Handle image upload
        async function handleImageUpload(input) {
            const file = input.files[0];
            if (!file) return;

            // Validate file
            if (file.size > 5 * 1024 * 1024) {
                alert('Ukuran gambar terlalu besar. Maksimal 5MB.');
                return;
            }

            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
            if (!allowedTypes.includes(file.type)) {
                alert('Format gambar tidak didukung. Gunakan JPG, PNG, GIF, atau WebP.');
                return;
            }

            isUploading = true;
            // Show loading state
            const uploadBtn = document.getElementById('upload-btn');
            const originalHTML = uploadBtn.innerHTML;
            uploadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

            try {
                const formData = new FormData();
                formData.append('upload', file);

                const response = await fetch('/admin/news/upload-content-image', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });

                const result = await response.json();

                if (result.uploaded && result.url) {
                    // Insert image into editor
                    const img = `<img src="${result.url}" alt="Uploaded image" style="max-width: 100%; height: auto; border-radius: 8px; margin: 0.5rem 0; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">`;
                    document.execCommand('insertHTML', false, img);
                    document.getElementById('content').value = document.getElementById('editor-content').innerHTML;
                } else {
                    throw new Error(result.error?.message || 'Upload failed');
                }
            } catch (error) {
                console.error('Upload error:', error);
                alert('Gagal mengupload gambar: ' + error.message);
            } finally {
                isUploading = false;
                uploadBtn.innerHTML = originalHTML;
                input.value = ''; // Reset file input
            }
        }

        // Insert link
        function insertLink() {
            const url = prompt('Masukkan URL link:');
            if (url) {
                const text = window.getSelection().toString() || url;
                const link = `<a href="${url}" target="_blank" style="color: var(--primary-600); text-decoration: underline;">${text}</a>`;
                document.execCommand('insertHTML', false, link);
                document.getElementById('content').value = document.getElementById('editor-content').innerHTML;
            }
        }

        // Sync content before form submit with cleaning
        function syncContentBeforeSubmit(form) {
            if (isSubmitting) {
                return false; // Prevent double submission
            }

            // Get content from editor and clean it
            const rawEditorContent = document.getElementById('editor-content').innerHTML;
            const cleanedContent = cleanContentWithDOM(rawEditorContent);
            
            // Set cleaned content to hidden input
            document.getElementById('content').value = cleanedContent;
            
            console.log('Final content for submit:', cleanedContent);
            
            // Show loading state
            isSubmitting = true;
            const submitBtn = document.getElementById('submit-btn');
            submitBtn.innerHTML = '<i class="fas fa-spinner spinner"></i><span>Mengupdate...</span>';
            submitBtn.disabled = true;
            
            return true; // Allow form to submit
        }

        // Update format text to use DOM cleaning
        function formatText(command, value = null) {
            document.execCommand(command, false, value);
            const rawContent = document.getElementById('editor-content').innerHTML;
            const cleanedContent = cleanContentWithDOM(rawContent);
            document.getElementById('content').value = cleanedContent;
        }

        // Update image upload to use DOM cleaning
        async function handleImageUpload(input) {
            const file = input.files[0];
            if (!file) return;

            // Validate file
            if (file.size > 5 * 1024 * 1024) {
                alert('Ukuran gambar terlalu besar. Maksimal 5MB.');
                return;
            }

            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
            if (!allowedTypes.includes(file.type)) {
                alert('Format gambar tidak didukung. Gunakan JPG, PNG, GIF, atau WebP.');
                return;
            }

            isUploading = true;
            const uploadBtn = document.getElementById('upload-btn');
            const originalHTML = uploadBtn.innerHTML;
            uploadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

            try {
                const formData = new FormData();
                formData.append('upload', file);

                const response = await fetch('/admin/news/upload-content-image', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });

                const result = await response.json();

                if (result.uploaded && result.url) {
                    // Insert clean image into editor
                    const img = `<img src="${result.url}" alt="Uploaded image" style="max-width: 100%; height: auto; border-radius: 8px; margin: 0.5rem 0; box-shadow: 0 2px 8px rgba(0,0,0,0.1); display: block;">`;
                    document.execCommand('insertHTML', false, img);
                    
                    // Clean content after insertion
                    setTimeout(() => {
                        const rawContent = document.getElementById('editor-content').innerHTML;
                        const cleanedContent = cleanContentWithDOM(rawContent);
                        document.getElementById('content').value = cleanedContent;
                    }, 100);
                } else {
                    throw new Error(result.error?.message || 'Upload failed');
                }
            } catch (error) {
                console.error('Upload error:', error);
                alert('Gagal mengupload gambar: ' + error.message);
            } finally {
                isUploading = false;
                uploadBtn.innerHTML = originalHTML;
                input.value = ''; // Reset file input
            }
        }

        // Update link insertion to use DOM cleaning
        function insertLink() {
            const url = prompt('Masukkan URL link:');
            if (url) {
                const text = window.getSelection().toString() || url;
                const link = `<a href="${url}" target="_blank" style="color: var(--primary-600); text-decoration: underline;">${text}</a>`;
                document.execCommand('insertHTML', false, link);
                
                // Clean content after insertion
                const rawContent = document.getElementById('editor-content').innerHTML;
                const cleanedContent = cleanContentWithDOM(rawContent);
                document.getElementById('content').value = cleanedContent;
            }
        }

        console.log('✏️ News Edit Page loaded successfully!');
    </script>
</body>

</html>