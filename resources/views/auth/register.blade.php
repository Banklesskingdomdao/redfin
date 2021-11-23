



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
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('user/assets/images/favicon/favicon-32x32.png')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/vendors/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/themes/vertical-modern-menu-template/materialize.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/themes/vertical-modern-menu-template/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/pages/register.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/custom/custom.css')}}">
  </head>





<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 1-column  blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
    <div class="row">
      <div class="col s12">
        <div class="container"><div id="register-page" class="row">
  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">
    <form class="login-form" action="{{ route('register') }}" method="post">
    @csrf
      <div class="row">
        <div class="input-field col s12">
          <h5 class="ml-4">Register</h5>
          <p class="ml-4">Join to our community now !</p>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          <label for="name" class="center-align">{{ __('Name') }}</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">mail_outline</i>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          <label for="email" class="">{{ __('E-Mail Address') }}</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
          <label for="password" class="">{{ __('Password') }}</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12"> {{ __('Register') }}</button>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <p class="margin medium-small"><a href="{{url('/login')}}">Already have an account? Login</a></p>
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