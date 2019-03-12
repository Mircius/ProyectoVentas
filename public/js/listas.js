// Logica de la lista cliente
function listaClientes(clientes){
	var encabezado = [ 'nombre', 'email', 'cifNif', 'codigoPostal', 'provincia', 'localidad'];
	var donde = '#tbodyClientes';
	
	for (var cliente in clientes) {
		var enlace = '/cliente/'+clientes[cliente]["id"];

		
		printLista(encabezado, donde, enlace, clientes[cliente]);
	}
}

// Logica de la lista Venta
function listaVentas(ventas){
	var encabezado = ['id', 'created_at', 'updated_at'];
	var donde = '#tbodyVentas';
	
	for (var venta in ventas) {
		var enlace = '/cliente/venta/'+ventas[venta]["id"];

		
		printLista(encabezado, donde, enlace, ventas[venta]);
	}
}

// Logica del Detalle Venta FACTURAS
function detalleFacturas(factura){
	var encabezado = ['archivo', 'estado', 'updated_at', 'x', 'x', 'x'];
	var donde = '#tbodyFactura';
	
	for (var campo in factura) {
		var enlace = '#';

		
		printLista(encabezado, donde, enlace, factura[campo]);
	}
}

// Logica del Detalle Venta ALBARAN
function detalleAlbaran(albaran){
	var encabezado = ['archivo', 'estado', 'updated_at', 'x', 'x', 'x'];
	var donde = '#tbodyAlbaran';
	
	for (var campo in albaran) {
		var enlace = '#';

		
		printLista(encabezado, donde, enlace, albaran[campo]);
	}
}
// Logica del Detalle Venta Tipo3
function detalleTipo3(tipo3){
	var encabezado = ['archivo', 'estado', 'updated_at', 'x', 'x', 'x'];
	var donde = '#tbodyT3';
	
	for (var campo in tipo3) {
		var enlace = '#';

		
		printLista(encabezado, donde, enlace, tipo3[campo]);
	}
}
// Logica del Detalle Venta Tipo4
function detalleTipo4(tipo4){
	var encabezado = ['archivo', 'estado', 'updated_at', 'x', 'x', 'x'];
	var donde = '#tbodyT4';
	
	for (var campo in tipo4) {
		var enlace = '#';

		
		printLista(encabezado, donde, enlace, tipo4[campo]);
	}
}
// Logica del Detalle Venta PRESUPUESTOS
function detallePresupuesto(presupuesto){
	var encabezado = ['archivo', 'estado', 'updated_at', 'x', 'x', 'x'];
	var donde = '#tbodyPresupuesto';
	
	for (var campo in presupuesto) {
		var enlace = '#';

		
		printLista(encabezado, donde, enlace, presupuesto[campo]);
	}
}



// Componente print lista
function printLista(encabezado, donde, enlace, cliente){
	var tamano = encabezado.lenght;

	var content = ' <a class="lista" href="'+enlace+'"><div class="row">'
	for(col in encabezado){
	    content += '<div class="col-md">' + cliente[encabezado[col]] + '</div>';
	}
	content += "</div> </a>"

	$(donde).append(content);
}