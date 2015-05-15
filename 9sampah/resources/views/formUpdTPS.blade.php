@extends('templateAdmin')


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
                      <a href="{{url('admin')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-folder-open"></i>
                          <span>Inventaris</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{url('inventoryTPA')}}">TPA</a></li>
                          <li><a  href="{{url('inventoryTPS')}}">TPS</a></li>
                          <li><a  href="{{url('inventorySarana')}}">Sarana</a></li>
                          <li><a  href="{{url('inventoryPetugas')}}">Petugas</a></li>
                      </ul>
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
            <h3><i class="fa fa-angle-right"></i><a href="{{url('admin')}}">Dashboard</a> / <a href="{{url('inventoryTPS')}}">Inventaris TPS</a> / Update TPS</h3>
            <div class="row mt">
                  <div class="col-md-12">
                      <form name="updateTPS" method="post">
                        <div class="modal-content">
                            <div class="modal-header"> 
                              <h4 class="modal-title" id="editModalLabel">Ubah TPS</h4>
                            </div>
                            <div class="modal-body">
                                <input name="_token" hidden value="{!! csrf_token() !!}" />
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Nama:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="nama" value="<?php echo Session::get('namaTPS')?>">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Lokasi:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="lokasi" value="<?php echo Session::get('lokasiTPS')?>">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Volume:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="volume" value="<?php echo Session::get('volumeTPS')?>">
                                </div>
                            </div>
                          <div class="modal-footer">
                            <button type="reset" class="btn btn-default" data-dismiss="modal" style="margin-left:0px;">Reset</button>
                            <button type="submit"  onclick="return validateForm()" class="btn btn-default">Simpan</button>
                          </div>
                        </div>
                        </form>
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
      
    </section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <script type="text/javascript">
      function validateForm() {
        var form = [document.forms["updateTPS"]["nama"].value, document.forms["updateTPS"]["lokasi"].value, document.forms["updateTPS"]["volume"].value];
        var text = "";
        var count = 0;
        var it = 0;
        for (var i = 0; i < 3; i++) { //increment count
          if (form[i] == null || form[i] == "") {
            count++;
          }
        }
        it = count;
        if (count == 1) { //kasus 1 count
          for (var i = 0; i < 3; i++) { //count dependent
            switch(i) {
              case 0:
                text = "Nama";
                break;
              case 1:
                text = "Lokasi";
                break;
              case 2:
                text = "Volume";
                break;
            }   
          } 
        }
        else { //kasus lebih dari 1
          for (var i = 0; i < 3; i++) {
            if (form[i] == "" || form[i] == null) {
              switch(i) {
                case 0:
                  text += "Nama";
                  break;
                case 1: 
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
                case 2:
                  if (it == 1) { //sisa 1
                    if (count == 1) {
                      text += "Volume";
                    }
                    else {
                      text += "dan volume";
                    }
                  }
                  else { //masih lebih dari 1
                    if (text == "") text += "Volume";
                    else text += ", volume";
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
        if (form[2] < 0) {
          alert("Volume tidak boleh negatif!");
          return false;
        }
      }
      </script>
@endsection