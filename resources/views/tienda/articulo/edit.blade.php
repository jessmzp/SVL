@extends('layout.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Articulo: {{$articulo->nombre}}</h3>
            @if(count($errors)>0)
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            </div>
            @endif
			</div>
			</div>
            {!! Form::model($articulo,['method'=>'PATCH','route'=>['tienda.articulo.update',$articulo->idarticulo],'files'=>'true'])!!}
            {{Form::token()}}
            div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required value="{{$articulo->nombre}}" class="form-control">

            </div>
			</div>
	
            <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Departamento</label>
				<select name="iddepto" class="form-control">
				@foreach($departamentos as $dep)
				@if($dep->iddepto==$articulo->iddepto)
				<option value="{{$dep->iddepto}}"selected>{{$dep->nomdepto}}</option>
				@else
				<option value="{{dep->iddepto}}"selected>{{$dep->nomdepto}}</option>
				@endif
				@endforeach
				</select>
               
            </div>
            </div>
			<div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Categoria</label>
				<select name="idcategoria" class="form-control">
				@foreach($categorias as $cat)
				<option value="{{$cat->idcategoria}}">{{$cat->nomcategoria}}</option>
				@endforeach
				</select>
               
            </div>
            </div>
			<div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Subcategoria</label>
				<select name="idsubcategoria" class="form-control">
				@foreach($subcategorias as $scat)
				<option value="{{$scat->idsubcategoria}}">{{$scat->nomsubcategoria}}</option>
				@endforeach
				</select>
               
            </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Descripción</label>
               <input type="text" name="descripcion" required value="{{$articulo->descripcion}}" class="form-control">
            </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
             <div class="form-group">
                <label for="precio">Precio</label>
               <input type="text" name="precio" required value="{{$articulo->precio}}" class="form-control">
            </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
             <div class="form-group">
                <label for="stock">Stock</label>
               <input type="number" min="1" max="999" name="stock" required value="{{$articulo->stock}}" class="form-control">
            </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
             <div class="form-group">
                <label for="detalle">Detalle</label>
               <input type="text" name="detalle" required value="{{$articulo->detalle}}" class="form-control">
            </div>
            </div>
			<div class="col-lg-6 col-sm-6 col-xs-12">
             <div class="form-group">
                <label for="nombre">Estado</label>
               <input type="text" name="estado"required value="{{$articulo->estado}}" class="form-control">
            </div>
            </div>
			<div class="col-lg-6 col-sm-6 col-xs-12">
             <div class="form-group">
                <label for="imagen">Imagen</label>
               <input type="file" name="imagen"  class="form-control">
			   @if ($$articulo->imagen)!=""
			   <img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}">
			   @endif
            </div>
            </div>	
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
			</div>
			

        {!!Form::close()!!}   
 </div> 
</div>
@endsection

