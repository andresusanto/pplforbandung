@extends('petugas.layout')
@section('content')
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Form Components</h3>

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Ubah Petugas {{$petugas->username}}</h4>
                    <form class="form-horizontal style-form" method="post" action="{{Request::url()}}/submit">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" >Username</label>
                            <div class="col-sm-4">
                                <input type="text" name="username" class="form-control" required="" value ="{{$petugas->username}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Password</label>
                            <div class="col-sm-4">
                                <input type="text" name="password" class="form-control" required="" value="{{$petugas->password}}">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-theme" value="Submit">
                    </form>
                </div>
            </div><!-- col-lg-12-->
        </div><!-- /row -->
    </section>
@endsection