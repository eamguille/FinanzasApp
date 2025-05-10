<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entradas = Entrada::where('user_id', Auth::id())->get();
        return view('entradas.index', compact('entradas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entradas.create');
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
            'factura' => 'nullable|string',
        ]);

        Entrada::create([
            'tipo' => $request->tipo,
            'monto' => $request->monto,
            'fecha' => $request->fecha,
            'factura' => $request->factura,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('entradas.index')->with('success', 'Entrada registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Entrada $entrada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $entrada = Entrada::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('entradas.edit', compact('entrada'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required|string|max:100',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'factura' => 'nullable|string|max:255',
        ]);

        $entrada = Entrada::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $entrada->update([
            'tipo' => $request->tipo,
            'monto' => $request->monto,
            'fecha' => $request->fecha,
            'factura' => $request->factura,
        ]);

        return redirect()->route('entradas.index')->with('success', 'Entrada actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $entrada = Entrada::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $entrada->delete();

        return redirect()->route('entradas.index')->with('success', 'Entrada eliminada correctamente.');
    }
}
