<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salidas = Salida::where('user_id', Auth::id())->get();
        return view('salidas.index', compact('salidas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('salidas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'factura' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $rutaFactura = null;

        if ($request->hasFile('factura')) {
            $rutaFactura = $request->file('factura')->store('facturas', 'public');
        }

        Salida::create([
            'tipo' => $request->tipo,
            'monto' => $request->monto,
            'fecha' => $request->fecha,
            'factura' => $rutaFactura,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('salidas.index')->with('success', 'Salida registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Salida $salida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $salida = Salida::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('salidas.edit', compact('salida'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $salida = Salida::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'tipo' => 'required|string',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'factura' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $rutaFactura = $salida->factura;

        // Si sube una nueva factura, reemplaza la ruta
        if ($request->hasFile('factura')) {
            $rutaFactura = $request->file('factura')->store('facturas', 'public');
        }

        $salida->update([
            'tipo' => $request->tipo,
            'monto' => $request->monto,
            'fecha' => $request->fecha,
            'factura' => $rutaFactura,
        ]);

        return redirect()->route('salidas.index')->with('success', 'Salida actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $salida = Salida::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $salida->delete();

        return redirect()->route('salidas.index')->with('success', 'Salida eliminada correctamente.');
    }
}
