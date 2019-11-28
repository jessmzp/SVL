@extends('layout.general')
@section('contenido')
<?php//Diseño de nuesra vista para mostrar el listado de los departamentos
//Utilizando la rejilla de Boostraps.?>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Listado de Departamentos <a href="departamento/create"><button class= "btn btn-success">Nuevo</button></a> </h3>
    @include('tienda.departamento.search')
    </div>
</div>
<div class="row">
<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="table-responsive">
    <table class="table table-striped table-bordered table-condensed table-hover">
       <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Opciones</th>
        </thead>

        @foreach($departamentos as $dep)
        @include('tienda.departamento.modal')
        <tr>
            <td>{{$dep->iddepto}}</td>
            <td>{{$dep->nomdepto}}</td>
            <td>{{$dep->descridepto}}</td>
            <td>

            <a href="{{URL::action('DepartamentoController@edit',$dep->iddepto)}}">
                <span class="btn btn-info">
                <i class="fas fa-edit"></i></span>
                
               <!--<button class="btn btn-info">Editar</button></a>-->
                <a href="#" data-target="#modal-delete-{{$dep->iddepto}}" data-toggle="modal">
                <span class="btn btn-danger">
                <i class="fas fa-trash-alt"></i></span> 
            </td>
        </tr>
        @endforeach
    </table>
</div>
{{$departamentos->render()}}
</div>

</div>
@endsection