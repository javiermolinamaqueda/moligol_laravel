@extends('plantilla')

@section('contenido')
    {{ csrf_field() }}
    <div class="col-12">
      <h4 class="mt-2">USUARIOS</h4>
      <table id="tabla" class="table table-bordered">
          <thead class="thead">
              <th scope="col">ID</th>
              <th scope="col">NOMBRE</th>
              <th scope="col">EMAIL</th>
              <th scope="col"></th>
              <th scope="col"></th>
          </thead>
          <tbody>
              @foreach($dat as $row)

                  <tr id="usuario-{{$row->id}}" data-idusuario="{{$row->id}}"
                    data-nombre="{{$row->name}}" data-email="{{$row->email}}">
                      <td>{{$row->id}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->email}}</td>
                      <td><a class="editar btn btn-primary" href="">Editar</a></td>
                      <td><a class="borrar btn btn-danger" href="">Borrar</a></td>
                  </tr>
              @endforeach     
          </tbody>
      </table>
    </div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">

          <div class="form-group">  
            <label>Id</label> 
            <input class="form-control" id="idUsu" type="numbre" readonly/>
          </div>  
          <div class="form-group">
            <label>Nombre</label> 
            <input class="form-control" id="nombre" type="text" required/>
          </div>
          <div class="form-group">
            <label>Email</label> 
            <input class="form-control" id="ema" type="text" required/>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="aceptar" type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div> 


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

        //Editar
        $(document).on('click','.editar',function(event){
          event.preventDefault();
          var idUsu = $(this).parents('tr').data("idusuario");
          var _token = $('input[name="_token"]').val();
          //cargar datos modal
          $('#nombre').val($(this).parents('tr').data("nombre"));
          $('#ema').val($(this).parents('tr').data("email"));
          $('#idUsu').val(idUsu);

          $("#modal").modal('show');
        })

        //Enviar datos y actualizar
        $(document).on('click','#aceptar',function(event){
          var id = document.getElementById('idUsu').value;
          var name = document.getElementById('nombre').value;
          var email = document.getElementById('ema').value;
          var _token = $('input[name="_token"]').val();
          
          //enviamos los parametros por ajax
          $.ajax({
            url:'usuarioEditar',
            data: {'id':id, 'name':name, 'email':email, '_token':_token},
            type:'post',
            //ocultamos el modal y actualizamos la nueva fila con el nuevo usuario
            success:function(data){
              $('#modal').modal('hide');
              $('#usuario-'+id).html(data);
            }
          });
        });

        //Abrir modal
        $(document).on('click','#mostrarModal',function(event){
            $("#modal").modal('show');
        });

        //Enviar datos para añadir usuario
        /*$(document).on('click','#add',function(event){
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
        });*/
    });

</script>

@stop