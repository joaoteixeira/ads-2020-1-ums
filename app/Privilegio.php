<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Privilegio extends Model
{
    public  $timestamps = false;
    protected $primaryKey = 'ID';
    protected $table = 'PRIVILEGIOS';
    protected $fillable = ['NOME'];

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function list(){

        return DB::select(' SELECT priv.ID, priv.NOME, GROUP_CONCAT(bd.NOME SEPARATOR ", ") AS SGBD, GROUP_CONCAT(bd.ID) AS SGBD_ID 
                            FROM PRIVILEGIOS AS priv
                            JOIN SGBD_PRIVILEGIOS AS priv_bd ON priv_bd.PRIVILEGIO_ID = priv.ID
                            JOIN SGBDS AS bd ON bd.ID = priv_bd.SGBD_ID
                            GROUP BY priv.ID, priv.NOME');

    }

    public function sgbds(){

        return $this->belongsToMany('\App\Sgbd', 'SGBD_PRIVILEGIOS', 'PRIVILEGIO_ID', 'SGBD_ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function findPrivilege($id){

        return DB::select(' SELECT priv.ID, NOME, GROUP_CONCAT(bd_priv.SGBD_ID) AS SGBD_ID
                            FROM PRIVILEGIOS AS priv
                            JOIN SGBD_PRIVILEGIOS AS bd_priv ON priv.ID = bd_priv.PRIVILEGIO_ID 
                            WHERE priv.ID = ?
                            GROUP BY priv.ID', [$id]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getDataToConfirm($id){

        return DB::select(' SELECT priv.ID, priv.NOME AS PRIV_NOME, GROUP_CONCAT(bd.NOME SEPARATOR ", ") AS BD_NOME, GROUP_CONCAT(map.NOME SEPARATOR ", ") AS MAP_NOME 
                            FROM PRIVILEGIOS AS priv
                            LEFT JOIN SGBD_PRIVILEGIOS AS bd_priv ON priv.ID = bd_priv.PRIVILEGIO_ID
                            LEFT JOIN SGBDS AS bd ON bd.ID = bd_priv.SGBD_ID
                            LEFT JOIN OBJETO_MAPA AS obj_map ON priv.ID = obj_map.PRIVILEGIO_ID
                            LEFT JOIN MAPA_PRIVILEGIOS AS map ON map.ID = obj_map.MAPA_PRIVILEGIO_ID
                            WHERE priv.ID = ?
                            GROUP BY priv.ID', [$id]);
    }
      
}
