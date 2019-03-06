<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Venta;
use Exception;

class ClientesControler extends Controller
{
	//Vista Principal
    public function getClientes(){
		$clientes = Cliente::select('id', 'nombre', 'email', 'cifNif', 'codigoPostal', 'provincia', 'localidad')->get();
    	return view("listaClientes", ['clientes'=>$clientes]);
	}

	// Formulario de creacion de clientes
	public function getCreate(){

		return view('nuevoCliente');
	}

	//Funcion de guardado de clientes
	public function save(Request $request){
		try{
			$cliente = new Cliente;
			$cliente->nombre = $request->input('nombre');
			$cliente->email = $request->input('email');
			$cliente->telefono = $request->input('telefono');
			$cliente->direccion = $request->input('direccion');
			$cliente->cifNif = $request->input('cifNif');
			$cliente->provincia = $request->input('provincia');
			$cliente->localidad = $request->input('localidad');
			$cliente->codigoPostal = $request->input('codigoPostal');
			$cliente->save();
			$clientes = Cliente::select('id', 'nombre', 'email', 'cifNif', 'codigoPostal', 'provincia', 'localidad')->get();

			return view('listaClientes', ['clientes'=>$clientes]);
		}catch(Exception $e){
			//return back()->withErrors(['Error1'=>'Error del servidor']);		
		}
	}

	//Formulario de edicion de clientes
	public function edit($id){
		try{
			$cliente = Cliente::find($id);
			$ventas = Venta::where('idCliente', $id)->get();

			return view('cliente', ['cliente'=>$cliente], ['ventas'=>$ventas]);

		}catch(Exception $e){
			//return back()->withErrors(['Error1'=>'Error del servidor']);		
		}

		
	}

	//Funcion de actualizacion de clientes
	public function update(Request $request, $id){
		try{
		$cliente = Cliente::find($id);
			$cliente->nombre = $request->input('nombre');
			$cliente->email = $request->input('email');
			$cliente->telefono = $request->input('telefono');
			$cliente->direccion = $request->input('direccion');
			// $cliente->cifNif = $request->input('cifNif');
			$cliente->provincia = $request->input('provincia');
			$cliente->localidad = $request->input('localidad');
			$cliente->codigoPostal = $request->input('codigoPostal');
		$cliente->save();

		return view('cliente', ['cliente'=>$cliente]);
		}catch(Exception $e){
			//return back()->withErrors(['Error1'=>'Error del servidor']);
		}
	}
}