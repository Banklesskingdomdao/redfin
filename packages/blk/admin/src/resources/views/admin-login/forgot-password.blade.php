@extends('admin::admin-login.layouts.app-admin')

@section('title')
    Forgot password
@endsection

@section('content')


<body class="bg-primary">
        <!-- Layout wrapper-->
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
                                        <!-- Auth header with logo image-->
                                        <div class="text-center">
                                            <h1 class="display-5 mb-4">Reset Password</h1>
                                        </div>
                                        <!-- Reset password submission form-->
                                        <form action="{{route('admin.get-email')}}" method="post">
                                            @csrf
                                        <div class="mb-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address *</label>
                                                <input type="email" class="form-control" name="email"
                                                       id="exampleInputEmail1" aria-describedby="email" required
                                                       placeholder="Enter your email">
                                            </div>
                                        </div>                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small fw-500 text-decoration-none" href="{{url('/admin/login')}}">Return to login</a>
                                                <button class="btn btn-primary mdc-ripple-upgraded" type="submit">Reset Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            

</body>


@endsection