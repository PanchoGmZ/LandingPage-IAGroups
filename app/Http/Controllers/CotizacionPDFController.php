<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CotizacionPDFController extends Controller
{
    /**
     * Generar PDF de cotización LCL
     */
    public function generarPDF(Request $request)
    {
        $data = [
            'tipoCarga' => $request->tipoCarga ?? 'LCL',
            'fecha' => now()->format('d/m/Y H:i'),
            'peso' => $request->peso,
            'volumen' => $request->volumen,
            'origen' => $request->origen ?? 'No especificado',
            'destino' => $request->destino ?? 'No especificado',
            'valorMercancia' => $request->valorMercancia ?? 0,
            'resultado' => $request->resultado,
            'desglose' => json_decode($request->desglose, true) ?? [],
        ];

        $pdf = Pdf::loadView('pdf.cotizacion-lcl', $data);
        
        return $pdf->download('cotizacion-' . strtolower($data['tipoCarga']) . '-' . date('Ymd-His') . '.pdf');
    }
}
