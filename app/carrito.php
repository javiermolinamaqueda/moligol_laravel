<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class carrito extends Model
{
    //
    protected $table = 'carrito';
    protected $primaryKey = 'idCar';

    public function botas(){
        return $this->belongsToMany('App\bota', 'car_bot','idCar', 'idBo');
    }

    public function usuario(){
        return $this->belongsToMany('App\user', 'compra', 'idCar', 'id');
    }

    public static function buscar(){
        $info = DB::table('car_bot')
            ->join('botas', 'botas.idBo','=', 'car_bot.idBo')
            ->join('marca', 'marca.idMar', '=', 'botas.idMar')
            ->where('idCar','=', session('idCar'))
            ->get();
        
            return $info;
    }
}
