@extends('layouts.app')

@section('title', $news->title . ' - Portal Berita BLJ')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="mb-8 animate-fade-in">
        <div class="flex items-center space-x-2 text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors">
                <i class="fas fa-home mr-1"></i>Beranda
            </a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <a href="{{ route('news.category', strtolower($news->category)) }}" class="hover:text-primary-600 transition-colors capitalize">
                {{ $news->category }}
            </a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <span class="text-gray-900 font-medium">{{ Str::limit($news->title, 50) }}</span>
        </div>
    </nav>

    <div class="grid grid-cols-1 xl:grid-cols-4 gap-12">
        <!-- Main Content -->
        <div class="xl:col-span-3">
            <article class="bg-white rounded-3xl shadow-2xl overflow-hidden animate-slide-up">
                <!-- Article Header -->
                <div class="p-8 border-b border-gray-100">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 space-y-4 sm:space-y-0">
                        <div class="flex items-center space-x-3">
                            <span class="bg-gradient-to-r from-primary-500 to-primary-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                <i class="fas fa-tag mr-1"></i>{{ $news->category }}
                            </span>
                            <span class="bg-gradient-to-r from-green-500 to-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                <i class="fas fa-check-circle mr-1"></i>Verified
                            </span>
                        </div>
                        <div class="flex items-center space-x-6 text-sm text-gray-500">
                            <span class="flex items-center space-x-1">
                                <i class="far fa-calendar-alt text-primary-500"></i>
                                <span>{{ $news->created_at->format('d F Y') }}</span>
                            </span>
                            <span class="flex items-center space-x-1">
                                <i class="far fa-clock text-green-500"></i>
                                <span>{{ $news->created_at->format('H:i') }} WIB</span>
                            </span>
                            <span class="flex items-center space-x-1">
                                <i class="far fa-eye text-blue-500"></i>
                                <span>{{ number_format($news->views) }}</span>
                            </span>
                        </div>
                    </div>
                    
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 leading-tight mb-6">{{ $news->title }}</h1>
                    
                    <!-- Author Info -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="relative">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($news->author) }}&background=3b82f6&color=fff&size=60" 
                                     alt="{{ $news->author }}" 
                                     class="w-15 h-15 rounded-2xl shadow-lg">
                                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 rounded-full border-2 border-white"></div>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-lg">{{ $news->author }}</p>
                                <p class="text-gray-600">Jurnalis Senior BLJ News</p>
                                <div class="flex items-center space-x-3 mt-1">
                                    <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">
                                        <i class="fas fa-star mr-1"></i>Editor's Choice
                                    </span>
                                    <span class="text-xs text-gray-500">{{ rand(2, 8) }} min read</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Social Share Quick -->
                        <div class="hidden md:flex items-center space-x-2">
                            <span class="text-sm text-gray-600 mr-2">Bagikan:</span>
                            <button class="w-10 h-10 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all duration-300 hover:scale-110">
                                <i class="fab fa-facebook text-sm"></i>
                            </button>
                            <button class="w-10 h-10 bg-sky-500 text-white rounded-xl hover:bg-sky-600 transition-all duration-300 hover:scale-110">
                                <i class="fab fa-twitter text-sm"></i>
                            </button>
                            <button class="w-10 h-10 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all duration-300 hover:scale-110">
                                <i class="fab fa-whatsapp text-sm"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                @if($news->image)
                <div class="relative">
                    <img src="{{ asset('storage/' . $news->image) }}" 
                         alt="{{ $news->title }}" 
                         class="w-full h-96 lg:h-[500px] object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    <!-- Image Caption -->
                    <div class="absolute bottom-4 left-4 right-4">
                        <div class="bg-white/90 backdrop-blur-sm rounded-xl p-4">
                            <p class="text-sm text-gray-700 italic">{{ $news->title }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Article Content -->
                <div class="p-8">
                    <!-- Article Lead -->
                    <div class="mb-8">
                        <p class="text-xl text-gray-700 font-medium leading-relaxed bg-gray-50 p-6 rounded-2xl border-l-4 border-primary-500">
                            {{ $news->excerpt }}
                        </p>
                    </div>

                    <!-- Article Body -->
                    <div class="prose prose-lg max-w-none">
                        <div class="text-gray-800 leading-relaxed space-y-6 text-lg article-content">
                            {!! $news->content !!}
                        </div>
                    </div>

                    <!-- Article Tags -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h4 class="text-lg font-semibold mb-4 text-gray-900">Tags:</h4>
                        <div class="flex flex-wrap gap-2">
                            @php
                            $tags = ['berita terkini', 'indonesia', strtolower($news->category), 'viral', 'trending'];
                            @endphp
                            @foreach($tags as $tag)
                            <span class="bg-gray-100 hover:bg-primary-100 text-gray-700 hover:text-primary-700 px-3 py-1 rounded-full text-sm transition-colors cursor-pointer">
                                #{{ $tag }}
                            </span>
                            @endforeach
                        </div>
                    </div>

                    <!-- Engagement Section -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-6">
                                <button class="flex items-center space-x-2 text-gray-600 hover:text-red-500 transition-colors group">
                                    <div class="w-12 h-12 bg-gray-100 group-hover:bg-red-50 rounded-2xl flex items-center justify-center transition-colors">
                                        <i class="far fa-heart group-hover:fas text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="font-semibold">{{ rand(50, 500) }}</span>
                                        <p class="text-sm text-gray-500">Suka</p>
                                    </div>
                                </button>
                                <button class="flex items-center space-x-2 text-gray-600 hover:text-blue-500 transition-colors group">
                                    <div class="w-12 h-12 bg-gray-100 group-hover:bg-blue-50 rounded-2xl flex items-center justify-center transition-colors">
                                        <i class="far fa-comment text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="font-semibold">{{ rand(10, 100) }}</span>
                                        <p class="text-sm text-gray-500">Komentar</p>
                                    </div>
                                </button>
                                <button class="flex items-center space-x-2 text-gray-600 hover:text-green-500 transition-colors group">
                                    <div class="w-12 h-12 bg-gray-100 group-hover:bg-green-50 rounded-2xl flex items-center justify-center transition-colors">
                                        <i class="far fa-share-square text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="font-semibold">{{ rand(20, 150) }}</span>
                                        <p class="text-sm text-gray-500">Bagikan</p>
                                    </div>
                                </button>
                            </div>
                            <button class="w-12 h-12 bg-gray-100 hover:bg-yellow-50 text-gray-600 hover:text-yellow-500 rounded-2xl transition-all duration-300 hover:scale-110">
                                <i class="far fa-bookmark"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Share Buttons -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-semibold mb-4 text-gray-900">Bagikan Artikel Ini</h3>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            <a href="#" class="flex items-center justify-center space-x-2 bg-blue-600 text-white px-4 py-3 rounded-2xl hover:bg-blue-700 transition-all duration-300 hover:scale-105">
                                <i class="fab fa-facebook"></i>
                                <span class="font-medium">Facebook</span>
                            </a>
                            <a href="#" class="flex items-center justify-center space-x-2 bg-sky-500 text-white px-4 py-3 rounded-2xl hover:bg-sky-600 transition-all duration-300 hover:scale-105">
                                <i class="fab fa-twitter"></i>
                                <span class="font-medium">Twitter</span>
                            </a>
                            <a href="#" class="flex items-center justify-center space-x-2 bg-green-600 text-white px-4 py-3 rounded-2xl hover:bg-green-700 transition-all duration-300 hover:scale-105">
                                <i class="fab fa-whatsapp"></i>
                                <span class="font-medium">WhatsApp</span>
                            </a>
                            <a href="#" class="flex items-center justify-center space-x-2 bg-blue-800 text-white px-4 py-3 rounded-2xl hover:bg-blue-900 transition-all duration-300 hover:scale-105">
                                <i class="fab fa-linkedin"></i>
                                <span class="font-medium">LinkedIn</span>
                            </a>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Comments Section -->
            <div class="mt-12 bg-white rounded-3xl shadow-lg p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <i class="fas fa-comments text-primary-500 mr-3"></i>
                    Komentar ({{ rand(5, 25) }})
                </h3>
                
                <!-- Comment Form -->
                <div class="mb-8 p-6 bg-gray-50 rounded-2xl">
                    <h4 class="font-semibold text-gray-900 mb-4">Tinggalkan Komentar</h4>
                    <form class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" placeholder="Nama Anda" class="px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <input type="email" placeholder="Email Anda" class="px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500">
                        </div>
                        <textarea placeholder="Tulis komentar Anda..." rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500"></textarea>
                        <button type="submit" class="bg-gradient-to-r from-primary-500 to-primary-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-primary-600 hover:to-primary-700 transition-all duration-300">
                            <i class="fas fa-paper-plane mr-2"></i>Kirim Komentar
                        </button>
                    </form>
                </div>

                <!-- Sample Comments -->
                <div class="space-y-6">
                    @for($i = 1; $i <= 3; $i++)
                    <div class="flex space-x-4 p-4 bg-gray-50 rounded-2xl">
                        <img src="https://ui-avatars.com/api/?name=User{{ $i }}&background=random" alt="User" class="w-12 h-12 rounded-full">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <h5 class="font-semibold text-gray-900">User {{ $i }}</h5>
                                <span class="text-xs text-gray-500">{{ rand(1, 5) }} jam yang lalu</span>
                            </div>
                            <p class="text-gray-700 leading-relaxed">Artikel yang sangat informatif! Terima kasih telah berbagi berita yang berkualitas.</p>
                            <div class="flex items-center space-x-4 mt-3 text-sm">
                                <button class="text-gray-500 hover:text-primary-600 transition-colors">
                                    <i class="far fa-thumbs-up mr-1"></i>Suka ({{ rand(1, 10) }})
                                </button>
                                <button class="text-gray-500 hover:text-primary-600 transition-colors">
                                    <i class="far fa-reply mr-1"></i>Balas
                                </button>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="xl:col-span-1 space-y-8">
            <!-- Related News -->
            @if($relatedNews->count() > 0)
            <div class="bg-white rounded-3xl shadow-lg p-6 sticky top-8">
                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-br from-primary-500 to-primary-600 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-newspaper text-white text-sm"></i>
                    </div>
                    Berita Terkait
                </h3>
                <div class="space-y-6">
                    @foreach($relatedNews as $related)
                    <article class="group cursor-pointer">
                        <div class="flex space-x-3">
                            <div class="w-20 h-16 flex-shrink-0 overflow-hidden rounded-xl">
                                <img src="{{ $related->image ? asset('storage/' . $related->image) : 'https://via.placeholder.com/80x60' }}" 
                                     alt="{{ $related->title }}" 
                                     class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-semibold text-gray-900 leading-tight mb-2 line-clamp-2 group-hover:text-primary-600 transition-colors">
                                    <a href="{{ route('news.show', $related) }}">
                                        {{ Str::limit($related->title, 60) }}
                                    </a>
                                </h4>
                                <div class="flex items-center text-xs text-gray-500 space-x-2">
                                    <span class="flex items-center">
                                        <i class="far fa-clock mr-1"></i>{{ $related->created_at->diffForHumans() }}
                                    </span>
                                    <span>•</span>
                                    <span class="flex items-center">
                                        <i class="far fa-eye mr-1"></i>{{ number_format($related->views) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
                
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <a href="{{ route('news.category', strtolower($news->category)) }}" 
                       class="inline-flex items-center text-primary-600 hover:text-primary-700 font-semibold text-sm transition-colors">
                        <span>Lihat semua {{ $news->category }}</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            @endif

            <!-- Popular Posts -->
            <div class="bg-white rounded-3xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-fire text-white text-sm"></i>
                    </div>
                    Trending Hari Ini
                </h3>
                <div class="space-y-4">
                    @foreach(range(1,5) as $i)
                    <article class="flex items-start group cursor-pointer">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-8 h-8 bg-gradient-to-br from-primary-500 to-primary-600 text-white rounded-lg flex items-center justify-center font-bold text-sm">
                                {{ $i }}
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-semibold text-gray-900 leading-tight mb-2 line-clamp-2 group-hover:text-primary-600 transition-colors">
                                <a href="#">
                                    Berita trending {{ $i }} yang sangat menarik untuk dibaca dan mendapat perhatian luas
                                </a>
                            </h4>
                            <div class="flex items-center text-xs text-gray-500 space-x-2">
                                <span class="flex items-center">
                                    <i class="far fa-eye mr-1"></i>{{ number_format(rand(10000, 50000)) }}
                                </span>
                                <span>•</span>
                                <span class="flex items-center">
                                    <i class="far fa-heart mr-1"></i>{{ rand(100, 500) }}
                                </span>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>

            <!-- Newsletter Widget -->
            <div class="bg-gradient-to-br from-primary-600 to-primary-800 text-white rounded-3xl p-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Newsletter</h3>
                    <p class="text-primary-100 mb-6 text-sm leading-relaxed">Dapatkan berita terkini langsung di email Anda setiap hari</p>
                    <form class="space-y-3">
                        <input type="email" placeholder="Email Anda" 
                               class="w-full px-4 py-3 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-white/50">
                        <button type="submit" 
                                class="w-full bg-white text-primary-700 py-3 rounded-xl font-semibold hover:bg-gray-100 transition-colors">
                            <i class="fas fa-paper-plane mr-2"></i>Berlangganan
                        </button>
                    </form>
                    <p class="text-xs text-primary-200 mt-3">
                        <i class="fas fa-shield-alt mr-1"></i>Email Anda aman bersama kami
                    </p>
                </div>
            </div>

            <!-- Social Media Widget -->
            <div class="bg-white rounded-3xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-share-alt text-white text-sm"></i>
                    </div>
                    Ikuti Kami
                </h3>
                <div class="grid grid-cols-2 gap-3">
                    <a href="#" class="flex items-center justify-center space-x-2 bg-blue-600 text-white p-3 rounded-xl hover:bg-blue-700 transition-colors">
                        <i class="fab fa-facebook"></i>
                        <span class="text-sm font-medium">Facebook</span>
                    </a>
                    <a href="#" class="flex items-center justify-center space-x-2 bg-sky-500 text-white p-3 rounded-xl hover:bg-sky-600 transition-colors">
                        <i class="fab fa-twitter"></i>
                        <span class="text-sm font-medium">Twitter</span>
                    </a>
                    <a href="#" class="flex items-center justify-center space-x-2 bg-gradient-to-br from-purple-500 to-pink-500 text-white p-3 rounded-xl hover:from-purple-600 hover:to-pink-600 transition-colors">
                        <i class="fab fa-instagram"></i>
                        <span class="text-sm font-medium">Instagram</span>
                    </a>
                    <a href="#" class="flex items-center justify-center space-x-2 bg-red-600 text-white p-3 rounded-xl hover:bg-red-700 transition-colors">
                        <i class="fab fa-youtube"></i>
                        <span class="text-sm font-medium">YouTube</span>
                    </a>
                </div>
                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600">
                        <i class="fas fa-users mr-1"></i>
                        45,678 followers mengikuti kami
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Article Content Styles */
.article-content h1,
.article-content h2 {
    @apply text-2xl font-bold text-gray-900 mt-8 mb-4;
}

.article-content h3 {
    @apply text-xl font-bold text-gray-900 mt-6 mb-3;
}

.article-content h4 {
    @apply text-lg font-semibold text-gray-900 mt-4 mb-2;
}

.article-content p {
    @apply mb-4 leading-relaxed;
}

.article-content ul {
    @apply list-disc list-inside mb-4 space-y-2;
}

.article-content ol {
    @apply list-decimal list-inside mb-4 space-y-2;
}

.article-content blockquote {
    @apply border-l-4 border-primary-500 pl-6 py-4 bg-gray-50 rounded-r-lg my-6 italic;
}

.article-content img {
    @apply max-w-full h-auto rounded-lg shadow-md my-6 mx-auto;
}

.article-content a {
    @apply text-primary-600 hover:text-primary-800 underline;
}

.article-content strong {
    @apply font-bold;
}

.article-content em {
    @apply italic;
}

.article-content table {
    @apply w-full border-collapse border border-gray-300 my-6;
}

.article-content th,
.article-content td {
    @apply border border-gray-300 px-4 py-2;
}

.article-content th {
    @apply bg-gray-100 font-semibold;
}

/* External Image Handling */
.article-content img[src^="http"],
.article-content img[src^="https"] {
    @apply border border-gray-200;
    loading: lazy;
}

/* Responsive Images */
.article-content figure {
    @apply my-6 text-center;
}

.article-content figcaption {
    @apply text-sm text-gray-600 italic mt-2;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle external images with error fallback
    const externalImages = document.querySelectorAll('.article-content img[src^="http"], .article-content img[src^="https"]');
    
    externalImages.forEach(img => {
        img.addEventListener('error', function() {
            // If external image fails to load, show placeholder
            this.src = 'https://via.placeholder.com/600x400/f3f4f6/9ca3af?text=Gambar+Tidak+Dapat+Dimuat';
            this.alt = 'Gambar tidak dapat dimuat';
            this.className += ' opacity-50';
        });
        
        // Add loading state
        img.addEventListener('loadstart', function() {
            this.style.opacity = '0.5';
        });
        
        img.addEventListener('load', function() {
            this.style.opacity = '1';
        });
    });

    // Lazy loading for images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src || img.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        const lazyImages = document.querySelectorAll('.article-content img');
        lazyImages.forEach(img => imageObserver.observe(img));
    }
});
</script>
@endsection