
@extends('layout.general')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Productos</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($articulos as $art)
                        <div class="item-col-xs-4 col-lg-4">
                            <h3 style="font-size: 20px">{{$art->nomarticulo}}</h3>
                            <img src="{{asset('imagenes/articulos/'.$art->imagenarticulo)}}" alt="{{$art->nomarticulo}}" height="200" width="200">
                            <p style="font-size: 16px">{{$art->descriparticulo}}</p>
                            <p style="font-size: 16px">Precio: ${{number_format($art->precioarticulo,2)}}</p>
                            <p> 
                            <a class="btn btn-success" href="{{route('carrito-añadir',$art->detallearticulo)}}">
                            <i class="fa fa-cart-plus"></i> Añadir
                            </a>
                            <a  href="{{route('articulo-detalle',$art->detallearticulo)}}" class="btn btn-info">Leer más</a>
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- <div class="articulos">
    @foreach($articulos as $art)
        <div class="articulo">
            <h3>{{$art->nomarticulo}}</h3>
            <img src="{{asset('imagenes/articulos/'.$art->imagenarticulo)}}" alt="{{$art->nomarticulo}}" height="200px" width="200px" width="100px" class="img-thumbnail">
            <div class="articulo-info">
                <p>{{$art->descriparticulo}}</p>
                <p>Precio: ${{number_format($art->precioarticulo,2)}}</p>
                <p> 
                <a class="btn btn-success" href="{{route('carrito-añadir',$art->detallearticulo)}}">
                <i class="fa fa-cart-plus"></i> Añadir
                </a>
                <a  href="{{route('articulo-detalle',$art->detallearticulo)}}">Leer más</a>
                </p>
            </div>
        </div>
    @endforeach
</div> -->


<!--<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Productos</div>

                    <div class="panel-body">

                        <div class="row">
                             @foreach($articulos as $art)
                                <div class="item col-xs-4 col-lg-4">
                                    <div class="thumbnail">
                                        <img class="group list-group-image" src="{{asset('imagenes/articulos/'.$art->imagenarticulo)}}" height= "200" width="200" alt="{{$art->nomarticulo}}"/>
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
</div> -->
@endsection