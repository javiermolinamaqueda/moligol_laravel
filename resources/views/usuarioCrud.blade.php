@extends('plantilla')

@section('contenido')
    {{ csrf_field() }}
    <button id="mostrarModal">Añadir Usuario</button>
    <table id="tabla" class="table">
        <thead class="thead">
            <th>ID</th>
            <th>NOMBRE</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            @foreach($dat as $row)

                <tr id="usuario-{{$row->idUsu}}" data-idusuario="{{$row->idUsu}}">
                    <td>{{$row->idUsu}}</td>
                    <td>{{$row->nombre}}</td>
                    <td><a class="borrar" href="">Borrar</a></td>
                    <td></td>
                </tr>

            @endforeach     
        </tbody>
    </table>
   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
          Nombre: <input id="nombre" type="text" required/><br>
          Apellidos: <input id="ape" type="text" required/><br>
          Email: <input id="ema" type="text" required/><br>
          Pass: <input id="pass" type="password" required/>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="add" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
</div>
                 <p id="prueba"></p>   


@stop

@section('script')
<script>

    $(document).ready(function(){

        $(document).on('click','.borrar',function(event){
            event.preventDefault();
            var idUsu = $(this).parents('tr').data("idusuario");
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'usuarioBorrar',
                data:{'idUsu':idUsu,'_token':_token},
                type:'get',
                success:function(){
                    $("#usuario-" + idUsu).fadeOut(500,function(){$(this).remove();});
                }
            });
        });

        //Abrir modal
        $(document).on('click','#mostrarModal',function(event){
            $("#modal").modal('show');
        });

        //Enviar datos para añadir usuario
        $(document).on('click','#add',function(event){
          var nombre = document.getElementById('nombre').value;
          var ape = document.getElementById('ape').value;
          var email = document.getElementById('ema').value;
          var pass = document.getElementById('pass').value;
          var _token = $('input[name="_token"]').val();
          
          //enviamos los parametros por ajax
          $.ajax({
            url:'usuarioAdd',
            data: {'nombre':nombre,'ape':ape, 'ema':email, 'pass':pass, '_token':_token},
            type:'post',
            //ocultamos el modal y añadimos la nueva fila con el nuevo usuario
            success:function(data){
              $('#modal').modal('hide');
              $('#tabla').append(data);
            }
          });
        });
    });

</script>

@stop