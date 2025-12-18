{{-- 
    ============================================================
    COMPONENTE: Calculadora de Volumen
    ============================================================
    
    DESCRIPCIÓN:
    Calculadora auxiliar que permite calcular el volumen en M³
    a partir de las dimensiones (largo, ancho, alto en cm).
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $largo: Largo en centímetros
    - $ancho: Ancho en centímetros
    - $alto: Alto en centímetros
    - $volumen: Volumen calculado en M³
    
    MÉTODOS LIVEWIRE:
    - calcularVolumen(): Calcula el volumen automáticamente
    
    USO:
    @include('livewire.calculadora-maritima.lcl.calculadora-volumen')
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-purple-500/20 rounded-2xl p-6 shadow-xl">
    {{-- Título de la sección --}}
    <h3 class="text-purple-400 font-bold mb-4 text-sm uppercase tracking-widest flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
        </svg>
        📐 Calculadora de Volumen (Opcional)
    </h3>
    <p class="text-gray-400 text-xs mb-4">Si conoces las dimensiones de tu caja/pallet, ingresa los valores y calcularemos el volumen automáticamente</p>

    {{-- Grid de campos de dimensiones --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        {{-- Campo: Largo --}}
        <div>
            <label class="block text-xs font-medium text-gray-400 mb-2">Largo (cm)</label>
            <input type="number" wire:model="largo" wire:change="calcularVolumen" placeholder="120"
                class="w-full px-3 py-2 bg-black/30 border border-purple-500/30 rounded-lg text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all text-sm">
        </div>
        
        {{-- Campo: Ancho --}}
        <div>
            <label class="block text-xs font-medium text-gray-400 mb-2">Ancho (cm)</label>
            <input type="number" wire:model="ancho" wire:change="calcularVolumen" placeholder="80"
                class="w-full px-3 py-2 bg-black/30 border border-purple-500/30 rounded-lg text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all text-sm">
        </div>
        
        {{-- Campo: Alto --}}
        <div>
            <label class="block text-xs font-medium text-gray-400 mb-2">Alto (cm)</label>
            <input type="number" wire:model="alto" wire:change="calcularVolumen" placeholder="100"
                class="w-full px-3 py-2 bg-black/30 border border-purple-500/30 rounded-lg text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all text-sm">
        </div>
    </div>
    
    {{-- Resultado del cálculo --}}
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
