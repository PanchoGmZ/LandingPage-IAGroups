{{-- 
    ============================================================
    COMPONENTE: Formulario Principal ULD
    ============================================================
    
    DESCRIPCIÓN:
    Card con los campos principales para carga aérea: aeropuerto
    origen/destino, peso bruto y volumen.
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $origen: Código aeropuerto origen (ej: PEK)
    - $destino: Código aeropuerto destino (ej: EZE)
    - $peso: Peso bruto en KG
    - $volumen: Volumen en M³
    
    USO:
    @include('livewire.calculadora-maritima.uld.formulario-principal')
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-6 shadow-xl">
    {{-- Título de la sección --}}
    <h3 class="text-yellow-500 font-bold mb-6 text-lg uppercase tracking-widest flex items-center">
        <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3z"/>
        </svg>
        Carga Aérea (ULD)
    </h3>
    <p class="text-gray-400 text-sm mb-6">Para envíos aéreos con unidades de carga (Unit Load Device)</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        {{-- Campo: Aeropuerto Origen --}}
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Aeropuerto Origen</label>
            <input type="text" wire:model="origen" placeholder="ej: PEK (Beijing)"
                class="w-full px-4 py-3 bg-black/40 border border-yellow-500/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all">
        </div>

        {{-- Campo: Aeropuerto Destino --}}
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Aeropuerto Destino</label>
            <input type="text" wire:model="destino" placeholder="ej: EZE (Buenos Aires)"
                class="w-full px-4 py-3 bg-black/40 border border-yellow-500/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all">
        </div>

        {{-- Campo: Peso Bruto --}}
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Peso Bruto (KG)</label>
            <input type="number" wire:model="peso" step="0.01" placeholder="5000"
                class="w-full px-4 py-3 bg-black/40 border border-yellow-500/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all">
            <p class="text-xs text-gray-500 mt-1">Peso de la mercancía + embalaje</p>
        </div>

        {{-- Campo: Volumen --}}
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Volumen (M³)</label>
            <input type="number" wire:model="volumen" step="0.001" placeholder="10"
                class="w-full px-4 py-3 bg-black/40 border border-yellow-500/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all">
            <p class="text-xs text-gray-500 mt-1">Volumen total del envío</p>
        </div>
    </div>
</div>
