<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($news) ? 'Edit' : 'Tambah' }} Berita - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b">
            <div class="px-6 py-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-900">{{ isset($news) ? 'Edit' : 'Tambah' }} Berita</h1>
                    <a href="{{ route('admin.news.index') }}" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar
                    </a>
                </div>
            </div>
        </header>

        <div class="px-6 py-8">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-lg shadow">
                    <form action="{{ isset($news) ? route('admin.news.update', $news) : route('admin.news.store') }}" 
                          method="POST" enctype="multipart/form-data" class="p-6">
                        @csrf
                        @if(isset($news))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Main Content -->
                            <div class="lg:col-span-2 space-y-6">
                                <!-- Title -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Berita</label>
                                    <input type="text" name="title" 
                                           value="{{ old('title', $news->title ?? '') }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                           required>
                                    @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Excerpt -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Ringkasan</label>
                                    <textarea name="excerpt" rows="3" 
                                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                              required>{{ old('excerpt', $news->excerpt ?? '') }}</textarea>
                                    @error('excerpt')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Content -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Konten Berita</label>
                                    <textarea name="content" rows="15" 
                                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                              required>{{ old('content', $news->content ?? '') }}</textarea>
                                    @error('content')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Sidebar -->
                            <div class="space-y-6">
                                <!-- Image Upload -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Utama</label>
                                    <input type="file" name="image" accept="image/*"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @if(isset($news) && $news->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $news->image) }}" 
                                             alt="Current image" class="w-full h-32 object-cover rounded-md">
                                    </div>
                                    @endif
                                    @error('image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Category -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                                    <select name="category" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
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
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Author -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Penulis</label>
                                    <input type="text" name="author" 
                                           value="{{ old('author', $news->author ?? 'Admin BLJ') }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                           required>
                                    @error('author')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                    <select name="status" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            required>
                                        <option value="draft" {{ old('status', $news->status ?? '') === 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ old('status', $news->status ?? '') === 'published' ? 'selected' : '' }}>Published</option>
                                    </select>
                                    @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Featured -->
                                <div>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="featured" value="1" 
                                               {{ old('featured', $news->featured ?? false) ? 'checked' : '' }}
                                               class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="text-sm font-medium text-gray-700">Jadikan Berita Unggulan</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <div class="flex justify-end space-x-3">
                                <a href="{{ route('admin.news.index') }}" 
                                   class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                                    Batal
                                </a>
                                <button type="submit" 
                                        class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                    {{ isset($news) ? 'Update' : 'Simpan' }} Berita
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>