{{-- 
    ============================================================
    COMPONENTE: Dimensiones de Carga Aérea
    ============================================================
    
    DESCRIPCIÓN:
    Campos de peso y volumen con nota sobre peso volumétrico.
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $peso: Peso en kg
    - $volumen: Volumen en m³
    
    USO:
    @include('livewire.calculadora-aerea.dimensiones')
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-6 shadow-xl transition-all duration-300 hover:border-yellow-500/30">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        {{-- Campo: Peso --}}
        <div class="space-y-2">
            <label class="block text-yellow-500 font-bold text-xs uppercase tracking-widest">Peso (kg) *</label>
            <input type="number" wire:model="peso" step="0.01" placeholder="100"
                class="w-full bg-black/30 border-2 border-white/10 text-white px-4 py-3.5 rounded-xl focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all">
        </div>
        
        {{-- Campo: Volumen --}}
        <div class="space-y-2">
            <label class="block text-yellow-500 font-bold text-xs uppercase tracking-widest">Volumen (m³) *</label>
            <input type="number" wire:model="volumen" step="0.001" placeholder="0.5"
                class="w-full bg-black/30 border-2 border-white/10 text-white px-4 py-3.5 rounded-xl focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition-all">
        </div>
    </div>
    
    {{-- Nota sobre peso volumétrico --}}
    <p class="text-yellow-500/70 text-xs mt-4 pl-1">* Se cobrará por peso volumétrico si es mayor (factor 167 kg/m³)</p>
</div>
