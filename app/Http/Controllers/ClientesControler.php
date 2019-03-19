<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Venta;
use App\Archivo;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Collection;


class ClientesControler extends Controller
{
	//Vista Principal
    public function getClientes(){
		$clientes = Cliente::select('id', 'nombre', 'email', 'cifNif', 'codigoPostal', 'provincia', 'localidad')->paginate(5);

    	return view("listaClientes", compact('clientes'));
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

	// FORMULARIO NUEVA VENTA
	public function newSale($id){
		try{
			$cliente = Cliente::find($id);
			
			return view('nuevaVenta', ['cliente'=>$cliente]);
		}catch(Exception $e){
			return back()->withErrors(['Error1'=>'Error del servidor']);		
		}

	}

	//Funcion de creacion de nueva venta
	public function newSaleSave(Request $request, $id){
		try{
			$venta = new Venta;
				$venta->idCliente = $request->input('idCliente');
				$venta->descripcion = $request->input('descripcion');
			$venta->save();


			$cliente = Cliente::find($id);
			$ventas = Venta::where('idCliente', $id)->get();

			return view('cliente', ['cliente'=>$cliente], ['ventas'=>$ventas]);
		}catch(Exception $e){
		 	return back()->withErrors(['Error1'=>'Error del servidor']);		
		}
	}

	//VISTA DE DETALLE VENTA
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

	//FUNCION DE SUBIDA DE ARCHIVOS
	public function fileSave(Request $request, $id){
		try{

			$tipo =  $request->input('tipo');
			$estado = $request->input('estado');
			$file = $request->file('archivo');
			$nombre = $request->file('archivo')->getClientOriginalName();	

			$fichero = new Archivo;
		 		$fichero->idVenta = $id;
				$fichero->archivo = $nombre;
				$fichero->tipo = $tipo;
				$fichero->estado = $estado;
			$fichero->save();

			// Añade el id al nombre del archivo
			$nombreArchivo = $fichero->id.'_'.$request->file('archivo')->getClientOriginalName();
			Storage::disk('public')->put($nombreArchivo,  file_get_contents($file));

			return $this->getVenta($id);
		 	//return back();

	 	}catch(Exception $e){
			return back()->withErrors(['Error1'=>'Error del servidor']);	
		}
	}

	//FUNCION DE ACTUALIZACION DE ARCHIVO
	public function updateArchivo(Request $request, $id){
		try{
			$estado = $request->input('estadoUp');
			$file = $request->file('archivoUp');
			$nombre = $request->file('archivoUp')->getClientOriginalName();


			$nombreAntiguo = Archivo::find($id, ['archivo']);
			$ficheroAntiguo = $id.'_'.$nombreAntiguo['archivo'];

			Storage::delete($ficheroAntiguo);

			$fichero = Archivo::find($id);
				$fichero->archivo = $nombre;
				$fichero->estado = $estado;
			$fichero->save();

			// Añade el id al nombre del archivo
			$nombreArchivo = $id.'_'.$nombre;
			Storage::disk('public')->put($nombreArchivo,  file_get_contents($file));


			//BUSCA EL ID DE LA VENTA RELACIONADA CON EL ARCHIVO
			$idVenta = Archivo::find($id, ['idVenta']);

			return $this->getVenta($idVenta['idVenta']);

		}catch(Exception $e){
			return back()->withErrors(['Error1'=>'Error del servidor']);	
		}
		
	}

	public function downloadArchivo($nombre){
	      try{
	        $pathtoFile = public_path().'/storage/'.$nombre;
	        return response()->download($pathtoFile);
	      }
	      catch(Exception $e) {
				return back()->withErrors(['Error1'=>'Error del servidor']);	
	      }
    }

    public function filtroClientes(Request $request){
    	$filtro = $request->input('filtro');

    	$clientes = Cliente::select('id', 'nombre', 'email', 'cifNif', 'codigoPostal', 'provincia', 'localidad')->where('nombre', 'like', '%'.$filtro.'%')->orwhere('localidad', 'like', '%'.$filtro.'%')->orwhere('cifNif', 'like', '%'.$filtro.'%')->paginate(5);

    	$filtro = $request->get('filtro');

    	$clientes->appends(['filtro' => $filtro])->links();

		 return view("listaClientes", compact('clientes', 'enlace'));
    }

    public function filtroVentas(Request $request){
    	$filtro = $request->input('filtro');

    	$busqueda = $request->get('filtro');

    	$clientes = Cliente::select('id', 'nombre', 'email', 'cifNif', 'codigoPostal', 'provincia', 'localidad')->where('nombre', 'like', '%'.$filtro.'%')->orwhere('localidad', 'like', '%'.$filtro.'%')->orwhere('cifNif', 'like', '%'.$filtro.'%')->get();

    	

		 return view("listaClientes", compact('clientes', 'busqueda'));
    }

}

