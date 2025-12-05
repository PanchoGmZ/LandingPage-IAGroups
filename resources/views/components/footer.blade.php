<!-- Footer -->
<footer class="bg-black border-t border-yellow-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 sm:gap-12">
            <!-- Company Info -->
            <div>
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-12 h-12 bg-yellow-500/10 rounded-lg flex items-center justify-center">
                        <img src="{{ asset('images/logo.png') }}" alt="IA Groups Logo" class="w-full h-full object-contain">
                    </div>
                    <h3 class="text-xl font-bold text-yellow-500">IA GROUPS</h3>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Conectando el mundo a través de soluciones logísticas inteligentes. Tu socio en comercio internacional.
                </p>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="text-yellow-500 font-bold mb-4 uppercase tracking-wide text-sm">Enlaces Rápidos</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-yellow-500 transition-colors text-sm">Inicio</a></li>
                    <li><a href="{{ route('nosotros') }}" class="text-gray-400 hover:text-yellow-500 transition-colors text-sm">Nosotros</a></li>
                    <li><a href="{{ route('home') }}#servicios" class="text-gray-400 hover:text-yellow-500 transition-colors text-sm">Servicios</a></li>
                </ul>
            </div>
            
            <!-- Services -->
            <div>
                <h4 class="text-yellow-500 font-bold mb-4 uppercase tracking-wide text-sm">Servicios</h4>
                <ul class="space-y-2">
                    <li><a href="/maritimo" class="text-gray-400 hover:text-yellow-500 transition-colors text-sm">Transporte Marítimo</a></li>
                    <li><a href="/aereo" class="text-gray-400 hover:text-yellow-500 transition-colors text-sm">Transporte Aéreo</a></li>
                    <li><a href="/terrestre" class="text-gray-400 hover:text-yellow-500 transition-colors text-sm">Transporte Terrestre</a></li>
                    <li><a href="/impuestos" class="text-gray-400 hover:text-yellow-500 transition-colors text-sm">Gestión de Impuestos</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div>
                <h4 class="text-yellow-500 font-bold mb-4 uppercase tracking-wide text-sm">Contacto</h4>
                <ul class="space-y-3">
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-yellow-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-gray-400 text-sm">info@iagroups.com</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-yellow-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span class="text-gray-400 text-sm">+591 64700457</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-yellow-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-gray-400 text-sm">Tarija, Bolivia</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-yellow-500/20 mt-12 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <p class="text-gray-500 text-sm">
                    © {{ date('Y') }} IA GROUPS. Todos los derechos reservados.
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-yellow-500 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-yellow-500 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-yellow-500 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
