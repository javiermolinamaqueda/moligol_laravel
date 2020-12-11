<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrito;
use App\Bota;
use Illuminate\Support\Facades\Auth;

class carritoControlador extends Controller
{
    //
    public function add(Request $req){
        $car = Carrito::find(session('idCar'));
        $car->botas()->attach($req->get('idBo'),['cantidad'=>$req->get('cantidad')]);
        //return redirect()->route('inicio');
    }

    public function listar(){
        $datos = Carrito::buscar();
        return view('carrito',['datos'=>$datos]);
    }

    public function compra(){
        $car = Carrito::find(session('idCar'));
        $car->usuario()->attach(Auth::user()->id);
        //creamos un nuevo carrito por si quiere seguir comprando
        $new = new Carrito();
        $new->save();
        session(['idCar'=>$new->idCar]);

        //return redirect()->route('inicio');
    }

    public function borrar(Request $req){
        $car = Carrito::find(session('idCar'));
        $car->botas()->detach($req->get('idBo'));

        return redirect()->route('carrito');
    }
}
