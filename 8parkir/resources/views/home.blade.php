@extends('app')

@section('guest')
<ul class="nav navbar-nav">
	<li class="active"><a href="home">Beranda</a></li>
	<li><a href="form_permohonan">Permohonan</a></li>
	<li><a href="">Daftar Permohonan</a></li>
</ul>

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					You are logged in!
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
