<?php
use App\Models\Status;
?>
@extends('layouts.admin')
@section('content')
<div class='row'>
	<div>
        @if (count($listIzin) == 0)
            <i>Daftar izin kosong</i><br/><br/>
        @endif
			<div class="panel panel-primary">
			  <div class="panel-heading"><h7>Izin</h7></div>
			  	<table class='table table-hover' style='font-size:12px;'>
					<tr>
						<th>No. </th>
						<th>Nama </th>
						<th>Jenis </th>
                        <th>Pemohon</th>
                        <th>Aksi</th>
					</tr>
                    <?php $i = 0; ?>
                    @foreach ($listIzin as $izin)
                    <?php if ($izin->getCurrentStatusId() == Status::CANCELLED) continue;?>
                    <tr>
                        <td>{{++$i}}</td>
                        <td>
                        <a href= {{route('izin.admin.read',['id'=>$izin->id])}}>{{'Izin #'.$izin->id}}</a>
                        @if($izin->updated_by_pengguna)
                        	<span class="label label-primary">Diperbahurui</span>
                        @endif
                        @if($izin->spam)
                            <span class='label label-danger'>Spam</span>
                        @endif
                    </td>
                        <td>{{$izin->jenisIzin->nama}}</td>
                        <td>{{$izin->pengguna->nama}}</td>
                        <td>
                            @if (!$izin->spam)
                            <a href='{{route('izin.admin.mark_spam',['id'=>$izin->id])}}' class='label label-danger'>Tandai spam</a>
                            @else
                            <a href='{{route('izin.admin.mark_spam',['id'=>$izin->id])}}' class='label label-success'>Bukan spam</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
				</table>
			</div>

		</div>
</div>
@endsection