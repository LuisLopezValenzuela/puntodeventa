<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Empleados;
use App\Ventas;
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

}
