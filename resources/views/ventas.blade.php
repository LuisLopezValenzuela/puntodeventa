@extends('master')

@section('contenido')
	<h2>Caja</h2>
	<hr>
	<form action="" method="post">
	<input id="token" type="hidden" name"_token" value="{{ csrf_token() }}">
	<div class="form-group">
			<label for="productos">Escriba el Codigo del Producto</label>
			<input type="text" name="codigo" class="form-control">
	</div>
	<button class="btn btn-primary">Añadir</button>
	</form>
	<h3>Lista de Productos</h3>
	<hr>
	<div class="row">
		<div class="col-xs-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Producto:</th>
						<th>Precio Original:</th>
						<th>Descuento:</th>
						<th>Precio Final</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>





@stop