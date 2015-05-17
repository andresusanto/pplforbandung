@extends('admin.app')

@section('sidebar')

<li class="mt">
  <a href="{{URL::route('admin/home')}}">
      <i class="fa fa-dashboard"></i>
      <span>Beranda</span>
  </a>
</li>

<li class="sub-menu">
  <a href="{{URL::route('admin/daftar_permohonan')}}" >
      <i class="fa fa-list"></i>
      <span>Daftar Permohonan</span>
  </a>
</li>

<li class="active" class="sub-menu">
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
          <h4 class="mb"><i class="fa fa-angle-right"></i> Atur Perizinan</h4>
          {!! Form::open(['route' => 'admin/updatePerizinan', 'role' => 'form', 'files' => 'true', 'class' => 'form-horizontal style-form']) !!}
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Alamat Email:</label>
                  <div class="col-sm-10">
                      {!! Form::text('email_pemohon', $perizinan->email_pemohon,  ['class' => 'form-control', 'required', 'readonly']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">ID Pemohon:</label>
                  <div class="col-sm-10">
                      {!! Form::text('id_pemohon', $perizinan->id_pemohon, ['class' => 'form-control', 'required', 'readonly']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nomor Surat Tanah:</label>
                  <div class="col-sm-10">
                      {!! Form::text('id_surat_tanah', $perizinan->id_surat_tanah, ['class' => 'form-control', 'required', 'readonly']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Organisasi Pemohon:</label>
                  <div class="col-sm-10">
                      {!! Form::select('jenis_pemohon', ['Organisasi' => 'Organisasi', 'Perorangan' => 'Perorangan'] , $perizinan->jenis_pemohon ,['class' => 'form-control', 'required', 'readonly']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jenis Permohonan:</label>
                  <div class="col-sm-10">
                      {!! Form::select('jenis_perizinan', ['Parkir' => 'Parkir', 'Terminal' => 'Terminal'] , $perizinan->jenis_permohonan ,['class' => 'form-control', 'required', 'readonly']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lokasi Tanah:</label>
                  <div class="col-sm-10">
                      {!! Form::text('lokasi_tanah', $perizinan->lokasi_tanah, ['class' => 'form-control', 'required', 'readonly']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Mulai Kontrak:</label>
                  <div class="col-sm-10">
                      {!! Form::input('date', 'tanggal_dibuat', $perizinan->tanggal_dibuat, ['class' => 'form-control', 'required', 'readonly']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Selesai Kontrak:</label>
                  <div class="col-sm-10">
                      {!! Form::input('date', 'tanggal_expired', $perizinan->tanggal_expired, ['class' => 'form-control', 'required', 'readonly']) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lampiran Surat Izin Mendirikan Bangunan:</label>
                  <div class="col-sm-10">
                      <a href="{{URL::route('downloadLampiran',[$perizinan->lampiran])}}" class="btn btn-theme"}>Unduh Lampiran</a>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Biaya Retribusi:</label>
                  <div class="col-sm-10">
                    @if($perizinan->status_perizinan == 'Ingin Perpanjang Kontrak')
                        {!! Form::text('biaya_retribusi', null ,  ['class' => 'form-control', 'required', 'placeholder' => 'masukan biaya retribusi untuk perpanjangan kontrak baru']) !!}
                    @else
                        {!! Form::text('biaya_retribusi', $perizinan->biaya_retribusi,  ['class' => 'form-control', 'required', 'readonly']) !!}
                    @endif
                  </div>
              </div>
              @if($perizinan->bukti_pembayaran != "")
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Bukti Pembayaran:</label>
                  <div class="col-sm-10">
                      <a href="{{URL::route('downloadBuktiPembayaran',[$perizinan->bukti_pembayaran])}}" class="btn btn-theme"}>Unduh Bukti Pembayaran</a>
                  </div>
              </div>
              @endif
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Status:</label>
                  <div class="col-sm-10">
                    @if($perizinan->status_perizinan == 'Ingin Perpanjang Kontrak')
                        {!! Form::select('status_perizinan', array('Ingin Perpanjang Kontrak' => 'Ingin Perpanjang Kontrak',
                        'Menunggu Pembayaran' => 'Menunggu Pembayaran'), 
                        $perizinan->status_perizinan,  ['class' => 'form-control', 'required']) !!}
                    @elseif($perizinan->status_perizinan == 'Selesai Membayar')
                        {!! Form::select('status_perizinan', array('Selesai Membayar' => 'Selesai Membayar' ,'Aktif' => 'Aktif','Tidak Aktif' => 'Tidak Aktif'), 
                        $perizinan->status_perizinan,  ['class' => 'form-control', 'required']) !!}
                    @else
                        {!! Form::select('status_perizinan', array('Aktif' => 'Aktif','Tidak Aktif' => 'Tidak Aktif'), 
                        $perizinan->status_perizinan,  ['class' => 'form-control', 'required']) !!}
                    @endif
                  </div>
              </div>
              {!! Form::hidden('id', $perizinan->id) !!}
              {!! Form::submit('Update Perizinan', ['class' => 'btn btn-theme']) !!}
            {!! Form::close() !!}
            {!! Form::open(['route' => 'admin/generateSuratIzin', 'role' => 'form', 'class' => 'form-horizontal style-form']) !!}
            <br>
            <div class="form-group">
                {!! Form::hidden('id', $perizinan->id) !!}
                <div class="col-sm-10">
                    <button class="btn btn-sm btn-theme">Generate Surat Izin</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection