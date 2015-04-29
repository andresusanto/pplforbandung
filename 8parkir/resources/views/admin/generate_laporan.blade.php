@extends('app')

@section('admin')
<ul class="nav navbar-nav">
	<li><a href="home">Beranda</a></li>
	<li><a href="daftar_permohonan">Daftar Permohonan</a></li>
	<li class="active"><a href="laporan">Laporan</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
	<li><a href="#">welcome {{$admin->name}}</a></li>
	<li><a href="profile">Profile</a></li>
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
                    {!! Form::label('jumlah_laporan', 'Jumlah Laporan:')!!}
                    <div class="input-group">
                        {!! Form::text('jumlah_laporan', $permohonan, ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                {!! Form::submit('Generate Laporan', ['class' => 'btn btn-info pull-right']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection