<br>
<table class ="table table-hover table-striped text-center" style="border-style: solid; text-align:center;">
	<tr style="border-style: solid;">
		<td>Jenis Dokumen</td>
	</tr>
	@foreach($downloadLink as $jns => $link)
	<tr>
		<td><a href = "{{route('downloadfile',array('filename'=>$link))}}"> {{ $jns }} </a></td>
	</tr>
	@endforeach
</table>	

<a href = "{{url ('Admin/izin/'.$jenis)}}"> Back </a> </td>