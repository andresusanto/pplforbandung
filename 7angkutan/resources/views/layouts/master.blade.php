<!DOCTYPE html>
<html lang="en">
<head>
    @section('head')
        @include('layouts.head')
    @show
</head>
<body>
    @section('header')
        @include('layouts.header')
    @show
    
    <div class='container'>
          <section class="wrapper">
            @include('layouts.notification')<br/>
            @yield('content')
          </section>
    </div>
    
    @section('footer')
        @include('layouts.footer')
    @stop

    
    @section('scripts')
        @include('layouts.scripts')
    @show

</body>
</html>
