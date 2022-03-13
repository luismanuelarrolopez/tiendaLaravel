@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" action="{{ url('/evento')}}" enctype="multipart/form-data">
@csrf
@include('evento.form',['modo'=>'Registrar'])
</form>
</div>
@endsection