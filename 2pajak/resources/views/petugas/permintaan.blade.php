@extends('petugas.layout')
@section('content')
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i>Tabel Permintaan Wajib Pajak</h4>
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <td>NPWPD</td>
                                <td>Kategori</td>
                                <td>Status Permintaan</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permintaans as $permintaan)
                                <tr>
                                    <td>{{$permintaan->npwpd}}</td>
                                    <td>{{$permintaan->kategori_permintaan}}</td>
                                    <td>{{$permintaan->status_permintaan}}</td>
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