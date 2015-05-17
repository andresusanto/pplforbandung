@extends('petugas.layout')
@section('content')
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i>Tabel Petugas Pajak</h4>
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <td>Username</td>
                                <td>Password</td>
                                <td>Opsi</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($petugass as $petugas)
                                <tr>
                                    <td>{{$petugas->username}}</td>
                                    <td>{{$petugas->password}}</td>
                                    <td><a href="{{Request::url()}}/ubah/{{$petugas->id}}"><input type="button" value="Edit"> </a> <a href="{{Request::url()}}/hapus/{{$petugas->id}}"><input type="button" value="Hapus"> </a> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-theme"  onclick="location.href='{{Request::url()}}/tambah'">Tambah</button>
                    </section>
                </div><!-- /content-panel -->
            </div><!-- /col-lg-4 -->
        </div><!-- /row -->
    </section>
@endsection