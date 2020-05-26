<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoUsuario extends Model
{
    public  $timestamps = false;
    protected $primaryKey = 'ID';
    protected $table = 'GRUPO_USUARIOS';
    protected $fillable = ['NOME', 'DESCRICAO'];
}
