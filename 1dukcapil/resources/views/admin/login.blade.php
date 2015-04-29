@extends('app-admin')

@section('content')

    <form class="form-login" action="" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <h2 class="form-login-heading">Masuk sebagai Admin</h2>

        <div class="login-wrap" style="margin-bottom:180px">
            <input type="text" class="form-control" placeholder="Username" name="username" autofocus>
            <br>
            <input type="password" class="form-control" placeholder="Password" name="password">
            <br>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
            {{--<label class="checkbox">--}}
            {{--<span class="pull-right">--}}
            {{--<a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>--}}
            {{----}}
            {{--</span>--}}
            {{--</label>--}}
            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Masuk
            </button>
        </div>

    </form>
@endsection
