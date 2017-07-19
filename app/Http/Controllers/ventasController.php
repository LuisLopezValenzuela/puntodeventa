<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Empleados;
use App\Ventas;

class ventasController extends Controller
{
	public function Iniciar($id){
		$empleados=Empleados::find($id);
		$productos=Productos::all();

		$ventanueva=new ventas();
		$ventanueva->empleado_id=$id;
		$ventanueva->save();
		
		return view('/ventas', compact('empleados','productos'));

	}    

}
