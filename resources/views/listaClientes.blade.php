<!DOCTYPE html>
<html lang="es">
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	<script type="text/javascript" src="{{asset('js/listas.js')}}"></script>

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
			<h1 class="bg-dark text-white">Clientes</h1>
		</div>
		<br>
	<!-- Tabla clientes -->
		<div class="row">
				<div class="col-md tabla centered">
					<div class="encabezado">
						<div class="row">
							<div class="col-md">Nombre</div>
							<div class="col-md">Email</div>
							<div class="col-md">CIF/NIF</div>
							<div class="col-md">C.P.</div>
							<div class="col-md">Provincia</div>
							<div class="col-md">Localidad</div>
						</div>
					</div>
					<hr align="left">
					<div class="cuerpo" id="tbodyClientes">
						<!-- Datos clientes -->

					</div>	
				</table>
			</div>
		</div>
		<br><br>

	<!-- Boton nuevos clientes -->
		<div class="row">
			<div class="col-md-1 col-lg-1"></div>
				<div class="col-md-2 col-lg-2">
					<a type="button" class="btn btn-dark" href="{{ URL::to('/create') }}">Añadir Cliente</a>
				</div>
		</div>
	</div>

	<script>
		var clientes = {!! json_encode($clientes->toArray(), JSON_HEX_TAG) !!};
		$(document).ready(function() {
			listaClientes(clientes);
		});
		
		
	</script>
</body>
</html>