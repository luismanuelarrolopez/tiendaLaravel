@extends('pagina.index')

@section('contenido')
<!-- ======= Hero Section ======= -->
<section id="hero">
    
    <div class="hero-container">
    
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade " data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url(assets/img/Home/home1.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Bienvenido a <span>Cauca Agro Sostenible</span></h2>
                <p class="animate__animated animate__fadeInUp">Encuentra aqui productos 100% saludables, extraidos con amor de las imponentes montañas de nuestro departamento hasta la comodidad de tu mesa.</p>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url(assets/img/Home/home4.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated fanimate__adeInDown">La tecnologia en beneficio<span> del campo Colombiano</span></h2>
                <p class="animate__animated animate__fadeInUp">Cauca agro sostenible, una herramienta con miras a contribuir a la visualización del campo y los campesinos caucanos.</p>

              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background: url(assets/img/Home/home5.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"> <span></span></h2>
                <p class="animate__animated animate__fadeInUp"></p>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

       

      </div>
    </div>

   
  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= About Section ======= -->
    
      <section class="page-section about-heading">
       
        <div class="container">
          <center>
            <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/Home/quiene.jpg" alt="..." />
            
          </center>
           
        </div>
    
      <div id="about" class="paddsection">
        <div class="container">
          <div class="row justify-content-between">
  
            <div class="col-lg-4 ">
              <div class="div-img-bg">
                <div class="about-img">
                  <img src="assets/img/Home/logol.png" class="img-responsive" alt="me">
                </div>
              </div>
            </div>
  
            <div class="col-lg-7">
              <div class="about-descr">
  
              
                <p class="separator" style ="text-align: justify!important;" >
                  #Cauca agro sostenible. El Departamento del Cauca es una región de Colombia que por su contexto geográfico tiene grandes
                  capacidades, entre ellas, la agricultura como factor relevante a nivel económico y alimentario. En este sentido,
                  son innumerables las familias y asociaciones que no cuentan con mecanismos de visibilización y
                  comercialización de los productos agrícolas. Entre los productos que más se producen, se encuentran: plátano,
                  papaya, aguacate, mora, piña, papa, cebolla, yuca, chontaduro, limones, naranjas y coco, entre otros muchos
                  productos. Curiosamente, el Cauca es el tercer productor de coco de Colombia sobre las costas del pacifico
                  caucano, pero nuestra región por los embates de la violencia y los cultivos ilícitos, no se ha permitido el
                  crecimiento del sector agro, ni la industrialización del mismo. <br> <br> #CaucaAgroSostenible es una iniciativa
                  académica que pretender visibilizar a las familias, emprendimientos, asociaciones y demás, que se dediquen
                  a los cultivos productivos y a la transformación de los mismos. La iniciativa busca mediante la divulgación a
                  través de medios digitales, especialmente de sitios web, conocer la oferta agraria del Cauca y contribuir a la
                  cadena de producción de los pequeños y medianos campesinos y agricultores de las zonas rurales.</p>
  
              </div>
  
            </div>
          </div>
        </div>
      </div><!-- End About Section -->
    </section><!-- End About Section -->
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

