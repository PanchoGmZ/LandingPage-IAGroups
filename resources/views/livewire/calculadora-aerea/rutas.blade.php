{{-- 
    ============================================================
    COMPONENTE: Rutas Aéreas
    ============================================================
    
    DESCRIPCIÓN:
    Campos de aeropuerto origen y destino.
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $origen: Código aeropuerto origen
    - $destino: Código aeropuerto destino
    
    USO:
    @include('livewire.calculadora-aerea.rutas')
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-6 shadow-xl transition-all duration-300 hover:border-yellow-500/30">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        {{-- Campo: Aeropuerto Origen --}}
        <div class="space-y-2">
            <label class="block text-yellow-500 font-bold text-xs uppercase tracking-widest">Aeropuerto Origen</label>
            <input type="text" wire:model="origen" placeholder="Ej: JFK - Nueva York"
                class="w-full bg-black/30 border-2 border-white/10 text-white px-4 py-3.5 rounded-xl focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all placeholder-gray-600">
        </div>
        
        {{-- Campo: Aeropuerto Destino --}}
        <div class="space-y-2">
            <label class="block text-yellow-500 font-bold text-xs uppercase tracking-widest">Aeropuerto Destino</label>
            <input type="text" wire:model="destino" placeholder="Ej: EZE - Buenos Aires"
                class="w-full bg-black/30 border-2 border-white/10 text-white px-4 py-3.5 rounded-xl focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all placeholder-gray-600">
        </div>
    </div>
</div>
