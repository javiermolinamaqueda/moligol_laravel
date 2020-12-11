@extends('plantilla')

@section('enlace')
<!-- Styles -->
<link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css"/>
@stop

@section('contenido')
        
        {{ csrf_field() }}
                <div class="col-12">
                        <p><a style="text-decoration:none;" href="{{route('inicio')}}">Inicio </a>/ Marcas</p>
                </div>
                <div class="col-5">
                        <div class="iniesta"></div>
                </div>
                <div class="contenido col-5 mt-4">
                        <audio id="audio" src="sonido-main.mp3" autoplay="true"> 
                        </audio>
                        
                        <div class="md-form active-pink active-pink-2 mb-3 mt-0">
                                <input name="buscador" id="buscador" class="form-control" type="text" placeholder="Buscar Marca" aria-label="Buscar marca">
                        </div>

                        <div id="lista" class="row">         
                                @foreach($dat as $item)

                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="card mb-2" style="width:12rem; background-color:#3B5AFF;" >
                                                        <a class="card-link" href="{{route ( 'botMar.ver', ['id'=>$item->idMar] ) }}">
                                                                <div class="card-body">
                                                                <h4 class="text-center text-dark card-title">{{ $item->nombre }}</h4>
                                                                </div>
                                                        </a>
                                                </div>
                                        </div>

                                @endforeach
                        </div>
                </div>
        </div>
@stop

@section('script')

        <script>
                $(document).ready(function(){
                        $(document).on("keypress keyup","#buscador",function(){
                                var query = $(this).val();
                                
                                        var _token = $('input[name="_token"]').val();
                                        $.ajax({
                                                url:'autocompletar',
                                                method:'post',
                                                data:{'query':query,_token:_token},
                                                success: function(data){
                                                        //$('#lista').fadeIn();
                                                        $('#lista').html(data);
                                                }
                                        });
                                
                        });
                });
        </script>

@stop