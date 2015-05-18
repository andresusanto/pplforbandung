@extends('wp.layout_user')
@section('title') Daftar Pajak Lunas @stop
@section('content')

<div class="row">
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-money"></i>
              <h3> Daftar Pajak Lunas</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              @if (count($pajaks))
              <table border="1" style="width:100%;">
                      <tr>
                          <td>Kategori Pajak</td>
                          <td>Aset Kepemilikian</td>
                          <td>Tanggal Pelunasan</td>
                      </tr>
                      @foreach($pajaks as $pajak)
                          @if($pajak->status_pelunasan == 1)
                              <tr>
                                  <td>{{$pajak->kategori}}</td>
                                  <td>{{$pajak->aset_kepemilikan}}</td>
                                  <td>{{$pajak->tanggal}}</td>
                              </tr>
                          @endif
                      @endforeach
                  </table>
                  <br><br><br>
                  <h2>Daftar Pajak Tertunggak</h2>
                  <table border="1" style="width:100%;">
                      <tr>
                          <td>Kategori Pajak</td>
                          <td>Aset Kepemilikian</td>
                          <td>Jumlah Pajak</td>
                          <td>Batas Pembayaran</td>
                      </tr>
                      @foreach($pajaks as $pajak)
                          @if($pajak->status_pelunasan == 0)
                              <tr>
                                  <td>{{$pajak->kategori}}</td>
                                  <td>{{$pajak->aset_kepemilikan}}</td>
                                  <td>{{$pajak ->jumlah_pajak}}</td>
                                  <td>{{$pajak ->tanggal}}</td>
                              </tr>
                          @endif
                      @endforeach

                  </table>
                  @else
                  <p>Tidak ada data ditemukan</p>
                  @endif
            </div>
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 -->
      </div>
      <!-- /row -->
@endsection