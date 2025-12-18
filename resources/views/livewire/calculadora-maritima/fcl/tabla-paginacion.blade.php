{{-- 
    ============================================================
    COMPONENTE: PAGINACIÓN DE TABLA
    ============================================================
    Controles de navegación entre páginas.
    Usa Alpine.js para el manejo del estado.
    
    Variables Alpine disponibles (desde componente padre):
    - currentPage: Página actual (0-indexed)
    - totalPages: Total de páginas
    - nextPage(): Ir a siguiente página
    - prevPage(): Ir a página anterior
    - goToPage(n): Ir a página específica
    ============================================================
--}}

<template x-if="totalPages > 1">
    <div class="mt-6 flex items-center justify-center space-x-4">
        
        {{-- ====== BOTÓN ANTERIOR ====== --}}
        <button 
            @click="prevPage()"
            :disabled="currentPage === 0"
            :class="currentPage === 0 ? 'opacity-30 cursor-not-allowed' : 'hover:scale-110 hover:border-yellow-400'"
            class="group relative bg-black/40 border-2 border-yellow-500/50 rounded-full p-3 transition-all duration-300 transform"
            aria-label="Página anterior">
            
            {{-- Ícono flecha izquierda --}}
            <svg class="w-6 h-6 text-yellow-500 transition-transform group-hover:-translate-x-1" 
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/>
            </svg>
            
            {{-- Efecto glow --}}
            <div class="absolute inset-0 rounded-full bg-yellow-500/20 blur-lg opacity-0 group-hover:opacity-100 transition-opacity"></div>
        </button>

        {{-- ====== INDICADORES DE PÁGINA ====== --}}
        <div class="flex items-center space-x-2">
            <template x-for="page in totalPages" :key="page">
                <button 
                    @click="goToPage(page)"
                    :class="currentPage === page - 1 
                        ? 'bg-yellow-500 scale-125 shadow-lg shadow-yellow-500/50' 
                        : 'bg-yellow-500/20 hover:bg-yellow-500/40'"
                    class="w-3 h-3 rounded-full transition-all duration-300 transform hover:scale-110"
                    :aria-label="'Ir a página ' + page"
                    :aria-current="currentPage === page - 1 ? 'page' : false">
                </button>
            </template>
        </div>

        {{-- ====== BOTÓN SIGUIENTE ====== --}}
        <button 
            @click="nextPage()"
            :disabled="currentPage === totalPages - 1"
            :class="currentPage === totalPages - 1 ? 'opacity-30 cursor-not-allowed' : 'hover:scale-110 hover:border-yellow-400'"
            class="group relative bg-black/40 border-2 border-yellow-500/50 rounded-full p-3 transition-all duration-300 transform animate-pulse hover:animate-none"
            aria-label="Página siguiente">
            
            {{-- Ícono flecha derecha --}}
            <svg class="w-6 h-6 text-yellow-500 transition-transform group-hover:translate-x-1" 
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/>
            </svg>
            
            {{-- Efecto glow --}}
            <div class="absolute inset-0 rounded-full bg-yellow-500/20 blur-lg opacity-0 group-hover:opacity-100 transition-opacity"></div>
        </button>
        
    </div>
</template>
