<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    //
    public function index()
    {
        $empresas = Empresa::all();
        return view('amd.empresas.index', compact('empresas'));
    }

    public function create()
    {
        return view('amd.empresas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'logo' => 'required|image|max:2048',
            'rif' => 'string',
            'direccion' => 'string',
            'tlf' => 'string',
            'email' => 'email',
        ]);

        $logoPath = $request->file('logo')->store('public/logos');
        $logoUrl = Storage::url($logoPath);

        Empresa::create([
            'nombre' => $request->nombre,
            'logo' => $logoUrl,
            'rif' => $request->rif,
            'direccion' => $request->direccion,
            'tlf' => $request->tlf,
            'email' => $request->email,
        ]);

        return redirect()->route('empresas.index')->with('success', 'Empresa registrada exitosamente.');
    }
    public function show(Empresa $empresa)
    {
        //
        $empresa=Empresa::find($empresa->id);
        return view('amd.empresas.show',compact('empresa'));
    }
    public function edit(Empresa $empresa)
    {
        return view('amd.empresas.edit', compact('empresa'));
    }

    public function update(Request $request, Empresa $empresa)
    {
        $request->validate([
            'nombre' => 'required',
            'logo' => 'image|max:2048',
            'rif' => 'string',
            'direccion' => 'string',
            'tlf' => 'string',
            'email' => 'email',
        ]);

        if ($request->hasFile('logo')) {
            Storage::delete($empresa->logo);

            $logoPath = $request->file('logo')->store('public/img');
            $logoUrl = Storage::url($logoPath);

            $empresa->update([
                'nombre' => $request->nombre,
                'logo' => $logoUrl,
                'rif' => $request->rif,
                'direccion' => $request->direccion,
                'tlf' => $request->tlf,
                'email' => $request->email,
            ]);
        } else {
            $empresa->update([
                'nombre' => $request->nombre,
                'rif' => $request->rif,
                'direccion' => $request->direccion,
                'tlf' => $request->tlf,
                'email' => $request->email,
            ]);
        }

        return redirect()->route('empresas.index')->with('success', 'Empresa actualizada exitosamente.');
    }

    public function destroy(Empresa $empresa)
    {
        Storage::delete($empresa->logo);
        $empresa->delete();

        return redirect()->route('empresas.index')->with('success', 'Empresa eliminada exitosamente.');
    }
}
