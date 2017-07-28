@extends('master')

@section('contenido')

<div class="jumbotron" align="center">
	<img src="https://www.freelogoservices.com/api/main/images/1j+ojl1FOMkX9WypfBe43D6kjfaArx5GmhbJwXs1M3EMoAJtlSAtj...tj...PU7" width="200px"> <br>
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
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td  class="text-right">Total:</td>
						<td>{{$total->total}}</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td  class="text-right">Pago:</td>
						<td>{{$pago}}</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td  class="text-right">Cambio:</td>
						<td>{{$cambio}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>





</div>







@stop