@extends('wp.layout_user')
@section('title') Pencabutan WP - Rumah Pajak @stop
@section('content')
@if (isset($message))
	    <h4>{{ $message }}</h4>
	    <br />
@endif

<div class="row">
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-hand-up"></i>
              <h3> Pengajuan Pencabutan NPWPD</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <form action="{{url('/permintaan/prosesPermintaan')}}" method='post' id='form_pengajuan'>
              	<div class="form-group">
              		<label for="npwpd">NPWPD : {{ $npwpd }}</label>
              		<input type="hidden" name="npwpd" id="npwpd" value="{{ $npwpd }}">
              	</div>
              	<div class="form-group">
              		<label for="kategori_permintaan">Kategori permintaan : {{ $kategori_permintaan }}</label>
              		<input type="hidden" name="kategori_permintaan" id="kategori_permintaan" value="{{ $kategori_permintaan }}">
              	</div>
              	<div class="form-group">
              		<label for="alasan_penghapusan">Alasan Penghapusan :</label>
              		<textarea class="form-control" rows="5" name="alasan_penghapusan" id="alasan_penghapusan" placeholder="Masukkan alasan penghapusan di sini..." required></textarea>
              	</div>
              	<div class="form-group">
              		<input class="btn primary" type="submit" value="Submit">
              	</div>
              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
              </form>
            </div>
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 -->
      </div>
      <!-- /row -->

	
@endsection