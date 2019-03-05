<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">


<div class="col-md-1 col-lg-1"></div>
<div class="col-md-10 col-lg-10">
	<!-- <p class="alert alert-danger">Error:</p> -->
	<!-- <p class="alert alert-danger">Error: {{ session('error') }}</p> -->
	@if (session('errors'))
		<div class="alert alert-danger">{{session('errors')->first('Error1')}}</div>
	@endif
  
</div>
<div class="col-md-1 col-lg-1"></div>