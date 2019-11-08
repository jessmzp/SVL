@extends('layout.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar subcategoria: {{$subcategoria->nombre}}</h3>
            @if(count($errors)>0)
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            </div>
            @endif
            {!! Form::model($subcategoria,['method'=>'PATCH','route'=>['subcategoria.update',$subcategoria->idsubcategoria]])!!}
            {{Form::token()}}

            <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Categoria</label>
				<select name="idcategoria" class="form-control">
				@foreach($categorias as $cat)
				@if($cat->idcategoria==$subcategoria->idcategoria)
				<option value="{{$cat->idcategoria}}"selected>{{$cat->nomcategoria}}</option>
				@else
				<option value="{{$cat->idcategoria}}"selected>{{$cat->nomcategoria}}</option>
				@endif
				@endforeach
				</select> 
            </div>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{$subcategoria->nombre}}" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="nombre">Descripción</label>
                <input type="text" name="descripcion" class="form-control" value="{{$subcategoria->descripcion}}" placeholder="Descripción">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

        {!!Form::close()!!}   
 </div> 
</div>
@endsection

