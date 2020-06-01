<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ambiente extends Model
{
    public  $timestamps = false;
    protected $primaryKey = 'ID';
    protected $table = 'AMBIENTES';
    protected $fillable = ['NOME', 'SGBD_ID'];

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function list(){

        return DB::select(' SELECT amb.ID, amb.NOME, bd.NOME AS SGBD
                            FROM AMBIENTES AS amb
                            JOIN SGBDS AS bd ON amb.SGBD_ID = bd.ID');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getDataToConfirm($id){

        return DB::select(' SELECT amb.ID, amb.NOME, COUNT(ace.ID) AS QTD_ACESSOS 
                            FROM AMBIENTES AS amb
                            LEFT JOIN ACESSOS AS ace ON amb.ID = ace.AMBIENTE_ID
                            WHERE amb.ID = ?
                            GROUP BY amb.ID', [$id]);
                            
    }

}
