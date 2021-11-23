@extends('user::layouts.app')


@section('content')

<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Loan Request </span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                            </li>  
                            <li class="breadcrumb-item"><a href="/loan">Loan Request</a>
                            </li>  
                            <li class="breadcrumb-item active">View Page
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
                                <h6 class="mb-2 mt-2">View Loan Request Form</h6>
                                <table class="striped">
                                    <tbody>
                                    <tr>
                                        <td>Property Condition:</td>
                                        <td>{{$request->propertyCondition->condition}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Type:</td>
                                        <td>{{$request->propertyType->type}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Address:</td>
                                        <td>{{$request->property_address}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Location:</td>
                                        <td>{{$request->property_location}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Description:</td>
                                        <td>{{$request->property_description}}</td>
                                    </tr>
                                    <tr>
                                        <td>Monthly Income In $:</td>
                                        <td>{{$request->monthly_income}}</td>
                                    </tr>
                                    <tr>
                                        <td>Yearly Income In $:</td>
                                        <td>{{$request->yearly_income}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Value In $:</td>
                                        <td>{{$request->property_value}}</td>
                                    </tr>
                                    <tr>
                                        <td>Amount Of Existing Loan In $:</td>
                                        <td>{{$request->amount_of_existing_loan}}</td>
                                    </tr>
                                    <tr>
                                        <td>Amount Of Loan Needed In $:</td>
                                        <td>{{$request->amount_of_loan_needed}}</td>
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

        @if(count($changeOffer)>1)
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card-title">Changes Offers List</h4>
                            <div class="row">
                                <div class="col s12">
                                    <table id="page-length-option" class="display">
                                        <thead>
                                            <tr>
                                                <th>Loan Amount</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($changeOffer as $key => $offer)
                                            @if(!$loop->last)         
                                            <tr>
                                                <td>{{$offer->loan_amount}}</td>
                                                <td>{{$offer->description}}</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="col s12">
            <div class="container">
                <div class="section section-data-tables">
                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <div class="card-content">
                                    <h4 class="card-title">Change Offers</h4>
                                    <div class="row">
                                        <div class="col s12">
                                        <h4 class="card-title">IF You Want you Change Offer Click The Button</h6>
                                            <br>
                                            <a class="waves-effect waves-light btn modal-trigger" style="margin-left:300px;" href="#addmodal">Change Offers</a>
                                            <br>
                                            <div id="addmodal" class="modal">
                                                <div class="modal-content">
                                                    <h5>Change Offers</h5>
                                                    <form method="post" action="{{route('user.change-offer')}}">
                                                        @csrf
                                                        <input id="invisible_id" name="request_id" type="hidden" value="{{$request->id}}">
                                                        <div class="form-group">
                                                            <input type="number" name="loan_amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Loan Amount In $" required>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Description" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col s12 display-flex justify-content-end form-action">
                                                                <button type="submit" class="btn indigo waves-effect waves-light mr-1">Add</button>
                                                                <button type="reset" class="modal-action modal-close btn btn-light-pink waves-effect waves-light">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    <div class="content-overlay"></div>
</div>
@endsection