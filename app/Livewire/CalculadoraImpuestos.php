<?php

namespace App\Livewire;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class CalculadoraImpuestos extends Component
{
    // =======================================================
    //              DATOS DE ENTRADA - FORMULARIO LCL
    // =======================================================
    public $peso = '';
    public $volumen = '';
    public $valorMercancia = '';
    public $valorFlete = '';
    public $valorSeguro = '';
    
    // Calculador de volumen
    public $largo = '';
    public $ancho = '';
    public $alto = '';
    public $cantidadBultos = 1;
    
    // =======================================================
    //              BUSCADOR DE PRODUCTOS/ARANCELES
    // =======================================================
    public $searchProducto = '';
    public $productosSugeridos = [];
    public $showProductoDropdown = false;
    public $productoSeleccionado = null;
    public $codigoHS = '';
    public $descripcionProducto = '';
    
    // =======================================================
    //              CARRITO DE PRODUCTOS (MÚLTIPLES)
    // =======================================================
    public $carrito = [];
    public $editandoProductoIndex = null;
    
    // Diccionario de sinónimos para búsqueda inteligente
    private $sinonimos = [
        // Animales
        'vaca' => ['bovino', 'bovinos', 'vacuno', 'ganado', 'res'],
        'vacas' => ['bovino', 'bovinos', 'vacuno', 'ganado', 'res'],
        'toro' => ['bovino', 'bovinos', 'vacuno', 'ganado'],
        'res' => ['bovino', 'bovinos', 'vacuno', 'carne'],
        'chancho' => ['cerdo', 'porcino', 'porcinos', 'cochino', 'marrano'],
        'cerdo' => ['porcino', 'porcinos', 'chancho', 'cochino', 'marrano'],
        'puerco' => ['cerdo', 'porcino', 'porcinos', 'chancho'],
        'pollo' => ['gallina', 'ave', 'aves', 'gallos'],
        'gallina' => ['pollo', 'ave', 'aves', 'gallos'],
        'oveja' => ['ovino', 'ovinos', 'cordero', 'borrego'],
        'cordero' => ['ovino', 'ovinos', 'oveja', 'borrego'],
        'cabra' => ['caprino', 'caprinos', 'chivo'],
        'chivo' => ['caprino', 'caprinos', 'cabra'],
        'caballo' => ['equino', 'caballar', 'yegua', 'potro'],
        'burro' => ['asno', 'mula', 'mular'],
        'llama' => ['camélido', 'camélidos', 'alpaca', 'guanaco'],
        'alpaca' => ['camélido', 'camélidos', 'llama', 'guanaco'],
        'pez' => ['pescado', 'pescados', 'peces'],
        'pescado' => ['pez', 'peces', 'pescados'],
        'camarón' => ['crustáceo', 'crustáceos', 'langostino', 'gambas'],
        'langosta' => ['crustáceo', 'crustáceos', 'bogavante'],
        
        // Carnes
        'carne' => ['res', 'bovino', 'cerdo', 'pollo', 'carnes'],
        'bistec' => ['carne', 'bovino', 'res', 'filete'],
        'chuleta' => ['carne', 'cerdo', 'porcino', 'costilla'],
        'tocino' => ['cerdo', 'porcino', 'bacon', 'panceta'],
        'jamón' => ['cerdo', 'porcino', 'pierna'],
        'salchicha' => ['embutido', 'cerdo', 'porcino'],
        
        // Lácteos
        'leche' => ['lácteo', 'lácteos', 'nata', 'crema'],
        'queso' => ['lácteo', 'lácteos', 'requesón'],
        'yogurt' => ['lácteo', 'lácteos', 'yogur', 'fermentado'],
        'yogur' => ['lácteo', 'lácteos', 'yogurt', 'fermentado'],
        'mantequilla' => ['lácteo', 'lácteos', 'manteca', 'grasa'],
        'crema' => ['nata', 'lácteo', 'lácteos'],
        
        // Huevos
        'huevo' => ['huevos', 'yema', 'clara', 'gallina'],
        'huevos' => ['huevo', 'yema', 'clara', 'gallina'],
        
        // Miel
        'miel' => ['abeja', 'apícola', 'natural'],
        
        // Frutas
        'manzana' => ['fruta', 'frutas', 'poma'],
        'naranja' => ['fruta', 'frutas', 'cítrico', 'cítricos'],
        'limón' => ['fruta', 'frutas', 'cítrico', 'cítricos', 'lima'],
        'banana' => ['fruta', 'frutas', 'plátano', 'banano'],
        'plátano' => ['fruta', 'frutas', 'banana', 'banano'],
        'uva' => ['fruta', 'frutas', 'vid', 'viña'],
        'fresa' => ['fruta', 'frutas', 'frutilla', 'baya'],
        'frutilla' => ['fruta', 'frutas', 'fresa', 'baya'],
        'palta' => ['aguacate', 'fruta', 'frutas'],
        'aguacate' => ['palta', 'fruta', 'frutas'],
        'piña' => ['fruta', 'frutas', 'ananá', 'ananás'],
        'ananá' => ['fruta', 'frutas', 'piña'],
        
        // Verduras
        'papa' => ['patata', 'tubérculo', 'verdura'],
        'patata' => ['papa', 'tubérculo', 'verdura'],
        'tomate' => ['verdura', 'hortaliza', 'jitomate'],
        'jitomate' => ['tomate', 'verdura', 'hortaliza'],
        'cebolla' => ['verdura', 'hortaliza', 'bulbo'],
        'ajo' => ['verdura', 'hortaliza', 'bulbo'],
        'zanahoria' => ['verdura', 'hortaliza', 'raíz'],
        'lechuga' => ['verdura', 'hortaliza', 'hoja'],
        'choclo' => ['maíz', 'elote', 'cereal'],
        'maíz' => ['choclo', 'elote', 'cereal'],
        'elote' => ['maíz', 'choclo', 'cereal'],
        'poroto' => ['frijol', 'judía', 'legumbre', 'alubia'],
        'frijol' => ['poroto', 'judía', 'legumbre', 'alubia'],
        'arveja' => ['guisante', 'chícharo', 'legumbre'],
        'guisante' => ['arveja', 'chícharo', 'legumbre'],
        
        // Cereales y granos
        'trigo' => ['cereal', 'cereales', 'grano', 'harina'],
        'arroz' => ['cereal', 'cereales', 'grano'],
        'avena' => ['cereal', 'cereales', 'grano'],
        'cebada' => ['cereal', 'cereales', 'grano', 'malta'],
        'quinua' => ['cereal', 'cereales', 'grano', 'quinoa'],
        'quinoa' => ['quinua', 'cereal', 'cereales', 'grano'],
        'soya' => ['soja', 'legumbre', 'oleaginosa'],
        'soja' => ['soya', 'legumbre', 'oleaginosa'],
        
        // Tecnología
        'celular' => ['teléfono', 'móvil', 'smartphone', 'telefono'],
        'teléfono' => ['celular', 'móvil', 'smartphone', 'telefono'],
        'telefono' => ['celular', 'móvil', 'smartphone', 'teléfono'],
        'computadora' => ['ordenador', 'pc', 'laptop', 'computador'],
        'computador' => ['computadora', 'ordenador', 'pc', 'laptop'],
        'laptop' => ['portátil', 'notebook', 'computadora'],
        'notebook' => ['laptop', 'portátil', 'computadora'],
        'tablet' => ['tableta', 'ipad'],
        'tableta' => ['tablet', 'ipad'],
        'televisor' => ['tv', 'televisión', 'tele'],
        'tv' => ['televisor', 'televisión', 'tele'],
        'pantalla' => ['monitor', 'display', 'lcd', 'led'],
        'monitor' => ['pantalla', 'display'],
        'cámara' => ['camara', 'fotográfica', 'fotografica'],
        'camara' => ['cámara', 'fotográfica', 'fotografica'],
        'impresora' => ['printer', 'impresor'],
        'auriculares' => ['audífonos', 'audifonos', 'headphones', 'cascos'],
        'audífonos' => ['auriculares', 'audifonos', 'headphones'],
        
        // Textiles
        'ropa' => ['vestimenta', 'prendas', 'textil', 'confección'],
        'camisa' => ['prenda', 'textil', 'ropa'],
        'pantalón' => ['prenda', 'textil', 'ropa', 'pantalon'],
        'vestido' => ['prenda', 'textil', 'ropa'],
        'zapatos' => ['calzado', 'zapato'],
        'calzado' => ['zapatos', 'zapato', 'botas'],
        'tela' => ['tejido', 'textil', 'género'],
        'algodón' => ['algodon', 'textil', 'fibra'],
        'lana' => ['textil', 'fibra', 'oveja'],
        
        // Vehículos
        'auto' => ['carro', 'coche', 'automóvil', 'vehículo'],
        'carro' => ['auto', 'coche', 'automóvil', 'vehículo'],
        'coche' => ['auto', 'carro', 'automóvil', 'vehículo'],
        'moto' => ['motocicleta', 'motociclo'],
        'motocicleta' => ['moto', 'motociclo'],
        'camión' => ['camion', 'truck', 'vehículo'],
        'camion' => ['camión', 'truck', 'vehículo'],
        
        // Maquinaria
        'máquina' => ['maquina', 'maquinaria', 'equipo'],
        'maquina' => ['máquina', 'maquinaria', 'equipo'],
        'tractor' => ['maquinaria', 'agrícola', 'agricola'],
        'motor' => ['motores', 'mecánico'],
        
        // Químicos y farmacéuticos
        'medicamento' => ['medicina', 'fármaco', 'farmaco', 'droga'],
        'medicina' => ['medicamento', 'fármaco', 'farmaco'],
        'jabón' => ['jabon', 'detergente', 'limpieza'],
        'jabon' => ['jabón', 'detergente', 'limpieza'],
        'perfume' => ['fragancia', 'colonia', 'cosmético'],
        'cosmético' => ['cosmetico', 'maquillaje', 'belleza'],
        
        // Bebidas
        'cerveza' => ['bebida', 'alcohol', 'fermentado'],
        'vino' => ['bebida', 'alcohol', 'uva'],
        'whisky' => ['bebida', 'alcohol', 'destilado', 'whiskey'],
        'ron' => ['bebida', 'alcohol', 'destilado'],
        'vodka' => ['bebida', 'alcohol', 'destilado'],
        'refresco' => ['gaseosa', 'soda', 'bebida'],
        'gaseosa' => ['refresco', 'soda', 'bebida'],
        'jugo' => ['zumo', 'bebida', 'fruta'],
        'zumo' => ['jugo', 'bebida', 'fruta'],
        'café' => ['cafe', 'bebida'],
        'cafe' => ['café', 'bebida'],
        'té' => ['te', 'bebida', 'infusión'],
        'te' => ['té', 'bebida', 'infusión'],
    ];
    
    // Tasas configurables
    public $tasaArancel = 10; // %
    public $tasaIVA = 14.94; // % (Bolivia: IVA 13% + IT 3% ≈ 14.94% efectivo)
    public $tasaGA = 0; // % Gravamen Arancelario (del JSON)
    public $tasaICE = 0; // % Impuesto al Consumo Específico
    
    // Opciones de cálculo automático Flete/Seguro
    public $calcularFleteAuto = false;
    public $calcularSeguroAuto = false;
    public $porcentajeFlete = 5; // % del FOB
    public $porcentajeSeguro = 2; // % del FOB
    public $tipoCambio = 6.96; // Bs por USD
    
    // Resultado
    public $resultado = null;
    public $desglose = [];
    public $desgloseProductos = []; // Desglose individual por producto
    
    // Estado de interacción
    public $mostrarPregunta = false;
    public $respuestaUsuario = null;
    
    // Aranceles cargados
    private $arancelesData = null;

    // =======================================================
    //              MOUNT - CARGAR ARANCELES
    // =======================================================
    public function mount()
    {
        $this->cargarAranceles();
    }

    private function cargarAranceles()
    {
        $path = base_path('aranceles.json');
        if (file_exists($path)) {
            $json = file_get_contents($path);
            $this->arancelesData = json_decode($json, true);
        }
    }

    // =======================================================
    //              BUSCAR PRODUCTOS
    // =======================================================
    public function updatedSearchProducto($value)
    {
        if (strlen($value) < 2) {
            $this->productosSugeridos = [];
            $this->showProductoDropdown = false;
            return;
        }

        $this->cargarAranceles();
        $this->buscarProductos($value);
        $this->showProductoDropdown = count($this->productosSugeridos) > 0;
    }

    private function buscarProductos($termino)
    {
        $termino = strtolower(trim($termino));
        $resultados = [];
        $terminosBusqueda = [$termino];
        
        // Expandir con sinónimos
        foreach ($this->sinonimos as $palabra => $relacionados) {
            if (strpos($termino, $palabra) !== false) {
                $terminosBusqueda = array_merge($terminosBusqueda, $relacionados);
            }
            // También buscar si el término está en los relacionados
            foreach ($relacionados as $relacionado) {
                if (strpos($termino, $relacionado) !== false) {
                    $terminosBusqueda[] = $palabra;
                    $terminosBusqueda = array_merge($terminosBusqueda, $relacionados);
                }
            }
        }
        
        $terminosBusqueda = array_unique($terminosBusqueda);
        
        if ($this->arancelesData && isset($this->arancelesData['capitulos'])) {
            foreach ($this->arancelesData['capitulos'] as $capitulo) {
                if (isset($capitulo['items'])) {
                    foreach ($capitulo['items'] as $item) {
                        $descripcionLower = strtolower($item['descripcion'] ?? '');
                        $codigoHS = $item['codigo_hs'] ?? '';
                        
                        // Buscar por código HS
                        if (strpos($codigoHS, $termino) !== false) {
                            $resultados[] = [
                                'codigo_hs' => $codigoHS,
                                'descripcion' => $item['descripcion'],
                                'arancel' => $item['arancel'] ?? 0,
                                'capitulo' => $capitulo['numero']
                            ];
                            continue;
                        }
                        
                        // Buscar por descripción y sinónimos
                        foreach ($terminosBusqueda as $busqueda) {
                            if (strpos($descripcionLower, $busqueda) !== false) {
                                $resultados[] = [
                                    'codigo_hs' => $codigoHS,
                                    'descripcion' => $item['descripcion'],
                                    'arancel' => $item['arancel'] ?? 0,
                                    'capitulo' => $capitulo['numero']
                                ];
                                break;
                            }
                        }
                        
                        if (count($resultados) >= 15) break 2;
                    }
                }
            }
        }
        
        // Eliminar duplicados
        $unique = [];
        foreach ($resultados as $item) {
            $unique[$item['codigo_hs']] = $item;
        }
        
        $this->productosSugeridos = array_values($unique);
    }

    public function seleccionarProducto($codigoHS, $descripcion, $arancel)
    {
        // Agregar automáticamente al carrito al seleccionar
        $this->carrito[] = [
            'id' => uniqid(),
            'codigo_hs' => $codigoHS,
            'descripcion' => $descripcion,
            'arancel' => $arancel,
            'valor_fob' => 0,
            'valor_flete' => 0,
            'valor_seguro' => 0,
            'cantidad' => 1,
            'peso' => '',
            'volumen' => '',
        ];
        
        // Limpiar búsqueda para siguiente producto
        $this->searchProducto = '';
        $this->showProductoDropdown = false;
        $this->productosSugeridos = [];
        
        // Seleccionar el último producto agregado para edición
        $this->editandoProductoIndex = count($this->carrito) - 1;
        $this->cargarProductoParaEdicion($this->editandoProductoIndex);
        
        session()->flash('success', 'Producto agregado: ' . $codigoHS);
    }
    
    /**
     * Cargar datos de un producto del carrito al formulario para edición
     */
    private function cargarProductoParaEdicion($index)
    {
        if (isset($this->carrito[$index])) {
            $producto = $this->carrito[$index];
            
            $this->codigoHS = $producto['codigo_hs'];
            $this->descripcionProducto = $producto['descripcion'];
            $this->valorMercancia = $producto['valor_fob'] ?: '';
            $this->valorFlete = $producto['valor_flete'] ?: '';
            $this->valorSeguro = $producto['valor_seguro'] ?: '';
            $this->cantidadBultos = $producto['cantidad'];
            $this->peso = $producto['peso'];
            $this->volumen = $producto['volumen'];
            $this->tasaArancel = $producto['arancel'];
            $this->tasaGA = $producto['arancel'];
            
            $this->productoSeleccionado = [
                'codigo_hs' => $producto['codigo_hs'],
                'descripcion' => $producto['descripcion'],
                'arancel' => $producto['arancel']
            ];
        }
    }

    public function cerrarDropdownProducto()
    {
        $this->showProductoDropdown = false;
    }

    // =======================================================
    //              MÉTODOS DEL CARRITO
    // =======================================================
    
    /**
     * Seleccionar producto del carrito para editar sus valores
     */
    public function seleccionarParaEditar($index)
    {
        $this->editandoProductoIndex = $index;
        $this->cargarProductoParaEdicion($index);
    }
    
    /**
     * Guardar valores del producto que se está editando
     */
    public function guardarValoresProducto()
    {
        if ($this->editandoProductoIndex === null || !isset($this->carrito[$this->editandoProductoIndex])) {
            return;
        }
        
        $valorFOB = floatval($this->valorMercancia ?: 0);
        
        $valorFlete = $this->calcularFleteAuto 
            ? $valorFOB * ($this->porcentajeFlete / 100)
            : floatval($this->valorFlete ?: 0);
            
        $valorSeguro = $this->calcularSeguroAuto 
            ? $valorFOB * ($this->porcentajeSeguro / 100)
            : floatval($this->valorSeguro ?: 0);
        
        $this->carrito[$this->editandoProductoIndex]['valor_fob'] = $valorFOB;
        $this->carrito[$this->editandoProductoIndex]['valor_flete'] = $valorFlete;
        $this->carrito[$this->editandoProductoIndex]['valor_seguro'] = $valorSeguro;
        $this->carrito[$this->editandoProductoIndex]['cantidad'] = $this->cantidadBultos;
        $this->carrito[$this->editandoProductoIndex]['peso'] = $this->peso;
        $this->carrito[$this->editandoProductoIndex]['volumen'] = $this->volumen;
    }
    
    /**
     * Auto-guardar cuando cambian los valores (llamado por wire:model.live)
     */
    public function updatedValorMercancia()
    {
        $this->guardarValoresProducto();
    }
    
    public function updatedValorFlete()
    {
        $this->guardarValoresProducto();
    }
    
    public function updatedValorSeguro()
    {
        $this->guardarValoresProducto();
    }
    
    public function updatedCalcularFleteAuto()
    {
        $this->guardarValoresProducto();
    }
    
    public function updatedCalcularSeguroAuto()
    {
        $this->guardarValoresProducto();
    }
    
    /**
     * Eliminar producto del carrito
     */
    public function eliminarDelCarrito($index)
    {
        if (isset($this->carrito[$index])) {
            unset($this->carrito[$index]);
            $this->carrito = array_values($this->carrito); // Reindexar
            
            // Si el producto eliminado era el que estaba en edición
            if ($this->editandoProductoIndex === $index) {
                $this->editandoProductoIndex = null;
                $this->limpiarFormularioProducto();
            } elseif ($this->editandoProductoIndex !== null && $this->editandoProductoIndex > $index) {
                // Ajustar índice si eliminamos uno anterior
                $this->editandoProductoIndex--;
            }
            
            // Si queda solo un producto, seleccionarlo para edición
            if (count($this->carrito) === 1) {
                $this->seleccionarParaEditar(0);
            } elseif (count($this->carrito) === 0) {
                $this->editandoProductoIndex = null;
                $this->limpiarFormularioProducto();
            }
            
            session()->flash('info', 'Producto eliminado del carrito.');
        }
    }
    
    /**
     * Limpiar solo los campos del formulario de producto (no el carrito)
     */
    public function limpiarFormularioProducto()
    {
        $this->reset([
            'peso', 'volumen', 'valorMercancia', 'valorFlete', 'valorSeguro',
            'largo', 'ancho', 'alto',
            'searchProducto', 'productosSugeridos', 'showProductoDropdown',
            'productoSeleccionado', 'codigoHS', 'descripcionProducto',
        ]);
        $this->cantidadBultos = 1;
        $this->tasaArancel = 10;
        $this->tasaGA = 0;
        $this->calcularFleteAuto = false;
        $this->calcularSeguroAuto = false;
    }
    
    /**
     * Vaciar todo el carrito
     */
    public function vaciarCarrito()
    {
        $this->carrito = [];
        $this->resultado = null;
        $this->desglose = [];
        $this->desgloseProductos = [];
        $this->editandoProductoIndex = null;
        $this->limpiarFormularioProducto();
        session()->flash('info', 'Carrito vaciado.');
    }

    // =======================================================
    //              CALCULAR VOLUMEN
    // =======================================================
    public function calcularVolumen()
    {
        if ($this->largo && $this->ancho && $this->alto) {
            $this->volumen = number_format(($this->largo * $this->ancho * $this->alto) / 1000000, 3, '.', '');
        }
    }

    // =======================================================
    //              CÁLCULO PRINCIPAL DE IMPUESTOS
    // =======================================================
    public function calcular()
    {
        // Verificar si hay productos en el carrito
        if (count($this->carrito) === 0) {
            session()->flash('error', 'Selecciona al menos un producto de la lista.');
            return;
        }
        
        // Guardar valores del producto en edición antes de calcular
        $this->guardarValoresProducto();
        
        // Verificar que al menos un producto tenga valor FOB
        $hayValores = false;
        foreach ($this->carrito as $producto) {
            if (floatval($producto['valor_fob']) > 0) {
                $hayValores = true;
                break;
            }
        }
        
        if (!$hayValores) {
            session()->flash('error', 'Ingresa el valor FOB de al menos un producto.');
            return;
        }
        
        // Reiniciar estado de pregunta
        $this->mostrarPregunta = false;
        $this->respuestaUsuario = null;
        
        // Tipo de cambio
        $tc = floatval($this->tipoCambio ?: 6.96);
        
        // Variables para totales
        $totalFOB = 0;
        $totalFlete = 0;
        $totalSeguro = 0;
        $totalCIF = 0;
        $totalCIFBs = 0;
        $totalGA = 0;
        $totalIVA = 0;
        $totalImpuestosBs = 0;
        
        $this->desgloseProductos = [];
        
        // Calcular impuestos por cada producto
        foreach ($this->carrito as $index => $producto) {
            $valorFOB = floatval($producto['valor_fob']);
            $valorFlete = floatval($producto['valor_flete']);
            $valorSeguro = floatval($producto['valor_seguro']);
            $tasaArancel = floatval($producto['arancel']);
            
            // CIF del producto
            $cifProducto = $valorFOB + $valorFlete + $valorSeguro;
            $cifProductoBs = $cifProducto * $tc;
            
            // Gravamen Arancelario del producto
            $gaProducto = $cifProductoBs * ($tasaArancel / 100);
            
            // Base IVA del producto
            $baseIVAProducto = $cifProductoBs + $gaProducto;
            
            // IVA del producto
            $ivaProducto = $baseIVAProducto * ($this->tasaIVA / 100);
            
            // Total impuestos del producto
            $totalImpProductoBs = $gaProducto + $ivaProducto;
            $totalImpProductoUSD = $totalImpProductoBs / $tc;
            
            // Acumular totales
            $totalFOB += $valorFOB;
            $totalFlete += $valorFlete;
            $totalSeguro += $valorSeguro;
            $totalCIF += $cifProducto;
            $totalCIFBs += $cifProductoBs;
            $totalGA += $gaProducto;
            $totalIVA += $ivaProducto;
            $totalImpuestosBs += $totalImpProductoBs;
            
            // Guardar desglose del producto
            $this->desgloseProductos[] = [
                'codigo_hs' => $producto['codigo_hs'],
                'descripcion' => $producto['descripcion'],
                'arancel' => $tasaArancel,
                'valor_fob' => $valorFOB,
                'valor_flete' => $valorFlete,
                'valor_seguro' => $valorSeguro,
                'cif_usd' => $cifProducto,
                'cif_bs' => $cifProductoBs,
                'ga_bs' => $gaProducto,
                'iva_bs' => $ivaProducto,
                'total_impuestos_bs' => $totalImpProductoBs,
                'total_impuestos_usd' => $totalImpProductoUSD,
                'total_pagar_usd' => $cifProducto + $totalImpProductoUSD,
            ];
        }
        
        // Calcular totales finales
        $totalImpuestosUSD = $totalImpuestosBs / $tc;
        $totalAPagar = $totalCIF + $totalImpuestosUSD;
        
        // Desglose general
        $this->desglose = [
            'Productos en cotización' => count($this->carrito) . ' producto(s)',
            'Total FOB (Mercancías)' => number_format($totalFOB, 2, '.', ','),
            'Total Flete' => number_format($totalFlete, 2, '.', ','),
            'Total Seguro' => number_format($totalSeguro, 2, '.', ','),
            'Total CIF (USD)' => number_format($totalCIF, 2, '.', ','),
            'Tipo de Cambio' => number_format($tc, 2) . ' Bs/USD',
            'Total CIF (Bs)' => 'Bs ' . number_format($totalCIFBs, 2, '.', ','),
            'Total GA (varios %)' => 'Bs ' . number_format($totalGA, 2, '.', ','),
            'Total IVA (' . $this->tasaIVA . '%)' => 'Bs ' . number_format($totalIVA, 2, '.', ','),
            'Total Impuestos (Bs)' => 'Bs ' . number_format($totalImpuestosBs, 2, '.', ','),
            'Total Impuestos (USD)' => number_format($totalImpuestosUSD, 2, '.', ','),
            'Total a Pagar (USD)' => number_format($totalAPagar, 2, '.', ','),
        ];
        
        $this->resultado = number_format($totalImpuestosUSD, 2, '.', ',');
        $this->mostrarPregunta = true;
        session()->flash('success', 'Cálculo de impuestos completado para ' . count($this->carrito) . ' producto(s).');
    }

    /**
     * Responder a la pregunta sobre el precio
     */
    public function responder($respuesta)
    {
        $this->respuestaUsuario = $respuesta;
    }
    
    /**
     * Limpiar formulario
     */
    public function limpiar()
    {
        $this->reset([
            'peso', 'volumen', 'valorMercancia', 'valorFlete', 'valorSeguro',
            'largo', 'ancho', 'alto', 'cantidadBultos',
            'searchProducto', 'productosSugeridos', 'showProductoDropdown',
            'productoSeleccionado', 'codigoHS', 'descripcionProducto',
            'resultado', 'desglose', 'desgloseProductos', 'mostrarPregunta', 'respuestaUsuario',
            'calcularFleteAuto', 'calcularSeguroAuto',
            'carrito', 'editandoProductoIndex'
        ]);
        $this->cantidadBultos = 1;
        $this->tasaArancel = 10;
        $this->tasaGA = 0;
        $this->tipoCambio = 6.96;
        $this->porcentajeFlete = 5;
        $this->porcentajeSeguro = 2;
        session()->flash('info', 'Formulario y carrito limpiados.');
    }

    // =======================================================
    //              DESCARGAR PDF PROFORMA
    // =======================================================
    public function descargarProforma()
    {
        if (!$this->resultado) {
            session()->flash('error', 'Primero debes calcular los impuestos.');
            return;
        }

        // Tipo de cambio
        $tc = floatval($this->tipoCambio ?: 6.96);
        
        // Calcular totales
        $totalFOB = 0;
        $totalFlete = 0;
        $totalSeguro = 0;
        
        foreach ($this->carrito as $producto) {
            $totalFOB += floatval($producto['valor_fob']);
            $totalFlete += floatval($producto['valor_flete']);
            $totalSeguro += floatval($producto['valor_seguro']);
        }
        
        $totalCIF = $totalFOB + $totalFlete + $totalSeguro;

        $data = [
            'tipo' => 'proforma',
            'titulo' => 'PROFORMA DE IMPUESTOS DE IMPORTACIÓN',
            'fecha' => now()->format('d/m/Y H:i'),
            'numero' => 'PRO-' . date('Ymd') . '-' . rand(1000, 9999),
            'productos' => $this->carrito,
            'desgloseProductos' => $this->desgloseProductos,
            'cantidadProductos' => count($this->carrito),
            'valores' => [
                'fob' => $totalFOB,
                'flete' => $totalFlete,
                'seguro' => $totalSeguro,
                'cif' => $totalCIF,
                'tc' => $tc,
            ],
            'desglose' => $this->desglose,
            'resultado' => $this->resultado,
            'tasas' => [
                'iva' => $this->tasaIVA,
            ],
        ];

        $pdf = Pdf::loadView('pdf.impuestos-proforma', $data);
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'proforma-impuestos-' . date('Ymd-His') . '.pdf');
    }

    // =======================================================
    //              DESCARGAR PDF LIQUIDACIÓN
    // =======================================================
    public function descargarLiquidacion()
    {
        if (!$this->resultado) {
            session()->flash('error', 'Primero debes calcular los impuestos.');
            return;
        }

        // Tipo de cambio
        $tc = floatval($this->tipoCambio ?: 6.96);
        
        // Calcular totales
        $totalFOB = 0;
        $totalFlete = 0;
        $totalSeguro = 0;
        $totalGA = 0;
        $totalIVA = 0;
        
        foreach ($this->carrito as $producto) {
            $totalFOB += floatval($producto['valor_fob']);
            $totalFlete += floatval($producto['valor_flete']);
            $totalSeguro += floatval($producto['valor_seguro']);
        }
        
        foreach ($this->desgloseProductos as $desglose) {
            $totalGA += $desglose['ga_bs'];
            $totalIVA += $desglose['iva_bs'];
        }
        
        $totalCIF = $totalFOB + $totalFlete + $totalSeguro;
        $totalCIFBs = $totalCIF * $tc;
        $totalImpuestosBs = $totalGA + $totalIVA;
        $totalImpuestosUSD = $totalImpuestosBs / $tc;
        $totalAPagar = $totalCIF + $totalImpuestosUSD;

        $data = [
            'tipo' => 'liquidacion',
            'titulo' => 'LIQUIDACIÓN DE TRIBUTOS ADUANEROS',
            'fecha' => now()->format('d/m/Y H:i'),
            'numero' => 'LIQ-' . date('Ymd') . '-' . rand(1000, 9999),
            'productos' => $this->carrito,
            'desgloseProductos' => $this->desgloseProductos,
            'cantidadProductos' => count($this->carrito),
            'valores' => [
                'fob' => $totalFOB,
                'flete' => $totalFlete,
                'seguro' => $totalSeguro,
                'cif' => $totalCIF,
                'cif_bs' => $totalCIFBs,
                'tc' => $tc,
            ],
            'tributos' => [
                'ga' => [
                    'monto' => $totalGA,
                ],
                'iva' => [
                    'tasa' => $this->tasaIVA,
                    'monto' => $totalIVA,
                ],
            ],
            'totales' => [
                'impuestos_bs' => $totalImpuestosBs,
                'impuestos_usd' => $totalImpuestosUSD,
                'impuestos' => $totalImpuestosUSD,
                'total_pagar' => $totalAPagar,
            ],
            'desglose' => $this->desglose,
            'resultado' => $this->resultado,
        ];

        $pdf = Pdf::loadView('pdf.impuestos-liquidacion', $data);
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'liquidacion-impuestos-' . date('Ymd-His') . '.pdf');
    }

    public function render()
    {
        return view('livewire.calculadora-impuestos')
            ->layout('layouts.app', ['title' => 'Calculadora de Impuestos']);
    }
}
