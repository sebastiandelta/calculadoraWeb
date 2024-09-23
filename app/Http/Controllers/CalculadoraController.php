<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculadoraController extends Controller
{
    public function index()
    {
        return view('calculadora');
    }

    public function calcular(Request $request)
    {
        $numero1 = $request->input('numero1');
        $numero2 = $request->input('numero2');
        $operacion = $request->input('operacion');
        $resultado = 0;

        switch ($operacion) {
            case '+':
                $resultado = $numero1 + $numero2;
                break;
            case '-':
                $resultado = $numero1 - $numero2;
                break;
            case '*':
                $resultado = $numero1 * $numero2;
                break;
            case '/':
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                } else {
                    $resultado = 'Error: División por cero';
                }
                break;
            case 'potencia':
                $resultado = pow($numero1, $numero2);
                break;
            case 'raiz':
                $resultado = sqrt($numero1);
                break;
            case 'sin':
                $resultado = sin(deg2rad($numero1));
                break;
            case 'cos':
                $resultado = cos(deg2rad($numero1));
                break;
            case 'tan':
                $resultado = tan(deg2rad($numero1));
                break;
            case 'log':
                $resultado = log($numero1);
                break;
            default:
                $resultado = 'Operación no válida';
        }

        return view('calculadora', compact('resultado'));
    }
}

