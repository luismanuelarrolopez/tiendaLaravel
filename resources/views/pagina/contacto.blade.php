@extends('pagina.index')

@section('contenido')
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="{{url('/inicio')}}">Inicio</a></li>
      <li>Contactanos</li>
    </ol>
    <h2>Contactanos</h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
        <center>
        <h2>CONTÁCTANOS</h2>
        <br>
      <p>
        Cauca agro sostenible, es una nueva alternativa que fusiona las herramientas tecnológicas con la fuerza agraria caucana, con el fin de contribuir a la cadena de producción de los pequeños y medianos campesinos y agricultores de las zonas rurales.
        <br>
      </p>
        </center>
    </div>
    Para mayor información contáctate directamente con nosotros a través del siguiente formulario. 
    <br>
    

    <div class="row mt-5">

      <div class="col-lg-4">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Localización: </h4>
            <p>Cll 15#13-25 br. El Limonar, Popayan-Cauca </p>
          </div>

          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Correo electronico:</h4>
            <p>CaucaAgroSostenible@unicauca.com</p>
          </div>

          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Número telefónico: </h4>
            <p>+57 321 7592465</p>
          </div>

        </div>

      </div>

      <div class="col-lg-8 mt-5 mt-lg-0">

        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Correo electronico" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Motivo" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Mensaje" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Tu mensaje ha sido enviado. Gracias!</div>
          </div>
          <div class="text-center"><button type="submit">Enviar </button></div>
        </form>

      </div>

    </div>

  </div>
</section><!-- End Contact Section -->

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