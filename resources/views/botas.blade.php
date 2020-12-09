@extends('plantilla')


@section('contenido')
    <div class="col mt-4">
        <div class="row">
            <div class="col">
                <h3>Botas de Fútbol</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <p>Para elegir la bota de fútbol adecuada para ti, deberás tener en cuenta la superficie sobre las que juegas, tus habilidades y características técnicas, la elección de una bota de fútbol es fundamental para demostrar todo lo que eres capaz de hacer. Escoger una suela que te garantice buena tracción en la superficie en la que juegas o una bota con las características de peso y material que mejor se adaptan a tus características es primordial. Aquí en nuestra web encontrarás todas las <strong>botas de fútbol</strong> del mercado, desde las fabricadas en piel natural a las nuevas botas ultraligeras y sintéticas. Todas ellas montadas en todos los tipos de suelas y gamas disponibles</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-4">
                <canvas id="grafica" height="200" width="200">
                </canvas>
            </div>

            <div class="col-8 mt-4">
                <div id="table" class="row">
                    @include('botas1')
                </div>
                <div class="row">
                    <div class="col-12 mt-4 float-right">
                        {!! $datos->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
            }
        });
        $(document).ready(function(){
            
            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page){
                $.ajax({
                    url:'botas1',
                    data: {'page':page},
                    type:'get',
                    success:function(data){
                        $('#table').html(data);
                    }
                });
            }  
        });
    </script>
    
    <script type="text/javascript">

    var ctx = document.getElementById('grafica').getContext('2d');

    var barValores = [70, 75, 40, 20, 15];

    var label = ["Nike", "Adidas", "Puma", "Kappa", "Lotto"];

    var myChart = new Chart(ctx, {

    type: 'bar',
    data: {
        labels: label,
        datasets: [{

            label: "Valores",
            data: barValores,
            backgroundColor: [
                'rgba(195, 64, 108)',
                'rgba(50, 64, 90)',
                'rgba(260, 20, 108)',
                'rgba(130, 64, 108)',
                'rgba(110, 40, 80)',
            ],
            borderColor:'#FFFFFF',
            borderWidth: 1
        }]

        },
        options: {

            responsive: false

        }
    });

</script>
@stop