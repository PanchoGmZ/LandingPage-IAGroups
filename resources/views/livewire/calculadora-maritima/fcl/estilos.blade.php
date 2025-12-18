{{-- 
    ============================================================
    ESTILOS PERSONALIZADOS - FCL
    ============================================================
    Este archivo contiene todos los estilos CSS personalizados
    para el módulo FCL de la calculadora marítima.
    
    Modificar aquí para cambiar la apariencia visual.
    ============================================================
--}}

<style>
    /* ========================================
       SCROLLBAR PERSONALIZADA
       ======================================== */
    .custom-scrollbar::-webkit-scrollbar {
        height: 8px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.3);
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: linear-gradient(90deg, #eab308 0%, #f59e0b 100%);
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(234, 179, 8, 0.5);
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(90deg, #fbbf24 0%, #f59e0b 100%);
        box-shadow: 0 0 15px rgba(234, 179, 8, 0.8);
    }

    /* ========================================
       ANIMACIONES DE FILAS
       ======================================== */
    .fila-tarifa {
        transition: all 0.2s ease;
    }
    .fila-tarifa:hover {
        background: rgba(234, 179, 8, 0.05);
    }

    /* ========================================
       BADGE DE TRÁNSITO
       ======================================== */
    .badge-transito {
        @apply inline-flex flex-col items-center bg-yellow-500/10 rounded-lg px-2 py-1 border border-yellow-500/20;
    }
</style>
