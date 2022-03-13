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
<a href="{{ url('evento/create')}}" class="btn btn-success">Registrar Evento</a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>imagen</th>
            <th>Descripcion</th>
            <th>Ubicacion</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($eventos as $evento)
        <tr>
            <td>{{ $evento->id}}</td>
            <td>{{ $evento->Nombre}}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$evento->Imagen}}" width="100" alt="">
            </td>
            <td>{{ $evento->Descripcion}}</td>
            <td>{{ $evento->Ubicacion}}</td>
            <td>{{ $evento->Fecha}}</td>
            <td><a href="{{ url('/evento/'.$evento->id.'/edit')}}" class="btn btn-warning">Editar</a>
            <form action="{{ url('/evento/'.$evento->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                <input class="btn btn-danger"type= "submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $eventos->links() !!}
</div>
@endsection