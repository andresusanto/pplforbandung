@extends('wp.layout_user')
@section('title') Daftar Permintaan - Rumah Pajak @stop

@section('extracss')
<style type="text/css">
.widget-header{
    height: auto;
}

.text-center{
    text-align: center;
}
</style>
@section('content')
<?php
  function to_rupiah($cur)
  {
    return "Rp".number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $cur)),2, ',', '.');
  }
?>

<div class="row">
        <div class="span12">
          <div class="widget widget-table">
            <div class="widget-header widget-table"> <i class="icon-hand-up"></i>
              <h3> Daftar Permintaan</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="tabbable">
                <ul class="nav nav-tabs">
                 <li class="active"><a href="#keberatan-pajak" data-toggle="tab">Keberatan Pajak</a></li>
                 <li><a href="#pencabutan-wajib-pajak" data-toggle="tab">Pencabutan Wajib Pajak</a></li>
                 <li><a href="#pengurangan-sanksi-administrasi" data-toggle="tab">Pengurangan Sanksi Administrasi</a></li>
                </ul>
                <br>

                <div class="tab-content">
                    <div class="tab-pane active" id="keberatan-pajak">
                       <div class="text-center"><h3>Keberatan Pajak</h3></div>
                            <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Jenis pajak</th>
                                  <th>Tahun pajak</th>
                                  <th>Harga pajak seharusnya</th>
                                  <th>Alasan pengaduan</th>
                                  <th>Status Permintaan</th>
                                </tr>
                              </thead>
                              <tbody>
                               @if(isset($keberatanPajak))
                                 <?php
                                 $i = 1;
                                 foreach($keberatanPajak as $kp)
                                 {
                                    echo '<tr>';
                                      echo '<td>';
                                        echo $i;
                                      echo '</td>';
                                      echo '<td>';
                                        echo $kp['jenis_pajak'];
                                      echo '</td>';
                                      echo '<td>';
                                        echo $kp['tahun_pajak'];
                                      echo '</td>';
                                      echo '<td>';
                                        echo to_rupiah($kp['harga_pajak_seharusnya']);
                                      echo '</td>';
                                      echo '<td>';
                                        echo $kp['alasan_pengaduan'];
                                      echo '</td>';
                                      echo '<td>';
                                        echo $kp['status_permintaan'];
                                      echo '</td>';
                                    echo '</tr>';
                                    $i++;
                                 }
                                 ?>
                               @endif
                              </tbody>
                            </table>
                    </div>
                    <div class="tab-pane" id="pencabutan-wajib-pajak">
                        <div class="text-center"><h3>Pencabutan Wajib Pajak</h3></div>
                            <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th><b />No</th>
                                  <th><b />Alasan Penghapusan</th>
                                  <th><b />Status Permintaan</th>
                                </tr>
                              </thead>
                              <tbody>
                                 @if(isset($keberatanPajak))
                                 <?php
                                 $i = 1;
                                 foreach($pencabutanWP as $pw)
                                 {
                                    echo '<tr>';
                                      echo '<td>';
                                        echo $i;
                                      echo '</td>';
                                      echo '<td>';
                                        echo $pw['alasan_penghapusan'];
                                      echo '</td>';
                                      echo '<td>';
                                        echo $pw['status_permintaan'];
                                      echo '</td>';
                                    echo '</tr>';
                                    $i++;
                                 }
                                 ?>
                               @endif
                              </tbody>
                            </table>
                    </div>
                    <div class="tab-pane" id="pengurangan-sanksi-administrasi">
                         <div class="text-center"><h3>Pengurangan Sanksi Administrasi</h3></div>
                            <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th><b />No</td>
                                  <th>Jenis Pajak</th>
                                  <th>Jenis Sanksi</th>
                                  <th>Jumlah Sanksi</th>
                                  <th>Alasan Permohonan</th>
                                  <th>Status Permintaan</th>
                                </tr>
                              </thead>
                              <tbody>
                                @if(isset($keberatanPajak))
                                 <?php
                                 $i = 1;
                                 foreach($penguranganSanksi as $ps)
                                 {
                                    echo '<tr>';
                                      echo '<td>';
                                        echo $i;
                                      echo '</td>';
                                      echo '<td>';
                                        echo $ps['jenis_pajak'];
                                      echo '</td>';
                                      echo '<td>';
                                        echo $ps['jenis_sanksi'];
                                      echo '</td>';
                                      echo '<td>';
                                        echo to_rupiah($ps['jumlah_sanksi']);
                                      echo '</td>';
                                      echo '<td>';
                                        echo $ps['alasan_permohonan'];
                                      echo '</td>';
                                      echo '<td>';
                                        echo $ps['status_permintaan'];
                                      echo '</td>';
                                    echo '</tr>';
                                    $i++;
                                 }
                                 ?>
                               @endif
                              </tbody>
                            </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 -->
      </div>
      <!-- /row -->
@stop