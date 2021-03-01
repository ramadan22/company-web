<script src="{{ asset('public/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ asset('public/assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('public/assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/demo.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/pages/dashboard.js') }}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script>
    $(document).ready(function(){
        @if(session('status'))
            $("#modal-message").modal("show")
        @endif
    });
</script>
@yield("js")
