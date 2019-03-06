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