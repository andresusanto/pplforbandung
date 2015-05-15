@extends('layouts.plain')
@section('head')
@parent
<link rel="stylesheet" type="text/css" href="{{asset('materialize/css/materialize.min.css')}}">
@endsection

@section('header')
@stop



@section('content')
<style type="text/css">
.parallax-container {
  height: 400px;
}
</style>
<div class="parallax-container">
    <div class="parallax"><img src="{{asset('atia/img/parallax2.jpg')}}"></div>
  </div>
  <div class="section white">
    <div class="row container">
      <h2 class="header">Parallax</h2>
      <p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
    </div>
  </div>
  <div class="parallax-container">
    <div class="parallax"><img src="{{asset('atia/img/parallax2.jpg')}}"></div>
  </div>
@endsection

@section('scripts')
@parent
    <script type="text/javascript" src='{{asset('materialize/js/materialize.min.js')}}'></script>
<script type="text/javascript">
$(document).ready(function(){
      $('.parallax').parallax();
    });
</script>
    
@endsection
