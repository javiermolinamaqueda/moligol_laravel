@extends('plantilla')

@section('contenido')
    @if(!$datos->isEmpty())
        <div class="col-6">
            <table class="table">
                @foreach($datos as $row)

                    <tr id="" data-idusuario="">
                        <td>{{$row->nombre}}</td>
                        <td>{{$row->precio}}</td>
                        <td>{{$row->cantidad}}</td>
                        <td><img src="{{$row->foto}}" style="width:6rem;"alt=""></td>
                        <td><a class="borrar" href="{{route('carrito.borrar',['idBo'=>$row->idBo])}}">Borrar</a></td>
                        <td></td>
                    </tr>

                @endforeach
            </table>
            <a href="{{route('compra')}}" class="button">Realizar compra</a>
        </div>
    @else
        <p>El carrito se encuetra vacío</p>

    @endif

@stop