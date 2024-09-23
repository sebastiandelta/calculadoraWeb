<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\CalculadoraController;

Route::get('/calculadora', [CalculadoraController::class, 'index']);
Route::post('/calculadora', [CalculadoraController::class, 'calcular']);