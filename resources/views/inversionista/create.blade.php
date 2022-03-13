@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" action="{{ url('/inversionista')}}" enctype="multipart/form-data">
@csrf
@include('inversionista.form',['modo'=>'Registrar'])
</form>
</div>
@endsection