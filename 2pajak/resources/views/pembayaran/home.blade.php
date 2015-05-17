@extends('wp.layout_user')
@section('title') Pembayaran Pajak - Rumah Pajak @stop
@section('content')
  @if(isset($message))
    <h4>$message</h4>
  @endif

<div class="row">
    <div class="span12">
        <div class="widget">
            <div class="widget-header"> <i class="icon-money"></i>
                <h3> Pembayaran</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <form action="{{route('pembayaran_proses')}}" method='post' id='form_pembayaran'>
                    <div class='form-group'>
                      <label for='npwpd'>NPWPD : {{ $npwpd }}
                      </label>
                      <input type="hidden" name="npwpd" id="npwpd" value="{{ $npwpd }}">
                    </div>
                    <div class="form-group">
                      <label for="jenis_pajak">Jenis pajak : </label>
                      <select class='form-control' foorm='form_pengajuan'>
                        <option value='Pajak Penghasilan'>Pajak Penghasilan</option>
                        <option value='Pajak Restoran'>Pajak Restoran</option>
                        <option value='Pajak Hiburan'>Pajak Hiburan</option>
                        <option value='Pajak Hotel'>Pajak Hotel</option>
                        <option value='Pajak Bumi & Bangunan'>Pajak Bumi & Bangunan</option>
                      </select>
                    </div>
                    <div class='form-group'>
                      <label for='masa_pajak'>Masa Pajak :</label>
                      <input type="text" name='masa_pajak' id='masa_pajak' required placeholder='dalam tahun'>
                    </div>
                    <div class='form-group'>
                      <label for='nomor_stp'>Nomor STP :</label>
                      <input type='text' name='nomor_stp' id='nomor_stp' required>
                    </div>
                    <div class='form-group'>
                      <label for='jumlah_pembayaran'>Jumlah Pembayaran :</label>
                      <input type='text' name='jumlah_pembayaran' id='jumlah_pembayaran' required>
                    </div>
                    <div class='form-group'>
                      <label for='status_pembayaran'></label>
                      <select class='form-control' name='status_pembayaran' id='status_pembayaran' form='form_pembayaran'>
                        <option value='lunas' selected>Lunas</option>
                        <option value='tertunggak'>Tertunggak</option>
                      </select>
                    </div>
                    <div class='form-group'>
                      <label for='tanggal_pembayaran'>Tanggal Pembayaran :</label>
                      <input type='date' name='tanggal_pembayaran' id='tanggal_pembayaran' required placeholder='yyyy-mm-dd'>
                    </div>
                    <div class='form-group'>
                      <input class='btn-primary' type='submit' value='Submit'>
                    </div>
                    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                  </form>
            </div>
        </div>
        <!-- /widget -->
    </div>
    <!-- /span6 -->
</div>
<!-- /row -->
@stop