<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin BLJ - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'red-soft': {
                            50: '#fef2f2',
                            100: '#fee2e2',
                            200: '#fecaca',
                            300: '#fca5a5',
                            400: '#f87171',
                            500: '#ef4444',
                            600: '#dc2626',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .sidebar-item {
            transition: all 0.2s ease;
        }
        
        .sidebar-item:hover {
            background-color: #ef4444;
            color: white;
            transform: translateX(4px);
        }
        
        .sidebar-item.active {
            background-color: #ef4444;
            color: white;
        }
        
        .coming-soon {
            position: relative;
        }
        
        .coming-soon::after {
            content: 'Coming Soon';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            opacity: 0;
            transition: opacity 0.2s ease;
        }
        
        .coming-soon:hover::after {
            opacity: 1;
        }
        
        .card-hover {
            transition: all 0.2s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .action-btn {
            transition: all 0.2s ease;
        }
        
        .action-btn:hover {
            transform: scale(1.05);
        }
        
        .table-row {
            transition: all 0.2s ease;
        }
        
        .table-row:hover {
            background-color: #fef2f2;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Mobile Menu Overlay -->
    <div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-white shadow-sm flex flex-col border-r border-gray-200 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">B</span>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">BLJ</h1>
                        <p class="text-sm text-gray-500">Admin Panel</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="flex-1 py-6">
                <div class="px-4 space-y-1">
                    <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg">
                        <i class="fas fa-home w-5 h-5 mr-3"></i>
                        <span>Beranda</span>
                    </a>
                    
                    <a href="#" class="sidebar-item coming-soon flex items-center px-4 py-3 text-gray-700 rounded-lg">
                        <i class="fas fa-envelope w-5 h-5 mr-3"></i>
                        <span>Surat Online</span>
                    </a>
                    
                    <a href="#" class="sidebar-item coming-soon flex items-center px-4 py-3 text-gray-700 rounded-lg">
                        <i class="fas fa-users w-5 h-5 mr-3"></i>
                        <span>Rekrutmen</span>
                    </a>
                    
                    <a href="#" class="sidebar-item coming-soon flex items-center px-4 py-3 text-gray-700 rounded-lg">
                        <i class="fas fa-clock w-5 h-5 mr-3"></i>
                        <span>Absensi</span>
                    </a>
                    
                    <a href="{{ route('admin.news.index') }}" class="sidebar-item active flex items-center px-4 py-3 rounded-lg">
                        <i class="fas fa-newspaper w-5 h-5 mr-3"></i>
                        <span>Portal Berita</span>
                    </a>
                </div>
            </nav>
            
            <!-- User Info -->
            <div class="p-4 border-t border-gray-100">
                <div class="flex items-center space-x-3 mb-3">
                    <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-gray-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Admin</p>
                        <p class="text-xs text-gray-500">admin@blj.com</p>
                    </div>
                </div>
                <a href="{{ route('home') }}" class="flex items-center justify-center w-full px-3 py-2 text-sm text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                    <i class="fas fa-external-link-alt mr-2"></i>
                    Kembali ke Website
                </a>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 lg:ml-0 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-red-500 shadow-sm rounded-b-2xl relative">
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="lg:hidden absolute left-4 top-1/2 transform -translate-y-1/2 text-white p-2 rounded-lg hover:bg-red-600 transition-colors">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="px-6 lg:px-6 py-4">
                    <div class="flex items-center justify-between">
                        <div class="ml-10 lg:ml-0">
                            <h2 class="text-lg lg:text-xl font-semibold text-white">Portal Berita</h2>
                            <p class="text-red-100 text-xs lg:text-sm hidden sm:block">Kelola konten berita</p>
                        </div>
                        
                        <div class="flex items-center space-x-2 lg:space-x-3">
                            <button class="relative p-1.5 lg:p-2 text-white hover:bg-red-600 rounded-lg transition-colors">
                                <i class="fas fa-bell text-sm lg:text-base"></i>
                                <span class="absolute -top-1 -right-1 w-3 h-3 lg:w-4 lg:h-4 bg-yellow-400 text-red-800 text-xs rounded-full flex items-center justify-center">3</span>
                            </button>
                            
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-red-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-white text-xs lg:text-sm"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto bg-white p-4 lg:p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-6 mb-6 lg:mb-8">
                    <div class="card-hover bg-white p-4 lg:p-6 rounded-lg border border-gray-200">
                        <div class="flex items-center">
                            <div class="w-8 h-8 lg:w-12 lg:h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                                <i class="fas fa-newspaper text-blue-600 text-sm lg:text-base"></i>
                            </div>
                            <div class="ml-3 lg:ml-4">
                                <p class="text-xs lg:text-sm text-gray-600">Total Berita</p>
                                <p class="text-lg lg:text-xl font-semibold text-gray-900">{{ $news->total() ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-hover bg-white p-4 lg:p-6 rounded-lg border border-gray-200">
                        <div class="flex items-center">
                            <div class="w-8 h-8 lg:w-12 lg:h-12 bg-green-50 rounded-lg flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-600 text-sm lg:text-base"></i>
                            </div>
                            <div class="ml-3 lg:ml-4">
                                <p class="text-xs lg:text-sm text-gray-600">Published</p>
                                <p class="text-lg lg:text-xl font-semibold text-gray-900">{{ $news->where('status', 'published')->count() ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-hover bg-white p-4 lg:p-6 rounded-lg border border-gray-200">
                        <div class="flex items-center">
                            <div class="w-8 h-8 lg:w-12 lg:h-12 bg-orange-50 rounded-lg flex items-center justify-center">
                                <i class="fas fa-edit text-orange-600 text-sm lg:text-base"></i>
                            </div>
                            <div class="ml-3 lg:ml-4">
                                <p class="text-xs lg:text-sm text-gray-600">Draft</p>
                                <p class="text-lg lg:text-xl font-semibold text-gray-900">{{ $news->where('status', 'draft')->count() ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-hover bg-white p-4 lg:p-6 rounded-lg border border-gray-200">
                        <div class="flex items-center">
                            <div class="w-8 h-8 lg:w-12 lg:h-12 bg-purple-50 rounded-lg flex items-center justify-center">
                                <i class="fas fa-eye text-purple-600 text-sm lg:text-base"></i>
                            </div>
                            <div class="ml-3 lg:ml-4">
                                <p class="text-xs lg:text-sm text-gray-600">Total Views</p>
                                <p class="text-lg lg:text-xl font-semibold text-gray-900">{{ number_format($news->sum('views') ?? 0) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Bar -->
                <div class="flex flex-col space-y-4 lg:flex-row lg:justify-between lg:items-center mb-6 lg:space-y-0">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Daftar Berita</h3>
                        <p class="text-gray-600 text-sm hidden sm:block">Menampilkan semua berita</p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-3 sm:space-y-0 sm:space-x-3">
                        <div class="relative">
                            <input type="text" 
                                   placeholder="Cari berita..." 
                                   class="w-full sm:w-48 lg:w-64 px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-sm">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                        </div>
                        
                        <button class="flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors text-sm">
                            <i class="fas fa-filter mr-2 text-gray-600"></i>
                            <span class="text-gray-700 hidden sm:inline">Filter</span>
                        </button>
                        
                        <a href="{{ route('admin.news.create') }}" 
                           class="flex items-center justify-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors text-sm">
                            <i class="fas fa-plus mr-2"></i>
                            <span class="hidden sm:inline">Tambah</span>
                        </a>
                    </div>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6 flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                <!-- News Table -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <!-- Mobile Card View -->
                    <div class="block lg:hidden">
                        @forelse($news ?? [] as $index => $item)
                        <div class="border-b border-gray-200 p-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-12 h-12 flex-shrink-0">
                                    @if($item->image ?? false)
                                    <img class="w-12 h-12 rounded-lg object-cover" 
                                         src="{{ asset('storage/' . $item->image) }}" 
                                         alt="{{ $item->title }}">
                                    @else
                                    <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-newspaper text-gray-400"></i>
                                    </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm font-medium text-gray-900 mb-1">
                                        {{ Str::limit($item->title ?? 'Untitled', 40) }}
                                    </div>
                                    <div class="flex items-center space-x-2 mb-2">
                                        @if(($item->status ?? 'draft') === 'published')
                                        <span class="inline-flex px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                            Published
                                        </span>
                                        @else
                                        <span class="inline-flex px-2 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full">
                                            Draft
                                        </span>
                                        @endif
                                        <span class="text-xs text-gray-500">{{ ucfirst($item->category ?? 'Umum') }}</span>
                                    </div>
                                    <div class="text-xs text-gray-500 mb-3">
                                        {{ ($item->created_at ?? now())->format('M d, Y') }}
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('news.show', $item) }}" 
                                           target="_blank"
                                           class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg text-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        
                                        <a href="{{ route('admin.news.edit', $item) }}" 
                                           class="p-2 text-green-600 hover:bg-green-50 rounded-lg text-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <form action="{{ route('admin.news.destroy', $item) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="p-2 text-red-600 hover:bg-red-50 rounded-lg text-sm"
                                                    onclick="return confirm('Yakin ingin menghapus berita ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="p-8 text-center">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-newspaper text-gray-400 text-xl"></i>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Berita</h3>
                            <p class="text-gray-500 mb-4 text-sm">Mulai dengan membuat artikel berita pertama</p>
                            <a href="{{ route('admin.news.create') }}" 
                               class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors text-sm">
                                <i class="fas fa-plus mr-2"></i>
                                Buat Berita
                            </a>
                        </div>
                        @endforelse
                    </div>

                    <!-- Desktop Table View -->
                    <div class="hidden lg:block overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Berita</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($news ?? [] as $index => $item)
                                <tr class="table-row">
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 flex-shrink-0">
                                                @if($item->image ?? false)
                                                <img class="w-10 h-10 rounded-lg object-cover" 
                                                     src="{{ asset('storage/' . $item->image) }}" 
                                                     alt="{{ $item->title }}">
                                                @else
                                                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                                    <i class="fas fa-newspaper text-gray-400"></i>
                                                </div>
                                                @endif
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ Str::limit($item->title ?? 'Untitled', 50) }}
                                                </div>
                                                <div class="text-xs text-gray-500">
                                                    {{ ucfirst($item->category ?? 'Umum') }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if(($item->status ?? 'draft') === 'published')
                                        <span class="inline-flex px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                            Published
                                        </span>
                                        @else
                                        <span class="inline-flex px-2 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full">
                                            Draft
                                        </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ ($item->created_at ?? now())->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center space-x-2">
                                            <a href="{{ route('news.show', $item) }}" 
                                               target="_blank"
                                               class="action-btn p-2 text-blue-600 hover:bg-blue-50 rounded-lg"
                                               title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            
                                            <a href="{{ route('admin.news.edit', $item) }}" 
                                               class="action-btn p-2 text-green-600 hover:bg-green-50 rounded-lg"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                            <form action="{{ route('admin.news.destroy', $item) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="action-btn p-2 text-red-600 hover:bg-red-50 rounded-lg"
                                                        title="Hapus"
                                                        onclick="return confirm('Yakin ingin menghapus berita ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <i class="fas fa-newspaper text-gray-400 text-xl"></i>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Berita</h3>
                                        <p class="text-gray-500 mb-4">Mulai dengan membuat artikel berita pertama</p>
                                        <a href="{{ route('admin.news.create') }}" 
                                           class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                                            <i class="fas fa-plus mr-2"></i>
                                            Buat Berita
                                        </a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                @if(isset($news) && $news->hasPages())
                <div class="mt-6 flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
                    <div class="text-sm text-gray-700 text-center sm:text-left">
                        Menampilkan {{ $news->firstItem() }} sampai {{ $news->lastItem() }} dari {{ $news->total() }} hasil
                    </div>
                    
                    <div class="flex items-center justify-center space-x-1">
                        @if ($news->onFirstPage())
                            <span class="px-2 lg:px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                <i class="fas fa-chevron-left text-sm"></i>
                            </span>
                        @else
                            <a href="{{ $news->previousPageUrl() }}" 
                               class="px-2 lg:px-3 py-2 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                                <i class="fas fa-chevron-left text-sm"></i>
                            </a>
                        @endif

                        @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                            @if ($page == $news->currentPage())
                                <span class="px-2 lg:px-3 py-2 bg-red-500 text-white rounded-lg text-sm">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" 
                                   class="px-2 lg:px-3 py-2 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 text-sm">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        @if ($news->hasMorePages())
                            <a href="{{ $news->nextPageUrl() }}" 
                               class="px-2 lg:px-3 py-2 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                                <i class="fas fa-chevron-right text-sm"></i>
                            </a>
                        @else
                            <span class="px-2 lg:px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                <i class="fas fa-chevron-right text-sm"></i>
                            </span>
                        @endif
                    </div>
                </div>
                @endif
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu functionality
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const sidebar = document.getElementById('sidebar');
            const mobileOverlay = document.getElementById('mobile-overlay');
            
            mobileMenuBtn.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
                mobileOverlay.classList.toggle('hidden');
            });
            
            mobileOverlay.addEventListener('click', function() {
                sidebar.classList.add('-translate-x-full');
                mobileOverlay.classList.add('hidden');
            });
            
            // Close sidebar when clicking a link on mobile
            const sidebarLinks = sidebar.querySelectorAll('a');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 1024) {
                        sidebar.classList.add('-translate-x-full');
                        mobileOverlay.classList.add('hidden');
                    }
                });
            });

            // Search functionality
            const searchInput = document.querySelector('input[placeholder="Cari berita..."]');
            const tableRows = document.querySelectorAll('.table-row');
            const mobileCards = document.querySelectorAll('.border-b.border-gray-200');
            
            if (searchInput) {
                searchInput.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.toLowerCase();
                    
                    // Search in desktop table
                    tableRows.forEach(row => {
                        const title = row.querySelector('.text-sm.font-medium');
                        if (title && title.textContent.toLowerCase().includes(searchTerm)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                    
                    // Search in mobile cards
                    mobileCards.forEach(card => {
                        const title = card.querySelector('.text-sm.font-medium');
                        if (title && title.textContent.toLowerCase().includes(searchTerm)) {
                            card.style.display = '';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            }

            // Coming soon alerts
            const comingSoonItems = document.querySelectorAll('.coming-soon');
            comingSoonItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    alert('Fitur ini akan segera hadir!');
                });
            });
            
            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('-translate-x-full');
                    mobileOverlay.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>