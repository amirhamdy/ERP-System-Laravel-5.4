<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Morris -->
    <link href="{{ asset('css/plugins/morris/morris-0.4.3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    @yield('css')
</head>

{{--
<body>
--}}
<body class="pace-done mini-navbar">
<div id="wrapper">
    @include('layouts.left_navbar')
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            @include('layouts.tob_navbar')
        </div>
        <div class="wrapper wrapper-content">
            @yield('content')
        </div>
        @include('layouts.footer')
    </div>
    <div id="right-sidebar">
        <div class="sidebar-container">
            @include('layouts.right_navbar')
        </div>
    </div>
</div>
@include('layouts.scripts')

<script src="{{ asset('js/plugins/dataTables/datatables.min.js')}}"></script>
<!-- Page-Level Scripts -->
<script>
    $(document).ready(function () {
        $('.dataTables-example').DataTable({
            pageLength: 5,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {
                    extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });

    });

</script>

@yield('scripts')
@yield('more_scripts')
</body>
</html>
