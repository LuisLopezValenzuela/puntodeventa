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

		$precio=DB::table('productos')
		->where('id', '=', $productoid->id)
		->select('precio')
		->first();

		$ventasdetalles=new Ventasdetalles();
		$ventasdetalles->venta_id=intval($id);
		$ventasdetalles->producto_id=$productoid->id;
		$ventasdetalles->preciounidad=$precio->precio;
		$ventasdetalles->save();


		return redirect('/carrodecompras/'.$id);
	}
	public function carro($id){
		
		$Productos=Productos::all();
		$ventas=DB::table('ventas')
			->where('id', '=', $id)
			->select('ventas.*')
			->first();

		$lista=DB::table('ventas_detalles')
		->where('ventas_detalles.venta_id', '=', $id)
		->join('productos', 'productos.id', '=', 'ventas_detalles.producto_id' )
		->select(DB::raw('sum(productos.precio-(productos.precio * productos.descuento)) as total'), DB::raw('count(*) as cantidad'), 'productos.nombre','productos.descuento','productos.precio')
		->groupBy('ventas_detalles.producto_id','productos.nombre','productos.descuento','productos.precio')
		->get();

		
		
		return view('/carrodecompras', compact('ventas','Productos','lista'));
	}

	public function cierre($id, Request $datos){
			
			$ventas=new Ventas();
			$ventas->tipodepago=$datos->input('tipodepago');
			$ventas->save();

			

		
	}

}
