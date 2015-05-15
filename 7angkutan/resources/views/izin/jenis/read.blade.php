@extends('layouts.admin')

@section('content')
    <h3>{{$jenis_izin->nama}}</h3>
    <br>
    <h5>Daftar dokumen yang dibutuhkan</h5>
    <table class='table'>
        <tr>
            <th>Nama</th>
        </tr>

        @foreach($jenis_izin->templates as $template)
        <tr>
            <td>{{$template->nama}}</td>
        </tr>
        @endforeach

    </table>
@stop
