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
						<td>{{$l->cantidad}}</td>
						<td>
					@if($l->descuento==0)
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
<div class="text-right">
	<form method="post" action="{{url('Finalizar')}}/{{$ventas->id}}">
	<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="radio" name="tipodepago" value="Efectivo">Efectivo
  		<input type="radio" name="tipodepago" value="Tarjeta">Tarjeta<br><br>
		<button type="Submit" class="btn btn-info">Finalizar Venta</button>
	</form>
</div>

@stop