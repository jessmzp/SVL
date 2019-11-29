@extends('layout.general')

@section('contenido')

<div class="container text-center">
    <div class="page-header">
        <h1><i class="fa fa-shopping-cart"></i>Detalle de su compra</h1>
    </div>
        <div class="page">
            <div class="table-responsive">
                <h3>Datos del cliente</h3>
                    <table class="table table-striped table-hover table-bordered">
                    <tr><td>Nombre:</td>{{Auth::user()->name}}</tr>
                    <tr><td>Usuario:</td>{{Auth::user()->user}}</tr>
                    <tr><td>Correo:</td>{{Auth::user()->email}}</tr>
                    </table>
            </div>
            <div class="table-responsive">
                <h3>Datos de la compra</h3>
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <th>Articulo:</th>
                        <th>Precio:</th>
                        <th>Cantidad:</th>
                        <th>Total:</th>
                    </tr>
                    @foreach($carrito as $art)
                    <tr>
                        <td>{{$art->nomarticulo}}</td>
                        <td>${{number_format($art->precioarticulo,2)}}</td>
                        <td>{{$art->cantidad}}</td>
                        <td>${{number_format($art->precioarticulo*$art->cantidad,2)}}</td>
                    </tr>
                    @endforeach
                    </table><hr>
                    <h3>
                        <span class="label label-success">
                        Total:${{number_format($total,2)}}
                        </span>
                    </h3><hr>
                    <p>
                        <a href="{{route('carrito-mostrar')}}" class="btn btn-primary">
                         Regresar
                        </a>
                        <a href="{{route('payment')}}" class="btn btn-warning">
                            Pagar con PAYPAL <i class="fab fa-paypal"></i>
                        </a>
                    </p>
            </div>
        </div>
</div>

@endsection