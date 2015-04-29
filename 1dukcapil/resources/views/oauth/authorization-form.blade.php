@extends('app-penduduk')

@section('content')
<div class="account-container">
    <div class="content clearfix">
        <form action="" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h1>Otorisasi</h1>
            <div class="login-fields">
                <p>Situs {{ $redirect_uri }} ingin mengakses privasi data anda.</p>
            </div> <!-- /login-fields -->
            <div class="login-actions">
                <button class="button btn btn-success btn-large" name="approve" value="Approve">Setujui</button>
                <button class="button btn btn-failed btn-large" name="deny" value="Deny">Tolak</button>
            </div> <!-- .actions -->
        </form>
    </div> <!-- /content -->
</div> <!-- /account-container -->
@endsection