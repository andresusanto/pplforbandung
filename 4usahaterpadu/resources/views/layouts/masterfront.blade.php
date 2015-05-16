<?php use App\Perizinan;

use App\FormulirHO;
use App\FormulirSIUP;
use App\FormulirILO;
use App\FormulirIMB;
use App\FormulirIUI;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Perizinan Terpadu</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
  <!--external css-->
  <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/zabuto_calendar.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/js/gritter/css/jquery.gritter.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('assets/lineicons/style.css')}}">

  <!-- Custom styles for this template -->
  <link href="{{asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="{{asset('assets/css/style-responsive.css') }}" rel="stylesheet">

  <script src="{{asset('assets/js/chart-master/Chart.js') }}"></script>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <?php if(\Session::has('bg_home')){
      \Session::forget('bg_home');?>
      <style>
      body{
        background-image: url('assets/img/home-bg.jpg');
        background-position: center top;
        background-repeat: no-repeat;
        background-size: 100% auto;
      }
      </style>
      <?php }?>
      <body >


        <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Menu Utama"></div>
        </div>
        <!--logo start-->
        <a href={{URL::to("home")}} class="logo"><b>Perizinan Terpadu</b></a>
        <!--logo end-->
        <div class=" nav notify-row" id="top_menu">
          <!--  notification start -->

          <?php if (\Session::has('peran')){ ?>
          <ul class="nav top-menu">
            <!-- settings start -->
            <?php
            if(\Session::get('peran')==3){
              $arrayFormulir = DB::table('perizinan')
              ->where('id_pemohon', \Session::get('id'))
              ->whereNotIn('status', array("Dibatalkan"))
              ->whereNotIn('disembunyikan', array("true"))
              ->orderBy('updated_at', 'desc')
              ->limit(4)
              ->get();

              $updated = DB::table('perizinan')
              ->where('id_pemohon', \Session::get('id'))
              ->whereNotIn('status', array("Dibatalkan"))
              ->whereNotIn('disembunyikan', array("true"))
              ->where('updated', 'true')
              ->get();

            }else if (\Session::get('peran')==2){
              $arrayFormulir = DB::table('perizinan')
              ->whereNotIn('status', array('Disahkan','Terverifikasi','Disetujui (Sudah Lengkap)'))
              ->orderBy('updated_at', 'desc')
              ->limit(4)
              ->get();

              $updated = DB::table('perizinan')
              ->whereNotIn('status', array('Disahkan','Terverifikasi','Disetujui (Sudah Lengkap)'))
              ->where('updated_by_user', 'true')
              ->orWhere(function($query)
              {
                $query->where('updated_by_mayor', 'true')
                ->whereNotIn('status', array('Disahkan'));
              })
              ->get();


            }else if (\Session::get('peran')==1){
              $arrayFormulir = DB::table('perizinan')
              ->whereNotIn('status', array('Disahkan','Tertunda','Disetujui (Belum Lengkap)', 'Dibatalkan', 'Ditolak'))
              ->orderBy('updated_at', 'desc')
              ->limit(4)
              ->get();

              $updated = DB::table('perizinan')
              ->whereNotIn('status', array('Disahkan','Tertunda','Disetujui (Belum Lengkap)', 'Dibatalkan', 'Ditolak'))
              ->where('updated_by_bppt', 'true')
              ->get();
            }

            ?>
            <li class="dropdown">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle "  href="index.html#">
                <i class="fa fa-tasks"></i>
                <?php if(count($updated)>0){ ?>
                <span class="badge bg-theme">{{count($updated)}}</span>

                <?php } ?>
              </a>
              <ul class="dropdown-menu extended tasks-bar">
                <div class="notify-arrow notify-arrow-green"></div>

                <li class="text-center logo"><p><b>Formulir</b></p></li>

                @foreach ($arrayFormulir as $formulir)
                <?php
                $jenis_izin = "error";
                switch ($formulir->jenis_izin) {
                  case "ho":
                  $jenis_izin = "Izin Gangguan (HO)";
                  break;
                  case "siup":
                  $jenis_izin = "Izin Usaha Perdagangan (SIUP)";
                  break;
                  case "ilo":
                  $jenis_izin = "Izin Lokasi (ILO)";
                  break;
                  case "imb":
                  $jenis_izin = "Izin Mendirikan Bangunan (IMB)";
                  break;
                  case "iui":
                  $jenis_izin = "Izin Usaha Industri (IUI)";
                  break;
                }
                ?>
                <li>
                  <?php $urlDetail = "detailformulir/".$formulir->jenis_izin."/".$formulir->id_izin ?>
                  <a href={{URL::to($urlDetail)}} >
                   <p class="text-center green">{{$jenis_izin}}</p>
                   <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                   <?php if(\Session::get('peran')==3 && $formulir->updated == 'true' ){ ?>
                   <div class=" pull-left btn btn-round btn-xs btn-default">New
                   </div>
                   <?php } ?>

                   <?php if(\Session::get('peran')==2 && ($formulir->updated_by_user == 'true' || $formulir->updated_by_mayor == 'true') ){ ?>
                   <div class=" pull-left btn btn-round btn-xs btn-default">New
                   </div>
                   <?php } ?>

                   <?php if(\Session::get('peran')==1 && $formulir->updated_by_bppt == 'true' ){ ?>
                   <div class=" pull-left btn btn-round btn-xs btn-default">New
                   </div>
                   <?php } ?>
                   <div
                   <?php if($formulir->status=='Dibatalkan'){ ?>
                   class=" pull-right btn btn-xs btn-danger"
                   <?php }else if($formulir->status=='Terverifikasi'){  ?>
                   class=" pull-right btn btn-xs btn-info"
                   <?php }else if($formulir->status=='Tertunda'){  ?>
                   class=" pull-right btn btn-xs btn-warning"
                   <?php }else if($formulir->status=='Disetujui'){  ?>
                   class=" pull-right btn btn-xs btn-success"
                   <?php } else if($formulir->status=='Ditolak'){  ?>
                   class=" pull-right btn btn-xs btn-danger"
                   <?php } else{ ?>
                   class=" pull-right btn btn-xs btn-success"
                   <?php } ?>
                   >{{$formulir->status}}
                 </div>
               </a>
             </li>
             @endforeach
             <?php if($arrayFormulir == null) {?>
             <li>
              <p class="text-center green">Belum ada permohonan perizinan</p>
            </li>
              <?php if(\Session::get('peran')== 3) {?>
              <li>
                <a class = "text-center" href={{URL::to("listperizinan")}}>
                  <button href="" type="button" class="btn-small btn btn-theme">Mengajukan Izin <i class="fa fa-angle-right"></i></button>
                </a>
              </li>
              <?php } ?>
            <?php }else{ ?>

            <li class="text-center external">
              <a href={{URL::to("listformulir")}}><b>Lihat semua formulir</b></a>
            </li>
            <?php } ?>
          </ul>

        </li>
        <!-- settings end -->

      </ul>
      <?php } ?>
      <!--  notification end -->
    </div>
    <div class="top-menu">
     <ul class="nav pull-right top-menu">
      <?php if(\Session::has('id')==false){ ?>
          <li><a class="logout" href="http://dukcapil.pplbandung.biz.tm/oauth/authorize?client_id=5SLTJ3QStpkyeBcG&redirect_uri=http://localhost/PerizinanTerpadu/public/loginsso&response_type=code">Login</a></li>


      <?php }else{ ?>
      <li>
        <div class="logout btn-group ">
          <a href={{URL::to("editprofil")}} class="logout" data-toggle="dropdown"><font color="white">
            {{\Session::get('nama')}} <span class="caret"></font></a>
            <ul class="logout dropdown-menu" role="menu">
              <li><a class="centered logout"  href={{URL::to("logoutsso")}}>Logout</a></li>
            </ul>
          </div>
        </li>
        <?php } ?>
      </ul>
    </div>
  </header>
  <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
        <div id="sidebar"  class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu" id="nav-accordion">

           <p class="centered"><a href={{URL::to('home')}}><img src="{{asset('assets/img/logo_bandung.png') }}" class="" width="100"></a></p>
           <h5 class="centered">BPPT Kota Bandung</h5>

           <li class="mt">
            <a class="" href={{URL::to("profil")}}>
              <i class="fa fa-desktop"></i>
              <span>Profil BPPT</span>
            </a>
          </li>

          <li class="sub-menu">
            <a href={{URL::to('listperizinan')}} >
              <i class="fa fa-tasks"></i>
              <span>Mengajukan Izin</span>
            </a>
          </li>
          <?php if(\Session::get('peran')==3){ ?>
          <li class="sub-menu">
            <a class="sub-menu" href={{URL::to("listformulir")}}>
              <i class="fa fa-cogs"></i>
              <span>Status Formulir</span>
            </a>
          </li>
          <?php } ?>
          <?php if(\Session::get('peran')==2){ ?>
          <li class="sub-menu">
            <a class="sub-menu" href={{URL::to("listformulir")}}>
              <i class="fa fa-cogs"></i>
              <span>Daftar Formulir Masuk</span>
            </a>
          </li>
          <?php } ?>

          <li class="sub-menu">
            <a href="javascript:;" >
              <i class="fa fa-dashboard"></i>
              <span>Informasi Perizinan</span>
            </a>
            <ul class="sub">
              <li><a  href={{URL::to("detailperizinan/ho")}}>Izin Gangguan </a></li>
              <li><a  href={{URL::to("detailperizinan/siup")}}>Izin Usaha Perdagangan </a></li>
              <li><a  href={{URL::to("detailperizinan/iui")}}>Izin Usaha Industri </a></li>
              <li><a  href={{URL::to("detailperizinan/imb")}}>Izin Mendirikan Bangunan</a></li>
              <li><a  href={{URL::to("detailperizinan/ilo")}}>Izin Lokasi</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" >
              <i class="fa fa-book"></i>
              <span>Izin yang Diterbitkan</span>
            </a>
            <ul class="sub">
              <li><a  href={{URL::to("listizindisahkan/semua")}}>Semua Izin </a></li>
              <li><a  href={{URL::to("listizindisahkan/ho")}}>Izin Gangguan </a></li>
              <li><a  href={{URL::to("listizindisahkan/siup")}}>Izin Usaha Perdagangan </a></li>
              <li><a  href={{URL::to("listizindisahkan/iui")}}>Izin Usaha Industri </a></li>
              <li><a  href={{URL::to("listizindisahkan/imb")}}>Izin Mendirikan Bangunan</a></li>
              <li><a  href={{URL::to("listizindisahkan/ilo")}}>Izin Lokasi</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" >
              <i class="fa fa-th"></i>
              <span>Data Tables</span>
            </a>
            <ul class="sub">
              <li><a  href="basic_table.html">Basic Table</a></li>
              <li><a  href="responsive_table.html">Responsive Table</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" >
              <i class=" fa fa-bar-chart-o"></i>
              <span>Charts</span>
            </a>
            <ul class="sub">
              <li><a  href="morris.html">Morris</a></li>
              <li><a  href="chartjs.html">Chartjs</a></li>
            </ul>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">

          <div class="row">
            <div class="col-lg-9 main-chart">

              <div class="container">
                @yield('content')
              </div>

            </div><!-- /col-lg-9 END SECTION MIDDLE -->



      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->

      <div class="col-lg-3 ds">

       <?php if(\Session::has('id')){ ?>
       <!--COMPLETED ACTIONS DONUTS CHART-->
       <h3>Pemberitahuan</h3>
       @foreach ($arrayFormulir as $formulir)
       <?php
       $jenis_izin = "error";
       switch ($formulir->jenis_izin) {
        case "ho":
        $jenis_izin = "Izin Gangguan (HO)";
        break;
        case "siup":
        $jenis_izin = "Izin Usaha Perdagangan (SIUP)";
        break;
        case "ilo":
        $jenis_izin = "Izin Lokasi (ILO)";
        break;
        case "imb":
        $jenis_izin = "Izin Mendirikan Bangunan (IMB)";
        break;
        case "iui":
        $jenis_izin = "Izin Usaha Industri (IUI)";
        break;
      }
      ?>
      <!-- First Action -->

      <?php $urlDetail = "detailformulir/".$formulir->jenis_izin."/".$formulir->id_izin ?>

      <a href={{URL::to($urlDetail)}}>
       <div class="desc " >
        <div class="thumb">
         <?php if(\Session::get('peran')==3 && $formulir->updated == 'true' ){ ?>
         <div class=" pull-left btn btn-round btn-xs btn-default">New
         </div>
         <?php } ?>

         <?php if(\Session::get('peran')==2 && ($formulir->updated_by_user == 'true' || $formulir->updated_by_mayor == 'true') ){ ?>
         <div class=" pull-left btn btn-round btn-xs btn-default">New
         </div>
         <?php } ?>

         <?php if(\Session::get('peran')==1 && $formulir->updated_by_bppt == 'true' ){ ?>
         <div class=" pull-left btn btn-round btn-xs btn-default">New
         </div>
         <?php } ?>
       </div>
       <div class="details  ">
        <p ><muted>{{$formulir->status}}</muted><br/>
         <b>{{$jenis_izin}}</b><br/>
       </p>
     </div>
   </div>
 </a>
 @endforeach

 <?php if($arrayFormulir == null) {?>
 <div class="desc">
  <p class="text-center green"><b>Belum ada permohonan perizinan</b></p>
</div>

    <?php if(\Session::get('peran')== 3) {?>
    <div class="desc " >
      <div class="thumb">
      </div>
      <div class="details  ">
       <b><a  href={{URL::to("listperizinan")}} class = "centered">
         <button  type="button" class="btn-small btn btn-theme">Mengajukan Izin <i class="fa fa-angle-right"></i></button>
       </a></b><br/>
     </p>
    </div>
    </div>
    <?php } ?>
<?php }else{ ?>

<div class=" desc text-center external">
  <a href={{URL::to("listformulir")}}><b>Lihat semua formulir</b></a>
</div>
<?php } ?>
<br><br>
<br><br>

<?php } ?>
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
<br><br><br><br><br><br><br><br> <br><br>
</div><!-- /col-lg-3 -->
</div><! --/row -->
</section>
</section>

<!--main content end-->
<!--footer start-->
<footer class="site-footer">
  <div class="text-center">
    2015 - Perizinan Terpadu Kota Bandung
    <a href="index.html#" class="go-top">
      <i class="fa fa-angle-up"></i>
    </a>
  </div>
</footer>
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('assets/js/jquery.js') }}"></script>
<script src="{{asset('assets/js/jquery-1.8.3.min.js') }}"></script>
<script src="{{asset('assets/js/bootstrap.min.js') }}"></script>
<script class="include" type="text/javascript" src="{{asset('assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{asset('assets/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{asset('assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/js/jquery.sparkline.js') }}"></script>


<!--common script for all pages-->
<script src="{{asset('assets/js/common-scripts.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js/gritter/js/jquery.gritter.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/gritter-conf.js')}}"></script>

<!--script for this page-->
<script src="{{asset('assets/js/sparkline-chart.js')}}"></script>
<script src="{{asset('assets/js/zabuto_calendar.js')}}"></script>

// <script type="text/javascript">
 //        $(document).ready(function () {
 //        var unique_id = $.gritter.add({
 //            // (string | mandatory) the heading of the notification
 //            title: 'Selamat datang di web Perizinan Terpadu!',
 //            // (string | mandatory) the text inside the notification
 //            text: 'Pergunakan informasi dan fitur dalam website ini semaksimal mungkin.',
 //            // (string | optional) the image to display on the left
 //            image: 'assets/img/logo_bandung.png',
 //            // (bool | optional) if you want it to fade out on its own or just sit there
 //            sticky: true,
 //            // (int | optional) the time you want it to be alive for before fading out
 //            time: '',
 //            // (string | optional) the class name you want to apply to that specific message
 //            class_name: 'my-sticky-class'
 //        });

 //        return false;
 //        });
// </script>

<script type="application/javascript">
$(document).ready(function () {
  $("#date-popover").popover({html: true, trigger: "manual"});
  $("#date-popover").hide();
  $("#date-popover").click(function (e) {
    $(this).hide();
  });

  $("#my-calendar").zabuto_calendar({
    action: function () {
      return myDateFunction(this.id, false);
    },
    action_nav: function () {
      return myNavFunction(this.id);
    },
    ajax: {
      url: "show_data.php?action=1",
      modal: true
    },
    legend: [
    {type: "text", label: "Special event", badge: "00"},
    {type: "block", label: "Regular event", }
    ]
  });
});


function myNavFunction(id) {
  $("#date-popover").hide();
  var nav = $("#" + id).data("navigation");
  var to = $("#" + id).data("to");
  console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
}
</script>


</body>
</html>
