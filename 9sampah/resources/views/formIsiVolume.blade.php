@extends('templatePetugas')


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
                      <a href="{{url('petugas')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="{{url('viewScheduleSelf')}}" >
                          <i class="fa fa-calendar"></i>
                          <span>Jadwal</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a class="active" href="{{url('isiVolume')}}" >
                          <i class="fa fa-download"></i>
                          <span>Volume</span>
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
            <h3><i class="fa fa-angle-right"></i><a href="{{url('petugas')}}">Dashboard</a> / Isi Volume</h3>
            <div class="row mt">
                  <div class="col-md-12">
                    <form method="post" name="formVolume">
                      <div class="modal-content">
                          <div class="modal-header"> 
                            <h4 class="modal-title" id="editModalLabel">Isi Volume</h4>
                          </div>
                          <div class="modal-body">
                              <input name="_token" hidden value="{!! csrf_token() !!}" />
                              <div class="form-group">
                                  <label for="recipient-name" class="control-label">Nama TPS/TPA:</label>
                                  <select name="lokasi" class="form-control">
                                      <option value="" selected disabled>Lokasi</option>
                                      <optgroup label="---TPA---"></optgroup>
                                      @foreach ($tpa as $tpaElement)
                                      <option>{{$tpaElement->nama}}</option>
                                      @endforeach
                                      <optgroup label="---TPS---"></optgroup>
                                      @foreach ($tps as $tpsElement)
                                      <option>{{$tpsElement->nama}}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="recipient-name" class="control-label">Volume TPS/TPA:</label>
                                  <input type="text" class="form-control" id="recipient-name" name="volume" placeholder="<?php echo Session::get('volumeTPA')?>">
                              </div>
                          </div>
                        <div class="modal-footer">
                          <button type="reset" class="btn btn-default" data-dismiss="modal" style="margin-left:0px;">Reset</button>
                          <button type="submit" class="btn btn-default" onclick="return validateForm()">Simpan</button>
                        </div>
                      </div>
                      </form>
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
      
    </section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <script type="text/javascript">
      function validateForm() {
          var tempat = document.forms["formVolume"]["lokasi"].value;
          var volume = document.forms["formVolume"]["volume"].value;
          if (tempat=="") { //kasus tempat salah
            if (volume=="" || volume==null) {
              alert("Input tempat dan volume tidak boleh kosong!");
            }
            else {
              alert("Input tempat tidak boleh kosong!");
            }
            return false;
          }
          else { //kasus tempat benar
            if (volume < 0) {
              alert("Input volume tidak boleh negatif!");
              return false;
            }
            else if (volume=="" || volume==null) {
              alert("Input volume tidak boleh kosong!");
            }
          }
      }
      </script>
@endsection