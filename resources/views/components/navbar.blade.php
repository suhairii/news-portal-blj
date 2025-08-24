<!-- Fixed Dynamic Navbar with Improved Mobile Design -->
<nav class="glassmorphism-navbar" x-data="fixedNavbar()" x-init="init()">
    <div class="glass-container">
        <!-- Logo Section -->
        <div class="navbar-logo">
            <div class="logo-wrapper">
                <div class="logo-circle">
                    <img src="{{ asset('assets/image/logoblj2.png') }}" alt="PT BLJ Logo" class="logo-image">
                </div>
            </div>
            <div class="company-info">
                <span class="company-name">
                    <span class="company-name-full">PT. Bumi Laksamana Jaya</span>
                    <span class="company-name-short">PT. BLJ</span>
                </span>
            </div>
        </div>

        <!-- Desktop Navigation Links -->
        <div class="navbar-nav desktop-nav">
            <div class="nav-moving-bg" x-ref="movingBg"></div>
            <div class="nav-moving-indicator" x-ref="movingIndicator"></div>

            <!-- Beranda Link -->
            <a href="{{ route('landing') }}" class="nav-link" :class="{ 'nav-active': activeSection === 'home' }"
                @click="handleNavClick({section: 'home', isExternal: {{ $isLandingPage ? 'false' : 'true' }}}, $event)"
                @mouseenter="updateMovingElements($el, true)" @mouseleave="resetMovingElements()">
                <div class="nav-glass-bg"></div>
                <span class="nav-text">Beranda</span>
            </a>

            <!-- Tentang Dropdown -->
            <div class="nav-dropdown-wrapper" x-data="{ dropdownOpen: false }" @mouseenter="dropdownOpen = true"
                @mouseleave="dropdownOpen = false">
                <a href="{{ $isLandingPage ? '#about' : route('landing') . '#about' }}"
                    class="nav-link nav-dropdown-trigger"
                    :class="{ 'nav-active': activeSection === 'about' || activeSection === 'divisi' }"
                    @click="handleNavClick({section: 'about', isExternal: {{ $isLandingPage ? 'false' : 'true' }}}, $event)"
                    @mouseenter="updateMovingElements($el, true)" @mouseleave="resetMovingElements()">
                    <div class="nav-glass-bg"></div>
                    <span class="nav-text">Tentang</span>
                    <i class="fas fa-chevron-down nav-dropdown-icon" :class="{ 'rotate-180': dropdownOpen }"></i>
                </a>

                <!-- Dropdown Menu -->
                <div x-show="dropdownOpen" x-transition:enter="dropdown-enter"
                    x-transition:enter-start="dropdown-enter-start" x-transition:enter-end="dropdown-enter-end"
                    x-transition:leave="dropdown-leave" x-transition:leave-start="dropdown-leave-start"
                    x-transition:leave-end="dropdown-leave-end" class="nav-dropdown-menu">
                    <a href="{{ $isLandingPage ? '#about' : route('landing') . '#about' }}" class="nav-dropdown-item"
                        @click="handleNavClick({section: 'about', isExternal: {{ $isLandingPage ? 'false' : 'true' }}}, $event)">
                        <i class="fas fa-eye nav-dropdown-item-icon"></i>
                        <div>
                            <span class="nav-dropdown-item-title">Visi & Misi</span>
                        </div>
                    </a>
                    <a href="{{ route('divisi') }}" class="nav-dropdown-item">
                        <i class="fas fa-sitemap nav-dropdown-item-icon"></i>
                        <div>
                            <span class="nav-dropdown-item-title">Divisi Perusahaan</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Unit Usaha Link -->
            <a href="{{ $isLandingPage ? '#business' : route('landing') . '#business' }}" class="nav-link"
                :class="{ 'nav-active': activeSection === 'business' }"
                @click="handleNavClick({section: 'business', isExternal: {{ $isLandingPage ? 'false' : 'true' }}}, $event)"
                @mouseenter="updateMovingElements($el, true)" @mouseleave="resetMovingElements()" x-ref="link-business">
                <div class="nav-glass-bg"></div>
                <span class="nav-text">Unit Usaha</span>
            </a>

            <!-- Direktur Link -->
            <a href="{{ $isLandingPage ? '#director' : route('landing') . '#director' }}" class="nav-link"
                :class="{ 'nav-active': activeSection === 'director' }"
                @click="handleNavClick({section: 'director', isExternal: {{ $isLandingPage ? 'false' : 'true' }}}, $event)"
                @mouseenter="updateMovingElements($el, true)" @mouseleave="resetMovingElements()" x-ref="link-director">
                <div class="nav-glass-bg"></div>
                <span class="nav-text">Direktur</span>
            </a>

            <!-- Artikel Dropdown (Previously CSR) -->
            <div class="nav-dropdown-wrapper" x-data="{ dropdownOpen: false }" @mouseenter="dropdownOpen = true"
                @mouseleave="dropdownOpen = false">
                <a href="#" class="nav-link nav-dropdown-trigger"
                    :class="{ 'nav-active': activeSection === 'artikel' || activeSection === 'berita' || activeSection === 'csr' }"
                    @click.prevent="" @mouseenter="updateMovingElements($el, true)" @mouseleave="resetMovingElements()">
                    <div class="nav-glass-bg"></div>
                    <span class="nav-text">Artikel</span>
                    <i class="fas fa-chevron-down nav-dropdown-icon" :class="{ 'rotate-180': dropdownOpen }"></i>
                </a>

                <!-- Dropdown Menu -->
                <div x-show="dropdownOpen" x-transition:enter="dropdown-enter"
                    x-transition:enter-start="dropdown-enter-start" x-transition:enter-end="dropdown-enter-end"
                    x-transition:leave="dropdown-leave" x-transition:leave-start="dropdown-leave-start"
                    x-transition:leave-end="dropdown-leave-end" class="nav-dropdown-menu">
                    <a href="#" class="nav-dropdown-item" @click.prevent="">
                        <i class="fas fa-newspaper nav-dropdown-item-icon"></i>
                        <div>
                            <span class="nav-dropdown-item-title">Artikel dan Berita</span>
                        </div>
                    </a>
                    <a href="{{ $isLandingPage ? '#csr' : route('landing') . '#csr' }}" class="nav-dropdown-item"
                        @click="handleNavClick({section: 'csr', isExternal: {{ $isLandingPage ? 'false' : 'true' }}}, $event)">
                        <i class="fas fa-heart nav-dropdown-item-icon"></i>
                        <div>
                            <span class="nav-dropdown-item-title">CSR</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Kantor Link -->
            <a href="{{ $isLandingPage ? '#office' : route('landing') . '#office' }}" class="nav-link"
                :class="{ 'nav-active': activeSection === 'office' }"
                @click="handleNavClick({section: 'office', isExternal: {{ $isLandingPage ? 'false' : 'true' }}}, $event)"
                @mouseenter="updateMovingElements($el, true)" @mouseleave="resetMovingElements()" x-ref="link-office">
                <div class="nav-glass-bg"></div>
                <span class="nav-text">Kantor</span>
            </a>

            <!-- Kontak Link -->
            <a href="{{ $isLandingPage ? '#contact' : route('landing') . '#contact' }}" class="nav-link"
                :class="{ 'nav-active': activeSection === 'contact' }"
                @click="handleNavClick({section: 'contact', isExternal: {{ $isLandingPage ? 'false' : 'true' }}}, $event)"
                @mouseenter="updateMovingElements($el, true)" @mouseleave="resetMovingElements()" x-ref="link-contact">
                <div class="nav-glass-bg"></div>
                <span class="nav-text">Kontak</span>
            </a>
        </div>

        <!-- Mobile Menu Toggle -->
        <div class="mobile-toggle">
            <button @click="toggleMobileMenu()" class="mobile-btn glass"
                :class="{ 'mobile-btn-active': mobileMenuOpen }">
                <div class="mobile-glass-bg"></div>
                <div class="hamburger">
                    <span class="hamburger-line" :class="{ 'line-1-active': mobileMenuOpen }"></span>
                    <span class="hamburger-line" :class="{ 'line-2-active': mobileMenuOpen }"></span>
                    <span class="hamburger-line" :class="{ 'line-3-active': mobileMenuOpen }"></span>
                </div>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-transition:enter="mobile-enter" x-transition:enter-start="mobile-enter-start"
        x-transition:enter-end="mobile-enter-end" x-transition:leave="mobile-leave"
        x-transition:leave-start="mobile-leave-start" x-transition:leave-end="mobile-leave-end"
        class="mobile-menu glass-strong" @click.away="closeMobileMenu()">

        <!-- Mobile Header with Logo -->
        <div class="mobile-header">
            <div class="mobile-logo">
                <img src="{{ asset('assets/image/logoblj2.png') }}" alt="PT BLJ Logo" class="mobile-logo-image">
                <div class="mobile-company-info">
                    <span class="mobile-company-name">PT. Bumi Laksamana Jaya</span>
                    <span class="mobile-company-tagline">Your Trusted Partner</span>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Links -->
        <div class="mobile-nav">
            <!-- Beranda -->
            <a href="{{ route('landing') }}"
                @click="handleMobileNavClick({section: 'home', isExternal: {{ $isLandingPage ? 'false' : 'true' }}}, $event); closeMobileMenu()"
                class="mobile-link" :class="{ 'mobile-active': activeSection === 'home' }">
                <div class="mobile-link-content">
                    <div class="mobile-link-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="mobile-link-text">
                        <span class="mobile-text-primary">Beranda</span>
                        <span class="mobile-text-secondary">Halaman Utama</span>
                    </div>
                    <div class="mobile-link-arrow">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div class="mobile-indicator" :class="{ 'mobile-indicator-show': activeSection === 'home' }"></div>
            </a>

            <!-- Tentang Submenu -->
            <div x-data="{ mobileDropdownOpen: false }" class="mobile-dropdown-container">
                <button @click="mobileDropdownOpen = !mobileDropdownOpen" class="mobile-link mobile-dropdown-trigger"
                    :class="{ 'mobile-active': activeSection === 'about' || activeSection === 'divisi', 'mobile-dropdown-expanded': mobileDropdownOpen }">
                    <div class="mobile-link-content">
                        <div class="mobile-link-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div class="mobile-link-text">
                            <span class="mobile-text-primary">Tentang</span>
                            <span class="mobile-text-secondary">Profil Perusahaan</span>
                        </div>
                        <div class="mobile-link-arrow">
                            <i class="fas fa-chevron-down mobile-dropdown-icon"
                                :class="{ 'rotate-180': mobileDropdownOpen }"></i>
                        </div>
                    </div>
                    <div class="mobile-indicator"
                        :class="{ 'mobile-indicator-show': activeSection === 'about' || activeSection === 'divisi' }">
                    </div>
                </button>

                <div x-show="mobileDropdownOpen" x-transition:enter="submenu-enter"
                    x-transition:enter-start="submenu-enter-start" x-transition:enter-end="submenu-enter-end"
                    x-transition:leave="submenu-leave" x-transition:leave-start="submenu-leave-start"
                    x-transition:leave-end="submenu-leave-end" class="mobile-submenu">
                    <a href="{{ $isLandingPage ? '#about' : route('landing') . '#about' }}"
                        @click="handleMobileNavClick({section: 'about', isExternal: {{ $isLandingPage ? 'false' : 'true' }}}, $event); closeMobileMenu()"
                        class="mobile-submenu-item">
                        <div class="mobile-submenu-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="mobile-submenu-text">
                            <span class="mobile-submenu-title">Visi & Misi</span>
                            <span class="mobile-submenu-desc">Tujuan dan nilai perusahaan</span>
                        </div>
                    </a>
                    <a href="{{ route('divisi') }}" @click="closeMobileMenu()" class="mobile-submenu-item">
                        <div class="mobile-submenu-icon">
                            <i class="fas fa-sitemap"></i>
                        </div>
                        <div class="mobile-submenu-text">
                            <span class="mobile-submenu-title">Divisi Perusahaan</span>
                            <span class="mobile-submenu-desc">Struktur organisasi</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Unit Usaha -->
            <a href="{{ $isLandingPage ? '#business' : route('landing') . '#business' }}"
                @click="handleMobileNavClick({section: 'business', isExternal: {{ $isLandingPage ? 'false' : 'true' }}}, $event); closeMobileMenu()"
                class="mobile-link" :class="{ 'mobile-active': activeSection === 'business' }">
                <div class="mobile-link-content">
                    <div class="mobile-link-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="mobile-link-text">
                        <span class="mobile-text-primary">Unit Usaha</span>
                        <span class="mobile-text-secondary">Bidang layanan kami</span>
                    </div>
                    <div class="mobile-link-arrow">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div class="mobile-indicator" :class="{ 'mobile-indicator-show': activeSection === 'business' }"></div>
            </a>

            <!-- Direktur -->
            <a href="{{ $isLandingPage ? '#director' : route('landing') . '#director' }}"
                @click="handleMobileNavClick({section: 'director', isExternal: {{ $isLandingPage ? 'false' : 'true' }}}, $event); closeMobileMenu()"
                class="mobile-link" :class="{ 'mobile-active': activeSection === 'director' }">
                <div class="mobile-link-content">
                    <div class="mobile-link-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="mobile-link-text">
                        <span class="mobile-text-primary">Direktur</span>
                        <span class="mobile-text-secondary">Pimpinan perusahaan</span>
                    </div>
                    <div class="mobile-link-arrow">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div class="mobile-indicator" :class="{ 'mobile-indicator-show': activeSection === 'director' }"></div>
            </a>

            <!-- Artikel Submenu (Previously CSR) -->
            <div x-data="{ mobileArtikelDropdownOpen: false }" class="mobile-dropdown-container">
                <button @click="mobileArtikelDropdownOpen = !mobileArtikelDropdownOpen"
                    class="mobile-link mobile-dropdown-trigger"
                    :class="{ 'mobile-active': activeSection === 'artikel' || activeSection === 'berita' || activeSection === 'csr', 'mobile-dropdown-expanded': mobileArtikelDropdownOpen }">
                    <div class="mobile-link-content">
                        <div class="mobile-link-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="mobile-link-text">
                            <span class="mobile-text-primary">Artikel</span>
                            <span class="mobile-text-secondary">Berita dan informasi</span>
                        </div>
                        <div class="mobile-link-arrow">
                            <i class="fas fa-chevron-down mobile-dropdown-icon"
                                :class="{ 'rotate-180': mobileArtikelDropdownOpen }"></i>
                        </div>
                    </div>
                    <div class="mobile-indicator"
                        :class="{ 'mobile-indicator-show': activeSection === 'artikel' || activeSection === 'berita' || activeSection === 'csr' }">
                    </div>
                </button>

                <div x-show="mobileArtikelDropdownOpen" x-transition:enter="submenu-enter"
                    x-transition:enter-start="submenu-enter-start" x-transition:enter-end="submenu-enter-end"
                    x-transition:leave="submenu-leave" x-transition:leave-start="submenu-leave-start"
                    x-transition:leave-end="submenu-leave-end" class="mobile-submenu">
                    <a href="#" @click.prevent="closeMobileMenu()" class="mobile-submenu-item">
                        <div class="mobile-submenu-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="mobile-submenu-text">
                            <span class="mobile-submenu-title">Artikel dan Berita</span>
                            <span class="mobile-submenu-desc">Informasi terkini perusahaan</span>
                        </div>
                    </a>
                    <a href="{{ $isLandingPage ? '#csr' : route('landing') . '#csr' }}"
                        @click="handleMobileNavClick({section: 'csr', isExternal: {{ $isLandingPage ? 'false' : 'true' }}}, $event); closeMobileMenu()"
                        class="mobile-submenu-item">
                        <div class="mobile-submenu-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="mobile-submenu-text">
                            <span class="mobile-submenu-title">CSR</span>
                            <span class="mobile-submenu-desc">Tanggung jawab sosial</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Kantor -->
            <a href="{{ $isLandingPage ? '#office' : route('landing') . '#office' }}"
                @click="handleMobileNavClick({section: 'office', isExternal: {{ $isLandingPage ? 'false' : 'true' }}}, $event); closeMobileMenu()"
                class="mobile-link" :class="{ 'mobile-active': activeSection === 'office' }">
                <div class="mobile-link-content">
                    <div class="mobile-link-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="mobile-link-text">
                        <span class="mobile-text-primary">Kantor</span>
                        <span class="mobile-text-secondary">Lokasi kantor kami</span>
                    </div>
                    <div class="mobile-link-arrow">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div class="mobile-indicator" :class="{ 'mobile-indicator-show': activeSection === 'office' }"></div>
            </a>

            <!-- Kontak -->
            <a href="{{ $isLandingPage ? '#contact' : route('landing') . '#contact' }}"
                @click="handleMobileNavClick({section: 'contact', isExternal: {{ $isLandingPage ? 'false' : 'true' }}}, $event); closeMobileMenu()"
                class="mobile-link" :class="{ 'mobile-active': activeSection === 'contact' }">
                <div class="mobile-link-content">
                    <div class="mobile-link-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="mobile-link-text">
                        <span class="mobile-text-primary">Kontak</span>
                        <span class="mobile-text-secondary">Hubungi kami</span>
                    </div>
                    <div class="mobile-link-arrow">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div class="mobile-indicator" :class="{ 'mobile-indicator-show': activeSection === 'contact' }"></div>
            </a>
        </div>

        <!-- Mobile Footer -->
        <div class="mobile-footer">
            <div class="mobile-footer-text">
                <span>© 2024 PT. Bumi Laksamana Jaya</span>
                <span>All rights reserved</span>
            </div>
        </div>
    </div>

    <!-- Mobile Backdrop -->
    <div x-show="mobileMenuOpen" x-transition:enter="backdrop-enter" x-transition:enter-start="backdrop-enter-start"
        x-transition:enter-end="backdrop-enter-end" x-transition:leave="backdrop-leave"
        x-transition:leave-start="backdrop-leave-start" x-transition:leave-end="backdrop-leave-end"
        class="mobile-backdrop" @click="closeMobileMenu()"></div>
</nav>

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
        --gray-50: #f9fafb;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-300: #d1d5db;
        --gray-400: #9ca3af;
        --gray-500: #6b7280;
        --Gray-600: #4b5563;
        --gray-700: #374151;
        --gray-800: #1f2937;
        --gray-900: #111827;
    }

    /* NAVBAR POSITIONING */
    .glassmorphism-navbar {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1000;
        max-width: calc(100vw - 40px);
        width: auto;
        padding: 0 20px;
        overflow: visible !important;
    }

    .glass-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.75rem 1.5rem;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(40px);
        -webkit-backdrop-filter: blur(40px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 24px;
        box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.15),
            0 8px 40px rgba(0, 0, 0, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        overflow: visible !important;
    }

    /* LOGO STYLES */
    .navbar-logo {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        z-index: 10;
    }

    .logo-wrapper {
        position: relative;
    }

    .logo-circle {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow:
            0 8px 25px rgba(59, 130, 246, 0.3),
            0 4px 15px rgba(59, 130, 246, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.8);
        overflow: hidden;
    }

    .logo-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 50%;
    }

    .logo-text {
        font-weight: 800;
        font-size: 1.1rem;
        color: white;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .company-info {
        display: flex;
        flex-direction: column;
    }

    .company-name-full {
        font-weight: 700;
        font-size: 1rem;
        color: var(--gray-800);
        line-height: 1.2;
    }

    .company-name-short {
        display: none;
    }

    /* DESKTOP NAVIGATION */
    .navbar-nav {
        position: relative;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        overflow: visible !important;
    }

    .desktop-nav {
        display: flex;
    }

    .nav-moving-bg,
    .nav-moving-indicator {
        position: absolute;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        pointer-events: none;
        opacity: 0;
    }

    .nav-moving-bg {
        height: 44px;
        background: rgba(59, 130, 246, 0.1);
        border-radius: 14px;
        backdrop-filter: blur(20px);
        border: 1px solid rgba(59, 130, 246, 0.2);
    }

    .nav-moving-indicator {
        height: 3px;
        bottom: -8px;
        background: linear-gradient(90deg, var(--primary-500), var(--primary-600));
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.4);
    }

    .nav-moving-bg.active,
    .nav-moving-indicator.active {
        opacity: 1;
    }

    .nav-link {
        position: relative;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.25rem;
        text-decoration: none;
        color: var(--gray-700);
        font-weight: 600;
        font-size: 0.9rem;
        border-radius: 14px;
        transition: all 0.3s ease;
        z-index: 2;
    }

    .nav-link:hover {
        color: var(--primary-600);
        transform: translateY(-1px);
    }

    .nav-link.nav-active {
        color: var(--primary-600);
    }

    /* CTA BUTTON */
    .navbar-cta {
        display: flex;
        align-items: center;
    }

    .cta-btn {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
        color: white;
        text-decoration: none;
        border-radius: 16px;
        font-weight: 700;
        font-size: 0.9rem;
        box-shadow:
            0 8px 25px rgba(59, 130, 246, 0.3),
            0 4px 15px rgba(59, 130, 246, 0.2);
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .cta-btn:hover {
        transform: translateY(-2px);
        box-shadow:
            0 12px 35px rgba(59, 130, 246, 0.4),
            0 6px 20px rgba(59, 130, 246, 0.3);
    }

    .cta-icon svg {
        width: 18px;
        height: 18px;
    }

    /* MOBILE TOGGLE */
    .mobile-toggle {
        display: none;
    }

    .mobile-btn {
        position: relative;
        padding: 0.75rem;
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 12px;
        backdrop-filter: blur(20px);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .mobile-btn:hover,
    .mobile-btn-active {
        background: rgba(59, 130, 246, 0.1);
        border-color: rgba(59, 130, 246, 0.3);
    }

    .hamburger {
        display: flex;
        flex-direction: column;
        gap: 4px;
        width: 24px;
        height: 16px;
    }

    .hamburger-line {
        width: 100%;
        height: 2px;
        background: var(--gray-700);
        border-radius: 2px;
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        transform-origin: center;
    }

    .line-1-active {
        transform: translateY(6px) rotate(45deg);
    }

    .line-2-active {
        opacity: 0;
        transform: scaleX(0);
    }

    .line-3-active {
        transform: translateY(-6px) rotate(-45deg);
    }

    /* MOBILE MENU */
    .mobile-menu {
        position: fixed;
        top: 0;
        right: 0;
        height: 100vh;
        width: 90%;
        max-width: 400px;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(40px);
        -webkit-backdrop-filter: blur(40px);
        border-left: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: -20px 0 60px rgba(0, 0, 0, 0.15);
        z-index: 1001;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
    }

    /* MOBILE HEADER */
    .mobile-header {
        padding: 2rem 1.5rem 1.5rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(99, 102, 241, 0.05));
    }

    .mobile-logo {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .mobile-logo-image {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: contain;
        border: 3px solid rgba(59, 130, 246, 0.2);
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
    }

    .mobile-company-info {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .mobile-company-name {
        font-weight: 800;
        font-size: 1.1rem;
        color: var(--gray-800);
        line-height: 1.2;
    }

    .mobile-company-tagline {
        font-size: 0.85rem;
        color: var(--primary-600);
        font-weight: 600;
    }

    /* MOBILE NAVIGATION */
    .mobile-nav {
        flex: 1;
        padding: 1rem 0;
        overflow-y: auto;
    }

    .mobile-link {
        position: relative;
        display: block;
        margin: 0.5rem 1.5rem;
        padding: 0;
        text-decoration: none;
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(20px);
    }

    .mobile-link:hover,
    .mobile-link.mobile-active {
        background: rgba(59, 130, 246, 0.08);
        border-color: rgba(59, 130, 246, 0.2);
        transform: translateY(-1px);
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.1);
    }

    .mobile-link-content {
        display: flex;
        align-items: center;
        padding: 1.25rem 1.5rem;
        gap: 1rem;
    }

    .mobile-link-icon {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(99, 102, 241, 0.1));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(59, 130, 246, 0.15);
        flex-shrink: 0;
    }

    .mobile-link-icon i {
        font-size: 1.1rem;
        color: var(--primary-600);
    }

    .mobile-link-text {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .mobile-text-primary {
        font-weight: 700;
        font-size: 1rem;
        color: var(--gray-800);
        line-height: 1.2;
    }

    .mobile-text-secondary {
        font-size: 0.8rem;
        color: var(--gray-600);
        line-height: 1.3;
    }

    .mobile-link-arrow {
        flex-shrink: 0;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .mobile-link-arrow i {
        font-size: 0.8rem;
        color: var(--gray-400);
        transition: all 0.3s ease;
    }

    .mobile-link:hover .mobile-link-arrow i,
    .mobile-link.mobile-active .mobile-link-arrow i {
        color: var(--primary-600);
        transform: translateX(2px);
    }

    .mobile-indicator {
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(180deg, var(--primary-500), var(--primary-600));
        border-radius: 0 4px 4px 0;
        opacity: 0;
        transform: scaleY(0);
        transition: all 0.3s ease;
    }

    .mobile-indicator-show {
        opacity: 1;
        transform: scaleY(1);
    }

    /* MOBILE DROPDOWN */
    .mobile-dropdown-container {
        margin: 0.5rem 1.5rem;
    }

    .mobile-dropdown-trigger {
        background: rgba(255, 255, 255, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 16px;
        margin: 0;
        width: 100%;
        text-align: left;
        cursor: pointer;
    }

    .mobile-dropdown-trigger:hover,
    .mobile-dropdown-trigger.mobile-active,
    .mobile-dropdown-expanded {
        background: rgba(59, 130, 246, 0.08);
        border-color: rgba(59, 130, 246, 0.2);
    }

    .mobile-dropdown-icon {
        transition: transform 0.3s ease;
    }

    .mobile-submenu {
        margin-top: 0.75rem;
        padding: 0 1rem;
        border-left: 3px solid rgba(59, 130, 246, 0.2);
        background: rgba(59, 130, 246, 0.02);
        border-radius: 0 12px 12px 0;
    }

    .mobile-submenu-item {
        display: flex;
        align-items: center;
        padding: 1rem;
        margin: 0.5rem 0;
        text-decoration: none;
        border-radius: 12px;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.7);
        border: 1px solid rgba(255, 255, 255, 0.8);
        gap: 1rem;
    }

    .mobile-submenu-item:hover {
        background: rgba(59, 130, 246, 0.05);
        border-color: rgba(59, 130, 246, 0.15);
        transform: translateX(4px);
    }

    .mobile-submenu-icon {
        width: 36px;
        height: 36px;
        background: rgba(59, 130, 246, 0.1);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .mobile-submenu-icon i {
        font-size: 0.9rem;
        color: var(--primary-600);
    }

    .mobile-submenu-text {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 0.2rem;
    }

    .mobile-submenu-title {
        font-weight: 600;
        font-size: 0.9rem;
        color: var(--gray-800);
    }

    .mobile-submenu-desc {
        font-size: 0.75rem;
        color: var(--gray-600);
    }

    /* MOBILE CTA */
    .mobile-cta {
        padding: 1.5rem;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
    }

    .mobile-cta-btn {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        padding: 1.5rem;
        background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
        border-radius: 20px;
        text-decoration: none;
        color: white;
        box-shadow:
            0 12px 35px rgba(59, 130, 246, 0.3),
            0 6px 20px rgba(59, 130, 246, 0.2);
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .mobile-cta-btn:hover {
        transform: translateY(-2px);
        box-shadow:
            0 16px 45px rgba(59, 130, 246, 0.4),
            0 8px 25px rgba(59, 130, 246, 0.3);
    }

    .mobile-cta-content {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .mobile-cta-icon {
        width: 48px;
        height: 48px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .mobile-cta-icon i {
        font-size: 1.1rem;
        color: white;
    }

    .mobile-cta-text {
        display: flex;
        flex-direction: column;
        gap: 0.2rem;
    }

    .mobile-cta-title {
        font-weight: 700;
        font-size: 1.1rem;
        line-height: 1.2;
    }

    .mobile-cta-subtitle {
        font-size: 0.8rem;
        opacity: 0.9;
    }

    .mobile-cta-arrow {
        width: 32px;
        height: 32px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .mobile-cta-btn:hover .mobile-cta-arrow {
        transform: translateX(4px);
    }

    .mobile-cta-arrow i {
        font-size: 0.9rem;
        color: white;
    }

    /* MOBILE FOOTER */
    .mobile-footer {
        padding: 1.5rem;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        background: rgba(0, 0, 0, 0.02);
    }

    .mobile-footer-text {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.25rem;
        font-size: 0.75rem;
        color: var(--gray-500);
        text-align: center;
    }

    /* MOBILE BACKDROP */
    .mobile-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(4px);
        z-index: 1000;
    }

    /* DROPDOWN STYLES (keeping original desktop dropdown) */
    .nav-dropdown-wrapper {
        position: relative;
        z-index: 1010;
    }

    .nav-dropdown-trigger {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .nav-dropdown-icon {
        font-size: 0.75rem;
        transition: transform 0.3s ease;
    }

    .rotate-180 {
        transform: rotate(180deg);
    }

    .nav-dropdown-menu {
        position: absolute;
        top: calc(100% + 15px);
        left: 50%;
        transform: translateX(-50%);
        min-width: 300px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(40px);
        -webkit-backdrop-filter: blur(40px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 24px;
        box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.2),
            0 8px 40px rgba(0, 0, 0, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        padding: 1.5rem;
        z-index: 1020;
        overflow: visible;
    }

    .nav-dropdown-menu::before {
        content: '';
        position: absolute;
        top: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 0;
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        border-bottom: 8px solid rgba(255, 255, 255, 0.95);
        filter: drop-shadow(0 -2px 4px rgba(0, 0, 0, 0.1));
    }

    .nav-dropdown-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1.25rem;
        border-radius: 16px;
        text-decoration: none;
        color: var(--gray-700);
        transition: all 0.3s ease;
        margin-bottom: 0.75rem;
        background: rgba(255, 255, 255, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.4);
    }

    .nav-dropdown-item:last-child {
        margin-bottom: 0;
    }

    .nav-dropdown-item:hover {
        background: rgba(59, 130, 246, 0.15);
        color: var(--primary-600);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.2);
        border-color: rgba(59, 130, 246, 0.3);
    }

    .nav-dropdown-item-icon {
        width: 24px;
        height: 24px;
        color: var(--primary-500);
        margin-top: 0.1rem;
        font-size: 1.1rem;
    }

    .nav-dropdown-item-title {
        display: block;
        font-weight: 700;
        font-size: 1rem;
        margin-bottom: 0.3rem;
        color: var(--gray-800);
    }

    /* TRANSITIONS */
    .mobile-enter {
        transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .mobile-enter-start {
        transform: translateX(100%);
    }

    .mobile-enter-end {
        transform: translateX(0);
    }

    .mobile-leave {
        transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .mobile-leave-start {
        transform: translateX(0);
    }

    .mobile-leave-end {
        transform: translateX(100%);
    }

    .backdrop-enter {
        transition: all 0.3s ease;
    }

    .backdrop-enter-start {
        opacity: 0;
    }

    .backdrop-enter-end {
        opacity: 1;
    }

    .backdrop-leave {
        transition: all 0.3s ease;
    }

    .backdrop-leave-start {
        opacity: 1;
    }

    .backdrop-leave-end {
        opacity: 0;
    }

    .dropdown-enter {
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .dropdown-enter-start {
        opacity: 0;
        transform: translateX(-50%) translateY(-15px) scale(0.95);
        filter: blur(4px);
    }

    .dropdown-enter-end {
        opacity: 1;
        transform: translateX(-50%) translateY(0) scale(1);
        filter: blur(0px);
    }

    .dropdown-leave {
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .dropdown-leave-start {
        opacity: 1;
        transform: translateX(-50%) translateY(0) scale(1);
        filter: blur(0px);
    }

    .dropdown-leave-end {
        opacity: 0;
        transform: translateX(-50%) translateY(-15px) scale(0.95);
        filter: blur(4px);
    }

    .submenu-enter {
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .submenu-enter-start {
        opacity: 0;
        transform: translateY(-10px);
        max-height: 0;
    }

    .submenu-enter-end {
        opacity: 1;
        transform: translateY(0);
        max-height: 300px;
    }

    .submenu-leave {
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .submenu-leave-start {
        opacity: 1;
        transform: translateY(0);
        max-height: 300px;
    }

    .submenu-leave-end {
        opacity: 0;
        transform: translateY(-10px);
        max-height: 0;
    }

    /* RESPONSIVE BREAKPOINTS */
    @media (max-width: 1024px) {

        .desktop-nav,
        .navbar-cta {
            display: none;
        }

        .mobile-toggle {
            display: block;
        }

        .company-name-full {
            display: none;
        }

        .company-name-short {
            display: inline;
            font-weight: 700;
            font-size: 1rem;
            color: var(--gray-800);
        }
    }

    @media (max-width: 768px) {
        .glassmorphism-navbar {
            top: 15px;
            max-width: calc(100vw - 30px);
            padding: 0 15px;
        }

        .glass-container {
            padding: 0.625rem 1.25rem;
        }

        .logo-circle {
            width: 42px;
            height: 42px;
        }

        .company-name-short {
            font-size: 0.9rem;
        }

        .mobile-menu {
            width: 95%;
        }

        .mobile-header {
            padding: 1.5rem 1.25rem 1.25rem;
        }

        .mobile-logo-image {
            width: 50px;
            height: 50px;
        }

        .mobile-company-name {
            font-size: 1rem;
        }

        .mobile-link {
            margin: 0.4rem 1.25rem;
        }

        .mobile-link-content {
            padding: 1rem 1.25rem;
        }

        .mobile-link-icon {
            width: 42px;
            height: 42px;
        }

        .mobile-cta {
            padding: 1.25rem;
        }

        .mobile-cta-btn {
            padding: 1.25rem;
        }

        .mobile-cta-icon {
            width: 42px;
            height: 42px;
        }
    }

    @media (max-width: 480px) {
        .glassmorphism-navbar {
            top: 10px;
            max-width: calc(100vw - 20px);
            padding: 0 10px;
        }

        .glass-container {
            padding: 0.5rem 1rem;
        }

        .logo-circle {
            width: 38px;
            height: 38px;
        }

        .company-name-short {
            font-size: 0.85rem;
        }

        .mobile-menu {
            width: 100%;
        }

        .mobile-link-content {
            padding: 0.875rem 1rem;
            gap: 0.75rem;
        }

        .mobile-link-icon {
            width: 38px;
            height: 38px;
        }

        .mobile-text-primary {
            font-size: 0.95rem;
        }

        .mobile-text-secondary {
            font-size: 0.75rem;
        }
    }
</style>

<script>
    // Fixed Navbar Alpine.js Component Script
    function fixedNavbar() {
        return {
            mobileMenuOpen: false,
            activeSection: '{{ $currentPage ?? "home" }}',
            isLandingPage: {{ $isLandingPage ? 'true' : 'false' }},

            init() {
                if (this.isLandingPage) {
                    this.setupIntersectionObserver();
                }
                this.setupMovingElements();
                console.log('🛢️ PT BLJ Navbar with Improved Mobile Design initialized');
            },

            toggleMobileMenu() {
                this.mobileMenuOpen = !this.mobileMenuOpen;

                if (this.mobileMenuOpen) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            },

            closeMobileMenu() {
                this.mobileMenuOpen = false;
                document.body.style.overflow = '';
            },

            setActiveSection(section) {
                this.activeSection = section;
                this.updateMovingElementsForActiveSection();
            },

            setupIntersectionObserver() {
                if (!this.isLandingPage) return;

                const sections = document.querySelectorAll('section[id]');

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && entry.intersectionRatio > 0.3) {
                            this.activeSection = entry.target.id;
                            this.updateMovingElementsForActiveSection();
                        }
                    });
                }, {
                    threshold: [0.2, 0.3, 0.5],
                    rootMargin: '-20% 0px -50% 0px'
                });

                sections.forEach(section => observer.observe(section));
            },

            setupMovingElements() {
                this.$nextTick(() => {
                    this.updateMovingElementsForActiveSection();
                });
            },

            updateMovingElementsForActiveSection() {
                const activeLink = this.$refs[`link-${this.activeSection}`];
                if (activeLink && this.$refs.movingBg && this.$refs.movingIndicator) {
                    this.updateMovingElements(activeLink, true);
                }
            },

            updateMovingElements(element, isActive = false) {
                if (!this.$refs.movingBg || !this.$refs.movingIndicator) return;

                const rect = element.getBoundingClientRect();
                const navRect = element.closest('.navbar-nav').getBoundingClientRect();

                const left = rect.left - navRect.left;
                const width = rect.width;

                // Update moving background
                this.$refs.movingBg.style.left = `${left}px`;
                this.$refs.movingBg.style.width = `${width}px`;
                this.$refs.movingBg.classList.add('active');

                // Update moving indicator
                this.$refs.movingIndicator.style.left = `${left + (width * 0.2)}px`;
                this.$refs.movingIndicator.style.width = `${width * 0.6}px`;
                this.$refs.movingIndicator.classList.add('active');
            },

            resetMovingElements() {
                // When hovering out, return to active section
                this.updateMovingElementsForActiveSection();
            },

            handleNavClick(link, event) {
                if (this.isLandingPage && !link.isExternal) {
                    event.preventDefault();
                    this.smoothScrollToSection(link.section, event);
                }
            },

            handleMobileNavClick(link, event) {
                if (this.isLandingPage && !link.isExternal) {
                    event.preventDefault();
                    this.smoothScrollToSection(link.section, event);
                }
            },

            smoothScrollToSection(sectionId, event) {
                if (!this.isLandingPage) return;

                const target = document.getElementById(sectionId);
                if (target) {
                    const offsetTop = target.offsetTop - 120;
                    const startPosition = window.pageYOffset;
                    const distance = Math.max(0, offsetTop) - startPosition;
                    const duration = Math.abs(distance) > 1000 ? 1200 : 800;
                    let startTime = null;

                    function animation(currentTime) {
                        if (startTime === null) startTime = currentTime;
                        const timeElapsed = currentTime - startTime;
                        const progress = Math.min(timeElapsed / duration, 1);

                        const easeInOutCubic = progress < 0.5
                            ? 4 * progress * progress * progress
                            : 1 - Math.pow(-2 * progress + 2, 3) / 2;

                        window.scrollTo(0, startPosition + distance * easeInOutCubic);

                        if (timeElapsed < duration) {
                            requestAnimationFrame(animation);
                        } else {
                            window.scrollTo(0, Math.max(0, offsetTop));
                        }
                    }

                    requestAnimationFrame(animation);
                }
            }
        }
    }
</script>