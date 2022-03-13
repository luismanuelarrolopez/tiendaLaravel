@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" action="{{url('/inversionista/'.$inversionista->id)}}" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    @include('inversionista.form',['modo'=>'Editar'])
</form>
</div>
@endsection