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
//Pagina Comprobacion https://www.letranif.com/



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
		if(checkNIF($(idInput).val())){
			eliminarBorderError(idForm, idInput);
			return true;
		}else{
			añadirBorderError(idForm, idInput);
			contadorErrores++;
			return false;
		}
	}
function checkFormModificarClientes (idForm){
	contadorErrores = 0;
	comprobacion("#nombre", logicaNombreProvinciaLocalidad, idForm);
	comprobacion("#provincia", logicaNombreProvinciaLocalidad, idForm); 
	comprobacion("#localidad", logicaNombreProvinciaLocalidad, idForm);
	comprobacion("#telefono", logicaTelefono, idForm);
	comprobacion("#email", logicaMail, idForm);
	comprobacion("#direccion", logicaVacio, idForm);
	comprobacion("#codigoPostal", logicaVacio, idForm);

	if(contadorErrores === 0){
		componenteMostrarError(mensajesError);
		$("div.mostrarErroresJs").hide();
		return true;
	}else{
		recogerErrores();
		construirErroresMensaje(names);
		componenteMostrarError(mensajesError);
		names.length=0;
		mensajesError.length=0;
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
	$.each(arrayDeStrings, function( index, value ) {
		$("ol.mostrarErroresJs").append("<li>"+value+"</li>");
		$("div.mostrarErroresJs").show();
	});
}
function comprueba_extension(formulario, archivo) {
   extensiones_permitidas = new Array(".pdf");
   mierror = "";
   if (!archivo) {
      //Si no tengo archivo, es que no se ha seleccionado un archivo en el formulario
       mierror = "No has seleccionado ningún archivo";
   }else{
      //recupero la extensión de este nombre de archivo
      extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
      //alert (extension);
      //compruebo si la extensión está entre las permitidas
      permitida = false;
      for (var i = 0; i < extensiones_permitidas.length; i++) {
         if (extensiones_permitidas[i] == extension) {
         permitida = true;
         break;
         }
      }
      if (!permitida) {
         mierror = "Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extensiones: " + extensiones_permitidas.join();
       }else{
         formulario.submit();
         return true;
       }
   }
   //si estoy aqui es que no se ha podido subir
   alert (mierror);
   return false;
} 

function checkFormSubidaArchivos(idForm){
    var fileInput = $("#archivo");
    var filePath = fileInput.val();
    comprueba_extension(idForm, filePath);
 
}

//Comprobacion NIF/CIF/NIE/DNI
var NIF_Type = {
    'A':'Sociedad Anónima',
    'B':'Sociedad de Responsabilidad Limitada',
    'C':'Sociedad Colectiva',
    'D':'Sociedad Comanditaria',
    'E':'Comunidad de Bienes',
    'F':'Sociedad Cooperativa',
    'G':'Asociación o Fundación',
    'H':'Comunidad de Propietarios en Régimen de Propiedad Horizontal',
    'J':'Sociedad Civil, con o sin Personalidad Jurídica',
    'K':'Español menor de 14 años',
    'L':'Español residente en el extranjero sin DNI',
    'M':'NIF que otorga la Agencia Tributaria a extranjeros que no tienen NIE',
    'N':'Entidad Extranjera',
    'P':'Corporación Local',
    'Q':'Organismo Autónomo, Estatal o no, o Asimilado, o Congregación o Institución Religiosa',
    'R':'Congregación o Institución Religiosa (desde 2008, ORDEN EHA/451/2008)',
    'S':'Órgano de la Administración General del Estado o de las Comunidades Autónomas',
    'U':'Unión Temporal de Empresas',
    'V':'Sociedad Agraria de Transformación',
    'W':'Establecimiento permanente de entidad no residente en España',
    'X':'Extranjero identificado por la Policía con un número de identidad de extranjero, NIE, asignado hasta el 15 de julio de 2008',
    'Y':'Extranjero identificado por la Policía con un NIE, asignado desde el 16 de julio de 2008 (Orden INT/2058/2008, BOE del 15 de julio)',
    'Z':'Letra reservada para cuando se agoten los "Y" para Extranjeros identificados por la Policía con un NIE'
};
var CIF_Prov = {
    '00':'No Residente',
    '01':'Álava',
    '02':'Albacete',
    '03':'Alicante',
    '53':'Alicante',
    '54':'Alicante',
    '04':'Almería',
    '05':'Ávila',
    '06':'Badajoz',
    '07':'Islas Baleares',
    '57':'Islas Baleares',
    '08':'Barcelona',
    '58':'Barcelona',
    '59':'Barcelona',
    '60':'Barcelona',
    '61':'Barcelona',
    '62':'Barcelona',
    '63':'Barcelona',
    '64':'Barcelona',
    '65':'Barcelona',
    '66':'Barcelona',
    '68':'Barcelona',
    '09':'Burgos',
    '10':'Cáceres',
    '11':'Cádiz',
    '72':'Cádiz',
    '12':'Castellón',
    '13':'Ciudad Real',
    '14':'Córdoba',
    '56':'Córdoba',
    '15':'La Coruña',
    '70':'La Coruña',
    '16':'Cuenca',
    '17':'Gerona',
    '55':'Gerona',
    '67':'Gerona',
    '18':'Granada',
    '19':'Guadalajara',
    '20':'Guipúzcoa',
    '75':'Guipúzcoa',
    '21':'Huelva',
    '22':'Huesca',
    '23':'Jaén',
    '24':'León',
    '25':'Lérida',
    '26':'La Rioja',
    '27':'Lugo',
    '28':'Madrid',
    '78':'Madrid',
    '79':'Madrid',
    '80':'Madrid',
    '81':'Madrid',
    '82':'Madrid',
    '83':'Madrid',
    '84':'Madrid',
    '85':'Madrid',
    '86':'Madrid',
    '87':'Madrid',
    '29':'Málaga',
    '92':'Málaga',
    '93':'Málaga',
    '30':'Murcia',
    '73':'Murcia',
    '31':'Navarra',
    '71':'Navarra',
    '32':'Orense',
    '33':'Asturias',
    '74':'Asturias',
    '34':'Palencia',
    '35':'Las Palmas',
    '76':'Las Palmas',
    '36':'Pontevedra',
    '27':'Pontevedra',
    '94':'Pontevedra',
    '37':'Salamanca',
    '38':'Santa Cruz de Tenerife',
    '75':'Santa Cruz de Tenerife',
    '39':'Cantabria',
    '40':'Segovia',
    '41':'Sevilla',
    '90':'Sevilla',
    '91':'Sevilla',
    '42':'Soria',
    '43':'Tarragona',
    '77':'Tarragona',
    '44':'Teruel',
    '45':'Toledo',
    '46':'Valencia',
    '96':'Valencia',
    '97':'Valencia',
    '98':'Valencia',
    '47':'Valladolid',
    '48':'Vizcaya',
    '95':'Vizcaya',
    '49':'Zamora',
    '50':'Zaragoza',
    '99':'Zaragoza',
    '51':'Ceuta',
    '52':'Melilla'
}

function checkNIF(nif) {
    nif = nif.toUpperCase().replace(/[\s\-]+/g,'');
    if(/^(\d|[XYZ])\d{7}[A-Z]$/.test(nif)) {
        var num = nif.match(/\d+/);
        num = (nif[0]!='Z'? nif[0]!='Y'? 0: 1: 2)+num;
        if(nif[8]=='TRWAGMYFPDXBNJZSQVHLCKE'[num%23]) {
        	return true;
            // return /^\d/.test(nif)? 'DNI': 'NIE: '+NIF_Type[nif[0]];
        }
    }
    else if(/^[ABCDEFGHJKLMNPQRSUVW]\d{7}[\dA-J]$/.test(nif)) {
        for(var sum=0,i=1;i<8;++i) {
            var num = nif[i]<<i%2;
            var uni = num%10;
            sum += (num-uni)/10+uni;
        }
        var c = (10-sum%10)%10;
        if(nif[8]==c || nif[8]=='JABCDEFGHI'[c]) {
            var out = /^[KLM]/.test(nif)? 'ESP': 'CIF ('+CIF_Prov[nif.substr(1,2)]+')';
            return true;
            // return out+': '+NIF_Type[nif[0]];
        }
    }
    return false;
}


