@extends('app')

@section('admin')
<ul class="nav navbar-nav">
    <li><a href="{{URL::route('admin/home')}}">Beranda</a></li>
    <li><a href="{{URL::route('admin/daftar_permohonan')}}">Daftar perizinan</a></li>
    <li class="active"><a href="{{URL::route('admin/daftar_izin')}}">Daftar Perizinan</a></li>
    <li><a href="laporan">Laporan</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
    <li><a href="#">welcome {{$admin->name}}</a></li>
    <li><a href="logout">Logout</a></li>
</ul>
@stop

@section('content')
<br> <br> <br>
<div class="container">
    <div class="row">
        {!! Form::open(['route' => 'admin/updatePerizinan', 'role' => 'form', 'files' => 'true']) !!}
            <div class="col-lg-6">
                <div class="well well-sm"><strong>Atur Perizinan</strong></div>    
                <div class="form-group">
                    {!! Form::label('email_pemohon', 'Alamat Email:')!!}
                    <div class="input-group">
                        {!! Form::text('email_pemohon', $perizinan->email_pemohon,  ['class' => 'form-control', 'required', 'readonly']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('id_pemohon', 'No ID Pemohon:') !!}
                    <div class="input-group">
                        {!! Form::text('id_pemohon', $perizinan->id_pemohon, ['class' => 'form-control', 'required', 'readonly']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('id_surat_tanah', 'No Surat Tanah:') !!}
                    <div class="input-group">
                        {!! Form::text('id_surat_tanah', $perizinan->id_surat_tanah, ['class' => 'form-control', 'required', 'readonly']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('jenis_pemohon', 'Organisasi Pemohon:') !!}
                    <div class="input-group">
                        {!! Form::select('jenis_pemohon', ['Organisasi' => 'Organisasi', 'Perorangan' => 'Perorangan'] , $perizinan->jenis_pemohon ,['class' => 'form-control', 'required', 'readonly']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('jenis_perizinan', 'Jenis perizinan:') !!}
                    <div class="input-group">
                        {!! Form::select('jenis_perizinan', ['Parkir' => 'Parkir', 'Terminal' => 'Terminal'] , $perizinan->jenis_perizinan ,['class' => 'form-control', 'required', 'readonly']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('lokasi_tanah', 'Lokasi Tanah:') !!}
                    <div class="input-group">
                        {!! Form::text('lokasi_tanah', $perizinan->lokasi_tanah, ['class' => 'form-control', 'required', 'readonly']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('tanggal_dibuat', 'Tanggal Mulai Kontrak:') !!}
                    <div class="input-group">
                        {!! Form::input('date', 'tanggal_dibuat', $perizinan->tanggal_dibuat, ['class' => 'form-control', 'required', 'readonly']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('tanggal_expired', 'Tanggal Selesai Kontrak:') !!}
                    <div class="input-group">
                        {!! Form::input('date', 'tanggal_expired', $perizinan->tanggal_expired, ['class' => 'form-control', 'required', 'readonly']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('lampiran', 'Lampiran Surat Izin Mendirikan Bangunan:') !!}
                    <div class="input-group">
                        <a href="{{URL::route('downloadLampiran',[$perizinan->lampiran])}}" class="btn btn-info"}>Unduh Lampiran</a>
                    </div>
                </div>
                {!! Form::hidden('id', $perizinan->id) !!}
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Wajib Diisi</strong></div>
                {!! Form::submit('Update Perizinan', ['class' => 'btn btn-info pull-right']) !!}
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('biaya_retribusi', 'Biaya Retribusi:')!!}
                    <div class="input-group">
                        {!! Form::text('biaya_retribusi', $perizinan->biaya_retribusi,  ['class' => 'form-control', 'required', 'readonly']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                @if($perizinan->bukti_pembayaran != "")
                <div class="form-group">
                    {!! Form::label('bukti_pembayaran', 'Bukti Pembayaran:') !!}
                    <div class="input-group">
                        <a href="{{URL::route('downloadBuktiPembayaran',[$perizinan->bukti_pembayaran])}}" class="btn btn-info"}>Unduh Bukti Pembayaran</a>
                    </div>
                </div>
                @endif
                <div class="form-group">
                    {!! Form::label('status_perizinan', 'Status perizinan')!!}
                    <div class="input-group">
                        {!! Form::select('status_perizinan', array('Aktif' => 'aktif','Tidak Aktif' => 'tidak aktif'), 
                        $perizinan->status_perizinan,  ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        {!! Form::open(['route' => 'admin/generateSuratIzin']) !!}
        <div class="form-group">
             <div class="input-group">
                {!! Form::hidden('id', $perizinan->id) !!}
                <button class="btn btn-sm btn-info">Generate Surat Izin</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection