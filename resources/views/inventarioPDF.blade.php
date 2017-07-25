<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Reporte de Inventario</title>
	<style>
		.encabezado {
			color: white;
			background-color: black;
		}
		.border {
			border: 1px solid;
		}
		body{
			font-family: "HelveticaNeueLight", "HelveticaNeue-Light", "Helvetica Neue Light", "HelveticaNeue", "Helvetica Neue", 'TeXGyreHerosRegular', "Helvetica", "Tahoma", "Geneva", "Arial", 
			sans-serif; 
			font-weight:100; 
			font-stretch:normal;
		}
		table{
			border-collapse:separate;
			border-spacing: 10px;
		}
	</style>
</head>
<body>

<div>	
		<img src="https://www.freelogoservices.com/api/main/images/1j+ojl1FOMkX9WypfBe43D6kjfaArx5GmhbJwXs1M3EMoAJtlSAtj...tj...PU7" width="200px"> <br>	
		<h2 align="center" style="color: red">Reporte de inventario</h2>
	
</div>

<br>
<table align="center" class="table table-striped">
	<thead>
		<tr>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Cantidad</th>
			<th>Precio</th>
			<th>Categorias</th>
			<th>Proveedor</th>		
			<th>Fecha de registro</th>
		</tr>
	</thead>
	<tbody>
		@foreach($productos_proveedor as $a)
		<tr>
			<td>{{$a->codigo}}</td>
			<td>{{$a->nombre}}</td>
			<td>{{$a->stock}}</td>
			<td>{{$a->precio}}</td>
			<td>{{$a->nom_categoria}}</td>
			<td>{{$a->nom_proveedor}}</td>
			<td>{{$a->fecha}}</td>
			
		</tr>
		@endforeach
	</tbody>
</table>
