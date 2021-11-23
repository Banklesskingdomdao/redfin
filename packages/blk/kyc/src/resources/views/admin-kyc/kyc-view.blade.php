@extends('admin::admin-dashboard.layouts.app')

@section('content')

<div class="container-xl p-5">
    <div class="row gx-5">
        <div class="col-xl-12 col-lg-7 mb-5">
            <div class="card card-raised h-100 overflow-hidden">
                <div class="card-header bg-primary text-white px-4"><div class="fw-500 text-center">KYC Details</div></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <tbody>
                                <tr>
                                    <td class="px-3 border-top">
                                        <div class="d-flex align-items-center">
                                            Name
                                        </div>
                                    </td>
                                    <td class="px-3 border-top">{{$kyc->name}}</td>
                                    <td class="px-3 border-top">Phone Number</td>
                                    <td class="px-3 border-top">{{$kyc->phone_number}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3">
                                        <div class="d-flex align-items-center">
                                        Date Of Birth
                                        </div>
                                    </td>
                                    <td class="px-3">{{$kyc->date_of_birth}}</td>
                                    <td class="px-3">Country</td>
                                    <td class="px-3">{{$kyc->country}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3">
                                        <div class="d-flex align-items-center">
                                        Address Line 1
                                        </div>
                                    </td>
                                    <td class="px-3">{{$kyc->address_line_1}}</td>
                                    <td class="px-3">City</td>
                                    <td class="px-3">{{$kyc->city}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3">
                                        <div class="d-flex align-items-center">
                                        Zipcode
                                        </div>
                                    </td>
                                    <td class="px-3">{{$kyc->zip_code}}</td>
                                    <td class="px-3">Telegram User Name</td>
                                    <td class="px-3">{{$kyc->telegram_username}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gx-5">
       <h5 class="text-center">KYC Documents</h5></br>
        <div class="col-xl-4 mb-5">
            <div class="card card-raised h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between">
                        <div class="me-4">
                            <h2 class="display-6 mb-0"><img src="{{ asset('uploads/profile/' . $kycType->front_image) }}" style="width: 200px; height:200px;"/></h2>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent position-relative ripple-gray px-4 mdc-ripple-upgraded">{{$kycType->KycType->name}} - Front Side Image</div>
            </div>
        </div>
        <div class="col-xl-4 mb-5">
            <div class="card card-raised h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between">
                        <div class="me-4">
                            <h2 class="display-6 mb-0"><img src="{{ asset('uploads/profile/' . $kycType->back_image) }}" style="width: 200px; height:200px;"/></h2>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent position-relative ripple-gray px-4 mdc-ripple-upgraded">{{$kycType->KycType->name}} - Back Side Image</div>
            </div>
        </div>
        <div class="col-xl-4 mb-5">
            <div class="card card-raised h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between">
                        <div class="me-8">
                            <img src="{{ asset('uploads/profile/' . $kyc->selfie_document) }}" style="width: 200px; height:200px;"/>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent position-relative ripple-gray px-4 mdc-ripple-upgraded">Selfie Document Image</div>
            </div>
        </div>
    </div>
    <div class="row gx-5 mb-12">
            <div class="card-body p-12">
                <a href="{{route('kyc.admin-send-email',$kyc->user_id)}}" style="text-decoration: none; margin-left:200px;"><button class="btn btn-success mdc-ripple-upgraded" type="button" >Approve</button></a>
                <a href="{{route('kyc.admin-reject-email',$kyc->user_id)}}" style="text-decoration: none; margin-left:200px;"><button class="btn btn-danger mdc-ripple-upgraded" type="button" >Reject</button></a>
            </div>
    </div>
</div>


@endsection