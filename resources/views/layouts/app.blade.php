<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
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

</head>

<body>
    <div id="app">
        @yield('content')
    </div>

    <script src="{{ url('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    
    <!-- <script src="{{ url('assets/js/shared/misc.js') }}"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

<script src="{{url('template/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{url('template/assets/js/off-canvas.js')}}"></script>
<script src="{{url('template/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{url('template/assets/js/misc.js')}}"></script>
<script src="{{url('template/assets/js/settings.js')}}"></script>
<script src="{{url('template/assets/js/todolist.js')}}"></script>

</html>