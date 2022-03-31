<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('template/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('template/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{url('template/assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{url('template/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{url('template/assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('template/assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{url('template/assets/css/style.css')}}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{url('template/assets/images/favicon.png')}}" />

    <!-- Vue -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <script defer src="{{ mix('js/app.js') }}"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{url('css/custom.css')}}">
    <link rel="stylesheet" href="{{url('css/datatables.css')}}">
</head>

<body>

    @include('sweetalert::alert')

    <div id="app">
        <div class="container-scroller">

            <sidebar-part></sidebar-part>

            <div class="container-fluid page-body-wrapper">

                <navbar-part></navbar-part>

                <div class="main-panel">
                    <div class="content-wrapper">
                    
                        <mainapp></mainapp>
       
                        <footer-part></footer-part>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <script src="{{ mix('/js/app.js') }}"></script>

</body>

<script src="{{url('template/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{url('template/assets/js/off-canvas.js')}}"></script>
<script src="{{url('template/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{url('template/assets/js/misc.js')}}"></script>
<script src="{{url('template/assets/js/settings.js')}}"></script>
<script src="{{url('template/assets/js/todolist.js')}}"></script>

</html>