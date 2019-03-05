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

<<<<<<< HEAD
	var content = ' <a class="lista" href="'+enlace+'"><div class="row">'
	for(col in encabezado){
	    content += '<div class="col-md">' + cliente[encabezado[col]] + '</div>';
	}
	content += "</div> </a>"
=======
// 	var content = '<tr> <a href="{{ URL::asset('+enlace+') }}">'
// 	for(col in encabezado){
// 	    content += '<td>' + cliente[encabezado[col]] + '</td>';
// 	}
// 	content += "</a> </tr> "
>>>>>>> 22976766aa912cce79e748081aa9a8260b84799b

// 	$(donde).append(content);
// }