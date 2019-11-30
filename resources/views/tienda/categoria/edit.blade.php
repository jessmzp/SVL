@extends('layout.general')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar categoria: {{$categoria->nomcategoria}}</h3>
            @if(count($errors)>0)
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            </div>
            @endif
            {!! Form::model($categoria,['method'=>'PATCH','route'=>['categoria.update',$categoria->idcategoria]])!!}
            {{Form::token()}}

            <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Departamento</label>
				<select name="iddepto" class="form-control">
				@foreach($departamentos as $dep)
				@if($dep->iddepto==$categoria->iddepto)
				<option value="{{$dep->iddepto}}"selected>{{$dep->nomdepto}}</option>
				@else
				<option value="{{$dep->iddepto}}"selected>{{$dep->nomdepto}}</option>
				@endif
				@endforeach
				</select> 
            </div>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{$categoria->nomcategoria}}">
            </div>
            <div class="form-group">
                <label for="nombre">Descripción</label>
                <input type="text" name="descripcion" class="form-control" value="{{$categoria->descricategoria}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="/tienda/categoria">
                    <button class="btn btn-danger" type="button">Cancelar</button>
                </a>
            </div>

        {!!Form::close()!!}   
 </div> 
</div>
@endsection

