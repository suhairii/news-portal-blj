<!-- Sidebar Component - components/sidebar.blade.php -->
<!-- Mobile Hamburger Button -->
<button class="mobile-hamburger" x-data="{ open: false }" @click="open = !open; toggleMobileSidebar()">
    <div class="hamburger-lines" :class="{ 'active': open }">
        <span></span>
        <span></span>
        <span></span>
    </div>
</button>

<!-- Sidebar - NO BACKDROP -->
<aside class="dashboard-sidebar glass-strong" x-data="dashboardSidebar()" x-init="init()"
    :class="{ 'collapsed': collapsed, 'mobile-open': mobileOpen }">

    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <div class="sidebar-logo" :class="{ 'sidebar-logo-collapsed': collapsed }">
            <div class="logo-wrapper">
                <div class="logo-circle">
                    <img src="{{ asset('assets/image/logoblj2.png') }}" alt="PT BLJ Logo" class="logo-image">
                </div>
            </div>
            <div class="company-info" x-show="!collapsed" x-transition>
                <span class="company-name">PT. Bumi Laksamana Jaya</span>
                <span class="company-tagline">Admin Dashboard</span>
            </div>
        </div>

        <!-- Desktop Toggle Button -->
        <button @click="toggleSidebar()" class="sidebar-toggle-btn glass desktop-only"
            :class="{ 'sidebar-toggle-collapsed': collapsed }">
            <i class="fas fa-chevron-left sidebar-toggle-icon" :class="{ 'rotate-180': collapsed }"></i>
        </button>

        <!-- Mobile Close Button -->
        <button @click="closeMobileSidebar()" class="mobile-close-btn mobile-only">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- Navigation Menu -->
    <nav class="sidebar-nav">
        <!-- Main Section -->
        <div class="nav-section">
            <div class="nav-section-title" x-show="!collapsed" x-transition>
                <span>Menu Utama</span>
            </div>

            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}" class="nav-item"
                :class="{ 'nav-item-active': activeItem === 'dashboard' }" @click="setActiveItem('dashboard')">
                <div class="nav-item-icon blue">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <div class="nav-item-text" x-show="!collapsed" x-transition>
                    <span class="nav-item-title">Dashboard</span>
                    <span class="nav-item-desc">Beranda admin</span>
                </div>
                <div class="nav-item-indicator" :class="{ 'active': activeItem === 'dashboard' }"></div>
            </a>

            <!-- Artikel & Berita Dropdown -->
            <div x-data="{ submenuOpen: false }" class="nav-dropdown-container">
                <button @click="submenuOpen = !submenuOpen" class="nav-item nav-dropdown-trigger"
                    :class="{ 'nav-item-active': activeItem === 'articles' || activeItem === 'news', 'expanded': submenuOpen }">
                    <div class="nav-item-icon red">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="nav-item-text" x-show="!collapsed" x-transition>
                        <span class="nav-item-title">Artikel & Berita</span>
                        <span class="nav-item-desc">Kelola konten</span>
                    </div>
                    <div class="nav-dropdown-arrow" x-show="!collapsed" x-transition>
                        <i class="fas fa-chevron-down" :class="{ 'rotate-180': submenuOpen }"></i>
                    </div>
                    <div class="nav-item-indicator"
                        :class="{ 'active': activeItem === 'articles' || activeItem === 'news' }"></div>
                </button>

                <!-- Submenu -->
                <div x-show="submenuOpen && !collapsed" x-transition class="nav-submenu">
                    <a href="{{ route('admin.news.create') }}" class="nav-submenu-item"
                        @click="setActiveItem('articles')">
                        <div class="nav-submenu-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="nav-submenu-text">
                            <span class="nav-submenu-title">Tambah Berita</span>
                            <span class="nav-submenu-desc">Buat berita baru</span>
                        </div>
                    </a>
                    <a href="{{ route('admin.news.index') }}" class="nav-submenu-item" @click="setActiveItem('news')">
                        <div class="nav-submenu-icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <div class="nav-submenu-text">
                            <span class="nav-submenu-title">Kelola Berita</span>
                            <span class="nav-submenu-desc">Edit & hapus berita</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Partnership/Mitra Dropdown -->
            <div x-data="{ submenuOpen: false }" class="nav-dropdown-container">
                <button @click="submenuOpen = !submenuOpen" class="nav-item nav-dropdown-trigger"
                    :class="{ 'nav-item-active': activeItem === 'partnerships' || activeItem === 'partnership-create', 'expanded': submenuOpen }">
                    <div class="nav-item-icon gold">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="nav-item-text" x-show="!collapsed" x-transition>
                        <span class="nav-item-title">Mitra & Kerja Sama</span>
                        <span class="nav-item-desc">Kelola partnership</span>
                    </div>
                    <div class="nav-dropdown-arrow" x-show="!collapsed" x-transition>
                        <i class="fas fa-chevron-down" :class="{ 'rotate-180': submenuOpen }"></i>
                    </div>
                    <div class="nav-item-indicator"
                        :class="{ 'active': activeItem === 'partnerships' || activeItem === 'partnership-create' }"></div>
                </button>

                <!-- Submenu -->
                <div x-show="submenuOpen && !collapsed" x-transition class="nav-submenu">
                    <a href="{{ route('admin.partnerships.create') }}" class="nav-submenu-item"
                        @click="setActiveItem('partnership-create')">
                        <div class="nav-submenu-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="nav-submenu-text">
                            <span class="nav-submenu-title">Tambah Mitra</span>
                            <span class="nav-submenu-desc">Buat partnership baru</span>
                        </div>
                    </a>
                    <a href="{{ route('admin.partnerships.index') }}" class="nav-submenu-item" @click="setActiveItem('partnerships')">
                        <div class="nav-submenu-icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <div class="nav-submenu-text">
                            <span class="nav-submenu-title">Kelola Mitra</span>
                            <span class="nav-submenu-desc">Edit & hapus partnership</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Media Gallery -->
            <a href="#" class="nav-item" :class="{ 'nav-item-active': activeItem === 'media' }"
                @click="setActiveItem('media')">
                <div class="nav-item-icon oil">
                    <i class="fas fa-images"></i>
                </div>
                <div class="nav-item-text" x-show="!collapsed" x-transition>
                    <span class="nav-item-title">Media Gallery</span>
                    <span class="nav-item-desc">Kelola media</span>
                </div>
                <div class="nav-item-indicator" :class="{ 'active': activeItem === 'media' }"></div>
            </a>

            <!-- Users Management -->
            <a href="#" class="nav-item" :class="{ 'nav-item-active': activeItem === 'users' }"
                @click="setActiveItem('users')">
                <div class="nav-item-icon gold">
                    <i class="fas fa-users"></i>
                </div>
                <div class="nav-item-text" x-show="!collapsed" x-transition>
                    <span class="nav-item-title">Users Management</span>
                    <span class="nav-item-desc">Kelola pengguna</span>
                </div>
                <div class="nav-item-indicator" :class="{ 'active': activeItem === 'users' }"></div>
            </a>
        </div>

        <!-- System Section -->
        <div class="nav-section">
            <div class="nav-section-title" x-show="!collapsed" x-transition>
                <span>Sistem</span>
            </div>

            <!-- Settings -->
            <a href="#" class="nav-item" :class="{ 'nav-item-active': activeItem === 'settings' }"
                @click="setActiveItem('settings')">
                <div class="nav-item-icon blue">
                    <i class="fas fa-cog"></i>
                </div>
                <div class="nav-item-text" x-show="!collapsed" x-transition>
                    <span class="nav-item-title">Pengaturan</span>
                    <span class="nav-item-desc">Konfigurasi sistem</span>
                </div>
                <div class="nav-item-indicator" :class="{ 'active': activeItem === 'settings' }"></div>
            </a>

            <!-- Analytics -->
            <a href="#" class="nav-item" :class="{ 'nav-item-active': activeItem === 'analytics' }"
                @click="setActiveItem('analytics')">
                <div class="nav-item-icon red">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="nav-item-text" x-show="!collapsed" x-transition>
                    <span class="nav-item-title">Analytics</span>
                    <span class="nav-item-desc">Laporan & statistik</span>
                </div>
                <div class="nav-item-indicator" :class="{ 'active': activeItem === 'analytics' }"></div>
            </a>

            <!-- Backup -->
            <a href="#" class="nav-item" :class="{ 'nav-item-active': activeItem === 'backup' }"
                @click="setActiveItem('backup')">
                <div class="nav-item-icon oil">
                    <i class="fas fa-cloud-download-alt"></i>
                </div>
                <div class="nav-item-text" x-show="!collapsed" x-transition>
                    <span class="nav-item-title">Backup Data</span>
                    <span class="nav-item-desc">Cadangan sistem</span>
                </div>
                <div class="nav-item-indicator" :class="{ 'active': activeItem === 'backup' }"></div>
            </a>
        </div>

        <!-- External Section -->
        <div class="nav-section">
            <div class="nav-section-title" x-show="!collapsed" x-transition>
                <span>External</span>
            </div>

            <!-- View Website -->
            <a href="{{ route('landing') }}" class="nav-item external-link" target="_blank">
                <div class="nav-item-icon gold">
                    <i class="fas fa-external-link-alt"></i>
                </div>
                <div class="nav-item-text" x-show="!collapsed" x-transition>
                    <span class="nav-item-title">Lihat Website</span>
                    <span class="nav-item-desc">Buka di tab baru</span>
                </div>
            </a>

            <!-- Help & Support -->
            <a href="#" class="nav-item" :class="{ 'nav-item-active': activeItem === 'help' }"
                @click="setActiveItem('help')">
                <div class="nav-item-icon blue">
                    <i class="fas fa-question-circle"></i>
                </div>
                <div class="nav-item-text" x-show="!collapsed" x-transition>
                    <span class="nav-item-title">Help & Support</span>
                    <span class="nav-item-desc">Bantuan penggunaan</span>
                </div>
                <div class="nav-item-indicator" :class="{ 'active': activeItem === 'help' }"></div>
            </a>
        </div>
    </nav>

    <!-- Sidebar Footer -->
    <div class="sidebar-footer" x-show="!collapsed" x-transition>
        <div class="footer-user glass">
            <div class="footer-avatar">
                <i class="fas fa-user"></i>
            </div>
            <div class="footer-info">
                <span class="footer-name">{{ Auth::user()->name ?? 'Administrator' }}</span>
                <span class="footer-role">{{ Auth::user()->role ?? 'Admin' }}</span>
            </div>
        </div>
        <div class="footer-actions">
            <button class="footer-action-btn glass" title="Profile">
                <i class="fas fa-user-edit"></i>
            </button>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="footer-action-btn glass logout" title="Logout"
                    onclick="return confirmLogout()">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </div>
</aside>

<style>
    :root {
        /* Colors */
        --primary-500: #3b82f6;
        --primary-600: #2563eb;
        --primary-700: #1d4ed8;
        --secondary-500: #ef4444;
        --secondary-600: #dc2626;
        --oil-gold: #fbbf24;
        --oil-dark: #1f2937;
        --oil-amber: #f59e0b;
        --gray-50: #f9fafb;
        --gray-100: #f3f4f6;
        --gray-400: #9ca3af;
        --gray-500: #6b7280;
        --gray-600: #4b5563;
        --gray-700: #374151;
        --gray-800: #1f2937;
        --gray-900: #111827;

        /* Sidebar dimensions */
        --sidebar-width: 260px;
        --sidebar-collapsed-width: 70px;
    }

    /* Responsive visibility classes */
    .desktop-only {
        display: flex;
    }

    .mobile-only {
        display: none;
    }

    @media (max-width: 1024px) {
        .desktop-only {
            display: none;
        }

        .mobile-only {
            display: flex;
        }
    }

    /* Mobile Hamburger Button */
    .mobile-hamburger {
        position: fixed;
        top: 1rem;
        left: 1rem;
        z-index: 1200;
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 12px;
        display: none;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    .mobile-hamburger:hover {
        background: rgba(59, 130, 246, 0.1);
        border-color: rgba(59, 130, 246, 0.3);
        transform: translateY(0) scale(1.05);
    }

    .hamburger-lines {
        position: relative;
        width: 24px;
        height: 18px;
    }

    .hamburger-lines span {
        position: absolute;
        left: 0;
        width: 100%;
        height: 2px;
        background: var(--gray-700);
        border-radius: 1px;
        transition: all 0.3s ease;
    }

    .hamburger-lines span:nth-child(1) {
        top: 0;
    }

    .hamburger-lines span:nth-child(2) {
        top: 8px;
    }

    .hamburger-lines span:nth-child(3) {
        top: 16px;
    }

    .hamburger-lines.active span:nth-child(1) {
        top: 8px;
        transform: rotate(45deg);
    }

    .hamburger-lines.active span:nth-child(2) {
        opacity: 0;
    }

    .hamburger-lines.active span:nth-child(3) {
        top: 8px;
        transform: rotate(-45deg);
    }

    @media (max-width: 1024px) {
        .mobile-hamburger {
            display: flex;
        }
    }

    /* Glassmorphism */
    .glass {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 12px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .glass-strong {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(40px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 20px;
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15);
    }

    /* Dashboard Sidebar - NO BACKDROP */
    .dashboard-sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: var(--sidebar-width);
        height: 100vh;
        z-index: 1100;
        display: flex;
        flex-direction: column;
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        overflow: hidden;
    }

    .dashboard-sidebar.collapsed {
        width: var(--sidebar-collapsed-width);
    }

    /* Mobile behavior - NO BACKDROP */
    @media (max-width: 1024px) {
        .dashboard-sidebar {
            transform: translateX(-100%);
            width: 280px;
            /* NO backdrop interference */
        }

        .dashboard-sidebar.mobile-open {
            transform: translateX(0);
            /* Clean slide-in without backdrop */
        }
    }

    /* Sidebar Header */
    .sidebar-header {
        padding: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(99, 102, 241, 0.05));
        min-height: 80px;
    }

    .sidebar-logo {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        transition: all 0.3s ease;
        flex: 1;
        min-width: 0;
    }

    .sidebar-logo-collapsed {
        justify-content: center;
        align-items: center;
    }

    .logo-circle {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
        border: 2px solid rgba(255, 255, 255, 0.8);
        overflow: hidden;
        transition: all 0.4s ease;
        flex-shrink: 0;
    }

    .logo-circle:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
    }

    .logo-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 50%;
    }

    .company-info {
        display: flex;
        flex-direction: column;
        gap: 0.2rem;
        overflow: hidden;
        flex: 1;
        min-width: 0;
    }

    .company-name {
        font-weight: 700;
        font-size: 0.85rem;
        color: var(--gray-800);
        line-height: 1.1;
        word-wrap: break-word;
        overflow-wrap: break-word;
        hyphens: auto;
        max-width: 100%;
    }

    .company-tagline {
        font-size: 0.7rem;
        color: var(--primary-600);
        font-weight: 600;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    @media (max-width: 280px) {
        .company-name {
            font-size: 0.75rem;
            line-height: 1.0;
        }

        .company-tagline {
            font-size: 0.65rem;
        }
    }

    .dashboard-sidebar.collapsed .company-info {
        display: none;
    }

    /* Toggle Button */
    .sidebar-toggle-btn {
        width: 32px;
        height: 32px;
        border: none;
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.8);
        cursor: pointer;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.4);
        flex-shrink: 0;
    }

    .sidebar-toggle-btn:hover {
        background: rgba(59, 130, 246, 0.1);
        border-color: rgba(59, 130, 246, 0.3);
        transform: scale(1.05);
    }

    .sidebar-toggle-collapsed {
        position: absolute;
        right: -16px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1101;
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .sidebar-toggle-icon {
        font-size: 0.8rem;
        color: var(--gray-700);
        transition: all 0.3s ease;
    }

    .rotate-180 {
        transform: rotate(180deg);
    }

    /* Mobile Close Button */
    .mobile-close-btn {
        width: 32px;
        height: 32px;
        border: none;
        border-radius: 8px;
        background: rgba(239, 68, 68, 0.1);
        color: var(--secondary-600);
        cursor: pointer;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border: 1px solid rgba(239, 68, 68, 0.2);
        flex-shrink: 0;
    }

    .mobile-close-btn:hover {
        background: rgba(239, 68, 68, 0.2);
        transform: scale(1.05);
    }

    /* Navigation */
    .sidebar-nav {
        flex: 1;
        padding: 0.75rem 0;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .nav-section {
        margin-bottom: 1.5rem;
    }

    .nav-section-title {
        padding: 0 1rem 0.5rem;
        font-size: 0.7rem;
        font-weight: 700;
        color: var(--gray-500);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        margin-bottom: 0.5rem;
    }

    /* Navigation Items */
    .nav-item {
        position: relative;
        display: flex;
        align-items: center;
        margin: 0.25rem 0.75rem;
        padding: 0.75rem;
        text-decoration: none;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.4);
        gap: 0.75rem;
    }

    .nav-item:hover,
    .nav-item.nav-item-active {
        background: rgba(59, 130, 246, 0.1);
        border-color: rgba(59, 130, 246, 0.2);
        transform: translateX(3px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.15);
    }

    .nav-item-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 255, 255, 0.3);
        flex-shrink: 0;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .nav-item-icon::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: inherit;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .nav-item-icon.blue {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(99, 102, 241, 0.1));
        border-color: rgba(59, 130, 246, 0.15);
    }

    .nav-item-icon.blue::before {
        background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
    }

    .nav-item-icon.red {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.1));
        border-color: rgba(239, 68, 68, 0.15);
    }

    .nav-item-icon.red::before {
        background: linear-gradient(135deg, var(--secondary-500), var(--secondary-600));
    }

    .nav-item-icon.oil {
        background: linear-gradient(135deg, rgba(31, 41, 55, 0.1), rgba(17, 24, 39, 0.1));
        border-color: rgba(31, 41, 55, 0.15);
    }

    .nav-item-icon.oil::before {
        background: linear-gradient(135deg, var(--oil-dark), var(--gray-900));
    }

    .nav-item-icon.gold {
        background: linear-gradient(135deg, rgba(251, 191, 36, 0.1), rgba(245, 158, 11, 0.1));
        border-color: rgba(251, 191, 36, 0.15);
    }

    .nav-item-icon.gold::before {
        background: linear-gradient(135deg, var(--oil-gold), var(--oil-amber));
    }

    .nav-item-icon i {
        font-size: 1rem;
        color: var(--primary-600);
        transition: all 0.3s ease;
        position: relative;
        z-index: 2;
    }

    .nav-item:hover .nav-item-icon::before,
    .nav-item.nav-item-active .nav-item-icon::before {
        opacity: 1;
    }

    .nav-item:hover .nav-item-icon i,
    .nav-item.nav-item-active .nav-item-icon i {
        color: white;
    }

    .nav-item:hover .nav-item-icon,
    .nav-item.nav-item-active .nav-item-icon {
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
        transform: translateY(-1px);
    }

    .nav-item-text {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 0.15rem;
        min-width: 0;
    }

    .nav-item-title {
        font-weight: 600;
        font-size: 0.85rem;
        color: var(--gray-800);
        line-height: 1.2;
        transition: color 0.3s ease;
    }

    .nav-item-desc {
        font-size: 0.7rem;
        color: var(--gray-600);
        line-height: 1.3;
        transition: color 0.3s ease;
    }

    .nav-item.nav-item-active .nav-item-title {
        color: var(--primary-700);
    }

    .nav-item:hover .nav-item-desc,
    .nav-item.nav-item-active .nav-item-desc {
        color: var(--primary-600);
    }

    .nav-item-indicator {
        position: absolute;
        left: 0;
        top: 0;
        width: 3px;
        height: 100%;
        background: linear-gradient(180deg, var(--primary-500), var(--primary-600));
        border-radius: 0 3px 3px 0;
        opacity: 0;
        transform: scaleY(0);
        transition: all 0.4s ease;
    }

    .nav-item-indicator.active {
        opacity: 1;
        transform: scaleY(1);
    }

    /* Dropdown Styles */
    .nav-dropdown-container {
        margin: 0.25rem 0.75rem;
    }

    .nav-dropdown-trigger {
        background: rgba(255, 255, 255, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 12px;
        margin: 0;
        width: 100%;
        text-align: left;
        cursor: pointer;
    }

    .nav-dropdown-trigger:hover,
    .nav-dropdown-trigger.nav-item-active,
    .nav-dropdown-trigger.expanded {
        background: rgba(59, 130, 246, 0.1);
        border-color: rgba(59, 130, 246, 0.2);
    }

    .nav-dropdown-arrow {
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .nav-dropdown-arrow i {
        font-size: 0.7rem;
        color: var(--gray-400);
        transition: all 0.3s ease;
    }

    /* Submenu */
    .nav-submenu {
        margin-top: 0.5rem;
        padding: 0 0.75rem;
        border-left: 2px solid rgba(59, 130, 246, 0.2);
        background: rgba(59, 130, 246, 0.02);
        border-radius: 0 10px 10px 0;
    }

    .nav-submenu-item {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        margin: 0.3rem 0;
        text-decoration: none;
        border-radius: 10px;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.6);
        gap: 0.6rem;
    }

    .nav-submenu-item:hover {
        background: rgba(59, 130, 246, 0.08);
        border-color: rgba(59, 130, 246, 0.2);
        transform: translateX(3px);
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.1);
    }

    .nav-submenu-icon {
        width: 28px;
        height: 28px;
        background: rgba(59, 130, 246, 0.1);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    .nav-submenu-item:hover .nav-submenu-icon {
        background: var(--primary-500);
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
    }

    .nav-submenu-icon i {
        font-size: 0.8rem;
        color: var(--primary-600);
        transition: all 0.3s ease;
    }

    .nav-submenu-item:hover .nav-submenu-icon i {
        color: white;
    }

    .nav-submenu-text {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 0.15rem;
    }

    .nav-submenu-title {
        font-weight: 600;
        font-size: 0.8rem;
        color: var(--gray-800);
        transition: color 0.3s ease;
    }

    .nav-submenu-desc {
        font-size: 0.7rem;
        color: var(--gray-600);
        transition: color 0.3s ease;
    }

    .nav-submenu-item:hover .nav-submenu-title {
        color: var(--primary-700);
    }

    .nav-submenu-item:hover .nav-submenu-desc {
        color: var(--primary-600);
    }

    /* External Link */
    .external-link:hover {
        background: rgba(251, 191, 36, 0.1);
        border-color: rgba(251, 191, 36, 0.3);
        box-shadow: 0 6px 20px rgba(251, 191, 36, 0.15);
    }

    .external-link:hover .nav-item-icon::before {
        background: linear-gradient(135deg, var(--oil-gold), var(--oil-amber));
        opacity: 1;
    }

    .external-link:hover .nav-item-title {
        color: var(--oil-amber);
    }

    .external-link:hover .nav-item-desc {
        color: var(--oil-gold);
    }

    /* Sidebar Footer */
    .sidebar-footer {
        padding: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        background: rgba(0, 0, 0, 0.02);
        margin-top: auto;
    }

    .footer-user {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.75rem;
        padding: 0.75rem;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.4);
        transition: all 0.3s ease;
    }

    .footer-user:hover {
        background: rgba(255, 255, 255, 0.4);
        transform: translateY(-1px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .footer-avatar {
        width: 32px;
        height: 32px;
        background: var(--primary-500);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.9rem;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .footer-user:hover .footer-avatar {
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
    }

    .footer-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 0.15rem;
        min-width: 0;
    }

    .footer-name {
        font-weight: 600;
        font-size: 0.8rem;
        color: var(--gray-800);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: color 0.3s ease;
    }

    .footer-role {
        font-size: 0.7rem;
        color: var(--primary-600);
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .footer-user:hover .footer-name {
        color: var(--primary-700);
    }

    .footer-user:hover .footer-role {
        color: var(--primary-500);
    }

    .footer-actions {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
    }

    .footer-action-btn {
        width: 32px;
        height: 32px;
        background: rgba(255, 255, 255, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: var(--gray-600);
        font-size: 0.8rem;
    }

    .footer-action-btn:hover {
        background: rgba(59, 130, 246, 0.1);
        border-color: rgba(59, 130, 246, 0.3);
        color: var(--primary-600);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.2);
    }

    .footer-action-btn.logout:hover {
        background: rgba(239, 68, 68, 0.1);
        border-color: rgba(239, 68, 68, 0.3);
        color: var(--secondary-600);
        box-shadow: 0 6px 20px rgba(239, 68, 68, 0.2);
    }

    /* Scrollbar Styling */
    .sidebar-nav::-webkit-scrollbar {
        width: 4px;
    }

    .sidebar-nav::-webkit-scrollbar-track {
        background: transparent;
    }

    .sidebar-nav::-webkit-scrollbar-thumb {
        background: rgba(59, 130, 246, 0.3);
        border-radius: 2px;
    }

    .sidebar-nav::-webkit-scrollbar-thumb:hover {
        background: rgba(59, 130, 246, 0.5);
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .dashboard-sidebar {
            width: 100%;
            max-width: 300px;
        }

        .sidebar-header {
            padding: 1rem;
        }

        .nav-item {
            padding: 0.6rem;
        }

        .nav-item-icon {
            width: 32px;
            height: 32px;
        }

        .footer-user {
            padding: 0.6rem;
        }

        .footer-avatar {
            width: 28px;
            height: 28px;
        }

        .footer-action-btn {
            width: 28px;
            height: 28px;
        }

        .company-name {
            font-size: 0.8rem;
        }

        .company-tagline {
            font-size: 0.65rem;
        }
    }

    /* Tablet Responsive */
    @media (max-width: 1024px) and (min-width: 769px) {
        .dashboard-sidebar {
            width: 260px;
        }
    }
</style>

<script>
    // Global variables for mobile sidebar control
    window.mobileOpen = false;

    // Global function to toggle mobile sidebar (called from dashboard)
    window.toggleMobileSidebar = function () {
        window.mobileOpen = !window.mobileOpen;

        // Dispatch custom event that Alpine.js components can listen to
        window.dispatchEvent(new CustomEvent('mobile-sidebar-toggle', {
            detail: { open: window.mobileOpen }
        }));

        // Update body overflow - NO BACKDROP
        if (window.mobileOpen) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }

        // Update hamburger button state
        const hamburger = document.querySelector('.hamburger-lines');
        if (hamburger) {
            if (window.mobileOpen) {
                hamburger.classList.add('active');
            } else {
                hamburger.classList.remove('active');
            }
        }
    };

    // Global function to close mobile sidebar
    window.closeMobileSidebar = function () {
        window.mobileOpen = false;
        document.body.style.overflow = '';

        window.dispatchEvent(new CustomEvent('mobile-sidebar-toggle', {
            detail: { open: false }
        }));

        const hamburger = document.querySelector('.hamburger-lines');
        if (hamburger) {
            hamburger.classList.remove('active');
        }
    };

    // Main Dashboard Sidebar Component
    function dashboardSidebar() {
        return {
            collapsed: false,
            activeItem: 'dashboard',
            mobileOpen: false,

            init() {
                // Set active item based on current route
                this.setActiveItemFromRoute();

                // Listen for mobile sidebar events
                window.addEventListener('mobile-sidebar-toggle', (event) => {
                    this.mobileOpen = event.detail.open;
                });

                // Handle window resize
                window.addEventListener('resize', () => {
                    if (window.innerWidth >= 1024) {
                        this.mobileOpen = false;
                        window.mobileOpen = false;
                        document.body.style.overflow = '';

                        // Reset hamburger
                        const hamburger = document.querySelector('.hamburger-lines');
                        if (hamburger) {
                            hamburger.classList.remove('active');
                        }
                    }
                });

                console.log('✨ Clean Sidebar (No Backdrop) initialized');
            },

            toggleSidebar() {
                // Only work on desktop
                if (window.innerWidth >= 1024) {
                    this.collapsed = !this.collapsed;

                    // Dispatch event to notify other components
                    window.dispatchEvent(new CustomEvent('sidebarToggle', {
                        detail: { collapsed: this.collapsed }
                    }));
                }
            },

            closeMobileSidebar() {
                window.closeMobileSidebar();
            },

            setActiveItem(item) {
                this.activeItem = item;

                // Close mobile sidebar when item is selected on mobile
                if (window.innerWidth < 1024) {
                    this.closeMobileSidebar();
                }
            },

            setActiveItemFromRoute() {
                const currentPath = window.location.pathname;

                if (currentPath.includes('/dashboard')) {
                    this.activeItem = 'dashboard';
                } else if (currentPath.includes('/articles')) {
                    this.activeItem = 'articles';
                } else if (currentPath.includes('/news')) {
                    this.activeItem = 'news';
                } else if (currentPath.includes('/partnerships')) {
                    this.activeItem = 'partnerships';
                } else if (currentPath.includes('/partnership-create')) {
                    this.activeItem = 'partnership-create';
                } else if (currentPath.includes('/media')) {
                    this.activeItem = 'media';
                } else if (currentPath.includes('/users')) {
                    this.activeItem = 'users';
                } else if (currentPath.includes('/settings')) {
                    this.activeItem = 'settings';
                } else if (currentPath.includes('/analytics')) {
                    this.activeItem = 'analytics';
                } else if (currentPath.includes('/backup')) {
                    this.activeItem = 'backup';
                } else if (currentPath.includes('/help')) {
                    this.activeItem = 'help';
                }
            }
        }
    }

    // Logout confirmation function
    function confirmLogout() {
        return confirm('Apakah Anda yakin ingin logout?');
    }

    // Initialize on DOM ready
    document.addEventListener('DOMContentLoaded', function () {
        console.log('🚀 Clean Sidebar Component (No Backdrop) loaded');
    });
</script>