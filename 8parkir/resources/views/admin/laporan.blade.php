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

<li class="sub-menu">
  <a href="{{URL::route('admin/daftar_izin')}}" >
      <i class="fa fa-list"></i>
      <span>Daftar Perizinan</span>
  </a>
</li>
<li class="active" class="sub-menu">
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
          <h4 class="mb"><i class="fa fa-angle-right"></i> Laporan</h4>
          {!! Form::open(['url' => 'admin/generateLaporan', 'role' => 'form', 'class' => 'form-horizontal style-form']) !!}
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Awal Laporan</label>
                  <div class="col-sm-10">
                      {!! Form::input('date', 'tanggal_awal', null, ['class' => 'form-control', 'required']) !!}
                      <span class="help-block">Tanggal awal untuk dibuat laporan.</span>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Akhir Laporan</label>
                  <div class="col-sm-10">
                      {!! Form::input('date', 'tanggal_akhir', null, ['class' => 'form-control', 'required']) !!}
                      <span class="help-block">Batas tanggal pembuatan laporan.</span>
                  </div>
              </div>
              {!! Form::submit('Generate Laporan', ['class' => 'btn btn-theme']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection