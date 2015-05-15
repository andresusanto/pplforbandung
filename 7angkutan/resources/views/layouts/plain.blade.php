<!DOCTYPE html>
<html lang="en">
<head>
    @section('head')
    @include('layouts.head')
    @show
</head>
<body>
    @section('header')
    @show

    @yield('content')
    
    @section('footer')
        @include('layouts.footer')
    @stop

    
    @section('scripts')
        @include('layouts.scripts')
    @show

</body>
</html>
