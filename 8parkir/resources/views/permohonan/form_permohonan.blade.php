@extends('app')

@section('guest')
@section('guest')
<ul class="nav navbar-nav">
    <li><a href="{{URL::route('home')}}">Beranda</a></li>
    <li class="active"><a href="{{URL::route('form_permohonan')}}">Permohonan</a></li>
    <li><a href="{{URL::route('daftar_permohonan')}}">Daftar Permohonan</a></li>
</ul>
@stop

@section('content')
<br> <br> <br>
<div class="container">
    <div class="row">
        {!! Form::open(['route' => 'permohonan', 'role' => 'form', 'files' => 'true']) !!}
            <div class="col-lg-6">
                <div class="well well-sm"><strong>Permohonan Izin</strong></div>    
                <div class="form-group">
                    {!! Form::label('email_pemohon', 'Alamat Email:')!!}
                    <div class="input-group">
                        {!! Form::text('email_pemohon', '',  ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('id_pemohon', 'No ID Pemohon:') !!}
                    <div class="input-group">
                        {!! Form::text('id_pemohon', '', ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('id_surat_tanah', 'No Surat Tanah:') !!}
                    <div class="input-group">
                        {!! Form::text('id_surat_tanah', '', ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('jenis_pemohon', 'Organisasi Pemohon:') !!}
                    <div class="input-group">
                        {!! Form::select('jenis_pemohon', ['Organisasi' => 'Organisasi', 'Perorangan' => 'Perorangan'] , null ,['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('jenis_permohonan', 'Jenis Permohonan:') !!}
                    <div class="input-group">
                        {!! Form::select('jenis_permohonan', ['Parkir' => 'Parkir', 'Terminal' => 'Terminal'] , null ,['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('lokasi_tanah', 'Lokasi Tanah:') !!}
                    <div class="input-group">
                        {!! Form::text('lokasi_tanah', '', ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('tanggal_dibuat', 'Tanggal Mulai Kontrak:') !!}
                    <div class="input-group">
                        {!! Form::input('date', 'tanggal_dibuat', '', ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('tanggal_expired', 'Tanggal Selesai Kontrak:') !!}
                    <div class="input-group">
                        {!! Form::input('date', 'tanggal_expired', '', ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('lampiran', 'Lampiran:') !!}
                    <div class="input-group">
                        {!! Form::File('lampiran', ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>  
                {!! Form::hidden('key', md5(uniqid())) !!}
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Wajib Diisi</strong></div>
                {!! Form::submit('Entri Pengaduan', ['class' => 'btn btn-info pull-right']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection