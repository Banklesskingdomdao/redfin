@extends('user::layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/vendors/flag-icon/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/vendors/dropify/css/dropify.min.css')}}">
@endsection
@section('content')


<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Loan Request</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                            </li>  
                            <li class="breadcrumb-item"><a href="/loan">Loan Request</a>
                            </li> 
                            <li class="breadcrumb-item active">View Form
                            </li> 
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="col s12 m12 l12">
                    <div id="Form-advance" class="card card card-default scrollspy">
                        <div class="card-content">
                            <form action="{{route('user.get-request')}}" method="post">
                                @csrf
                                <div class="row">
                                <div class="input-field col m6 s12">
                                    <input id="first_name01" type="text" name="property_address" required>
                                    <label for="name">Property Address</label>
                                </div>
                                <input id="invisible_id" name="user_id" type="hidden" value="{{$userId}}">
                                <div class="input-field col m6 s12">
                                    <select class="form-select" aria-label="Default select example" id="selectCategory" name="condition_id" >
                                    <option selected disabled>Select Property Condition</option>
                                    @foreach ($conditions as $condition)    
                                    <option value="{{$condition->id}}" required>{{$condition->condition}}</option>
                                    @endforeach
                                    </select>
                                </div> 
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                    <input id="first_name01" type="text" name="property_location" required>
                                    <label for="name">Location of a Property</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="first_name01" type="text" name="property_description" required>
                                        <label for="name">Property Description</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <select class="form-select" aria-label="Default select example" id="selectCategory" name="type_id" >
                                        <option selected disabled>Select Property type</option>
                                        @foreach ($types as $type)    
                                        <option value="{{$type->id}}" required>{{$type->type}}</option>
                                        @endforeach
                                        </select>
                                    </div> 
                                    <div class="input-field col m6 s12">
                                        <input id="first_name01" type="number" name="monthly_income" required>
                                        <label for="name">Number of Units Monthly income in $</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input id="first_name01" type="number" name="yearly_income" required>
                                        <label for="name">Number of Units Yearly income in $</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="first_name01" type="number" name="property_value" required>
                                        <label for="name">Property Value in $</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input id="first_name01" type="number" name="amount_of_existing_loan" required>
                                        <label for="name">Amount of existing loans against the property in $</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="first_name01" type="number" name="amount_of_loan_needed" required>
                                        <label for="name">Amount of Loan needed in $</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <a href="" style="text-decoration: none;"><button class="btn cyan waves-effect waves-light right" type="submit">Submit
                                        <i class="material-icons right">send</i>
                                        </button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <div class="content-overlay"></div>
    </div>
</div>


@endsection