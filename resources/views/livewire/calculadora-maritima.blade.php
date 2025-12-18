{{-- 
    ============================================================
    CALCULADORA MARÍTIMA - Vista Principal (Orquestador)
    ============================================================
    
    DESCRIPCIÓN:
    Calculadora principal para cotizar envíos marítimos internacionales.
    Maneja tres tipos de carga mediante tabs: LCL, FCL y ULD.
    Este archivo actúa como orquestador, incluyendo componentes modulares.
    
    ARQUITECTURA:
    - Usa componentes compartidos de: livewire/components/
    - Usa tabs para cambiar entre: calculadora-maritima/lcl, fcl, uld
    - Sidebar de resultado solo para LCL y ULD (FCL tiene tabla propia)
    
    COMPONENTES INCLUIDOS:
    1. efectos-fondo          - Efectos visuales de fondo
    2. header-calculadora     - Cabecera con logo y navegación
    3. titulo-pagina          - Título principal con gradiente
    4. alertas-sesion         - Mensajes flash (éxito/error)
    5. tabs-navegacion        - Selector LCL/FCL/ULD
    6. lcl/                   - Componentes de carga suelta
    7. fcl/                   - Componentes de contenedor completo
    8. uld/                   - Componentes de carga aérea
    9. sidebar-resultado      - Panel de resultados (LCL/ULD)
    10. nota-informativa      - Nota sobre tarifas
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $tipoCarga: string - 'lcl', 'fcl', 'uld' (controla tab activo)
    - $resultado: float|null - Total calculado
    - $desglose: array - Desglose de costos
    - $mostrarPregunta: bool - Control de UI
    - $respuestaUsuario: string|null - Respuesta del usuario
    
    MÉTODOS LIVEWIRE:
    - calcular(): Ejecuta el cálculo según tipoCarga
    - limpiar(): Resetea todos los campos
    - responder($respuesta): Maneja respuesta del usuario
    - descargarPDF(): Genera PDF (solo LCL)
    
    ÚLTIMA ACTUALIZACIÓN: 2024
    ============================================================
--}}

<div class="min-h-screen bg-gradient-to-br from-gray-950 via-black to-gray-900 text-white overflow-x-hidden">
    
    {{-- ============================================================
         SECCIÓN: Efectos de Fondo
         ============================================================ --}}
    @include('livewire.components.efectos-fondo')

    {{-- ============================================================
         SECCIÓN: Header
         ============================================================ --}}
    @include('livewire.components.header-calculadora')

    {{-- ============================================================
         SECCIÓN: Contenido Principal
         ============================================================ --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
        
        {{-- Título de la Página --}}
        @include('livewire.components.titulo-pagina', [
            'titulo' => 'CALCULADORA',
            'subtitulo' => 'MARÍTIMA',
            'descripcion' => 'Cotiza envíos marítimos internacionales en tiempo real'
        ])

        {{-- Alertas de Sesión --}}
        @include('livewire.components.alertas-sesion')

        {{-- ============================================================
             GRID: Formulario + Resultado
             ============================================================ --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            
            {{-- ========================================================
                 COLUMNA IZQUIERDA: Formulario con Tabs (2/3)
                 ======================================================== --}}
            <div class="lg:col-span-2 space-y-6">
                
                {{-- Navegación por Tabs --}}
                @include('livewire.calculadora-maritima.tabs-navegacion')

                {{-- Contenido según Tab Activo --}}
                <div class="transition-all duration-300">
                    @if($tipoCarga === 'lcl')
                        @include('livewire.calculadora-maritima.lcl')
                    @elseif($tipoCarga === 'fcl')
                        @include('livewire.calculadora-maritima.fcl')
                    @elseif($tipoCarga === 'uld')
                        @include('livewire.calculadora-maritima.uld')
                    @endif
                </div>
            </div>

            {{-- ========================================================
                 COLUMNA DERECHA: Resultado (1/3)
                 Solo para LCL y ULD - FCL tiene su tabla propia
                 ======================================================== --}}
            @if($tipoCarga !== 'fcl')
            <div class="lg:sticky lg:top-32">
                @include('livewire.calculadora-maritima.sidebar-resultado')
            </div>
            @endif
        </div>

        {{-- ============================================================
             SECCIÓN: Nota Informativa
             ============================================================ --}}
        @include('livewire.components.nota-informativa', [
            'mensaje' => 'Estos cálculos son estimaciones basadas en tarifas estándar. El precio final puede variar según disponibilidad, tipo de contenedor y condiciones especiales del servicio.'
        ])
        
    </div>
</div>
