@extends('app')

@section('guest')
<ul class="nav navbar-nav">
	<li><a href="{{URL::route('home')}}">Beranda</a></li>
</ul>

@stop

@section('content')
<br> <br> <br>
<div class="container">
    <div class="row">
        {!! Form::open(['url' => 'enrollPermohonanBayarRetribusi', 'role' => 'form']) !!}
            <div class="col-lg-6">
                <div class="well well-sm"><strong>Edit Permohonan Izin</strong></div>    
                <div class="form-group">
                    {!! Form::label('key', 'Enrollment Key:')!!}
                    <div class="input-group">
                        {!! Form::text('key', '',  ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                    @if ($errors->has('enroll')) <p class="help-block" style="color:red"> {{ $errors->first('enroll') }} </p> @endif
                </div>
                {!! Form::hidden('id', $permohonan->id) !!}
                {!! Form::submit('Enroll', ['class' => 'btn btn-info pull-right']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection