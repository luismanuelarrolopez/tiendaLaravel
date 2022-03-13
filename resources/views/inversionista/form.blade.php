<h1>{{$modo }} Inversionista</h1>
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
    <input type="text" class="form-control" name="Nombre" value="{{isset($inversionista->Nombre)?$inversionista->Nombre:old('Nombre')}}" id="Nombre">  
</div>
<div class="form-group">
<label for="Cargo"> Cargo </label>
    <input type="text" class="form-control" name="Cargo" value="{{isset($inversionista->Cargo)?$inversionista->Cargo:old('Cargo')}}" id="Cargo">  
</div>
<div class="form-group">
    <label for="Imagen"> Imagen *</label>
    @if(isset($emprendimiento->Imagen))
    <br>
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$inversionista->Imagen}}" width="100" alt="">
    @endif
    <input type="file" class="form-control" name="Imagen" value="" id="Imagen">
</div>
<div class="form-group">
<label for="Descripcion"> Descripcion *</label>
    <input type="text" class="form-control" name="Descripcion" value="{{isset($inversionista->Descripcion)?$inversionista->Descripcion:old('Descripcion')}}" id="Descripcion">  
</div>
<div class="form-group">
<label for="Correo"> Correo *</label>
    <input type="text" class="form-control" name="Correo" value="{{isset($inversionista->Correo)?$inversionista->Correo:old('Correo')}}" id="Correo">  
</div>
<input type="submit"class="btn btn-success" value="{{$modo}}">

<a href="{{ url('inversionista')}}" class="btn btn-primary" >Regresar</a>