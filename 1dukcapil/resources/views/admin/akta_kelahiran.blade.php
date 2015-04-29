@extends('app-admin')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 mb">
        <div class="content-panel">
            <div id="profile-gradient">
                <h3>Data Kelahiran</h3>
                <h6>Pencarian Data</h6>
            </div>
            <form action="{{ url('aktakelahiran') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nomor Akta Kelahiran" name="s"/>
                    <span class="input-group-btn">
                        <button class="btn btn-info" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            @if(isset($aktalahir))
                @if(isset($penduduk))
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> {{ $penduduk->nama }} </h4>
                        <div class="form-horizontal tasi-form" method="get">
                            <div class="form-group">
                                <div class="col-sm-2">Nomor Akta Lahir</div>
                                <div class="col-sm-6">{{ sprintf('%010d', $aktalahir->id) }}</div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2">Nama Lengkap</div>
                                <div class="col-sm-6">{{ $penduduk->nama }}</div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2">Tempat Lahir</div>
                                <div class="col-sm-6">{{ $penduduk->tempatLahir }}</div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2">Waktu Lahir</div>
                                <div class="col-sm-6">{{ $penduduk->waktuLahir }}</div>
                            </div>
                        </div>
                    </div>
                @else
                    <p>Data tidak ditemukan</p>
                @endif
            @endif
        </div><!--/content-panel -->
    </div><!--/col-md-4 -->
</div>
@endsection