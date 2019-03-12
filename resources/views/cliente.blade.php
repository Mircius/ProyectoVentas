<!DOCTYPE html>
<html lang="es">
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
		<script type="text/javascript" src="{{asset('js/listas.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/cliente.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/componenteErrores.js')}}"></script>



		<!-- BOOTSRAP -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

		<!-- JQUERY -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
		<!-- Barra de navegación -->
			@include('navbar')
			
		<!-- Componente Errores  -->
		<div class="row compErrors">
			@include('errors')
			
		</div>
		<!-- Titulo -->
			<div class="row bg-dark d-flex justify-content-center">
				<h1 class="bg-dark text-white">Cliente</h1>

				<div id="editarGuardar">
					<!-- ICONO EDITAR /ICONO GUARDAR -->
					<img id="editarCliente" src="{{asset('img/editBlanco.png')}}" height="45" width="55" onclick="editar()">

					<!-- VARIARA ENTRE LAS 2 SIGUIENTES IMAGENES -->
					<!-- <img id="editarCliente" src="{{asset('img/editBlanco.png')}}" height="45" width="55" onclick="editar()"> -->
					<!-- <img id="guardarCliente" src="{{asset('img/okBlanco.png')}}" height="45" width="45" onclick="guardar()"> -->
				</div>
				
			</div>
			<br>
			<div class="atras">
				 <a type="button" class="btn btn-dark float-right" href="{{ URL::to('/') }}"> Atrás </a>
			</div>

			<br>
			<!-- Cliente -->
		<div class="row">
			<div class="col-md-1 col-lg-1"></div>

			<div class="col-md-10 col-lg-10">
				<form method="post" name="form" id="editar" action('ClientesControler@update')>

				 	{{ csrf_field() }}
				 	<div class="row">
						<div class="form-group col-md-6 form-inline">
							<label class="labelCliente" for="nombre">Nombre:</label>
							<input type="text" class="form-control editable" name="nombre" id="nombre" disabled>
						</div>
						<div class="form-group col-md-6 form-inline">
							<label class="labelCliente" for="email">Email:</label>
							<input type="text" class="form-control editable" name="email" id="email" disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 form-inline">
							<label class="labelCliente" for="telefono">Teléfono:</label>
							<input type="text" class="form-control editable" name="telefono" id="telefono" disabled>
						</div>
						<div class="form-group col-md-6 form-inline">
							<label class="labelCliente" for="direccion">Dirección:</label>
							<input type="text" class="form-control editable" name="direccion" id="direccion" disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 form-inline">
							<label class="labelCliente" for="cifNif">CIF/NIF:</label>
							<input type="text" class="form-control" name="cifNif" id="cifNif" disabled>
						</div>
						<div class="form-group col-md-6 form-inline">
							<label class="labelCliente" for="provincia">Provincia:</label>
							<input type="text" class="form-control editable" name="provincia" id="provincia" disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 form-inline">
							<label class="labelCliente" for="localidad">Localidad:</label>
							<input type="text" class="form-control editable" name="localidad" id="localidad" disabled>
						</div>
						<div class="form-group col-md-6 form-inline">
							<label class="labelCliente" for="codigoPostal">Código Postal:</label>
							<input type="text" class="form-control editable" name="codigoPostal" id="codigoPostal" disabled>
						</div>
					</div>
					<br>

				<!-- Boton nueva Venta -->
				<!-- {{ URL::to('/cliente/$id/nuevaVenta') }} -->

				<div class="row">
					<div class="col-md agregarVenta">
						
					</div>
				</div>
				<!-- Tabla ventas -->
					<div class="row">
						<div class="col-md tabla centered">
							<div class="encabezado">
								<div class="row">
									<div class="col-md">Id</div>
									<div class="col-md">Fecha de creación</div>
									<div class="col-md">Fecha última modificación</div>
								</div>
							</div>
							<hr align="left">
							<div class="cuerpo" id="tbodyVentas">
								<!-- Datos clientes -->

							</div>	
						</div>
					</div>


	<script>
		var cliente = {!! json_encode($cliente->toArray(), JSON_HEX_TAG) !!};
		var ventas = {!! json_encode($ventas->toArray(), JSON_HEX_TAG) !!};

		$(document).ready(function() {
			datosCliente(cliente);
			listaVentas(ventas);
			enlace(cliente);
		});		
	</script>
	</body>
</html>