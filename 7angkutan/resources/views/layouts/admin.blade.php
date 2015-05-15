<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    @section('header')
        @include('layouts.header')
    @show
    
    @include('layouts.sidebar.admin')
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
