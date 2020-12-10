<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bota;
use App\marca;
use DB;

class botasControlador extends Controller
{
    //
    public function listar(){
        $datos = bota::all();

        return view('botas',['dat'=>$datos]);

    }
    
    /**
     * listarId
     *
     * @param  mixed $req
     * @return void
     */
    public function listarId(Request $req){
        $id = $req->input('id');

        $marca = Marca::find($id);

        $datos = $marca->botas()->get();
        
        return view('botMar', ['dat'=>$datos, 'marca'=>$marca]);
    }

    public function info(Request $req){
        $id = $req->input('idBo');

        $datos = Bota::find($id);
        $marca = "";
        $idMarca = "";

        if($req->input('marca')){
            $marca = $req->input('marca');
            $idMarca = $req->input('idMarca');
        }

        return view('botaInfo', ['dat'=>$datos, 'marca'=>$marca, 'idMarca'=>$idMarca]);
    }

    public function listarTodas(){
        $datos = DB::table('botas')->paginate(3);
        $filas = count($datos);
        return view('botas',compact('datos','filas'));
    }

    public function fetch_data(Request $req){

        if($req->ajax()){
            $datos = DB::table('botas')->paginate(3);

            return view('botas1',compact('datos'))->render();
        }
    }
    
    public function nueva (){
        return view ('botaNueva');
    }
}
