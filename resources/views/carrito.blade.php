@extends('plantilla')

@section('enlace')
    <link rel="stylesheet" href="{{URL::asset('css/carrito.css')}}" type="text/css"/>
@stop

@section('contenido')
    @if(!$datos->isEmpty())
        <div class="ml-3 mt-2"><a style="text-decoration:none; color:#4AA49E; font-size:15px;" href="{{route('bota.todas')}}">Seguir comprando</a></div>
        <div class="col-12 mt-2">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Marca</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @foreach($datos as $row)

                    <tr id="" data-idusuario="">
                        <td>{{$row->nombre}}</td>
                        <td>{{$row->precio}}</td>
                        <td>{{$row->cantidad}}</td>
                        <td><img src="{{$row->foto}}" style="width:6rem;"alt=""></td>
                        <td><a class="borrar btn btn-danger" href="{{route('carrito.borrar',['idBo'=>$row->idBo])}}">Borrar</a></td>
                        <td></td>
                    </tr>

                @endforeach
            </table>
            <div class="mb-3"><a id="mostrarModal" href="" class="btn btn-success">Realizar compra</a></div>
        </div>
    @else
        <p class="ml-3">El carrito se encuetra vacío</p>

    @endif

            <!-- Modal confirmacion pedido-->
            <div id="modal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Su compra ha sido realizada con éxito</h5>
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-footer">
                        <a href="{{route('inicio')}}" type="button" class="btn btn-primary">Aceptar</a>
                    </div>
                    </div>
                </div>
            </div>

@stop

@section('script')
<script>
    $(document).ready(function(){
        //Abrir modal
        $(document).on('click','#mostrarModal',function(event){
                event.preventDefault();           

                $.ajax({
                    url:'compra'
                });
            
                $("#modal").modal('show');

        });

    });
</script>
@stop