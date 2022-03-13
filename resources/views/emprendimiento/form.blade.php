<h1>{{$modo }} Emprendimiento</h1>
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach( $errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    
@endif
<label>Todos los campos que contienen * son obligatorios</label>
<div class="form-group">

<label for="Nombre"> Nombre *</label>
    <input type="text" class="form-control" name="Nombre" value="{{isset($emprendimiento->Nombre)?$emprendimiento->Nombre:old('Nombre')}}" id="Nombre">  
</div>
<div class="form-group">
<label for="Abreviatura"> Abreviatura </label>
    <input type="text" class="form-control" name="Abreviatura" value="{{isset($emprendimiento->Abreviatura)?$emprendimiento->Abreviatura:old('Abreviatura')}}" id="Abreviatura">  
</div>
<div class="form-group">
    <label for="Imagen"> Imagen *</label>
    @if(isset($emprendimiento->Imagen))
    <br>
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$emprendimiento->Imagen}}" width="100" alt="">
    @endif
    <input type="file" class="form-control" name="Imagen" value="" id="Imagen">
</div>
<div class="form-group">
<label for="Ubicacion"> Ubicacion *</label>
    <input type="text" class="form-control" name="Ubicacion" value="{{isset($emprendimiento->Ubicacion)?$emprendimiento->Ubicacion:old('Ubicacion')}}" id="Ubicacion">  
</div>
<div class="form-group">
<label for="Telefono"> Telefono *</label>
    <input type="text" class="form-control" name="Telefono" value="{{isset($emprendimiento->Telefono)?$emprendimiento->Telefono:old('Telefono')}}" id="Telefono">  
</div>
<input type="submit"class="btn btn-success" value="{{$modo}}">

<a href="{{ url('emprendimiento')}}" class="btn btn-primary" >Regresar</a>