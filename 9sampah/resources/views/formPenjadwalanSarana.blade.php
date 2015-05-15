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
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-list-alt"></i>
                          <span>Penjadwalan</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{url('schedule')}}">Petugas</a></li>
                          <li><a  href="{{url('isiSarana')}}">Pengangkutan</a></li>
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
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> <a href="{{'dinas'}}">Dashboard</a> / Penjadwalan Sarana</h3>
            <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Penjadwalan Sarana</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-calendar"></i> Tanggal</th>
                                  <th><i class="fa fa-bell"></i> Durasi</th>
                                  <th><i class="fa fa-map-marker"></i> Lokasi</th>
                                  <th><i class="fa fa-road"></i> Jenis</th>
                                  <th><i class="fa fa-star"></i> Plat</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <form name="formSarana" role="form" method="post" action="/isiSarana">
                                  <input name="_token" hidden value="{!! csrf_token() !!}" />
                                  <td>
                                      <select class="form-control placeholder" name="tanggal" type="text">
                                      <option value="" selected disabled>Tanggal</option>
                                        <option>{{$Date}}</option>
                                        <option>{{$Date2}}</option>
                                      </select>
                                  </td>
                                  <td>
                                    <select class="form-control placeholder" name="durasi" type="text">
                                        <option value="" selected disabled>Durasi</option>
                                        <option>05:00-06.00</option>
                                        <option>06:00-07.00</option>
                                        <option>07:00-08.00</option>
                                        <option>08:00-09.00</option>
                                        <option>09:00-10.00</option>
                                        <option>10:00-11.00</option>
                                        <option>11:00-12.00</option>
                                        <option>12:00-13.00</option>
                                        <option>13:00-14.00</option>
                                        <option>14:00-15.00</option>
                                        <option>15:00-16.00</option>
                                        <option>16:00-17.00</option>
                                        <option>17:00-18.00</option>
                                    </select>
                                  </td>
                                  <td>
                                    <select class="form-control placeholder" name="lokasi" type="text">
                                        <option value="" selected disabled>Lokasi</option>
                                        <optgroup label="---TPA---"></optgroup>
                                        @foreach($TPA as $tpa)
                                        <option>{{$tpa->nama}} - {{$tpa->lokasi}}</option>
                                        @endforeach
                                        <optgroup label="---TPS---"></optgroup>
                                        @foreach($TPS as $tps)
                                        <option>{{$tps->nama}} - {{$tps->lokasi}}</option>
                                        @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <select class="form-control placeholder" name="jenis_sarana" type="text">
                                        <label>Jenis Sarana</label>
                                            <option value="" selected disabled>Jenis</option>
                                            <option>Mobil Sampah</option>                                           
                                    </select>
                                  </td>
                                  <td>
                                    <select class="form-control placeholder" name="plat_sarana" type="text">
                                        <label>Plat Sarana</label>
                                            <option value="" selected disabled>Plat</option>
                                            @foreach ($sarana as $saranaElement)
                                            <option>{{$saranaElement->plat}}</option>
                                            @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <input type="submit" value="Submit" onclick="return validateForm()" class="btn btn-primary">
                                  </td>
                                  </form>
                              </tr>
                              </tbody>
                          </table>
                          <div>
                        </div>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
      
    </section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <script type="text/javascript">
      function validateForm() {
        var form = [document.forms["formSarana"]["tanggal"].value, document.forms["formSarana"]["durasi"].value, document.forms["formSarana"]["lokasi"].value, document.forms["formSarana"]["plat_sarana"].value, document.forms["formSarana"]["jenis_sarana"].value];
        var text = "";
        var count = 0;
        var it = 0;
        for (var i = 0; i < 5; i++) { //increment count
          if (form[i] == null || form[i] == "") {
            count++;
          }
        }
        it = count;
        if (count == 1) { //kasus 1 count
          for (var i = 0; i < 5; i++) { //count dependent
            switch(i) {
              case 0:
                text = "Tanggal";
                break;
              case 1:
                text = "Durasi";
                break;
              case 2:
                text = "Lokasi";
                break;
              case 3:
                text = "Plat";
                break;
              case 4:
                text = "Jenis";
                break;
            }   
          } 
        }
        else { //kasus lebih dari 1
          for (var i = 0; i < 5; i++) {
            if (form[i] == "" || form[i] == null) {
              switch(i) {
                case 0:
                  text += "Tanggal";
                  break;
                case 1: 
                  if (it == 1) { //sisa 1
                    if (count == 1) {
                      text += "Durasi";
                    }
                    else {
                      text += " dan durasi";
                    }
                  }
                  else { //masih lebih dari 1
                    if (text == "") text += "Durasi";
                    else text += ", durasi";
                  }
                  break;
                case 2:
                  if (it == 1) { //sisa 1
                    if (count == 1) {
                      text += "Lokasi";
                    }
                    else {
                      text += " dan lokasi";
                    }
                  }
                  else { //masih lebih dari 1
                    if (text == "") text += "Lokasi";
                    else text += ", lokasi";
                  }
                  break;
                case 3:
                  if (it == 1) { //sisa 1
                    if (count == 1) {
                      text += "Plat";
                    }
                    else {
                      text += " dan plat";
                    }
                  }
                  else { //masih lebih dari 1
                    if (text == "") text += "Plat";
                    else text += ", plat";
                  }
                  break;
                case 4:
                  if (it == 1) { //sisa 1
                    if (count == 1) {
                      text += "Jenis";
                    }
                    else if (count == 2) {
                      text += " dan jenis";
                    }
                    else {
                      if (text == "") text += "Jenis";
                      else text += ", dan jenis";
                    }
                  }
                  break;
              }
              it--;
            }  
          }
        }
        if (count > 0) {
          alert(text + " tidak boleh kosong!");
          return false;
        }
      }
      </script>
@endsection