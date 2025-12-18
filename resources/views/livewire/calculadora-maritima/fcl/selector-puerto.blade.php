{{-- 
    ============================================================
    COMPONENTE: SELECTOR DE PUERTO
    ============================================================
    Variables requeridas (pasadas via @include):
    - $tipo: 'pol' o 'pod' (Puerto Origen / Puerto Destino)
    - $search: Variable de búsqueda (searchPOL o searchPOD)
    - $code: Código del puerto seleccionado
    - $showDropdown: Controla visibilidad del dropdown
    - $suggestions: Lista de puertos sugeridos
    
    Eventos Livewire:
    - selectPOL / selectPOD: Al seleccionar un puerto
    ============================================================
--}}

@php
    // Valores por defecto si no se pasan
    $tipo = $tipo ?? 'pol';
    $search = $search ?? '';
    $code = $code ?? '';
    $showDropdown = $showDropdown ?? false;
    $suggestions = $suggestions ?? [];
    
    $esPOL = $tipo === 'pol';
    $label = $esPOL ? 'Puerto de Origen (POL)' : 'Puerto de Destino (POD)';
    $placeholder = $esPOL ? 'Buscar: Shenzhen, CNSZN, China...' : 'Buscar: Singapore, SGSGP, USA...';
    $wireModel = $esPOL ? 'searchPOL' : 'searchPOD';
    $wireKey = $esPOL ? "input-pol-{$code}" : "input-pod-{$code}";
    $dropdownVar = $esPOL ? 'showPOLDropdown' : 'showPODDropdown';
    $selectMethod = $esPOL ? 'selectPOL' : 'selectPOD';
    $zIndex = $esPOL ? 'z-[60]' : 'z-[50]';
    $dropdownPosition = $esPOL ? 'left: 0;' : 'right: 0;';
@endphp

<div class="relative {{ $zIndex }}">
    {{-- Label del campo --}}
    <label class="block text-sm font-medium text-gray-300 mb-2">
        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
        </svg>
        {{ $label }}
    </label>
    
    {{-- Input de búsqueda --}}
    <input 
        type="text" 
        wire:model.live="{{ $wireModel }}"
        wire:key="{{ $wireKey }}"
        x-data
        x-on:click.away="$wire.{{ $dropdownVar }} = false"
        placeholder="{{ $placeholder }}"
        class="w-full px-4 py-3 bg-black/40 border border-yellow-500/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all"
        autocomplete="off">
    
    {{-- Dropdown de Sugerencias --}}
    @if($showDropdown && count($suggestions) > 0)
        <div class="absolute z-[9999] w-full mt-1 bg-black border-2 border-yellow-500 rounded-lg shadow-2xl overflow-hidden" 
             x-data="{ activeRegion: null }"
             style="min-width: 800px; {{ $dropdownPosition }}">
            
            {{-- Pestañas de Regiones --}}
            @php
                $regions = collect($suggestions)->pluck('region')->unique()->values();
            @endphp
            
            <div class="border-b border-yellow-500/50 bg-black p-3">
                <div class="flex flex-wrap gap-2">
                    @foreach($regions as $region)
                        <button 
                            type="button"
                            @click="activeRegion = activeRegion === '{{ $region }}' ? null : '{{ $region }}'"
                            :class="activeRegion === '{{ $region }}' ? 'bg-yellow-500 text-black' : 'bg-black text-yellow-500 hover:bg-yellow-500/20'"
                            class="px-4 py-2 rounded text-sm font-medium transition-all border border-yellow-500">
                            {{ $region }}
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- Lista de Puertos por Región --}}
            <div class="max-h-80 overflow-y-auto p-3 bg-black">
                @foreach($regions as $region)
                    <div x-show="activeRegion === '{{ $region }}' || activeRegion === null">
                        <div class="mb-4">
                            <h4 class="text-xs font-bold text-yellow-500 uppercase mb-2 px-2" x-show="activeRegion === null">
                                {{ $region }}
                            </h4>
                            <div class="grid grid-cols-4 gap-2">
                                @foreach($suggestions as $port)
                                    @if($port['region'] === $region)
                                        <button 
                                            type="button"
                                            wire:click="{{ $selectMethod }}('{{ $port['code'] }}', '{{ $port['name'] }}')"
                                            class="text-left px-3 py-2 hover:bg-yellow-500/20 rounded transition-colors text-sm text-yellow-500 hover:text-yellow-400 border border-transparent hover:border-yellow-500/50">
                                            {{ $port['name'] }}
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    
    {{-- Indicador de Selección --}}
    @if($code)
        <p class="text-xs text-green-400 mt-1 flex items-center">
            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            Seleccionado: {{ $code }}
        </p>
    @endif
</div>
