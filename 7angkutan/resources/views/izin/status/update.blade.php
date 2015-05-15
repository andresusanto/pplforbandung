@extends('layouts.admin')

@section('content')
    
    {{-- URL-route: generate url berdasarkan daftar route supaya urlnya gak di-hardcode --}}
    <div class='col-xs-6'>
        <div class='form-header'>Ubah Jenis Izin Baru</div>
        <form action='{{URL::route("izin.status.update.submit",["id"=>$status->id])}}' method='post'>
            
            {{-- parameter kedua itu data yang bisa diakses di file form--}}
            @include('izin.status._form',['button'=>'Ubah','status'=>$status,'errors'=>$errors])

        </form>
    </div>
@stop
