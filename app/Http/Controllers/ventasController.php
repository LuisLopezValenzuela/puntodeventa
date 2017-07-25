<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Empleados;
use App\Ventas;
use App\Ventasdetalles;
use DB;

class ventasController extends Controller
{
	public function Iniciar(){
		return view('/IniciarVenta');
	}    
	public function venta(Request $datos){
		$Productos=Productos::all();

		$venta = new Ventas();
		$venta->folio=$datos->input('folio');
		$venta->empleado_id=$datos->input('empleado_id');
		$venta->save();

		$folio=$datos->input('folio');

		$ventas=DB::table('ventas')
			->where('folio', '=', $folio)
			->select('ventas.*')
			->first();

		return view('/ventas', compact('ventas','Productos'));
	}

	public function cargarproducto($id, Request $datos){
		$codigo=$datos->input('codigo');

		$productoid=DB::table('productos')
		->where('codigo', '=', $codigo)
		->select('id')
		->first();


		$ventasdetalles=new Ventasdetalles();
		$ventasdetalles->producto_id=$productoid->$id;
		$ventasdetalles->venta_id=$id;
		$ventasdetalles->save();



		return redirect('/carrodecompras/'.$id);
	}
	public function carro($id){
		$Productos=Productos::all();
		$ventas=DB::table('ventas')
			->where('id', '=', $id)
			->select('ventas.*')
			->first();
		return view('/carrodecompras', compact('ventas','Productos'));
	}

}
