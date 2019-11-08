@extends('layout.admin')
@section('contenido')
<?php//Diseño de nuesra vista para mostrar el listado de los categorias
//Utilizando la rejilla de Boostraps.?>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Listado de categorias <a href="categoria/create"><button class= "btn btn-success">Nuevo</button></a></h3>
    @include('tienda.categoria.search')
    </div>
</div>
<div class="row">
<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="table-responsive">
    <table class="table table-striped table-bordered table-condensed table-hover">
       <thead>
        <th>Id</th>
        <th>Departamento</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Opciones</th>
        </thead>

        @foreach($categorias as $cat)
        @include('tienda.categoria.modal')
        <tr>
            <td>{{$cat->idcategoria}}</td>
            <td>{{$cat->departamento}}</td>
            <td>{{$cat->nomcategoria}}</td>
            <td>{{$cat->descricategoria}}</td>
            <td>

                <a href="{{URL::action('CategoriaController@edit',$cat->idcategoria)}}">
                <span class="btn btn-info">
                <i class="fas fa-edit"></i></span>
                
               <!--<button class="btn btn-info">Editar</button></a>-->
                <a href="#" data-target="#modal-delete-{{$cat->idcategoria}}" data-toggle="modal">
                <span class="btn btn-danger">
                <i class="fas fa-trash-alt"></i></span> 
                <!--<button class="btn btn-danger">Eliminar</button></a>-->
            </td>
        </tr>
        @endforeach
    </table>
</div>
{{$categorias->render()}}
</div>

</div>
@endsection