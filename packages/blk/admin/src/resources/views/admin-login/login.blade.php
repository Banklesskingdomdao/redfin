@extends('admin::admin-login.layouts.app-admin')

@section('title')
    Login into your account
@endsection

@section('content')
    @foreach($errors->all() as $key => $error)
       @if($key == 0)
           <div id="toast-error" class="error-alert-show toast align-items-center position-absolute top-0 end-0"
                role="alert" aria-live="assertive" aria-atomic="true">
               <div class="d-flex">
                   <div class="toast-body">
                    {{$error}}
                </div>
                    <button type="button" onclick="dismissErrorToast();" class="btn-close me-2 m-auto"
                           data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
    @endforeach 
    <div id="layoutAuthentication">
        <!-- Layout content-->
        <div id="layoutAuthentication_content">
            <!-- Main page content-->
            <main>
                <!-- Main content container-->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8">
                            <div class="card card-raised shadow-10 mt-5 mt-xl-10 mb-4">
                                <div class="card-body p-5">
                                    <!-- Auth header -->
                                    <div class="text-center">
                                        <h1 class="display-5 mb-0">Login into your account</h1>
                                        <div class="subheading-1 mb-5"></div>
                                    </div>
                                    <!-- Login submission form-->
                                    <form method="post" action="{{route('admin.users')}}">
                                    @csrf
                                        <div class="mb-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address *</label>
                                                <input type="email" class="form-control" name="email"
                                                       id="exampleInputEmail1" aria-describedby="email" required
                                                       placeholder="Enter your email">
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password *</label>
                                                <input type="password" required class="form-control" name="password"
                                                       id="exampleInputPassword1" placeholder="Enter Your Password">
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small fw-500 text-decoration-none" href="{{route('admin.forgot-password')}}">Forgot Password?</a>
                                            <button type="submit" class="btn btn-primary mdc-ripple-upgraded">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
