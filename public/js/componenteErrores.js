var logicaNombreProvinciaLocalidad = "^[a-z A-Z]{3,30}$";
var logicaMail = "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$";
var logicaDireccion = "^[a-z A-Z,.]{5,100}$";
var logicaTelefono = "^[0-9]{9}$";
var logicaVacio = "^[^]+$";
var contadorErrores = 0;
var names = [];
var mensajesError = [];
// var logicaCodigoPostal = "^[0-9]{5}$";
// var logicaNIFCIF = 
String.prototype.isNif=function()
{
   return /^(\d{7,8})([A-HJ-NP-TV-Z])$/.test(this) && ("TRWAGMYFPDXBNJZSQVHLCKE"[(RegExp.$1%23)]==RegExp.$2);
};


window.onload=function(){
	onClick("form");
	$("div.mostrarErroresJs").hide();

};
function  onClick(idForm){
	$(idForm + " #submit").click(function(){ checkForm(idForm);return false; });
}
function añadirBorderError(idForm, idInput){	
        $(idForm+ " " + idInput).addClass("border border-danger errores");
	}
function eliminarBorderError(idForm, idInput){	
        $(idForm+ " " + idInput).removeClass("border border-danger errores");
	}
function comprobacion(idInput, logica, idForm) {
		if( $(idInput).val().match(logica)){
			eliminarBorderError(idForm, idInput);
			return true;
		}else{
			añadirBorderError(idForm, idInput);
			contadorErrores++;
			return false;
		}
}
function dniNifComprobacion(idInput,idForm){
		if($(idInput).val().isNif()){
			eliminarBorderError(idForm, idInput);
			return true;
		}else{
			añadirBorderError(idForm, idInput);
			contadorErrores++;
			return false;
		}
	}
function checkForm (idForm) {
	contadorErrores = 0;
	comprobacion("#nombre", logicaNombreProvinciaLocalidad, idForm);
	comprobacion("#provincia", logicaNombreProvinciaLocalidad, idForm); 
	comprobacion("#localidad", logicaNombreProvinciaLocalidad, idForm);
	comprobacion("#telefono", logicaTelefono, idForm);
	comprobacion("#email", logicaMail, idForm);
	comprobacion("#direccion", logicaVacio, idForm);
	dniNifComprobacion("#cifNif", idForm);
	comprobacion("#codigoPostal", logicaVacio, idForm);

	if(contadorErrores === 0){
		submit();
		
	}else{
		recogerErrores();
		construirErroresMensaje(names);
		componenteMostrarError(mensajesError);
		names.length=0;
		mensajesError.length=0;
	


	}
}

function recogerErrores(){
	$("input.errores").each(function(){
		var name = $( this ).attr("name");
		names.push(name);
	});
}

function construirErroresMensaje(array){
	$.each(names, function( index, value ) {
  		if (value == "nombre"){
  			mensajesError.push("El campo nombre es incorrecto. Debe contener un minimo de 3 letras y un maximo de 30.")
  		}
  		if (value == "provincia"){
  			mensajesError.push("El campo provincia es incorrecto. Debe contener un minimo de 3 letras y un maximo de 30.");
  		}
  		if (value == "localidad"){
  			mensajesError.push("El campo localidad es incorrecto. Debe contener un minimo de 3 letras y un maximo de 30.");
  		}
  		if (value == "telefono"){
  			mensajesError.push("El campo telefono es incorrecto. Debe contener 9 cifras.");
  		}
  		if (value == "email"){
  			mensajesError.push("El campo email es incorrecto.");
  		}
  		if (value == "direccion"){
  			mensajesError.push("El campo direccion no puede estar vacio.");
  		}
  		if (value == "cifNif"){
  			mensajesError.push("El campo CIF/NIF no es correcto. Revise que lo has escrito correctamente.");
  		}
  		if (value == "codigoPostal"){
  			mensajesError.push("El campo codigo postal no puede estar vacio.");
  		}
	});
}
function componenteMostrarError(arrayDeStrings){
	$("ol.mostrarErroresJs").empty();
	$.each(mensajesError, function( index, value ) {
		$("ol.mostrarErroresJs").append("<li>"+value+"</li>");
		$("div.mostrarErroresJs").show();
	});
}

