@extends('user::layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/vendors/flag-icon/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/vendors/dropify/css/dropify.min.css')}}">
@endsection
@section('content')

<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>KYC Form</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                            </li>   
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col s12 m12 l12">
                <div id="Form-advance" class="card card card-default scrollspy">
                    <div class="card-content">
                        <h5 class="text-center">Your Kyc Form Has Been Submitted Successfully</h5>
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection

