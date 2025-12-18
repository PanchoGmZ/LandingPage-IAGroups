{{-- 
    ============================================================
    COMPONENTE: Servicios Adicionales LCL
    ============================================================
    
    DESCRIPCIÓN:
    Card con opciones de servicios adicionales como recojo de almacén
    y selección de destino final dentro de Bolivia.
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $recojoAlmacen: boolean - Si incluye servicio de recojo
    - $destinoFinal: string - 'la_paz' u 'otros'
    - $departamentoDestino: string - Departamento seleccionado
    
    COSTOS:
    - Recojo almacén: +$150
    - Beni/Pando: +$350
    - Cochabamba/Santa Cruz: +$250
    - Tarija/Chuquisaca/Potosí/Oruro: +$180
    - La Paz: Incluido
    
    USO:
    @include('livewire.calculadora-maritima.lcl.servicios-adicionales')
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-6 shadow-xl">
    {{-- Título de la sección --}}
    <h3 class="text-yellow-500 font-bold mb-6 text-lg uppercase tracking-widest flex items-center">
        <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z"/>
        </svg>
        Servicios Adicionales
    </h3>
    <p class="text-gray-400 text-sm mb-6">Selecciona los servicios adicionales que requieras para tu envío</p>

    <div class="space-y-6">
        {{-- Opción: Recojo de Almacén --}}
        @include('livewire.calculadora-maritima.lcl.servicio-recojo')
        
        {{-- Opción: Destino Final --}}
        @include('livewire.calculadora-maritima.lcl.servicio-destino')
    </div>
</div>
