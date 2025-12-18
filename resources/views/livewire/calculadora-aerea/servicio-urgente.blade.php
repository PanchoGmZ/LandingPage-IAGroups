{{-- 
    ============================================================
    COMPONENTE: Servicio Urgente Aéreo
    ============================================================
    
    DESCRIPCIÓN:
    Checkbox para activar el servicio urgente (+30%).
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $urgente: boolean
    
    USO:
    @include('livewire.calculadora-aerea.servicio-urgente')
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-6 shadow-xl transition-all duration-300 hover:border-yellow-500/30">
    <label class="flex items-center cursor-pointer">
        <input type="checkbox" wire:model="urgente" class="w-5 h-5 text-yellow-500 bg-black/30 border-2 border-white/10 rounded focus:ring-yellow-500 focus:ring-2">
        <span class="ml-3 text-yellow-400 font-bold">SERVICIO URGENTE (+30%)</span>
    </label>
    <p class="text-yellow-500/70 text-xs mt-2 pl-1">Entrega en 24-48 horas</p>
</div>
