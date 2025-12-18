{{-- 
    ============================================================
    CALCULADORA AÉREA - VISTA PRINCIPAL
    ============================================================
    
    ARQUITECTURA DE COMPONENTES:
    ├── calculadora-aerea.blade.php (ESTE ARCHIVO - Orquestador)
    ├── calculadora-aerea/
    │   ├── tipo-servicio.blade.php    - Selector tipo servicio
    │   ├── rutas.blade.php            - Campos origen/destino
    │   ├── dimensiones.blade.php      - Campos peso/volumen
    │   ├── calculadora-volumen.blade.php - Cálculo por dimensiones
    │   ├── valor-mercancia.blade.php  - Campo valor USD
    │   ├── servicio-urgente.blade.php - Checkbox urgente
    │   └── botones-accion.blade.php   - Botones calcular/limpiar
    └── components/
        ├── efectos-fondo.blade.php    - Efectos visuales
        ├── header-calculadora.blade.php - Header común
        ├── alertas-sesion.blade.php   - Mensajes flash
        ├── titulo-pagina.blade.php    - Título principal
        ├── sidebar-resultado.blade.php - Panel de resultado
        └── nota-informativa.blade.php - Nota al pie
    
    VARIABLES LIVEWIRE (desde CalculadoraAerea.php):
    - $tipoCarga: string - Tipo de servicio
    - $origen, $destino: Aeropuertos
    - $peso, $volumen: Dimensiones
    - $largo, $ancho, $alto: Para cálculo volumen
    - $valorMercancia: Valor declarado USD
    - $urgente: boolean - Servicio urgente
    - $resultado: Total calculado
    - $desglose: Array de costos
    - $mostrarPregunta, $respuestaUsuario: Interacción usuario
    
    MÉTODOS LIVEWIRE:
    - calcular(): Ejecuta el cálculo
    - limpiar(): Resetea campos
    - calcularVolumen(): Calcula volumen por dimensiones
    - responder($resp): Maneja respuesta Sí/No
    ============================================================
--}}

<div class="min-h-screen bg-gradient-to-br from-gray-950 via-black to-gray-900 text-white overflow-x-hidden">
    
    {{-- ====================================================
         EFECTOS DE FONDO
         ==================================================== --}}
    @include('livewire.components.efectos-fondo')

    {{-- ====================================================
         HEADER
         ==================================================== --}}
    @include('livewire.components.header-calculadora')

    {{-- ====================================================
         CONTENIDO PRINCIPAL
         ==================================================== --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
        
        {{-- Título de la página --}}
        @include('livewire.components.titulo-pagina', [
            'titulo' => 'CALCULADORA',
            'subtitulo' => 'AÉREA',
            'descripcion' => 'Calcula el costo de tus envíos aéreos express'
        ])

        {{-- Alertas de sesión --}}
        @include('livewire.components.alertas-sesion')

        {{-- Grid principal: Formulario + Resultado --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- ============================================
                 COLUMNA IZQUIERDA: FORMULARIO
                 ============================================ --}}
            <div class="lg:col-span-2 space-y-6">
                
                {{-- Tipo de servicio --}}
                @include('livewire.calculadora-aerea.tipo-servicio')

                {{-- Rutas: Origen y Destino --}}
                @include('livewire.calculadora-aerea.rutas')

                {{-- Dimensiones: Peso y Volumen --}}
                @include('livewire.calculadora-aerea.dimensiones')

                {{-- Calculadora de Volumen auxiliar --}}
                @include('livewire.calculadora-aerea.calculadora-volumen')

                {{-- Valor de mercancía --}}
                @include('livewire.calculadora-aerea.valor-mercancia')

                {{-- Servicio urgente --}}
                @include('livewire.calculadora-aerea.servicio-urgente')

                {{-- Botones de acción --}}
                @include('livewire.calculadora-aerea.botones-accion')
                
            </div>

            {{-- ============================================
                 COLUMNA DERECHA: RESULTADO
                 ============================================ --}}
            @include('livewire.components.sidebar-resultado', [
                'tipoEnvio' => 'aéreo'
            ])
            
        </div>

        {{-- Nota informativa --}}
        @include('livewire.components.nota-informativa', [
            'mensaje' => 'Los cálculos son estimaciones basados en tarifas estándar. El precio final puede variar según disponibilidad, aerolínea y condiciones especiales del servicio.'
        ])
        
    </div>
</div>
