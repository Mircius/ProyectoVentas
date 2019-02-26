// // Logica de la lista cliente
// function listaClientes(clientes){
// 	var encabezado = [ 'nombre', 'email', 'cifNif', 'codigoPostal', 'provincia', 'localidad'];
// 	var donde = '#tbodyClientes';
	
// 	for (var cliente in clientes) {
// 		var enlace = '/cliente/'+clientes[cliente]["idClient"];

		
// 		printLista(encabezado, donde, enlace, clientes[cliente]);
// 	}
// }

// // Componente print lista
// function printLista(encabezado, donde, enlace, cliente){
// 	var tamano = encabezado.lenght;

// 	var content = '<tr> <a href="{{ URL::asset('+enlace+') }}">'
// 	for(col in encabezado){
// 	    content += '<td>' + cliente[encabezado[col]] + '</td>';
// 	}
// 	content += "</a> </tr> "

// 	$(donde).append(content);
// }