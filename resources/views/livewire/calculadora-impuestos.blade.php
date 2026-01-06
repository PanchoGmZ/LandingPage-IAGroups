{{-- 
    ============================================================
    CALCULADORA DE IMPUESTOS - Vista Principal (Orquestador)
    ============================================================
    
    DESCRIPCIÓN:
    Calculadora para estimar aranceles, IVA y costos aduaneros
    basado en valores CIF (Cost, Insurance, Freight).
    Incluye buscador de productos con código HS y sinónimos.
    
    NUEVA FUNCIONALIDAD: CARRITO DE MÚLTIPLES PRODUCTOS
    - Permite agregar varios productos a una cotización
    - Calcula impuestos individuales y totales
    - Edición y eliminación de productos del carrito
    
    ARQUITECTURA:
    - Usa componentes compartidos de: livewire/components/
    - Usa componentes específicos de: livewire/calculadora-impuestos/
    
    COMPONENTES INCLUIDOS:
    1. efectos-fondo          - Efectos visuales de fondo
    2. header-calculadora     - Cabecera con logo y navegación
    3. titulo-pagina          - Título principal con gradiente
    4. alertas-sesion         - Mensajes flash (éxito/error)
    5. info-impuestos         - Card informativa sobre impuestos
    6. carrito-productos      - Lista de productos agregados (NUEVO)
    7. buscador-producto      - Buscador con autocompletado y sinónimos
    8. calculadora-volumen    - Cálculo de volumen por dimensiones
    9. formulario-cif         - Campos FOB, Flete, Seguro
    10. botones-accion        - Agregar al carrito/Calcular/Limpiar
    11. sidebar-resultado     - Panel de resultados con desglose por producto
    12. nota-informativa      - Nota sobre tasas estimadas
    
    VARIABLES LIVEWIRE:
    - $peso, $volumen, $valorMercancia, $valorFlete, $valorSeguro
    - $largo, $ancho, $alto (para calcular volumen)
    - $searchProducto, $productosSugeridos, $showProductoDropdown
    - $productoSeleccionado, $codigoHS, $descripcionProducto
    - $carrito, $editandoProductoIndex (NUEVO - carrito de productos)
    - $resultado, $desglose, $desgloseProductos
    - $mostrarPregunta, $respuestaUsuario
    
    ÚLTIMA ACTUALIZACIÓN: Enero 2026
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
            'descripcion' => 'Calcula aranceles, IVA y costos aduaneros para importaciones'
        ])

        {{-- Alertas de Sesión --}}
        @include('livewire.components.alertas-sesion')

        {{-- ============================================================
             GRID: Formulario + Resultado
             ============================================================ --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            
            {{-- ========================================================
                 COLUMNA IZQUIERDA: Formulario (2/3)
                 ======================================================== --}}
            <div class="lg:col-span-2 space-y-6">
                
                {{-- 1. Información sobre Impuestos --}}
                @include('livewire.calculadora-impuestos.info-impuestos')
                
                {{-- 2. Carrito de Productos (si hay productos) --}}
                <div class="relative z-60">
                    @include('livewire.calculadora-impuestos.carrito-productos')
                </div>
                
                {{-- 3. Buscador de Producto/Arancel (z-50 para dropdown) --}}
                <div class="relative z-50">
                    @include('livewire.calculadora-impuestos.buscador-producto')
                </div>
                
                {{-- 4. Calculadora de Carga (Volumen/Peso) --}}
                <div class="relative z-40">
                    @include('livewire.calculadora-impuestos.calculadora-volumen')
                </div>
                
                {{-- 5. Formulario CIF (FOB + Flete + Seguro) --}}
                <div class="relative z-30">
                    @include('livewire.calculadora-impuestos.formulario-cif')
                </div>
                
                {{-- 6. Botones de Acción --}}
                @include('livewire.calculadora-impuestos.botones-accion')
                
            </div>

            {{-- ========================================================
                 COLUMNA DERECHA: Resultado (1/3)
                 ======================================================== --}}
            <div class="lg:col-span-1 lg:sticky lg:top-32">
                @include('livewire.calculadora-impuestos.sidebar-resultado')
            </div>
        </div>

        {{-- ============================================================
             SECCIÓN: Nota Informativa
             ============================================================ --}}
        @include('livewire.components.nota-informativa', [
            'mensaje' => 'Las tasas de impuestos se basan en el arancel del producto seleccionado. El IVA es del 13% (Bolivia). Esta calculadora es una estimación, consulta con un agente para valores exactos.',
            'icono' => 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z'
        ])
        
    </div>
</div>
