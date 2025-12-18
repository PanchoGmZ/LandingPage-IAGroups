{{-- 
    ============================================================
    COMPONENTE: Rutas Terrestres
    ============================================================
    
    DESCRIPCIÓN:
    Campos de ciudad origen y destino.
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $origen: Ciudad origen
    - $destino: Ciudad destino
    
    USO:
    @include('livewire.calculadora-terrestre.rutas')
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-6 shadow-xl transition-all duration-300 hover:border-yellow-500/30">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        {{-- Campo: Ciudad Origen --}}
        <div class="space-y-2">
            <label class="block text-yellow-500 font-bold text-xs uppercase tracking-widest">Ciudad Origen</label>
            <input type="text" wire:model="origen" placeholder="Ej: Buenos Aires"
                class="w-full bg-black/30 border-2 border-white/10 text-white px-4 py-3.5 rounded-xl focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all placeholder-gray-600">
        </div>
        
        {{-- Campo: Ciudad Destino --}}
        <div class="space-y-2">
            <label class="block text-yellow-500 font-bold text-xs uppercase tracking-widest">Ciudad Destino</label>
            <input type="text" wire:model="destino" placeholder="Ej: Córdoba"
                class="w-full bg-black/30 border-2 border-white/10 text-white px-4 py-3.5 rounded-xl focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all placeholder-gray-600">
        </div>
    </div>
</div>
