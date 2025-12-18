{{-- 
    ============================================================
    COMPONENTE: Información LCL
    ============================================================
    
    DESCRIPCIÓN:
    Card informativa que explica qué es LCL (Less than Container Load)
    al usuario. Ayuda a entender el servicio antes de cotizar.
    
    DEPENDENCIAS: Ninguna
    
    USO:
    @include('livewire.calculadora-maritima.lcl.info-lcl')
    ============================================================
--}}

<div class="bg-gradient-to-br from-blue-500/10 to-cyan-500/10 border border-blue-500/30 rounded-2xl p-6 shadow-xl">
    <div class="flex items-start space-x-4">
        {{-- Icono informativo --}}
        <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        
        {{-- Texto explicativo --}}
        <div>
            <h3 class="text-blue-400 font-bold text-lg mb-2">💡 ¿Qué es LCL?</h3>
            <p class="text-gray-300 text-sm leading-relaxed">
                <strong class="text-blue-300">LCL (Less than Container Load)</strong> es ideal cuando tu carga <strong>no llena un contenedor completo</strong>. 
                Pagas solo por el espacio que utilizas, compartiendo el contenedor con otros clientes. 
                <span class="text-yellow-400">Económico para envíos pequeños y medianos.</span>
            </p>
        </div>
    </div>
</div>
