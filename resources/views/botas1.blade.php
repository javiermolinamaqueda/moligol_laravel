@foreach($datos as $item)
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="card mt-2" style="width: 9rem;">
            <img class="card-img-top" src="{{$item->foto}}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">Desde {{$item->precio}}</p>
                <a href="{{ route('bota.info',['idBo'=>$item->idBo] ) }}" class="btn btn-primary">+info</a>
            </div>
        </div>
    </div>
@endforeach

