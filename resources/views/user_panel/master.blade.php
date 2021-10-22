<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>User</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('back_end/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('back_end/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->

    <link rel="stylesheet" href="{{ asset('back_end/plugins/jsgrid/jsgrid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back_end/plugins/jsgrid/jsgrid-theme.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('back_end') }}/plugins/toastr/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('back_end') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('back_end') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('back_end/dist/css/adminlte.min.css') }}">
    @yield('head')

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        @include('user_panel.include.nav')
        @include('user_panel.include.menu')

        @yield('content')

        @include('user_panel.include.footer')

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('back_end/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('back_end/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('back_end/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

        <script src="{{ asset('back_end') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('back_end') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('back_end') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('back_end') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

        <!-- AdminLTE App -->
        <script src="{{ asset('back_end/dist/js/adminlte.js') }}"></script>

        <!-- OPTIONAL SCRIPTS -->
        <script src="{{ asset('back_end/dist/js/demo.js') }}"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{ asset('back_end/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
        <script src="{{ asset('back_end/plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('back_end/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
        <script src="{{ asset('back_end/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('back_end/plugins/chart.js/Chart.min.js') }}"></script>

        <!-- PAGE SCRIPTS -->
        {{-- <script src="{{ asset('back_end/dist/js/pages/dashboard2.js') }}"></script> --}}
        <script src="{{ asset('back_end') }}/plugins/toastr/toastr.min.js"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
        @yield('js')
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
</body>

</html>
