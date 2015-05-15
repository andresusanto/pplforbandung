@extends('layouts.admin')
@section('content')
<div class='col-md-6'>
    <form action='{{route("izin.template.create")}}' method='post'>
        <div class='form-header'>Buat Template Baru</div>
        @include('izin.template._form',['template'=>$template,'button'=>'Buat'])
    </form>
</div>
@endsection
