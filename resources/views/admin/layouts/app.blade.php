<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Heathrow London | ADMIN</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendors/images/apple-touch-icon.png') }}">
    {{-- <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/logo.png') }}"> --}}
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/logo.png') }}">


    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    </link>


    <link rel="stylesheet" type="text/css" href="{{ asset('templete/vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templete/vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('templete/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('templete/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templete/vendors/styles/style.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/> --}}

</head>

<body>
    <style>
        .slick-prev:before {
            color: black;
        }

        .slick-next:before {
            color: black;
        }
    </style>
    {{-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                Loading...
            </div>
        </div>
    </div> --}}

    @include('admin.layouts.header')
    @include('admin.layouts.sideNav')
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">

        <div class="mb-15 ml-0 mt-15">
            @yield('content')
        </div>
        @include('admin.layouts.toaster')
    </div>

    @yield('script')
    <div id="loadScript"></div>

    <script>
        $(document).ready(function() {

            $('#permission').DataTable();

            $(".alert").fadeTo(2000, 500).slideUp(500, function() {
                $(".alert").slideUp(500);
            });
            $('.vehicle-slider').slick({
                dots: true,
                infinite: true,
                centerMode: true,
                slidesToShow: 3,
                slidesToScroll: 3
            });
        });
    </script>
    <!-- js -->
    <script src="{{ asset('templete/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('templete/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('templete/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('templete/vendors/scripts/layout-settings.js') }}"></script>
    {{-- <script src="{{ asset('templete/plugins/apexcharts/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('templete/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('templete/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('templete/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('templete/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('templete/vendors/scripts/dashboard.js') }}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    {{-- <script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script> --}}
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    {{-- <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&libraries=places"
        defer></script> --}}

</body>

</html>
