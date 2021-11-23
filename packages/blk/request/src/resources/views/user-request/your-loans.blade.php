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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Your Loans</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                            </li>   
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <h4 class="card-title">Loan List</h4>
                        <div class="row">
                            <div class="col s12">
                                <table id="page-length-option" class="display">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Loan Request Id</th>
                                            <th>Property Address</th>
                                            <th>Final Amount Of Loan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($userLoans as $key => $loan)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$loan->RequestForm->id}}</td> 
                                            <td>{{$loan->RequestForm->property_address}}</td>
                                            <td>{{$loan->loan_amount}}</td>
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