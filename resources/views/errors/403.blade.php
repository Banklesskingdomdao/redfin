@extends('errors.layout')
<div id="layoutError">
    <!-- Layout content-->
    <div id="layoutError_content">
        <!-- Main page content-->
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <!-- Error message content-->
                        <div class="text-center my-5 mt-sm-10">
                            <img class="img-fluid mb-4" src="{{asset('assets/img/illustrations/error-403.svg')}}" alt="403 Error Image by Freepik Storyset" style="max-width: 30rem" />
                            <p class="lead">Access denied. You don't have permission to view this page.</p>
                            <a class="btn btn-primary" href="/">
                                <i class="material-icons leading-icon">arrow_back</i>
                                Return to Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@include('errors.include')
