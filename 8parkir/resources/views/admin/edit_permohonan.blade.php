@extends('admin.app')

@section('sidebar')

<li class="mt">
  <a href="{{URL::route('admin/home')}}">
      <i class="fa fa-dashboard"></i>
      <span>Beranda</span>
  </a>
</li>

<li class="active" class="sub-menu">
  <a href="{{URL::route('admin/daftar_permohonan')}}" >
      <i class="fa fa-list"></i>
      <span>Daftar Permohonan</span>
  </a>
</li>

<li class="sub-menu">
  <a href="{{URL::route('admin/daftar_izin')}}" >
      <i class="fa fa-list"></i>
      <span>Daftar Perizinan</span>
  </a>
</li>
<li class="sub-menu">
  <a href="{{URL::route('admin/laporan')}}" >
      <i class="fa fa-book"></i>
      <span>Laporan</span>
  </a>
</li>

@stop

@section('content')
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
          <h4 class="mb"><i class="fa fa-angle-right"></i> Validasi Permohonan</h4>
          {!! Form::open(['route' => 'admin/updatePermohonan', 'role' => 'form', 'files' => 'true', 'class' => 'form-horizontal style-form']) !!}
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Alamat Email:</label>
                  <div class="col-sm-10">
                      {!! Form::text('email_pemohon', $permohonan->email_pemohon,  ['class' => 'form-control', 'required', 'readonly']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">ID Pemohon:</label>
                  <div class="col-sm-10">
                      {!! Form::text('id_pemohon', $permohonan->id_pemohon, ['class' => 'form-control', 'required', 'readonly']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nomor Surat Tanah:</label>
                  <div class="col-sm-10">
                      {!! Form::text('id_surat_tanah', $permohonan->id_surat_tanah, ['class' => 'form-control', 'required', 'readonly']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Organisasi Pemohon:</label>
                  <div class="col-sm-10">
                      {!! Form::select('jenis_pemohon', ['Organisasi' => 'Organisasi', 'Perorangan' => 'Perorangan'] , $permohonan->jenis_pemohon ,['class' => 'form-control', 'required', 'readonly']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jenis Permohonan:</label>
                  <div class="col-sm-10">
                      {!! Form::select('jenis_permohonan', ['Parkir' => 'Parkir', 'Terminal' => 'Terminal'] , $permohonan->jenis_permohonan ,['class' => 'form-control', 'required', 'readonly']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lokasi Tanah:</label>
                  <div class="col-sm-10">
                      {!! Form::text('lokasi_tanah', $permohonan->lokasi_tanah, ['class' => 'form-control', 'required', 'readonly']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Mulai Kontrak:</label>
                  <div class="col-sm-10">
                      {!! Form::input('date', 'tanggal_dibuat', $permohonan->tanggal_dibuat, ['class' => 'form-control', 'required', 'readonly']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Selesai Kontrak:</label>
                  <div class="col-sm-10">
                      {!! Form::input('date', 'tanggal_expired', $permohonan->tanggal_expired, ['class' => 'form-control', 'required', 'readonly']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lampiran Surat Izin Mendirikan Bangunan:</label>
                  <div class="col-sm-10">
                      <a href="{{URL::route('downloadLampiran',[$permohonan->lampiran])}}" class="btn btn-theme"}>Unduh Lampiran</a>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Biaya Retribusi:</label>
                  <div class="col-sm-10">
                    @if($permohonan->bukti_pembayaran == "")
                        {!! Form::text('biaya_retribusi', $permohonan->biaya_retribusi,  ['class' => 'form-control', 'required']) !!}
                    @else
                        {!! Form::text('biaya_retribusi', $permohonan->biaya_retribusi,  ['class' => 'form-control', 'required', 'readonly']) !!}
                    @endif
                  </div>
              </div>
              @if($permohonan->bukti_pembayaran != "")
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Bukti Pembayaran:</label>
                  <div class="col-sm-10">
                      <a href="{{URL::route('downloadBuktiPembayaran',[$permohonan->bukti_pembayaran])}}" class="btn btn-theme"}>Unduh Bukti Pembayaran</a>
                  </div>
              </div>
              @endif
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Status:</label>
                  <div class="col-sm-10">
                    @if($permohonan->bukti_pembayaran == "")
                        {!! Form::select('status_permohonan', array('Menunggu Validasi' => 'Menunggu Validasi','Menunggu Pembayaran Retribusi' => 'Menunggu Pembayaran Retribusi' , 'Selesai' => 'Selesai'), 
                        $permohonan->status_permohonan,  ['class' => 'form-control', 'required']) !!}
                    @else
                        {!! Form::select('status_permohonan', array('Menunggu Pembayaran Retribusi' => 'Menunggu Pembayaran Retribusi' , 'Selesai' => 'Selesai'), 
                        $permohonan->status_permohonan,  ['class' => 'form-control', 'required']) !!}
                    @endif
                  </div>
              </div>
              {!! Form::hidden('id', $permohonan->id) !!}
              {!! Form::submit('Update Permohonan', ['class' => 'btn btn-theme']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection