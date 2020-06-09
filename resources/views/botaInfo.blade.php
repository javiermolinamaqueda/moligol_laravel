@extends('plantilla')
@section('contenido')

            <div class="row">           
                <div class="col-3"></div>
                <div class="col-3">
                    <img style="width:12rem;"src="{{$dat->foto}}"/>
                </div>
                <div class="col-3">
                    <div class="float-center">{{$dat->info}}</div>
                </div>
                <form action="{{route('carrito.add')}}">
                    <input type="hidden" name="idBo" value="{{$dat->idBo}}">
                    <input type="number" name="cantidad"/>
                    <button class="btn btn-primary" type="submit">Añadir al carrito</button>
                </form>
            </div>
@stop