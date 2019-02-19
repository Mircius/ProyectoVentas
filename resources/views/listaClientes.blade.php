<!DOCTYPE html>
<html lang="es">
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="code.js"></script>

	<!-- BOOTSRAP -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
	<!-- Barra de navegación -->
		@include('navbar')
		
		<br>
	<!-- Componente Errores  -->



	<!-- Titulo -->
		<div class="row bg-dark d-flex justify-content-center">
			<h1 class="bg-dark text-white">Clientes</h1>
		</div>
		<br>
	<!-- Tabla clientes -->
		<div class="row">
			
		</div>

		<br><br>

	<!-- Boton nuevos clientes -->
		<div class="row">
				<div>
					<button type="button" class="btn btn-dark">Añadir Cliente</button>
				</div>
		</div>
	</div>
</body>
</html>