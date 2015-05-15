<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
</head>
<style type="text/css">
body{
    font: 13px/1.7em 'Open Sans';
}
</style>
<body>
    @section('header')
        @include('layouts.pengguna.header')
    @show

    @include('layouts.sidebar.pengguna')
    <section id="main-content">
          <section class="wrapper">
            @include('layouts.notification')<br/>
            @yield('content')
          </section>
    </section>
    
    @section('footer')
        @include('layouts.footer')
    @stop

    
    @section('scripts')
        @include('layouts.scripts')
    @show

</body>
</html>