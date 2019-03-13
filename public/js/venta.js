// Añade el value al formulario
function datosVenta(venta){
	var encabezado = [ 'id', 'created_at', 'updated_at'];

	for (var llave in encabezado){
		for (var campo in venta) {
			var cabecera = encabezado[llave];

			$('#'+cabecera).attr('value',venta[cabecera]);
		}
	}
}

//Añade enlace al boton atras
function enlaceAtras(cliente){
	var id = cliente['id'];
	var enlace = '/cliente/venta/'+id;

	var boton = '<a type="button" class="btn btn-dark float-right" href="'+enlace+'"> Atrás </a>'

	$('.atras').append(boton);
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