<h1>{{$modo }} producto</h1>
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach( $errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    
@endif

<div class="form-group">
<label for="Nombre"> Nombre </label>
    <input type="text" class="form-control" name="Nombre" value="{{isset($producto->Nombre)?$producto->Nombre:old('Nombre')}}" id="Nombre" >
   
</div>
<div class="form-group">
    <label for="Imagen"> Imagen </label>
    @if(isset($producto->Imagen))
    <br>
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->Imagen}}" width="100" alt="">
    @endif
    <input type="file" class="form-control" name="Imagen" value="" id="Imagen">
   
</div>
<div class="form-group">
    <label for="Cantidad"> Cantidad </label>
    <select name="Cantidad" class="custom-select" id="Cantidad">
        <option>Seleccione una opcion</option>
        @foreach ($categoriaCant as $categoria)
        <option value="{{ $categoria }}"
            @if ($categoria == old('Cantidad') or isset($producto->Cantidad) and $categoria == $producto->Cantidad)
                selected="selected"
            @endif
        
        >{{ $categoria }}</option>
        @endforeach
    </select>
   
</div>
<div class="form-group">
    <label for="Categoria"> Categoria </label>
    <select name="Categoria" class="custom-select" id="Categoria">
        <option>Seleccione una opcion</option>
        @foreach ($categoriaProd as $categoriaProducto)
        <option value="{{ $categoriaProducto }}"
            @if ($categoriaProducto == old('Categoria') or isset($producto->Categoria) and $categoriaProducto == $producto->Categoria)
                selected="selected"
            @endif
        
        >{{ $categoriaProducto }}</option>
        @endforeach
    </select>
    
</div>
<div class="form-group">
    <label for="Descripcion"> Descripcion </label>
    <input type="text" class="form-control" name="Descripcion" value="{{isset($producto->Descripcion)?$producto->Descripcion:old('Descripcion')}}" id="Descripcion">
    
</div>
<div class="form-group">
    <label for="Precio"> Precio </label>
    <input type="number" class="form-control" name="Precio" min=0 value="{{isset($producto->Precio)?$producto->Precio:old('Precio')}}" id="Precio">
    
</div>
<div class="form-group">
    <label for="Descuento"> Descuento </label>
    <input type="number" class="form-control" name="Descuento" min=0 max=100 value="{{isset($producto->Descuento)?$producto->Descuento:old('Descuento')}}" id="Descuento">
    
</div>
    <input type="submit"class="btn btn-success" value="{{$modo}}">

    <a href="{{ url('producto')}}" class="btn btn-primary" >Regresar</a>
   