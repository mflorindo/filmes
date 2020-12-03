<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $table = 'filmes';

    protected $fillable = ['titulo', 'id_diretor', 'duracao', 'id_categoria'];

    public function atores()
    {
        return $this->hasMany('App\Ator', 'id_filme', 'id');
    }

}
