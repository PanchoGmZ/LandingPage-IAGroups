{{-- 
    ============================================================
    COMPONENTE: Servicio de Destino Final
    ============================================================
    
    DESCRIPCIÓN:
    Selector de destino final de entrega dentro de Bolivia.
    Incluye opciones para La Paz (sin costo) y otros departamentos
    con costos variables según la zona.
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $destinoFinal: string - 'la_paz' u 'otros'
    - $departamentoDestino: string - Departamento seleccionado
    
    ZONAS Y COSTOS:
    - La Paz: Incluido (sin costo adicional)
    - Zona Amazónica (Beni, Pando): +$350
    - Eje Central (Cochabamba, Santa Cruz): +$250
    - Zona Sur (Tarija, Chuquisaca, Potosí, Oruro): +$180
    
    USO:
    @include('livewire.calculadora-maritima.lcl.servicio-destino')
    ============================================================
--}}

<div class="bg-black/20 border border-yellow-500/20 rounded-xl p-5">
    {{-- Título del servicio --}}
    <h4 class="text-white font-semibold text-base mb-4 flex items-center">
        <svg class="w-5 h-5 mr-2 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
        </svg>
        Destino Final de Entrega
    </h4>
    <p class="text-gray-400 text-sm mb-4">¿Dónde se entregará la carga en Bolivia?</p>
    
    <div class="space-y-4">
        {{-- Opción: La Paz (incluido) --}}
        <label class="flex items-center justify-between p-4 bg-black/30 border-2 rounded-lg cursor-pointer transition-all hover:border-yellow-500/50"
            :class="$wire.destinoFinal === 'la_paz' ? 'border-yellow-500 bg-yellow-500/5' : 'border-yellow-500/20'">
            <div class="flex items-center space-x-3">
                <input type="radio" wire:model.live="destinoFinal" value="la_paz" name="destinoFinal"
                    class="w-5 h-5 border-yellow-500/50 bg-black/40 text-yellow-500 focus:ring-2 focus:ring-yellow-500 focus:ring-offset-0 focus:ring-offset-black cursor-pointer">
                <div>
                    <span class="text-white font-medium">La Paz</span>
                    <p class="text-gray-400 text-xs mt-0.5">Entrega sin costo adicional</p>
                </div>
            </div>
            <span class="text-green-400 font-semibold">Incluido</span>
        </label>

        {{-- Opción: Otros Departamentos --}}
        <div class="border-2 rounded-lg transition-all"
            :class="$wire.destinoFinal !== 'tarija' ? 'border-yellow-500 bg-yellow-500/5' : 'border-yellow-500/20 bg-black/30'">
            <label class="flex items-center justify-between p-4 cursor-pointer">
                <div class="flex items-center space-x-3 flex-1">
                    <input type="radio" wire:model.live="destinoFinal" value="otros" name="destinoFinal"
                        class="w-5 h-5 border-yellow-500/50 bg-black/40 text-yellow-500 focus:ring-2 focus:ring-yellow-500 focus:ring-offset-0 focus:ring-offset-black cursor-pointer">
                    <div class="flex-1">
                        <span class="text-white font-medium">Otros Departamentos</span>
                        <p class="text-gray-400 text-xs mt-0.5">Selecciona el departamento de destino</p>
                    </div>
                </div>
                {{-- Mostrar costo según departamento seleccionado --}}
                @if($destinoFinal !== 'la_paz' && $departamentoDestino)
                    <span class="text-yellow-400 font-bold text-lg ml-4">
                        @if($departamentoDestino === 'beni' || $departamentoDestino === 'pando')
                            +$350
                        @elseif($departamentoDestino === 'cochabamba' || $departamentoDestino === 'santa_cruz')
                            +$250
                        @else
                            +$180
                        @endif
                    </span>
                @endif
            </label>

            {{-- Select de departamentos (visible solo cuando se selecciona "otros") --}}
            @if($destinoFinal !== 'la_paz')
            <div class="px-4 pb-4 pt-2 border-t border-yellow-500/20">
                <label class="block text-xs font-medium text-gray-400 mb-2">Seleccionar Departamento:</label>
                <select wire:model.live="departamentoDestino"
                    class="w-full px-4 py-3 bg-black/60 border border-yellow-500/40 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all">
                    <option value="">-- Selecciona un departamento --</option>
                    <optgroup label="🌴 Zona Amazónica (Mayor costo - $350)">
                        <option value="beni">Beni</option>
                        <option value="pando">Pando</option>
                    </optgroup>
                    <optgroup label="🏙️ Eje Central (Costo medio - $250)">
                        <option value="cochabamba">Cochabamba</option>
                        <option value="santa_cruz">Santa Cruz</option>
                    </optgroup>
                    <optgroup label="⛰️ Zona Sur (Costo estándar - $180)">
                        <option value="tarija">Tarija</option>
                        <option value="chuquisaca">Chuquisaca</option>
                        <option value="potosi">Potosí</option>
                        <option value="oruro">Oruro</option>
                    </optgroup>
                </select>

                {{-- Información de tiempo de entrega --}}
                @if($departamentoDestino)
                <div class="mt-3 p-3 bg-yellow-500/10 border border-yellow-500/30 rounded-lg">
                    <p class="text-yellow-300 text-xs flex items-start">
                        <svg class="w-4 h-4 mr-1 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        <span>
                            @if($departamentoDestino === 'beni' || $departamentoDestino === 'pando')
                                Zona amazónica: Tiempo de entrega extendido de 5-8 días adicionales por logística especial.
                            @elseif($departamentoDestino === 'cochabamba' || $departamentoDestino === 'santa_cruz')
                                Eje central: Tiempo de entrega de 3-5 días adicionales con rutas principales.
                            @else
                                Zona sur: Tiempo de entrega de 2-4 días adicionales.
                            @endif
                        </span>
                    </p>
                </div>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>
