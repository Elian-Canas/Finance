<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Transaccion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // @dd(auth()->user()->id);

        // $datos =Transaccion::all()->where('user_id', '=', auth()->user()->id);


        return view('transaccions.index', [
            'transaccions' => Transaccion::all()->where('user_id', '=', auth()->user()->id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Transaccion $transaccion)
    {
        return view('transaccions.create', ['transaccion' => $transaccion, 'categorias' => Categoria::get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'fecha' => 'required',
            'descripcion' => 'required',
            'monto' => 'required',
            'tipo' => 'required',
            'categoria_id' => 'required'
        ]);

        $request->user()->transaccion()->create([
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
            'monto' => $request->monto,
            'tipo' => $request->tipo,
            'categoria_id' => $request->categoria_id,
            'user_id' => auth()->id()


        ]);

        return redirect()->route('transaccions.index');
    }

    /**
     * Display the specified resource.
     */

    public function edit(Transaccion $transaccion)
    {
        return view('transaccions.edit', ['transaccion' => $transaccion, 'categorias' => Categoria::get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaccion $transaccion)
    {
        $request->validate([
            'fecha' => 'required',
            'descripcion' => 'required',
            'monto' => 'required',
            'tipo' => 'required',
            'categoria_id' => 'required'
        ]);

        $transaccion->update([
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
            'monto' => $request->monto,
            'tipo' => $request->tipo,
            'categoria_id' => $request->categoria_id,
            'user_id' => auth()->id()


        ]);

        return redirect()->route('transaccions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaccion $transaccion)
    {
        $transaccion->delete();

        return back();
    }

    public function dashboard()
    {
        $modelo = new Transaccion;

        // $ingreso = DB::table('transaccions')
        // ->leftjoin('categorias', 'transaccions.categoria_id', '=', 'categoria.id')
        // ->select('transaccions.*, categorias.name AS Categoria')
        // ->where('t.tipo', '=', 'ingreso')
        // ->where('user_id', '=', auth()->id())
        // ->get();

        // $ingreso = Transaccion::all()
        // ->leftjoin('categorias', 'transaccions.categoria_id', '=', 'categoria.id')
        // ->select('transaccions.*, categorias.name AS Categoria')
        // ->where('t.tipo', '=', 'ingreso')
        // ->where('user_id', '=', auth()->id())
        // ->get();


        $modelo = new Transaccion;
        $ingresos = $modelo->ingresos(auth()->user()->id);
        $gastos = $modelo->gastos(auth()->user()->id);
        $grafica = $modelo->grafica(auth()->user()->id
    );

        
        // @dd($ingresos, $gastos, $grafica);

        return view('dashboard', [ 'ingresos' => $ingresos, 'gastos' => $gastos, 'grafica' => $grafica 
        ]);
    }
}
