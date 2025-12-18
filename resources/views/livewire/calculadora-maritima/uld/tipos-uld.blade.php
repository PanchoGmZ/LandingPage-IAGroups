{{-- 
    ============================================================
    COMPONENTE: Selector de Tipo ULD
    ============================================================
    
    DESCRIPCIÓN:
    Grid de botones para seleccionar el tipo de ULD (Unit Load Device).
    Cada opción muestra el código, nombre y dimensiones.
    
    TIPOS DE ULD:
    - AKE: Contenedor Base Ancha (1.53m × 1.53m × 1.62m)
    - AMA: Contenedor Alto (2.24m × 1.53m × 2.44m)
    - PMC: Pallet Standard (3.17m × 2.23m × 1.62m)
    - AAP: Contenedor Bajo (2.23m × 3.17m × 0.64m)
    - AKN: Contenedor Refrigerado (con control de temperatura)
    - PLA: Pallet de Aviación (hasta 11,340 kg)
    
    NOTA PARA BACKEND:
    Agregar variable $tipoULD en CalculadoraMaritima.php y
    conectar con wire:click para selección.
    
    USO:
    @include('livewire.calculadora-maritima.uld.tipos-uld')
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-6 shadow-xl">
    <h3 class="text-yellow-500 font-bold mb-4 text-sm uppercase tracking-widest">Tipo de ULD</h3>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        {{-- Opción: AKE --}}
        <button type="button" 
            class="group relative overflow-hidden px-4 py-4 border-2 border-yellow-500/30 hover:border-yellow-500 rounded-xl transition-all">
            <span class="absolute inset-0 bg-gradient-to-r from-yellow-500 to-amber-500 opacity-0 group-hover:opacity-10 transition-opacity"></span>
            <span class="relative block text-center">
                <span class="text-base font-bold text-yellow-400">AKE</span>
                <span class="block text-xs text-gray-400 mt-1">Contenedor Base Ancha</span>
                <span class="block text-xs text-gray-500 mt-0.5">1.53m × 1.53m × 1.62m</span>
            </span>
        </button>
        
        {{-- Opción: AMA --}}
        <button type="button"
            class="group relative overflow-hidden px-4 py-4 border-2 border-yellow-500/30 hover:border-yellow-500 rounded-xl transition-all">
            <span class="absolute inset-0 bg-gradient-to-r from-yellow-500 to-amber-500 opacity-0 group-hover:opacity-10 transition-opacity"></span>
            <span class="relative block text-center">
                <span class="text-base font-bold text-yellow-400">AMA</span>
                <span class="block text-xs text-gray-400 mt-1">Contenedor Alto</span>
                <span class="block text-xs text-gray-500 mt-0.5">2.24m × 1.53m × 2.44m</span>
            </span>
        </button>

        {{-- Opción: PMC --}}
        <button type="button"
            class="group relative overflow-hidden px-4 py-4 border-2 border-yellow-500/30 hover:border-yellow-500 rounded-xl transition-all">
            <span class="absolute inset-0 bg-gradient-to-r from-yellow-500 to-amber-500 opacity-0 group-hover:opacity-10 transition-opacity"></span>
            <span class="relative block text-center">
                <span class="text-base font-bold text-yellow-400">PMC</span>
                <span class="block text-xs text-gray-400 mt-1">Pallet Standard</span>
                <span class="block text-xs text-gray-500 mt-0.5">3.17m × 2.23m × 1.62m</span>
            </span>
        </button>

        {{-- Opción: AAP --}}
        <button type="button"
            class="group relative overflow-hidden px-4 py-4 border-2 border-yellow-500/30 hover:border-yellow-500 rounded-xl transition-all">
            <span class="absolute inset-0 bg-gradient-to-r from-yellow-500 to-amber-500 opacity-0 group-hover:opacity-10 transition-opacity"></span>
            <span class="relative block text-center">
                <span class="text-base font-bold text-yellow-400">AAP</span>
                <span class="block text-xs text-gray-400 mt-1">Contenedor Bajo</span>
                <span class="block text-xs text-gray-500 mt-0.5">2.23m × 3.17m × 0.64m</span>
            </span>
        </button>

        {{-- Opción: AKN --}}
        <button type="button"
            class="group relative overflow-hidden px-4 py-4 border-2 border-yellow-500/30 hover:border-yellow-500 rounded-xl transition-all">
            <span class="absolute inset-0 bg-gradient-to-r from-yellow-500 to-amber-500 opacity-0 group-hover:opacity-10 transition-opacity"></span>
            <span class="relative block text-center">
                <span class="text-base font-bold text-yellow-400">AKN</span>
                <span class="block text-xs text-gray-400 mt-1">Contenedor Refrigerado</span>
                <span class="block text-xs text-gray-500 mt-0.5">Con control de temperatura</span>
            </span>
        </button>

        {{-- Opción: PLA --}}
        <button type="button"
            class="group relative overflow-hidden px-4 py-4 border-2 border-yellow-500/30 hover:border-yellow-500 rounded-xl transition-all">
            <span class="absolute inset-0 bg-gradient-to-r from-yellow-500 to-amber-500 opacity-0 group-hover:opacity-10 transition-opacity"></span>
            <span class="relative block text-center">
                <span class="text-base font-bold text-yellow-400">PLA</span>
                <span class="block text-xs text-gray-400 mt-1">Pallet de Aviación</span>
                <span class="block text-xs text-gray-500 mt-0.5">Hasta 11,340 kg</span>
            </span>
        </button>
    </div>
</div>
