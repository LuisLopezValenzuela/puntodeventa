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
    	$empleado->nombre=$datos->input('nombre');
    	$empleado->puesto=$datos->input('puesto');
    	$empleado->usuario=$datos->input('usuario');
    	$empleado->clave=$datos->input('clave');
    	$empleado->save();

    	return redirect('/consultarEmpleados');

    }

    public function consultar(){
    	$empleados=Empleados::paginate(10);

    	return view('consultarEmpleados', compact('empleados'));
    }
}
