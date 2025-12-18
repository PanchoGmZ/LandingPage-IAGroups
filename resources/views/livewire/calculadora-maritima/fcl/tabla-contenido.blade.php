{{-- 
    ============================================================
    COMPONENTE: CONTENIDO DE TABLA DE TARIFAS
    ============================================================
    Estructura de la tabla con headers y filas dinámicas.
    
    NOTA PARA BACKEND:
    Columnas disponibles (modificar según campos de API):
    - shippingLine: Nombre de la naviera
    - price.gp20: Precio contenedor 20' Standard
    - price.gp40: Precio contenedor 40' Dry/HighCube
    - price.hq40: Precio contenedor 40' NOR
    - transitTime: Días de tránsito
    - closing: Días para cierre
    - validUntil: Fecha de validez
    ============================================================
--}}

{{-- Incluir estilos personalizados --}}
@include('livewire.calculadora-maritima.fcl.estilos')

<div class="overflow-x-auto -mx-6 px-6 custom-scrollbar">
    <table class="w-full">
        {{-- ====== ENCABEZADOS DE COLUMNAS ====== --}}
        <thead>
            <tr class="border-b-2 border-yellow-500/30">
                {{-- Columna: Naviera --}}
                <th class="text-left py-3 px-3 text-xs font-bold text-yellow-500 uppercase">
                    <div class="flex items-center space-x-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3z"/>
                        </svg>
                        <span>Naviera</span>
                    </div>
                </th>
                
                {{-- Columna: 20' Standard --}}
                <th class="text-center py-3 px-2 text-xs font-bold text-yellow-500 uppercase">
                    <div class="whitespace-nowrap">20' ST</div>
                    <div class="text-gray-400 font-normal text-[9px]">Standard</div>
                </th>
                
                {{-- Columna: 40' Dry/HighCube --}}
                <th class="text-center py-3 px-2 text-xs font-bold text-yellow-500 uppercase">
                    <div class="whitespace-nowrap">40' D/HQ</div>
                    <div class="text-gray-400 font-normal text-[9px]">Dry/HighCube</div>
                </th>
                
                {{-- Columna: 40' NOR --}}
                <th class="text-center py-3 px-2 text-xs font-bold text-yellow-500 uppercase">
                    <div class="whitespace-nowrap">40' NOR</div>
                    <div class="text-gray-400 font-normal text-[9px]">Normal</div>
                </th>
                
                {{-- Columna: Tránsito --}}
                <th class="text-center py-3 px-2 text-xs font-bold text-yellow-500 uppercase">
                    <div class="flex items-center justify-center space-x-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="whitespace-nowrap">Tránsito</span>
                    </div>
                    <div class="text-gray-400 font-normal text-[9px]">Días</div>
                </th>
                
                {{-- Columna: Válido Hasta --}}
                <th class="text-center py-3 px-2 text-xs font-bold text-yellow-500 uppercase">
                    <div class="flex items-center justify-center space-x-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        <span>Válido</span>
                    </div>
                </th>
            </tr>
        </thead>
        
        {{-- ====== FILAS DE DATOS ====== --}}
        <tbody>
            <template x-for="(rate, index) in paginatedRates" :key="index">
                <tr 
                    class="border-b border-yellow-500/10 hover:bg-yellow-500/5 transition-all duration-200 group cursor-pointer"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-x-4"
                    x-transition:enter-end="opacity-100 transform translate-x-0"
                    :style="'transition-delay: ' + (index * 50) + 'ms;'">
                    
                    {{-- Celda: Naviera --}}
                    <td class="py-3 px-3">
                        <div class="flex items-center space-x-2">
                            {{-- Ícono de naviera --}}
                            <div class="w-10 h-10 bg-yellow-500/10 rounded-lg flex items-center justify-center flex-shrink-0 border border-yellow-500/20 group-hover:bg-yellow-500/20 transition-colors">
                                <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3z"/>
                                </svg>
                            </div>
                            {{-- Info de naviera --}}
                            <div class="min-w-0">
                                <div class="text-white font-bold text-sm truncate" x-text="rate.shippingLine"></div>
                                <div class="text-[9px] text-gray-500 flex items-center space-x-1">
                                    <svg class="w-2.5 h-2.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>Cierre: <span x-text="rate.closing"></span>d</span>
                                </div>
                            </div>
                        </div>
                    </td>
                    
                    {{-- Celda: Precio 20' --}}
                    <td class="py-3 px-2 text-center">
                        <div class="text-yellow-400 font-bold text-base whitespace-nowrap">
                            <div class="text-[9px] text-gray-500">USD</div>
                            <span x-text="rate.price.gp20 || 'N/A'"></span>
                        </div>
                    </td>
                    
                    {{-- Celda: Precio 40' D/HQ --}}
                    <td class="py-3 px-2 text-center">
                        <div class="text-yellow-400 font-bold text-base whitespace-nowrap">
                            <div class="text-[9px] text-gray-500">USD</div>
                            <span x-text="rate.price.gp40 || 'N/A'"></span>
                        </div>
                    </td>
                    
                    {{-- Celda: Precio 40' NOR --}}
                    <td class="py-3 px-2 text-center">
                        <div class="text-yellow-400 font-bold text-base whitespace-nowrap">
                            <div class="text-[9px] text-gray-500">USD</div>
                            <span x-text="rate.price.hq40 || 'N/A'"></span>
                        </div>
                    </td>
                    
                    {{-- Celda: Días de tránsito --}}
                    <td class="py-3 px-2 text-center">
                        <div class="inline-flex flex-col items-center bg-yellow-500/10 rounded-lg px-2 py-1 border border-yellow-500/20">
                            <div class="text-yellow-400 font-bold text-base" x-text="rate.transitTime"></div>
                            <div class="text-[9px] text-gray-400">días</div>
                        </div>
                    </td>
                    
                    {{-- Celda: Fecha de validez --}}
                    <td class="py-3 px-2 text-center">
                        <div class="text-[10px] text-gray-300 font-medium whitespace-nowrap" x-text="rate.validUntil"></div>
                    </td>
                </tr>
            </template>
        </tbody>
    </table>
</div>
