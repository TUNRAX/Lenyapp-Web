@extends('layouts.app')

@section('content')
@if($errors->any())
<div class="alert alert-danger alert-dismissible" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{$errors->first()}}
</div>
@endif


<div id="map" style="width:100%;height:400px;position: relative;"></div>

<script>
    var geocoder;
    var map;
    var proveedores = <?php echo $proveedores; ?>



    function initialize() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-40.5739517, -73.1334763);
        var mapOptions = {
            zoom: 14,
            center: latlng
        }
        map = new google.maps.Map(document.getElementById('map'), mapOptions);



        $.each(proveedores, function(index, value) {
            direcciones = value['direccion'] + ", Osorno, Chile";
            var id = value['id'];
            console.log(id);
            var texto = '<div id="content">' +
                '<h1 id="firstHeading" class="firstHeading">' +
                value['nombre'] + ' ' + value['apellido'] +
                '</h1>' +
                '<div id="bodyContent">' +
                '<p>' +
                '<b>' +
                value['direccion'] +
                '</b>' +
                '</p>' +
                '<p>' +
                '<a href="{{ url("datosProveedor")}}/' + value['id'] + '">' +
                'link' +
                '</a>' +
                '</p>' +
                '</div>' +
                '</div>';

            geocoder.geocode({
                'address': direcciones
            }, function(results, status) {
                if (status == 'OK') {
                    map.setCenter(results[0].geometry.location);

                    var infowindow = new google.maps.InfoWindow({
                        content: texto
                    });
                    var marker = new google.maps.Marker({
                        map: map,
                        title: value['nombre_empresa'],
                        position: results[0].geometry.location
                    });

                    marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        });
    }
</script>

@endsection