@extends('layout.general')
@section('contenido')
<?php//Diseño de nuesra vista para mostrar el listado de los subcategorias
//Utilizando la rejilla de Boostraps.?>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Listado de Subcategorias</h3>
    {{-- @include('tienda.subcategoria.search') --}}
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

        @foreach($subcategorias as $scat)
        @include('tienda.subcategoria.modal')
        <tr>
            <td>{{$scat->idsubcategoria}}</td>
            <td>{{$scat->nomsubcategoria}}</td>
            <td>{{$scat->descrisubcategoria}}</td>
            <td><a href="{{URL::action('SubCategoriaArticulo@show',$scat->idsubcategoria)}}" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a></td>
        </tr>
        @endforeach
    </table>
</div>
{{-- {{$subcategorias->render()}} --}}
</div>

</div>
@endsection