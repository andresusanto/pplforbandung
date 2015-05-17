<h1>Formulir Izin</h1>
<p>Nomor perizinan anda: {{ $id }}</p>
<h2>
@if ($izinair->status == "APPROVED")
<font color="green">APPROVED</font>
@elseif ($izinair->status == "REJECTED")
<font color="red">REJECTED</font>
@else
PENDING
@endif
</h2>
<table>
	<tr>
		<td>Nama Pemohon </td>
		<td>: {{ $nama }}</td>
	</tr>
	<tr>
		<td>Lokasi </td>
		<td>: {{ $lahan }}</td>
	</tr>
	<tr>
		<td>Kategori Izin</td>
		<td>: {{ $kategori }}</td>
	</tr>
	<tr>
		<td>Deskripsi </td>
		<td>: {{ $izinair->deskripsi }}</td>
	</tr>
	<tr>
		<td>Status </td>
		<td>: {{ $izinair->status }}</td>
	</tr>
	<tr>
		<td>Berlaku Dari </td>
		<td>: {{$izinair->mulai_berlaku}}</td>
	</tr>
	<tr>
		<td>Berlaku Hingga </td>
		<td>: {{$izinair->berlaku_hingga}}</td>
	</tr>
</table>
	