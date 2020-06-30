<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Acesso extends Model
{

    public  $timestamps = false;
    protected $primaryKey = 'ID';
    protected $table = 'ACESSOS';
    protected $fillable = ['INICIO', 'FIM', 'ULTIMA_ALTERACAO', 'STATUS', 'AMBIENTE_ID', 'USUARIO_ID', 'TEMPORARIO'];

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function list(){

        return DB::select(' SELECT ac.ID, CONCAT(usu.USER,"@",usu.HOST) AS USER, ac.INICIO, amb.NOME AS AMBIENTE, GROUP_CONCAT(pr.NOME) AS PRIVILEGIOS
                            FROM USUARIOS AS usu
                            LEFT JOIN ACESSOS AS ac ON usu.ID = ac.USUARIO_ID
                            LEFT JOIN AMBIENTES AS amb ON amb.ID = ac.AMBIENTE_ID
                            LEFT JOIN ACESSO_PRIVILEGIOS AS acp ON acp.ACESSO_ID = ac.ID
                            LEFT JOIN PRIVILEGIOS AS pr ON pr.ID = acp.PRIVILEGIO_ID
                            GROUP BY ac.ID, CONCAT(usu.USER,"@",usu.HOST), ac.INICIO, amb.NOME');

    }
}




SELECT CONCAT('GRANT PRIVILEGES', GROUP_CONCAT(pr.NOME), ' ON *.* TO ',  usu.USER,"@",usu.HOST)
FROM USUARIOS AS usu
LEFT JOIN ACESSOS AS ac ON usu.ID = ac.USUARIO_ID
LEFT JOIN AMBIENTES AS amb ON amb.ID = ac.AMBIENTE_ID
LEFT JOIN ACESSO_PRIVILEGIOS AS acp ON acp.ACESSO_ID = ac.ID
LEFT JOIN PRIVILEGIOS AS pr ON pr.ID = acp.PRIVILEGIO_ID
GROUP BY CONCAT(usu.USER,"@",usu.HOST), ac.INICIO, amb.NOME;