@extends('layout.general')
@section('contenido')
<?php//Diseño de nuesra vista para mostrar el listado de los departamentos
//Utilizando la rejilla de Boostraps.?>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Listado de Departamentos </h3>
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
        <th>Ver</th>
        </thead>

        @foreach($departamentos as $dep)
        @include('tienda.departamento.modal')
        <tr>
            <td>{{$dep->iddepto}}</td>
            <td>{{$dep->nomdepto}}</td>
            <td>{{$dep->descridepto}}</td>
            <td><a href="{{URL::action('DepartamentoCategoria@show',$dep->iddepto)}}" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a></td>
        </tr>
        @endforeach
    </table>
</div>
{{$departamentos->render()}}
</div>

</div>
@endsection