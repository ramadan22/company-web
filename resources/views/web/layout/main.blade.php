<!DOCTYPE html>
<html lang="en">
<head>
    @include('web.layout.header')
</head>
<body id="default_theme" class="it_service">
<!-- loader -->
<div class="bg_load"> <img class="loader_animation" src="{{ url('') }}/assets/images/loaders/loader_1.png" alt="#" /> </div>
<!-- end loader -->
<!-- header -->
@include('web.layout.navbar')
<!-- end header -->
@yield('page')
<!-- footer -->
@include('web.layout.sub-footer')
<!-- end footer -->
<!-- js section -->
@include('web.layout.footer')
</body>
</html>
