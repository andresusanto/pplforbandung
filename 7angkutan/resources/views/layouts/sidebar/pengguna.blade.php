<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
<!--sidebar start-->

<aside>
  <div id="sidebar"  class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">
      
          <p class="centered"><a href="#"><img src="{{asset('/atia/img/bandung-logo.png')}}" width="60"></a></p>
          <h5 class="centered">{{Auth::user()->nama}}</h5>
          <li class='sub-menu'>
            <a href='{{route('izin.pengguna.create')}}'>
              <i class='fa fa-plus'></i>
              <span>Ajukan Izin</span>
            </a>
          </li>
          <li class="sub-menu">
              <a href="{{route('izin.pengguna.index')}}">
                  <i class="fa fa-tasks"></i>
                  <span>Daftar Permohonan Izin</span>
              </a>
          </li>
      </ul>
      <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->