{{-- 
    ============================================================
    COMPONENTE: ESTADO DE CARGA
    ============================================================
    Se muestra mientras se buscan las tarifas (loadingRates = true)
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-12 shadow-xl text-center">
    {{-- Spinner de carga --}}
    <svg class="animate-spin h-12 w-12 mx-auto mb-4 text-yellow-500" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
    
    {{-- Mensaje de carga --}}
    <p class="text-gray-300 font-medium">Buscando mejores tarifas...</p>
</div>
