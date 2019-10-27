@extends('layout.admin')
@section('contenido')
<?php//Diseño de nuesra vista para mostrar el listado de los subcategorias
//Utilizando la rejilla de Boostraps.?>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Listado de Subcategorias <a href="subcategoria/create"><button class= "btn btn-success">Nuevo</button></a> </h3>
    @include('tienda.subcategoria.search')
    </div>
</div>
<div class="row">
<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="table-responsive">
    <table class="table table-striped table-bordered table-condensed table-hover">
       <thead>
        <th>Id</th>
        <th>Categoria</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Opciones</th>
        </thead>

        @foreach($subcategorias as $scat)
        @include('tienda.subcategoria.modal')
        <tr>
            <td>{{$scat->idsubcategoria}}</td>
            <td>{{$scat->categoria}}</td>
            <td>{{$scat->nomcategoria}}</td>
            <td>{{$scat->descricategoria}}</td>
            <td>

                <a href="{{URL::action('subcategoriaController@edit',$dep->iddepto)}}"><button class="btn btn-info">Editar</button></a>
                <a href="#" data-target="#modal-delete-{{$dep->iddepto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
{{$subcategorias->render()}}
</div>

</div>
@endsection