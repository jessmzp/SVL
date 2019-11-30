@extends('layout.general')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Departamento: {{$departamento->nomdepto}}</h3>
            @if(count($errors)>0)
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            </div>
            @endif
            {!! Form::model($departamento,['method'=>'PATCH','route'=>['departamento.update',$departamento->iddepto]])!!}
            {{Form::token()}}
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{$departamento->nomdepto}}">
            </div>
            <div class="form-group">
                <label for="nombre">Descripción</label>
                <input type="text" name="descripcion" class="form-control" value="{{$departamento->descridepto}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="/tienda/departamento">
                    <button class="btn btn-danger" type="button">Cancelar</button>
                </a>
            </div>

        {!!Form::close()!!}   
 </div> 
</div>
@endsection

