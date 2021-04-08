
        <!-- jQuery 2.1.4 -->
        <script src="{{ asset('assets/dashboard/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
        <!-- Bootstrap 3.3.4 -->
        <script src="{{ asset('assets/dashboard/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- DataTables -->
        <script src="{{ asset('assets/dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
        <!-- SlimScroll -->
        <script src="{{ asset('assets/dashboard/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('assets/dashboard/plugins/fastclick/fastclick.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dashboard/dist/js/app.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('assets/dashboard/dist/js/demo.js') }}"></script>
        <!-- FLOT CHARTS -->
        <script src="{{ asset('assets/dashboard/plugins/flot/jquery.flot.min.js') }}"></script>
        <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
        <script src="{{ asset('assets/dashboard/plugins/flot/jquery.flot.pie.min.js') }}"></script>
        <!-- page script -->
        <script>
        $( document ).ready(function() {
                if ($(window).width() < 768) {
                        $('body').addClass('fixed')
                        console.log('small');
                }
        });
        </script>
        @yield('user_scripts')

</body>

</html>