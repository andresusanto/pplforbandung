@extends('app-admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb">
            <div class="content-panel">
                <div id="profile-gradient">
                    <h3>Data Kartu Keluarga</h3>
                    <h6>Pencarian Data</h6>
                </div>
                <form action="{{ url('kartukeluarga') }}" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Nomor Kartu Keluarga" name="s"/>
                    <span class="input-group-btn">
                        <button class="btn btn-info" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                    </div>
                </form>
            </div>
        </div>


        @if(isset($kartuKeluarga))
            @if($kartuKeluarga != null)
                <div class="col-lg-12 col-md-12 col-sm-12 mb">
                    <div class="content-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Kartu Keluarga {{ $kartuKeluarga->id }} </h4>

                        <div class="form-panel">
                            <div class="form-horizontal tasi-form">
                                <div class="form-group">
                                    <div class="col-sm-2">Kepala Keluarga</div>
                                    <div class="col-sm-6"><a
                                                href="{{ url('penduduk/lihat/' . $kepalaKeluarga->id) }}">{{ $kepalaKeluarga->nama }}</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">Alamat</div>
                                    <div class="col-sm-6">{{ $kartuKeluarga->alamat }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">Kelurahan</div>
                                    <div class="col-sm-6">{{ $kartuKeluarga->kelurahan }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">Kecamatan</div>
                                    <div class="col-sm-6">{{ $kartuKeluarga->kecamatan }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">Kota</div>
                                    <div class="col-sm-6">{{ $kartuKeluarga->kota }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">Provinsi</div>
                                    <div class="col-sm-6">{{ $kartuKeluarga->provinsi }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">Kodepos</div>
                                    <div class="col-sm-6">{{ $kartuKeluarga->kodepos }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">Waktu Cetak</div>
                                    <div class="col-sm-6">{{ $kartuKeluarga->waktuCetak }}</div>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Anggota Keluarga </h4>

                        <div class="form-panel">
                            <div class="form-horizontal tasi-form">
                                <?php $i = 0; ?>
                                @foreach ($anggotaKeluarga as $anggota)
                                    <div class="form-group">
                                        <div class="col-sm-2">Anggota {{ ++$i }}</div>
                                        <div class="col-sm-6"><a
                                                    href="{{ url('penduduk/lihat/' . $anggota->id) }}">{{ $anggota->nama }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @elseif (isset($id))
                <div class="col-lg-12 col-md-12 col-sm-12 mb">
                    <div class="content-panel">
                        <div class="form-panel">
                            <div class="form-horizontal tasi-form" method="get">
                                <h4>Data tidak ditemukan</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @elseif (isset($id))
            <div class="col-lg-12 col-md-12 col-sm-12 mb">
                <div class="content-panel">
                    <div class="form-panel">
                        <div class="form-horizontal tasi-form" method="get">
                            <h4>Data tidak ditemukan</h4>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection