@extends('master')

@section('contenido')

<form action="{{url('/guardarEmpleado')}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label for="nombre">Nombre:</label>
		<input type="text" class="form-control" name="nombre" required>
	</div>
	<div class="form-group">
		<label for="puesto">Puesto:</label>
		<select name="puesto" class="form-control">
			<option value="Cajero" selected="">Cajero</option>
			<option value="Gerente">Gerente</option>
			<option value="Administrador">Administrador</option>
			<option value="Jefe">Jefe</option>
		</select>
	</div>
	<div class="form-group">
		<label for="usuario">Usuario:</label>
		<input type="text" class="form-control" name="usuario" required>
	</div>
	<div class="form-group">
		<label for="clave">Contraseña:</label>
		<input type="text" class="form-control" name="clave" required>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">Registrar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>
</form>


@stop