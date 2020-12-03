<?php

namespace App\Http\Resources;

use App\Categoria;
use App\Http\Resources\AtorResource;
use App\Pessoa;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $diretor = Pessoa::find($this->id_diretor);

        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'id_diretor' => $this->id_diretor,
            'nome_diretor' => $diretor->nome,
            'duracao' => $this->duracao,
            'categoria' => new CategoriaResource(Categoria::find($this->id_categoria)),
            'atores' => AtorResource::collection($this->atores),

        ];
    }
}
