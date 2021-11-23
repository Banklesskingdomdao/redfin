@extends('admin::admin-login.layouts.app-admin')

@section('title')
    Reset password
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
                                        <form action="{{route('admin.get-new-password')}}" method="post">
                                            <input type="hidden" value="{{$id}}" name="id">
                                            @csrf
                                            <div class="mb-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">New Password *</label>
                                                <input type="password" required class="form-control" name="password"
                                                    id="exampleInputPassword1" placeholder="Enter Your New Password">
                                            </div>
                                            </div>                                           
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary mdc-ripple-upgraded" type="submit">Submit</button>
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

</body>


@endsection