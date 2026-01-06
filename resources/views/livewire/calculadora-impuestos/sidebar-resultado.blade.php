{{-- 
    ============================================================
    COMPONENTE: Sidebar Resultado Impuestos
    ============================================================
    
    DESCRIPCIÓN:
    Panel lateral específico para mostrar resultados de impuestos.
    Incluye: lista de productos, resultado total, desglose por producto,
    botones de descarga PDF y CTA de WhatsApp.
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $resultado: float|null - Total de impuestos calculados
    - $desglose: array - Desglose de conceptos generales
    - $desgloseProductos: array - Desglose individual por producto
    - $carrito: array - Lista de productos en el carrito
    - $mostrarPregunta: bool - Control de UI
    - $respuestaUsuario: string|null - 'si' o 'no'
    
    MÉTODOS LIVEWIRE:
    - responder($respuesta): Maneja la respuesta del usuario
    - descargarProforma(): Descarga PDF de proforma
    - descargarLiquidacion(): Descarga PDF de liquidación
    
    USO:
    @include('livewire.calculadora-impuestos.sidebar-resultado')
    ============================================================
--}}

<div class="bg-white/5 backdrop-blur-xl border-2 border-white/10 rounded-2xl p-6 shadow-2xl transition-all duration-300 hover:border-yellow-500/30">
    <h2 class="text-2xl font-black text-yellow-500 mb-6 uppercase tracking-widest">Resultado</h2>
    
    @if ($resultado !== null)
        {{-- Cantidad de productos --}}
        <div class="mb-4 p-3 bg-yellow-500/10 border border-yellow-500/30 rounded-lg text-center">
            <p class="text-yellow-400 text-sm font-bold">
                <svg class="w-5 h-5 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
                </svg>
                {{ count($carrito) }} producto(s) en cotización
            </p>
        </div>

        {{-- Resultado Total --}}
        <div class="bg-gradient-to-br from-yellow-500/10 to-amber-500/10 border-2 border-yellow-500 rounded-xl p-6 mb-6 text-center transition-all hover:shadow-yellow-500/20 hover:shadow-xl">
            <p class="text-sm font-bold text-yellow-400 mb-2 uppercase tracking-widest">Total Impuestos</p>
            <p class="text-5xl font-black text-yellow-400">${{ $resultado }}</p>
            <p class="text-xs text-gray-400 mt-2">USD</p>
        </div>

        {{-- Desglose por Producto --}}
        @if (count($desgloseProductos) > 0)
            <div class="space-y-3 mb-6">
                <h3 class="font-bold text-yellow-500 uppercase text-xs tracking-widest mb-4 border-b border-yellow-500/20 pb-3 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                    </svg>
                    Detalle por Producto:
                </h3>
                
                <div class="max-h-64 overflow-y-auto space-y-2 pr-1">
                    @foreach ($desgloseProductos as $index => $prod)
                        <div class="p-3 bg-gray-800/50 border border-white/5 rounded-lg hover:border-yellow-500/20 transition-all">
                            <div class="flex items-start justify-between mb-2">
                                <div class="flex-1">
                                    <span class="text-yellow-400 font-mono text-xs font-bold">{{ $prod['codigo_hs'] }}</span>
                                    <p class="text-gray-300 text-xs mt-0.5">{{ Str::limit($prod['descripcion'], 35) }}</p>
                                </div>
                                <span class="text-xs px-2 py-0.5 rounded-md font-bold
                                    @if($prod['arancel'] == 0) bg-green-500/20 text-green-400
                                    @elseif($prod['arancel'] <= 10) bg-blue-500/20 text-blue-400
                                    @else bg-yellow-500/20 text-yellow-400
                                    @endif">
                                    {{ $prod['arancel'] }}%
                                </span>
                            </div>
                            <div class="grid grid-cols-2 gap-1 text-xs">
                                <div>
                                    <span class="text-gray-500">CIF:</span>
                                    <span class="text-white">${{ number_format($prod['cif_usd'], 2) }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-500">GA:</span>
                                    <span class="text-blue-400">Bs {{ number_format($prod['ga_bs'], 2) }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-500">IVA:</span>
                                    <span class="text-green-400">Bs {{ number_format($prod['iva_bs'], 2) }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-500">Imp:</span>
                                    <span class="text-yellow-400 font-semibold">${{ number_format($prod['total_impuestos_usd'], 2) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        
        {{-- Desglose General --}}
        @if (count($desglose) > 0)
            <div class="space-y-2 mb-6">
                <h3 class="font-bold text-yellow-500 uppercase text-xs tracking-widest mb-4 border-b border-yellow-500/20 pb-3">Resumen Total:</h3>
                @foreach ($desglose as $concepto => $valor)
                    @php
                        $esTotal = str_contains($concepto, 'Total');
                        $esCodigoHS = str_contains($concepto, 'Código HS') || str_contains($concepto, 'Producto');
                    @endphp
                    <div class="flex justify-between items-center py-2 border-b border-white/5 hover:bg-white/5 px-2 rounded-lg transition-all {{ $esTotal ? 'bg-yellow-500/5' : '' }}">
                        <span class="text-gray-300 text-sm {{ $esTotal ? 'font-bold' : '' }} {{ $esCodigoHS ? 'text-blue-400' : '' }}">
                            {{ $concepto }}
                        </span>
                        <span class="font-bold text-sm {{ $esTotal ? 'text-yellow-500' : '' }} {{ $esCodigoHS ? 'text-yellow-400 font-mono' : 'text-white' }}">
                            @if ($esCodigoHS || !is_numeric(str_replace(',', '', $valor)))
                                {{ $valor }}
                            @else
                                ${{ $valor }}
                            @endif
                        </span>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- ============================================================
             BOTONES DE DESCARGA PDF
             ============================================================ --}}
        <div class="space-y-3 mb-6">
            <h3 class="font-bold text-yellow-500 uppercase text-xs tracking-widest mb-4 border-b border-yellow-500/20 pb-3">
                📄 Descargar Documentos
            </h3>
            
            {{-- Botón: Descargar Proforma --}}
            <button wire:click="descargarProforma" wire:loading.attr="disabled"
                class="w-full flex items-center justify-center space-x-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white font-bold py-3 px-4 rounded-xl transition-all transform hover:scale-[1.02] shadow-lg shadow-blue-600/30 disabled:opacity-50 disabled:cursor-not-allowed">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span wire:loading.remove wire:target="descargarProforma">Descargar PDF Proforma</span>
                <span wire:loading wire:target="descargarProforma">Generando...</span>
            </button>
            
            {{-- Botón: Descargar Liquidación --}}
            <button wire:click="descargarLiquidacion" wire:loading.attr="disabled"
                class="w-full flex items-center justify-center space-x-3 bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-500 hover:to-emerald-600 text-white font-bold py-3 px-4 rounded-xl transition-all transform hover:scale-[1.02] shadow-lg shadow-green-600/30 disabled:opacity-50 disabled:cursor-not-allowed">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span wire:loading.remove wire:target="descargarLiquidacion">Descargar PDF Liquidación</span>
                <span wire:loading wire:target="descargarLiquidacion">Generando...</span>
            </button>
        </div>

        {{-- ============================================================
             BOTÓN WHATSAPP
             ============================================================ --}}
        @php
            $mensajeWA = "Hola! Vi el cálculo de impuestos de \${$resultado} USD";
            $mensajeWA .= " para " . count($carrito) . " producto(s).";
            $mensajeWA .= " Me gustaría más información.";
        @endphp
        
        <a href="https://wa.me/5491123456789?text={{ urlencode($mensajeWA) }}" 
           target="_blank"
           class="w-full flex items-center justify-center space-x-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-400 hover:to-green-500 text-white font-bold py-3 px-4 rounded-xl transition-all transform hover:scale-[1.02] shadow-lg shadow-green-500/30">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            <span>Consultar por WhatsApp</span>
        </a>

    @else
        {{-- Estado Vacío --}}
        <div class="text-center py-16">
            <div class="w-20 h-20 mx-auto mb-6 bg-yellow-500/5 border-2 border-yellow-500/20 rounded-full flex items-center justify-center">
                <svg class="w-10 h-10 text-yellow-500/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                </svg>
            </div>
            <p class="text-gray-500 text-sm font-medium mb-2">Agrega productos al carrito</p>
            <p class="text-gray-600 text-xs">1. Busca tu producto</p>
            <p class="text-gray-600 text-xs">2. Ingresa los valores CIF</p>
            <p class="text-gray-600 text-xs">3. Agrega al carrito</p>
            <p class="text-gray-600 text-xs">4. Repite para más productos</p>
            <p class="text-gray-600 text-xs">5. Haz clic en Calcular</p>
        </div>
    @endif
</div>
