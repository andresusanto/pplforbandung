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
                      <a  class="active" href="{{url('dinas')}}">
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
                      <a  href="javascript:;" >
                          <i class="fa fa-list-alt"></i>
                          <span>Penjadwalan</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{'schedule'}}">Petugas</a></li>
                          <li><a  href="{{'isiSarana'}}">Pengangkutan</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="{{url('viewSchedule')}}" >
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
          <section class="wrapper">
              <div class="row">
                <div class="col-lg-9 main-chart">    
                      <div class="row mt">
                      <!-- SERVER STATUS PANELS -->
                        <div class="col-md-6 col-sm-4 mb">
                            <div class="white-panel pn">
                                <div class="white-header">
                                    <h5>JUMLAH TPA</h5>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6 col-xs-6">
                                    <p><i class="fa fa-database"></i>{{count($TPA)}} TPA tersedia</p>
                                  </div>
                                </div>
                            </div><!--/grey-panel -->
                        </div><!-- /col-md-6-->
                        

                        <div class="col-md-6 col-sm-4 mb">
                            <div class="white-panel pn">
                                <div class="white-header">
                                    <h5>JUMLAH TPS</h5>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6 col-xs-6">
                                    <p><i class="fa fa-database"></i> {{count($TPS)}} TPS tersedia</p>
                                  </div>
                                </div>
                            </div>
                        </div><!-- /col-md-6 -->
                        
                        <div class="col-md-6 mb">
                            <!-- WHITE PANEL - TOP USER -->
                            <div class="white-panel pn donut-chart">
                                <div class="white-header">
                                    <h5>JUMLAH PETUGAS</h5>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6 col-xs-6">
                                    <p><i class="fa fa-database"></i>{{$jumlahPAssigned + $jumlahPnonAssigned}} Petugas tersedia</p>
                                  </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                  
                                </div>
                                <br>
                                <font size = "6">{{round((float)($jumlahPAssigned / ($jumlahPAssigned+$jumlahPnonAssigned))*100) . '%'}}</font>
                                
                                <div class="col-sm-6 col-xs-6">
                                  <br>
                                  <br>
                                  <br>
                                  <br>
                                  <font size = "4"><p>Yang telah dijadwalkan</p></font>
                                </div>
                                <canvas id="serverstatus01" height="120" width="120"></canvas>
                                <script>
                                    var doughnutData = [
                                            {
                                                value: {{$jumlahPAssigned}},
                                                color:"#68dff0"
                                            },
                                            {
                                                value: {{$jumlahPnonAssigned}},
                                                color: "#fdfdfd"
                                            }
                                        ];
                                    var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                                </script>                                
                            </div>
                        </div><!-- /col-md-6 -->

                        <div class="col-md-6 mb">
                          <!-- WHITE PANEL - TOP USER -->
                            <div class="white-panel pn">
                                <div class="white-header">
                                    <h5>JUMLAH SARANA</h5>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6 col-xs-6">
                                    <p><i class="fa fa-database"></i>{{count($Sarana)}} Sarana tersedia</p>
                                  </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                  
                                </div>                                
                                <br>
                                <font size = "6">{{round((float)($jumlahSAssigned / count($Sarana))*100) . '%'}}</font>
                                
                                <div class="col-sm-6 col-xs-6">
                                  <br>
                                  <br>
                                  <br>
                                  <br>
                                  <font size = "4"><p>Yang telah dijadwalkan</p></font>
                                </div>                                
                                <canvas id="serverstatus02" height="120" width="120"></canvas>
                                <script>
                                    var doughnutData = [
                                            {
                                                value: {{$jumlahSAssigned}},
                                                color:"#68dff0"
                                            },
                                            {
                                                value: {{$jumlahSnonAssigned}},
                                                color: "#fdfdfd"
                                            }
                                        ];
                                    var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                                </script>
                            </div>
                        </div><!-- /col-md-6 -->
                    </div><!-- /row -->
                    
                    <div class="row mt">
                      <!--CUSTOM CHART START -->
                      
                      <!--custom chart end-->
                    </div><!-- /row --> 
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                  </div><!-- /col-lg-3 -->
              </div><!--/row -->
          </section>
      </section>
@endsection