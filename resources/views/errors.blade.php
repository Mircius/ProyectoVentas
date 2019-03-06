<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">


<div class="col-md-1 col-lg-1"></div>
<div class="col-md-10 col-lg-10">
	@if (session('errors'))
		<div class="alert alert-danger">{{session('errors')->first('Error1')}}</div>
	@endif
		<div class="alert alert-danger mostrarErroresJs">
			<ol class="mostrarErroresJs">
				
			</ol>	
		</div>
</div>
<script type="text/javascript">
	$("div.mostrarErroresJs").hide();

</script>
<div class="col-md-1 col-lg-1"></div>