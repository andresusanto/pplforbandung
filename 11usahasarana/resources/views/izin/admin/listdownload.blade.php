<br>
<table class ="table table-hover table-striped text-center" style="border-style: solid; text-align:center;">
	<tr style="border-style: solid; text-align: center">
		<th style="text-align: center; font-weight: bold">Download Dokumen</th>
	</tr>
    <?php $arrays = array(); ?>
	@foreach($downloadLink as $jns => $link)
	<tr>
		<td><a href = "{{route('downloadfile',array('filename'=>$link))}}"> {{ $jns }} </a></td>
		<?php array_push($arrays,$link); ?>
	</tr>
	@endforeach
</table>

<table class ="table table-hover table-striped text-center" style="border-style: solid; text-align:center;">
	<tr style="border-style: solid; text-align: center">
		<th style="text-align: center; font-weight: bold">Download Semua Dokumen</th>
	</tr>
	<tr>
	    <td>
	        <?php $arrayss = serialize($arrays);?>
	        <a href="{{route('downloadZip',['filess'=>$arrayss])}}">Download</a>
	    </td>
	</tr>
</table>

<table class ="table table-hover table-striped text-center" style="border-style: solid; text-align: center">
    <tr style="border-style: solid; text-align: center">
        <th style="text-align: center; font-weight: bold">Jenis Dokumen</th>
        <th style="text-align: center; font-weight: bold">Status</th>
    </tr>

	@foreach($statusIzin as $jns => $status)
	<tr>
	    <td>{{$jns}}</td>
	    <td>
	        @if($status === 1)
	            {{"Tidak ada masalah"}}
	        @else
	            {{"Bermasalah"}}
	        @endif

	    </td>
	</tr>
	@endforeach
</table>

<a href = "{{url ('Admin/izin/'.$back)}}"> Back </a> </td>