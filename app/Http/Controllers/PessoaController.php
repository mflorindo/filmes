<?php

namespace App\Http\Controllers;

use App\Http\Resources\PessoaResource;
use App\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PessoaResource::collection(Pessoa::orderBy('nome')->get());
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
            'nome' => 'required|max:100',
            'email' => 'required|email|unique:pessoas',
        ]);

        $pessoa = Pessoa::create($request->all());
        return response()->json(['data' => $pessoa], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa)
    {
        return new PessoaResource($pessoa);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pessoa $pessoa)
    {

        $request->validate([
            'nome' => 'required|max:100',
            'email' => 'required|max:100|unique:pessoas,' . $pessoa->id,
        ]);

        $pessoa->fill($request->all());
        $pessoa->save();
        return response()->json(['data' => $pessoa], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();
        return response()->json(['mensagem' => 'Pessoa excluída com sucesso'], 200);
    }
}
