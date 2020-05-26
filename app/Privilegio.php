<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilegio extends Model
{
    public  $timestamps = false;
    protected $primaryKey = 'ID';
    protected $table = ]['PRIVILEGIOS', 'SGBD_PRIVILEGIOS'];
    protected $fillable = ['NOME'];
}
