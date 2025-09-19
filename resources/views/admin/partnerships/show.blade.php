<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $partnership->name }} - Partnership Detail</title>
    <meta name="description" content="Detail Partnership {{ $partnership->name }} - PT. Bumi Laksamana Jaya">
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
            --primary-500: #3b82f6;
            --oil-gold: #fbbf24;
            --oil-amber: #f59e0b;
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

        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .dashboard-layout {
            display: flex;
            min-height: 100vh;
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
            color: var(--primary-500);
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

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: rgba(107, 114, 128, 0.1);
            color: var(--gray-700);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(107, 114, 128, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(107, 114, 128, 0.2);
            transform: translateY(-1px);
        }

        .btn-warning {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .btn-warning:hover {
            background: rgba(245, 158, 11, 0.2);
            transform: translateY(-1px);
        }

        .partnership-detail {
            max-width: 800px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.4);
            overflow: hidden;
            backdrop-filter: blur(20px);
        }

        .partnership-header {
            padding: 2rem;
            text-align: center;
            background: linear-gradient(135deg, rgba(251, 191, 36, 0.1), rgba(245, 158, 11, 0.05));
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .partnership-logo {
            width: 200px;
            height: 150px;
            object-fit: contain;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            background: white;
            padding: 1rem;
            margin: 0 auto 1.5rem;
            display: block;
        }

        .partnership-name {
            font-size: 2rem;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .partnership-website {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--oil-amber);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .partnership-website:hover {
            color: var(--oil-gold);
        }

        .partnership-body {
            padding: 2rem;
        }

        .detail-section {
            margin-bottom: 2rem;
        }

        .detail-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .detail-title i {
            color: var(--oil-gold);
            width: 20px;
        }

        .detail-content {
            color: var(--gray-600);
            line-height: 1.7;
            font-size: 0.95rem;
        }

        .detail-meta {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
        }

        .meta-item {
            text-align: center;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        .meta-label {
            font-size: 0.8rem;
            color: var(--gray-500);
            margin-bottom: 0.25rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .meta-value {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--gray-800);
        }

        .actions-section {
            padding: 1.5rem 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            display: flex;
            gap: 1rem;
            justify-content: center;
            background: rgba(0, 0, 0, 0.02);
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
            }

            .partnership-header {
                padding: 1.5rem;
            }

            .partnership-name {
                font-size: 1.5rem;
            }

            .partnership-body {
                padding: 1.5rem;
            }

            .actions-section {
                padding: 1rem;
                flex-direction: column;
            }

            .detail-meta {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard-bg"></div>

    <button class="mobile-menu-btn" onclick="window.toggleMobileSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="dashboard-layout" x-data="partnershipShow()">
        @include('components.sidebar')

        <main class="main-content" :class="{ 'sidebar-collapsed': sidebarCollapsed }">
            <header class="page-header">
                <div class="header-left">
                    <h1>Detail Partnership</h1>
                    <p>Informasi lengkap partnership {{ $partnership->name }}</p>
                </div>
                <a href="{{ route('admin.partnerships.index') }}" class="btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
            </header>

            <div class="partnership-detail glass">
                <div class="partnership-header">
                    <img src="{{ $partnership->logo_url }}" alt="{{ $partnership->name }}" class="partnership-logo">
                    <h2 class="partnership-name">{{ $partnership->name }}</h2>
                    @if($partnership->website)
                        <a href="{{ $partnership->website }}" target="_blank" class="partnership-website">
                            <i class="fas fa-external-link-alt"></i>
                            <span>{{ $partnership->website_domain }}</span>
                        </a>
                    @endif
                </div>

                <div class="partnership-body">
                    @if($partnership->description)
                        <div class="detail-section">
                            <h3 class="detail-title">
                                <i class="fas fa-info-circle"></i>
                                <span>Deskripsi</span>
                            </h3>
                            <div class="detail-content">
                                {!! nl2br(e($partnership->description)) !!}
                            </div>
                        </div>
                    @endif

                    <div class="detail-meta">
                        <div class="meta-item">
                            <div class="meta-label">Status</div>
                            <div class="meta-value">
                                {{ $partnership->deleted_at ? 'Dihapus' : 'Aktif' }}
                            </div>
                        </div>

                        <div class="meta-item">
                            <div class="meta-label">Dibuat</div>
                            <div class="meta-value">{{ $partnership->formatted_created_date_time }}</div>
                        </div>

                        <div class="meta-item">
                            <div class="meta-label">Terakhir Diubah</div>
                            <div class="meta-value">{{ $partnership->updated_at->format('d M Y - H:i') }}</div>
                        </div>

                        @if($partnership->website)
                            <div class="meta-item">
                                <div class="meta-label">Website</div>
                                <div class="meta-value">
                                    <a href="{{ $partnership->website }}" target="_blank" style="color: var(--oil-amber);">
                                        {{ $partnership->website_domain }}
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                @if(!$partnership->deleted_at)
                    <div class="actions-section">
                        <a href="{{ route('admin.partnerships.edit', $partnership) }}" class="btn-secondary btn-warning">
                            <i class="fas fa-edit"></i>
                            <span>Edit Partnership</span>
                        </a>
                    </div>
                @endif
            </div>
        </main>
    </div>

    <script>
        function partnershipShow() {
            return {
                sidebarCollapsed: false,

                init() {
                    window.addEventListener('sidebarToggle', (event) => {
                        this.sidebarCollapsed = event.detail.collapsed;
                    });
                }
            }
        }

        console.log('🤝 Partnership Show Page loaded successfully!');
    </script>
</body>

</html>