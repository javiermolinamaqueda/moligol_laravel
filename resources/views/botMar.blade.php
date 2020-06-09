@extends('plantilla')

@section('contenido')

        <div class="col-9">    
            <div class="row">      
                @foreach($dat as $item)

                        <div class="col-4">
                            <a href="{{ route('bota.info',['idBo'=>$item->idBo] ) }}">
                                <img style="width:12rem;" src="{{ $item->foto }}"/>
                            </a>
                        </div>

                @endforeach
        </div>
@stop