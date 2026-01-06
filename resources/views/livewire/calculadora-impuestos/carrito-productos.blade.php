{{-- 
    ============================================================
    COMPONENTE: Productos Seleccionados
    ============================================================
    
    DESCRIPCIÓN:
    Muestra los productos seleccionados para cotización de impuestos.
    Los productos se agregan automáticamente al seleccionarlos.
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $carrito: array - Lista de productos seleccionados
    - $editandoProductoIndex: int|null - Índice del producto activo
    
    MÉTODOS LIVEWIRE:
    - eliminarDelCarrito($index): Elimina un producto
    - seleccionarParaEditar($index): Selecciona producto para editar valores
    - vaciarCarrito(): Elimina todos los productos
    
    USO:
    @include('livewire.calculadora-impuestos.carrito-productos')
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border border-yellow-500/20 rounded-2xl p-6 shadow-xl">
    {{-- Título --}}
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-yellow-500 font-bold text-lg uppercase tracking-widest flex items-center">
            <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
            </svg>
            Productos Seleccionados
            @if(count($carrito) > 0)
                <span class="ml-2 px-2.5 py-1 text-sm bg-yellow-500 text-black rounded-full font-black">
                    {{ count($carrito) }}
                </span>
            @endif
        </h3>
        @if(count($carrito) > 0)
            <button wire:click="vaciarCarrito" 
                class="text-red-400 hover:text-red-300 text-sm flex items-center transition-colors"
                onclick="return confirm('¿Vaciar todos los productos?')">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
                Vaciar
            </button>
        @endif
    </div>

    @if(count($carrito) === 0)
        {{-- Estado vacío --}}
        <div class="text-center py-8 border-2 border-dashed border-yellow-500/20 rounded-xl">
            <svg class="w-12 h-12 mx-auto text-yellow-500/30 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
            <p class="text-gray-400 text-sm">No hay productos seleccionados</p>
            <p class="text-yellow-400/60 text-xs mt-1">Busca y selecciona productos de la lista de abajo</p>
        </div>
    @else
        {{-- Lista de productos --}}
        <div class="space-y-2 max-h-64 overflow-y-auto pr-1">
            @foreach($carrito as $index => $producto)
                @php
                    $cifProducto = $producto['valor_fob'] + $producto['valor_flete'] + $producto['valor_seguro'];
                    $esActivo = $editandoProductoIndex === $index;
                @endphp
                <div wire:click="seleccionarParaEditar({{ $index }})"
                    class="flex items-center justify-between p-3 rounded-xl cursor-pointer transition-all
                    {{ $esActivo 
                        ? 'bg-yellow-500/20 border-2 border-yellow-500 shadow-lg shadow-yellow-500/10' 
                        : 'bg-gray-800/50 border border-white/10 hover:border-yellow-500/30 hover:bg-gray-800' }}">
                    
                    <div class="flex items-center space-x-3 flex-1 min-w-0">
                        {{-- Indicador activo --}}
                        <div class="flex-shrink-0">
                            @if($esActivo)
                                <div class="w-3 h-3 bg-yellow-500 rounded-full animate-pulse"></div>
                            @else
                                <div class="w-3 h-3 bg-gray-600 rounded-full"></div>
                            @endif
                        </div>
                        
                        {{-- Info del producto --}}
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center space-x-2">
                                <span class="text-yellow-400 font-mono text-xs font-bold">{{ $producto['codigo_hs'] }}</span>
                                <span class="inline-flex items-center px-1.5 py-0.5 rounded text-xs font-bold
                                    @if($producto['arancel'] == 0) bg-green-500/20 text-green-400
                                    @elseif($producto['arancel'] <= 10) bg-blue-500/20 text-blue-400
                                    @else bg-yellow-500/20 text-yellow-400
                                    @endif">
                                    {{ $producto['arancel'] }}%
                                </span>
                            </div>
                            <p class="text-gray-300 text-xs truncate mt-0.5">{{ $producto['descripcion'] }}</p>
                        </div>
                        
                        {{-- Valor CIF --}}
                        <div class="flex-shrink-0 text-right">
                            @if($cifProducto > 0)
                                <p class="text-white font-bold text-sm">${{ number_format($cifProducto, 2) }}</p>
                                <p class="text-gray-500 text-xs">CIF</p>
                            @else
                                <p class="text-gray-500 text-xs italic">Sin valores</p>
                            @endif
                        </div>
                    </div>
                    
                    {{-- Botón eliminar --}}
                    <button wire:click.stop="eliminarDelCarrito({{ $index }})"
                        class="ml-2 p-1.5 text-red-400 hover:text-red-300 hover:bg-red-500/10 rounded-lg transition-all flex-shrink-0"
                        title="Eliminar">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            @endforeach
        </div>

        {{-- Resumen rápido --}}
        @php
            $totalFOB = collect($carrito)->sum('valor_fob');
            $totalFlete = collect($carrito)->sum('valor_flete');
            $totalSeguro = collect($carrito)->sum('valor_seguro');
            $totalCIF = $totalFOB + $totalFlete + $totalSeguro;
        @endphp
        @if($totalCIF > 0)
            <div class="mt-4 pt-4 border-t border-yellow-500/20">
                <div class="flex justify-between items-center">
                    <span class="text-gray-400 text-sm">Total CIF:</span>
                    <span class="text-yellow-400 font-bold text-lg">${{ number_format($totalCIF, 2) }}</span>
                </div>
            </div>
        @endif

        {{-- Indicación --}}
        <p class="text-xs text-gray-500 mt-3 text-center">
            <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
            </svg>
            Haz clic en un producto para editar sus valores
        </p>
    @endif
</div>
