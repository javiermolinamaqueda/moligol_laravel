@extends('plantilla')

@section('enlace')
<!-- Styles -->
<link rel="stylesheet" href="{{asset('css/botaInfo.css')}}" type="text/css"/>
@stop

@section('contenido')
        <div class="col-12">
            <p><a style="text-decoration:none;" href="{{route('inicio')}}">Inicio </a>/
            @if(!empty($marca))
                <a style="text-decoration:none;" href="{{route('marcas')}}"> Marcas </a>/
                <a style="text-decoration:none;" href="{{route ( 'botMar.ver', ['id'=>$idMarca] ) }}"> {{$marca}} </a>/ Info</p>
            @else
                <a style="text-decoration:none;" href="{{route('bota.todas')}}"> Botas </a> / Info
            @endif
        </div>
            <div class="row">           
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ml-4">
                    <img style="width:25rem;"src="{{$dat->foto}}"/>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="row mt-5">
                        <div class="col-11 float-center">{{$dat->info}}</div>
                        <div class="col-11 pt-2"><h4>{{$dat->precio}}</h4></div>
                    </div>
                    <div class="row mt-2">
                        <form action="{{route('carrito.add')}}">
                            <input id="idBo" type="hidden" name="idBo" value="{{$dat->idBo}}">
                            <input id="cantidad" class="form-control" type="number" min="1" name="cantidad" placeholder="Cantidad" required/>
                            <button id="mostrarModal" class="btn btn-primary mt-3" type="submit">Añadir al carrito</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal confirmacion pedido-->
            <div id="modal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Su artículo ha sido añadido</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-footer">
                        <a id="irCarrito" href="{{route('carrito')}}" type="button" class="btn btn-success">Ir al carrito</a>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Seguir comprando</button>
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
            if($('#cantidad').val().length > 0){
                event.preventDefault();
                var cantidad = $('#cantidad').val();
                var idBo = $('#idBo').val();
            

                $.ajax({
                url:'carritoAdd',
                data: {'cantidad':cantidad,'idBo':idBo},
                type:'get'
                //ocultamos el modal y añadimos la nueva fila con el nuevo usuario
                //success:function(data){
                //$('#modal').modal('hide');
                //$('#tabla').append(data);
                //}
                 });
            
                $("#modal").modal('show');
            }

        });

    });
</script>
@stop