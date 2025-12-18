{{-- 
    ============================================================
    CALCULADORA MARÍTIMA - MÓDULO FCL (Full Container Load)
    ============================================================
    
    ARQUITECTURA DE COMPONENTES:
    ├── fcl.blade.php (ESTE ARCHIVO - Orquestador principal)
    └── fcl/
        ├── estilos.blade.php          - Estilos CSS personalizados
        ├── selector-puerto.blade.php  - Componente de búsqueda de puertos
        ├── tabla-tarifas.blade.php    - Contenedor principal de tabla
        ├── tabla-encabezado.blade.php - Header de la sección de tarifas
        ├── tabla-contenido.blade.php  - Tabla con datos de tarifas
        ├── tabla-paginacion.blade.php - Controles de navegación
        ├── tabla-hint-movil.blade.php - Hint scroll para móviles
        ├── estado-vacio.blade.php     - Estado sin resultados
        ├── estado-cargando.blade.php  - Estado de carga
        └── boton-limpiar.blade.php    - Botón reset búsqueda
    
    VARIABLES LIVEWIRE DISPONIBLES (desde CalculadoraMaritima.php):
    - $searchPOL, $searchPOD: Texto de búsqueda
    - $polCode, $podCode: Códigos de puerto seleccionados
    - $polSuggestions, $podSuggestions: Sugerencias de puertos
    - $showPOLDropdown, $showPODDropdown: Visibilidad dropdowns
    - $fclRates: Array de tarifas
    - $loadingRates: Estado de carga
    
    MÉTODOS LIVEWIRE:
    - selectPOL($code, $name): Seleccionar puerto origen
    - selectPOD($code, $name): Seleccionar puerto destino
    - limpiar(): Resetear búsqueda
    
    PARA BACKEND:
    Modificar CalculadoraMaritima.php método buscarTarifasFCL()
    para conectar con la API real de 5688.com u otra fuente.
    ============================================================
--}}

<div class="space-y-6">
    
    {{-- ====================================================
         SECCIÓN 1: FORMULARIO DE BÚSQUEDA
         ==================================================== --}}
    <div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-6 shadow-xl relative z-10 overflow-visible">
        
        {{-- Título del cotizador --}}
        <h3 class="text-yellow-500 font-bold mb-6 text-lg uppercase tracking-widest flex items-center">
            <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM2 12a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2z"/>
            </svg>
            Cotizador de Contenedores FCL
        </h3>
        
        {{-- Descripción --}}
        <p class="text-gray-400 text-sm mb-6">
            Busca tarifas en tiempo real para contenedores completos (20' y 40')
        </p>

        {{-- Grid de selectores de puerto --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 relative z-50">
            
            {{-- Selector Puerto Origen (POL) --}}
            @include('livewire.calculadora-maritima.fcl.selector-puerto', [
                'tipo' => 'pol',
                'search' => $searchPOL,
                'code' => $polCode,
                'showDropdown' => $showPOLDropdown,
                'suggestions' => $polSuggestions
            ])
            
            {{-- Selector Puerto Destino (POD) --}}
            @include('livewire.calculadora-maritima.fcl.selector-puerto', [
                'tipo' => 'pod',
                'search' => $searchPOD,
                'code' => $podCode,
                'showDropdown' => $showPODDropdown,
                'suggestions' => $podSuggestions
            ])
            
        </div>
    </div>

    {{-- ====================================================
         SECCIÓN 2: RESULTADOS DE TARIFAS
         ==================================================== --}}
    @if(count($fclRates) > 0)
        {{-- Hay tarifas disponibles --}}
        @include('livewire.calculadora-maritima.fcl.tabla-tarifas', [
            'fclRates' => $fclRates
        ])
        
    @elseif($loadingRates)
        {{-- Cargando tarifas --}}
        @include('livewire.calculadora-maritima.fcl.estado-cargando')
        
    @else
        {{-- Sin resultados --}}
        @include('livewire.calculadora-maritima.fcl.estado-vacio')
    @endif

    {{-- ====================================================
         SECCIÓN 3: ACCIONES
         ==================================================== --}}
    @include('livewire.calculadora-maritima.fcl.boton-limpiar')

</div>
