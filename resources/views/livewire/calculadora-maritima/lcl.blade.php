<div class="space-y-6">
    <!-- Card: Introducción Explicativa -->
    <div class="bg-gradient-to-br from-blue-500/10 to-cyan-500/10 border border-blue-500/30 rounded-2xl p-6 shadow-xl">
        <div class="flex items-start space-x-4">
            <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <h3 class="text-blue-400 font-bold text-lg mb-2">💡 ¿Qué es LCL?</h3>
                <p class="text-gray-300 text-sm leading-relaxed">
                    <strong class="text-blue-300">LCL (Less than Container Load)</strong> es ideal cuando tu carga <strong>no llena un contenedor completo</strong>. 
                    Pagas solo por el espacio que utilizas, compartiendo el contenedor con otros clientes. 
                    <span class="text-yellow-400">Económico para envíos pequeños y medianos.</span>
                </p>
            </div>
        </div>
    </div>

    <!-- Card: Formulario Principal -->
    <div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-6 shadow-xl">
        <h3 class="text-yellow-500 font-bold mb-6 text-lg uppercase tracking-widest flex items-center">
            <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
            </svg>
            Cotizador LCL - Carga Suelta
        </h3>
        <p class="text-gray-400 text-sm mb-6">Complete los datos de su envío para obtener una cotización instantánea</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Peso Total -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2 flex items-center">
                    <svg class="w-4 h-4 mr-2 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z"/>
                        <path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z"/>
                        <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z"/>
                    </svg>
                    Peso Total (KG)
                </label>
                <input type="number" wire:model="peso" step="0.01" placeholder="Ej: 500"
                    class="w-full px-4 py-3 bg-black/40 border border-yellow-500/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all">
                <p class="text-xs text-gray-500 mt-1">
                    <svg class="w-3 h-3 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    Peso bruto incluyendo embalaje
                </p>
            </div>

            <!-- Volumen Total -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2 flex items-center">
                    <svg class="w-4 h-4 mr-2 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM2 12a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2z"/>
                    </svg>
                    Volumen Total (M³)
                </label>
                <input type="number" wire:model="volumen" step="0.001" placeholder="Ej: 2.5"
                    class="w-full px-4 py-3 bg-black/40 border border-yellow-500/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all">
                <p class="text-xs text-gray-500 mt-1">
                    <svg class="w-3 h-3 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    O calcúlalo con las dimensiones abajo
                </p>
            </div>

            <!-- Valor de Mercancía -->
            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-gray-300 mb-2 flex items-center">
                    <svg class="w-4 h-4 mr-2 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                    </svg>
                    Valor de Mercancía (USD) - Opcional
                </label>
                <input type="number" wire:model="valorMercancia" step="0.01" placeholder="Ej: 10,000"
                    class="w-full px-4 py-3 bg-black/40 border border-yellow-500/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all">
                <p class="text-xs text-gray-500 mt-1">
                    <svg class="w-3 h-3 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    Calcula seguro automático (2% del valor declarado)
                </p>
            </div>
        </div>
    </div>

    <!-- Card: Calculadora de Dimensiones (Opcional) -->
    <div class="bg-white/5 backdrop-blur-xl border border-purple-500/20 rounded-2xl p-6 shadow-xl">
        <h3 class="text-purple-400 font-bold mb-4 text-sm uppercase tracking-widest flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
            </svg>
            📐 Calculadora de Volumen (Opcional)
        </h3>
        <p class="text-gray-400 text-xs mb-4">Si conoces las dimensiones de tu caja/pallet, ingresa los valores y calcularemos el volumen automáticamente</p>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-medium text-gray-400 mb-2">Largo (cm)</label>
                <input type="number" wire:model="largo" wire:change="calcularVolumen" placeholder="120"
                    class="w-full px-3 py-2 bg-black/30 border border-purple-500/30 rounded-lg text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all text-sm">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-400 mb-2">Ancho (cm)</label>
                <input type="number" wire:model="ancho" wire:change="calcularVolumen" placeholder="80"
                    class="w-full px-3 py-2 bg-black/30 border border-purple-500/30 rounded-lg text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all text-sm">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-400 mb-2">Alto (cm)</label>
                <input type="number" wire:model="alto" wire:change="calcularVolumen" placeholder="100"
                    class="w-full px-3 py-2 bg-black/30 border border-purple-500/30 rounded-lg text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all text-sm">
            </div>
        </div>
        
        @if($volumen > 0)
        <div class="mt-4 p-3 bg-purple-500/10 border border-purple-500/30 rounded-lg">
            <p class="text-purple-300 text-sm">
                <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <strong>Volumen calculado:</strong> {{ $volumen }} m³
            </p>
        </div>
        @endif
    </div>

    <!-- Buttons -->
    <div class="flex flex-col sm:flex-row gap-4">
        <button wire:click="calcular" 
            class="flex-1 bg-gradient-to-r from-yellow-500 to-amber-500 hover:from-yellow-400 hover:to-amber-400 text-black font-bold py-4 px-6 rounded-xl transition-all transform hover:scale-105 shadow-lg shadow-yellow-500/30 flex items-center justify-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
            </svg>
            <span>Calcular Cotización</span>
        </button>
        
        <button wire:click="limpiar"
            class="sm:w-auto bg-white/5 hover:bg-white/10 text-gray-300 font-bold py-4 px-6 rounded-xl border border-white/10 hover:border-yellow-500/50 transition-all flex items-center justify-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            <span>Limpiar</span>
        </button>
    </div>
</div>