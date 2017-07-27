@extends('ventas')

@Section('caja')

  	<h3>Productos</h3>
	<hr>
	<div class="row">
		<div class="col-xs-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Producto:</th>
						<th>Precio:</th>
						<th>Cantidad:</th>
						<th>Descuento:</th>
						<th>Total:</th>
					</tr>
				</thead>
				<tbody>
					@foreach($lista as $l)
					<tr>
						<td>{{$l->nombre}}</td>
						<td>{{$l->precio}}</td>
						<td>Aun falta esto</td>
						<td>
					@if($l->descuento==1)
					<span class="label label-default">No descuento</span>
					@else
					{{$l->descuento*100}}%
					@endif</td>
						<td>{{$l->total}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@stop