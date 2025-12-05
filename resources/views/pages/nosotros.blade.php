<x-main-layout title="Nosotros - IA GROUPS">
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
    </style>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-b from-gray-900 via-black to-gray-900 py-20 sm:py-32 lg:py-40 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-gradient-to-br from-yellow-500 to-amber-600 rounded-full blur-3xl float-animation"></div>
            <div class="absolute bottom-1/4 left-1/4 w-96 h-96 bg-gradient-to-tl from-orange-500 to-yellow-600 rounded-full blur-3xl float-animation" style="animation-delay: -3s;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <span class="text-yellow-500 font-bold text-sm sm:text-base tracking-widest uppercase">Conócenos</span>
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black text-white mt-4 mb-6 leading-tight">
                    QUIÉNES <span class="bg-gradient-to-r from-yellow-500 via-amber-500 to-yellow-600 bg-clip-text text-transparent">SOMOS</span>
                </h1>
                <p class="text-lg sm:text-xl text-gray-400 max-w-3xl mx-auto">
                    Más que una empresa de logística, somos tu socio estratégico en comercio global
                </p>
            </div>
        </div>
    </section>

    <!-- Nuestra Misión -->
    <section class="relative bg-gradient-to-b from-black via-gray-900 to-black py-16 sm:py-24 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-gradient-to-tl from-amber-500 to-yellow-600 rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div>
                    <span class="text-amber-500 font-bold text-sm sm:text-base tracking-widest uppercase">Nuestra Misión</span>
                    <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black text-white mt-4 mb-6 sm:mb-8 leading-tight">
                        Redefiniendo el<br/>
                        <span class="bg-gradient-to-r from-yellow-500 via-amber-500 to-yellow-600 bg-clip-text text-transparent">Comercio Global</span>
                    </h2>
                    <p class="text-base sm:text-lg text-gray-300 mb-6 leading-relaxed">
                        En IA GROUPS, transformamos la complejidad logística en simplicidad operativa. 
                        Con más de una década conectando continentes, ofrecemos soluciones integrales 
                        de transporte que combinan tecnología de punta con experiencia humana.
                    </p>
                    <p class="text-base sm:text-lg text-gray-400 leading-relaxed">
                        Desde el aire hasta el mar, desde la carretera hasta tu almacén, gestionamos 
                        cada etapa de tu cadena de suministro con precisión milimétrica. Nuestro sistema 
                        automatizado de cotizaciones te permite tomar decisiones informadas en tiempo real, 
                        optimizando costos sin sacrificar velocidad ni seguridad.
                    </p>
                </div>
                
                <!-- Dashboard Charts -->
                <div class="grid grid-cols-1 gap-6">
                    <!-- Chart 1: Envíos por Mes (Bar Chart) -->
                    <div class="bg-gradient-to-br from-yellow-500/10 to-yellow-600/5 border border-yellow-500/30 p-6 hover:border-yellow-500 transition-all group">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-sm font-bold text-yellow-500 uppercase tracking-wide">Envíos por Mes</h3>
                            <span class="text-2xl font-black text-yellow-500">+32%</span>
                        </div>
                        <div class="flex items-end justify-between h-32 gap-2">
                            <div class="flex-1 bg-gradient-to-t from-amber-500/30 to-yellow-500/20 hover:from-amber-500 hover:to-yellow-500 transition-all cursor-pointer group-hover:scale-105" style="height: 45%;">
                                <div class="h-full flex items-end justify-center pb-1">
                                    <span class="text-xs font-bold text-yellow-500">45</span>
                                </div>
                            </div>
                            <div class="flex-1 bg-gradient-to-t from-amber-500/30 to-yellow-500/20 hover:from-amber-500 hover:to-yellow-500 transition-all cursor-pointer group-hover:scale-105" style="height: 60%;">
                                <div class="h-full flex items-end justify-center pb-1">
                                    <span class="text-xs font-bold text-yellow-500">60</span>
                                </div>
                            </div>
                            <div class="flex-1 bg-gradient-to-t from-orange-500/30 to-amber-500/20 hover:from-orange-500 hover:to-amber-500 transition-all cursor-pointer group-hover:scale-105" style="height: 78%;">
                                <div class="h-full flex items-end justify-center pb-1">
                                    <span class="text-xs font-bold text-amber-500">78</span>
                                </div>
                            </div>
                            <div class="flex-1 bg-gradient-to-t from-amber-500/30 to-yellow-500/20 hover:from-amber-500 hover:to-yellow-500 transition-all cursor-pointer group-hover:scale-105" style="height: 55%;">
                                <div class="h-full flex items-end justify-center pb-1">
                                    <span class="text-xs font-bold text-yellow-500">55</span>
                                </div>
                            </div>
                            <div class="flex-1 bg-gradient-to-t from-yellow-500/30 to-amber-500/20 hover:from-yellow-500 hover:to-amber-500 transition-all cursor-pointer group-hover:scale-105" style="height: 92%;">
                                <div class="h-full flex items-end justify-center pb-1">
                                    <span class="text-xs font-bold text-yellow-500">92</span>
                                </div>
                            </div>
                            <div class="flex-1 bg-gradient-to-t from-orange-500 to-amber-500 transition-all cursor-pointer group-hover:scale-105" style="height: 100%;">
                                <div class="h-full flex items-end justify-center pb-1">
                                    <span class="text-xs font-bold text-black">120</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between mt-2 text-xs text-gray-500">
                            <span>Jun</span>
                            <span>Jul</span>
                            <span>Ago</span>
                            <span>Sep</span>
                            <span>Oct</span>
                            <span>Nov</span>
                        </div>
                    </div>

                    <!-- Chart 2: Distribución por Tipo de Transporte -->
                    <div class="bg-gradient-to-br from-yellow-500/10 to-yellow-600/5 border border-yellow-500/30 p-6 hover:border-yellow-500 transition-all group">
                        <h3 class="text-sm font-bold text-yellow-500 uppercase tracking-wide mb-4">Distribución de Servicios</h3>
                        <div class="space-y-3">
                            <!-- Marítimo -->
                            <div>
                                <div class="flex justify-between text-xs mb-1">
                                    <span class="text-gray-300">Marítimo</span>
                                    <span class="text-amber-500 font-bold">42%</span>
                                </div>
                                <div class="h-2 bg-black/50 overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-yellow-500 to-amber-500 transition-all duration-1000 group-hover:w-full" style="width: 42%"></div>
                                </div>
                            </div>
                            <!-- Aéreo -->
                            <div>
                                <div class="flex justify-between text-xs mb-1">
                                    <span class="text-gray-300">Aéreo</span>
                                    <span class="text-orange-500 font-bold">28%</span>
                                </div>
                                <div class="h-2 bg-black/50 overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-amber-500 to-orange-500 transition-all duration-1000 group-hover:w-full" style="width: 28%"></div>
                                </div>
                            </div>
                            <!-- Terrestre -->
                            <div>
                                <div class="flex justify-between text-xs mb-1">
                                    <span class="text-gray-300">Terrestre</span>
                                    <span class="text-yellow-500 font-bold">22%</span>
                                </div>
                                <div class="h-2 bg-black/50 overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-yellow-600 to-amber-500 transition-all duration-1000 group-hover:w-full" style="width: 22%"></div>
                                </div>
                            </div>
                            <!-- Consultoría -->
                            <div>
                                <div class="flex justify-between text-xs mb-1">
                                    <span class="text-gray-300">Gestión Aduanera</span>
                                    <span class="text-orange-500 font-bold">8%</span>
                                </div>
                                <div class="h-2 bg-black/50 overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-orange-500 to-yellow-500 transition-all duration-1000 group-hover:w-full" style="width: 8%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gradient-to-br from-yellow-500/10 to-yellow-600/5 border border-yellow-500/30 p-4 hover:border-yellow-500 transition-all group">
                            <div class="text-3xl sm:text-4xl font-black text-yellow-500 mb-2">98%</div>
                            <div class="text-xs sm:text-sm text-gray-400 uppercase tracking-wide">Satisfacción</div>
                        </div>
                        <div class="bg-gradient-to-br from-yellow-500/10 to-yellow-600/5 border border-yellow-500/30 p-4 hover:border-yellow-500 transition-all group">
                            <div class="text-3xl sm:text-4xl font-black text-amber-500 mb-2">150+</div>
                            <div class="text-xs sm:text-sm text-gray-400 uppercase tracking-wide">Clientes Activos</div>
                        </div>
                        <div class="bg-gradient-to-br from-yellow-500/10 to-yellow-600/5 border border-yellow-500/30 p-4 hover:border-yellow-500 transition-all group">
                            <div class="text-3xl sm:text-4xl font-black text-orange-500 mb-2">24/7</div>
                            <div class="text-xs sm:text-sm text-gray-400 uppercase tracking-wide">Atención Continua</div>
                        </div>
                        <div class="bg-gradient-to-br from-yellow-500/10 to-yellow-600/5 border border-yellow-500/30 p-4 hover:border-yellow-500 transition-all group">
                            <div class="text-3xl sm:text-4xl font-black text-yellow-600 mb-2">5M+</div>
                            <div class="text-xs sm:text-sm text-gray-400 uppercase tracking-wide">Toneladas Enviadas</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- En Qué Nos Diferenciamos -->
    <section class="relative bg-gradient-to-b from-gray-900 via-black to-gray-900 py-16 sm:py-24 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-1/3 left-1/3 w-96 h-96 bg-gradient-to-br from-yellow-500 to-amber-600 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12 sm:mb-16">
                <span class="text-yellow-500 font-bold text-sm sm:text-base tracking-widest uppercase">Nuestros Diferenciadores</span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-black text-white mt-4">
                    ¿Por Qué Elegir <span class="bg-gradient-to-r from-yellow-500 via-amber-500 to-yellow-600 bg-clip-text text-transparent">IA GROUPS?</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <!-- Card 01 -->
                <div class="group relative bg-gradient-to-br from-gray-800/50 to-black/50 backdrop-blur-sm border border-yellow-500/20 p-6 sm:p-8 hover:border-yellow-500 transition-all duration-500 hover:shadow-2xl hover:shadow-yellow-500/20">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-500 to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full border-4 border-yellow-500/30 flex items-center justify-center text-2xl font-black text-yellow-500 group-hover:border-yellow-500 transition-colors">
                            01
                        </div>
                        <div class="ml-4 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-l-12 border-l-yellow-500/30 group-hover:border-l-yellow-500 transition-colors"></div>
                    </div>
                    
                    <p class="text-gray-300 text-sm leading-relaxed group-hover:text-white transition-colors">
                        Generamos y desarrollamos negocios internacionales para empresas, facilitando todas sus operaciones de importación y exportación.
                    </p>
                </div>

                <!-- Card 02 -->
                <div class="group relative bg-gradient-to-br from-gray-800/50 to-black/50 backdrop-blur-sm border border-yellow-500/20 p-6 sm:p-8 hover:border-yellow-500 transition-all duration-500 hover:shadow-2xl hover:shadow-yellow-500/20">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-500 to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full border-4 border-yellow-500/30 flex items-center justify-center text-2xl font-black text-yellow-500 group-hover:border-yellow-500 transition-colors">
                            02
                        </div>
                        <div class="ml-4 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-l-12 border-l-yellow-500/30 group-hover:border-l-yellow-500 transition-colors"></div>
                    </div>
                    
                    <p class="text-gray-300 text-sm leading-relaxed group-hover:text-white transition-colors">
                        Trabajamos con las herramientas de la economía colaborativa, alianzas estratégicas e intercambio de recursos.
                    </p>
                </div>

                <!-- Card 03 -->
                <div class="group relative bg-gradient-to-br from-gray-800/50 to-black/50 backdrop-blur-sm border border-yellow-500/20 p-6 sm:p-8 hover:border-yellow-500 transition-all duration-500 hover:shadow-2xl hover:shadow-yellow-500/20">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-500 to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full border-4 border-yellow-500/30 flex items-center justify-center text-2xl font-black text-yellow-500 group-hover:border-yellow-500 transition-colors">
                            03
                        </div>
                        <div class="ml-4 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-l-12 border-l-yellow-500/30 group-hover:border-l-yellow-500 transition-colors"></div>
                    </div>
                    
                    <p class="text-gray-300 text-sm leading-relaxed group-hover:text-white transition-colors">
                        Asesoramos, gestionamos, generamos soluciones en negocios internacionales. Desde Bolivia, hacia el mundo.
                    </p>
                </div>

                <!-- Card 04 -->
                <div class="group relative bg-gradient-to-br from-gray-800/50 to-black/50 backdrop-blur-sm border border-yellow-500/20 p-6 sm:p-8 hover:border-yellow-500 transition-all duration-500 hover:shadow-2xl hover:shadow-yellow-500/20">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-500 to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full border-4 border-yellow-500/30 flex items-center justify-center text-2xl font-black text-yellow-500 group-hover:border-yellow-500 transition-colors">
                            04
                        </div>
                        <div class="ml-4 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-l-12 border-l-yellow-500/30 group-hover:border-l-yellow-500 transition-colors"></div>
                    </div>
                    
                    <p class="text-gray-300 text-sm leading-relaxed group-hover:text-white transition-colors">
                        Damos solución a las deficiencias en tiempos, comunicación, financiación, pagos, seguimiento de operaciones, gestión administrativa y requerimientos legales.
                    </p>
                </div>

                <!-- Card 05 -->
                <div class="group relative bg-gradient-to-br from-gray-800/50 to-black/50 backdrop-blur-sm border border-yellow-500/20 p-6 sm:p-8 hover:border-yellow-500 transition-all duration-500 hover:shadow-2xl hover:shadow-yellow-500/20">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-500 to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full border-4 border-yellow-500/30 flex items-center justify-center text-2xl font-black text-yellow-500 group-hover:border-yellow-500 transition-colors">
                            05
                        </div>
                        <div class="ml-4 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-l-12 border-l-yellow-500/30 group-hover:border-l-yellow-500 transition-colors"></div>
                    </div>
                    
                    <p class="text-gray-300 text-sm leading-relaxed group-hover:text-white transition-colors">
                        Buscamos que todos nuestros clientes tengan la información correcta y los medios seguros para llevar adelante cada transacción.
                    </p>
                </div>

                <!-- Card 06 -->
                <div class="group relative bg-gradient-to-br from-gray-800/50 to-black/50 backdrop-blur-sm border border-yellow-500/20 p-6 sm:p-8 hover:border-yellow-500 transition-all duration-500 hover:shadow-2xl hover:shadow-yellow-500/20">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-500 to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full border-4 border-yellow-500/30 flex items-center justify-center text-2xl font-black text-yellow-500 group-hover:border-yellow-500 transition-colors">
                            06
                        </div>
                        <div class="ml-4 w-0 h-0 border-t-8 border-t-transparent border-b-8 border-b-transparent border-l-12 border-l-yellow-500/30 group-hover:border-l-yellow-500 transition-colors"></div>
                    </div>
                    
                    <p class="text-gray-300 text-sm leading-relaxed group-hover:text-white transition-colors">
                        Tercerizamos el departamento de comercio exterior de empresas de diversos rubros y áreas de actividad. Búsqueda y armado integral de negocios.
                    </p>
                </div>
            </div>
        </div>
    </section>



<!-- Social Media Floating Icons - Fixed Right Side with Animations -->
    <div class="fixed right-6 top-1/2 -translate-y-1/2 z-50 flex flex-col gap-5">
        
        <!-- WhatsApp - Verdadero color con animación hover -->
        <a href="https://wa.me/59164700457" target="_blank" class="group w-16 h-16 bg-black/50 backdrop-blur-sm rounded-full flex items-center justify-center shadow-xl overflow-hidden transition-all duration-300 hover:scale-110 hover:rotate-6">
            <!-- Color real de WhatsApp solo visible en hover -->
            <div class="absolute inset-0 bg-gradient-to-br from-[#25D366] to-[#128C7E] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <svg class="relative w-8 h-8 fill-white transition-all duration-300 group-hover:scale-110" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.521-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
            </svg>
        </a>

        <!-- Facebook - Azul oficial con animación -->
        <a href="https://facebook.com" target="_blank" class="group w-16 h-16 bg-black/50 backdrop-blur-sm rounded-full flex items-center justify-center shadow-xl overflow-hidden transition-all duration-300 hover:scale-110 hover:-rotate-6">
            <div class="absolute inset-0 bg-gradient-to-br from-[#1877F2] to-[#0E5A9E] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <svg class="relative w-8 h-8 fill-white transition-all duration-300 group-hover:scale-110" viewBox="0 0 24 24">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
            </svg>
        </a>

        <!-- TikTok - Logo negro con gradiente característico -->
        <a href="https://tiktok.com/@iagroups" target="_blank" class="group w-16 h-16 bg-black/50 backdrop-blur-sm rounded-full flex items-center justify-center shadow-xl overflow-hidden transition-all duration-300 hover:scale-110 hover:rotate-3">
            <!-- Gradiente característico de TikTok -->
            <div class="absolute inset-0 bg-gradient-to-br from-[#000000] via-[#FF0050] to-[#00F2EA] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <svg class="relative w-8 h-8 fill-white transition-all duration-300 group-hover:scale-110" viewBox="0 0 24 24">
                <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.52.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
            </svg>
        </a>

        <!-- Gmail/Email - Rojo oficial -->
        <a href="mailto:info@iagroups.com" class="group w-16 h-16 bg-black/50 backdrop-blur-sm rounded-full flex items-center justify-center shadow-xl overflow-hidden transition-all duration-300 hover:scale-110 hover:-rotate-3">
            <div class="absolute inset-0 bg-gradient-to-br from-[#EA4335] to-[#D33B2C] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <svg class="relative w-8 h-8 fill-white transition-all duration-300 group-hover:scale-110" viewBox="0 0 24 24">
                <path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-.512.241-.994.645-1.3L11.64.153a1.636 1.636 0 0 1 1.719 0l10.364 3.964a1.636 1.636 0 0 1 .277 2.91l-10.661 4.073z"/>
            </svg>
        </a>
    </div>
</x-main-layout>
