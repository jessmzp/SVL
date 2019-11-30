@extends('layout.general')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nueva categoria</h3>
            @if(count($errors)>0)
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            </div>
		</div>
</div>
            @endif
            {!! Form::open(array('url'=>'tienda/categoria','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
			 <div class="row">
			 <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Departamento</label>
				<select name="iddepto" class="form-control">
				@foreach($departamentos as $dep)
				<option value="{{$dep->iddepto}}">{{$dep->nomdepto}}</option>
				@endforeach
				</select> 
            </div>
            
            
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
            </div>
           
          
            <div class="form-group">
                <label for="nombre">Descripción</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Descripción">
            </div>
           
           
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="/tienda/categoria">
                    <button class="btn btn-danger" type="button">Cancelar</button>    
                </a>
            </div>
			</div>
			</div>

        {!!Form::close()!!}   

@endsection

