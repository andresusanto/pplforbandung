@extends('app')

@section('admin')
<ul class="nav navbar-nav">
	<li><a href="home">Beranda</a></li>
	<li><a href="daftar_permohonan">Daftar Permohonan</a></li>
	<li class="active"><a href="">Laporan</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
	<li><a href="#">welcome {{$admin->name}}</a></li>
	<li><a href="logout">Logout</a></li>
</ul>
@stop

@section('content')
<br> <br> <br>
<div class="container">
    <div class="row">
        {!! Form::open(['url' => 'admin/generateLaporan', 'role' => 'form']) !!}
            <div class="col-lg-6">
                <div class="well well-sm"><strong>Laporan</strong></div>    
                <div class="form-group">
                    {!! Form::label('tanggal_awal', 'Tanggal Awal:')!!}
                    <div class="input-group">
                        {!! Form::input('date', 'tanggal_awal', null, ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('tanggal_akhir', 'Tanggal Akhir:')!!}
                    <div class="input-group">
                        {!! Form::input('date', 'tanggal_akhir', null, ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                {!! Form::submit('Generate Laporan', ['class' => 'btn btn-info pull-right']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection