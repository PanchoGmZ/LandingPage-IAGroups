<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 10px;
            line-height: 1.3;
            color: #333;
            background: #fff;
        }
        .container {
            padding: 15px 25px;
        }
        /* Header */
        .header {
            border-bottom: 3px solid #059669;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        .header-content {
            display: table;
            width: 100%;
        }
        .logo-section {
            display: table-cell;
            width: 50%;
            vertical-align: middle;
        }
        .logo-text {
            font-size: 20px;
            font-weight: bold;
            color: #1f2937;
        }
        .logo-subtitle {
            font-size: 9px;
            color: #6b7280;
            margin-top: 2px;
        }
        .doc-info {
            display: table-cell;
            width: 50%;
            text-align: right;
            vertical-align: middle;
        }
        .doc-number {
            font-size: 12px;
            font-weight: bold;
            color: #059669;
        }
        .doc-date {
            font-size: 9px;
            color: #6b7280;
            margin-top: 2px;
        }
        /* Title */
        .title-bar {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            color: white;
            padding: 10px 15px;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        /* Sections */
        .section {
            margin-bottom: 12px;
        }
        .section-title {
            background: #1f2937;
            color: white;
            padding: 5px 10px;
            font-size: 10px;
            font-weight: bold;
            margin-bottom: 8px;
            border-radius: 3px;
        }
        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }
        th, td {
            padding: 6px 10px;
            text-align: left;
            border: 1px solid #d1d5db;
        }
        th {
            background: #f3f4f6;
            font-weight: bold;
            color: #374151;
            font-size: 9px;
            text-transform: uppercase;
        }
        td {
            font-size: 10px;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        /* Two columns */
        .two-columns {
            display: table;
            width: 100%;
            margin-bottom: 12px;
        }
        .column {
            display: table-cell;
            width: 50%;
            vertical-align: top;
        }
        .column-left {
            padding-right: 10px;
        }
        .column-right {
            padding-left: 10px;
        }
        /* Product Info Box */
        .product-box {
            background: #ecfdf5;
            border: 1px solid #059669;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 12px;
        }
        .product-row {
            display: table;
            width: 100%;
            margin-bottom: 5px;
        }
        .product-label {
            display: table-cell;
            width: 30%;
            font-size: 9px;
            color: #6b7280;
            text-transform: uppercase;
        }
        .product-value {
            display: table-cell;
            width: 70%;
            font-size: 11px;
            font-weight: bold;
            color: #065f46;
        }
        /* Liquidación Table */
        .liq-table {
            border: 2px solid #059669;
        }
        .liq-table th {
            background: #059669;
            color: white;
            border-color: #047857;
        }
        .liq-table td {
            border-color: #a7f3d0;
        }
        .liq-row-sub {
            background: #f0fdf4;
        }
        .liq-row-total {
            background: #d1fae5;
            font-weight: bold;
        }
        .liq-row-total td {
            border-top: 2px solid #059669;
        }
        .liq-row-grand {
            background: #059669;
            color: white;
            font-weight: bold;
            font-size: 12px;
        }
        /* Summary Box */
        .summary-box {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            border: 2px solid #059669;
            border-radius: 6px;
            padding: 12px 15px;
            text-align: center;
            margin: 15px 0;
        }
        .summary-label {
            font-size: 9px;
            color: #065f46;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 4px;
        }
        .summary-value {
            font-size: 22px;
            font-weight: bold;
            color: #065f46;
        }
        .summary-currency {
            font-size: 10px;
            color: #047857;
        }
        /* Footer */
        .footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #e5e7eb;
            font-size: 8px;
            color: #6b7280;
        }
        .footer-box {
            background: #ecfdf5;
            border: 1px solid #059669;
            border-radius: 4px;
            padding: 8px;
            margin-bottom: 8px;
            font-size: 8px;
            color: #065f46;
        }
        .footer-grid {
            display: table;
            width: 100%;
        }
        .footer-col {
            display: table-cell;
            width: 50%;
            vertical-align: top;
        }
        .signature-box {
            border-top: 1px solid #374151;
            width: 180px;
            margin-top: 30px;
            padding-top: 5px;
            text-align: center;
            font-size: 8px;
        }
        /* Helper classes */
        .mono {
            font-family: monospace;
        }
        .bold {
            font-weight: bold;
        }
        .small {
            font-size: 9px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="header-content">
                <div class="logo-section">
                    <div class="logo-text">🚢 IA GROUPS</div>
                    <div class="logo-subtitle">Agencia Despachante de Aduanas</div>
                </div>
                <div class="doc-info">
                    <div class="doc-number">{{ $numero }}</div>
                    <div class="doc-date">Fecha: {{ $fecha }}</div>
                </div>
            </div>
        </div>

        <!-- Title -->
        <div class="title-bar">
            📋 {{ $titulo }}
        </div>

        <!-- Products List (Multiple Products) -->
        @if(isset($productos) && count($productos) > 0)
        <div class="section">
            <div class="section-title">📦 PRODUCTOS EN LIQUIDACIÓN ({{ count($productos) }})</div>
            <table>
                <thead>
                    <tr>
                        <th>CÓDIGO HS</th>
                        <th>DESCRIPCIÓN</th>
                        <th class="text-center">GA %</th>
                        <th class="text-right">FOB (USD)</th>
                        <th class="text-right">CIF (USD)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $prod)
                    @php
                        $cifProd = $prod['valor_fob'] + $prod['valor_flete'] + $prod['valor_seguro'];
                    @endphp
                    <tr>
                        <td class="mono small">{{ $prod['codigo_hs'] }}</td>
                        <td class="small">{{ Str::limit($prod['descripcion'], 35) }}</td>
                        <td class="text-center">{{ $prod['arancel'] }}%</td>
                        <td class="text-right">$ {{ number_format($prod['valor_fob'], 2) }}</td>
                        <td class="text-right">$ {{ number_format($cifProd, 2) }}</td>
                    </tr>
                    @endforeach
                    <tr style="background:#d1fae5; font-weight:bold;">
                        <td colspan="3">TOTALES</td>
                        <td class="text-right">$ {{ number_format($valores['fob'], 2) }}</td>
                        <td class="text-right">$ {{ number_format($valores['cif'], 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Desglose de Impuestos por Producto -->
        @if(isset($desgloseProductos) && count($desgloseProductos) > 0)
        <div class="section">
            <div class="section-title">📊 LIQUIDACIÓN POR PRODUCTO (en Bolivianos)</div>
            <table class="liq-table">
                <thead>
                    <tr>
                        <th>PRODUCTO</th>
                        <th class="text-center">GA %</th>
                        <th class="text-right">CIF (Bs)</th>
                        <th class="text-right">GA (Bs)</th>
                        <th class="text-right">IVA (Bs)</th>
                        <th class="text-right">TOTAL (Bs)</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalCIFBs = 0; $totalGABs = 0; $totalIVABs = 0; $totalTribBs = 0; @endphp
                    @foreach($desgloseProductos as $desg)
                    @php 
                        $totalCIFBs += $desg['cif_bs'];
                        $totalGABs += $desg['ga_bs'];
                        $totalIVABs += $desg['iva_bs'];
                        $totalTribBs += $desg['total_impuestos_bs'];
                    @endphp
                    <tr class="liq-row-sub">
                        <td class="small">{{ $desg['codigo_hs'] }}</td>
                        <td class="text-center">{{ $desg['arancel'] }}%</td>
                        <td class="text-right">{{ number_format($desg['cif_bs'], 2) }}</td>
                        <td class="text-right">{{ number_format($desg['ga_bs'], 2) }}</td>
                        <td class="text-right">{{ number_format($desg['iva_bs'], 2) }}</td>
                        <td class="text-right bold">{{ number_format($desg['total_impuestos_bs'], 2) }}</td>
                    </tr>
                    @endforeach
                    <tr class="liq-row-grand">
                        <td colspan="2">TOTALES</td>
                        <td class="text-right">Bs {{ number_format($totalCIFBs, 2) }}</td>
                        <td class="text-right">Bs {{ number_format($totalGABs, 2) }}</td>
                        <td class="text-right">Bs {{ number_format($totalIVABs, 2) }}</td>
                        <td class="text-right">Bs {{ number_format($totalTribBs, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
        @else
        <!-- Legacy: Single Product -->
        @if(isset($producto) && $producto['codigo_hs'])
        <div class="product-box">
            <div class="product-row">
                <div class="product-label">Código HS:</div>
                <div class="product-value mono">{{ $producto['codigo_hs'] }}</div>
            </div>
            <div class="product-row">
                <div class="product-label">Descripción:</div>
                <div class="product-value">{{ $producto['descripcion'] }}</div>
            </div>
            <div class="product-row">
                <div class="product-label">Gravamen Arancelario:</div>
                <div class="product-value">{{ $producto['arancel'] }}%</div>
            </div>
        </div>
        @endif
        @endif

        <!-- Valoración Aduanera -->
        <div class="section">
            <div class="section-title">💵 VALORACIÓN ADUANERA TOTAL</div>
            <table>
                <tr>
                    <td class="small">Total Valor FOB:</td>
                    <td class="text-right bold">$ {{ number_format($valores['fob'], 2) }}</td>
                </tr>
                <tr>
                    <td class="small">Total Flete Internacional:</td>
                    <td class="text-right bold">$ {{ number_format($valores['flete'], 2) }}</td>
                </tr>
                <tr>
                    <td class="small">Total Seguro:</td>
                    <td class="text-right bold">$ {{ number_format($valores['seguro'], 2) }}</td>
                </tr>
                <tr style="background:#d1fae5;">
                    <td class="small bold">CIF Total (USD):</td>
                    <td class="text-right bold">$ {{ number_format($valores['cif'], 2) }}</td>
                </tr>
                <tr>
                    <td class="small">Tipo de Cambio:</td>
                    <td class="text-right bold">Bs {{ number_format($valores['tc'] ?? 6.96, 2) }}</td>
                </tr>
                <tr style="background:#fef3c7;">
                    <td class="small bold">CIF Total (Bs):</td>
                    <td class="text-right bold">Bs {{ number_format($valores['cif_bs'] ?? ($valores['cif'] * ($valores['tc'] ?? 6.96)), 2) }}</td>
                </tr>
            </table>
        </div>

        <!-- Resumen de Tributos -->
        <div class="section">
            <div class="section-title">📊 RESUMEN TOTAL DE TRIBUTOS</div>
            <table class="liq-table">
                <thead>
                    <tr>
                        <th style="width:60%">CONCEPTO</th>
                        <th style="width:20%" class="text-right">BOLIVIANOS</th>
                        <th style="width:20%" class="text-right">USD</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="liq-row-sub">
                        <td>Total Gravamen Arancelario (GA)</td>
                        <td class="text-right">Bs {{ number_format($tributos['ga']['monto'], 2) }}</td>
                        <td class="text-right">$ {{ number_format($tributos['ga']['monto'] / ($valores['tc'] ?? 6.96), 2) }}</td>
                    </tr>
                    <tr class="liq-row-sub">
                        <td>Total IVA ({{ $tributos['iva']['tasa'] }}%)</td>
                        <td class="text-right">Bs {{ number_format($tributos['iva']['monto'], 2) }}</td>
                        <td class="text-right">$ {{ number_format($tributos['iva']['monto'] / ($valores['tc'] ?? 6.96), 2) }}</td>
                    </tr>
                    <tr class="liq-row-grand">
                        <td>TOTAL TRIBUTOS ADUANEROS</td>
                        <td class="text-right">Bs {{ number_format($totales['impuestos_bs'], 2) }}</td>
                        <td class="text-right">$ {{ number_format($totales['impuestos'], 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Resumen -->
        <div class="two-columns">
            <div class="column column-left">
                <table>
                    <tr>
                        <td class="small">Valor CIF (USD):</td>
                        <td class="text-right">$ {{ number_format($valores['cif'], 2) }}</td>
                    </tr>
                    <tr>
                        <td class="small">Total Tributos (Bs):</td>
                        <td class="text-right">Bs {{ number_format(($totales['impuestos_bs'] ?? $totales['impuestos'] * ($valores['tc'] ?? 6.96)), 2) }}</td>
                    </tr>
                    <tr>
                        <td class="small">Total Tributos (USD):</td>
                        <td class="text-right">$ {{ number_format($totales['impuestos'], 2) }}</td>
                    </tr>
                    <tr style="background:#fef3c7; font-weight:bold;">
                        <td>COSTO TOTAL (USD):</td>
                        <td class="text-right">$ {{ number_format($totales['total_pagar'], 2) }}</td>
                    </tr>
                </table>
            </div>
            <div class="column column-right">
                <div class="summary-box">
                    <div class="summary-label">💰 Total Tributos</div>
                    <div class="summary-value">$ {{ number_format($totales['impuestos'], 2) }}</div>
                    <div class="summary-currency">≈ Bs {{ number_format(($totales['impuestos_bs'] ?? $totales['impuestos'] * ($valores['tc'] ?? 6.96)), 2) }}</div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-box">
                <strong>⚠️ NOTA LEGAL:</strong> Esta liquidación es un cálculo estimativo basado en la información proporcionada y las tasas vigentes. 
                Los valores finales serán determinados por la Aduana Nacional de Bolivia al momento del despacho aduanero.
                La clasificación arancelaria está sujeta a verificación por el organismo competente.
            </div>
            
            <div class="footer-grid">
                <div class="footer-col">
                    <p><strong>IA GROUPS - Comercio Internacional</strong></p>
                    <p>NIT: 123456789</p>
                    <p>Dirección: Av. Principal #123, La Paz - Bolivia</p>
                    <p>Tel: +591 2 123 4567 | Cel: +591 70012345</p>
                </div>
                <div class="footer-col" style="text-align: right;">
                    <div class="signature-box">
                        Firma y Sello
                    </div>
                </div>
            </div>
            
            <p style="text-align:center; margin-top:10px;">
                Documento generado el {{ $fecha }} | www.iagroups.com | contacto@iagroups.com
            </p>
        </div>
    </div>
</body>
</html>