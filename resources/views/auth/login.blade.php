




<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Bankless|Kingdom</title>
    <link rel="apple-touch-icon" href="{{asset('user/assets/images/favicon/apple-touch-icon-152x152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/themes/vertical-modern-menu-template/materialize.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/themes/vertical-modern-menu-template/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/pages/login.css')}}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/custom/custom.css')}}">
    <!-- END: Custom CSS-->
  </head>





<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 1-column blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
    <div class="row">
      <div class="col s12">
        <div class="container"><div id="login-page" class="row">
  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
    <form class="login-form" method="post" action="{{ route('login') }}">
    @csrf
      <div class="row">
        <div class="input-field col s12">
          <h5 class="ml-4">Sign in</h5>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <label for="email" class="center-align">{{ __('E-Mail Address') }}</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <label for="password">{{ __('Password') }}</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m12 l12 ml-2 mt-1">
          <p>
            <label>
              <input type="checkbox" name="remember">
              <span>Remember Me</span>
            </label>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">{{ __('Login') }}</button>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6 m6 l6">
          <p class="margin medium-small"><a href="{{url('/register')}}">Register Now!</a></p>
        </div>
        <div class="input-field col s6 m6 l6">
        @if (Route::has('password.request'))
          <p class="margin right-align medium-small"><a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></p>
        @endif
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

</script>
</body>
</html>