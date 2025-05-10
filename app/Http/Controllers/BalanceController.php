<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Salida;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BalanceController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $entradas = Entrada::where('user_id', $userId)->get();
        $salidas = Salida::where('user_id', $userId)->get();

        $totalEntradas = $entradas->sum('monto');
        $totalSalidas = $salidas->sum('monto');
        $balance = $totalEntradas - $totalSalidas;

        return view('balance.index', compact('entradas', 'salidas', 'totalEntradas', 'totalSalidas', 'balance'));
    }

    public function generarPDF()
    {
        $usuario = Auth::user(); // aqui guardamos el usuario que ha iniciado sesion

        $entradas = Entrada::where('user_id', $usuario->id)->get();
        $salidas = Salida::where('user_id', $usuario->id)->get();
        $totalEntradas = $entradas->sum('monto');
        $totalSalidas = $salidas->sum('monto');
        $balance = $totalEntradas - $totalSalidas;
        $fecha = Carbon::now()->format('d/m/Y H:i');

        $pdf = Pdf::loadView('balance.pdf', compact(
            'entradas',
            'salidas',
            'totalEntradas',
            'totalSalidas',
            'balance',
            'usuario',
            'fecha'
        ));
        return $pdf->download('balance.pdf');
    }
}
