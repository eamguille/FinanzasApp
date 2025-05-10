<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'monto',
        'fecha',
        'factura',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
