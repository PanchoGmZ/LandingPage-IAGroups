{{-- 
    ============================================================
    COMPONENTE: TABLA DE TARIFAS FCL
    ============================================================
    Este componente muestra la tabla de tarifas con paginación.
    
    Variables requeridas (pasadas via @include):
    - $fclRates: Array de tarifas desde el backend
    
    Estructura esperada de cada tarifa:
    [
        'shippingLine' => 'MSC',
        'price' => ['gp20' => '3,782', 'gp40' => '4,989', 'hq40' => '5,214'],
        'closing' => '2',
        'transitTime' => '46',
        'validUntil' => '15/11/2022'
    ]
    
    NOTA PARA BACKEND:
    - Modificar la estructura de $fclRates en CalculadoraMaritima.php
    - Método buscarTarifasFCL() para conectar con API real
    ============================================================
--}}

@php
    // Configuración de paginación (modificar según necesidad)
    $itemsPorPagina = 5;
    $totalItems = count($fclRates);
@endphp

{{-- Script Alpine.js para manejar la paginación (se registra una sola vez) --}}
@once
@push('scripts')
<script>
    // Función global para la tabla de tarifas FCL
    window.tablaTarifasFCL = function(totalItems, itemsPorPagina, tarifas) {
        return {
            currentPage: 0,
            itemsPerPage: itemsPorPagina,
            allRates: tarifas,
            
            get totalPages() { 
                return Math.ceil(totalItems / this.itemsPerPage); 
            },
            
            get paginatedRates() { 
                const start = this.currentPage * this.itemsPerPage;
                const end = start + this.itemsPerPage;
                return this.allRates.slice(start, end);
            },
            
            nextPage() {
                if (this.currentPage < this.totalPages - 1) {
                    this.currentPage++;
                }
            },
            
            prevPage() {
                if (this.currentPage > 0) {
                    this.currentPage--;
                }
            },
            
            goToPage(page) {
                this.currentPage = page - 1;
            }
        }
    }
</script>
@endpush
@endonce

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-6 shadow-xl" 
     x-data="{
        currentPage: 0,
        itemsPerPage: {{ $itemsPorPagina }},
        allRates: {{ Js::from($fclRates) }},
        
        get totalPages() { 
            return Math.ceil({{ $totalItems }} / this.itemsPerPage); 
        },
        
        get paginatedRates() { 
            const start = this.currentPage * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.allRates.slice(start, end);
        },
        
        nextPage() {
            if (this.currentPage < this.totalPages - 1) {
                this.currentPage++;
            }
        },
        
        prevPage() {
            if (this.currentPage > 0) {
                this.currentPage--;
            }
        },
        
        goToPage(page) {
            this.currentPage = page - 1;
        }
     }"
     x-init="console.log('FCL Table: ', allRates.length, 'rates loaded')">
    
    {{-- Encabezado de la sección --}}
    @include('livewire.calculadora-maritima.fcl.tabla-encabezado', [
        'totalItems' => $totalItems
    ])

    {{-- Tabla de datos --}}
    @include('livewire.calculadora-maritima.fcl.tabla-contenido')

    {{-- Hint para móviles --}}
    @include('livewire.calculadora-maritima.fcl.tabla-hint-movil')

    {{-- Controles de paginación --}}
    @include('livewire.calculadora-maritima.fcl.tabla-paginacion')
</div>
