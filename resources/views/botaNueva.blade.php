@extends('plantilla')

@section('enlace')
    <link rel="stylesheet" href="{{URL::asset('botaNueva.css')}}" type="text/css"/>
@stop

@section('contenido')

    <div class="col-6 mt-4">
        <div class="row">
            <div class="col-6">
                <h3>Botas de Fútbol</h3>
            </div>
            <div class="col-3">
                <div id="banner"></div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <p>Bienvenido a Moligol, nuestra sección para jugadores de fútbol. Aquí podrás comprar tus botas de fútbol, desde los últimos modelos llevados actualmente por los jugadores profesionales hasta ofertas con las que hacerte con unas botas de fútbol baratas.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-outline-info" href="{{route('bota.todas')}}" role="button"><h6>Ver todas las botas -></h6></a>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <a class="btn btn-outline-info" href="{{route('marcas')}}" role="button"><h6>Ver todas las marcas -></h6></a>
            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="col">    
            <video style="margin-top:30%;" width="300" id="video" loop autoplay preload muted>
                    <source src="video-main.mp4" type="video/mp4" />
            </video>
        </div>
    </div>

@stop

