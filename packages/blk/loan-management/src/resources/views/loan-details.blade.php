@extends('admin::admin-dashboard.layouts.app')

@section('content')


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<div class="container-xl p-5">
    <div class="row gx-5">
        <div class="d-flex justify-content-between align-items-end">
            <h2 class="display-6 mb-0">Approved Loans</h2>
            @if(!$loanDetails)
            <a class="small text-decoration-none fw-500 d-inline-flex align-items-center">
                <button class="btn btn-success" type="button" data-bs-toggle="modal" style="text-decoration: none;" data-bs-target="#exampleModalStatic">Enter Loan details</button>
            </a>
            <div class="modal fade" id="exampleModalStatic" tabindex="-1" aria-labelledby="exampleModalStaticLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalStaticLabel">Enter Loan Details</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.get-details')}}" method="post" class="row g-3 needs-validation">
                                @csrf
                                <input type="hidden" value="{{$details->User->id}}" name="user_id">
                                <input type="hidden" value="{{$details->id}}" name="request_id">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Loan Amount In USD</label>
                                    <input type="number" class="form-control" id="validationCustom01" name="loan_amount" value="{{$finalAmount->loan_amount}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Loan Payment Date</label>
                                    <input class="datepicker" name="loan_payment_date" required>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Late Payment Fee In %</label>
                                    <input type="number" class="form-control" id="validationCustom01" name="Late_payment_fee" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Value Ratio</label>
                                    <input type="number" class="form-control" id="validationCustom01" name="value_ratio" required>
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
            @else
            <a class="small text-decoration-none fw-500 d-inline-flex align-items-center">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" style="text-decoration: none;" data-bs-target="#example1ModalStatic">Edit</button>
            </a>
            <div class="modal fade" id="example1ModalStatic" tabindex="-1" aria-labelledby="exampleModalStaticLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalStaticLabel">Edit Loan Details</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.edit-details')}}" method="post" class="row g-3 needs-validation">
                                @csrf
                                <input type="hidden" value="{{$loanDetails->id}}" name="id">
                                <input type="hidden" value="{{$details->User->id}}" name="user_id">
                                <input type="hidden" value="{{$details->id}}" name="request_id">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Loan Amount In USD</label>
                                    <input type="number" class="form-control" id="validationCustom01" name="loan_amount" value="{{$loanDetails->loan_amount}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Loan Payment Date</label>
                                    <input class="datepicker" name="loan_payment_date" value="{{$loanDetails->loan_payment_date}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Late Payment Fee In %</label>
                                    <input type="number" class="form-control" id="validationCustom01" name="Late_payment_fee" value="{{$loanDetails->late_payment_fee}}" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Value Ratio</label>
                                    <input type="number" class="form-control" id="validationCustom01" name="value_ratio" value="{{$loanDetails->value_ratio}}" required>
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
            @endif
        </div>
        <hr class="mt-2 mb-5"> 
        @if($loanDetails) 
        <div class="col-xl-12 col-lg-7 mb-5">
            <div class="card card-raised h-100 overflow-hidden">
                <div class="card-header bg-primary text-white px-4"><div class="fw-500 text-center">Loan Details</div></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <tbody>
                            @if($loanDetails)
                                <tr>
                                    <td class="px-6 border-top">
                                        <div class="d-flex align-items-center">
                                            User Name
                                        </div>
                                    </td>
                                    <td class="px-6 border-top">{{$details->User->name}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 border-top">
                                        <div class="d-flex align-items-center">
                                            Loan Amount
                                        </div>
                                    </td>
                                    <td class="px-6 border-top">{{$loanDetails->loan_amount}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 border-top">
                                        <div class="d-flex align-items-center">
                                            Loan Payment Date
                                        </div>
                                    </td>
                                    <td class="px-6 border-top">{{$loanDetails->loan_payment_date}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 border-top">
                                        <div class="d-flex align-items-center">
                                            Late Payment Fee In %
                                        </div>
                                    </td>
                                    <td class="px-6 border-top">{{$loanDetails->late_payment_fee}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 border-top">
                                        <div class="d-flex align-items-center">
                                            Value Ratio
                                        </div>
                                    </td>
                                    <td class="px-6 border-top">{{$loanDetails->value_ratio}}</td>
                                </tr>
                                @else
                                <tr>
                                    <td class="px-6 border-top">
                                        <div class="d-flex align-items-center">
                                        No Loan Details Found
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if(!$duePaymentDetails)
        <div class="d-flex justify-content-between align-items-end">
            <h2 class="display-6 mb-0">Due Payment Details</h2>
            <a class="small text-decoration-none fw-500 d-inline-flex align-items-center">
                <button class="btn btn-success" type="button" data-bs-toggle="modal" style="text-decoration: none;" data-bs-target="#duePayment">Enter Due Payment Details</button>
            </a>   
            <div class="modal fade" id="duePayment" tabindex="-1" aria-labelledby="exampleModalStaticLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalStaticLabel">Enter Due payment Details</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.get-due-payment')}}" method="post" class="row g-3 needs-validation">
                                @csrf
                                <input type="hidden" value="{{$details->User->id}}" name="user_id">
                                <input type="hidden" value="{{$details->id}}" name="request_id">
                                <input type="hidden" value="{{$loanDetails->id}}" name="loan_details_id">
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Loan Amount Paid</label>
                                    <input type="number" class="form-control" id="validationCustom01" name="loan_amount_paid" required>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Date</label>
                                    <input class="date" name="loan_payment_paid_date" required>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="form-label">Payment Mode</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="payment_mode" required>
                                    
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
        </div>
        @else 
        <!-- <div class="d-flex justify-content-between align-items-end">
            <h2 class="display-6 mb-0">Due Payment Details</h2>
            <hr class="mt-2 mb-5">
            <div class="col-xl-12 col-lg-7 mb-5">
                <div class="card card-raised h-100 overflow-hidden">
                    <div class="card-header bg-primary text-white px-4"><div class="fw-500 text-center">Due Payment Details</div></div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <tbody>
                                    <tr>
                                        <td class="px-6 border-top">
                                            <div class="d-flex align-items-center">
                                                Loan Amount Paid
                                            </div>
                                        </td>
                                        <td class="px-6 border-top">{{$duePaymentDetails->loan_amount_paid}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 border-top">
                                            <div class="d-flex align-items-center">
                                                Date
                                            </div>
                                        </td>
                                        <td class="px-6 border-top">{{$duePaymentDetails->loan_payment_paid_date}}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 border-top">
                                            <div class="d-flex align-items-center">
                                                Payment Mode
                                            </div>
                                        </td>
                                        <td class="px-6 border-top">{{$duePaymentDetails->payment_mode}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="col-xl-12 col-lg-7 mb-5">
            <div class="card card-raised h-100 overflow-hidden">
                <div class="card-header bg-primary text-white px-4"><div class="fw-500 text-center">Due Payment Details</div></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <tbody>
                                <tr>
                                    <td class="px-6 border-top">
                                        <div class="d-flex align-items-center">
                                        Loan Amount Paid
                                        </div>
                                    </td>
                                    <td class="px-6 border-top">{{$duePaymentDetails->loan_amount_paid}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 border-top">
                                        <div class="d-flex align-items-center">
                                        Date
                                        </div>
                                    </td>
                                    <td class="px-6 border-top">{{$duePaymentDetails->loan_payment_paid_date}}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 border-top">
                                        <div class="d-flex align-items-center">
                                        Payment Mode
                                        </div>
                                    </td>
                                    <td class="px-6 border-top">{{$duePaymentDetails->payment_mode}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

<script>
    $('.datepicker').datepicker({
        uiLibrary: 'bootstrap5'
    });
    $('.date').datepicker({
        uiLibrary: 'bootstrap5'
    });
</script>



@endsection

