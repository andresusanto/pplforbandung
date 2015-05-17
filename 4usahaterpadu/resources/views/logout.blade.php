@extends("layouts.masterfront")

@section('content')
	  <div id="login-page">
	  	<div class="container">
	  				
			{!! Form::open(['url'=>"signup",'class'=>"form-login", 'method'=>'PATCH'])!!}
		     
		        <h2 class="form-login-heading"><b>Logout</b></h2>
		        <div class="login-wrap">
				<div class="row">
				</div>
				<div class=" text-center text-info" ><h4><p>Apakah Anda yakin ingin keluar?</p></h4></div>
		    {!!Form::close()!!}
				<div class="row centered">
					<a type="button" href="clean" class="btn btn-round btn-success">&nbsp;Iya&nbsp;</a>
					&nbsp;
					<a type="button" href="home" class="btn btn-round btn-warning">Tidak</a>
				</div>
		        </div>
		
		      </form>	  	
	  		
	  	</div>
	  </div>
		<script src="assets/js/jquery.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.png", {speed: 300});
    </script>
@stop