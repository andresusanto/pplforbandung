@extends('petugas.layout')
@section('content')
    <section class="wrapper">
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i>Tabel Pendaftar Wajib Pajak</h4>
                <section id="unseen">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr>
                            <td>NIK</td>
                            <td>Nama</td>
                            <td>Tanggal Lahir</td>
                            <td>Tempat Lahir</td>
                            <td>Alamat</td>
                            <td>Pilihan/Status</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pendaftars as $pendaftar)
                            <tr>
                                <td>{{$pendaftar->nik}}</td>
                                <td>{{$pendaftar->nama}}</td>
                                <td>{{$pendaftar->tempat_lahir}}</td>
                                <td>{{$pendaftar->tanggal_lahir}}</td>
                                <td>{{$pendaftar->alamat}}</td>
                                @if($pendaftar->status_pendaftaran == -1)
                                    <td><a href="{{Request::url()}}/setuju/{{$pendaftar->id}}"><input type="button" value="Setuju"> </a> <a href="{{Request::url()}}/tolak/{{$pendaftar->id}}"><input type="button" value="Tolak"> </a> </td>
                                @elseif($pendaftar->status_pendaftaran == 0)
                                    <td>Ditolak</td>
                                @elseif($pendaftar->status_pendaftaran == 1)
                                    <td>Disetujui</td>
                                @endif
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