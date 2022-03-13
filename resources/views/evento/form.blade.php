<h1>{{$modo }} Evento</h1>
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
    <input type="text" class="form-control" name="Nombre" value="{{isset($evento->Nombre)?$evento->Nombre:old('Nombre')}}" id="Nombre">  
</div>
<div class="form-group">
<div class="form-group">
    <label for="Imagen"> Imagen </label>
    @if(isset($evento->Imagen))
    <br>
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$evento->Imagen}}" width="100" alt="">
    @endif
    <input type="file" class="form-control" name="Imagen" value="" id="Imagen">
</div>
<label for="Descripcion"> Descripcion </label>
    <input type="text" class="form-control" name="Descripcion" value="{{isset($evento->Descripcion)?$evento->Descripcion:old('Descripcion')}}" id="Descripcion">  
</div>

<div class="form-group">
<label for="Ubicacion"> Ubicacion </label>
    <input type="text" class="form-control" name="Ubicacion" value="{{isset($evento->Ubicacion)?$evento->Ubicacion:old('Ubicacion')}}" id="Ubicacion">  
</div>
<div class="form-group">
<label for="Fecha"> Fecha </label>
    <input type="text" class="form-control" name="Fecha" value="{{isset($evento->Fecha)?$evento->Fecha:old('Fecha')}}" id="Fecha">  
</div>
<input type="submit"class="btn btn-success" value="{{$modo}}">

<a href="{{ url('evento')}}" class="btn btn-primary" >Regresar</a>