@extends('master')

@section('contenido')
<div class="col-lg-8 col-md-7 col-sm-6">
	<h1>Reporte de Inventario</h1>
	<br>
</div>

<div class="form-inline" >
	 <div class="form-group">
	 	<label class="control-label" for="fechaini">Fecha inicial </label>
        <input class="form-control" type="text" class="form-control" name = "fechaini" placeholder="AAAA/MM/DD" >
        <label class="control-label" for="fechafin">Fecha final</label>
        <input class="form-control" type="text" class="form-control" name = "fechafin" placeholder="AAAA/MM/DD">
    </div>
        <button type="submit" class="btn btn-default">Search</button>      
        <button href="{{url('/pdfInventario')}}" class="btn btn-primary">PDF</button> 
       	
</div>
<br> 
<table class="table table-striped">
	<thead>
		<tr>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Cantidad</th>
			<th>Agregar</th>
			<th>Precio</th>
			<th>Categorias</th>
			<th>Proveedor</th>		
			<th>Fecha de registro</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($productos_proveedor as $a)
		<tr>
			<td>{{$a->codigo}}</td>
			<td>{{$a->nombre}}</td>
			<td>{{$a->stock}}</td>
			<td>
				<div class="form-inline " action="{{url('/agregaStock')}}" method="POST">
					<div class="form-group ">
					    <input type="numeric" class="form-control" name="sumStock">
					</div>
					<button class="btn btn-success" type="submit">
					    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					 </button>
				</div>
			</td>
			<td>{{$a->precio}}</td>
			<td>{{$a->nom_categoria}}</td>
			<td>{{$a->nom_proveedor}}</td>
			<td>{{$a->fecha}}</td>
			<td>
					<a href="{{url('/editarProductos')}}/{{$a->id}}" class="btn  btn-primary btn-xs">
						 <span class="glyphicon  glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('/eliminarProductos')}}/{{$a->id}}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<div class="text-center">
	{{$productos_proveedor->links()}}
</div>

<hr>
@stop