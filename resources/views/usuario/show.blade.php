@extends('layout.general')

@section('contenido')

<h1>Detalle del Articulo</h1>

<div class="articulo-block">
<img src="{{asset('imagenes/articulos/'.$articulo->imagenarticulo)}}" alt="{{$articulo->nomarticulo}}" height="300px" width="300px" class="img-thumbnail">
</div>

<div class="articulo-block">
<h3>{{$articulo->nomarticulo}}</h3><hr>
<div class="articulo-info">
<p>{{$articulo->descriparticulo}}</p>
<p>Precio: ${{number_format($articulo->precioarticulo,2)}}</p>
<p> 
<a class="btn btn-success" href="{{route('carrito-añadir',$articulo->detallearticulo)}}">
 <i class="fa fa-cart-plus fa-1x"></i> Añadir
</a>
</p>
</div>

</div>
<p><a href="{{route('articulos.index')}}">Regresar</a></p>

@endsection