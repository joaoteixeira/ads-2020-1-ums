<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sgbd extends Model
{
    public  $timestamps = false;
    protected $primaryKey = 'ID';
    protected $table = 'SGBDS';
    protected $fillable = ['NOME'];

    public function privilegios(){

        return $this->belongsToMany('\App\Privilegio', 'SGBD_PRIVILEGIOS', 'SGBD_ID', 'PRIVILEGIO_ID');
    }
}
