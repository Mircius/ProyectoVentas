<!DOCTYPE html>
<html lang="es">
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
		<script type="text/javascript" src="{{asset('js/listas.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/componenteErrores.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/venta.js')}}"></script>

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
				<h1 class="bg-dark text-white">Venta</h1>

			</div>
			<div class="row">
				<form  method="POST" id ="formArchivo" action="/cliente/nuevaVentaSave/{{$venta->id}}">
					{{ csrf_field() }}
					<div class="form-group">
						<label class="labelCliente" for="tipo">Tipo:</label>
						<input type="text" class="form-control" name="tipo" id="tipo" readonly>

						<label for="descripcion">Descripcion:</label>
						<input type="text" class="form-control" name="descripcion" id="descripcion">

						<button type="submit" class="btn btn-dark float-right"> Guardar </button>
					</div>
				</form>
			</div>

			<br>
		</div>
	</body>
</html>
