<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClientesControler extends Controller
{
    public function getClientes(){

		return view('listaClientes');
	}

	public function getCreate(){

		return view('nuevoCliente');
	}
	// array('pelicula'=>$pelicula)

	public function save(Request $request){
		$cliente = new Cliente;
			$cliente->nombre = $request->input('nombre');
			$cliente->email = $request->input('email');
			$cliente->telefono = $request->input('telefono');
			$cliente->direccion = $request->input('direccion');
			$cliente->cifNif = $request->input('cifNif');
			$cliente->provincia = $request->input('provincia');
			$cliente->localidad = $request->input('localidad');
			$cliente->codigoPostal = $request->input('cp');
		$cliente->save();

		return view('listaClientes');
	}
	
}
