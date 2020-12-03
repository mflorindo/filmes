<?php

namespace App\Http\Resources;

use App\Pessoa;
use Illuminate\Http\Resources\Json\JsonResource;

class AtorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $pessoa = Pessoa::select('nome')->where('id', $this->id_pessoa)->get();
        return [
            'id' => $this->id,
            'id_pessoa' => $this->id_pessoa,
            'nome_pessoa' => $pessoa[0]['nome'],
            'nome_personagem' => $this->nome_personagem,
            'is_ator_principal' => $this->is_ator_principal,
        ];
    }
}
