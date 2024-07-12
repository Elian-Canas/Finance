<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Transaccion;

use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaccion = Transaccion::all()->where('user_id', '=', auth()->user()->id)->sortByDesc('fecha');


        return view('transaccions.index', [
            'transaccions' => $transaccion
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Transaccion $transaccion)
    {
        return view('transaccions.create', ['transaccion' => $transaccion, 'categorias' => Categoria::get()->where('user_id', '=', auth()->user()->id)]);
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
        return view('transaccions.edit', ['transaccion' => $transaccion, 'categorias' => Categoria::get()->where('user_id', '=', auth()->user()->id)]);
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
        $ingresos = $modelo->ingresos(auth()->user()->id);
        $gastos = $modelo->gastos(auth()->user()->id);
        $grafica = $modelo->grafica(auth()->user()->id);


        return view('dashboard', [
            'ingresos' => $ingresos ,
            'gastos' => $gastos ,
            'grafica' => $grafica 
        ]);
    }
}
