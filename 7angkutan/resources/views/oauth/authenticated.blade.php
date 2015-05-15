@extends('layouts.master')
@section('content')
    <div class='col-md-8 col-md-offset-2'>
        <h1>Selamat datang, {{Auth::user()->nama}}</h1>
        <div class='row' style='text-align:center'>
            <a href='{{route('izin.pengguna.index')}}' class='btn btn-success'>
                Masuk sebagai pengguna
            </a>
        </div>
        <br/><br/>
        <div class='row' style='text-align:center'>
            <a href='{{route('izin.admin.index')}}' class='btn btn-primary'>Masuk sebagai admin
            </a>
        </div>
    </div>
@endsection