@extends('pagina.index')

@section('contenido')
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="{{url('/inicio')}}">Inicio</a></li>
      <li>Inversionistas</li>
    </ol>
    <h2>Inversionistas</h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Team Section ======= -->
<section id="team" class="team">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>INVERSIONISTAS</h2>
      <p>Invertir en el campo colombiano es apoyar a miles de familias campesinas caucanas que dia tras dia trabajan arduamente, para que en nuestra mesa podamos gozar de alimentos de calidad y 100% naturales.</p>
    </div>

    <div class="row">
    @foreach ($inversionistas as $itemInversionista)
        <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="pic"><img src="{{ asset('storage').'/'.$itemInversionista->Imagen}}" class="img-fluid" alt=""></div>
            <div class="member-info">
                <center>
                <h4>{{ $itemInversionista->Nombre}}</h4>
                <span>{{ $itemInversionista->Cargo}}</span>
                </center>
                <p style ="text-align: justify!important;" >{{ $itemInversionista->Descripcion}}</p>
                <i class="bx bx-mail-send"><a> {{ $itemInversionista->Correo}}</a></i>
                <div class="social">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
                </div>
            </div>
            </div>
        </div>
    @endforeach
    </div>
  </div>
</section><!-- End Team Section -->
</main><!-- End #main -->
@endsection