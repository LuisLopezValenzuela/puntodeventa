<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Productos;
use App\Proveedores;
use App\Categorias;
use App\Productos_Proveedores;
use DB;
class productosController extends Controller
{
    public function registrar(){
    	$categorias=Categorias::all();
    	$productos_proveedores=Productos_Proveedores::all();
    	$proveedores=Proveedores::all();
		return view ('registrarProductos',compact('categorias','productos_proveedores','proveedores'));
	}
	public function guardar(Request $datos)
	{
		$descuento=$datos->input('descuento'); 
		$descuento=$descuento/100;

		$producto= new Productos();
		$producto->id=$datos->input('id');
		$producto->nombre=$datos->input('nombre');
		$producto->precio=$datos->input('precio');
		$producto->descuento=$descuento;
		$producto->codigo=$datos->input('codigo');
		$producto->stock=$datos->input('stock');
		$producto->categoria_id=$datos->input('categoria');
		$producto->save();

		$productos_proveedores = new Productos_Proveedores();
		$productos_proveedores->productos_id->$datos->input('id');
		$productos_proveedores->proveedores_id->$datos->input('provedorId');
		$productos_proveedores->save();

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
			$producto->categoria_id=$datos->input('categoria');
			$producto->save();
			return redirect('consultarProductos');

	}
	public function vistaInventario(){
		$productos_proveedor=DB::table('productos_proveedores')
		->join('productos','productos_proveedores.productos_id','productos.id')
		->join('proveedores','productos_proveedores.proveedores_id','proveedores.id')
		->join('categorias','productos.categoria_id','categorias.id')
		->select('productos_proveedores.*','productos.codigo AS codigo','productos.nombre AS nombre','productos.stock AS stock','productos.precio AS precio','categorias.nombre as nom_categoria','proveedores.nombre AS nom_proveedor','productos.created_at as fecha','productos.id AS prodId' )
		->paginate(5);

		return view('reporteInventario',compact('productos_proveedor'));
	}

	public function pdf(){
	  	$productos_proveedor=DB::table('productos_proveedores')
		->join('productos','productos_proveedores.productos_id','productos.id')
		->join('proveedores','productos_proveedores.proveedores_id','proveedores.id')
		->join('categorias','productos.categoria_id','categorias.id')
		->select('productos_proveedores.*','productos.codigo AS codigo','productos.nombre AS nombre','productos.stock AS stock','productos.precio AS precio','categorias.nombre as nom_categoria','proveedores.nombre AS nom_proveedor','productos.created_at as fecha' )
		->get();
   
   	$vista=view('inventarioPDF',compact('productos_proveedor','codigo','nom_categoria','nom_proveedor','fecha'));
   	$pdf=\App::make('dompdf.wrapper');
   	$pdf->loadHTML($vista);
   	return $pdf->stream('inventarioPDF.pdf');
   }

	public function agregar(){
		/*
		$producto=Productos::find($id);
		//$producto->stock=$datos->input('sum','(','sumStock','+','stock',')');
		$producto->stock=$datos->input('sumStock');

		dd($producto);
		$producto->save();
		return redirect('/reporteInventario');
		*/
	}

}

