@extends('app-admin')

@section('stylesheet')
    <style>
        #templatePanelAnggota {
            display: none;
        }
    </style>
@endsection

@section('content')
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
            <form method="post" action="{{url('kartukeluarga/buat')}}" id="kkForm">
                <input type="hidden" name="_token" value="{{ csrf_token()}}">

                <div class="content-panel">
                    <div id="profile-gradient">
                        <h3>Kartu Keluarga</h3>
                        <h6>Formulir Pembuatan</h6>
                    </div>
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Detil</h4>

                        <div class="form-horizontal tasi-form" method="get">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nomor Induk Kependudukan Kepala Keluarga</label>

                                <div class="col-sm-6">
                                    <input class="form-control" id="kepalaKeluarga"
                                           name="kepalaKeluarga" required>
                                </div>
                                <label class="col-sm-2 control-label">Jumlah Anggota Keluarga</label>

                                <div class="col-sm-2">
                                    <input type="number" min="0" class="form-control" id="jumlahAnggotaKeluarga"
                                           required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Alamat</label>

                                <div class="col-sm-6">
                                    <input class="form-control" id="alamat" name="alamat" required>
                                </div>
                                <label class="col-sm-2 control-label">Kodepos</label>

                                <div class="col-sm-2">
                                    <input class="form-control" id="kodepos" name="kodepos" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kode-Nama Provinsi</label>

                                <div class="col-sm-4">
                                    <input class="form-control" id="provinsi" name="provinsi" required>
                                </div>
                                <label class="col-sm-2 control-label">Kode-Nama Kabupatan/Kota</label>

                                <div class="col-sm-4">
                                    <input class="form-control" id="kota" name="kota" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kode-Nama Kecamatan</label>

                                <div class="col-sm-4">
                                    <input class="form-control" id="kecamatan" name="kecamatan" required>
                                </div>
                                <label class="col-sm-2 control-label">Kode-Nama Kelurahan</label>

                                <div class="col-sm-4">
                                    <input class="form-control" id="kelurahan" name="kelurahan" required>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-theme03" id="lanjut">Lanjut</button>
                    </div>
                </div>
                <!--/content-panel -->
                <div class="content-panel" id="panelGroupAnggota" style="display:none">
                    <div id="profile-gradient">
                        <h3>Anggota Penduduk</h3>
                    </div>
                    <div class="form-panel" id="templatePanelAnggota">
                        <h4 class="mb" id="ithPenduduk"><i class="fa fa-angle-right"></i> Anggota</h4>
                        <hr>
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Detil</h4>

                        <div class="form-horizontal tasi-form" method="get">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Lengkap</label>

                                <div class="col-sm-4">
                                    <input class="form-control" name="nama[]">
                                </div>
                                <label class="col-sm-1 control-label">Jenis Kelamin</label>

                                <div class="col-sm-2">
                                    <select class="form-control" name="jenisKelamin[]">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <label class="col-sm-1 control-label">Golongan Darah</label>

                                <div class="col-sm-2">
                                    <select class="form-control" name="golonganDarah[]">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tempat Lahir</label>

                                <div class="col-sm-2">
                                    <input class="form-control" name="tempatLahir[]">
                                </div>
                                <label class="col-sm-2 control-label">Tanggal Lahir</label>

                                <div class="col-sm-2">
                                    <input type="date" class="form-control" name="tanggalLahir[]">
                                </div>
                                <label class="col-sm-2 control-label">Akta Lahir</label>

                                <div class="col-sm-2">
                                    <input class="form-control" name="kodeAktaLahir[]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nomor Induk Kependudukan Ayah</label>

                                <div class="col-sm-4">
                                    <input class="form-control" name="nikAyah[]">
                                </div>
                                <label class="col-sm-2 control-label">Nomor Induk Kependudukan Ibu </label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="nikIbu[]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kelainan Fisik</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Status</h4>

                        <div class="form-horizontal tasi-form" method="get">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pendidikan Terakhir</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="pendidikan[]">
                                </div>
                                <label class="col-sm-2 control-label">Pekerjaan</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="pekerjaan[]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status Perkawinan</label>

                                <div class="col-sm-4">
                                    <select class="form-control" name="statusPernikahan[]">
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Cerai">Cerai</option>
                                    </select>
                                </div>

                                <label class="col-sm-2 control-label">Status Anggota</label>

                                <div class="col-sm-4">
                                    <select class="form-control" name="status[]">
                                        <option value="Kepala Keluarga">Kepala Keluarga</option>
                                        <option value="Istri">Istri</option>
                                        <option value="Anak">Anak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-theme03">Lanjut</button>
                </div>
                <!--/content-panel -->
            </form>
        </div>
        <!--/col-md-4 -->
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            var template = $('#templatePanelAnggota');
            var panelGroup = $('#panelGroupAnggota');
            $('#lanjut').click(function () {
                // show it for the first time?
                panelGroup.show();
                // remove existing children, except template
                panelGroup.children('.form-panel:not(#templatePanelAnggota)').remove();
                // generate panels according to jumlahAnggotaKeluarga
                var n = $('#jumlahAnggotaKeluarga').val();
                for (i = 1; i <= n; ++i) {
                    var copy = template.clone();

//                    copy.find('.collapse');
//                    copy.removeClass('in');
                    copy.removeAttr('id');
                    copy.find('#ithPenduduk').append(' ' + i);

                    // add required to all inputs
                    copy.find('input, select').attr("required", "");

                    // show and append to the last child
                    copy.show();
                    panelGroup.children('.form-panel').last().after(copy);
                }
                // re-hide the template?
                template.hide();
            });
            $('#kkForm').submit(function () {
                template.find('[name]').removeAttr('name');
            });
        });

    </script>
@endsection