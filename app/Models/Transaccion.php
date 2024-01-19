<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria_id',
        'user_id',
        'monto',
        'fecha',
        'tipo',
        'descripcion',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
