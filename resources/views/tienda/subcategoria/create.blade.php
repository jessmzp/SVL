@extends('layout.general')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nueva subcategoria</h3>
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
            {!! Form::open(array('url'=>'tienda/subcategoria','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
			 <div class="row">
			 <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Categoria</label>
				<select name="idcategoria" class="form-control">
				@foreach($categorias as $cat)
				<option value="{{$cat->idcategoria}}">{{$cat->nomcategoria}}</option>
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
                <a href="/tienda/subcategoria">
                    <button class="btn btn-danger" type="button">Cancelar</button>
                </a>
          
            </div>
			</div>
			</div>

        {!!Form::close()!!}   

@endsection

