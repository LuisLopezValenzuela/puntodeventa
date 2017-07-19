<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleados;

class empleadosController extends Controller
{
   public function registrar(){

    	return view('registrarEmpleados');
    }

    public function guardar(request $datos){
    	$empleado= new Empleados();
    	$empleado->name=$datos->input('name');
    	$empleado->puesto=$datos->input('puesto');
    	$empleado->email=$datos->input('email');
    	$empleado->password=$datos->input('clave');
    	$empleado->save();

    	return redirect('/consultarEmpleados');

    }

    public function consultar(){
    	$empleados=Empleados::paginate(10);

    	return view('consultarEmpleados', compact('empleados'));
    }
}
