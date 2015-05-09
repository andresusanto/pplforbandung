<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bandung BerUsaha</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="{{asset('/js/jquery-1.11.1.js')}}"></script>
	<link href="{{ asset('/css/admin/css/bootstrap.css') }}" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link href="{{ asset('/css/admin/css/font-awesome.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/admin/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/admin/css/style-responsive.css') }}" rel="stylesheet">



</head>
<body>
	<form class="form-login" method="get" action="{{route('login_callback_admin1')}}">
		<h2 class="form-login-heading">Izin Usaha dan Sarana Perdagangan</h2>
		<div class="login-wrap">
			<input id="username" name="username" class="form-control" placeholder="Username" autofocus="" type="text" required>
			<br>
			<input id="password" name="password" username="password" class="form-control" placeholder="Password" type="password" required>
			<br>
			<button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i>LOGIN</button>
			<hr>

		</div>
	</form>

		<!-- modal -->
		<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login Error</h4>
              </div>
              <div class="modal-body">
                Username / password salah
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
              </div>
            </div>
          </div>
        </div>


    <?php
        use Illuminate\Support\Facades\Session;
        $message = Session::pull('message','nothing');
     ?>
        @if($message === 'error')
        <script>
        $(document).ready(function(){
            $('#errorModal').modal('show');
        });
        </script>
        @endif


</body>
</html>