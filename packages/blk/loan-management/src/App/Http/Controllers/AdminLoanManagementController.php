<?php

namespace Blk\LoanManagement\App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Blk\Request\App\Models\RequestForm;
use Blk\Request\App\Models\ChangeOffer;
use Blk\LoanManagement\App\Models\LoanDetails;
use Blk\LoanManagement\App\Models\DuePaymentDetails;




class AdminLoanManagementController extends Controller
{
    public function __construct(RequestForm $requestForm ,ChangeOffer $changeOffer ,LoanDetails $loandetails ,DuePaymentDetails $duePaymentDetails)
    {
        $this->requestForm = $requestForm;
        $this->changeOffer = $changeOffer;
        $this->loandetails = $loandetails;
        $this->duePaymentDetails = $duePaymentDetails;
    }

    public function loanDetails($id)
    {
        $details = $this->requestForm->where('id',$id)->with('User')->first();
        $finalAmount = $this->changeOffer->where('request_id',$id)->latest()->first();
        $loanDetails = $this->loandetails->where('request_id',$id)->first();
        $duePaymentDetails = $this->duePaymentDetails->where('request_id',$id)->first();
        return view('loan-management::loan-details',compact('finalAmount','details','loanDetails','duePaymentDetails'));
    }


    public function getDetails(Request $request)
    {
        $this->loandetails->create($request->all());    
        return back()->with('success','details added successfully');
    }

    public function editDetails(Request $request)
    {
        $this->loandetails->where('id',$request->id)->update($request->except(['_token']));
        return back()->with('success','Details Updated Successfully');
    }
}
