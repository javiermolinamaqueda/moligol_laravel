<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;
use DB;

class usuarioControlador extends Controller
{
    //
    public function crud(){
        $datos = Usuario::all();
        return view ('usuarioCrud', ['dat'=>$datos]);
    }

    public function borrar(Request $req){
        $idUsu = $req->get('idUsu');
        $usuario = Usuario::find($idUsu);
        $usuario->delete();
    }

    public function add(Request $req){
        $usu = new Usuario;
        $usu->nombre = $req->get('nombre');
        $usu->apellidos = $req->get('ape');
        $usu->email = $req->get('ema');
        $usu->password = $req->get('pass');

        $usu->save();

        echo "<tr id='usuario-$usu->idUsu' data-idusuario='$usu->idUsu'>
                <td>$usu->idUsu</td>
                <td>$usu->nombre</td>
                <td><a class='borrar' href=''>Borrar</a></td>
                <td></td>
            /tr>";
        
    }
}
