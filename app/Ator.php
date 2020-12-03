<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ator extends Model
{
    protected $table = 'atores';
    protected $fillable = ['id_pessoa', 'nome_personagem', 'is_ator_principal', 'id_filme'];
}
