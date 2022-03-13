@extends('pagina.index')

@section('contenido')
  <!-- Favicons -->
  <link href="../assets/img/log.jpg" rel="icon">
  <link href="../assets/img/logo.jpg" rel="apple-touch-icon">

<!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  

<main id="main" >
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{url('/inicio')}}">Inicio</a></li>
                <li>Detalles del producto</li>
            </ol>
            <h2>Detalles del producto</h2>
        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="portfolio-details-slider swiper-container">
                    <div class="swiper-wrapper align-items-center">
                    <img src="{{ asset('storage').'/'.$producto->Imagen}}" alt="">
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="col-lg-4">
                
                    <div class="portfolio-info">
                            <center><h3>{{ $producto->Nombre}}</h3></center>
                            <ul>
                                <li><strong>Categoria</strong> {{$producto->Categoria}} </li>
                                @if($producto->Descuento > 0)
                                    <p>Antes: <del>${{ $producto->Precio}} {{$producto->Cantidad}} </del>
                                    <?php $descto = ($producto->Precio)-(( $producto->Precio)*($producto->Descuento)/100);
                                     
                                    ?>
                                       <br>Ahora: $ {{$descto}} {{$producto->Cantidad}}</p>
                                @else
                                    <li><strong>Precio</strong>: ${{ $producto->Precio}} {{$producto->Cantidad}}</li>
                                @endif
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <center><h2>Descripcion</h2></center>
                                <p style ="text-align: justify!important;" >{{ $producto->Descripcion}}</p>
                            <center>
                                <a href="{{url('/carrito/agregar/'.$producto->id)}}" class="btn btn-primary"> <i class="bx bx-cart"> </i> Añadir a carrito</a>  
                            </center>
                        </div>
                    </div>
               
        </div>
    </div>
</section><!-- End Portfolio Details Section -->
</main><!-- End #main -->

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

   <!-- Template Main JS File -->
   <script src="assets/js/main.js"></script>

@endsection