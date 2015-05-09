<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<style>
		table {
		    width:100%;
		}
		table, th, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}
		th, td {
		    padding: 5px;
		    text-align: left;
		}
		table#t01 tr:nth-child(even) {
		    background-color: #eee;
		}
		table#t01 tr:nth-child(odd) {
		   background-color:#fff;
		}
		table#t01 th	{
		    background-color: black;
		    color: white;
		}
	</style>
</head>
<body>
<br> <br> <br>
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
                <td>{{ $permohonan->id_pemohon }}</td>
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
    <br> <br>
    <div> <strong> Jumlah Pemohon Berjenis Organisasi = {{$sjpemohon}} </strong> </div> <br>
    <div> <strong> Jumlah Pemohon Berjenis Perorangan = {{count($permohonans) - $sjpemohon}} </strong> </div> <br>
    <div> <strong> Jumlah Permohonan Berjenis Parkir = {{$sjpermohonan}} </strong> </div> <br>
    <div> <strong> Jumlah Permohonan Berjenis Terminal = {{count($permohonans) - $sjpermohonan}} </strong> </div> <br>
    <div> <strong> Jumlah Permohonan = {{count($permohonans)}} </strong> </div> <br>
</body>
</html>

