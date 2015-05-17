@extends('admin.app')

@section('sidebar')

<li class="mt">
  <a class="active" href="{{URL::route('admin/home')}}">
      <i class="fa fa-dashboard"></i>
      <span>Beranda</span>
  </a>
</li>

<li class="sub-menu">
  <a href="{{URL::route('admin/daftar_permohonan')}}" >
      <i class="fa fa-list"></i>
      <span>Daftar Permohonan</span>
  </a>
</li>

<li class="sub-menu">
  <a href="{{URL::route('admin/daftar_izin')}}" >
      <i class="fa fa-list"></i>
      <span>Daftar Perizinan</span>
  </a>
</li>
<li class="sub-menu">
  <a href="{{URL::route('admin/laporan')}}" >
      <i class="fa fa-book"></i>
      <span>Laporan</span>
  </a>
</li>

@stop

@section('content')
<div class="row">
  <div class="col-lg-9 main-chart">
  	<div class="col-md-9 col-sm-9 col-md-offset-1">
		<div class="box1">
			<span><img src="{{asset('image/logo-pemkot-bandung.png')}}" width="100"></img></span>
			<h3>Admin Aplikasi Parkir dan Terminal</h3>
		</div>
	</div>
  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
  <div class="col-lg-3 ds">
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
@stop

@section('rightsidebar')

@stop

@section('script')
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

@endsection