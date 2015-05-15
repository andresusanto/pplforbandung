@extends('layouts.admin')

@section('content')
    
    {{-- URL-route: generate url berdasarkan daftar route supaya urlnya gak di-hardcode --}}
    <div class='col-xs-6'>
        <div class='form-header'>Buat Jenis Izin Baru</div>
        <form action='{{URL::route("izin.status.create.submit")}}' method='post'>
            
            {{-- parameter kedua itu data yang bisa diakses di file form--}}
            @include('izin.status._form',['button'=>'Buat','errors'=>$errors,'status'=>$status])

        </form>
    </div>

@stop
