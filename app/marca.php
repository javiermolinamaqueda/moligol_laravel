<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    //
    protected $table="marca";
    protected $primaryKey="idMar";

    public function botas(){
        return $this->hasMany('App\bota','idMar');
    }
}
