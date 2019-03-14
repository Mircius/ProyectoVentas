// Añade el value al formulario
function datosCliente(cliente){
	var encabezado = [ 'id', 'nombre', 'email', 'telefono', 'direccion', 'cifNif', 'provincia', 'localidad',  'codigoPostal'];

	for (var llave in encabezado){
		for (var campo in cliente) {
			var cabecera = encabezado[llave];

			$('#'+cabecera).attr('value',cliente[cabecera]);
		}
	}
}

function enlace(cliente){
	var id = cliente['id'];
	var enlace = '/cliente/nuevaVenta/'+id;

	var boton = '<a type="button" class="btn float-right" href="'+enlace+'"><img src="/img/agregar.png" height="50" width="50"></a>'

	$('.agregarVenta').append(boton);
}

//Habilita los campos para poder editar el cliente
function editar(){
	$('.editable').removeAttr('disabled');
	$('#editarCliente').remove();
	$('#editarGuardar').append('<button id="guardarCliente" onclick="guardar();return false;"><img id="btnGuardarCliente" src="/img/okBlanco.png" height="45" width="45"></button>');
}

//Deshabilita los campos
function guardar(){
	if(checkFormModificarClientes ("#editar")){
		$('#editar').submit();
		$('.editable').attr('disabled', 'true');
		$('#guardarCliente').remove();
		$('#editarGuardar').append('<img id="editarCliente" src="/img/editBlanco.png" height="45" width="55" onclick="editar()">');


	}
}

// <img id="editarCliente" src="{{asset('img/editBlanco.png')}}" height="45" width="55" onclick="editar()">
// <img id="guardarCliente" src="{{asset('img/okBlanco.png')}}" height="45" width="45" onclick="guardar()">