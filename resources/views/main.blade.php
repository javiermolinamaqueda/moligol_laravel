@extends('plantilla')

@section('contenido')
        
        {{ csrf_field() }}
        
        <div class="col-5 mt-4">
                <audio id="audio" src="sonido-main.mp3" autoplay="true"> 
                </audio>
                
                <div class="md-form active-pink active-pink-2 mb-3 mt-0">
                        <input name="buscador" id="buscador" class="form-control" type="text" placeholder="Buscar Marca" aria-label="Buscar marca">
                </div>

                <div id="lista" class="row">         
                        @foreach($dat as $item)

                                <div class="col-6">
                                        <div class="card mb-2" style="width: 12rem; background-image:url('https://cadtech.es/wp-content/uploads/2015/09/fondo-GRIS.jpg');">
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
        <div class="col-4">
                
                <video style="margin-top:30%;" width="350" id="video" loop autoplay preload muted>
                        <source src="video-main.mp4" type="video/mp4" />
                </video>
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
                                                        $('#lista').fadeIn();
                                                        $('#lista').html(data);
                                                }
                                        });
                                
                        });
                });
        </script>

@stop