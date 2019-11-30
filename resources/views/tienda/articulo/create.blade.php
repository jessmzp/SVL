@extends('layout.general')
@section('contenido')

<script src="{{ asset('js/crearArticulo.js') }}"></script>

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
				<select name="iddepto" class="form-control" id="campo1"  onchange="habilitar2(this.value);">
                    <option value="0" selected>Elija una opcion</option>
				    @foreach($departamentos as $dep)
				        <option value="{{$dep->iddepto}}">{{$dep->nomdepto}}</option>
				    @endforeach
				</select>
               
            </div>
            </div>
			<div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Categoria</label>
                <select name="idcategoria" class="form-control" id="campo2" name="campo2" disabled=true onchange="habilitar3(this.value);">
                    <option value="0" selected>Elija una opcion</option>
                    @foreach($categorias as $cat)
				        <option value="{{$cat->idcategoria}}">{{$cat->nomcategoria}}</option>
				    @endforeach
                </select>
            </div>
            </div>
			<div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Subcategoria</label>
				<select name="idsubcategoria" class="form-control" id="campo3" name="campo3" disabled="true">
                    <option value="0" selected>Elija una opcion</option>
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
                <a href="/tienda/articulo">
                    <button class="btn btn-danger" type="button">Cancelar</button>
                </a>
            </div>
			</div>

        {!!Form::close()!!}   
@endsection

