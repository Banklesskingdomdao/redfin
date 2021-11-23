<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="The Bankless-Kingdom">
        <meta name="keywords" content="The Bankless-Kingdom">
        <title>
            @yield('title','Bank less kingdom')
        </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no"/>
        <!-- Load Material Icons from Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Roboto and Roboto Mono fonts from Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,500" rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Load main stylesheet-->
        <link href="{{asset('user-auth/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('user-auth/css/common.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body class="bg-primary">

        @yield('content')
        <!-- Load Bootstrap JS bundle-->
        <script src="{{asset('user-auth/js/bootstrap.bundle.min.js')}}" ></script>
        <!-- Load global scripts-->
        <script type="module" src="{{ asset('user-auth/js/material.js') }}"></script>
        <script src="{{asset('user-auth/js/common.js')}}"></script>
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
        "showDuration": "800",
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
    @endif
    @if(Session::has('error'))
    const toastHTML = '{{Session::get('error')}}';
    toastr["warning"](toastHTML);
    @endif
</script>
</body>

</html>
