{{-- 
    ============================================================
    COMPONENTE: Tabs de Navegación Marítima
    ============================================================
    
    DESCRIPCIÓN:
    Pestañas para cambiar entre LCL, FCL y ULD.
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $tipoCarga: string - 'lcl', 'fcl', 'uld'
    
    USO:
    @include('livewire.calculadora-maritima.tabs-navegacion')
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-2 shadow-xl">
    <div class="grid grid-cols-3 gap-2">
        {{-- Tab: LCL --}}
        <button wire:click="$set('tipoCarga', 'lcl')"
            class="group relative overflow-hidden px-5 py-4 rounded-xl font-bold transition-all 
                   {{ $tipoCarga === 'lcl' 
                      ? 'bg-gradient-to-br from-yellow-500 to-amber-500 text-black shadow-lg shadow-yellow-500/30' 
                      : 'bg-white/5 text-gray-300 hover:bg-white/10 hover:text-yellow-400' }}">
            <span class="relative block text-center">
                <span class="text-base sm:text-lg">LCL</span>
                <span class="block text-xs font-normal mt-0.5 {{ $tipoCarga === 'lcl' ? 'text-black/70' : 'text-gray-400' }}">Carga Suelta</span>
            </span>
        </button>
        
        {{-- Tab: FCL --}}
        <button wire:click="$set('tipoCarga', 'fcl')"
            class="group relative overflow-hidden px-5 py-4 rounded-xl font-bold transition-all 
                   {{ $tipoCarga === 'fcl' 
                      ? 'bg-gradient-to-br from-yellow-500 to-amber-500 text-black shadow-lg shadow-yellow-500/30' 
                      : 'bg-white/5 text-gray-300 hover:bg-white/10 hover:text-yellow-400' }}">
            <span class="relative block text-center">
                <span class="text-base sm:text-lg">FCL</span>
                <span class="block text-xs font-normal mt-0.5 {{ $tipoCarga === 'fcl' ? 'text-black/70' : 'text-gray-400' }}">Contenedor</span>
            </span>
        </button>
        
        {{-- Tab: ULD --}}
        <button wire:click="$set('tipoCarga', 'uld')"
            class="group relative overflow-hidden px-5 py-4 rounded-xl font-bold transition-all 
                   {{ $tipoCarga === 'uld' 
                      ? 'bg-gradient-to-br from-yellow-500 to-amber-500 text-black shadow-lg shadow-yellow-500/30' 
                      : 'bg-white/5 text-gray-300 hover:bg-white/10 hover:text-yellow-400' }}">
            <span class="relative block text-center">
                <span class="text-base sm:text-lg">ULD</span>
                <span class="block text-xs font-normal mt-0.5 {{ $tipoCarga === 'uld' ? 'text-black/70' : 'text-gray-400' }}">Aéreo</span>
            </span>
        </button>
    </div>
</div>
