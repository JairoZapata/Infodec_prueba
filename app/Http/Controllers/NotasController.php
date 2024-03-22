<?php

namespace App\Http\Controllers;

use App\Models\Notas;
use Illuminate\Http\Request;

class NotasController extends Controller
{

    public function index()
    {
        $notas = Notas::all();

        // Calcular el promedio de las notas para cada registro
        $notas->transform(function ($nota) {
            $promedio = ($nota->parcial_1 + $nota->parcial_2 + $nota->parcial_3) / 3;
            $nota->promedio = number_format($promedio, 1); // Redondear a un decimal
            return $nota;
        });

        return view('index', ['notas' => $notas]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
            'parcial1' => 'required|regex:/^\d+(\.\d{1})?$/|between:1.0,5.0',
            'parcial2' => 'required|regex:/^\d+(\.\d{1})?$/|between:1.0,5.0',
            'parcial3' => 'required|regex:/^\d+(\.\d{1})?$/|between:1.0,5.0',
        ], [
            'nombre.regex' => 'El nombre debe contener solo letras y acentuaciones.',
            'parcial1.regex' => 'El parcial 1 debe ser un número decimal con un solo decimal (por ejemplo, 1.0).',
            'parcial2.regex' => 'El parcial 2 debe ser un número decimal con un solo decimal (por ejemplo, 1.0).',
            'parcial3.regex' => 'El parcial 3 debe ser un número decimal con un solo decimal (por ejemplo, 1.0).',
            'parcial1.between' => 'El parcial 1 debe estar entre 1.0 y 5.0.',
            'parcial2.between' => 'El parcial 2 debe estar entre 1.0 y 5.0.',
            'parcial3.between' => 'El parcial 3 debe estar entre 1.0 y 5.0.',
        ]);

        $nombre = $request->input('nombre');
        $parcial1 = $request->input('parcial1');
        $parcial2 = $request->input('parcial2');
        $parcial3 = $request->input('parcial3');

        $nota = new Notas();
        $nota->nombre = $nombre;
        $nota->parcial_1 = $parcial1;
        $nota->parcial_2 = $parcial2;
        $nota->parcial_3 = $parcial3;
        $nota->promedio = 0;
        $nota->save();

        return redirect()->route('notas.index');
    }

    public function destroy($id)
    {
        $nota = Notas::findOrFail($id);

        $nota->delete();

        return redirect()->route('notas.index');
    }
}
