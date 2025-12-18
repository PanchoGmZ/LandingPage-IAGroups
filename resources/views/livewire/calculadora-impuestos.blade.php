{{-- 
    ============================================================
    CALCULADORA DE IMPUESTOS - Vista Principal (Orquestador)
    ============================================================
    
    DESCRIPCIÓN:
    Calculadora para estimar aranceles, IVA y costos aduaneros
    basado en valores CIF (Cost, Insurance, Freight).
    Este archivo actúa como orquestador, incluyendo componentes modulares.
    
    ARQUITECTURA:
    - Usa componentes compartidos de: livewire/components/
    - Usa componentes específicos de: livewire/calculadora-impuestos/
    
    COMPONENTES INCLUIDOS:
    1. efectos-fondo          - Efectos visuales de fondo
    2. header-calculadora     - Cabecera con logo y navegación
    3. titulo-pagina          - Título principal con gradiente
    4. alertas-sesion         - Mensajes flash (éxito/error)
    5. categoria-producto     - Selector GENERAL/ALIMENTOS/TECNOLOGÍA/TEXTIL
    6. pais-origen            - Campo país de origen
    7. valores-cif            - FOB + Flete + Seguro
    8. formula-cif            - Tarjeta explicativa de fórmulas
    9. botones-accion         - Calcular Impuestos/Limpiar
    10. sidebar-resultado     - Panel de resultados con WhatsApp
    11. nota-informativa      - Nota sobre tasas estimadas
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $categoria: string - Categoría del producto
    - $paisOrigen: string - País de procedencia
    - $valorMercancia: float - Valor FOB
    - $valorFlete: float - Costo del flete
    - $valorSeguro: float - Costo del seguro
    - $resultado: float|null - Total impuestos calculados
    - $desglose: array - Desglose de conceptos
    - $mostrarPregunta: bool - Control de UI
    - $respuestaUsuario: string|null - Respuesta del usuario
    
    MÉTODOS LIVEWIRE:
    - calcular(): Ejecuta el cálculo de impuestos
    - limpiar(): Resetea todos los campos
    - responder($respuesta): Maneja respuesta del usuario
    
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
            'titulo' => 'CALCULADORA DE',
            'subtitulo' => 'IMPUESTOS',
            'descripcion' => 'Calcula aranceles, IVA y costos aduaneros'
        ])

        {{-- Alertas de Sesión --}}
        @include('livewire.components.alertas-sesion')

        {{-- ============================================================
             GRID: Formulario + Resultado
             ============================================================ --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- ========================================================
                 COLUMNA IZQUIERDA: Formulario (2/3)
                 ======================================================== --}}
            <div class="lg:col-span-2 space-y-6">
                
                {{-- 1. Categoría de Producto --}}
                @include('livewire.calculadora-impuestos.categoria-producto')
                
                {{-- 2. País de Origen --}}
                @include('livewire.calculadora-impuestos.pais-origen')
                
                {{-- 3. Valores CIF (FOB + Flete + Seguro) --}}
                @include('livewire.calculadora-impuestos.valores-cif')
                
                {{-- 4. Fórmula CIF Explicativa --}}
                @include('livewire.calculadora-impuestos.formula-cif')
                
                {{-- 5. Botones de Acción --}}
                @include('livewire.calculadora-impuestos.botones-accion')
                
            </div>

            {{-- ========================================================
                 COLUMNA DERECHA: Resultado (1/3)
                 ======================================================== --}}
            <div class="lg:col-span-1">
                @include('livewire.calculadora-impuestos.sidebar-resultado')
            </div>
        </div>

        {{-- ============================================================
             SECCIÓN: Nota Informativa
             ============================================================ --}}
        @include('livewire.components.nota-informativa', [
            'mensaje' => 'Las tasas de impuestos varían según el país y tipo de producto. Esta calculadora usa tasas estimadas para Argentina.',
            'icono' => 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z'
        ])
        
    </div>
</div>
