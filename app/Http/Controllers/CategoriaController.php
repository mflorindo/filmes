<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Resources\CategoriaResource;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoriaResource::collection(Categoria::orderBy('nome')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:categorias|max:100',
        ]);

        $categoria = Categoria::create($request->all());
        return response()->json(['data' => $categoria], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {

        return new CategoriaResource($categoria);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {

        $request->validate([
            'nome' => 'required|max:100|unique:categorias,' . $categoria->id,
        ]);

        $categoria->fill($request->all());
        $categoria->save();
        return response()->json(['data' => $categoria], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return response()->json(['mensagem' => 'Categoria excluída com sucesso'], 200);
    }
}
