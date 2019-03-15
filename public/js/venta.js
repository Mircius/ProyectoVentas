// Añade el value al formulario de Venta
function datosVenta(venta){
	var encabezado = [ 'id', 'created_at', 'updated_at', 'descripcion'];

	datosForm(venta, encabezado);
}

// Añade el value al formulario de NUEVA VENTA
function datosNuevaVenta(cliente){
	var encabezado = [ 'id'];

	//ES DIFERENTE POR QUE NO COINCIDEN EL ID DE ENCABEZADO CON EL CAMPO DE LA DB
	for (var llave in encabezado){
		for (var campo in cliente) {
			var cabecera = encabezado[llave];
			$('#idCliente').attr('value',cliente[cabecera]);
		}
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