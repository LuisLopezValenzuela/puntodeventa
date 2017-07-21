<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Productos;
use App\Proveedores;
use App\Categorias;
use DB;
class productosController extends Controller
{
    public function registrar(){
    	$categorias=Categorias::all();
		return view ('registrarProductos',compact('categorias'));
	}
	public function guardar(Request $datos)
	{
		$producto= new Productos();
		$producto->nombre=$datos->input('nombre');
		$producto->precio=$datos->input('precio');
		$producto->descuento=$datos->input('descuento');
		$producto->codigo=$datos->input('codigo');
		$producto->stock=$datos->input('stock');
		$producto->categoria_id=$datos->input('categoria');

		$producto->save();
	return redirect('/consultarProductos');
	}
	public function consultar(){
		$productos=DB::table('productos')
		->join('categorias','productos.categoria_id','categorias.id')
		->select('productos.*','categorias.nombre AS nom_categoria')
		->get();
		return view('consultarProductos',compact('productos'));
	}
	public function eliminar($id){
		$producto=Productos::find($id);
		$producto->delete();
		return redirect('consultarProductos');
	}
	public function editar($id){
		$producto=DB::table('productos')
		->where('productos.id','=',$id)
		->join('categorias','productos.categoria_id','categorias.id')
		->select('productos.*','categorias.nombre AS nom_categoria')
		->first();
		$categorias=Categorias::all();
		return view('editarProductos',compact('producto','categorias'));

	}
	public function actualizar($id,Request $datos){
		$producto=Productos::find($id);
		$producto->nombre=$datos->input('nombre');
			$producto->precio=$datos->input('precio');
			$producto->descuento=$datos->input('descuento');
			$producto->codigo=$datos->input('codigo');
			$producto->stock=$datos->input('stock');
			$producto->categoria_id=$datos->input('categorias');
			$producto->save();
			return redirect('consultarProductos');

	}
	public function vistaInventario(){
		$productos_proveedor=DB::table('productos_proveedores')
		->join('productos','productos_proveedores.productos_id','productos.id')
		->join('proveedores','productos_proveedores.proveedores_id','proveedores.id')
		->join('categorias','productos.categoria_id','categorias.id')
		->select('productos_proveedores.*','productos.codigo AS codigo','productos.nombre AS nombre','productos.stock AS stock','productos.precio AS precio','categorias.nombre as nom_categoria','proveedores.nombre AS nom_proveedor','productos.created_at as fecha' )
		->get();
		return view('reporteInventario',compact('productos_proveedor'));
	}

}

