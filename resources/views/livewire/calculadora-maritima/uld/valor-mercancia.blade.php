{{-- 
    ============================================================
    COMPONENTE: Valor de Mercancía ULD
    ============================================================
    
    DESCRIPCIÓN:
    Campo para ingresar el valor de la mercancía en USD.
    Se usa para calcular el seguro (2% para carga aérea).
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $valorMercancia: Valor en USD
    
    USO:
    @include('livewire.calculadora-maritima.uld.valor-mercancia')
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-6 shadow-xl">
    <h3 class="text-yellow-500 font-bold mb-4 text-sm uppercase tracking-widest">Valor de Mercancía</h3>
    <input type="number" wire:model="valorMercancia" step="0.01" placeholder="25000"
        class="w-full px-4 py-3 bg-black/40 border border-yellow-500/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all">
    <p class="text-xs text-gray-500 mt-2">Para calcular el seguro (2% del valor para carga aérea)</p>
</div>
