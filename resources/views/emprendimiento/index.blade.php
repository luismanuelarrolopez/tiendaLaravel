@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
   
    {{ Session::get('mensaje')}}
    
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button_>
</div>
@endif
<a href="{{ url('emprendimiento/create')}}" class="btn btn-success">Registrar Emprendimiento</a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Abreviatura</th>
            <th>imagen</th>
            <th>Ubicacion</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($emprendimientos as $emprendimiento)
        <tr>
            <td>{{ $emprendimiento->id}}</td>
            <td>{{ $emprendimiento->Nombre}}</td>
            <td>{{ $emprendimiento->Abreviatura}}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$emprendimiento->Imagen}}" width="100" alt="">
            </td>
            <td>{{ $emprendimiento->Ubicacion}}</td>
            <td>{{ $emprendimiento->Telefono}}</td>
            <td><a href="{{ url('/emprendimiento/'.$emprendimiento->id.'/edit')}}" class="btn btn-warning">Editar</a>
            <form action="{{ url('/emprendimiento/'.$emprendimiento->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                <input class="btn btn-danger"type= "submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $emprendimientos->links() !!}
</div>
@endsection