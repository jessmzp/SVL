@extends('layout.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nuevo articulo</h3>
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
            {!! Form::open(array('url'=>'tienda/articulo','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}

          <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre">

            </div>
			</div>
	
            <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Departamento</label>
				<select name="iddepto" class="form-control">
				@foreach($departamentos as $dep)
				<option value="{{$dep->iddepto}}">{{$dep->nomdepto}}</option>
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
               <input type="text" name="descripcion"  class="form-control" placeholder="Descripcion del articulo">
            </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
             <div class="form-group">
                <label for="precio">Precio</label>
               <input type="text" name="precio"  class="form-control" placeholder="Precio del articulo">
            </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
             <div class="form-group">
                <label for="stock">Stock</label>
               <input type="number" min="1" max="999" name="stock"  class="form-control" placeholder="Stock del articulo">
            </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
             <div class="form-group">
                <label for="detalle">Detalle</label>
               <input type="text" name="detalle"  class="form-control" placeholder="Detalle del articulo">
            </div>
            </div>
			<div class="col-lg-6 col-sm-6 col-xs-12">
             <div class="form-group">
                <label for="nombre">Estado</label>
               <input type="text" name="estado" class="form-control" placeholder="Estado del articulo">
            </div>
            </div>
			<div class="col-lg-6 col-sm-6 col-xs-12">
             <div class="form-group">
                <label for="imagen">Imagen</label>
               <input type="file" name="imagen"  class="form-control">
            </div>
            </div>	
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
			</div>
        {!!Form::close()!!}   
@endsection

