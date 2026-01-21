<!-- Navigation Bar -->
<nav id="mainNavbar" class="fixed w-full top-0 left-0 z-50 transition-all duration-500">
    <div class="container mx-auto px-6 py-5 transition-all duration-500" id="navContainer">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="<?= BASE_URL ?>" class="flex items-center space-x-3 group z-50 relative">
                <div class="w-10 h-10 rounded-full bg-custom-accent/20 flex items-center justify-center group-hover:bg-custom-accent/30 transition-all duration-300">
                    <i class="fas fa-leaf text-xl text-custom-accent"></i>
                </div>
                <span class="text-2xl font-display font-bold tracking-tight text-white group-hover:text-custom-accent transition-colors duration-300">
                    Explore<span class="text-custom-accent">Kaltim</span>
                </span>
            </a>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="<?= BASE_URL ?>" class="nav-link text-white hover:text-custom-accent font-medium text-sm uppercase tracking-wider transition-all duration-300 relative py-2">
                    Beranda
                    <span class="nav-underline absolute bottom-0 left-0 w-0 h-0.5 bg-custom-accent transition-all duration-300"></span>
                </a>
                <a href="#tentang" class="nav-link text-gray-300 hover:text-white font-medium text-sm uppercase tracking-wider transition-all duration-300 relative py-2">
                    Tentang
                    <span class="nav-underline absolute bottom-0 left-0 w-0 h-0.5 bg-custom-accent transition-all duration-300"></span>
                </a>
                <a href="<?= BASE_URL ?>destinasi" class="nav-link text-gray-300 hover:text-white font-medium text-sm uppercase tracking-wider transition-all duration-300 relative py-2">
                    Destinasi
                    <span class="nav-underline absolute bottom-0 left-0 w-0 h-0.5 bg-custom-accent transition-all duration-300"></span>
                </a>
                <a href="#galeri" class="nav-link text-gray-300 hover:text-white font-medium text-sm uppercase tracking-wider transition-all duration-300 relative py-2">
                    Galeri
                    <span class="nav-underline absolute bottom-0 left-0 w-0 h-0.5 bg-custom-accent transition-all duration-300"></span>
                </a>
            </div>
            
            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="md:hidden focus:outline-none text-white z-50 relative w-10 h-10 flex items-center justify-center" aria-label="Toggle Menu">
                <i id="menuIcon" class="fas fa-bars text-2xl transition-transform duration-300"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu Overlay -->
<div id="mobileMenuOverlay" class="fixed inset-0 bg-custom-primary/95 backdrop-blur-xl z-40 opacity-0 invisible transition-all duration-500 md:hidden">
    <div class="h-full flex flex-col items-center justify-center space-y-8">
        <a href="<?= BASE_URL ?>" class="mobile-link text-white text-3xl font-display font-bold hover:text-custom-accent transition-all duration-300 transform translate-y-4 opacity-0">
            Beranda
        </a>
        <a href="#tentang" class="mobile-link text-white text-3xl font-display font-bold hover:text-custom-accent transition-all duration-300 transform translate-y-4 opacity-0">
            Tentang
        </a>
        <a href="<?= BASE_URL ?>destinasi" class="mobile-link text-white text-3xl font-display font-bold hover:text-custom-accent transition-all duration-300 transform translate-y-4 opacity-0">
            Destinasi
        </a>
        <a href="#galeri" class="mobile-link text-white text-3xl font-display font-bold hover:text-custom-accent transition-all duration-300 transform translate-y-4 opacity-0">
            Galeri
        </a>
    </div>
</div>

<script>
(function() {
    'use strict';
    
    // Navbar elements
    const navbar = document.getElementById('mainNavbar');
    const navContainer = document.getElementById('navContainer');
    const mobileBtn = document.getElementById('mobileMenuBtn');
    const mobileOverlay = document.getElementById('mobileMenuOverlay');
    const menuIcon = document.getElementById('menuIcon');
    const mobileLinks = document.querySelectorAll('.mobile-link');
    const navLinks = document.querySelectorAll('.nav-link');
    
    // Navbar scroll effect
    let lastScrollY = window.scrollY;
    let ticking = false;
    
    function updateNavbar() {
        const scrollY = window.scrollY;
        
        if (scrollY > 50) {
            navbar.style.backgroundColor = 'rgba(6, 30, 41, 0.85)';
            navbar.style.backdropFilter = 'blur(20px)';
            navbar.style.borderBottom = '1px solid rgba(95, 149, 152, 0.1)';
            navbar.style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.1)';
            navContainer.style.paddingTop = '1rem';
            navContainer.style.paddingBottom = '1rem';
        } else {
            navbar.style.backgroundColor = 'transparent';
            navbar.style.backdropFilter = 'none';
            navbar.style.borderBottom = 'none';
            navbar.style.boxShadow = 'none';
            navContainer.style.paddingTop = '1.25rem';
            navContainer.style.paddingBottom = '1.25rem';
        }
        
        lastScrollY = scrollY;
        ticking = false;
    }
    
    function onScroll() {
        if (!ticking) {
            window.requestAnimationFrame(updateNavbar);
            ticking = true;
        }
    }
    
    window.addEventListener('scroll', onScroll, { passive: true });
    updateNavbar(); // Initial call
    
    // Nav link hover effect
    navLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            const underline = this.querySelector('.nav-underline');
            if (underline) {
                underline.style.width = '100%';
            }
        });
        
        link.addEventListener('mouseleave', function() {
            const underline = this.querySelector('.nav-underline');
            if (underline) {
                underline.style.width = '0%';
            }
        });
    });
    
    // Mobile menu toggle
    let isMenuOpen = false;
    
    mobileBtn.addEventListener('click', function() {
        isMenuOpen = !isMenuOpen;
        
        if (isMenuOpen) {
            // Open menu
            mobileOverlay.classList.remove('invisible');
            mobileOverlay.classList.add('opacity-100');
            menuIcon.classList.remove('fa-bars');
            menuIcon.classList.add('fa-times');
            menuIcon.style.transform = 'rotate(90deg)';
            document.body.style.overflow = 'hidden';
            
            // Animate links in
            mobileLinks.forEach((link, index) => {
                setTimeout(() => {
                    link.style.transform = 'translateY(0)';
                    link.style.opacity = '1';
                }, index * 100);
            });
        } else {
            // Close menu
            closeMenu();
        }
    });
    
    function closeMenu() {
        mobileOverlay.classList.remove('opacity-100');
        mobileOverlay.classList.add('invisible');
        menuIcon.classList.remove('fa-times');
        menuIcon.classList.add('fa-bars');
        menuIcon.style.transform = 'rotate(0deg)';
        document.body.style.overflow = '';
        isMenuOpen = false;
        
        // Reset links
        mobileLinks.forEach(link => {
            link.style.transform = 'translateY(1rem)';
            link.style.opacity = '0';
        });
    }
    
    // Close menu when clicking on a link
    mobileLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });
    
    // Close menu on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && isMenuOpen) {
            closeMenu();
        }
    });
})();
</script>
