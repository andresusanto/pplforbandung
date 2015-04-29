@extends('app')

@section('content')
<br> <br> <br>
<div class="container">
    <div class="row">
        {!! Form::open(['url' => 'login_admin', 'role' => 'form']) !!}
            <div class="col-lg-6">
                <div class="well well-sm"><strong>Login Admin</strong></div>    
                <div class="form-group">
                    {!! Form::label('email', 'Alamat Email:')!!}
                    <div class="input-group">
                        {!! Form::text('email', '',  ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password:')!!}
                    <div class="input-group">
                        {!! Form::password('password',  ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                @if ($errors->has('login')) <p class="help-block" style="color:red"> {{ $errors->first('login') }} </p> @endif      
                {!! Form::submit('Login', ['class' => 'btn btn-info pull-right']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
