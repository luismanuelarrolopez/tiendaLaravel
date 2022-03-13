@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" action="{{ url('/emprendimiento')}}" enctype="multipart/form-data">
@csrf
@include('emprendimiento.form',['modo'=>'Registrar'])
</form>
</div>
@endsection