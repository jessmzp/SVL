@extends('layout.general')

@section('contenido')

<div class="container text-center">
    <div class="page-header"> 
        <h1><i class="fa fa-shopping-cart"></i> Carrito de compras</h1>
    </div>
<div class"table-carrito>
@if(count($carrito))
<p>
    <a href="{{route('carrito-vaciar')}}" class="btn btn-danger">
    Vaciar carrito  <i class="fa fa-trash"></i>
    </a>

</p>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead>
             <tr>
                <th>Imagen</th>
                <th>Articulo</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Quitar</th>
             </tr>    
            </thead>
                <tbody>
                    @foreach($carrito as $art)
                    @include('tienda.modal')
                    <tr>
                    <td><img src="{{asset('imagenes/articulos/'.$art->imagenarticulo)}}" alt="{{$art->nomarticulo}}" height="100px" width="100px" width="100px" class="img-thumbnail"></td>
                    <td>{{$art->nomarticulo}}</td>
                    <td>${{number_format($art->precioarticulo,2)}}</td>
                    <td>
                        <input
                            type="number"
                            min="1"
                            max="100"
                            value="{{$art->cantidad}}"
                            id="articulo_{{$art->idarticulo}}"
                         >
                         <a
                            href="#"
                            class="btn btn-warning btn-update-item"
                            data-href="{{route('carrito-actualizar',[$art,$art->cantidad])}}"
                            data-id="{{$art->idarticulo}}"
                            data-articulo = "{{$art}}"
                            data-precio="{{$art->precioarticulo}}"
                             >
                            <i class="fas fa-sync"></i>
                         </a>
                    </td>
                    <td id="totpagar{{$art->idarticulo}}">${{number_format($art->precioarticulo * $art->cantidad,2)}}</td>
                    <td>
                   <!-- <a href="{{route('carrito-eliminar',$art->detallearticulo)}}"> 
                    <span class=btn btn-danger">
                        <i class="fas fa-trash-alt"></i></span> -->

                        <a href="{{URL::action('CarritoController@delete',$art->detallearticulo)}}" data-target="#modal-delete-{{$art->detallearticulo}} data-toggle="modal">
                <span class="btn btn-danger">
                <i class="fas fa-trash-alt"></i></span>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
        </table><hr>
        <h3>
            <span class="label label-success"> 
           Total: $ <label id="totalPagarFinal"></label>
<input type="hidden" id="TotJes" value="{{$total}}"/>
            </span>
        </h3>


    </div>
    @else
    <h3><Span><Label><Label-warning> No hay articulos en el carrito.</Label-warning></Label></Span></h3>
    @endif
    <hr>
    <p>
        <a href="{{route('articulos.index')}}" class="btn btn-primary">Continuar comprando</a>
        <a href="{{route('detalle-orden')}}" class="btn btn-warning">Proceder a pagar</a>
    </p>
</div>
</div>

@endsection


