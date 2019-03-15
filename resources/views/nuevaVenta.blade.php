<!DOCTYPE html>
<html lang="es">
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
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

			<br>
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-lg">
					<form  method="POST" id ="formNuevaVenta" >
						{{ csrf_field() }}
						
							<div class="form-group form-inline">
								<label class="labelCliente etiqueta" for="idCliente">Cliente:</label>
								<input type="text" class="form-control" name="idCliente" id="idCliente" readonly>
							</div>
							<br>
							<div class="form-group">
								<label for="descripcion" class="etiqueta" for="tipo">Descripción:</label>
								<textarea rows="4" cols="50"  class="form-control" name="descripcion" id="descripcion"></textarea>
							</div>
							<br>
							<a href="{{ URL::previous() }}" class="btn btn-dark float-left"> Cancelar </a>   
							<button type="submit" class="btn btn-dark float-right"> Guardar </button>
					</form>
					<br>
				</div>
				<div class="col-lg-1"></div>
			</div>
		</div>


		<script>
		var cliente = {!! json_encode($cliente->toArray(), JSON_HEX_TAG) !!};

		$(document).ready(function() {
			datosNuevaVenta(cliente);
			enlaceForm();

		});				
	</script>
	</body>
</html>
