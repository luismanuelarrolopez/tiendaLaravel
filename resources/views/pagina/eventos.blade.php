@extends('pagina.index')

@section('contenido')


<!--
<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' /> -->
<link href="https://api.mapbox.com/mapbox-gl-js/v2.5.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.5.0/mapbox-gl.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<style>
.marker {
display: block;
border: none;
border-radius: 50%;
cursor: pointer;
padding: 0;
}
</style>
<main id="main">
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="{{url('/inicio')}}">Inicio</a></li>
      <li>Eventos</li>
    </ol>
    <h2>Eventos</h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Eventos Section ======= -->
<section id="skills" class="skills">
    <div class="container">
        <div class="section-title">
            <h2>EVENTOS</h2>
            <p>Prográmate con nosotros, para que disfrutes de las mejores ferias y eventos agropecuarios del departamento del cauca y el sur de Colombia.</p>
        </div>
    <div class="row">
<!-- ======= Contact Single ======= -->

<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="contact-map box">
                <!--Mapa-->
                <div id="map" class="contact-map">
                    <div id='map' style='width: 400px; height: 300px;'></div>
                </div>
                <!--Cierre Mapa-->
                </div>
            </div>
        </div>
    </div>
</section><!-- End Our Skills Section -->
<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container">
        <div class="row">
            @foreach ($eventos as $itemEvento)
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-item mt-4 mt-lg-0" >
                    <img src="{{ asset('storage').'/'.$itemEvento->Imagen}}" class="testimonial-img" alt="">
                    <center>
                        <h3>{{ $itemEvento->Nombre}}</h3>
                    </center>  
                    <p class=" text-justify">{{ $itemEvento->Descripcion}}</p> 
                    <p>
                        <i class="bx bx-calendar"><a> {{ $itemEvento->Fecha}} <br> </a></i>
                        <!--<i class="bx bx-time"><a> 7:00 a.m </a></i>-->
                    <br>
                        <i class="bx bx-map"><span> {{ $itemEvento->Ubicacion}}</span></i>
                    </p>
                    <center>
                        <button id="evento" data-coord="[-76.61316, 2.43823]" class= "btn btn-primary mt-2"> Ubicacion </button>
                    </center> 
                </div>
            @endforeach
        </div>  
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="testimonial-item mt-4 mt-lg-0">
              <img src="assets/img/vega.jpg" class="testimonial-img" alt="">
              <center>
                <h3>39 Ferias y fiestas agropecuarias, ganaderas y empresariales de la Vega</h3>
              </center>  
              <p class=" text-justify">
                Disfruta de la exposicion agricola, ganadera y artesanal mas importante del sur occidente colombiano, y en la noche celebra con nosotros en tu caseta la Vegueñita
              </p> 
              <p>
                <i class="bx bx-calendar"><a> 2022-08-13 8:00 am <br> </a></i>
              <br>
              <i class="bx bx-map"><span> Municipio de La Vega Cauca </span></i>
            </p>
              <center>
              <button id="evento" data-coord="[-76.78037975852345,2.0047222406443552]" class= "btn btn-primary mt-2"> Ubicacion </button>
              </center> 
            </div>
          </div>
    </div>
</div>

</section><!-- End Services Section -->
</main><!-- End #main -->

<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoibWFndXRpZXJyZXowNiIsImEiOiJja3R4cng4cW4xNm90Mm9xbXhjMm5nZ3BmIn0.Gqs_PoHcNnBSFyUhPj03Gg';
const geojson = {
'type': 'FeatureCollection',
'features': [
{
'type': 'Feature',
'properties': {
'message': 'Disfruta de los mejores productos saludables, ricos y orgánicos, directamente traídos desde el municipio de la Vega-Cauca corazón del macizo colombiano',
'iconSize': [30, 30]
},
'geometry': {
'type': 'Point',
'coordinates': [-76.61316, 2.43823]
}
},
{
'type': 'Feature',
'properties': {
'message': 'Disfruta de la exposicion agricola, ganadera y artesanal mas importante del sur occidente colombiano, y en la noche celebra con nosotros en tu caseta la Vegueñita',
'iconSize': [30, 30]
},
'geometry': {
'type': 'Point',
'coordinates': [-76.78037975852345,2.0047222406443552]
}
},
]
};
 
const map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
center: [-76.6072368, 2.4422295],
zoom: 14
});
 
// Add markers to the map.
for (const marker of geojson.features) {
// Create a DOM element for each marker.
const el = document.createElement('div');
const width = marker.properties.iconSize[0];
const height = marker.properties.iconSize[1];
el.className = 'marker';
el.style.backgroundImage = `url(assets/img/ubicacion.png)`;
el.style.width = `${width}px`;
el.style.height = `${height}px`;
el.style.backgroundSize = '100%';
 
el.addEventListener('click', () => {
window.alert(marker.properties.message);
});
 
// Add markers to the map.
new mapboxgl.Marker(el)
.setLngLat(marker.geometry.coordinates)
.addTo(map);
}
//Metodo para ubicar a un evento (Necesita la libreria jquery)
$(document).on("click","#evento", function(){
        var coor =$(this).data("coord");
//para mandar hacia arriba
        window.scrollTo({
            top: 180,
            behavior: 'smooth'
        });

        map.setCenter(coor);
        map.setZoom(15);
        
        
    })
</script>


@endsection