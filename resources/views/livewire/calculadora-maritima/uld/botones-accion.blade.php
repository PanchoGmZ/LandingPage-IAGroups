{{-- 
    ============================================================
    COMPONENTE: Botones de Acción ULD
    ============================================================
    
    DESCRIPCIÓN:
    Botones de acción para calcular cotización y limpiar formulario.
    
    MÉTODOS LIVEWIRE:
    - calcular(): Ejecuta el cálculo de cotización
    - limpiar(): Resetea todos los campos del formulario
    
    USO:
    @include('livewire.calculadora-maritima.uld.botones-accion')
    ============================================================
--}}

<div class="flex flex-col sm:flex-row gap-4">
    {{-- Botón Calcular --}}
    <button wire:click="calcular" 
        class="flex-1 bg-gradient-to-r from-yellow-500 to-amber-500 hover:from-yellow-400 hover:to-amber-400 text-black font-bold py-4 px-6 rounded-xl transition-all transform hover:scale-105 shadow-lg shadow-yellow-500/30 flex items-center justify-center space-x-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
        </svg>
        <span>Calcular Cotización</span>
    </button>
    
    {{-- Botón Limpiar --}}
    <button wire:click="limpiar"
        class="sm:w-auto bg-white/5 hover:bg-white/10 text-gray-300 font-bold py-4 px-6 rounded-xl border border-white/10 hover:border-yellow-500/50 transition-all">
        Limpiar
    </button>
</div>
