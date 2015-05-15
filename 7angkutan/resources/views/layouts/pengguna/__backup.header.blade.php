<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="{{route('izin.pengguna.index')}}"><img src="{{asset('/atia/img/bandung-logo.png')}}" width="60">Aplikasi Terkait Izin Angkutan</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          @if (Auth::guest())
          @else
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> {{Auth::user()->nama}} <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Logout</a></li>
            </ul>
          </li>
          @endif
          
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar" style='margin-bottom:0px;'>
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li @if (Route::is('izin.pengguna.create')) class="active" @endif><a href="{{route('izin.pengguna.create')}}"><i class="icon-plus"></i><span>Ajukan Izin</span> </a> </li>
        <li @if (Route::is('izin.pengguna.index')) class="active" @endif><a href="{{route('izin.pengguna.index')}}"><i class="icon-list-alt"></i><span>Daftar Permohonan Izin</span> </a> </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->