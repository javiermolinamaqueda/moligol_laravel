@extends('plantilla')

@section('contenido')
        <div class="col-12">
            <p><a style="text-decoration:none;" href="{{route('inicio')}}">Inicio </a>/
            <a style="text-decoration:none;" href="{{route('marcas')}}"> Marcas </a>/ {{$marca->nombre}}</p>
        </div>
        <div class="col-12">
            Poner texto si eso
        </div>
        <div class="col-12">    
            <div class="row">      
                @foreach($dat as $item)

                <div class="col-3">
                    <div class="card" style="width: 9rem;">
                        <img class="card-img-top" src="{{$item->foto}}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Desde {{$item->precio}}</p>
                            <a href="{{ route('bota.info',['idBo'=>$item->idBo, 'marca'=>$marca->nombre, 'idMarca'=>$marca->idMar] ) }}" class="btn btn-primary">+info</a>
                        </div>
                    </div>
    </div>

                @endforeach
        </div>
@stop