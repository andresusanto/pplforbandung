@extends('layouts.masterfront')

@section('content')

	  <div id="login-page">
	  	<div class="container">
	  				
			{!! Form::open(['url'=>"signup",'class'=>"form-login", 'method'=>'PATCH'])!!}
		     
		        <h2 class="form-login-heading">SignUp</h2>
		        <br>
		        <div class="login-wrap">
		        	<div class="form-group col-sm-10">
		        	  <label class="col-sm-3 col-sm-3 control-label"></label>
				      <label class="col-sm-3 col-sm-3 control-label">Nama</label>
				      <div class="col-sm-6">
				          <input type="text" name='nama'  class="form-control" required>
				      </div>
				  </div>
				  <div class="form-group col-sm-10">
		        	  <label class="col-sm-3 col-sm-3 control-label"></label>
				      <label class="col-sm-3 col-sm-3 control-label">Email</label>
				      <div class="col-sm-6">
				          <input type="text" name='email' class="form-control" required>
				      </div>
				  </div>
				  <div class="form-group col-sm-10">
		        	  <label class="col-sm-3 col-sm-3 control-label"></label>
				      <label class="col-sm-3 col-sm-3 control-label">Password</label>
				      <div class="col-sm-6">
				          <input type="password" name="password"  class="form-control" required>
				      </div>
				  </div>
				  <div class="form-group col-sm-10">
		        	  <label class="col-sm-3 col-sm-3 control-label">&nbsp;</label>
				      <label class="col-sm-3 col-sm-3 control-label"></label>
				      <div class="col-sm-6">
				      	<br>
		            		<button class="btn btn-theme btn-primary"  type="submit"><i class="fa fa-lock"></i> SIGNUP</button>
				      </div>
				  </div>
				  <div class="row centered">
		           </div>
		    {!!Form::close()!!}
		
		        </div>
		
		      </form>	  	
	  	
	  	</div>
	  </div>
		<script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.png", {speed: 500});
    </script>
@endsection
