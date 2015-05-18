@extends('petugas.layout')
@section('content')
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i>Formulir Pembuatan STPD</h4>
                    <form class="form-horizontal" action="{{url('petugas/pembuatanSTPD')}}" method='post' id='form_pembuatanSSPD'>
                        <div class="control-group">
                            <label class="control-label" for="inputType">Nama Wajib Pajak : </label>
                            <input name="namaWP" id="namaWP">
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputType">NPWP : </label>
                            <input name="NPWP" id="NPWP">
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputType">Anggaran Pajak : </label>
                            <input name="AnggaranPajak" id="AnggaranPajak" required>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputType">Telah dibayar : </label>
                            <input name="TelahDibayar" id="TelahDibayar" required>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputType">Denda : </label>
                            <input name="Denda" id="Denda" required>
                        </div>
                        <div class="control-group">
                            <input class="btn primary" type="submit" value="Submit">
                        </div>
                        <input TYPE = "hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div><!-- /content-panel -->
            </div><!-- /col-lg-4 -->
        </div><!-- /row -->
    </section>
@endsection