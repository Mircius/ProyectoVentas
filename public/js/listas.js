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
//DISTRIBUIDOR
function detalleArchivos(facturas, albaranes, tipo3, tipo4, presupuestos){
	var icoFacturas = iconos(facturas);
	var icoAlbaranes = iconos(albaranes);
	var icoTipo3 = iconos(tipo3);
	var icoTipo4 = iconos(tipo4);
	var icoPresupuestos = iconos(presupuestos);

	detalleFacturas(icoFacturas);
	detalleAlbaran(icoAlbaranes);
	detalleTipo3(icoTipo3);
	detalleTipo4(icoTipo4);
	detallePresupuesto(icoPresupuestos);
}

//MODIFICA EL JSON PARA AÑADIR ICONOS
function iconos(dicc){
	for (var llave in dicc){
		var nombre = dicc[llave].id+'_'+dicc[llave].archivo
		nombre = nombre.toString();
		var varEditar = '<img src="/img/editNegro.png" class="icono btnEditar" data-toggle="modal" data-target="#ModDoc" onclick="updateModal('+dicc[llave].id+')">';
		var varVer = '<img src="/img/lupa.png" class="icono btnVer" onclick="visualizarPDF(\''+nombre+'\')">';
		var varDescarga = ' <a href="/download/'+nombre+'" target="_blank"> <img src="/img/descarga.png" class="icono btnDescarga" > </a> '

		dicc[llave].editar = varEditar;
		dicc[llave].ver = varVer;
		dicc[llave].descarga = varDescarga;
	
	}
	return dicc;
}


// Logica del Detalle Venta FACTURAS
function detalleFacturas(factura){
	var encabezado = ['archivo', 'estado', 'updated_at', 'editar', 'ver', 'descarga'];
	var donde = '#tbodyFactura';
	
	for (var campo in factura) {
		var enlace = '';

		
		printLista(encabezado, donde, enlace, factura[campo]);
	}
}

// Logica del Detalle Venta ALBARAN
function detalleAlbaran(albaran){
	var encabezado = ['archivo', 'estado', 'updated_at', 'editar', 'ver', 'descarga'];
	var donde = '#tbodyAlbaran';
	
	for (var campo in albaran) {
		var enlace = '';

		
		printLista(encabezado, donde, enlace, albaran[campo]);
	}
}
// Logica del Detalle Venta Tipo3
function detalleTipo3(tipo3){
	var encabezado = ['archivo', 'estado', 'updated_at', 'editar', 'ver', 'descarga'];
	var donde = '#tbodyT3';
	
	for (var campo in tipo3) {
		var enlace = '';

		
		printLista(encabezado, donde, enlace, tipo3[campo]);
	}
}
// Logica del Detalle Venta Tipo4
function detalleTipo4(tipo4){
	var encabezado = ['archivo', 'estado', 'updated_at', 'editar', 'ver', 'descarga'];
	var donde = '#tbodyT4';
	
	for (var campo in tipo4) {
		var enlace = '';

		
		printLista(encabezado, donde, enlace, tipo4[campo]);
	}
}
// Logica del Detalle Venta PRESUPUESTOS
function detallePresupuesto(presupuesto){
	var encabezado = ['archivo', 'estado', 'updated_at', 'editar', 'ver', 'descarga'];
	var donde = '#tbodyPresupuesto';
	
	for (var campo in presupuesto) {
		var enlace = '';

		
		printLista(encabezado, donde, enlace, presupuesto[campo]);
	}
}



// Componente print lista
function printLista(encabezado, donde, enlace, cliente){
	var tamano = encabezado.lenght;
	
	if (enlace == '') {
		var content = '<div class="row">'
		for(col in encabezado){
	   		content += '<div class="col-md">' + cliente[encabezado[col]] + '</div>';
		}
	content += "</div>"

	}else{
		var content = '<a class="lista" href="'+enlace+'"><div class="row">'
		for(col in encabezado){
			content += '<div class="col-md">' + cliente[encabezado[col]] + '</div>';
		}
		content += "</div> </a>"
	}

	$(donde).append(content);
}