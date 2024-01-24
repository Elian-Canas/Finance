<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categorias.index', [
            'categorias' => Categoria::latest()->paginate()
        ]);
    }

    /**|
     * Show the form for creating a new resource.
     */
    public function create(Categoria $categorias)
    {
        return view('categorias.create', ['categoria' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $request->user()->categoria()->create([
            'name' => $request->name,
            'user_id' => auth()->id()

        ]);

        return redirect()->route('categorias.index');

    }

    /**
     * Display the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', ['categoria' => $categoria]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $categoria->update([
            'name' => $request->name,
            'user_id' => auth()->id()


        ]);

        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return back();
    }
}
