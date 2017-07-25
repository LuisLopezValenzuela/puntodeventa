@extends('master')

@section('contenido')

<h2>Abrir Venta</h2>
<hr>


<div class="col-xs-5">
<form method='post' action="{{url('/venta')}}">
	<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
	<label for="idempleado">ID Empleado:</label>
	<input type="text" class="form-control" name="empleado_id">
	<label for="folio">Folio:</label>
	<input type="text" class="form-control" name="folio">
	<br>
	<button type="submit" class="btn btn-primary">Registrar</button>
</form>
</div>



@stop