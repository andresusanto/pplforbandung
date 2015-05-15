@extends('templateDinas')


@section('content')
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><img src="{{asset('img/ui-sam.jpg')}}" class="img-circle" width="60"></p>
                  <h5 class="centered"><?php echo Session::get('name')?></h5>
                    
                  <li class="mt">
                      <a  href="{{url('dinas')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="{{url('laporan')}}" >
                          <i class="fa fa-file"></i>
                          <span>Laporan</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-list-alt"></i>
                          <span>Penjadwalan</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{url('schedule')}}">Petugas</a></li>
                          <li><a  href="{{url('isiSarana')}}">Pengangkutan</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a class="active" href="{{url('viewSchedule')}}" >
                          <i class="fa fa-calendar"></i>
                          <span>Jadwal</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- MAIN CONTENT -->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> Jadwal</h3>
            <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Jadwal Petugas</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-calendar"></i> Tanggal</th>
                                  <th><i class="fa fa-bell"></i> Durasi</th>
                                  <th><i class="fa fa-user"></i> Petugas</th>
                                  <th><i class="fa fa-map-marker"></i> Lokasi</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach ($Jadwal as $jadwal)
                                <tr>
                                    @if ($jadwal->tanggal == $Date)
                                    <td>{{$jadwal->tanggal}}</td>
                                    <td>
                                        {{$jadwal->durasi}}
                                    </td>
                                    <td>
                                        {{$jadwal->petugas}}
                                    </td>
                                    <td>
                                        {{$jadwal->lokasi}}
                                    </td>
                                    @endif
                                </tr>
                              @endforeach
                              </tbody>
                          </table>
                          <div>
                           <a href="{{url('resetJadwal')}}"><button class="btn btn-primary center"><i class="fa fa-pencil"></i> Reset Jadwal Petugas</button></a>
                         </div>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Jadwal Sarana</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-calendar"></i> Tanggal</th>
                                  <th><i class="fa fa-bell"></i> Durasi</th>
                                  <th><i class="fa fa-road"></i> Jenis</th>
                                  <th><i class="fa fa-star"></i> Plat</th>
                                  <th><i class="fa fa-map-marker"></i> Lokasi</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach ($Jadwal_Sarana as $jadwal_sarana)
                                <tr>
                                    @if ($jadwal_sarana->tanggal == $Date)
                                    <td>{{$jadwal_sarana->tanggal}}</td>
                                    <td>
                                        {{$jadwal_sarana->durasi}}
                                    </td>
                                    <td>
                                        {{$jadwal_sarana->jenis}}
                                    </td>
                                    <td>
                                        {{$jadwal_sarana->plat}}
                                    </td>
                                    <td>
                                        {{$jadwal_sarana->lokasi}}
                                    </td>
                                    @endif
                                </tr>
                              @endforeach
                              </tbody>
                          </table>
                          <div>
                           <a href="{{url('resetJadwalSarana')}}"><button class="btn btn-primary center"><i class="fa fa-pencil"></i> Reset Jadwal Sarana</button></a>
                         </div>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
@endsection