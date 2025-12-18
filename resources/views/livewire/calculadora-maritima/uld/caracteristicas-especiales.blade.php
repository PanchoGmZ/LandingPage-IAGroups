{{-- 
    ============================================================
    COMPONENTE: Características Especiales ULD
    ============================================================
    
    DESCRIPCIÓN:
    Checkboxes para seleccionar características especiales de la carga.
    
    OPCIONES:
    - Mercancía Frágil
    - Carga Peligrosa
    - Temperatura Controlada
    - Carga Viva (Animales)
    
    NOTA PARA BACKEND:
    Agregar variables booleanas en CalculadoraMaritima.php:
    - $cargaFragil
    - $cargaPeligrosa
    - $temperaturaControlada
    - $cargaViva
    
    USO:
    @include('livewire.calculadora-maritima.uld.caracteristicas-especiales')
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-6 shadow-xl">
    <h3 class="text-yellow-500 font-bold mb-4 text-sm uppercase tracking-widest">Características Especiales</h3>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        {{-- Opción: Mercancía Frágil --}}
        <label class="flex items-center p-4 bg-black/40 border border-yellow-500/20 rounded-lg cursor-pointer hover:border-yellow-500/50 transition-all">
            <input type="checkbox" class="w-5 h-5 text-yellow-500 bg-black/40 border-yellow-500/30 rounded focus:ring-yellow-500 focus:ring-offset-0">
            <span class="ml-3 text-sm text-gray-300">Mercancía Frágil</span>
        </label>

        {{-- Opción: Carga Peligrosa --}}
        <label class="flex items-center p-4 bg-black/40 border border-yellow-500/20 rounded-lg cursor-pointer hover:border-yellow-500/50 transition-all">
            <input type="checkbox" class="w-5 h-5 text-yellow-500 bg-black/40 border-yellow-500/30 rounded focus:ring-yellow-500 focus:ring-offset-0">
            <span class="ml-3 text-sm text-gray-300">Carga Peligrosa</span>
        </label>

        {{-- Opción: Temperatura Controlada --}}
        <label class="flex items-center p-4 bg-black/40 border border-yellow-500/20 rounded-lg cursor-pointer hover:border-yellow-500/50 transition-all">
            <input type="checkbox" class="w-5 h-5 text-yellow-500 bg-black/40 border-yellow-500/30 rounded focus:ring-yellow-500 focus:ring-offset-0">
            <span class="ml-3 text-sm text-gray-300">Temperatura Controlada</span>
        </label>

        {{-- Opción: Carga Viva --}}
        <label class="flex items-center p-4 bg-black/40 border border-yellow-500/20 rounded-lg cursor-pointer hover:border-yellow-500/50 transition-all">
            <input type="checkbox" class="w-5 h-5 text-yellow-500 bg-black/40 border-yellow-500/30 rounded focus:ring-yellow-500 focus:ring-offset-0">
            <span class="ml-3 text-sm text-gray-300">Carga Viva (Animales)</span>
        </label>
    </div>
</div>
