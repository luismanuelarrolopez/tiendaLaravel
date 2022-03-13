@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" action="{{url('/evento/'.$evento->id)}}" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    @include('evento.form',['modo'=>'Editar'])
</form>
</div>
@endsection