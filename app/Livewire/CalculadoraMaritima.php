<?php

namespace App\Livewire;

use Livewire\Component;

class CalculadoraMaritima extends Component
{
    // Tipo de carga visible en la UI (LCL por defecto)
    public $tipoCarga = 'lcl';

    // Inputs generales
    public $peso, $volumen, $valorMercancia;
    public $largo, $ancho, $alto;
    public $origen = '';
    public $destino = '';
    
    // Calculador de volumen LCL
    public $volumenCalculado = null;

    // Resultado global
    public $resultado = null;
    public $desglose = [];
    public $fecha; // Fecha de generación de cotización
    
    // Estado de interacción con precio
    public $mostrarPregunta = false;
    public $respuestaUsuario = null; // 'si' o 'no'
    
    // FCL: Búsqueda de puertos
    public $searchPOL = ''; // Puerto Origen búsqueda
    public $searchPOD = ''; // Puerto Destino búsqueda
    public $polCode = ''; // Código seleccionado
    public $podCode = ''; // Código seleccionado
    public $polSuggestions = [];
    public $podSuggestions = [];
    public $showPOLDropdown = false;
    public $showPODDropdown = false;
    
    // FCL: Resultados de cotizaciones
    public $fclRates = [];
    public $loadingRates = false;

    // Tarifas configurables (puedes modificarlas para tu negocio)
    public $tarifaBase = 500;
    public $tarifaKg = 2.5;
    public $tarifaM3 = 50;

    // =======================================================
    //              CALCULAR COTIZACIÓN PRINCIPAL
    // =======================================================
    public function calcular()
    {
        $this->validate([
            'peso' => 'required|numeric|min:1',
            'volumen' => 'required|numeric|min:0.01',
            'valorMercancia' => 'nullable|numeric|min:0',
        ],[
            'peso.required' => 'Debe ingresar el peso.',
            'volumen.required' => 'Debe ingresar el volumen o calcularlo.',
        ]);
        
        // Reiniciar estado de pregunta
        $this->mostrarPregunta = false;
        $this->respuestaUsuario = null;
        
        // Generar fecha actual
        $this->fecha = now()->format('d/m/Y H:i');

        if($this->tipoCarga === 'lcl'){
            $total = $this->calcularLCL();
        }

        $this->resultado = number_format($total,2,'.',',');
        $this->mostrarPregunta = true;
        session()->flash('success','Cotización generada correctamente.');
    }

    // =======================================================
    //                    CÁLCULO LCL
    // =======================================================
    private function calcularLCL()
    {
        $costoPeso = $this->peso * $this->tarifaKg;
        $costoVolumen = $this->volumen * $this->tarifaM3;
        $seguro = $this->valorMercancia > 0 ? $this->valorMercancia * 0.02 : 0;

        $total = $this->tarifaBase + $costoPeso + $costoVolumen + $seguro;

        // Enviado al blade como desglose
        $this->desglose = [
            "Tarifa Base" => $this->tarifaBase,
            "Costo por Peso (kg)" => $costoPeso,
            "Costo por Volumen (m³)" => $costoVolumen,
            "Seguro (2%)" => $seguro,
        ];

        return $total;
    }

    // =======================================================
    //       CALCULAR VOLUMEN AUTOMÁTICO DESDE cm
    // =======================================================
    public function calcularVolumen()
    {
        if($this->largo && $this->ancho && $this->alto){
            $this->volumen = number_format(($this->largo * $this->ancho * $this->alto)/1000000,3,'.','');
        }
    }
    
    /**
     * Responder a la pregunta del precio
     */
    public function responder($respuesta)
    {
        $this->respuestaUsuario = $respuesta;
    }
    
    /**
     * Generar PDF de cotización
     */
    public function descargarPDF()
    {
        return redirect()->route('cotizacion.pdf', [
            'tipoCarga' => $this->tipoCarga,
            'peso' => $this->peso,
            'volumen' => $this->volumen,
            'origen' => $this->origen,
            'destino' => $this->destino,
            'valorMercancia' => $this->valorMercancia,
            'resultado' => $this->resultado,
            'desglose' => json_encode($this->desglose),
        ]);
    }
    
    
    // =======================================================
    //              MÉTODOS FCL - BÚSQUEDA DE PUERTOS
    // =======================================================
    
    /**
     * Método público para buscar puertos POL (llamado desde Alpine.js)
     */
    public function searchPOLPorts($value)
    {
        $this->searchPOL = $value;
        $this->updatedSearchPOL($value);
    }
    
    /**
     * Método público para buscar puertos POD (llamado desde Alpine.js)
     */
    public function searchPODPorts($value)
    {
        $this->searchPOD = $value;
        $this->updatedSearchPOD($value);
    }
    
    /**
     * Buscar puertos de origen (POL) mientras el usuario escribe
     */
    public function updatedSearchPOL($value)
    {
        // Si ya hay un código seleccionado y coincide, no buscar
        if ($this->polCode && str_starts_with($value, $this->polCode . ' - ')) {
            return;
        }
        
        // Si el usuario borra el texto seleccionado, limpiar el código
        if ($this->polCode && strlen($value) < 5) {
            $this->polCode = '';
        }
        
        if (strlen($value) < 2) {
            $this->polSuggestions = [];
            $this->showPOLDropdown = false;
            return;
        }
        
        $this->polSuggestions = $this->searchPorts($value);
        $this->showPOLDropdown = count($this->polSuggestions) > 0;
    }
    
    /**
     * Buscar puertos de destino (POD) mientras el usuario escribe
     */
    public function updatedSearchPOD($value)
    {
        // Si ya hay un código seleccionado y coincide, no buscar
        if ($this->podCode && str_starts_with($value, $this->podCode . ' - ')) {
            return;
        }
        
        // Si el usuario borra el texto seleccionado, limpiar el código
        if ($this->podCode && strlen($value) < 5) {
            $this->podCode = '';
        }
        
        if (strlen($value) < 2) {
            $this->podSuggestions = [];
            $this->showPODDropdown = false;
            return;
        }
        
        $this->podSuggestions = $this->searchPorts($value);
        $this->showPODDropdown = count($this->podSuggestions) > 0;
    }
    
    /**
     * Seleccionar puerto de origen
     */
    public function selectPOL($code, $name)
    {
        $this->polCode = $code;
        $this->searchPOL = $code . ' - ' . $name;
        $this->showPOLDropdown = false;
        $this->polSuggestions = [];
        
        // Forzar la actualización del componente Livewire
        $this->js('$wire.$refresh()');
        
        // Buscar tarifas si ambos puertos están seleccionados
        if ($this->polCode && $this->podCode) {
            $this->buscarTarifasFCL();
        }
    }
    
    /**
     * Seleccionar puerto de destino
     */
    public function selectPOD($code, $name)
    {
        $this->podCode = $code;
        $this->searchPOD = $code . ' - ' . $name;
        $this->showPODDropdown = false;
        $this->podSuggestions = [];
        
        // Forzar la actualización del componente Livewire
        $this->js('$wire.$refresh()');
        
        // Buscar tarifas si ambos puertos están seleccionados
        if ($this->polCode && $this->podCode) {
            $this->buscarTarifasFCL();
        }
    }
    
    /**
     * Búsqueda de puertos (lista hardcoded común)
     * TODO: Reemplazar con API real o base de datos
     */
    private function searchPorts($query)
    {
        $ports = [
            ['code' => 'CNSZN', 'name' => 'SHEN ZHEN-深圳', 'country' => 'China'],
            ['code' => 'CNGUA', 'name' => 'GUANG ZHOU-广州', 'country' => 'China'],
            ['code' => 'CNSHA', 'name' => 'SHANG HAI-上海', 'country' => 'China'],
            ['code' => 'HKHKG', 'name' => 'HONG KONG-香港', 'country' => 'Hong Kong'],
            ['code' => 'CNXMN', 'name' => 'XIA MEN-厦门', 'country' => 'China'],
            ['code' => 'CNNBO', 'name' => 'NING BO-宁波', 'country' => 'China'],
            ['code' => 'CNQIN', 'name' => 'QING DAO-青岛', 'country' => 'China'],
            ['code' => 'CNTJN', 'name' => 'TIAN JIN-天津', 'country' => 'China'],
            ['code' => 'SGSGP', 'name' => 'Singapore', 'country' => 'Singapore'],
            ['code' => 'USNYC', 'name' => 'New York', 'country' => 'United States'],
            ['code' => 'USLAX', 'name' => 'Los Angeles', 'country' => 'United States'],
            ['code' => 'NLRTM', 'name' => 'Rotterdam', 'country' => 'Netherlands'],
            ['code' => 'DEHAM', 'name' => 'Hamburg', 'country' => 'Germany'],
            ['code' => 'AREZE', 'name' => 'Buenos Aires', 'country' => 'Argentina'],
            ['code' => 'CLSAI', 'name' => 'Valparaíso', 'country' => 'Chile'],
            ['code' => 'BRSSZ', 'name' => 'Santos', 'country' => 'Brazil'],
        ];
        
        $query = strtolower($query);
        return array_values(array_filter($ports, function($port) use ($query) {
            return str_contains(strtolower($port['name']), $query) ||
                   str_contains(strtolower($port['code']), $query) ||
                   str_contains(strtolower($port['country']), $query);
        }));
    }
    
    /**
     * Buscar tarifas FCL usando los códigos POL/POD
     */
    public function buscarTarifasFCL()
    {
        $this->loadingRates = true;
        
        // TODO: Reemplazar con llamada real a API 5688.com o base de datos
        // Simulación de respuesta basada en el JSON de ejemplo
        
        $this->fclRates = [
            [
                'validUntil' => '2025-12-14',
                'shippingLine' => 'IALDIR',
                'price' => ['gp20' => '350', 'gp40' => '590', 'hq40' => '590'],
                'closing' => '4',
                'transitTime' => '3',
            ],
            [
                'validUntil' => '2025-12-14',
                'shippingLine' => 'COSCODIR',
                'price' => ['gp20' => '420', 'gp40' => '620', 'hq40' => '620'],
                'closing' => '6',
                'transitTime' => '4',
            ],
            [
                'validUntil' => '2025-12-14',
                'shippingLine' => 'HMMDIR',
                'price' => ['gp20' => '505', 'gp40' => '710', 'hq40' => '710'],
                'closing' => '4',
                'transitTime' => '4',
            ],
        ];
        
        $this->loadingRates = false;
    }

    public function limpiar()
    {
        $this->reset(['peso','volumen','largo','ancho','alto','valorMercancia','resultado','desglose','mostrarPregunta','respuestaUsuario']);
        
        // Limpiar también datos FCL
        if ($this->tipoCarga === 'fcl') {
            $this->reset(['searchPOL', 'searchPOD', 'polCode', 'podCode', 'fclRates', 'polSuggestions', 'podSuggestions', 'showPOLDropdown', 'showPODDropdown']);
        }
    }

    public function render()
    {
        return view('livewire.calculadora-maritima')
            ->layout('layouts.app',['title'=>'Calculadora Marítima']);
    }
}
