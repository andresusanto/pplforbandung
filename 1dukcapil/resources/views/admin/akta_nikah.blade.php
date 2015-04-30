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
            @if(!isset($exist))
                @if(isset($suami) && isset($istri))
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> NO Akta:{{ sprintf('%010d', $no_akta) }} </h4>
                        <div class="form-horizontal tasi-form">
                            <div class="form-group">
                                <div class="col-sm-2">Nama Lengkap Suami:</div>
                                <div class="col-sm-4">{{ $suami->nama }}</div>
                                <div class="col-sm-2">Nama Lengkap Istri:</div>
                                <div class="col-sm-4">{{ $istri->nama }}</div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2">Agama Suami:</div>
                                <div class="col-sm-4">{{ $suami->agama }}</div>
                                <div class="col-sm-2">Agama Istri:</div>
                                <div class="col-sm-4">{{ $istri->agama }}</div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2">Kewarganegaraan Suami:</div>
                                <div class="col-sm-4">{{ $suami->kewarganegaraan }}</div>
                                <div class="col-sm-2">Kewarganegaraan Istri:</div>
                                <div class="col-sm-4">{{ $istri->kewarganegaraan }}</div>
                            </div>
                        </div>
                    </div>
                @else
                    <p>Data tidak ditemukan</p>
                @endif
            @else
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> NO Akta:{{ sprintf('%010d', $no_akta) }} </h4>
                    <div class="form-horizontal tasi-form">
                        <div class="form-group">
                            <div class="col-sm-2">Nama Lengkap Suami:</div>
                            <div class="col-sm-4">{{ $suami->nama }}</div>
                            <div class="col-sm-2">Nama Lengkap Istri:</div>
                            <div class="col-sm-4">{{ $istri->nama }}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">Agama Suami:</div>
                            <div class="col-sm-4">{{ $suami->agama }}</div>
                            <div class="col-sm-2">Agama Istri:</div>
                            <div class="col-sm-4">{{ $istri->agama }}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">Kewarganegaraan Suami:</div>
                            <div class="col-sm-4">{{ $suami->kewarganegaraan }}</div>
                            <div class="col-sm-2">Kewarganegaraan Istri:</div>
                            <div class="col-sm-4">{{ $istri->kewarganegaraan }}</div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
                <script>
                  $(document).ready(function(){
                    alert('Akta Sudah Ada pada Database');
                  });
                </script>
            @endif
        </div><!--/content-panel -->
    </div><!--/col-md-4 -->
</div>
@endsection