{{-- 
    ============================================================
    CALCULADORA TERRESTRE - Vista Principal (Orquestador)
    ============================================================
    
    DESCRIPCIÓN:
    Calculadora para cotizar envíos terrestres (PARCIAL, COMPLETO, PALLETS).
    Este archivo actúa como orquestador, incluyendo componentes modulares.
    
    ARQUITECTURA:
    - Usa componentes compartidos de: livewire/components/
    - Usa componentes específicos de: livewire/calculadora-terrestre/
    
    COMPONENTES INCLUIDOS:
    1. efectos-fondo          - Efectos visuales de fondo
    2. header-calculadora     - Cabecera con logo y navegación
    3. titulo-pagina          - Título principal con gradiente
    4. alertas-sesion         - Mensajes flash (éxito/error)
    5. tipo-servicio          - Selector PARCIAL/COMPLETO/PALLETS
    6. rutas                  - Ciudad origen y destino
    7. dimensiones            - Peso, volumen, distancia
    8. calculadora-volumen    - Mini calculadora de volumen
    9. valor-mercancia        - Valor declarado
    10. botones-accion        - Calcular/Limpiar
    11. sidebar-resultado     - Panel de resultados con WhatsApp
    12. nota-informativa      - Nota sobre peajes
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $tipoCarga: string - Tipo de servicio (lcl, fcl, uld)
    - $origen, $destino: string - Ciudades
    - $peso, $volumen: float - Dimensiones de carga
    - $distancia: int - Kilómetros
    - $largo, $ancho, $alto: float - Para calculadora volumen
    - $valorMercancia: float - Valor declarado
    - $resultado: float|null - Resultado del cálculo
    - $desglose: array - Desglose de costos
    - $mostrarPregunta: bool - Control de UI
    - $respuestaUsuario: string|null - Respuesta del usuario
    
    MÉTODOS LIVEWIRE:
    - calcular(): Ejecuta el cálculo de cotización
    - limpiar(): Resetea todos los campos
    - calcularVolumen(): Calcula volumen desde dimensiones
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
            'titulo' => 'CALCULADORA',
            'subtitulo' => 'TERRESTRE',
            'descripcion' => 'Calcula el costo de tus envíos terrestres'
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
                
                {{-- 1. Tipo de Servicio (PARCIAL/COMPLETO/PALLETS) --}}
                @include('livewire.calculadora-terrestre.tipo-servicio')
                
                {{-- 2. Rutas (Origen/Destino) --}}
                @include('livewire.calculadora-terrestre.rutas')
                
                {{-- 3. Dimensiones (Peso/Volumen/Distancia) --}}
                @include('livewire.calculadora-terrestre.dimensiones')
                
                {{-- 4. Calculadora de Volumen --}}
                @include('livewire.calculadora-terrestre.calculadora-volumen')
                
                {{-- 5. Valor de Mercancía --}}
                @include('livewire.calculadora-terrestre.valor-mercancia')
                
                {{-- 6. Botones de Acción --}}
                @include('livewire.calculadora-terrestre.botones-accion')
                
            </div>

            {{-- ========================================================
                 COLUMNA DERECHA: Resultado (1/3)
                 ======================================================== --}}
            <div class="lg:col-span-1">
                @include('livewire.components.sidebar-resultado', [
                    'tipoEnvio' => 'terrestre',
                    'iconoVacio' => 'M13 10V3L4 14h7v7l9-11h-7z'
                ])
            </div>
        </div>

        {{-- ============================================================
             SECCIÓN: Nota Informativa
             ============================================================ --}}
        @include('livewire.components.nota-informativa', [
            'mensaje' => 'Los peajes son estimados basados en rutas estándar. El precio final puede variar según disponibilidad, tipo de vehículo y condiciones especiales del servicio.'
        ])
        
    </div>
</div>
