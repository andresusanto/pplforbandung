@extends('app')

@section('admin')
<ul class="nav navbar-nav">
    <li><a href="{{URL::route('admin/home')}}">Beranda</a></li>
    <li><a href="{{URL::route('admin/daftar_permohonan')}}">Daftar Permohonan</a></li>
    <li class="active"><a href="{{URL::route('admin/daftar_izin')}}">Daftar Perizinan</a></li>
    <li><a href="{{URL::route('admin/laporan')}}">Laporan</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
    <li><a href="#">welcome {{$admin->name}}</a></li>
    <li><a href="logout">Logout</a></li>
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
            <th>Status Periznan</th>
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
                    <div class="col-sm-6">
                    {!! Form::open(['route' => 'admin/aturPerizinan']) !!}
                        {!! Form::hidden('id', $perizinan->id) !!}
                        <button class="btn btn-sm btn-info">Atur Perizinan</button>
                    {!! Form::close() !!}
                    </div>
                        <div class="col-sm-6">
                            <button class="btn btn-sm btn-info" href="#" onclick="deleteFunction({{ $perizinan->id }}); return false();">Cabut Izin</button>
                        </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop

@section('script')
<script type="text/javascript">
    function deleteFunction(ID){ 
        if (confirm("Cabut izin ini?")){
            location.href='delete_perizinan/' + ID ;
        }
    }
</script>

@endsection