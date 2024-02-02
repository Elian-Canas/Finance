<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Builder;

use App\Http\Resources\PostResource;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
    public function ingresos($id)
    {
        return Transaccion::latest()->where('user_id', '=', $id)
            ->where('tipo', '=', 'ingreso')->paginate();
    }

    public function gastos($id)
    {
        return Transaccion::latest()->where('user_id', '=', $id)
            ->where('tipo', '=', 'gasto')
            // ->toSql()
            ->paginate()
        ;
    }

    public function grafica($id)
    {
        // return Transaccion::query()->where('transaccions.user_id', '=', $id)
        //     ->select('categoria_id AS categoria',  'monto')
        //     ->join('categorias', 'categoria_id', '=', 'categorias.id')
        //     ->groupBy('categorias_id')
        //     ->paginate()
        //     ->toSql()
        // ;
        // $user = User::find($id);
        // $categorias = Categoria::get();

        $categorias = DB::table('transaccions')
        ->select('name as categoria', 'monto')
        ->where('transaccions.user_id', '=', $id)
        ->join('categorias','categoria_id','=','categorias.id')
        ->groupBy('categorias.name')
        ->get();
        
        // DB::table('transaccions')
        //     ->select('monto')
        //     ->groupBy('categoria_id')
        //     ->get();




        return 
            // 'usuario' => $user,

            // 'categoria' => $categorias,

            $categorias



            // 'suma' => $this->whenCounted('monto')
            // 'id' => $this->when($request->user()->id),



        ;
    }
}
