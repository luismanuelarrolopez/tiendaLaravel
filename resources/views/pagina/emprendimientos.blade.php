@extends('pagina.index')

@section('contenido')

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="{{url('/inicio')}}">Inicio</a></li>
      <li>Emprendimientos y asociaciones</li>
    </ol>
    <h2>Emprendimientos y asociaciones</h2>

  </div>
</section><!-- End Breadcrumbs -->


<!-- ======= Blog Section ======= -->
<section id="blog">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <center>  
        <h2>EMPRENDIMIENTO Y ASOCIACIONES</h2>
        <p>“Algunas personas sueñan con hacer grandes cosas, mientras otras están despiertas y las hacen”. Anónimo.</p>
      </center>
    </div>

   <div class="contenedor-video">
     <center>
      <iframe src="https://www.youtube.com/embed/oRoaYCTypps" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
     </center>
   </div>

    <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100" >
      <div class="swiper-wrapper">
        @foreach($emprendimientos as $itemEmpredimiento)
        <div class="swiper-slide" >
          <div class="testimonial-item">
            <img src="{{ asset('storage').'/'.$itemEmpredimiento->Imagen}}" class="testimonial-img" alt="">
            <h3>{{ $itemEmpredimiento->Nombre}}</h3>
            <h4>{{ $itemEmpredimiento->Abreviatura}}</h4>     
            <p>
              <i class="bx bx-map"><span>{{ $itemEmpredimiento->Ubicacion}} </span></i>
              <br>
              <i class="bx bx-phone"><a> {{ $itemEmpredimiento->Telefono}}</a></i>
            </p>
            <div class="portfolio-links">
              <a href="{{ asset('storage').'/'.$itemEmpredimiento->Imagen}}" data-gallery="portfolioGallery" class="portfolio-lightbox" 
              title=" <center> {{ $itemEmpredimiento->Nombre}} <br> {{ $itemEmpredimiento->Abreviatura}}
               <br>{{ $itemEmpredimiento->Ubicacion}} <br> {{ $itemEmpredimiento->Telefono}} </center>"><i class="bx bx-search"></i></a>
            </div>
          </div>
        </div><!-- End testimonial item -->
        @endforeach
      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section><!-- End Testimonials Section -->
</main><!-- End #main -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
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