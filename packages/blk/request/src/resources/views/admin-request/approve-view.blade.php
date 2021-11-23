@extends('admin::admin-dashboard.layouts.app')

@section('content')

<div class="container-xl p-5">
    <div class="row gx-5">
        <div class="col-xl-12 col-lg-7 mb-5">
            <div class="card card-raised h-100 overflow-hidden">
                <div class="card-header bg-primary text-white px-4"><div class="fw-500">Approved Loan Details</div></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <tbody class="align-middle"></tbody>
                            <tbody>
                                <tr>
                                    <td class="px-6 border-top">
                                        <div class="d-flex align-items-center">
                                            Name
                                        </div>
                                    </td>
                                    <td class="px-6 border-top">{{$approveView->User->name}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6">
                                        <div class="d-flex align-items-center">
                                           Property Condition 
                                        </div>
                                    </td>
                                    <td class="px-6">{{$approveView->propertyCondition->condition}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6">
                                        <div class="d-flex align-items-center">
                                        Property Type
                                        </div>
                                    </td>
                                    <td class="px-6">{{$approveView->propertyType->type}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6">
                                        <div class="d-flex align-items-center">
                                        Property Address
                                        </div>
                                    </td>
                                    <td class="px-6">{{$approveView->property_address}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6">
                                        <div class="d-flex align-items-center">
                                        Property Location
                                        </div>
                                    </td>
                                    <td class="px-6">{{$approveView->property_location}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6">
                                        <div class="d-flex align-items-center">
                                        Property Description
                                        </div>
                                    </td>
                                    <td class="px-6">{{$approveView->property_description}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6">
                                        <div class="d-flex align-items-center">
                                        Monthly Income In $
                                        </div>
                                    </td>
                                    <td class="px-6">{{$approveView->monthly_income}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6">
                                        <div class="d-flex align-items-center">
                                        Yearly Income In $
                                        </div>
                                    </td>
                                    <td class="px-6">{{$approveView->yearly_income}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6">
                                        <div class="d-flex align-items-center">
                                        Property Value $
                                        </div>
                                    </td>
                                    <td class="px-6">{{$approveView->property_value}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6">
                                        <div class="d-flex align-items-center">
                                        Amount of existing loans against the property In $
                                        </div>
                                    </td>
                                    <td class="px-6">{{$approveView->amount_of_existing_loan}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6">
                                        <div class="d-flex align-items-center">
                                        Amount of Loan needed In $
                                        </div>
                                    </td>
                                    <td class="px-6">{{$approveView->amount_of_loan_needed}}</td>
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
                <div class="card-header bg-primary text-white px-4"><div class="fw-500">Final Loan Amonut</div></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <tbody class="align-middle"></tbody>
                            <tbody>
                                <tr>
                                    <td class="px-6 border-top">
                                        <div class="d-flex align-items-center">
                                            Admin Approved Loan Amount In $
                                        </div>
                                    </td>
                                    <td class="px-6 border-top">{{$changeOffers->loan_amount}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection