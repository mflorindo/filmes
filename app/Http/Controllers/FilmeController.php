<?php

namespace App\Http\Controllers;

use App\Ator;
use App\Filme;
use App\Http\Resources\FilmeResource;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FilmeResource::collection(Filme::orderBy('titulo')->get());
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
            'titulo' => 'required|unique:filmes,titulo|max:100',
            'id_diretor' => 'required',
            'id_categoria' => 'required',
            'duracao' => 'required',
        ]);

        $filme = Filme::create($request->all());
        foreach ($request->atores as $ator) {

            $ator = $ator + ['id_filme' => $filme->id];
            $registro = Ator::create($ator);
        }

        return new FilmeResource($filme);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function show(Filme $filme)
    {
        return new FilmeResource($filme);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filme $filme)
    {

        $request->validate([
            'titulo' => 'required|unique:filmes,titulo,' . $filme->id . '|max:100',
            'id_diretor' => 'required',
            'id_categoria' => 'required',
            'duracao' => 'required',
        ]);

        $filme->fill($request->all());
        $filme->save();
        $filme->atores()->delete();

        foreach ($request->atores as $ator) {
            $ator = $ator + ['id_filme' => $filme->id];
            $registro = Ator::create($ator);
        }
        return new FilmeResource($filme);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filme $filme)
    {
        $filme->delete();
        return response()->json(['mensagem' => 'Filme excluído com sucesso'], 200);
    }
}
