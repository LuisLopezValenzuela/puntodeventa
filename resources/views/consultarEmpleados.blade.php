@extends('master')

@section('contenido')
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Puesto</th>
			<th>Usuario</th>
			<th>
				Opciones
			</th>
		</tr>
		@foreach($empleados as $e)
			<tr>
				<td>{{$e->id}}</td>
				<td>{{$e->name}}</td>
				<td>{{$e->puesto}}</td>
				<td>{{$e->email}}</td>
				<td>
					<a href="#" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="#" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
					</a>
				</td>
			</tr>
		@endforeach
	</thead>
</table>
<div class="text-center">
	{{ $empleados->links() }}
</div>


@stop