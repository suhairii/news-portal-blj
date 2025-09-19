<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Partnership - PT. Bumi Laksamana Jaya</title>
    <meta name="description" content="Kelola Partnership PT. Bumi Laksamana Jaya - Oil & Gas Solutions">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

            /* Oil-themed Colors for buttons */
            --oil-gold: #fbbf24;
            --oil-amber: #f59e0b;
            --oil-orange: #ea580c;

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

            --sidebar-width: 260px;
            --sidebar-collapsed-width: 70px;
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

        .mobile-menu-btn:hover {
            background: rgba(59, 130, 246, 0.1);
            border-color: rgba(59, 130, 246, 0.3);
            transform: scale(1.05);
            box-shadow: 0 12px 40px rgba(59, 130, 246, 0.2);
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

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, var(--oil-gold), var(--oil-amber));
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(251, 191, 36, 0.3);
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(251, 191, 36, 0.4);
            background: linear-gradient(135deg, var(--oil-amber), var(--oil-orange));
        }

        .filter-section {
            margin-bottom: 1.5rem;
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.35);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(30px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15);
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            align-items: end;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-500);
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .table-container {
            background: rgba(255, 255, 255, 0.35);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 20px;
            overflow: hidden;
            backdrop-filter: blur(30px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15);
            margin-bottom: 2rem;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        .table thead {
            background: rgba(255, 255, 255, 0.3);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: var(--gray-800);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            white-space: nowrap;
        }

        .table td {
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            vertical-align: middle;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .logo-cell {
            width: 80px;
            text-align: center;
        }

        .logo-image {
            width: 60px;
            height: 45px;
            object-fit: contain;
            border-radius: 6px;
            background: var(--gray-50);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .partnership-name {
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.25rem;
            line-height: 1.3;
        }

        .partnership-description {
            color: var(--gray-600);
            font-size: 0.8rem;
            line-height: 1.4;
            max-width: 300px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .website-link {
            color: var(--primary-600);
            text-decoration: none;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .website-link:hover {
            color: var(--primary-700);
            text-decoration: underline;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-active {
            background: rgba(34, 197, 94, 0.1);
            color: #16a34a;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        .status-deleted {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .date-cell {
            color: var(--gray-600);
            font-size: 0.8rem;
            white-space: nowrap;
        }

        .actions-cell {
            white-space: nowrap;
            min-width: 200px;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            justify-content: flex-start;
        }

        .btn-sm {
            padding: 0.4rem 0.7rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 28px;
            height: 28px;
        }

        .btn-info {
            background: rgba(6, 182, 212, 0.1);
            color: #0891b2;
            border: 1px solid rgba(6, 182, 212, 0.3);
        }

        .btn-info:hover {
            background: rgba(6, 182, 212, 0.2);
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(6, 182, 212, 0.3);
        }

        .btn-warning {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .btn-warning:hover {
            background: rgba(245, 158, 11, 0.2);
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
        }

        .btn-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .btn-danger:hover {
            background: rgba(239, 68, 68, 0.2);
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
        }

        .btn-success {
            background: rgba(34, 197, 94, 0.1);
            color: #16a34a;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .btn-success:hover {
            background: rgba(34, 197, 94, 0.2);
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(34, 197, 94, 0.3);
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
            backdrop-filter: blur(10px);
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

        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1.5rem;
            background: rgba(255, 255, 255, 0.35);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(30px);
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--primary-500);
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: var(--gray-500);
            margin-bottom: 1.5rem;
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

            .page-header {
                flex-direction: column;
                text-align: center;
                margin-bottom: 1.5rem;
            }

            .header-left h1 {
                font-size: 1.5rem;
            }

            .filter-grid {
                grid-template-columns: 1fr;
            }

            .table-container {
                overflow-x: auto;
            }

            .table {
                min-width: 800px;
            }

            .partnership-description {
                max-width: 200px;
            }

            .website-link {
                max-width: 150px;
            }
        }

        @media (max-width: 768px) {
            .table {
                font-size: 0.8rem;
            }

            .table th,
            .table td {
                padding: 0.75rem 0.5rem;
            }

            .logo-image {
                width: 45px;
                height: 35px;
            }

            .partnership-description {
                max-width: 150px;
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
                    <h1>Kelola Partnership</h1>
                    <p>Manajemen mitra dan kerja sama PT. Bumi Laksamana Jaya</p>
                </div>
                <a href="{{ route('admin.partnerships.create') }}" class="btn-primary">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Partnership</span>
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

            <!-- Filter Section -->
            <div class="filter-section">
                <form method="GET" action="{{ route('admin.partnerships.index') }}" class="filter-grid">
                    <div class="form-group">
                        <label for="search">Cari Partnership</label>
                        <input type="text" id="search" name="search" class="form-control"
                            placeholder="Nama, deskripsi, atau website..." value="{{ request('search') }}">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="">Semua Status</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="deleted" {{ request('status') == 'deleted' ? 'selected' : '' }}>Dihapus</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn-primary" style="width: 100%;">
                            <i class="fas fa-search"></i>
                            <span>Cari</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Partnerships Table -->
            @if($partnerships->count() > 0)
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="logo-cell">Logo</th>
                                <th>Partnership</th>
                                <th>Website</th>
                                <th>Status</th>
                                <th>Tanggal Dibuat</th>
                                <th class="actions-cell">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partnerships as $partnership)
                                <tr>
                                    <td class="logo-cell">
                                        <img src="{{ $partnership->logo_url }}" alt="{{ $partnership->name }}" 
                                            class="logo-image">
                                    </td>
                                    <td>
                                        <div class="partnership-name">{{ $partnership->name }}</div>
                                        @if($partnership->description)
                                            <div class="partnership-description">{{ $partnership->getExcerpt() }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($partnership->website)
                                            <a href="{{ $partnership->website }}" target="_blank" class="website-link">
                                                <i class="fas fa-external-link-alt"></i>
                                                <span>{{ $partnership->website_domain }}</span>
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="status-badge {{ $partnership->deleted_at ? 'status-deleted' : 'status-active' }}">
                                            {{ $partnership->deleted_at ? 'Dihapus' : 'Aktif' }}
                                        </span>
                                    </td>
                                    <td class="date-cell">{{ $partnership->formatted_created_date }}</td>
                                    <td class="actions-cell">
                                        <div class="action-buttons">
                                            @if(!$partnership->deleted_at)
                                                <a href="{{ route('admin.partnerships.show', $partnership) }}" 
                                                    class="btn-sm btn-info" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.partnerships.edit', $partnership) }}" 
                                                    class="btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.partnerships.destroy', $partnership) }}"
                                                    style="display: inline;"
                                                    onsubmit="return confirm('Yakin ingin menghapus partnership ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-sm btn-danger" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ route('admin.partnerships.restore', $partnership->id) }}"
                                                    style="display: inline;"
                                                    onsubmit="return confirm('Yakin ingin memulihkan partnership ini?')">
                                                    @csrf
                                                    <button type="submit" class="btn-sm btn-success" title="Pulihkan">
                                                        <i class="fas fa-undo"></i>
                                                    </button>
                                                </form>
                                                <form method="POST" action="{{ route('admin.partnerships.force-delete', $partnership->id) }}"
                                                    style="display: inline;"
                                                    onsubmit="return confirm('Yakin ingin menghapus permanen? Data tidak bisa dikembalikan!')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-sm btn-danger" title="Hapus Permanen">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="pagination-wrapper">
                    {{ $partnerships->appends(request()->query())->links() }}
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-handshake"></i>
                    <h3>Belum ada partnership</h3>
                    <p>Belum ada partnership yang sesuai dengan filter yang dipilih</p>
                    <a href="{{ route('admin.partnerships.create') }}" class="btn-primary">
                        <i class="fas fa-plus"></i>
                        <span>Tambah Partnership Pertama</span>
                    </a>
                </div>
            @endif
        </main>
    </div>

    <script>
        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function () {
            document.body.classList.remove('loading');
        });

        console.log('🤝 Partnership Index Page loaded successfully!');
    </script>
</body>

</html>