<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Exception;

class ClientesControler extends Controller
{
    public function getClientes(){

		return view('listaClientes');
	}

	public function getCreate(){

		return view('nuevoCliente');
	}
	// array('pelicula'=>$pelicula)
// ry {
// $password = Input::get('password');

// 	$user = new User;
// 	$user->name = Input::get('name');
// 	$user->last_name = Input::get('last_name');
// 	$user->email = Input::get('email');
// 	$user->address = Input::get('address');
//         $user->phone = Input::get('phone');
//         $user->username = Input::get('username');
// 	$user->level = Input::get('level');
//         $user->password = Hash::make($password);
// 	// guardamos
// 	$user->save();

// 	//redirigimos a usuarios
// 	return Redirect::to('users')->with('status', 'ok_create');
// } catch(Illuminate\Database\QueryException $e) {
//  return Redirect::to('users')->with('status', 'error_create');
// } 
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
			$cliente->codigoPostal = $request->input('cp');
			$cliente->save();
		}catch(Exception $e){
			return back()->withErrors(['Error1'=>'Error del servidor']);		
		}

		return view('listaClientes');


		
		
	}
}
	

