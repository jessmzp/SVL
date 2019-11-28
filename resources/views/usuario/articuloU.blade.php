@extends('layout.user')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Productos</div>

                    <div class="panel-body">

                        <div class="row">
                             @foreach($articulos as $art)
                                <div class="item col-xs-4 col-lg-4">
                                    <div class="thumbnail">
                                        <img class="group list-group-image" src="{{asset('imagenes/articulos/'.$art->imagenarticulo)}}" alt="{{$art->nomarticulo}}"/>
                                        <div class="caption">
                                            <h4 class="group inner list-group-item-heading">
                                            {{$art->nomarticulo}}</h4>
                                            <p class="group inner list-group-item-text">
                                            {{$art->stockarticulo}}</p>
                                            <div class="row">
                                                <div class="col-xs-12 col-md-6">
                                                    <p class="lead">
                                                    ${{$art->precioarticulo}}</p>
                                                </div>
                                                <div class="col-xs-12 col-md-6">
                                                    <a class="btn btn-success" href="#">Añadir</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection