<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GrupoUsuario extends Model
{
    public  $timestamps = false;
    protected $primaryKey = 'ID';
    protected $table = 'GRUPO_USUARIOS';
    protected $fillable = ['NOME', 'DESCRICAO'];

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function list(){

        return DB::select(' SELECT gp.ID, gp.NOME, gp.DESCRICAO, COUNT(usu.ID) AS QTD_USUARIOS 
                            FROM GRUPO_USUARIOS AS gp
                            LEFT JOIN USUARIOS AS usu ON gp.ID = usu.GRUPO_USUARIO_ID
                            GROUP BY gp.ID');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getDataToConfirm($id){

        return DB::select(' SELECT gp.ID, gp.NOME, gp.DESCRICAO, COUNT(usu.ID) AS QTD_USUARIOS 
                            FROM GRUPO_USUARIOS AS gp
                            LEFT JOIN USUARIOS AS usu ON gp.ID = usu.GRUPO_USUARIO_ID
                            WHERE gp.ID = ?
                            GROUP BY gp.ID', [$id]);
                            
    }

    public function usuarios(){

        return $this->hasMany('\App\Usuario', 'GRUPO_USUARIO_ID');
    }
}
