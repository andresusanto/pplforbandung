@extends('app-admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb">
            <div class="content-panel">
                <div id="profile-gradient">
                    <h3>Data Akta Kematian</h3>
                    <h6>Pencarian Data</h6>
                </div>
                <form action="{{ url('aktakematian') }}" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Nomor Akta Kematian" name="s"/>
                    <span class="input-group-btn">
                        <button class="btn btn-info" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                    </div>
                </form>
            </div>
        </div>


        @if(isset($aktaKematian))
            @if($aktaKematian != null)
                <div class="col-lg-12 col-md-12 col-sm-12 mb">
                    <div class="content-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Akta Kematian {{ $penduduk->nama }} </h4>

                        <div class="form-panel">
                            <div class="form-horizontal tasi-form">
                                <div class="form-group">
                                    <div class="col-sm-2">Nomor Akta Kematian</div>
                                    <div class="col-sm-6">{{ $aktaKematian->id }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">Nomor Induk Kependudukan</div>
                                    <div class="col-sm-6"><a
                                                href="{{ url('penduduk/lihat/' . $penduduk->id) }}">{{ $penduduk->id }}</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">Tempat Kematian</div>
                                    <div class="col-sm-6">{{ $aktaKematian->tempatMati }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">Waktu Kematian</div>
                                    <div class="col-sm-6">{{ $aktaKematian->waktuMati }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">Waktu Cetak</div>
                                    <div class="col-sm-6">{{ $aktaKematian->waktuCetak }}</div>
                                </div>
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