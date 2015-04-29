@extends('app-admin');


@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 mb">
        <div class="content-panel">
            <div id="profile-gradient" style="margin-bottom: 2%">
                <h3>Data Akta Nikah</h3>
                <h6>Pencarian Data</h6>
            </div>
            <form action="{{ url('aktanikah/searchaktanikah') }}" method="post">
            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nomor Akta Nikah" name="no-akta"/>
                    <span class="input-group-btn">
                        <button class="btn btn-info" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </form>
                @if(isset($suami) && isset($istri))
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> {{ $suami->nama }} </h4>
                        <div class="form-horizontal tasi-form" method="get">
                            <div class="form-group">
                                <div class="col-sm-2">Kewarganegaraan</div>
                                <div class="col-sm-6">{{ sprintf('%010d', $suami->kewarganegaraan) }}</div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2">Nama Lengkap</div>
                                <div class="col-sm-6">{{ $suami->nama }}</div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2">Tempat Lahir</div>
                                <div class="col-sm-6">{{ $suami->tempatLahir }}</div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2">Waktu Lahir</div>
                                <div class="col-sm-6">{{ $suami->waktuLahir }}</div>
                            </div>
                        </div>
                    </div>
                @else
                    <p>Data tidak ditemukan</p>
                @endif
        </div><!--/content-panel -->
    </div><!--/col-md-4 -->
</div>
@endsection