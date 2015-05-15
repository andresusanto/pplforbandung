<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.pengguna.head')
</head>
<body>
    @section('header')
        @include('layouts.pengguna.header')
    @show

    <div class="main" style='background:#f9f6f1; min-width:1500px;'>
      <div class="main-inner">
        <div class="container">
            @include('layouts.notification')<br/>
            @yield('content')
        </div>
        <!-- /container --> 
      </div>
      <!-- /main-inner --> 
    </div>
    
    @section('footer')
        
    @stop

    
    @section('scripts')
        @include('layouts.scripts')
    @show

</body>
</html>
