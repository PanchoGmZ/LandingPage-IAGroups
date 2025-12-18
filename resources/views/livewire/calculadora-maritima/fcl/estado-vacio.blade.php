{{-- 
    ============================================================
    COMPONENTE: ESTADO VACÍO
    ============================================================
    Se muestra cuando no hay tarifas disponibles y no está
    cargando. Invita al usuario a seleccionar puertos.
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-12 shadow-xl text-center">
    {{-- Ícono de búsqueda --}}
    <div class="w-20 h-20 mx-auto mb-6 bg-yellow-500/5 border-2 border-yellow-500/20 rounded-full flex items-center justify-center">
        <svg class="w-10 h-10 text-yellow-500/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
    </div>
    
    {{-- Mensaje de instrucción --}}
    <p class="text-gray-400 text-sm">
        Selecciona los puertos de origen y destino para ver las tarifas disponibles
    </p>
</div>
