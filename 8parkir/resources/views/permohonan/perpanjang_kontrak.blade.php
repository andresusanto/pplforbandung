@extends('app')
@if(Session::has('user'))
    @section('guest')
        <ul class="nav navbar-nav">
                <li><a href="{{URL::route('home')}}">Beranda</a></li>
                <li><a href="{{URL::route('form_permohonan')}}">Ajukan Permohonan</a></li>
                <li><a href="{{URL::route('daftar_permohonan')}}">Daftar Permohonan</a></li>
                <li><a href="{{URL::route('daftar_izin')}}">Daftar Izin</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Selamat Datang {{Session::get('user')->nama_penduduk}}</a></li>
                <li><a href="{{URL::route('logoutsso')}}">Logout</a></li>
            </ul>
    @stop

    @section('content')
    <br> <br> <br>
    <div class="container">
        <div class="row">
            {!! Form::open(['route' => 'updatePerpanjangKontrak', 'role' => 'form', 'files' => 'true']) !!}
                <div class="col-lg-6">
                    <div class="well well-sm"><strong>Perpanjang Kontrak</strong></div>    
                    <div class="form-group">
                        {!! Form::label('tanggal_akhir', 'Tanggal Berakhir Perpanjangan Kontrak:') !!}
                        <div class="input-group">
                            {!! Form::input('date', 'tanggal_expired', null, ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                    </div>
                    {!! Form::hidden('id', $perizinan->id) !!}
                    {!! Form::submit('Kirim', ['class' => 'btn btn-info pull-right']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@else
    {{Redirect::route('home')}}
@endif
@endsection