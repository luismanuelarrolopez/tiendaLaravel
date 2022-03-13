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
<a href="{{ url('inversionista/create')}}" class="btn btn-success">Registrar Inversionista</a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>imagen</th>
            <th>Descripcion</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inversionistas as $inversionista)
        <tr>
            <td>{{ $inversionista->id}}</td>
            <td>{{ $inversionista->Nombre}}</td>
            <td>{{ $inversionista->Cargo}}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$inversionista->Imagen}}" width="100" alt="">
            </td>
            <td>{{ $inversionista->Descripcion}}</td>
            <td>{{ $inversionista->Correo}}</td>
            <td><a href="{{ url('/inversionista/'.$inversionista->id.'/edit')}}" class="btn btn-warning">Editar</a>
            <form action="{{ url('/inversionista/'.$inversionista->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                <input class="btn btn-danger"type= "submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $inversionistas->links() !!}
</div>
@endsection