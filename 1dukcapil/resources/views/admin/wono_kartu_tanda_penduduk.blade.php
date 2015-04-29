@extends('app-admin')

@section('content')
    <div class="well">
        <h3>Kartu Tanda Penduduk</h3>
        <div class="panel panel-primary cari-penduduk">
            <div class="panel-heading">
                <h3 class="panel-title">Masukan Nomor ID Kependudukan</h3></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-4">
                        <form id="cari-penduduk">
                            <div class="form-search search-only">
                                <i class="search-icon fa fa-search"></i>
                                <input class="form-control search-query" type="text" id="idPend" placeholder="Nomor Induk Kependudukan">
                            </div>
                        </form>
                    </div>
                    <div class="loading col-xs-2" style="display: none">
                        <img src="{{ asset('assets/img/loading.gif') }}" alt=""/>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-success data-penduduk" style="display: none">
            <div class="panel-heading">
                <h3 class="panel-title">Data Kependudukan</h3></div>
            <div class="panel-body">
                <div class="col-md-9">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="col-xs-4">NIK</div>
                            <div class="col-xs-8" id="nik">: </div>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="col-xs-4">Nama Lengkap</div>
                            <div class="col-xs-8" id="nama">: </div>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="col-xs-4">Tempat dan Tanggal Lahir</div>
                            <div class="col-xs-8" id="ttl">: </div>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="col-xs-4">Alamat</div>
                            <div class="col-xs-8" id="alamat">: </div>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="col-xs-4">Kelurahan/Desa</div>
                            <div class="col-xs-8">: </div>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="col-xs-4">Kecamatan</div>
                            <div class="col-xs-8">: </div>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="col-xs-4">Kabupaten/Kota</div>
                            <div class="col-xs-8">: </div>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="col-xs-4">Agama</div>
                            <div class="col-xs-8" id="agama">: </div>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="col-xs-4">Status Perkawinan</div>
                            <div class="col-xs-8" id="statusPernikahan">: </div>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="col-xs-4">Pekerjaan</div>
                            <div class="col-xs-8" id="pekerjaan">: </div>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="col-xs-4">Kewarganegaraan</div>
                            <div class="col-xs-8" id="kewarganegaraan">: </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="{{ asset('/assets/img/avatar.png') }}" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="modal-footer data-penduduk" style="display: none">
            <button type="button" class="btn btn-success">Cetak Kartu Tanda Penduduk</button>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $("#cari-penduduk").submit(function() {
            var idPend = $("#idPend").val();
            $.ajax({
                dataType: "json",
                url: "{{ url('penduduk') }}/"+idPend,
                success: function(data){
                    var bulan = [
                        "Januari",
                        "Februari",
                        "Maret",
                        "April",
                        "Mei",
                        "Juni",
                        "Juli",
                        "Agustus",
                        "September",
                        "Oktober",
                        "November",
                        "Desember"
                    ];
                    var waktuLahir = new Date(data.waktuLahir.substring(0,10));
                    var D = waktuLahir.getDate();
                    var M = bulan[waktuLahir.getMonth()];
                    var Y = waktuLahir.getFullYear();
                    $("#nik").html(": "+data.id);
                    $("#nama").html(": "+data.nama);
                    $("#ttl").html(": "+data.tempatLahir+", "+D+" "+M+" "+Y);
                    $("#agama").html(": "+data.agama);
                    $("#statusPerkawinan").html(": "+data.statusPerkawinan);
                    $("#pekerjaan").html(": "+data.pekerjaan);
                    $("#kewarganegaraan").html(": "+data.kewarganegaraan.toUpperCase());
                    $(".cari-penduduk").hide();
                    $(".data-penduduk").show();
                },
                beforeSend: function(){
                    $(".loading").show();
                }
            });
            return false;
        });
    });
</script>
@endsection