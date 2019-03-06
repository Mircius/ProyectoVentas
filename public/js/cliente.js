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

//Habilita los campos para poder editar el cliente
function editar(){
	$('.editable').removeAttr('disabled');
	$('#editarCliente').remove();
	$('#editarGuardar').append('<button type="submit" class="guardarCliente" form="editar"><img class="guardarCliente" src="/img/okBlanco.png" height="45" width="45" onclick="guardar()"></button>');
}

//Deshabilita los campos
function guardar(){
	$('.editable').attr('disabled', 'true');
	$('.guardarCliente').remove();
	$('#editarGuardar').append('<img id="editarCliente" src="/img/editBlanco.png" height="45" width="55" onclick="editar()">');
}

// <img id="editarCliente" src="{{asset('img/editBlanco.png')}}" height="45" width="55" onclick="editar()">
// <img id="guardarCliente" src="{{asset('img/okBlanco.png')}}" height="45" width="45" onclick="guardar()">