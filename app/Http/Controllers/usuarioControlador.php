<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class usuarioControlador extends Controller
{
    //
    public function crud(){
        $datos = User::all();
        return view ('usuarioCrud', ['dat'=>$datos]);
    }

    public function borrar(Request $req){
        $idUsu = $req->get('idUsu');
        $usuario = User::find($idUsu);
        $usuario->delete();
    }

    public function editar(Request $req){
        $id = $req->post('id');
        $name = $req->post('name');
        $email = $req->post('email');

        $usu = User::find($id);
        $usu->update([
            'name'  => $name,
            'email' => $email,
        ]);

        echo "<td>$usu->id</td>
              <td>$usu->name</td>
              <td>$usu->email</td>
              <td><a class='editar btn btn-primary' href=''>Editar</a></td>
              <td><a class='borrar btn btn-danger' href=''>Borrar</a></td>";
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
