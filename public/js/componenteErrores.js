var logicaNombreProvinciaLocalidad = "^[a-z A-Z]{3,30}$";
var logicaMail = "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$";
var logicaDireccion = "^[a-z A-Z,.]{5,100}$";
var logicaTelefono = "^[0-9]{9}$";
var contadorErrores = 0;
// var logicaCodigoPostal = "^[0-9]{5}$";
// var logicaNIFCIF = 

window.onload=function(){
	onClick("form");
};
function  onClick(idForm){
	$(idForm + " #submit").click(function(){ checkForm(idForm); return false; });
}
function añadirBorderError(idForm, idInput){	
        $(idForm+ " " + idInput).addClass("border border-danger");
	}
function eliminarBorderError(idForm, idInput){	
        $(idForm+ " " + idInput).removeClass("border border-danger");
	}
function comprobacion(idInput, logica, idForm) {
	if( $(idInput).val().match(logica)){
		eliminarBorderError(idForm, idInput);
		return true;
	}else{
		mostrarErrores(idInput + " es erroneo.");
		añadirBorderError(idForm, idInput);
		contadorErrores++;
		return false;
	}
}
function mostrarErrores(idInput){
	console.log(idInput);

}

function checkForm (idForm) {
	contadorErrores = 0;
	comprobacion("#nombre", logicaNombreProvinciaLocalidad, idForm)
	comprobacion("#provincia", logicaNombreProvinciaLocalidad, idForm) 
	comprobacion("#localidad", logicaNombreProvinciaLocalidad, idForm)
	comprobacion("#telefono", logicaTelefono, idForm)
	comprobacion("#email", logicaMail, idForm)
	if(contadorErrores === 0){
		submit();
	}
			
}