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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Loan Request </span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                            </li>   
                        </ol>
                    </div>
                    <div class="col s2 m6 l6">
                        <a class="waves-effect waves-light btn modal-trigger right" href="{{route('user.request')}}">Add Request Loan</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card-title">Loan Request List</h4>
                            <div class="row">
                                <div class="col s12">
                                    <table id="page-length-option" class="display">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Location Of Property</th>
                                                <th>Amount Of Loan Needed in USD</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($requestForm as $key => $request) 
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$request->property_location}}</td> 
                                                <td>{{$request->amount_of_loan_needed}}</td>
                                                <td>
                                                <a class="waves-effect waves-light btn indigo modal-trigger mb-1 mr-1" href="{{route('user.view-Loan-form',$request->id)}}">View</a>
                                                </td>
                                            </tr>
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
    <div class="content-overlay"></div>
</div>                    

@endsection

