<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($news) ? 'Edit' : 'Tambah' }} Berita - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- CKEditor 5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/40.1.0/ckeditor.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.4s ease-out',
                        'bounce-subtle': 'bounceSubtle 0.6s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        },
                        bounceSubtle: {
                            '0%, 20%, 50%, 80%, 100%': { transform: 'translateY(0)' },
                            '40%': { transform: 'translateY(-3px)' },
                            '60%': { transform: 'translateY(-2px)' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .form-input {
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
        }
        
        .form-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            transform: translateY(-1px);
        }
        
        .form-input:hover {
            border-color: #9ca3af;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }
        
        .btn-secondary {
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .floating-label {
            position: relative;
        }
        
        .floating-label input:focus + label,
        .floating-label input:not(:placeholder-shown) + label,
        .floating-label textarea:focus + label,
        .floating-label textarea:not(:placeholder-shown) + label {
            transform: translateY(-24px) scale(0.85);
            color: #3b82f6;
        }
        
        .floating-label label {
            position: absolute;
            left: 12px;
            top: 12px;
            transition: all 0.3s ease;
            pointer-events: none;
            background: white;
            padding: 0 4px;
        }
        
        .image-preview {
            transition: all 0.3s ease;
        }
        
        .image-preview:hover {
            transform: scale(1.02);
        }

        /* CKEditor Styles */
        .ck-editor__editable {
            min-height: 400px !important;
            max-height: 600px !important;
            border-radius: 12px !important;
        }

        .ck.ck-editor {
            border-radius: 12px !important;
            border: 2px solid #e5e7eb !important;
            overflow: hidden;
        }

        .ck.ck-editor:focus-within {
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
        }

        .ck.ck-toolbar {
            border-bottom: 1px solid #e5e7eb !important;
            background: #f8fafc !important;
        }

        .ck-content img {
            max-width: 100% !important;
            height: auto !important;
            border-radius: 8px !important;
            margin: 10px 0 !important;
        }

        /* Upload Progress */
        .upload-progress {
            background: linear-gradient(90deg, #3b82f6 0%, #1d4ed8 100%);
            height: 4px;
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        /* Notification Styles */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            padding: 16px 20px;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            transform: translateX(400px);
            transition: transform 0.3s ease;
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification.success {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .notification.error {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">
    <div class="min-h-screen animate-fade-in">
        <!-- Enhanced Header -->
        <header class="glass-effect sticky top-0 z-10 border-b border-white/20 shadow-lg">
            <div class="px-6 py-6">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-newspaper text-white text-lg"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                                {{ isset($news) ? 'Edit' : 'Tambah' }} Berita
                            </h1>
                            <p class="text-sm text-gray-500">{{ isset($news) ? 'Perbarui informasi berita' : 'Buat artikel berita baru' }}</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.news.index') }}" 
                       class="btn-secondary flex items-center px-4 py-2 text-blue-600 hover:text-blue-800 bg-white rounded-lg border border-blue-200 hover:border-blue-300">
                        <i class="fas fa-arrow-left mr-2"></i>
                        <span>Kembali ke Daftar</span>
                    </a>
                </div>
            </div>
        </header>

        <div class="px-6 py-8">
            <div class="max-w-6xl mx-auto">
                <!-- Progress Indicator -->
                <div class="mb-8">
                    <div class="flex items-center justify-center space-x-4 mb-4">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm font-semibold">1</div>
                            <span class="ml-2 text-sm font-medium text-blue-600">Informasi Dasar</span>
                        </div>
                        <div class="w-16 h-1 bg-blue-200 rounded"></div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center text-gray-600 text-sm font-semibold">2</div>
                            <span class="ml-2 text-sm font-medium text-gray-500">Publikasi</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden animate-slide-up">
                    <form action="{{ isset($news) ? route('admin.news.update', $news) : route('admin.news.store') }}" 
                          method="POST" enctype="multipart/form-data" class="p-8" id="newsForm">
                        @csrf
                        @if(isset($news))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 xl:grid-cols-4 gap-8">
                            <!-- Main Content Area -->
                            <div class="xl:col-span-3 space-y-8">
                                <!-- Title Section -->
                                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <i class="fas fa-heading text-blue-500 mr-2"></i>
                                        Informasi Utama
                                    </h3>
                                    
                                    <!-- Title Input -->
                                    <div class="floating-label mb-6">
                                        <input type="text" name="title" 
                                               value="{{ old('title', $news->title ?? '') }}"
                                               placeholder="Masukkan judul berita yang menarik..."
                                               class="form-input w-full px-4 py-3 rounded-xl bg-white focus:bg-white"
                                               required>
                                        <label class="text-gray-600 font-medium">Judul Berita</label>
                                        @error('title')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>

                                    <!-- Excerpt Input -->
                                    <div class="floating-label">
                                        <textarea name="excerpt" rows="4" 
                                                  placeholder="Tulis ringkasan singkat yang menggambarkan inti berita..."
                                                  class="form-input w-full px-4 py-3 rounded-xl bg-white resize-none"
                                                  required>{{ old('excerpt', $news->excerpt ?? '') }}</textarea>
                                        <label class="text-gray-600 font-medium">Ringkasan Berita</label>
                                        @error('excerpt')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Enhanced Content Section with CKEditor -->
                                <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 border border-green-100">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <i class="fas fa-align-left text-green-500 mr-2"></i>
                                        Konten Artikel
                                    </h3>
                                    
                                    <div class="bg-blue-50 p-4 rounded-lg mb-4">
                                        <div class="flex items-start space-x-3">
                                            <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                                            <div>
                                                <h4 class="font-semibold text-blue-800 mb-1">Tips Menambahkan Gambar:</h4>
                                                <ul class="text-sm text-blue-700 space-y-1">
                                                    <li>• Gunakan tombol "Upload Gambar" di toolbar editor</li>
                                                    <li>• Drag & drop gambar langsung ke editor</li>
                                                    <li>• Copy paste gambar dari clipboard</li>
                                                    <li>• Gambar akan disimpan di folder storage/imagesNews/</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- CKEditor Container -->
                                    <div>
                                        <textarea name="content" id="contentEditor" 
                                                  style="display:none;">{{ old('content', $news->content ?? '') }}</textarea>
                                        <div id="ckEditorContainer"></div>
                                    </div>
                                    
                                    @error('content')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Sidebar -->
                            <div class="space-y-6">
                                <!-- Image Upload -->
                                <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm">
                                    <h4 class="text-md font-semibold text-gray-800 mb-4 flex items-center">
                                        <i class="fas fa-image text-purple-500 mr-2"></i>
                                        Gambar Utama
                                    </h4>
                                    
                                    <div class="space-y-4">
                                        <input type="file" name="image" accept="image/*"
                                               class="form-input w-full px-4 py-3 rounded-xl border-dashed border-2 border-gray-300 hover:border-purple-400 transition-colors">
                                        
                                        @if(isset($news) && $news->image)
                                        <div class="image-preview">
                                            <img src="{{ asset('storage/' . $news->image) }}" 
                                                 alt="Current image" 
                                                 class="w-full h-40 object-cover rounded-xl border-2 border-gray-200">
                                            <p class="text-xs text-gray-500 mt-2 text-center">Gambar saat ini</p>
                                        </div>
                                        @endif
                                        
                                        @error('image')
                                        <p class="text-sm text-red-600 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Category Selection -->
                                <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm">
                                    <h4 class="text-md font-semibold text-gray-800 mb-4 flex items-center">
                                        <i class="fas fa-tags text-orange-500 mr-2"></i>
                                        Kategori
                                    </h4>
                                    
                                    <select name="category" 
                                            class="form-input w-full px-4 py-3 rounded-xl"
                                            required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach(['politik', 'ekonomi', 'olahraga', 'teknologi', 'hiburan', 'kesehatan'] as $cat)
                                        <option value="{{ $cat }}" 
                                                {{ old('category', $news->category ?? '') === $cat ? 'selected' : '' }}>
                                            {{ ucfirst($cat) }}
                                        </option>
                                        @endforeach
                                    </select>
                                    
                                    @error('category')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                <!-- Author Info -->
                                <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm">
                                    <h4 class="text-md font-semibold text-gray-800 mb-4 flex items-center">
                                        <i class="fas fa-user-edit text-teal-500 mr-2"></i>
                                        Penulis
                                    </h4>
                                    
                                    <input type="text" name="author" 
                                           value="{{ old('author', $news->author ?? 'Admin BLJ') }}"
                                           placeholder="Nama penulis"
                                           class="form-input w-full px-4 py-3 rounded-xl"
                                           required>
                                    
                                    @error('author')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                <!-- Publication Settings -->
                                <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm">
                                    <h4 class="text-md font-semibold text-gray-800 mb-4 flex items-center">
                                        <i class="fas fa-cog text-indigo-500 mr-2"></i>
                                        Pengaturan Publikasi
                                    </h4>
                                    
                                    <div class="space-y-4">
                                        <!-- Status -->
                                        <div>
                                            <label class="text-sm font-medium text-gray-600 mb-2 block">Status</label>
                                            <select name="status" 
                                                    class="form-input w-full px-4 py-3 rounded-xl"
                                                    required>
                                                <option value="draft" {{ old('status', $news->status ?? '') === 'draft' ? 'selected' : '' }}>
                                                    📝 Draft
                                                </option>
                                                <option value="published" {{ old('status', $news->status ?? '') === 'published' ? 'selected' : '' }}>
                                                    🚀 Published
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Featured -->
                                        <div class="bg-yellow-50 rounded-lg p-4 border border-yellow-200">
                                            <label class="flex items-center cursor-pointer">
                                                <input type="checkbox" name="featured" value="1" 
                                                       {{ old('featured', $news->featured ?? false) ? 'checked' : '' }}
                                                       class="mr-3 w-5 h-5 text-yellow-600 bg-yellow-100 border-yellow-300 rounded focus:ring-yellow-500">
                                                <div>
                                                    <span class="text-sm font-medium text-yellow-800">Berita Unggulan</span>
                                                    <p class="text-xs text-yellow-600">Tampilkan di bagian utama website</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    @error('status')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-12 pt-8 border-t border-gray-200">
                            <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4">
                                <a href="{{ route('admin.news.index') }}" 
                                   class="btn-secondary px-8 py-3 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 text-center transition-all duration-300">
                                    <i class="fas fa-times mr-2"></i>
                                    Batal
                                </a>
                                <button type="submit" 
                                        class="btn-primary px-8 py-3 text-white rounded-xl font-semibold animate-bounce-subtle">
                                    <i class="fas fa-save mr-2"></i>
                                    {{ isset($news) ? 'Update' : 'Simpan' }} Berita
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification Container -->
    <div id="notificationContainer"></div>

    <script>
        let editorInstance;

        // Notification System
        function showNotification(message, type = 'success') {
            const container = document.getElementById('notificationContainer');
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.innerHTML = `
                <div class="flex items-center">
                    <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} mr-2"></i>
                    <span>${message}</span>
                </div>
            `;
            
            container.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.add('show');
            }, 100);
            
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    container.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // Custom Upload Adapter for CKEditor dengan path imagesNews
        class CustomUploadAdapter {
            constructor(loader) {
                this.loader = loader;
            }

            upload() {
                return this.loader.file
                    .then(file => new Promise((resolve, reject) => {
                        const formData = new FormData();
                        formData.append('upload', file);
                        formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', '/admin/news/upload-content-image', true);

                        xhr.upload.addEventListener('progress', (e) => {
                            if (e.lengthComputable) {
                                const percentComplete = (e.loaded / e.total) * 100;
                                console.log(`Upload progress: ${percentComplete}%`);
                            }
                        });

                        xhr.addEventListener('load', () => {
                            if (xhr.status === 200) {
                                try {
                                    const response = JSON.parse(xhr.responseText);
                                    if (response.success) {
                                        showNotification('Gambar berhasil diupload!', 'success');
                                        resolve({
                                            default: response.url
                                        });
                                    } else {
                                        showNotification(response.message || 'Upload gagal', 'error');
                                        reject(response.message || 'Upload gagal');
                                    }
                                } catch (e) {
                                    showNotification('Terjadi kesalahan saat upload', 'error');
                                    reject('Terjadi kesalahan saat upload');
                                }
                            } else {
                                showNotification('Upload gagal', 'error');
                                reject('Upload gagal');
                            }
                        });

                        xhr.addEventListener('error', () => {
                            showNotification('Koneksi error', 'error');
                            reject('Koneksi error');
                        });

                        xhr.send(formData);
                    }));
            }

            abort() {
                if (this.xhr) {
                    this.xhr.abort();
                }
            }
        }

        function CustomUploadAdapterPlugin(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                return new CustomUploadAdapter(loader);
            };
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize CKEditor 5
            ClassicEditor
                .create(document.querySelector('#ckEditorContainer'), {
                    extraPlugins: [CustomUploadAdapterPlugin],
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'underline',
                            'link',
                            '|',
                            'bulletedList',
                            'numberedList',
                            '|',
                            'outdent',
                            'indent',
                            '|',
                            'imageUpload',
                            'blockQuote',
                            'insertTable',
                            'mediaEmbed',
                            '|',
                            'undo',
                            'redo',
                            '|',
                            'sourceEditing'
                        ]
                    },
                    language: 'id',
                    image: {
                        toolbar: [
                            'imageTextAlternative',
                            'imageStyle:inline',
                            'imageStyle:block',
                            'imageStyle:side',
                            'linkImage',
                            'imageStyle:alignLeft',
                            'imageStyle:alignCenter',
                            'imageStyle:alignRight'
                        ],
                        styles: [
                            'full',
                            'side',
                            'alignLeft',
                            'alignCenter',
                            'alignRight'
                        ]
                    },
                    // Link configuration
                    link: {
                        decorators: {
                            openInNewTab: {
                                mode: 'manual',
                                label: 'Open in a new tab',
                                attributes: {
                                    target: '_blank',
                                    rel: 'noopener noreferrer'
                                }
                            }
                        }
                    },
                    // Table configuration
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells'
                        ]
                    },
                    // Media embed configuration
                    mediaEmbed: {
                        previewsInData: true
                    }
                })
                .then(editor => {
                    editorInstance = editor;
                    
                    // Set initial content
                    const initialContent = document.querySelector('#contentEditor').value;
                    if (initialContent) {
                        editor.setData(initialContent);
                    }
                    
                    // Sync content with textarea on change
                    editor.model.document.on('change:data', () => {
                        document.querySelector('#contentEditor').value = editor.getData();
                    });

                    // Handle paste events for images
                    editor.editing.view.document.on('paste', (evt, data) => {
                        const items = Array.from(data.dataTransfer.items || []);
                        const imageItems = items.filter(item => item.type.indexOf('image/') !== -1);
                        
                        if (imageItems.length > 0) {
                            imageItems.forEach(item => {
                                const file = item.getAsFile();
                                if (file) {
                                    // Upload melalui adapter yang sudah dikonfigurasi
                                    editor.execute('imageUpload', { file: file });
                                }
                            });
                        }
                    });

                    // Handle drag and drop
                    editor.editing.view.document.on('drop', (evt, data) => {
                        const files = Array.from(data.dataTransfer.files || []);
                        const imageFiles = files.filter(file => file.type.indexOf('image/') !== -1);
                        
                        if (imageFiles.length > 0) {
                            evt.preventDefault();
                            imageFiles.forEach(file => {
                                editor.execute('imageUpload', { file: file });
                            });
                        }
                    });

                    console.log('CKEditor berhasil diinisialisasi dengan upload adapter');
                })
                .catch(error => {
                    console.error('Error initializing CKEditor:', error);
                    showNotification('Gagal menginisialisasi editor', 'error');
                });

            // Auto-resize textareas
            const textareas = document.querySelectorAll('textarea:not(#contentEditor)');
            textareas.forEach(textarea => {
                textarea.addEventListener('input', function() {
                    this.style.height = 'auto';
                    this.style.height = this.scrollHeight + 'px';
                });
            });

            // Image preview functionality for file upload
            const imageInput = document.querySelector('input[name="image"]');
            if (imageInput) {
                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            let preview = document.querySelector('.new-image-preview');
                            if (!preview) {
                                preview = document.createElement('div');
                                preview.className = 'new-image-preview image-preview mt-4';
                                preview.innerHTML = `
                                    <img class="w-full h-40 object-cover rounded-xl border-2 border-gray-200" />
                                    <p class="text-xs text-gray-500 mt-2 text-center">Preview gambar baru</p>
                                `;
                                imageInput.parentNode.appendChild(preview);
                            }
                            preview.querySelector('img').src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            // Form validation and submission
            const form = document.getElementById('newsForm');
            form.addEventListener('submit', function(e) {
                // Sync CKEditor content before submit
                if (editorInstance) {
                    document.querySelector('#contentEditor').value = editorInstance.getData();
                }
                
                const button = form.querySelector('button[type="submit"]');
                button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
                button.disabled = true;
            });
        });
    </script>
</body>
</html>