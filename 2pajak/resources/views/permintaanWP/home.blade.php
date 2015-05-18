@extends('wp.layout_user')
@section('title') Pengajuan Permintaan - Rumah Pajak @stop
@section('content')
<div class="row">
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-home"></i>
              <h3> Pengajuan Permintaan Wajib Pajak</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <p>Silahkan pilih salah satu jenis pengajuan di bawah ini :</p> 
              <ul style="list-style:none;">
                <li>
                  <a href="{{url('/permintaan/pencabutan')}}">Pencabutan NPWPD</a>
                </li>
                <li>
                  <a href="{{url('/permintaan/pengurangan-sanksi')}}">Pengurangan sanksi administrasi</a>
                </li>
                <li>
                  <a href="{{url('/permintaan/keberatan')}}">Keberatan pajak</a>
                </li>
                <li>
                    <a href="{{ url('/permintaan/pembuatanSSPD') }}">Pembuatan SSPD</a>
                </li>
              </ul>
              <p>Klik tautan di bawah ini untuk melihat daftar permintaan yang pernah diajukan</p>
              <ul style="list-style:none;">
                <li>
                  <a href="{{url('/permintaan/daftarPermintaan')}}">Daftar Permintaan</a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 

@stop