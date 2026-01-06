{{-- 
    ============================================================
    COMPONENTE: Botones de Acción Impuestos
    ============================================================
    
    DESCRIPCIÓN:
    Botones para calcular impuestos y limpiar el formulario.
    Los productos se agregan automáticamente al seleccionar.
    
    MÉTODOS LIVEWIRE:
    - calcular(): Ejecuta el cálculo de impuestos
    - limpiar(): Resetea todos los campos
    
    USO:
    @include('livewire.calculadora-impuestos.botones-accion')
    ============================================================
--}}

<div class="space-y-4">
    {{-- Botones principales: Calcular y Limpiar --}}
    <div class="flex space-x-4">
        {{-- Botón Calcular Impuestos --}}
        <button wire:click="calcular" 
            @if(count($carrito) === 0) disabled @endif
            class="flex-1 bg-gradient-to-r from-yellow-500 via-amber-500 to-yellow-500 hover:from-yellow-400 hover:via-amber-400 hover:to-yellow-400 text-black font-black py-4 px-6 text-lg uppercase tracking-wider transition-all transform hover:scale-105 hover:-translate-y-1 shadow-xl hover:shadow-yellow-500/50 rounded-xl disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none disabled:hover:scale-100 flex items-center justify-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 1a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm4-4a1 1 0 100 2h.01a1 1 0 100-2H13zM9 9a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zM7 8a1 1 0 000 2h.01a1 1 0 000-2H7z" clip-rule="evenodd"/>
            </svg>
            CALCULAR IMPUESTOS
            @if(count($carrito) > 0)
                <span class="ml-2 px-2 py-0.5 text-xs bg-black/30 rounded-full">{{ count($carrito) }} producto(s)</span>
            @endif
        </button>
        
        {{-- Botón Limpiar --}}
        <button wire:click="limpiar" 
            class="bg-white/5 border-2 border-white/10 hover:border-yellow-500 text-gray-300 hover:text-yellow-400 font-bold py-4 px-6 uppercase transition-all transform hover:scale-105 rounded-xl">
            LIMPIAR
        </button>
    </div>

    {{-- Indicador de estado --}}
    @if(count($carrito) === 0)
        <div class="text-center text-sm text-gray-500">
            <svg class="w-5 h-5 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
            </svg>
            Busca y selecciona productos para comenzar
        </div>
    @elseif(!$resultado)
        <div class="text-center text-sm text-gray-400">
            <span class="text-yellow-400 font-semibold">{{ count($carrito) }}</span> producto(s) listos. 
            <span class="text-gray-500">Completa los valores FOB y presiona "Calcular Impuestos".</span>
        </div>
    @endif
</div>
