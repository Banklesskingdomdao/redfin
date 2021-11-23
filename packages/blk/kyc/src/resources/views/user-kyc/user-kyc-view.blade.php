@extends('user::layouts.app')

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
                            <li class="breadcrumb-item"><a href="/kyc">KYC Management</a>
                            </li> 
                            <li class="breadcrumb-item active">KYC Details
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col s12">
                <div class="container">
            <div class="card">
                <div class="card-content">
                <div class="row">
                    <div class="col s12">
                    <h6 class="mb-2 mt-2">KYC Details</h6>
                    <table class="striped">
                        <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{$viewKyc->name}}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{$viewKyc->phone_number}}</td>
                        </tr>
                        <tr>
                            <td>Date-Of-Birth</td>
                            <td>{{$viewKyc->date_of_birth}}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>{{$viewKyc->country}}</td>
                        </tr>
                        <tr>
                            <td>Address Line1</td>
                            <td>{{$viewKyc->address_line_1}}</td>
                        </tr>
                        <tr>
                            <td>Address Line2</td>
                            <td>{{$viewKyc->address_line_2}}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{$viewKyc->city}}</td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>{{$viewKyc->zip_code}}</td>
                        </tr>
                        <tr>
                            <td>Telegram Username</td>
                            <td>{{$viewKyc->telegram_username}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="striped">
                        <tbody>
                        <tr>
                        <h6 class="mb-2 mt-2">{{$kycType->KycType->name}}</h6>
                            <td>Front Image:</td>
                            <td><img src="{{ asset('uploads/profile/' . $kycType->front_image)}}" class="responsive-img card-border z-depth-2 mt-2" style="width: 100px; height:100px;"/></td>
                        </tr>
                        <tr>
                            <td>Back Image:</td>
                            <td><img src="{{ asset('uploads/profile/' . $kycType->back_image)}}" class="responsive-img card-border z-depth-2 mt-2" style="width: 100px; height:100px;"/></td>
                        </tr>
                        <tr>
                            <td>Selfie Document:</td>
                            <td><img src="{{ asset('uploads/profile/' . $viewKyc->selfie_document)}}" class="responsive-img card-border z-depth-2 mt-2" style="width: 100px; height:100px;"/></td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection