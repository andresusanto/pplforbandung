@extends('app')

@section('admin')
<ul class="nav navbar-nav">
	<li><a href="home">Beranda</a></li>
	<li><a href="daftar_permohonan">Daftar Permohonan</a></li>
	<li class="active"><a href="laporan">Laporan</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
	<li><a href="#">welcome {{$admin->name}}</a></li>
	<li><a href="logout">Logout</a></li>
</ul>
@stop

@section('content')
<br> <br> <br>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Laporan</div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Pemohon</th>
                            <th>No. Surat Tanah</th>
                            <th>Jenis Pemohon</th>
                            <th>Jenis Permohonan</th>
                            <th>Lokasi Tanah</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permohonans as $permohonan)
                        <tr>
                            <th scope="row">{{ $permohonan->id_pemohon }}</th>
                            <td>{{ $permohonan->id_surat_tanah }}</td>
                            <td>{{ $permohonan->jenis_pemohon }}</td>
                            <td>{{ $permohonan->jenis_permohonan }}</td>
                            <td>{{ $permohonan->lokasi_tanah }}</td>
                            <td>{{ $permohonan->tanggal_dibuat}}</td>
                            <td>{{ $permohonan->tanggal_expired}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div> <strong> Jumlah Pemohon Berjenis Organisasi = {{$sjpemohon}} </strong> </div> <br>
                <div> <strong> Jumlah Pemohon Berjenis Perorangan = {{count($permohonans) - $sjpemohon}} </strong> </div> <br>
                <div> <strong> Jumlah Permohonan Berjenis Parkir = {{$sjpermohonan}} </strong> </div> <br>
                <div> <strong> Jumlah Permohonan Berjenis Terminal = {{count($permohonans) - $sjpermohonan}} </strong> </div> <br>
                <div> <strong> Jumlah Permohonan = {{count($permohonans)}} </strong> </div> <br>
                {!! Form::open(['route' => 'admin/generatePDF', 'role' => 'form']) !!}
                    {!! Form::hidden('tanggal_awal', $tanggal_awal) !!}
                    {!! Form::hidden('tanggal_akhir', $tanggal_akhir) !!}
                    {!! Form::hidden('sjpemohon', $sjpemohon) !!}
                    {!! Form::hidden('sjpermohonan', $sjpermohonan) !!}
                    {!! Form::submit('Generate PDF', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection