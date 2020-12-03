<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilmeCategoriaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $categoria = Categoria::find($this->id_categoria);
        return [
            'id' => $this->id,
            'id_filme' => $this->id_filme,
            'id_categoria' => $this->id_categoria,
            'nome_categoria' => $categoria->nome,
        ];
    }
}
