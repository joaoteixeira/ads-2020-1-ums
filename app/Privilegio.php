<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Privilegio extends Model
{
    public  $timestamps = false;
    protected $primaryKey = 'ID';
    protected $table = ['PRIVILEGIOS'];
    protected $fillable = ['NOME'];

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function list(){

        return DB::select(' SELECT priv.ID, priv.NOME, bd.NOME AS SGBD, bd.ID AS SGBD_ID 
                            FROM PRIVILEGIOS AS priv
                            JOIN SGBD_PRIVILEGIOS AS priv_bd ON priv_bd.PRIVILEGIO_ID = priv.ID
                            JOIN SGBDS AS bd ON bd.ID = priv_bd.SGBD_ID');

    }

    public function sgbds(){

        return $this->belongsToMany('\App\Sgbd', 'SGBD_PRIVILEGIOS', 'SGBD_ID', 'PRIVILEGIO_ID');
    }


      
}
