<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"></p>
              	  <h5 class="centered">Petugas Pajak</h5>
              	  	
                  <li class="mt">
                      <a href="{{route('petugas_home') }}">
                          <i class="fa fa-home"></i>
                          <span>Home</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-users"></i>
                          <span>Wajib Pajak</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{url('/petugas/pendaftar')}}">Daftar Calon WP</a></li>
                          <li><a  href="{{url('/petugas/permintaan')}}">Daftar Permintaan WP</a></li>
                          <li><a  href="{{url('/petugas/wajib_pajak')}}">Daftar Wajib Pajak</a></li>
                          <li><a href="{{url('/petugas/pembuatanSTPD')}}">Pembuatan STPD</a> </li>
                          <li><a href="#">Pengecekan Status SSPD</a> </li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-file-text"></i>
                          <span>Laporan</span>
                      </a>
                 </li>
                  <li class="sub-menu">
                      <a href="{{url('/petugas/edit')}}" >
                          <i class="fa fa-users"></i>
                          <span>Petugas Pajak</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      