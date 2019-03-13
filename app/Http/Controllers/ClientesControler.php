<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Venta;
use App\Archivo;
use Illuminate\Support\Facades\Storage;
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
			return back()->withErrors(['Error1'=>'Error del servidor']);		
		}
	}

	//Formulario de edicion de clientes
	public function edit($id){
		try{
			$cliente = Cliente::find($id);
			$ventas = Venta::where('idCliente', $id)->get();

			return view('cliente', ['cliente'=>$cliente], ['ventas'=>$ventas]);

		}catch(Exception $e){
			return back()->withErrors(['Error1'=>'Error del servidor']);		
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

			$ventas = Venta::where('idCliente', $id)->get();

			return view('cliente', ['cliente'=>$cliente], ['ventas'=>$ventas]);
		}catch(Exception $e){
			return back()->withErrors(['Error1'=>'Error del servidor']);
		}
	}

	//Funcion de creacion de nueva venta
	public function newSale($id){
		try{
			$nuevaVenta = new Venta;
				$nuevaVenta->idCliente = $id;
			$nuevaVenta->save();

			$cliente = Cliente::find($id);
			$ventas = Venta::where('idCliente', $id)->get();

			return view('cliente', ['cliente'=>$cliente], ['ventas'=>$ventas]);
		}catch(Exception $e){
			return back()->withErrors(['Error1'=>'Error del servidor']);		
		}

	}

	 public function getVenta($id){
	 	try{
		 	$venta = Venta::find($id);

		 	$matchFactura = ['idVenta' => $id, 'tipo' => 'factura'];
		 	$matchAlbaran = ['idVenta' => $id, 'tipo' => 'albaran'];
		 	$matchTipo3 = ['idVenta' => $id, 'tipo' => 'tipo3'];
		 	$matchTipo4 = ['idVenta' => $id, 'tipo' => 'tipo4'];
		 	$matchPresupuesto = ['idVenta' => $id, 'tipo' => 'presupuesto'];

		 	$facturas = Archivo::where($matchFactura)->get();
		 	$albaranes = Archivo::where($matchAlbaran)->get();
		 	$tipo3 = Archivo::where($matchTipo3)->get();
		 	$tipo4 = Archivo::where($matchTipo4)->get();
		 	$presupuestos = Archivo::where($matchPresupuesto)->get();

		 	return view("venta",compact('venta','facturas','albaranes','tipo3','tipo4','presupuestos'));
	 	
	 	}catch(Exception $e){
			return back()->withErrors(['Error1'=>'Error del servidor']);		
		}
	}

	public function fileSave(Request $request, $id){
		try{
			$tipo =  "albaran";  //$request->input('tipo')
			$estado = "pausa";	//$request->input('estado')
			$file = $request->file('archivo');

			$nombre = $request->file('archivo')->getClientOriginalName();			
			Storage::disk('public')->put($nombre,  file_get_contents($file));
			
			//  $archivo = new Archivo;
		 // 	$archivo->idVenta = $id;
			// 	$archivo->archivo = $request->input('archivo');
			// 	$archivo->tipo = $request->input('tipo');
			// 	$archivo->estado = $request->input('estado');
			//  $archivo->save();

			Storage::disk('public')->put($nombre,  file_get_contents($file));
			
			$fichero = new Archivo;
		 		$fichero->idVenta = $id;
				$fichero->archivo = $nombre;
				$fichero->tipo = $tipo;
				$fichero->estado = $estado;
			$fichero->save();

		 	return back();

	 	}catch(Exception $e){
			return back()->withErrors(['Error1'=>'Error del servidor']);		
		}

	}
}