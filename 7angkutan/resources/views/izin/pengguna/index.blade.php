@extends('layouts.pengguna')
@section('content')
<div class='row'>
	<div>
        @if (count($listIzin) == 0)
            <i>Daftar izin kosong</i><br/><br/>
        @endif
		<div class="panel panel-primary">
		  <div class="panel-heading"><h7>Daftar Izin Pengguna</h7></div>
		  	<table class='table table-hover' style='font-size:12px;'>
				<tr>
					<th>No. </th>
					<th>Nama </th>
					<th>Jenis </th>
				</tr>
                <?php $i = 0; ?>
                @foreach ($listIzin as $izin)
                <tr>
                    <td>{{++$i}}</td>
                    <td>
                    <a href= {{route('izin.pengguna.read',['id'=>$izin->id])}}>{{'Izin #'.$izin->id}}</a>
                    @if($izin->updated_by_admin)
                    	<span class="label label-primary">Diperbahurui</span>
                    @endif
                    @if($izin->validMulaiPerpanjangIzin())
                        <span class="label label-warning">Butuh perpanjangan</span>
                    @endif
                </td>
                    <td>{{$izin->jenisIzin->nama}}</td>
                </tr>
                @endforeach
			</table>
		</div>
	</div>
</div>
@stop
