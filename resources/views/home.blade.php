@extends('layout.general')

@section('contenido')

{!!Form::open()!!}

<div class="media">
    <img src="{{ asset('imagenes/home.gif') }}" width="100%">
</div>

{!!Form::close()!!}

@endsection
