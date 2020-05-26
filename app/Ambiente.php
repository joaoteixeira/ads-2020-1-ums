<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    public  $timestamps = false;
    protected $primaryKey = 'ID';
    protected $table = 'AMBIENTES';
    protected $fillable = ['NOME', 'SGBD_ID'];

}
