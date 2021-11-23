

<html class="loading" lang="en" data-textdirection="ltr"><!-- BEGIN: Head--><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Bankless|Kingdom</title>
    <link rel="apple-touch-icon" href="{{asset('user/assets/images/favicon/apple-touch-icon-152x152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('user/assets/images/favicon/favicon-32x32.png')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/vendors/vendors.min.css')}}">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/themes/vertical-modern-menu-template/materialize.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/themes/vertical-modern-menu-template/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/pages/forgot.min.css')}}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/custom/custom.css')}}">
    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->
  <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 1-column  blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
    <div class="row">
      <div class="col s12">
        <div class="container"><div id="forgot-password" class="row">
  <div class="col s12 m6 l4 z-depth-4 offset-m4 card-panel border-radius-6 forgot-card bg-opacity-8">
    <form class="login-form" action="{{ route('verification.resend') }}" method="post">
    @csrf
      <div class="row">
        <div class="input-field col s12">
          <h5 class="ml-4">Verify Your Email</h5>
          <p class="ml-4">Before proceeding, please check your email for a verification link</p>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12 mb-1">{{ __('click here to request another') }}</a>
        </div>
      </div>
    </form>
  </div>
</div>
        </div>
        <div class="content-overlay"></div>
      </div>
    </div>

    <script src="{{asset('user/assets/js/vendors.min.js')}}"></script>
    <script src="{{asset('user/assets/js/plugins.min.js')}}"></script>
    <script src="{{asset('user/assets/js/search.min.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/custom-script.min.js')}}"></script>
  
    <script>

@if($errors->any())
    var toastHTML = '{{$errors->first()}}';
    M.toast({html: toastHTML});
 @endif
    @if(Session::has('success'))
    var toastHTML = "{{Session::get('success')}}";
    M.toast({html: toastHTML});
 @endif
 @if(session::has('resent'))
    var toastHTML = "{{ __('A fresh verification link has been sent to your email address.') }}"
    M.toast({html: toastHTML});
@endif
</script>
  
</body>
</html>

