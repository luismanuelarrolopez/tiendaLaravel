@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" action="{{url('/emprendimiento/'.$emprendimiento->id)}}" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    @include('emprendimiento.form',['modo'=>'Editar'])
</form>
</div>
@endsection