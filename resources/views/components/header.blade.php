<!-- Header -->
<header class="bg-white/5 backdrop-blur-xl border-b border-yellow-500/20 sticky top-0 z-50 shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 lg:py-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <!-- Logo de la empresa -->
                <div class="w-12 h-12 sm:w-14 sm:h-14 bg-yellow-500/10 rounded-lg flex items-center justify-center">
                    <img src="{{ asset('images/logo.png') }}" alt="IA Groups Logo" class="w-full h-full object-contain">
                </div>
                <h1 class="text-xl sm:text-2xl font-bold tracking-widest text-yellow-500">IA GROUPS</h1>
            </div>
            <nav class="hidden lg:flex space-x-8">
                <a href="{{ route('home') }}" class="text-yellow-400 hover:text-yellow-300 font-medium transition-colors">Inicio</a>
                <a href="{{ route('nosotros') }}" class="text-yellow-400 hover:text-yellow-300 font-medium transition-colors">Nosotros</a>
                <a href="{{ route('home') }}#servicios" class="text-yellow-400 hover:text-yellow-300 font-medium transition-colors">Servicios</a>
            </nav>
            
            <div class="flex items-center gap-3 sm:gap-4">
                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="lg:hidden text-yellow-500 hover:text-yellow-400 transition-colors">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div id="mobileMenu" class="fixed inset-0 bg-black/95 backdrop-blur-lg z-50 lg:hidden hidden">
    <div class="flex flex-col h-full">
        <div class="flex items-center justify-between p-4 border-b border-yellow-500/20">
            <h2 class="text-xl font-bold text-yellow-500">MENÚ</h2>
            <button id="closeMobileMenu" class="text-yellow-500 hover:text-yellow-400">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <nav class="flex flex-col p-6 space-y-6">
            <a href="{{ route('home') }}" class="text-2xl text-yellow-400 hover:text-yellow-300 font-bold transition-colors mobile-menu-link">Inicio</a>
            <a href="{{ route('nosotros') }}" class="text-2xl text-yellow-400 hover:text-yellow-300 font-bold transition-colors mobile-menu-link">Nosotros</a>
            <a href="{{ route('home') }}#servicios" class="text-2xl text-yellow-400 hover:text-yellow-300 font-bold transition-colors mobile-menu-link">Servicios</a>
        </nav>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const closeMobileMenu = document.getElementById('closeMobileMenu');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');
        
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.remove('hidden');
                setTimeout(() => {
                    mobileMenu.style.opacity = '1';
                }, 10);
            });
        }
        
        if (closeMobileMenu) {
            closeMobileMenu.addEventListener('click', () => {
                mobileMenu.style.opacity = '0';
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            });
        }
        
        if (mobileMenuLinks.length > 0) {
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.style.opacity = '0';
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                    }, 300);
                });
            });
        }
    });
</script>
