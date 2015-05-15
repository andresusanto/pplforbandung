@extends('layouts.master')

@section('content')
	
	<div class='col-xs-4 col-xs-offset-4' >
		<div class='form-header'>Login</div>
		<form role="form" method="POST" action="{{ route('login.submit') }}">
			
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div>
				{{$error}}
			</div>
			<div class="form-group">
				<label>E-Mail</label>
				<input type="email" class="form-control" name="email" value="{{$email}}">
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password">
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" value='Login'>
			</div>
		</form>
	</div>
@endsection
