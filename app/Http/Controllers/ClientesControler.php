<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClientesControler extends Controller
{
	//Vista Principal
    public function getClientes(){
		$clientes = Cliente::select('idClient', 'nombre', 'email', 'cifNif', 'codigoPostal', 'provincia', 'localidad')->get();
    	return view("listaClientes", compact('clientes'));
	}

	// Formulario de creacion de clientes
	public function getCreate(){

		return view('nuevoCliente');
	}

	public function getShow($id){
		$cliente = Cliente::find($id);

		return view('cliente', array('cliente'=>$cliente));
	}
	
	//Funcion de guardado de clientes
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


		$clientes = Cliente::select('idClient', 'nombre', 'email', 'cifNif', 'codigoPostal', 'provincia', 'localidad')->get();
		return view('listaClientes', compact('clientes'));
	}
	
}
