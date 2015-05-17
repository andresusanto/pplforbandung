@extends('petugas.layout')
@section('content')
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i>Tabel Wajib Pajak</h4>
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <td>NIK</td>
                                <td>NPWPD</td>
                                <td>Nama</td>
                                <td>Alamat</td>
                                <td>Tempat Lahir</td>
                                <td>Tanggal Lahir</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wps as $wp)
                                <tr>
                                    <td>{{$wp->nik}}</td>
                                    <td>{{$wp->npwpd}}</td>
                                    <td>{{$wp->nama}}</td>
                                    <td>{{$wp->alamat}}</td>
                                    <td>{{$wp->tempat_lahir}}</td>
                                    <td>{{$wp->tanggal_lahir}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div><!-- /content-panel -->
            </div><!-- /col-lg-4 -->
        </div><!-- /row -->
    </section>
@endsection