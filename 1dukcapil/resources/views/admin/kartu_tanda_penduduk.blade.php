@extends('app-admin')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 mb">
        <div class="content-panel">
            <div id="profile-gradient">
                <h3>Data Kartu Tanda Penduduk</h3>
                <h6>Pencarian Data</h6>
            </div>
            <form action="{{ url('kartutandapenduduk') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nomor Kartu Tanda Penduduk" name="s"/>
                    <span class="input-group-btn">
                        <button class="btn btn-info" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            @if(isset($ktp))
            @if(isset($penduduk))
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> {{ $penduduk->nama }} </h4>
                <div class="form-horizontal tasi-form" method="get">
                    <div class="form-group">
                        <div class="col-sm-2">Nomor Induk Kependudukan</div>
                        <div class="col-sm-6">{{ $ktp->id }}</div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">Nama Lengkap</div>
                        <div class="col-sm-6">{{ $penduduk->nama }}</div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">Jenis Kelamin</div>
                        <div class="col-sm-4">{{ $penduduk->jenisKelamin }}</div>
                        <div class="col-sm-2">Golongan Darah</div>
                        <div class="col-sm-4">{{ $penduduk->golonganDarah }}</div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">Tempat Lahir/Tanggal Lahir</div>
                        <div class="col-sm-10">{{ $penduduk->tempatLahir }}, {{ $penduduk->waktuLahir }}</div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">Alamat</div>
                        <div class="col-sm-10">{{ $penduduk->alamat }}</div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">Agama</div>
                        <div class="col-sm-4">{{ $penduduk->agama }}</div>
                        <div class="col-sm-2">Status Kawin</div>
                        <div class="col-sm-4">{{ $penduduk->statusPernikahan }}</div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">Pekerjaan</div>
                        <div class="col-sm-10">{{ $penduduk->pekerjaan }}</div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">Berlaku Hingga</div>
                        <div class="col-sm-10">{{ $ktp->waktuBerlaku }}</div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">Kewarnegaraan</div>
                        <div class="col-sm-10">{{ $penduduk->kewarganegaraan }}</div>
                    </div>
                </div>
            </div>
            @else
            <p>Data tidak ditemukan</p>
            @endif
            @endif
            @if(Session::has('password'))
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Sandi</h4>
                  </div>
                  <div class="modal-body">
                    <h1>{{ Session::get('password') }}</h1>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            @endif
        </div><!--/content-panel -->
    </div><!--/col-md-4 -->
</div>
@endsection

@section('script')
@if(Session::has('password'))
<script type="text/javascript">
    $(document).ready(function() {
        $('#myModal').modal('toggle');
    });
</script>
@endif
@endsection