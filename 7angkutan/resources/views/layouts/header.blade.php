<!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
            @if (Auth::check())
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            @endif
            <!--logo start-->
            <a href="#" class="logo"><b>Aplikasi Terkait Izin Angkutan</b></a>
            <!--logo end-->
                <ul class="nav top-menu pull-right">
                    <!-- settings start -->
                    @if (!Auth::guest())
                    <li>
                        <a href="{{route('logout')}}" class='logout'>
                            Logout
                        </a>
                        
                    </li>
                    @else
                    <li>
                      <a href='{{route('oauth.do_authorization')}}' class='logout'>
                        Login sebagai pengguna
                      </a>
                    </li>
                    <li>
                      <a href='{{route('login')}}' class='logout'>
                        Admin
                      </a>
                    </li>
                    @endif
                </ul>
        </header>
      <!--header end-->