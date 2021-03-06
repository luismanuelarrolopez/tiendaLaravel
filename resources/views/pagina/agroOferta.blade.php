@extends('pagina.index')

@section('contenido')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{url('/inicio')}}">Inicio</a></li>
                <li>Agro Oferta</li>
            </ol>
            <h2>Agro Oferta</h2>
      </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Productos</li>
              <li data-filter=".filter-granos">Granos</li>
              <li data-filter=".filter-frutas">Frutas</li>
              <li data-filter=".filter-tuberculos">Tuberculos</li>
            </ul>
          </div>
        </div>
        <div class="row portfolio-container justify-content-center">
          <div class="col-xl-10">
            <div class="row">
              @foreach ($productos as $itemProducto)
                @if($itemProducto->Descuento > 0)
                  @if(strcmp($itemProducto->Categoria,'Granos')==0)
                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-granos">
                  @elseif (strcmp($itemProducto->Categoria,'Frutas')==0)
                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-frutas">
                  @else
                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-tuberculos">
                  @endif
                      <div class="portfolio-wrap">
                      <div class="new-tag">
                        <h6>{{$itemProducto->Descuento}}%<br>DCTO</h6>
                      </div>
                        <img src="{{ asset('storage').'/'.$itemProducto->Imagen}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                          <h4>{{ $itemProducto->Nombre}}</h4>
                          <?php $descto = ($itemProducto->Precio)-(( $itemProducto->Precio)*($itemProducto->Descuento)/100);?>
                          <p>Antes: <del>$ {{ $itemProducto->Precio}} {{$itemProducto->Cantidad}} </del> 
                          <br> Ahora: $ {{$descto}} {{$itemProducto->Cantidad}}</p>
                          <div class="portfolio-links">
                            <a href="{{ asset('storage').'/'.$itemProducto->Imagen}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ $itemProducto->Descripcion}}" class="btn btn-warning"><i class="bx bx-search"></i></a>
                            <a href="{{ url('/productos/'.$itemProducto->id)}}" title="More Details"><i class="bx bx-cart"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                @endif
              @endforeach
              </div><!-- End portfolio item -->
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">

        <div class="section-title">
          <h2>Encuentra aqui</h2>
          <p>Productos 100% naturales, org??nicos y saludables. Extra??dos con amor y cuidado, desde las verdes e imponentes monta??as de nuestro pa??s para alegrarte el paladar</p>
        </div>

        <div class="clients-slider swiper-container">
            <div class="swiper-wrapper align-items-center">
                @foreach($productos as $itemProducto)
                  @if($itemProducto->Descuento > 0)
                    <div class="swiper-slide"><img src="{{ asset('storage').'/'.$itemProducto->Imagen}}" class="img-fluid" alt=""></div>
                  @endif
                @endforeach
            </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Clients Section -->
  </main><!-- End #main -->    
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
@endsection