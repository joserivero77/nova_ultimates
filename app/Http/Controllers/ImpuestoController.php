<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Impuesto;

class ImpuestoController extends Controller
{
    //
    public function index()
    {
        $impuestos = Impuesto::all();
        return view('impuestos.index', compact('impuestos'));
    }

    public function create()
    {
        return view('impuestos.create');
    }

    public function store(Request $request)
    {
        $impuesto = new Impuesto;
        $impuesto->nombre = $request->nombre;
        $impuesto->valor = $request->valor;
        $impuesto->save();

        return redirect()->route('impuestos.index')->with('success', 'Impuesto creado exitosamente.');
    }

    public function edit(Impuesto $impuesto)
    {
        return view('impuestos.edit', compact('impuesto'));
    }

    public function update(Request $request, Impuesto $impuesto)
    {
        $impuesto->nombre = $request->nombre;
        $impuesto->valor = $request->valor;
        $impuesto->save();

        return redirect()->route('impuestos.index')->with('success', 'Impuesto actualizado exitosamente.');
    }

    public function destroy(Impuesto $impuesto)
    {
        $impuesto->delete();

        return redirect()->route('impuestos.index')->with('success', 'Impuesto eliminado exitosamente.');
    }

}
