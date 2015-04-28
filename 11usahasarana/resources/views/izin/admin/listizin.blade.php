@if ( !$izin->count() )
	Tidak ada izin yang masuk
@else
<table class ="table table-hover table-striped text-center" style="border-style: solid; text-align:center;">
	<tr style="border-style: solid;">
		<td>ID</td>
		<td>Nama Pemohon</td>
		<td>Perusahaan</td>
		<td>Tanggal Masuk</td>
		<td>Berlaku Sampai</td>
		<td>Status Izin</td>
		<td>File Pengajuan Izin</td>
		<td>Hapus</td>
	</tr>
	@foreach($izin as $i)
	<tr>
		<td style="vertical-align: middle">{{ $i->id }}</td>
		<td style="vertical-align: middle">{{ $i->NamaPemohon }}</td>
		<td style="vertical-align: middle">{{$i->NamaPerusahaan}}</td>
		<td style="vertical-align: middle">
			<?php
				$source = $i->TanggalMasuk;
				$date = new DateTime($source);
				echo $date->format('d-m-Y');
			?>
		</td>
		<td style="vertical-align: middle">
		    {{$i->BerlakuSampai}}
		</td>
		<td>
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					{{ $i->StatusIzin }} <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><a href= "{{ url('Admin/izin/'.$jenis.'/'.$i->id.'/status/Diterima') }}">Diterima</a></li>
					<li><a href= "{{ url('Admin/izin/'.$jenis.'/'.$i->id.'/status/Diproses') }}">Diproses</a></li>
					<li class="divider"></li>
					<li><a href="{{ url('Admin/izin/'.$jenis.'/'.$i->id.'/status/Disetujui') }}">Disetujui</a></li>
					<li><a href="{{ url('Admin/izin/'.$jenis.'/'.$i->id.'/status/Ditolak') }}">Ditolak</a></li>
				</ul>
			</div>
		</td>
		<td style="vertical-align: middle"><a href ="{{url('/Admin/izin/'.$jenis.'/'.$i->id.'/Download') }}">Download </a></td>
		<td>
            <form method="get" onclick="return validate({{$i->id}});" action="#">
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
		</td>
	</tr>
	@endforeach
	</table>

	<script>
	    function validate(id)
	    {
	        if (confirm('Apakah anda yakin ingin menghapus izin dengan ID= '+id+'?'))
	        {
                window.location.href = "{{route('deleteIzin',['id'=>$i->id,'jenisizin'=>$i->JenisIzin])}}";
	        }
	        return false;
	    }
	</script>

@endif