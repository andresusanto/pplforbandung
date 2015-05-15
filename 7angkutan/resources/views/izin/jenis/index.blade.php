@extends('layouts.admin')

@section('content')
<div>
    {{-- generate url berdasarkan route --}}
    <a href='{{URL::route("izin.jenis.create")}}' class='btn btn-primary'>Tambah Jenis Izin</a>
</div>
<br/>
@if (count($list_jenis_izin) > 0)
    <div class='panel panel-primary'>
        <table class='table table-hover'>
            <tr>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>

            @foreach($list_jenis_izin as $jenis_izin)
            <tr>
                <td>{{$jenis_izin->nama}}</td>
                <td>
                    <a href='{{URL::route("izin.jenis.read",["id"=>$jenis_izin->id])}}'><i class='glyphicon glyphicon-eye-open'></i></a>
                    <a href='{{URL::route("izin.jenis.update",["id"=>$jenis_izin->id])}}'><i class='glyphicon glyphicon-pencil'></i></a> 
                    <a href='{{URL::route("izin.jenis.delete",["id"=>$jenis_izin->id])}}' onclick='return confirm("Hapus?")'><i class='glyphicon glyphicon-remove'></i></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    
@else
    Data kosong
@endif
@stop
