@extends('layout.admin')
@section('contenido')
<?php//Diseño de nuesra vista para mostrar el listado de los departamentos
//Utilizando la rejilla de Boostraps.?>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Listado de Articulos <a href="articulo/create"><button class= "btn btn-success">Nuevo</button></a> </h3>
    @include('tienda.articulo.search')
    </div>
</div>
<div class="row">
<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="table-responsive">
    <table class="table table-striped table-bordered table-condensed table-hover">
       <thead>
        <th>Id</th>
        <th>Departamento</th>
        <th>Categoria</th>
        <th>Subcategoria</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Imagen</th>
        <th>Detalle</th>
        <th>Estado</th>
        <th>Opciones</th>
        </thead>

        @foreach($articulos as $art)
        @include('tienda.articulo.modal')
        <tr>
            <td>{{$art->idarticulo}}</td>
            <td>{{$art->departamento}}</td>
            <td>{{$art->categoria}}</td>
            <td>{{$art->subcategoria}}</td>
            <td>{{$art->nomarticulo}}</td>
            <td>{{$art->descriparticulo}}</td>
            <td>{{$art->precioarticulo}}</td>
            <td>{{$art->stockarticulo}}</td>
            <td>
            <img src="{{asset('imagenes/articulos/'.$art->imagen)}}" alt="{{$art->nomarticulo}}" height="100px" width="100px" width="100px" class="img-thumbnail">
            </td>
            <td>{{$art->detallearticulo}}</td>
            <td>{{$art->estado}}</td>
            <td>

                <a href="{{URL::action('ArticuloController@edit',$art->idarticulo)}}"><button class="btn btn-info">Editar</button></a>
                <a href="#" data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
{{$articulos->render()}}
</div>

</div>
@endsection