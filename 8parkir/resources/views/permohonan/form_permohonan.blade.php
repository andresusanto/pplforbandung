@extends('app')

@if(Session::has('user'))
    @section('navbar')
    <li><a href="{{URL::route('home')}}"><i class="icon-dashboard"></i><span>Beranda</span> </a> </li>
    <li class="active"><a href="{{URL::route('form_permohonan')}}"><i class="icon-list-alt"></i><span>Ajukan Permohonan</span> </a> </li>
    <li><a href="{{URL::route('daftar_permohonan')}}"><i class="icon-list-ul"></i><span>Daftar Permohonan</span> </a></li>
    <li><a href="{{URL::route('daftar_izin')}}"><i class="icon-list-ul"></i><span>Daftar Izin</span> </a> </li>
    @stop

    @section('content')
    <div class="span12">
        <div class="widget">
        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3> Permohonan Izin</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div class="widget big-stats-container">
            <div class="widget-content">
              <img src="{{asset('image/logo-pemkot-bandung.png')}}" height="100" width="100"></img>
              <h6 class="bigstats">Ajukan Permohonan Surat Izin untuk Parkir dan Terminal</h6>
              {!! Form::open(['route' => 'permohonan', 'role' => 'form', 'files' => 'true']) !!}
                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::label('email_pemohon', 'Alamat Email:')!!}
                        <div class="input-group">
                            @if(Session::has('oldInput'))
                                {!! Form::text('email_pemohon', Session::get('oldInput')['email_pemohon'],  ['class' => 'form-control', 'required']) !!}
                            @else
                                {!! Form::text('email_pemohon', '',  ['class' => 'form-control', 'required']) !!}
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('id_pemohon', 'No ID Pemohon:') !!}
                        <div class="input-group">
                            {!! Form::text('id_pemohon', Session::get('user')->id, ['class' => 'form-control', 'required', 'readonly']) !!}
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
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lampiran', 'Lampiran Surat Izin Mendirikan Bangunan (file harus berbentuk PDF):') !!}
                        <div class="input-group">
                            {!! Form::File('lampiran', ['class' => 'form-control', 'required']) !!}
                        </div>
                        @if ($errors->has('lampiran')) <p class="help-block" style="color:red"> {{ $errors->first('lampiran') }} </p> @endif
                    </div>  
                    {!! Form::hidden('key', md5(uniqid())) !!}
                    {!! Form::submit('Entri Permohonan', ['class' => 'btn btn-success pull-right']) !!}
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