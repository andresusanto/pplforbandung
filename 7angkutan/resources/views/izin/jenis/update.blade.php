@extends('layouts.admin')

@section('content')
    
    {{-- URL-route: generate url berdasarkan daftar route supaya urlnya gak di-hardcode --}}
    <div class='col-md-6'>
        <div class='form-header'>Ubah Jenis Izin Baru</div>
        <form action='{{URL::route("izin.jenis.update.submit",["id"=>$jenis_izin->id])}}' method='post'>
            
            {{-- parameter kedua itu data yang bisa diakses di file form--}}
            @include('izin.jenis._form',['button'=>'Ubah','jenis_izin'=>$jenis_izin,'errors'=>$errors])

        </form>
    </div>
    <div class='clearfix'></div>
        <h5>Daftar dokumen yang dibutuhkan</h5>
        {{-- tambah template --}}
            <div class='form-group'>
                <select name='template_id' class='form-control' onchange="location = this.options[this.selectedIndex].value;">
                    <option selected disabled>Tambah template</option>
                    @foreach($list_template as $template)
                        <option value='{{route("izin.jenis.add_template",["id"=>$jenis_izin->id,"template_id"=>$template->id])}}'>{{$template->nama}}</option>
                    @endforeach
                </select>
            </div>
        <table class='table'>
            <tr>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>

            @foreach($jenis_izin->templates as $template)
            <tr>
                <td>{{$template->nama}}</td>
                <td>
                    <a href='{{route("izin.jenis.delete_template",["id"=>$jenis_izin->id,"template_id"=>$template->id])}}'><i class='glyphicon glyphicon-trash'></i></a>
                </td>
            </tr>
            @endforeach

        </table>



@stop
