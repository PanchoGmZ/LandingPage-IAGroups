{{-- 
    ============================================================
    CALCULADORA MARÍTIMA - MÓDULO ULD (Unit Load Device)
    ============================================================
    
    ARQUITECTURA DE COMPONENTES:
    ├── uld.blade.php (ESTE ARCHIVO - Orquestador principal)
    └── uld/
        ├── formulario-principal.blade.php    - Campos aeropuerto, peso, volumen
        ├── tipos-uld.blade.php               - Grid de tipos de ULD
        ├── caracteristicas-especiales.blade.php - Checkboxes de características
        ├── valor-mercancia.blade.php         - Campo valor mercancía
        └── botones-accion.blade.php          - Botones calcular/limpiar
    
    VARIABLES LIVEWIRE DISPONIBLES (desde CalculadoraMaritima.php):
    - $origen: Código aeropuerto origen
    - $destino: Código aeropuerto destino
    - $peso: Peso bruto en KG
    - $volumen: Volumen en M³
    - $valorMercancia: Valor declarado en USD
    
    MÉTODOS LIVEWIRE:
    - calcular(): Ejecuta el cálculo de cotización ULD
    - limpiar(): Resetea todos los campos
    
    PARA BACKEND:
    1. Agregar variables: $tipoULD, $cargaFragil, $cargaPeligrosa, 
       $temperaturaControlada, $cargaViva
    2. Modificar calcular() para manejo específico de ULD
    ============================================================
--}}

<div class="space-y-6">

    {{-- ====================================================
         SECCIÓN 1: FORMULARIO PRINCIPAL
         ==================================================== --}}
    @include('livewire.calculadora-maritima.uld.formulario-principal')

    {{-- ====================================================
         SECCIÓN 2: TIPOS DE ULD
         ==================================================== --}}
    @include('livewire.calculadora-maritima.uld.tipos-uld')

    {{-- ====================================================
         SECCIÓN 3: CARACTERÍSTICAS ESPECIALES
         ==================================================== --}}
    @include('livewire.calculadora-maritima.uld.caracteristicas-especiales')

    {{-- ====================================================
         SECCIÓN 4: VALOR DE MERCANCÍA
         ==================================================== --}}
    @include('livewire.calculadora-maritima.uld.valor-mercancia')

    {{-- ====================================================
         SECCIÓN 5: BOTONES DE ACCIÓN
         ==================================================== --}}
    @include('livewire.calculadora-maritima.uld.botones-accion')

</div>
