@extends('layouts.admin')

@section('content')
<div>
    {{-- generate url berdasarkan route --}}
    <a href='{{URL::route("izin.status.create")}}' class='btn btn-primary'>Tambah Status Izin</a>
</div>
<br/>
@if (count($list_status) > 0)
    <div class='panel panel-primary'>
        <table class='table table-hover'>
            <tr>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>

            @foreach($list_status as $status)
            <tr>
                <td>{{$status->nama}}</td>
                <td>
                    <a href='{{URL::route("izin.status.read",["id"=>$status->id])}}'><i class='glyphicon glyphicon-eye-open'></i></a>
                    <a href='{{URL::route("izin.status.update",["id"=>$status->id])}}'><i class='glyphicon glyphicon-pencil'></i></a> 
                    <a href='{{URL::route("izin.status.delete",["id"=>$status->id])}}' onclick='return confirm("Hapus?")'><i class='glyphicon glyphicon-remove'></i></a>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
@else
    Data kosong
@endif
@stop
