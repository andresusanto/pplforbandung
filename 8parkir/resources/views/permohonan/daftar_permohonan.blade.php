@extends('app')

@section('guest')
<ul class="nav navbar-nav">
    <li><a href="{{URL::route('home')}}">Beranda</a></li>
    <li><a href="{{URL::route('form_permohonan')}}">Permohonan</a></li>
    <li class="active"><a href="{{URL::route('daftar_permohonan')}}">Daftar Permohonan</a></li>
</ul>
@stop

@section('content')
<br> <br> <br>
<table class="table">
    <thead>
      <tr>
        <th>ID Pemohon</th>
        <th>Lokasi Tanah</th>
        <th>Biaya Retribusi</th>
        <th>Kontrak</th>
        <th>Status Permohonan</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    	@foreach($permohonans as $permohonan)
    	<tr>
    		<td>{{ $permohonan->id_pemohon  }}</td>
    		<td>{{ $permohonan->lokasi_tanah  }}</td>
    		<td>{{ $permohonan->biaya_retribusi  }}</td>
    		<td>{{ $permohonan->tanggal_dibuat  }} hingga {{ $permohonan->tanggal_expired  }}</td>
    		<td>{{ $permohonan->status_permohonan  }}</td>
            @if($permohonan->status_permohonan == "Menunggu Validasi")
    		<td>
                {!! Form::open(['url' => 'editPermohonan']) !!}
                    {!! Form::hidden('id', $permohonan->id) !!}
                    <div class="col-sm-2">
                        <button class="glyphicon glyphicon-cog"></button>
                    </div>
                {!! Form::close() !!}
            </td>
            @endif
            @if($permohonan->status_permohonan == "Selesai Validasi")
            <td>
                {!! Form::open(['url' => 'bayarRetribusi']) !!}
                    {!! Form::hidden('id', $permohonan->id) !!}
                    <div class="col-sm-2">
                        <button class="glyphicon glyphicon-envelope"></button>
                    </div>
                {!! Form::close() !!}
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

@stop

@endsection