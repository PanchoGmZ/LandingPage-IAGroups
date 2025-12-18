{{-- 
    ============================================================
    COMPONENTE: Calculadora de Volumen Terrestre
    ============================================================
    
    DESCRIPCIÓN:
    Mini calculadora para obtener volumen a partir de dimensiones cm.
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $largo, $ancho, $alto: Dimensiones en cm
    
    MÉTODOS LIVEWIRE:
    - calcularVolumen(): Calcula y actualiza el volumen
    
    USO:
    @include('livewire.calculadora-terrestre.calculadora-volumen')
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-6 shadow-xl transition-all duration-300 hover:border-yellow-500/30">
    <h3 class="text-yellow-500 font-bold mb-4 text-xs uppercase tracking-widest">Calculadora Volumen</h3>
    
    <div class="grid grid-cols-3 gap-4">
        {{-- Campo: Largo --}}
        <div class="space-y-2">
            <label class="block text-gray-400 text-xs">Largo (cm)</label>
            <input type="number" wire:model="largo" wire:change="calcularVolumen" placeholder="100"
                class="w-full bg-black/30 border-2 border-white/10 text-white px-4 py-3 rounded-xl focus:outline-none focus:border-yellow-500 transition-all">
        </div>
        
        {{-- Campo: Ancho --}}
        <div class="space-y-2">
            <label class="block text-gray-400 text-xs">Ancho (cm)</label>
            <input type="number" wire:model="ancho" wire:change="calcularVolumen" placeholder="80"
                class="w-full bg-black/30 border-2 border-white/10 text-white px-4 py-3 rounded-xl focus:outline-none focus:border-yellow-500 transition-all">
        </div>
        
        {{-- Campo: Alto --}}
        <div class="space-y-2">
            <label class="block text-gray-400 text-xs">Alto (cm)</label>
            <input type="number" wire:model="alto" wire:change="calcularVolumen" placeholder="60"
                class="w-full bg-black/30 border-2 border-white/10 text-white px-4 py-3 rounded-xl focus:outline-none focus:border-yellow-500 transition-all">
        </div>
    </div>
</div>
