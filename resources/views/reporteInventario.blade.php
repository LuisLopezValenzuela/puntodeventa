@extends('master')

@section('contenido')
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
				<div class="input-group">
					<input type="number" class="form-control" name="agregar" required>
					<span class="input-group-btn">
	      				<button class="btn btn-default" type="button">Button</button>
	    			</span>
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