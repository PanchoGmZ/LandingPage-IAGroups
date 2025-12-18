{{-- 
    ============================================================
    COMPONENTE: Servicio de Recojo de Almacén
    ============================================================
    
    DESCRIPCIÓN:
    Checkbox para agregar servicio de recojo desde almacén (+$150).
    
    VARIABLES LIVEWIRE REQUERIDAS:
    - $recojoAlmacen: boolean
    
    USO:
    @include('livewire.calculadora-maritima.lcl.servicio-recojo')
    ============================================================
--}}

<div class="bg-black/20 border border-yellow-500/20 rounded-xl p-5">
    <div class="flex items-start space-x-4">
        <input type="checkbox" wire:model="recojoAlmacen" id="recojoAlmacen"
            class="mt-1 w-5 h-5 rounded border-yellow-500/50 bg-black/40 text-yellow-500 focus:ring-2 focus:ring-yellow-500 focus:ring-offset-0 focus:ring-offset-black cursor-pointer">
        <div class="flex-1">
            <label for="recojoAlmacen" class="flex items-center justify-between cursor-pointer">
                <div>
                    <h4 class="text-white font-semibold text-base flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                        Recojo desde Almacén
                    </h4>
                    <p class="text-gray-400 text-sm mt-1">
                        La carga será recogida desde un almacén antes de ser enviada al puerto
                    </p>
                </div>
                <span class="text-yellow-400 font-bold text-lg ml-4">+$150</span>
            </label>
            
            {{-- Confirmación cuando está seleccionado --}}
            @if($recojoAlmacen)
            <div class="mt-3 p-3 bg-yellow-500/10 border border-yellow-500/30 rounded-lg">
                <p class="text-yellow-300 text-xs flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Servicio incluido: Recojo, embalaje y transporte al puerto
                </p>
            </div>
            @endif
        </div>
    </div>
</div>
