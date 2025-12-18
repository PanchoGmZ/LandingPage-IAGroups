{{-- 
    ============================================================
    COMPONENTE: Tipo de Servicio Aéreo
    ============================================================
    
    DESCRIPCIÓN:
    Selector de tipo de servicio aéreo con 3 opciones:
    - Estándar (3-5 días)
    - Express (1-2 días)
    - Carga ULD (Pallets)
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $tipoCarga: string - 'lcl', 'fcl', 'uld'
    
    USO:
    @include('livewire.calculadora-aerea.tipo-servicio')
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-6 shadow-xl transition-all duration-300 hover:border-yellow-500/50 hover:shadow-yellow-500/10">
    <label class="block text-yellow-500 font-bold mb-4 text-sm uppercase tracking-widest">Tipo de Servicio</label>
    <div class="grid grid-cols-3 gap-4">
        {{-- Opción: Estándar --}}
        <button wire:click="$set('tipoCarga', 'lcl')"
            class="group relative overflow-hidden px-4 py-4 border-2 rounded-xl font-bold transition-all transform hover:scale-105 {{ $tipoCarga === 'lcl' ? 'border-yellow-500 bg-gradient-to-br from-yellow-500/20 to-amber-500/20 text-yellow-400 shadow-lg shadow-yellow-500/20' : 'border-white/10 text-gray-300 hover:border-yellow-500/50 hover:text-yellow-400' }}">
            <span class="absolute inset-0 bg-gradient-to-r from-yellow-500 to-amber-500 opacity-0 group-hover:opacity-10 transition-opacity"></span>
            <span class="relative block text-center">
                <span class="text-lg">ESTÁNDAR</span>
                <span class="block text-xs font-normal mt-1 text-gray-400">3-5 días</span>
            </span>
        </button>
        
        {{-- Opción: Express --}}
        <button wire:click="$set('tipoCarga', 'fcl')"
            class="group relative overflow-hidden px-4 py-4 border-2 rounded-xl font-bold transition-all transform hover:scale-105 {{ $tipoCarga === 'fcl' ? 'border-yellow-500 bg-gradient-to-br from-yellow-500/20 to-amber-500/20 text-yellow-400 shadow-lg shadow-yellow-500/20' : 'border-white/10 text-gray-300 hover:border-yellow-500/50 hover:text-yellow-400' }}">
            <span class="absolute inset-0 bg-gradient-to-r from-yellow-500 to-amber-500 opacity-0 group-hover:opacity-10 transition-opacity"></span>
            <span class="relative block text-center">
                <span class="text-lg">EXPRESS</span>
                <span class="block text-xs font-normal mt-1 text-gray-400">1-2 días</span>
            </span>
        </button>
        
        {{-- Opción: Carga ULD --}}
        <button wire:click="$set('tipoCarga', 'uld')"
            class="group relative overflow-hidden px-4 py-4 border-2 rounded-xl font-bold transition-all transform hover:scale-105 {{ $tipoCarga === 'uld' ? 'border-yellow-500 bg-gradient-to-br from-yellow-500/20 to-amber-500/20 text-yellow-400 shadow-lg shadow-yellow-500/20' : 'border-white/10 text-gray-300 hover:border-yellow-500/50 hover:text-yellow-400' }}">
            <span class="absolute inset-0 bg-gradient-to-r from-yellow-500 to-amber-500 opacity-0 group-hover:opacity-10 transition-opacity"></span>
            <span class="relative block text-center">
                <span class="text-lg">CARGA</span>
                <span class="block text-xs font-normal mt-1 text-gray-400">Pallets/ULD</span>
            </span>
        </button>
    </div>
</div>
