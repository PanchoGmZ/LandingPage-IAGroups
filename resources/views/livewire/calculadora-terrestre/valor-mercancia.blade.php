{{-- 
    ============================================================
    COMPONENTE: Valor Mercancía Terrestre
    ============================================================
    
    DESCRIPCIÓN:
    Campo para ingresar valor declarado de la mercancía.
    Se usa para calcular el seguro de la carga.
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $valorMercancia: Valor en USD
    
    USO:
    @include('livewire.calculadora-terrestre.valor-mercancia')
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-6 shadow-xl transition-all duration-300 hover:border-yellow-500/30">
    <label class="block text-yellow-500 font-bold mb-2 text-xs uppercase tracking-widest">Valor Mercancía (USD)</label>
    <input type="number" wire:model="valorMercancia" step="0.01" placeholder="3000"
        class="w-full bg-black/30 border-2 border-white/10 text-white px-4 py-3.5 rounded-xl focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all">
    <p class="text-yellow-500/70 text-xs mt-3 pl-1">Para calcular el seguro de la carga</p>
</div>
