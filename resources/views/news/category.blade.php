@extends('layouts.app')

@section('title', 'Kategori: ' . ucfirst($category) . ' - Portal Berita BLJ')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="mb-12">
        <div class="bg-gradient-to-br from-primary-500 via-primary-600 to-primary-700 rounded-3xl p-8 lg:p-12 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
            <div class="relative z-10">
                <nav class="flex items-center space-x-2 text-primary-200 mb-6">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">
                        <i class="fas fa-home"></i> Beranda
                    </a>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <span class="text-white font-medium">Kategori: {{ ucfirst($category) }}</span>
                </nav>
                
                <div class="flex items-center space-x-4 mb-6">
                    @php
                    $categoryIcons = [
                        'politik' => ['fas fa-landmark', 'from-red-500 to-red-600'],
                        'ekonomi' => ['fas fa-chart-line', 'from-green-500 to-green-600'],
                        'olahraga' => ['fas fa-futbol', 'from-blue-500 to-blue-600'],
                        'teknologi' => ['fas fa-laptop', 'from-purple-500 to-purple-600'],
                        'hiburan' => ['fas fa-film', 'from-pink-500 to-pink-600'],
                        'kesehatan' => ['fas fa-heartbeat', 'from-yellow-500 to-orange-500'],
                    ];
                    $icon = $categoryIcons[$category] ?? ['fas fa-newspaper', 'from-gray-500 to-gray-600'];
                    @endphp
                    
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                        <i class="{{ $icon[0] }} text-3xl"></i>
                    </div>
                    <div>
                        <h1 class="text-4xl lg:text-5xl font-bold mb-2">{{ ucfirst($category) }}</h1>
                        <p class="text-xl text-primary-100">Berita terkini seputar {{ $category }}</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-6 text-primary-200">
                    <span class="flex items-center space-x-2">
                        <i class="fas fa-newspaper"></i>
                        <span>{{ $news->total() }} artikel tersedia</span>
                    </span>
                    <span class="flex items-center space-x-2">
                        <i class="fas fa-clock"></i>
                        <span>Update terbaru</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Navigation -->
    <div class="mb-10">
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-filter text-primary-500 mr-2"></i>
                Kategori Lainnya
            </h3>
            <div class="flex flex-wrap gap-3">
                @php
                $allCategories = [
                    'politik' => ['fas fa-landmark', 'text-red-600', 'bg-red-50', 'border-red-200'],
                    'ekonomi' => ['fas fa-chart-line', 'text-green-600', 'bg-green-50', 'border-green-200'],
                    'olahraga' => ['fas fa-futbol', 'text-blue-600', 'bg-blue-50', 'border-blue-200'],
                    'teknologi' => ['fas fa-laptop', 'text-purple-600', 'bg-purple-50', 'border-purple-200'],
                    'hiburan' => ['fas fa-film', 'text-pink-600', 'bg-pink-50', 'border-pink-200'],
                    'kesehatan' => ['fas fa-heartbeat', 'text-yellow-600', 'bg-yellow-50', 'border-yellow-200'],
                ];
                @endphp
                
                @foreach($allCategories as $cat => $style)
                <a href="{{ route('news.category', $cat) }}" 
                   class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl border-2 transition-all duration-300 hover:scale-105 {{ $cat === $category ? 'bg-primary-500 text-white border-primary-500' : $style[2] . ' ' . $style[1] . ' ' . $style[3] . ' hover:shadow-md' }}">
                    <i class="{{ $style[0] }} text-sm"></i>
                    <span class="font-medium capitalize">{{ $cat }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- News Grid -->
    @if($news->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        @foreach($news as $article)
        <article class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 group hover:-translate-y-2 animate-fade-in">
            <div class="relative overflow-hidden">
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" 
                         alt="{{ $article->title }}" 
                         class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110">
                @else
                    <div class="w-full h-56 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                        <div class="text-center text-gray-500">
                            <i class="fas fa-image text-4xl mb-3 opacity-50"></i>
                            <p class="text-sm">Tidak ada gambar</p>
                        </div>
                    </div>
                @endif
                
                <!-- Overlay Gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                
                <!-- Category Badge -->
                <div class="absolute top-4 left-4">
                    <span class="bg-gradient-to-r from-primary-500 to-primary-600 text-white px-3 py-1 text-sm font-semibold rounded-full shadow-lg backdrop-blur-sm">
                        {{ $article->category }}
                    </span>
                </div>
                
                <!-- Reading Time -->
                <div class="absolute top-4 right-4">
                    <span class="bg-white/90 backdrop-blur-sm text-gray-700 px-3 py-1 text-xs font-medium rounded-full">
                        <i class="far fa-clock mr-1"></i>{{ rand(2, 8) }} min
                    </span>
                </div>

                <!-- Featured Badge -->
                @if($article->featured)
                <div class="absolute bottom-4 right-4">
                    <span class="bg-yellow-500 text-white px-2 py-1 text-xs font-bold rounded-full shadow-lg">
                        <i class="fas fa-star mr-1"></i>Pilihan
                    </span>
                </div>
                @endif
            </div>
            
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight line-clamp-2 group-hover:text-primary-600 transition-colors">
                    <a href="{{ route('news.show', $article) }}">
                        {{ Str::limit($article->title, 80) }}
                    </a>
                </h3>
                <p class="text-gray-600 mb-4 leading-relaxed line-clamp-3">{{ Str::limit($article->excerpt, 120) }}</p>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full flex items-center justify-center">
                            <i class="far fa-user text-primary-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900">{{ $article->author }}</p>
                            <p class="text-xs text-gray-500">{{ $article->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <span class="flex items-center space-x-1 hover:text-primary-600 transition-colors">
                            <i class="far fa-eye"></i>
                            <span>{{ number_format($article->views) }}</span>
                        </span>
                        <span class="flex items-center space-x-1 hover:text-red-500 transition-colors cursor-pointer">
                            <i class="far fa-heart"></i>
                            <span>{{ rand(10, 100) }}</span>
                        </span>
                        <a href="{{ route('news.show', $article) }}" 
                           class="flex items-center space-x-1 text-primary-600 hover:text-primary-700 transition-colors font-medium">
                            <span>Baca</span>
                            <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
        </article>
        @endforeach
    </div>

    <!-- Pagination -->
    @if($news->hasPages())
    <div class="flex justify-center mb-12">
        <nav class="bg-white rounded-2xl shadow-lg p-4">
            <div class="flex items-center space-x-2">
                {{-- Previous Page Link --}}
                @if ($news->onFirstPage())
                    <span class="w-10 h-10 bg-gray-100 text-gray-400 rounded-xl flex items-center justify-center cursor-not-allowed">
                        <i class="fas fa-chevron-left text-sm"></i>
                    </span>
                @else
                    <a href="{{ $news->previousPageUrl() }}" 
                       class="w-10 h-10 bg-gray-100 text-gray-600 rounded-xl flex items-center justify-center hover:bg-primary-500 hover:text-white transition-all duration-300 hover:scale-110">
                        <i class="fas fa-chevron-left text-sm"></i>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                    @if ($page == $news->currentPage())
                        <span class="w-10 h-10 bg-primary-500 text-white rounded-xl flex items-center justify-center font-bold shadow-lg">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" 
                           class="w-10 h-10 bg-gray-100 text-gray-600 rounded-xl flex items-center justify-center hover:bg-primary-500 hover:text-white transition-all duration-300 hover:scale-110">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($news->hasMorePages())
                    <a href="{{ $news->nextPageUrl() }}" 
                       class="w-10 h-10 bg-gray-100 text-gray-600 rounded-xl flex items-center justify-center hover:bg-primary-500 hover:text-white transition-all duration-300 hover:scale-110">
                        <i class="fas fa-chevron-right text-sm"></i>
                    </a>
                @else
                    <span class="w-10 h-10 bg-gray-100 text-gray-400 rounded-xl flex items-center justify-center cursor-not-allowed">
                        <i class="fas fa-chevron-right text-sm"></i>
                    </span>
                @endif
            </div>
            
            <div class="text-center mt-4 text-sm text-gray-600">
                Menampilkan {{ $news->firstItem() ?? 0 }} - {{ $news->lastItem() ?? 0 }} 
                dari {{ $news->total() }} artikel
            </div>
        </nav>
    </div>
    @endif

    @else
    <!-- Empty State -->
    <div class="text-center py-20">
        <div class="max-w-md mx-auto">
            <div class="w-32 h-32 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-8">
                <i class="fas fa-newspaper text-gray-400 text-4xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Belum Ada Berita</h3>
            <p class="text-gray-600 mb-8 leading-relaxed">
                Saat ini belum ada berita dalam kategori <strong>{{ $category }}</strong>. 
                Silakan coba kategori lainnya atau kembali ke halaman utama.
            </p>
            <div class="space-y-4">
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center space-x-2 bg-primary-500 text-white px-6 py-3 rounded-xl hover:bg-primary-600 transition-all duration-300 hover:scale-105 shadow-lg">
                    <i class="fas fa-home"></i>
                    <span>Kembali ke Beranda</span>
                </a>
                <div class="text-sm text-gray-500">atau pilih kategori lainnya di atas</div>
            </div>
        </div>
    </div>
    @endif

    <!-- Related Categories Section -->
    <section class="bg-white rounded-3xl shadow-lg p-8 mt-12">
        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
            <div class="w-1 h-8 bg-gradient-to-b from-primary-500 to-primary-600 rounded-full mr-3"></div>
            Jelajahi Kategori Lainnya
        </h3>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($allCategories as $cat => $style)
            @if($cat !== $category)
            <a href="{{ route('news.category', $cat) }}" 
               class="group {{ $style[2] }} rounded-2xl p-4 text-center shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                <div class="w-12 h-12 bg-gradient-to-br {{ str_replace('text-', 'from-', $style[1]) }} {{ str_replace('text-', 'to-', str_replace('600', '700', $style[1])) }} rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300 shadow-md">
                    <i class="{{ $style[0] }} text-white text-lg"></i>
                </div>
                <h4 class="text-sm font-bold text-gray-900 capitalize mb-1 group-hover:text-primary-600 transition-colors">{{ $cat }}</h4>
                <p class="text-xs text-gray-600">{{ rand(20, 100) }} artikel</p>
                <div class="mt-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <span class="inline-flex items-center text-xs font-medium text-primary-600">
                        Lihat <i class="fas fa-arrow-right ml-1"></i>
                    </span>
                </div>
            </a>
            @endif
            @endforeach
        </div>
    </section>
</div>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fadeIn 0.6s ease-out forwards;
}
</style>
@endsection