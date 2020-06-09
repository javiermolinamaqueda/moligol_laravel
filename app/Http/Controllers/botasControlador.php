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

        $datos = Marca::find($id)->botas()->get();
        
        return view('botMar', ['dat'=>$datos]);
    }

    public function info(Request $req){
        $id = $req->input('idBo');

        $datos = Bota::find($id);

        return view('botaInfo', ['dat'=>$datos]);
    }

    public function listarTodas(){
        $datos = DB::table('botas')->paginate(2);

        return view('botas',compact('datos'));
    }

    public function fetch_data(Request $req){

        if($req->ajax()){
            $datos = DB::table('botas')->paginate(2);

            return view('botas1',compact('datos'))->render();
        }
    }
    
    public function nueva (){
        return view ('botaNueva');
    }
}
