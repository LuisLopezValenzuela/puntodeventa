@extends('master')

@section('contenido')
	<h2>Caja</h2>
	
	Folio: {{$ventas->folio}}
	
	<hr>
	<form action="" method="post">
	<input id="token" type="hidden" name"_token" value="{{ csrf_token() }}">
	<div class="form-group">
			<label for="productos">Escriba el Codigo del Producto</label>
			<input type="text" name="codigo" class="form-control">
	</div>
	<button class="btn btn-primary">Añadir</button>
	</form>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  	Lista de Productos</button>
  	<h3>Lista de Productos</h3>
	<hr>
	<div class="row">
		<div class="col-xs-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Producto:</th>
						<th>Precio:</th>
						<th>Descuento:</th>
						<th>Total:</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach($Productos as $p)
        	{{$p->nombre}} - {{$p->codigo}}
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@stop