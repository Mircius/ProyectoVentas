<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesControler extends Controller
{
    public function getClientes(){

		return view('listaClientes');
	}

	public function getCreate(){

		return view('nuevoCliente');
	}

	public function save(Request $request){
		$cliente = New Cliente;
		$cliente->title = $request->input('title');
		$cliente->year = $request->input('year');
		$cliente->director = $request->input('director');
		$cliente->poster = $request->input('poster');
		$cliente->synopsis = $request->input('synopsis');
		$cliente->save();

		return view('listaClientes');
	}
	
}
