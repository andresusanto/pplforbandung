
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
            <h3><i class="fa fa-angle-right"></i><a href="{{'admin'}}">Dashboard</a> / Inventaris Sarana</h3>
            <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Daftar Sarana</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-asterisk"></i> ID</th>
                                  <th><i class="fa fa-tag"></i> Jenis</th>
                                  <th><i class="fa fa-star"></i> Plat</th>
                                  <th><i class=" fa fa-edit"></i> Update</th>
                                  <th><i class=" fa fa-edit"></i> Delete</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($Sarana as $sarana)
                              <tr>
                                  <td>{{$sarana->id}}</td>
                                  <td>{{$sarana->jenis}}</td>
                                  <td>{{$sarana->plat}}</td>
                                  <td>
                                      <a href="{{'updSarana/'.$sarana->id}}"><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button></a>
                                  </td>
                                  <td>    
                                      <form action="{{'delSarana/'.$sarana->id}}">
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
                            <form name="addSarana" method="post" action="/addSarana">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="tambahModalLabel">Tambah Sarana</h4>
                                </div>
                              
                                <div class="modal-body">
                                  <input name="_token" hidden value="{!! csrf_token() !!}" />
                                  <div class="form-group">
                                    <label for="recipient-name" class="control-label">Jenis:</label>
                                    <input type="text" class="form-control" id="namax" name="jenis">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="control-label">Plat:</label>
                                    <input type="text" class="form-control" id="usernamex" name="plat">
                                  </div>
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
        var form = [document.forms["addSarana"]["jenis"].value, document.forms["addSarana"]["plat"].value];
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
                text = "Jenis";
                break;
              case 1:
                text = "Plat";
                break;
            }   
          } 
        }
        else { //kasus lebih dari 1
          for (var i = 0; i < 2; i++) {
            if (form[i] == "" || form[i] == null) {
              switch(i) {
                case 0:
                  text += "Jenis";
                  break;
                case 1: 
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
