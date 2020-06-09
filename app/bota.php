<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bota extends Model
{
    //
    protected $table = "botas";
    protected $primaryKey = "idBo";

    public function marca(){
        return $this->belongsTo('App\Marca', 'idMar');
    }

    public function carrito(){
        return $this->belongsToMany('App\models\carrito', 'car_bot','idBo', 'idCar');
    }
}

