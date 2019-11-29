@extends('layout.general')
@section('contenido')
<?php//Diseño de nuesra vista para mostrar el listado de los categorias
//Utilizando la rejilla de Boostraps.?>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Listado de categorias</h3>
    {{-- @if ($isGeneral)
        @include('tienda.categoria.search')
    @endif --}}
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
        <th>Ver</th>
        </thead>

        @foreach($categorias as $cat)
        @include('tienda.categoria.modal')
        <tr>
            <td>{{$cat->idcategoria}}</td>
            <td>{{$cat->nomcategoria}}</td>
            <td>{{$cat->descricategoria}}</td>
            
            <td><a href="{{URL::action('CategoriaSubCategoria@show',$cat->idcategoria)}}" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a></td>
        </tr>
        @endforeach
    </table>
</div>
{{-- @if ($isGeneral)
    {{$categorias->render()}}
@endif --}}
</div>

</div>
@endsection