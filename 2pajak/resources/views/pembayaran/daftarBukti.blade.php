@extends('wp.layout_user')
@section('title') Pembayaran Pajak - Rumah Pajak @stop
@section('content')

<div class="row">
    <div class="span12">
        <div class="widget widget-table">
            <div class="widget-header"> <i class="icon-money"></i>
                <h3> Daftar Pembayaran Pajak</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class='row'>
                  <div class='span12'>
                    <caption>
                      <p>NPWPD : {{ $npwpd }}</p>
                    </caption>
                    <table class='table table-striped table-bordered'>
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Jenis Pajak</th>
                        <th>Nomor STP</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Buka</th>
                      </tr>
                      </thead>
                      <tbody>
                        @if (isset($daftarBukti))
                          <?php
                            $i = 1;
                            foreach ($daftarBukti as $daf)
                            {
                              echo '<tr>';
                                echo '<td>';
                                  echo $i;
                                echo '</td>';
                                echo '<td>';
                                  echo $daf['jenis_pajak'];
                                echo '</td>';
                                echo '<td>';
                                  echo $daf['nomor_stp'];
                                echo '</td>';
                                echo '<td>';
                                  echo $daf['tanggal_pembayaran'];
                                echo '</td>';
                                echo '<td>';
                                  $id = $daf['id'];
                                  echo '<a href=\'' . url("/wp/pembayaran/bukti/$id") . '\'>Buka</a>';
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
        <!-- /widget -->
    </div>
    <!-- /span6 -->
</div>
<!-- /row -->
<br />

@stop