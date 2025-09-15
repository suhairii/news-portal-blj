// PT. Bumi Laksamana Jaya - Landing Page JavaScript

// Fixed Navbar Alpine.js Component Script (for landing page compatibility)
function fixedNavbar() {
    return {
        mobileMenuOpen: false,
        activeSection: 'home',

        navLinks: [
            { name: 'Beranda', href: '{{ route("landing") }}', section: 'home' },
            { name: 'Tentang', href: '#about', section: 'about' },
            { name: 'Divisi', href: '{{ route("divisi") }}', section: 'divisi' },
            { name: 'Unit Usaha', href: '#business', section: 'business' },
            { name: 'Direktur', href: '#director', section: 'director' },
            { name: 'CSR', href: '#csr', section: 'csr' },
            { name: 'Kantor', href: '#office', section: 'office' },
            { name: 'Kontak', href: '#contact', section: 'contact' }
        ],

        init() {
            this.setupIntersectionObserver();
            this.setupMovingElements();
            console.log('🛢️ PT BLJ Oil & Gas Landing Page initialized with glassmorphism theme');
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

        smoothScrollToSection(sectionId, event) {
            event.preventDefault();

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

                    // Easing function for smooth animation
                    const easeInOutCubic = progress < 0.5
                        ? 4 * progress * progress * progress
                        : 1 - Math.pow(-2 * progress + 2, 3) / 2;

                    window.scrollTo(0, startPosition + distance * easeInOutCubic);

                    if (timeElapsed < duration) {
                        requestAnimationFrame(animation);
                    } else {
                        window.scrollTo(0, Math.max(0, offsetTop));
                        this.setActiveSection(sectionId);
                    }
                }

                requestAnimationFrame(animation);
            }
        }
    }
}

// Global smooth scroll function for non-Alpine elements
function smoothScrollTo(sectionId, event) {
    event.preventDefault();

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

// Initialize AOS
AOS.init({
    duration: 1000,
    easing: 'ease-out-cubic',
    once: true,
    offset: 100
});

// Counter animation
function animateCounters() {
    const counters = document.querySelectorAll('[data-count]');
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                counter.textContent = target;
                clearInterval(timer);
            } else {
                counter.textContent = Math.floor(current);
            }
        }, 16);
    });
}

// Intersection Observer for counter animation
const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateCounters();
            counterObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

// Observe the hero section for counter animation
const heroSection = document.querySelector('.hero');
if (heroSection) {
    counterObserver.observe(heroSection);
}

// Form submission
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Simple form validation
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = 'var(--secondary-500)';
                } else {
                    field.style.borderColor = 'rgba(255, 255, 255, 0.3)';
                }
            });

            if (isValid) {
                // Simulate form submission
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;

                submitBtn.innerHTML = '<span>Mengirim...</span> <i class="fas fa-spinner fa-spin"></i>';
                submitBtn.disabled = true;

                setTimeout(() => {
                    alert('Pesan Anda telah berhasil dikirim! Tim kami akan menghubungi Anda segera.');
                    this.reset();
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            } else {
                alert('Mohon lengkapi semua field yang wajib diisi.');
            }
        });
    }
});

// Parallax effect for oil droplets
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const droplets = document.querySelectorAll('.oil-droplet');

    droplets.forEach((droplet, index) => {
        const speed = (index % 3 + 1) * 0.02;
        const direction = index % 2 === 0 ? 1 : -1;
        const currentTransform = droplet.style.transform || '';

        // Only add parallax if it doesn't interfere with existing animation
        if (!currentTransform.includes('translateY')) {
            droplet.style.transform += ` translateY(${scrolled * speed * direction}px)`;
        }
    });
});

// Add loading animation completion
window.addEventListener('load', () => {
    document.body.classList.remove('loading');
});

// Enhanced scroll animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, observerOptions);

// Observe all elements that should fade in
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.glass, .glass-strong, .glass-blue, .glass-red').forEach(el => {
        el.classList.add('fade-in');
        observer.observe(el);
    });
});

// Resize handler
window.addEventListener('resize', () => {
    if (window.innerWidth >= 1025) {
        const navbar = document.querySelector('[x-data="fixedNavbar()"]');
        if (navbar && navbar._x_dataStack) {
            navbar._x_dataStack[0].closeMobileMenu();
        }
    }
});

// Console messages
console.log('🛢️ PT BLJ Oil & Gas Landing Page loaded successfully!');
console.log('✨ Oil droplets floating effect activated!');
console.log('🎯 White background with glassmorphism theme applied!');
console.log('🎨 Montserrat font and oil industry elements integrated!');
console.log('📱 Mobile responsive design optimized!');