<?php

namespace Blk\LoanManagement\App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Blk\LoanManagement\App\Models\DuePaymentDetails;


class AdminDuePaymentController extends Controller
{
    public function __construct(DuePaymentDetails $duePaymentDetails)
    {
        $this->duePaymentDetails = $duePaymentDetails;
    }

    public function getDuePayment(Request $request)
    {
        $this->duePaymentDetails->create($request->all());
        return back()->with('success','Payment Details Added successfully');
    }

}
