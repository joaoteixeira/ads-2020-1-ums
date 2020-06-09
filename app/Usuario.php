<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
{
    public  $timestamps = false;
    protected $primaryKey = 'ID';
    protected $table = 'USUARIOS';
    protected $fillable = ['USER', 'SENHA', 'HOST', 'GRUPO_USUARIO_ID', 'STATUS', 'ULTIMA_ALTERACAO_SENHA'];
 
    public function grupoUsuario(){

        return $this->belongsTo('\App\GrupoUsuario', 'GRUPO_USUARIO_ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function list(){

        return DB::select(' SELECT usu.ID, usu.USER, usu.HOST, gp.NOME AS GRUPO, DATE_FORMAT(usu.ULTIMA_ALTERACAO_SENHA, "%d/%m/%Y") AS DATA
                            FROM USUARIOS AS usu
                            JOIN GRUPO_USUARIOS AS gp ON gp.ID = usu.GRUPO_USUARIO_ID');

    }
}
