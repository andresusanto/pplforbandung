@extends('app')

@section('admin')
<ul class="nav navbar-nav">
    <li><a href="{{URL::route('admin/home')}}">Beranda</a></li>
    <li class="active"><a href="{{URL::route('admin/daftar_permohonan')}}">Daftar Permohonan</a></li>
    <li><a href="{{URL::route('admin/daftar_izin')}}">Daftar Perizinan</a></li>
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
        		<td>
                    <div class="col-sm-4">
        			{!! Form::open(['url' => 'admin/editPermohonan']) !!}
                        {!! Form::hidden('id', $permohonan->id) !!}
    	    			<button class="btn btn-sm btn-info">Validasi</button>
                    {!! Form::close() !!}
                    </div>
    	    			<div class="col-sm-4">
    	    				<button class="btn btn-sm btn-info" href="#" onclick="deleteFunction({{ $permohonan->id }}); return false();">Hapus</button>
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
        if (confirm("Delete Post?")){
            location.href='delete_permohonan/' + ID ;
        }
    }
</script>

@endsection