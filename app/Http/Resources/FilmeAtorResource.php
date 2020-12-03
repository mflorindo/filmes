<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilmeAtorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $pessoa = Pessoa::find($this->id_pessoa);
        return [
            'id' => $this->id,
            'id_pessoa' => $this->id_pessoa,
            'id_filme' => $this->id_filme,
            'nome_personagem' => $this->nome_personagem,
            'nome_autor' => $pessoa->nome,
        ];
    }
}
