var logicaNombreProvinciaLocalidad = "^[a-z A-Z]{3,30}$";
var logicaMail = "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$";
var logicaDireccion = "^[a-z A-Z,.]{5,100}$";
var logicaTelefono = "^[0-9]{9}$";
// var logicaCodigoPostal = "^[0-9]{5}$";
// var logicaNIFCIF = 

function habilitarSubmit (idForm) {
	$(idForm + " button.submit").removeAttr("disabled");
}
 
function deshabilitarSubmit (idForm) {
	$(idForm + " button.submit").attr("disabled", "disabled");
}

function comprobacion(idInput, logica) {
	return $(idInput).val().match(logica) ? true : false;
}

function checkForm (idForm) {
	$(idForm).on("change keydown", function() {
		if (comprobacion("#nombre", logicaNombreProvinciaLocalidad)){

			habilitarSubmit(idForm);
		 
			// && 
			// comprobacion("#direccion", logicaDireccion) && 
			// comprobacion("#telefono", logicaTelefono) && 
			// comprobacion("#provincia", logicaNombreProvinciaLocalidad) && 
			// comprobacion("#localidad", logicaNombreProvinciaLocalidad) && 
			// comprobacion("#email", logicaMail))
		
		} else {
			//deshabilitarSubmit(idForm);
			}
		});
}