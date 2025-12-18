{{-- 
    ============================================================
    CALCULADORA MARÍTIMA - MÓDULO LCL (Less than Container Load)
    ============================================================
    
    ARQUITECTURA DE COMPONENTES:
    ├── lcl.blade.php (ESTE ARCHIVO - Orquestador principal)
    └── lcl/
        ├── info-lcl.blade.php           - Card informativa sobre LCL
        ├── formulario-principal.blade.php - Campos de peso, volumen, valor
        ├── servicios-adicionales.blade.php - Contenedor de servicios extra
        ├── servicio-recojo.blade.php    - Opción de recojo de almacén
        ├── servicio-destino.blade.php   - Selector de destino Bolivia
        ├── calculadora-volumen.blade.php - Cálculo por dimensiones
        └── botones-accion.blade.php     - Botones calcular/limpiar
    
    VARIABLES LIVEWIRE DISPONIBLES (desde CalculadoraMaritima.php):
    - $peso: Peso total en KG
    - $volumen: Volumen total en M³
    - $valorMercancia: Valor declarado en USD
    - $recojoAlmacen: boolean - Servicio de recojo
    - $destinoFinal: string - 'la_paz' u 'otros'
    - $departamentoDestino: string - Departamento seleccionado
    - $largo, $ancho, $alto: Dimensiones en cm
    
    MÉTODOS LIVEWIRE:
    - calcular(): Ejecuta el cálculo de cotización
    - limpiar(): Resetea todos los campos
    - calcularVolumen(): Calcula volumen por dimensiones
    
    PARA BACKEND:
    Modificar CalculadoraMaritima.php método calcular() para LCL
    ============================================================
--}}

<div class="space-y-6">

    {{-- ====================================================
         SECCIÓN 1: INFORMACIÓN LCL
         ==================================================== --}}
    @include('livewire.calculadora-maritima.lcl.info-lcl')

    {{-- ====================================================
         SECCIÓN 2: FORMULARIO PRINCIPAL
         ==================================================== --}}
    @include('livewire.calculadora-maritima.lcl.formulario-principal')

    {{-- ====================================================
         SECCIÓN 3: SERVICIOS ADICIONALES
         ==================================================== --}}
    @include('livewire.calculadora-maritima.lcl.servicios-adicionales')

    {{-- ====================================================
         SECCIÓN 4: CALCULADORA DE VOLUMEN
         ==================================================== --}}
    @include('livewire.calculadora-maritima.lcl.calculadora-volumen')

    {{-- ====================================================
         SECCIÓN 5: BOTONES DE ACCIÓN
         ==================================================== --}}
    @include('livewire.calculadora-maritima.lcl.botones-accion')

</div>