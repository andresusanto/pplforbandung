@extends('app-admin')

@section('content')
    <form action="{{ url('/aktakematian/buat') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mb">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Ada kesalahan pada masukan Anda.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="list-style: initial">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="content-panel">
                    <div id="profile-gradient">
                        <h3>Akta Kematian</h3>
                        <h6>Formulir Pembuatan</h6>
                    </div>
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Data Penduduk</h4>
                    <div class="form-panel">
                        <div class="form-horizontal tasi-form" method="get">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nomor Induk Kependudukan</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="idPenduduk" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Lengkap</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="namaLengkap" required>
                                </div>
                                <label class="col-sm-2 control-label">Jenis Kelamin</label>

                                <div class="col-sm-4">
                                    <select class="form-control" name="jenisKelamin" required>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tempat Lahir</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="tempatLahir" required>
                                </div>
                                <label class="col-sm-2 control-label">Tanggal Lahir</label>

                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="tanggalLahir" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="mb"><i class="fa fa-angle-right"></i> Detil Wafat</h4>

                    <div class="form-panel">
                        <div class="form-horizontal tasi-form" method="get">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tempat Kematian</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="tempatMati" required>
                                </div>
                                <label class="col-sm-2 control-label">Tanggal Kematian</label>

                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="waktuMati" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-theme03">Kirim</button>
                    </div>
                </div>
                <!--/content-panel -->
            </div>
        </div>
    </form>
@endsection