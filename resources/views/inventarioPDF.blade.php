<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Reporte de Alumnos por Grupos</title>
	<style>
		.encabezado {
			color: white;
			background-color: black;
		}
		.border {
			border: 1px solid;
		}
	</style>
</head>
<body>

<table>
	<tr>
		<td colspan=""><img src="http://www.itculiacan.edu.mx/itcradio/imagenes/logo.png" width="200px"></td>
		<td align="center"><h2 style="color: DarkMagenta">Lista de productos</h2></td>
	</tr>
</table>

<br>
<table class="table table-striped">
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
