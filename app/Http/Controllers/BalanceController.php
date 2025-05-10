<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Salida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
