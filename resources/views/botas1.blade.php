@foreach($datos as $item)
    <div class="col-4">
        <div class="card" style="width: 9rem;">
            <img class="card-img-top" src="{{$item->foto}}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">Desde {{$item->precio}}</p>
                <a href="#" class="btn btn-primary">+info</a>
            </div>
        </div>
    </div>
@endforeach

