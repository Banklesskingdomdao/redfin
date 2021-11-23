<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="The Bankless-Kingdom">
    <meta name="keywords" content="The Bankless-Kingdom">
    <title>@yield('title','Admin | Bankless kingdom')</title>
    <!-- Load Favicon-->
    <link href="assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <!-- Load Material Icons from Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />
    <!-- Load Simple DataTables Stylesheet-->
    <!-- Roboto and Roboto Mono fonts from Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,500" rel="stylesheet" />
    <!-- Load main stylesheet-->
    <link href="{{asset('admin/assets/css/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    
</head>
<body class="nav-fixed bg-light">
<!-- Top app bar navigation menu-->
@include('admin::admin-dashboard.includes.nav')
<!-- Layout wrapper-->
<div id="layoutDrawer">
    <!-- Layout navigation-->
    <div id="layoutDrawer_nav">
        <!-- Drawer navigation-->
        @include('admin::admin-dashboard.includes.top-bar')
    </div>
    <!-- Layout content-->
    <div id="layoutDrawer_content">
        <!-- Main page content-->
    @yield('content')
    <!-- Footer-->
        <!-- Min-height is set inline to match the height of the drawer footer-->
        @include('admin::admin-dashboard.includes.footer')
    </div>
</div>
<!-- Load Bootstrap JS bundle-->
<script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<!-- Load global scripts-->
<script type="module" src="{{ asset('admin/assets/js/material.js') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }    
    @if(Session::has('success'))
    const toastHTML = '{{Session::get('success')}}';
    toastr["success"](toastHTML);
    @php Session::forget('success'); @endphp
    @endif
    @if(Session::has('error'))
    const toastHTML = '{{Session::get('error')}}';
    toastr["error"](toastHTML);
    @php Session::forget('error'); @endphp
    @endif
</script>

</body>

</html>
