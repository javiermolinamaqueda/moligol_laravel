<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use DB;

class marcaControlador extends Controller
{
    public function __construct(){
        
    }
    //
    public function listar(){
        $datos = Marca::all();

        return view('main',['dat'=>$datos]);
    }
    
    /**
     * buscar
     *
     * @param  mixed $req
     * @return void
     */
    public function buscar(Request $req){

        if($req->get('query')):
            $query = $req->get('query');
            $datos = DB::table('marca')
                ->where('nombre','LIKE',"%{$query}%")
                ->get();
                
        else:
            $datos = Marca::all();
        endif;
        $output = "";
        foreach($datos as $row):
            $output.="<div class='col-lg-6 col-md-12 col-sm-12 col-xs-12'>
                            <div class='card mb-2' style='width: 12rem; background-color:#3B5AFF'>
                                    <a class='card-link' href= ".route ('botMar.ver', ['id'=>$row->idMar] ).">
                                            <div class='card-body'>
                                                <h4 class='text-center text-dark card-title'>$row->nombre</h4>
                                            </div>
                                    </a>
                            </div>
                    </div>";
        endforeach;
        echo $output;
        
        
    }


}
