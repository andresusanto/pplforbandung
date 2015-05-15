@extends('layouts.pengguna')

@section('content')
    {{-- URL-route: generate url berdasarkan daftar route supaya urlnya gak di-hardcode --}}
    <div class='col-xs-6'>
        <div class='form-header'>Ajukan Izin</div>
        <form action='{{route("izin.pengguna.create.submit")}}' method='post'>
            {{-- parameter kedua itu data yang bisa diakses di file form--}}
            @include('izin.pengguna._form',['button'=>'Buat','errors'=>$errors,'izin'=>$izin])

        </form>
    </div>

@stop
