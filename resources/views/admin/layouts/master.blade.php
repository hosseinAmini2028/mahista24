<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>پنل مدیریت</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin-assets/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendor/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendor/owl-carousel/css/owl.theme.default.min.css')}}">
    <link href="{{asset('admin-assets/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
    @yield('styles')
    <link href="{{asset('admin-assets/css/toastr.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/css/rtl.css')}}" rel="stylesheet">



</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @include('admin.layouts.header');

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

        <!--**********************************
            Sidebar end
        ***********************************-->
        @include('admin.layouts.sidebar');
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                @yield('content');

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('admin-assets/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/quixnav-init.js')}}"></script>
    <script src="{{asset('admin-assets/js/custom.min.js')}}"></script>


    <!-- Vectormap -->
    <script src="{{asset('admin-assets/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/morris/morris.min.js')}}"></script>


    <script src="{{asset('admin-assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/chart.js')}}/Chart.bundle.min.js')}}"></script>

    <script src="{{asset('admin-assets/vendor/gaugeJS/dist/gauge.min.js')}}"></script>

    <!--  flot-chart js -->
    <script src="{{asset('admin-assets/vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/flot/jquery.flot.resize.js')}}"></script>

    <!-- Owl Carousel -->
    <script src="{{asset('admin-assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

    <!-- Counter Up -->
    <script src="{{asset('admin-assets/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/toastr.js')}}"></script>
    <script src="{{asset('admin-assets/js/dashboard/dashboard-1.js')}}"></script>
    @yield('scripts')
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif
    </script>

</body>

</html>