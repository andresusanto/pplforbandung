@extends('app')
@section('navbar')
	<li class="active"><a href="{{URL::route('home')}}"><i class="icon-dashboard"></i><span>Beranda</span> </a> </li>
    <li><a href="{{URL::route('form_permohonan')}}"><i class="icon-list-alt"></i><span>Ajukan Permohonan</span> </a> </li>
    <li><a href="{{URL::route('daftar_permohonan')}}"><i class="icon-list-ul"></i><span>Daftar Permohonan</span> </a></li>
    <li><a href="{{URL::route('daftar_izin')}}"><i class="icon-list-ul"></i><span>Daftar Izin</span> </a> </li>
@stop
@section('content')
	<div class="span12">
	  <div class="widget">
	    <div class="widget-header"> <i class="icon-list-alt"></i>
	      <h3> Dashboard</h3>
	    </div>
	    <!-- /widget-header -->
	    <div class="widget-content">
	      <div class="widget big-stats-container">
	        <div class="widget-content">
	          <img src="{{asset('image/logo-pemkot-bandung.png')}}" height="100" width="100"></img>
	          <h6 class="bigstats">Aplikasi ini mengurus perizinan terkait parkir dan terminal.</h6>
	        </div>
	        <!-- /widget-content --> 
	        
	      </div>
	    </div>
	  </div>
	  <!-- /widget --> 
	</div>
	<!-- /span12 --> 
@endsection