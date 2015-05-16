@extends('app')

@if(Session::has('user'))
    @section('guest')
    <ul class="nav navbar-nav">
        <li><a href="{{URL::route('home')}}">Beranda</a></li>
        <li><a href="{{URL::route('form_permohonan')}}">Ajukan permohonan</a></li>
        <li><a href="{{URL::route('daftar_permohonan')}}">Daftar permohonan</a></li>
        <li class="active"><a href="{{URL::route('daftar_izin')}}">Daftar Izin</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Selamat Datang {{Session::get('user')->nama_penduduk}}</a></li>
        <li><a href="{{URL::route('logoutsso')}}">Logout</a></li>
    </ul>
    @stop

    @section('content')
    <br> <br> <br>
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th>ID Pemohon</th>
                <th>Lokasi Tanah</th>
                <th>Biaya Retribusi</th>
                <th>Kontrak</th>
                <th>Status perizinan</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            	@foreach($perizinans as $perizinan)
            	<tr>
            		<td>{{ $perizinan->id_pemohon  }}</td>
            		<td>{{ $perizinan->lokasi_tanah  }}</td>
            		<td>{{ $perizinan->biaya_retribusi  }}</td>
            		<td>{{ $perizinan->tanggal_dibuat  }} hingga {{ $perizinan->tanggal_expired  }}</td>
            		<td>{{ $perizinan->status_perizinan  }}</td>
            		<td>
                        <button class="btn btn-sm btn-info">Coming Soon!</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @stop
@else
    {{Redirect::route('home')}}
@endif

@endsection