@extends("layouts.masterfront")
<?php 
	 header("Refresh: 3 ; url=$url");
 ?>
@section('content')
	  <div id="login-page">
	  	<div class="container">
	  				
			{!! Form::open(['url'=>"signup",'class'=>"form-login", 'method'=>'PATCH'])!!}
		     
		        <h2 class="form-login-heading"><b>Pesan Kesalahan</b></h2>
		        <div class="login-wrap">
				<div class="row">
					<div class = "text-center">
						<img class=""  width="30"  src="{{asset('assets/img/status/failed.png')}}">
					</div>
				</div>
				<div class=" text-center text-info" ><h4><p>{{$str}}</p></h4></div>
		    {!!Form::close()!!}
		
		        </div>
		
		      </form>	  	
	  		
	  	</div>
	  </div>
		<script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{asset('assets/js/jquery.backstretch.min.js')}}"></script>
    <script>
        $.backstretch("{{asset('assets/img/login-bg.png')}}", {speed: 300});
    </script>
@stop