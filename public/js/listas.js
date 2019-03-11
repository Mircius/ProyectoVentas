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
	var encabezado = [ 'id', 'created_at', 'updated_at'];
	var donde = '#tbodyVentas';
	
	for (var venta in ventas) {
		var enlace = '/cliente/venta/'+ventas[venta]["id"];

		
		printLista(encabezado, donde, enlace, ventas[venta]);
	}
}

// Logica del Detalle Venta FACTURAS
function detalleFacturas(venta){
	var encabezado = [ 'id', 'created_at', 'updated_at'];
	var donde = '#tbodyFactura';
	
	for (var campo in venta) {
		var enlace = '#';

		
		printLista(encabezado, donde, enlace, ventas[venta]);
	}
}

// Logica del Detalle Venta ALBARAN
function detalleFacturas(venta){
	var encabezado = [ 'id', 'created_at', 'updated_at'];
	var donde = '#tbodyAlbaran';
	
	for (var campo in venta) {
		var enlace = '#';

		
		printLista(encabezado, donde, enlace, ventas[venta]);
	}
}
// Logica del Detalle Venta Tipo3
function detalleFacturas(venta){
	var encabezado = [ 'id', 'created_at', 'updated_at'];
	var donde = '#tbodyT3';
	
	for (var campo in venta) {
		var enlace = '#';

		
		printLista(encabezado, donde, enlace, ventas[venta]);
	}
}
// Logica del Detalle Venta Tipo4
function detalleFacturas(venta){
	var encabezado = [ 'id', 'created_at', 'updated_at'];
	var donde = '#tbodyT4';
	
	for (var campo in venta) {
		var enlace = '#';

		
		printLista(encabezado, donde, enlace, ventas[venta]);
	}
}
// Logica del Detalle Venta PRESUPUESTOS
function detalleFacturas(venta){
	var encabezado = [ 'id', 'created_at', 'updated_at'];
	var donde = '#tbodyPresupuesto';
	
	for (var campo in venta) {
		var enlace = '#';

		
		printLista(encabezado, donde, enlace, ventas[venta]);
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