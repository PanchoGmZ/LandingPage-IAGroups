{{-- 
    ============================================================
    COMPONENTE: HINT DE SCROLL PARA MÓVILES
    ============================================================
    Indicador visual que aparece solo en dispositivos móviles
    para indicar que se puede deslizar horizontalmente.
    
    Se oculta en pantallas grandes (lg:hidden)
    ============================================================
--}}

<div class="mt-3 flex items-center justify-center space-x-2 text-xs text-gray-500 lg:hidden">
    {{-- Ícono izquierdo animado --}}
    <svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
    </svg>
    
    {{-- Texto de instrucción --}}
    <span>Desliza horizontalmente para ver más</span>
    
    {{-- Ícono derecho animado --}}
    <svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
    </svg>
</div>
