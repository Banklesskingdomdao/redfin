<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="The Bankless-Kingdom">
    <meta name="keywords" content="The Bankless-Kingdom">
    <meta name="author" content="ThemeSelect">
    <title>Bankless-Kingdom</title>
    <link rel="apple-touch-icon" href="{{asset('user/assets/images/favicon/apple-touch-icon-152x152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('user/assets/images/favicon/favicon-32x32.png')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/vendors/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/vendors/animate-css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/vendors/chartist-js/chartist.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/vendors/chartist-js/chartist-plugin-tooltip.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/vendors/data-tables/css/select.dataTables.min.css')}}">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/themes/vertical-modern-menu-template/materialize.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/themes/vertical-modern-menu-template/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/pages/data-tables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/pages/dashboard-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/pages/intro.min.css')}}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/custom/custom.css')}}">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->
<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">


@include('user::includes.header')

@include('user::includes.sidebar')

<div id="main">
    @yield('content')
</div>

@include('user::includes.footer')
<!-- Scripts -->
<script src="{{asset('user/assets/js/vendors.min.js')}}"></script>
<script src="{{asset('user/assets/vendors/chartjs/chart.min.js')}}"></script>
<script src="{{asset('user/assets/vendors/chartist-js/chartist.min.js')}}"></script>
<script src="{{asset('user/assets/vendors/chartist-js/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('user/assets/vendors/chartist-js/chartist-plugin-fill-donut.min.js')}}"></script>
<script src="{{asset('user/assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('user/assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('user/assets/vendors/data-tables/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('user/assets/js/scripts/data-tables.min.js')}}"></script>
<script src="{{asset('user/assets/js/plugins.min.js')}}"></script>
<script src="{{asset('user/assets/js/search.min.js')}}"></script>
<script src="{{asset('user/assets/js/custom/custom-script.min.js')}}"></script>
<script src="{{asset('user/assets/js/scripts/customizer.min.js')}}"></script>
<script src="{{asset('user/assets/js/scripts/advance-ui-modals.min.js')}}"></script>
{{--<script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>--}}
{{--<script type="module" src="{{asset('admin/assets/js/material.js')}}"></script>--}}
{{--<script src="{{asset('admin/assets/js/scripts.js')}}"></script>--}}
{{-- <script src="{{asset('user/assets/js/scripts/dashboard-modern.js')}}"></script> --}}
{{-- <script src="{{asset('user/assets/js/scripts/intro.min.js')}}"></script> --}}

<script>

@if($errors->any())
    var toastHTML = '{{$errors->first()}}';
    M.toast({html: toastHTML});
 @endif
    @if(Session::has('success'))
    var toastHTML = "{{Session::get('success')}}";
    M.toast({html: toastHTML});
 @endif

</script>

</body>
</html>
