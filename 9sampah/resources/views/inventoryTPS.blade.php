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
            <h3><i class="fa fa-angle-right"></i><a href="{{'admin'}}">Dashboard</a> / Inventaris TPS</h3>
            <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Daftar TPS</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-asterisk"></i> ID</th>
                                  <th><i class="fa fa-home"></i> Nama</th>
                                  <th><i class="fa fa-map-marker"></i> Lokasi</th>
                                  <th><i class="fa fa-download"></i> Volume</th>
                                  <th><i class=" fa fa-edit"></i> Update</th>
                                  <th><i class=" fa fa-edit"></i> Delete</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($TPS as $tps)
                              <tr>
                                  <td>TPS - {{$tps->id}}</td>
                                  <td>{{$tps->nama}}</td>
                                  <td>{{$tps->lokasi}}</td>
                                  <td>{{$tps->volume}}</td>
                                  <td>
                                      <a href="{{'updTPS/'.$tps->id}}"><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button></a>
                                  </td>
                                  <td>    
                                      <form action="{{'delTPS/'.$tps->id}}">
                                        <button class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin data dihapus?');"><i class="fa fa-trash-o "></i></button>
                                      </form>
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                          <div>
                          <button type="button" class="btn btn-primary center" data-toggle="modal" data-target="#tambahModal" data-whatever="">TAMBAH</button>

                          <!-- Modal Tambah -->
                          <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <form name="addTPS" method="post" action="/addTPS">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="tambahModalLabel">Tambah TPS</h4>
                                </div>
                              
                                <div class="modal-body">
                                  <input name="_token" hidden value="{!! csrf_token() !!}" />
                                  <div class="form-group">
                                    <label for="recipient-name" class="control-label">Nama:</label>
                                    <input type="text" class="form-control" id="namax" name="nama">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="control-label">Lokasi:</label>
                                    <input type="text" class="form-control" id="usernamex" name="lokasi">
                                  </div>
                                  <input name="volume" hidden value="0" />
                                </div>
                              
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left:0px;">Tutup</button>
                                  <input type="submit" onclick="return validateForm()" class="btn btn-default" value="Simpan">
                                </div>
                              </div>
                            </form>
                            </div>
                          </div>

                          <!-- End Modal Tambah -->

                        </div>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
      
    </section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <script type="text/javascript">
      function validateForm() {
        var form = [document.forms["addTPS"]["nama"].value, document.forms["addTPS"]["lokasi"].value];
        var text = "";
        var count = 0;
        var it = 0;
        for (var i = 0; i < 2; i++) { //increment count
          if (form[i] == null || form[i] == "") {
            count++;
          }
        }
        it = count;
        if (count == 1) { //kasus 1 count
          for (var i = 0; i < 2; i++) { //count dependent
            switch(i) {
              case 0:
                text = "Nama";
                break;
              case 1:
                text = "Lokasi";
                break;
            }   
          } 
        }
        else { //kasus lebih dari 1
          for (var i = 0; i < 2; i++) {
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
