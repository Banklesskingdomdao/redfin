@extends('admin::admin-dashboard.layouts.app')

@section('content')


<div class="container-xl p-5">
    <div class="row gx-5">
        <div class="col-xl-12 col-lg-7 mb-5">
            <div class="card card-raised h-100 overflow-hidden">
                <div class="card-header bg-primary text-white px-4"><div class="fw-500 text-center">User Details</div></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <tbody class="align-middle"></tbody>
                            <tbody>
                                <tr>
                                    <td class="px-6 border-top">
                                        <div class="d-flex align-items-center">
                                            User ID
                                        </div>
                                    </td>
                                    <td class="px-6 border-top">{{$request->User->id}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6">
                                        <div class="d-flex align-items-center">
                                            Name
                                        </div>
                                    </td>
                                    <td class="px-6">{{$request->User->name}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6">
                                        <div class="d-flex align-items-center">
                                            Email
                                        </div>
                                    </td>
                                    <td class="px-6">{{$request->User->email}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <h2 class="display-6 mb-0"><img src="{{ asset('uploads/profile/' . $kycDocument->front_image) }}" style="width: 200px; height:200px;"/></h2>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent position-relative ripple-gray px-4 mdc-ripple-upgraded">{{$kycDocument->KycType->name}} - Front Side Image</div>
            </div>
        </div>
        <div class="col-xl-4 mb-5">
            <div class="card card-raised h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between">
                        <div class="me-4">
                            <h2 class="display-6 mb-0"><img src="{{ asset('uploads/profile/' . $kycDocument->back_image) }}" style="width: 200px; height:200px;"/></h2>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent position-relative ripple-gray px-4 mdc-ripple-upgraded">{{$kycDocument->KycType->name}} - Back Side Image</div>
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
</div>

<div class="container-xl p-5">
    <div class="row gx-5">
        <div class="col-xl-12 col-lg-7 mb-5">
            <div class="card card-raised h-100 overflow-hidden">
                <div class="card-header bg-primary text-white px-4"><div class="fw-500 text-center">Enquiry Form Details</div></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <tbody>
                                <tr>
                                    <td class="px-3 border-top">
                                        <div class="d-flex align-items-center">
                                            Property Condition
                                        </div>
                                    </td>
                                    <td class="px-3 border-top">{{$request->propertyCondition->condition}}</td>
                                    <td class="px-3 border-top">Property Type</td>
                                    <td class="px-3 border-top">{{$request->propertyType->type}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3">
                                        <div class="d-flex align-items-center">
                                        Property Address
                                        </div>
                                    </td>
                                    <td class="px-3">{{$request->property_address}}</td>
                                    <td class="px-3">Property Location</td>
                                    <td class="px-3">{{$request->property_location}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3">
                                        <div class="d-flex align-items-center">
                                        Property Description
                                        </div>
                                    </td>
                                    <td class="px-3">{{$request->property_description}}</td>
                                    <td class="px-3">Monthly Income In $</td>
                                    <td class="px-3">{{$request->User->name}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3">
                                        <div class="d-flex align-items-center">
                                        Yearly Income In $
                                        </div>
                                    </td>
                                    <td class="px-3">{{$request->yearly_income}}</td>
                                    <td class="px-3">Property Value In $</td>
                                    <td class="px-3">{{$request->property_value}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3">
                                        <div class="d-flex align-items-center">
                                        Amount of existing loans against the property In $
                                        </div>
                                    </td>
                                    <td class="px-3">{{$request->amount_of_existing_loan}}</td>
                                    <td class="px-3">Amount of Loan needed In $</td>
                                    <td class="px-3">{{$request->amount_of_loan_needed}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-xl p-5">
    <div class="card card-raised">
        <div class="card-header bg-transparent px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h2 class="card-title mb-0">Change Offers List</h2>
                    <div class="card-subtitle"></div>
                </div>
            </div>
        </div>
        <div class="card-body p-4">
            <!-- Simple DataTables example-->
            <table id="user-table">
                <thead>
                <tr>
                    <th>S.NO</th>
                    <th>Loan Amount in USD</th>
                    <th>Description</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody> 
                    @foreach($changeOffer as $key => $offer)  
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$offer->loan_amount}}</td>
                    <td>{{$offer->description}}</td>
                    @if($offer->status == 3)
                    <td>
                    <a href="{{route('Request.admin-send-email',$request->id)}}" style="text-decoration: none;"><button class="btn btn-success mdc-ripple-upgraded" type="button" >Approve</button></a>
                    <a href="{{route('Request.admin-reject-email',$request->id)}}" style="text-decoration: none;"><button class="btn btn-danger mdc-ripple-upgraded" type="button" >Reject</button></a>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" style="text-decoration: none;" data-bs-target="#exampleModalStatic">Change Offer</button>
                    </td>  
                    @else
                    <td class="text-center">Admin Initialized</td>
                    @endif        
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- Modal-->
    <div class="modal fade" id="exampleModalStatic" tabindex="-1" aria-labelledby="exampleModalStaticLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalStaticLabel">Change Offer</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.change-offer')}}" method="post"> 
                        @csrf
                    <input id="invisible_id" name="id" type="hidden" value="{{$request->id}}">
                        <div class="form-group">
                            <input type="number" name="loan_amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Loan Amount In $" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Description" required>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-text-primary" type="submit">Send</button>
                            <button class="btn btn-text-primary me-2" type="button" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 




<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" ></script>

<script>
    window.addEventListener('DOMContentLoaded', event => {
        // Simple-DataTables
        // https://github.com/fiduswriter/Simple-DataTables/wiki

        const datatablesSimple = document.getElementById('user-table');
     
        if (datatablesSimple) {
            new simpleDatatables.DataTable(datatablesSimple);
        }
    });
</script>


@endsection