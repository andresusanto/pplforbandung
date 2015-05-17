@extends('app')

@if(Session::has('user'))
    @section('navbar')
    <li><a href="{{URL::route('home')}}"><i class="icon-dashboard"></i><span>Beranda</span> </a> </li>
    <li><a href="{{URL::route('form_permohonan')}}"><i class="icon-list-alt"></i><span>Ajukan Permohonan</span> </a> </li>
    <li class="active"><a href="{{URL::route('daftar_permohonan')}}"><i class="icon-list-ul"></i><span>Daftar Permohonan</span> </a></li>
    <li><a href="{{URL::route('daftar_izin')}}"><i class="icon-list-ul"></i><span>Daftar Izin</span> </a> </li>
    @stop

    @section('content')
    <div class="span12">
        <div class="widget">
        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3> Edit Permohonan Izin</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div class="widget big-stats-container">
            <div class="widget-content">
              <img src="{{asset('image/logo-pemkot-bandung.png')}}" height="100" width="100"></img>
              <h6 class="bigstats">Edit Permohonan Surat Izin untuk Parkir dan Terminal, ketika sudah divalidasi anda tidak dapat melakukan editing permohonan</h6>
            {!! Form::open(['url' => 'updatePermohonan', 'role' => 'form', 'files' => 'true']) !!}
                <div class="col-lg-6">
                    <div class="well well-sm"><strong>Permohonan Izin</strong></div>    
                    <div class="form-group">
                        {!! Form::label('email_pemohon', 'Alamat Email:')!!}
                        <div class="input-group">
                            {!! Form::text('email_pemohon', $permohonan->email_pemohon,  ['class' => 'form-control', 'required']) !!}
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('id_pemohon', 'No ID Pemohon:') !!}
                        <div class="input-group">
                            {!! Form::text('id_pemohon', $permohonan->id_pemohon, ['class' => 'form-control', 'required', 'readonly']) !!}
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('id_surat_tanah', 'No Surat Tanah:') !!}
                        <div class="input-group">
                            {!! Form::text('id_surat_tanah', $permohonan->id_surat_tanah, ['class' => 'form-control', 'required', 'readonly']) !!}
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('jenis_pemohon', 'Organisasi Pemohon:') !!}
                        <div class="input-group">
                            {!! Form::select('jenis_pemohon', ['Organisasi' => 'Organisasi', 'Perorangan' => 'Perorangan'] , $permohonan->jenis_pemohon ,['class' => 'form-control', 'required']) !!}
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('jenis_permohonan', 'Jenis Permohonan:') !!}
                        <div class="input-group">
                            {!! Form::select('jenis_permohonan', ['Parkir' => 'Parkir', 'Terminal' => 'Terminal'] , $permohonan->jenis_permohonan ,['class' => 'form-control', 'required', 'readonly']) !!}
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lokasi_tanah', 'Lokasi Tanah:') !!}
                        <div class="input-group">
                            {!! Form::text('lokasi_tanah', $permohonan->lokasi_tanah, ['class' => 'form-control', 'required', 'readonly']) !!}
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('tanggal_dibuat', 'Tanggal Mulai Kontrak:') !!}
                        <div class="input-group">
                            {!! Form::input('date', 'tanggal_dibuat', $permohonan->tanggal_dibuat, ['class' => 'form-control', 'required', 'readonly']) !!}
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('tanggal_expired', 'Tanggal Selesai Kontrak:') !!}
                        <div class="input-group">
                            {!! Form::input('date', 'tanggal_expired', $permohonan->tanggal_expired, ['class' => 'form-control', 'required', 'readonly']) !!}
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lampiran', 'Lampiran Surat Izin Mendirikan Bangunan (file harus berbentuk PDF):') !!}
                        <div>
                            <a href="{{URL::route('downloadLampiran',[$permohonan->lampiran])}}" class="btn btn-sm btn-success"}>Download Lampiran Sebelumnya</a>
                        <div>
                        <div class="input-group">
                            {!! Form::File('lampiran', ['class' => 'form-control']) !!}
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        @if ($errors->has('enroll')) <p class="help-block" style="color:red"> {{ $errors->first('enroll') }} </p> @endif
                    </div>
                    {!! Form::hidden('id', $permohonan->id) !!}
                    {!! Form::submit('Entri Pengaduan', ['class' => 'btn btn-success pull-right']) !!}
                </div>
            {!! Form::close() !!}
            </div>
            <!-- /widget-content --> 
            
          </div>
        </div>
      </div>
      <!-- /widget -->
    </div>
    <!-- /span12 --> 
    @stop
@else
    {{Redirect::route('home')}}
@endif

@endsection