// Añade el value al formulario de Venta
function datosVenta(venta){
	var encabezado = [ 'id', 'created_at', 'updated_at'];

	datosForm(venta, encabezado);

	//DESCRIPCION ES UN TEXT AREA LOS DATOS NO VAN AL VALUE
		for (var campo in venta) {
			// var cabecera = encabezado[llave];
			$('#descripcion').text(venta['descripcion']);
		}
}

// Añade el value al formulario de NUEVA VENTA
function datosNuevaVenta(cliente){
	var encabezado = [ 'id'];

	for (var campo in cliente) {
		$('#idCliente').attr('value',cliente['id']);
	}
}


//COMPONENTE RELLENAR FORMS
function datosForm(valores, encabezado){

	for (var llave in encabezado){
		for (var campo in valores) {
			var cabecera = encabezado[llave];

			$('#'+cabecera).attr('value',valores[cabecera]);
		}
	}
}

//Añade action al form
function enlaceForm(){

	for (var campo in cliente){
		var idCliente = cliente['id'];
	}

	var enlace = "/cliente/nuevaVentaSave/"+ idCliente;

	$('#formNuevaVenta').attr('action', enlace);
}

function editarModal(obj){
	var titulo;
	var valor;
	if (obj.id == 'agregarFac') {
		titulo = 'Agregar factura';
		valor = 'factura';

	}else if(obj.id == 'agregarAlb'){
		titulo = 'Agregar albaran';
		valor = 'albaran';

	}else if(obj.id == 'agregarT3'){
		titulo = 'Agregar tipo3';
		valor = 'tipo3';

	}else if(obj.id == 'agregarT4'){
		titulo = 'Agregar tipo4';
		valor = 'tipo4';

	}else if(obj.id == 'agregarPres'){
		titulo = 'Agregar presupuesto';
		valor = 'presupuesto';

	}
	$('#modalTitulo').text(titulo);
	$('#tipo').attr('value', valor);
}

function updateModal(obj){
	$('#formArchivoUp').attr('action', '/cliente/updateArchivo/'+obj);

	
}

function visualizarPDF(string){
	window.open("/storage/"+string, '_blank', 'fullscreen=yes');
}
