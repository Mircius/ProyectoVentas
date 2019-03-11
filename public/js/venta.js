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

	var boton = ' <a type="button" class="btn btn-dark float-right" href="'+enlace+'"> Atrás </a>'

	$('.atras').append(boton);
}