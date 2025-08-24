@extends('layouts.app')

@section('title', 'Beranda - Portal Berita BLJ')

@section('content')
<div class="container mx-auto px-4 py-8 space-y-16">
    <!-- Hero Section -->
    @if($featuredNews->count() > 0)
    <section class="animate-fade-in">
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            <!-- Main Featured -->
            <div class="xl:col-span-2">
                <div class="relative group overflow-hidden rounded-3xl shadow-2xl bg-white">
                    @if($featuredNews->first()->image)
                        <img src="{{ asset('storage/' . $featuredNews->first()->image) }}" 
                             alt="{{ $featuredNews->first()->title }}" 
                             class="w-full h-96 lg:h-[500px] object-cover transition-transform duration-700 group-hover:scale-105">
                    @else
                        <div class="w-full h-96 lg:h-[500px] bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                            <div class="text-center text-gray-500">
                                <i class="fas fa-image text-6xl mb-4 opacity-50"></i>
                                <p class="text-lg">Tidak ada gambar</p>
                            </div>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-primary-900/20 to-transparent"></div>
                    
                    <!-- Content Overlay -->
                    <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <span class="bg-gradient-to-r from-primary-500 to-primary-600 px-4 py-2 text-sm font-bold rounded-full shadow-lg">
                                    <i class="fas fa-star mr-1"></i>{{ $featuredNews->first()->category }}
                                </span>
                                <span class="bg-white/20 backdrop-blur-sm px-3 py-1 text-sm rounded-full">
                                    <i class="fas fa-fire mr-1"></i>Trending
                                </span>
                            </div>
                            <h1 class="text-3xl lg:text-4xl font-bold leading-tight hover:text-primary-300 transition-colors">
                                <a href="{{ route('news.show', $featuredNews->first()) }}">
                                    {{ $featuredNews->first()->title }}
                                </a>
                            </h1>
                            <p class="text-gray-200 text-lg leading-relaxed">{{ Str::limit($featuredNews->first()->excerpt, 150) }}</p>
                            <div class="flex items-center space-x-6 text-sm text-gray-300">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-primary-500 rounded-full flex items-center justify-center">
                                        <i class="far fa-user text-xs"></i>
                                    </div>
                                    <span>{{ $featuredNews->first()->author }}</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <i class="far fa-clock"></i>
                                    <span>{{ $featuredNews->first()->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <i class="far fa-eye"></i>
                                    <span>{{ number_format($featuredNews->first()->views) }}</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <i class="far fa-heart"></i>
                                    <span>{{ rand(50, 500) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Featured -->
            <div class="space-y-4">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-1 h-8 bg-gradient-to-b from-primary-500 to-primary-600 rounded-full mr-3"></div>
                    Berita Pilihan
                </h2>
                @foreach($featuredNews->skip(1)->take(4) as $news)
                <article class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-1">
                    <div class="flex p-4">
                        <div class="w-24 h-20 flex-shrink-0 mr-4 overflow-hidden rounded-xl">
                            @if($news->image)
                                <img src="{{ asset('storage/' . $news->image) }}" 
                                     alt="{{ $news->title }}" 
                                     class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400 text-lg"></i>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <span class="inline-block bg-primary-100 text-primary-700 text-xs font-semibold px-2 py-1 rounded-full mb-2">
                                {{ $news->category }}
                            </span>
                            <h3 class="text-sm font-bold text-gray-900 mb-2 leading-tight line-clamp-2">
                                <a href="{{ route('news.show', $news) }}" class="hover:text-primary-600 transition-colors">
                                    {{ Str::limit($news->title, 70) }}
                                </a>
                            </h3>
                            <div class="flex items-center text-xs text-gray-500 space-x-3">
                                <span class="flex items-center">
                                    <i class="far fa-clock mr-1"></i>{{ $news->created_at->diffForHumans() }}
                                </span>
                                <span class="flex items-center">
                                    <i class="far fa-eye mr-1"></i>{{ number_format($news->views) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Latest News -->
    <section class="animate-slide-up">
        <div class="flex items-center justify-between mb-10">
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-bolt text-white text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Berita Terkini</h2>
                        <p class="text-gray-600">Update terbaru dari redaksi</p>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex space-x-2">
                <button class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-600 text-white rounded-2xl hover:from-primary-600 hover:to-primary-700 transition-all duration-300 hover:scale-110 shadow-lg">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-600 text-white rounded-2xl hover:from-primary-600 hover:to-primary-700 transition-all duration-300 hover:scale-110 shadow-lg">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($latestNews as $index => $news)
            <article class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 group hover:-translate-y-2 animate-slide-up">
                <div class="relative overflow-hidden">
                    @if($news->image)
                        <img src="{{ asset('storage/' . $news->image) }}" 
                             alt="{{ $news->title }}" 
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
                            {{ $news->category }}
                        </span>
                    </div>
                    
                    <!-- Reading Time -->
                    <div class="absolute top-4 right-4">
                        <span class="bg-white/90 backdrop-blur-sm text-gray-700 px-3 py-1 text-xs font-medium rounded-full">
                            <i class="far fa-clock mr-1"></i>{{ rand(2, 8) }} min
                        </span>
                    </div>
                </div>
                
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight line-clamp-2 group-hover:text-primary-600 transition-colors">
                        <a href="{{ route('news.show', $news) }}">
                            {{ Str::limit($news->title, 80) }}
                        </a>
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed line-clamp-3">{{ Str::limit($news->excerpt, 120) }}</p>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full flex items-center justify-center">
                                <i class="far fa-user text-primary-600 text-sm"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900">{{ $news->author }}</p>
                                <p class="text-xs text-gray-500">{{ $news->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <span class="flex items-center space-x-1 hover:text-primary-600 transition-colors">
                                <i class="far fa-eye"></i>
                                <span>{{ number_format($news->views) }}</span>
                            </span>
                            <span class="flex items-center space-x-1 hover:text-red-500 transition-colors cursor-pointer">
                                <i class="far fa-heart"></i>
                                <span>{{ rand(10, 100) }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-12">
            <button class="inline-flex items-center space-x-2 bg-gradient-to-r from-primary-500 to-primary-600 text-white px-8 py-4 rounded-2xl font-semibold hover:from-primary-600 hover:to-primary-700 transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl">
                <span>Muat Lebih Banyak</span>
                <i class="fas fa-arrow-down"></i>
            </button>
        </div>
    </section>

    <!-- Categories Section -->
    <!-- <section class="animate-slide-up">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Jelajahi Kategori</h2>
            <p class="text-gray-600 text-lg">Temukan berita sesuai minat Anda</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @php
            $categories = [
                [
                    'name' => 'politik',
                    'icon' => 'fas fa-landmark',
                    'color' => 'from-red-500 to-red-600',
                    'bg' => 'bg-red-50',
                    'count' => rand(50, 200)
                ],
                [
                    'name' => 'ekonomi',
                    'icon' => 'fas fa-chart-line',
                    'color' => 'from-green-500 to-green-600',
                    'bg' => 'bg-green-50',
                    'count' => rand(50, 200)
                ],
                [
                    'name' => 'olahraga',
                    'icon' => 'fas fa-futbol',
                    'color' => 'from-blue-500 to-blue-600',
                    'bg' => 'bg-blue-50',
                    'count' => rand(50, 200)
                ],
                [
                    'name' => 'teknologi',
                    'icon' => 'fas fa-laptop',
                    'color' => 'from-purple-500 to-purple-600',
                    'bg' => 'bg-purple-50',
                    'count' => rand(50, 200)
                ],
                [
                    'name' => 'hiburan',
                    'icon' => 'fas fa-film',
                    'color' => 'from-pink-500 to-pink-600',
                    'bg' => 'bg-pink-50',
                    'count' => rand(50, 200)
                ],
                [
                    'name' => 'kesehatan',
                    'icon' => 'fas fa-heartbeat',
                    'color' => 'from-yellow-500 to-orange-500',
                    'bg' => 'bg-yellow-50',
                    'count' => rand(50, 200)
                ]
            ];
            @endphp
            
            @foreach($categories as $category)
            <a href="{{ route('news.category', $category['name']) }}" 
               class="group {{ $category['bg'] }} rounded-3xl p-6 text-center shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-br {{ $category['color'] }} rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <i class="{{ $category['icon'] }} text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 capitalize mb-2 group-hover:text-primary-600 transition-colors">{{ $category['name'] }}</h3>
                <p class="text-sm text-gray-600">{{ $category['count'] }} artikel</p>
                <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity">
                    <span class="inline-flex items-center text-sm font-medium text-primary-600">
                        Lihat semua <i class="fas fa-arrow-right ml-1"></i>
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </section> -->

    <!-- Newsletter Section -->
    <section class="bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 rounded-3xl p-8 lg:p-12 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
        <div class="relative z-10 max-w-4xl mx-auto text-center">
            <div class="mb-8">
                <div class="w-20 h-20 bg-white/20 rounded-3xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-envelope text-3xl"></i>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold mb-4">Jangan Lewatkan Berita Terkini!</h2>
                <p class="text-xl text-primary-100 leading-relaxed">Berlangganan newsletter kami dan dapatkan berita terbaru langsung di inbox Anda setiap hari.</p>
            </div>
            
            <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                <div class="flex-1">
                    <input type="email" placeholder="Masukkan email Anda..." 
                           class="w-full px-6 py-4 rounded-2xl text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-white/30 transition-all duration-300 text-lg">
                </div>
                <button type="submit" 
                        class="bg-white text-primary-700 px-8 py-4 rounded-2xl font-bold hover:bg-gray-100 transition-all duration-300 hover:scale-105 shadow-lg text-lg">
                    <i class="fas fa-paper-plane mr-2"></i>Berlangganan
                </button>
            </form>
            
            <div class="mt-6 flex items-center justify-center space-x-6 text-sm text-primary-200">
                <span class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>Gratis selamanya
                </span>
                <span class="flex items-center">
                    <i class="fas fa-shield-alt mr-2"></i>No spam
                </span>
                <span class="flex items-center">
                    <i class="fas fa-times-circle mr-2"></i>Bisa unsubscribe kapan saja
                </span>
            </div>
        </div>
    </section>
</div>

<!-- Floating Action Buttons -->
<div class="fixed bottom-8 left-8 flex flex-col space-y-4 z-40">
    <button class="w-14 h-14 bg-green-500 text-white rounded-full shadow-lg hover:shadow-xl hover:scale-110 transition-all duration-300 hover:bg-green-600">
        <i class="fab fa-whatsapp text-xl"></i>
    </button>
    <button class="w-14 h-14 bg-blue-600 text-white rounded-full shadow-lg hover:shadow-xl hover:scale-110 transition-all duration-300 hover:bg-blue-700">
        <i class="fab fa-telegram text-xl"></i>
    </button>
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
</style>
@endsection