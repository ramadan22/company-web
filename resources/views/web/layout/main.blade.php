<!DOCTYPE html>
<html lang="en">
<head>
    @include('web.layout.header')
</head>
<body id="default_theme" class="it_service" style="padding-top: 168px;">
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

@if(session('status'))
    <!-- Modal -->
    <div class="modal fade" id="modal-message" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header" style="border: none;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p class="text-center text-success" style="font-size: 18px;">{{ session('message') }}</p>
                </div>
                <div class="modal-footer pt-0" style="border: none;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endif
</body>
</html>
