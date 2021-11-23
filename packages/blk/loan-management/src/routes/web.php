<?php

use Illuminate\Support\Facades\Route;
use Blk\LoanManagement\App\Http\Controllers\AdminLoanManagementController;
use Blk\LoanManagement\App\Http\Controllers\AdminDuePaymentController;


Route::group(['middleware' => ['web']], function() {

Route::get('/admin/approved/loan-details/{id}', [AdminLoanManagementController::class, 'loanDetails'])->name('admin.loan-details');
Route::post('/admin/approved/get-details', [AdminLoanManagementController::class, 'getDetails'])->name('admin.get-details');
Route::post('/admin/approved/edit-details', [AdminLoanManagementController::class, 'editDetails'])->name('admin.edit-details');
Route::post('/admin/approved/get-due-payment', [AdminDuePaymentController::class, 'getDuePayment'])->name('admin.get-due-payment');

});