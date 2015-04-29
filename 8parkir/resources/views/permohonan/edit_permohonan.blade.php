@extends('app')

@section('guest')
<ul class="nav navbar-nav">
    <li><a href="home">Beranda</a></li>
    <li class="active"><a href="form_permohonan">Permohonan</a></li>
    <li><a href="daftar_permohonan">Daftar Permohonan</a></li>
</ul>
@stop

@section('content')
<br> <br> <br>
<div class="container">
    <div class="row">
        {!! Form::open(['url' => 'updatePermohonan', 'role' => 'form', 'files' => 'true']) !!}
            <div class="col-lg-6">
                <div class="well well-sm"><strong>Permohonan Izin</strong></div>    
                <div class="form-group">
                    {!! Form::label('email_pemohon', 'Alamat Email:')!!}
                    <div class="input-group">
                        {!! Form::text('email_pemohon', $permohonan->email_pemohon,  ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('id_pemohon', 'No ID Pemohon:') !!}
                    <div class="input-group">
                        {!! Form::text('id_pemohon', $permohonan->id_pemohon, ['class' => 'form-control', 'required', 'readonly']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('id_surat_tanah', 'No Surat Tanah:') !!}
                    <div class="input-group">
                        {!! Form::text('id_surat_tanah', $permohonan->id_surat_tanah, ['class' => 'form-control', 'required', 'readonly']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('jenis_pemohon', 'Organisasi Pemohon:') !!}
                    <div class="input-group">
                        {!! Form::select('jenis_pemohon', ['Organisasi' => 'Organisasi', 'Perorangan' => 'Perorangan'] , $permohonan->jenis_pemohon ,['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('jenis_permohonan', 'Jenis Permohonan:') !!}
                    <div class="input-group">
                        {!! Form::select('jenis_permohonan', ['Parkir' => 'Parkir', 'Terminal' => 'Terminal'] , $permohonan->jenis_permohonan ,['class' => 'form-control', 'required', 'readonly']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('lokasi_tanah', 'Lokasi Tanah:') !!}
                    <div class="input-group">
                        {!! Form::text('lokasi_tanah', $permohonan->lokasi_tanah, ['class' => 'form-control', 'required', 'readonly']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('tanggal_dibuat', 'Tanggal Mulai Kontrak:') !!}
                    <div class="input-group">
                        {!! Form::input('date', 'tanggal_dibuat', $permohonan->tanggal_dibuat, ['class' => 'form-control', 'required', 'readonly']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('tanggal_expired', 'Tanggal Selesai Kontrak:') !!}
                    <div class="input-group">
                        {!! Form::input('date', 'tanggal_expired', $permohonan->tanggal_expired, ['class' => 'form-control', 'required', 'readonly']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('lampiran', 'Lampiran:') !!}
                    <div class="input-group">
                        {!! Form::File('lampiran', ['class' => 'form-control', 'required']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                {!! Form::hidden('id', $permohonan->id) !!}
                {!! Form::submit('Entri Pengaduan', ['class' => 'btn btn-info pull-right']) !!}
                <button class="btn btn-info pull-left" href="#" onclick="deleteFunction({{ $permohonan->id }}); return false();">Hapus Pengaduan</button>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('script')
<script type="text/javascript">
    function deleteFunction(ID){ 
        if (confirm("Delete Post?")){
            location.href='delete_permohonan/' + ID ;
        }
    }
</script>

@endsection