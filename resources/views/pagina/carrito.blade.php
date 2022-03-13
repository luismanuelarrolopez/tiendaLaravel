@extends('pagina.index')

@section('contenido')
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="{{url('/inicio')}}">Inicio</a></li>
      <li>Carrito compras</li>
    </ol>
    <h2>Carrito compras</h2>

  </div>
</section><!-- End Breadcrumbs -->

<section class="carrito">
  <div class="table-responsive">
      <table class="table table-primary table-hover">
      <div class="section-title"><h2>TU CARRITO</h2></div>
          <thead>
            <tr class="text-secondary">
              <th scope="col">#</th>
              <th scope="col">Productos</th>
              <th scope="col">Precio</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Subtotal</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>
          <tbody class="tbody">
          <?php $total = 0?>
          @foreach($productos as $itemProducto)
          <tr> 
              <th scope="row">{{$itemProducto->Id}}</th>
              <td class="table_productos">
                  <img src="{{ asset('storage').'/'.$itemProducto->Imagen}}" alt="" width="100">
                  <h4 class="title">{{$itemProducto->Nombre}} <br> {{$itemProducto->Cantidad}}</h4>
              </td>
              @if($itemProducto->Descuento > 0)
                <?php $descto = ($itemProducto->Precio)-(( $itemProducto->Precio)*($itemProducto->Descuento)/100);?>
                <td><del>$ {{ $itemProducto->Precio}}</del> <br>$ {{$descto}} </td> 
                
                
                @else
                  <td class="table_precio">$ {{$itemProducto->Precio}}</td>
              @endif
              <td>
                <form class="d-inline" action="{{ url('/carrito/'.$itemProducto->Id.'/-')}}" method="post" >
                      @csrf
                      {{ method_field('PATCH')}}
                      <input type="submit" class="btn btn-success"  value="-">
                </form>
                <span>{{ $itemProducto->cantidad }}</span>
                    <form class="d-inline" action="{{ url('/carrito/'.$itemProducto->Id.'/+')}}" method="post" >
                      @csrf
                      {{ method_field('PATCH')}}
                      <input type="submit" class="btn btn-success"  value="+">
                    </form>
              </td>
              <td class="table_subtotal">
                @if($itemProducto->Descuento > 0)
                <?php $descto = ($itemProducto->Precio)-(( $itemProducto->Precio)*($itemProducto->Descuento)/100);?>
                  <?php $subtotal = ($itemProducto->cantidad)*$descto; 
                                   $total = $total + $subtotal; 
                  ?>
                @else
                <?php $subtotal = ($itemProducto->cantidad)* ($itemProducto->Precio); 
                                   $total = $total + $subtotal; 
                  ?>
                @endif
                  <h6 class="Subtotal">$ {{$subtotal}}</h6>
              </td>
              <td class="table_Borrar">
                            
                            <form action="{{ url('/carrito/'.$itemProducto->Id)}}" method="post">
                                @csrf 
                                {{method_field('DELETE')}}
                                <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')" value="Eliminar">
                            </form>
                        </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <br><br>
        <div class="row mx-4">
            <div class="col">
              <h3 class="itemCartTotal text-primary">Total: $ {{$total}}</h3>
            </div>
            <div class="col d-flex justify-content-end">
              <form action="{{ url('/carrito')}}" method="post">
                @csrf 
                {{method_field('DELETE')}}
                <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')" value="Eliminar carrito">
              </form>                
            </div>
            
        </div>

  </div>
    
</section>


</main><!-- End #main -->




<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

@endsection