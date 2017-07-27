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
    	$proveedores=Proveedores::all();
		return view ('registrarProductos',compact('categorias','proveedores'));
	}
	public function guardar(Request $datos)
	{

		$descuento=$datos->input('descuento'); 
		if ($descuento==0) {
			$descuento=0;
		}else{
			$descuento=$descuento/100;
		}

		$producto= new Productos();
		$producto->nombre=$datos->input('nombre');
		$producto->precio=$datos->input('precio');
		$producto->descuento=$descuento;
		$producto->codigo=$datos->input('codigo');
		$producto->stock=$datos->input('stock');
		$producto->categoria_id=$datos->input('categoria');	
		$producto->save();
		
		DB::table('Productos_Proveedores')->insert(['proveedores_id'=>$datos->proveedor,'productos_id'=>$producto->id]);
		
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


	public function agregar($id,request $datos){
		
		
		$nuevo=$datos->input('sumStock');

		$stock=DB::table('productos')
		->where('productos.id','=',$id)
		->select('productos.stock')
		->first();
		//$producto->stock=$datos->input('sum','(','sumStock','+','stock',')');
		//$producto->stock=$datos->input('sumStock');

		$producto=Productos::find($id);
		$producto->stock=$stock->stock+$nuevo;
		$producto->save();
		return redirect('/reporteInventario');
		
	}
	public function reportesporFecha(request $datos){
		
		$fechaInicial=$datos->input('fechaini');
		$fechaFinal=$datos->input('fechafin');
		
		$productos_proveedorF=DB::table('productos_proveedores')
		->whereDate('productos.created_at','>=',date($fechaInicial))
		->whereDate('productos.created_at','<=',date($fechaFinal))

		->join('productos','productos_proveedores.productos_id','productos.id')
		->join('proveedores','productos_proveedores.proveedores_id','proveedores.id')
		->join('categorias','productos.categoria_id','categorias.id')
		->select('productos_proveedores.*','productos.codigo AS codigo','productos.nombre AS nombre','productos.stock AS stock','productos.precio AS precio','categorias.nombre as nom_categoria','proveedores.nombre AS nom_proveedor','productos.created_at as fecha','productos.id AS prodId' )

		->get();
		//dd($productos_proveedorF->first());
		return view('reporteInventarioFecha',compact('productos_proveedorF'));
	}


}

