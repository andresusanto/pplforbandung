@extends('layouts.masterfront')

@section('content')

	  <div id="login-page">
	  	<div class="container">
	  				
			{!! Form::open(['url'=>"login",'class'=>"form-login", 'method'=>'PATCH'])!!}
		     
		        <h2 class="form-login-heading">Login</h2>
		        <div class="login-wrap">
					
					<div class="form-group col-sm-8">
				      <label class="col-sm-3 col-sm-3 control-label">Email</label>
				      <div class="col-sm-9">
				          <input type="email" name="email" class="form-control" required>
				      </div>
				  </div>

					<br>
		        	<div class="form-group col-sm-8">
				      <label class="col-sm-3 col-sm-3 control-label">Password</label>
				      <div class="col-sm-9">
				          <input type="password" name="password" class="form-control" required>
				      </div>
				  </div>
					<div class="row centered">
			            <label class="checkbox">
			                <span class="centered">
			                    <a data-toggle="modal" href="login.html#myModal"> Lupa Password?</a>
			
			                </span>
			            </label>
			            <button class="btn btn-theme btn-primary"  type="submit"><i class="fa fa-lock"></i> LOGIN</button>
		            </div>
		            <hr>
		            {!!Form::close()!!}
		            <div class="registration">
		                Tidak memiliki akun?<br/>
		                <a class="" href="signup">
		                    <h4>Membuat akun baru</h4>
		                </a>
		            </div>
		
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
        $.backstretch("assets/img/login-bg.png", {speed: 300});
    </script>
@endsection
