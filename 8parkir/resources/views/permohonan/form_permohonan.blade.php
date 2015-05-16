@extends('app')

@if(Session::has('user'))
    @section('guest')
        <ul class="nav navbar-nav">
            <li><a href="{{URL::route('home')}}">Beranda</a></li>
            <li class="active"><a href="{{URL::route('form_permohonan')}}">Ajukan Permohonan</a></li>
            <li><a href="{{URL::route('daftar_permohonan')}}">Daftar Permohonan</a></li>
            <li><a href="{{URL::route('daftar_izin')}}">Daftar Izin</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Selamat Datang {{Session::get('user')->nama_penduduk}}</a></li>
            <li><a href="{{URL::route('logoutsso')}}">Logout</a></li>
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
                            @if(Session::has('oldInput'))
                                {!! Form::text('email_pemohon', Session::get('oldInput')['email_pemohon'],  ['class' => 'form-control', 'required']) !!}
                            @else
                                {!! Form::text('email_pemohon', '',  ['class' => 'form-control', 'required']) !!}
                            @endif
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('id_pemohon', 'No ID Pemohon:') !!}
                        <div class="input-group">
                            {!! Form::text('id_pemohon', Session::get('user')->id, ['class' => 'form-control', 'required', 'readonly']) !!}
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('id_surat_tanah', 'No Surat Tanah:') !!}
                        <div class="input-group">
                            @if(Session::has('oldInput'))
                                {!! Form::text('id_surat_tanah', Session::get('oldInput')['id_surat_tanah'], ['class' => 'form-control', 'required']) !!}
                            @else
                                {!! Form::text('id_surat_tanah', '', ['class' => 'form-control', 'required']) !!}
                            @endif
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('jenis_pemohon', 'Organisasi Pemohon:') !!}
                        <div class="input-group">
                            @if(Session::has('oldInput'))
                                {!! Form::select('jenis_pemohon', ['Organisasi' => 'Organisasi', 'Perorangan' => 'Perorangan'] , Session::get('oldInput')['jenis_pemohon'] ,['class' => 'form-control', 'required']) !!}
                            @else
                                {!! Form::select('jenis_pemohon', ['Organisasi' => 'Organisasi', 'Perorangan' => 'Perorangan'] , null ,['class' => 'form-control', 'required']) !!}
                            @endif
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('jenis_permohonan', 'Jenis Permohonan:') !!}
                        <div class="input-group">
                            @if(Session::has('oldInput'))
                                {!! Form::select('jenis_permohonan', ['Parkir' => 'Parkir', 'Terminal' => 'Terminal'] , Session::get('oldInput')['jenis_permohonan'] ,['class' => 'form-control', 'required']) !!}
                            @else
                                {!! Form::select('jenis_permohonan', ['Parkir' => 'Parkir', 'Terminal' => 'Terminal'] , null ,['class' => 'form-control', 'required']) !!}
                            @endif
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lokasi_tanah', 'Lokasi Tanah:') !!}
                        <div class="input-group">
                            @if(Session::has('oldInput'))
                                {!! Form::text('lokasi_tanah', Session::get('oldInput')['lokasi_tanah'], ['class' => 'form-control', 'required']) !!}
                            @else
                                {!! Form::text('lokasi_tanah', '', ['class' => 'form-control', 'required']) !!}
                            @endif
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('tanggal_dibuat', 'Tanggal Mulai Kontrak:') !!}
                        <div class="input-group">
                            @if(Session::has('oldInput'))
                                {!! Form::input('date', 'tanggal_dibuat', Session::get('oldInput')['tanggal_dibuat'], ['class' => 'form-control', 'required']) !!}
                            @else
                                {!! Form::input('date', 'tanggal_dibuat', '', ['class' => 'form-control', 'required']) !!}
                            @endif
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('tanggal_expired', 'Tanggal Selesai Kontrak:') !!}
                        <div class="input-group">
                            @if(Session::has('oldInput'))
                                {!! Form::input('date', 'tanggal_expired', Session::get('oldInput')['tanggal_expired'], ['class' => 'form-control', 'required']) !!}
                            @else
                                {!! Form::input('date', 'tanggal_expired', '', ['class' => 'form-control', 'required']) !!}
                            @endif
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lampiran', 'Lampiran Surat Izin Mendirikan Bangunan:') !!}
                        <div class="input-group">
                            {!! Form::File('lampiran', ['class' => 'form-control', 'required']) !!}
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        @if ($errors->has('lampiran')) <p class="help-block" style="color:red"> {{ $errors->first('lampiran') }} </p> @endif
                    </div>  
                    {!! Form::hidden('key', md5(uniqid())) !!}
                    <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Wajib Diisi</strong></div>
                    {!! Form::submit('Entri Permohonan', ['class' => 'btn btn-info pull-right']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    @stop
@else
    {{Redirect::route('home')}}
@endif

@endsection