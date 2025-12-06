<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CalculadoraMaritima;
use App\Livewire\CalculadoraAerea;
use App\Livewire\CalculadoraTerrestre;
use App\Livewire\CalculadoraImpuestos;
use App\Http\Controllers\CotizacionPDFController;

// Landing Page principal
Route::get('/', function () {
    return view('pages.welcome-new');
})->name('home');

// Página Nosotros
Route::get('/nosotros', function () {
    return view('pages.nosotros');
})->name('nosotros');

// Ruta de Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Ruta de Registro
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Rutas de las calculadoras
Route::get('/maritimo', CalculadoraMaritima::class)->name('calculadora.maritima');
Route::get('/aereo', CalculadoraAerea::class)->name('calculadora.aerea');
Route::get('/terrestre', CalculadoraTerrestre::class)->name('calculadora.terrestre');
Route::get('/impuestos', CalculadoraImpuestos::class)->name('calculadora.impuestos');

// Ruta para generar PDF de cotización LCL
Route::get('/cotizacion/pdf', [CotizacionPDFController::class, 'generarPDF'])->name('cotizacion.pdf');
// Rutas de servicios adicionales
Route::get('/importaciones-exportaciones', function () {
    return view('pages.importaciones-exportaciones');
})->name('importaciones.exportaciones');

Route::get('/capacitaciones', function () {
    return view('pages.capacitaciones');
})->name('capacitaciones');

Route::get('/logistica-transporte', function () {
    return view('pages.logistica-transporte');
})->name('logistica.transporte');

Route::get('/criptomonedas', function () {
    return view('pages.criptomonedas');
})->name('criptomonedas');

Route::get('/ecommerce', function () {
    return view('pages.ecommerce');
})->name('ecommerce');

Route::get('/subastas', function () {
    return view('pages.subastas');
})->name('subastas');
