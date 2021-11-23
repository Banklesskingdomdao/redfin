<?php

use Illuminate\Support\Facades\Route;
 
use Blk\Request\App\Http\Controllers\RequestController;
use Blk\Request\App\Http\Controllers\RequestViewController;



Route::group(['middleware' => ['web','auth','verified','UserAccess']], function() {

Route::get('/loan/request', [RequestController::class, 'request'])->name('user.request');
Route::get('/loan', [RequestController::class, 'requestList'])->name('user.request-list');
Route::post('/get-request', [RequestController::class, 'getRequest'])->name('user.get-request');
Route::get('/loan/view/{id}', [RequestController::class, 'viewLoan'])->name('user.view-Loan-form');
Route::post('user/change-offer', [RequestController::class, 'changeOffer'])->name('user.change-offer');
Route::get('/your-loans', [RequestController::class, 'yourLoan'])->name('user.your-loans');

});

Route::group(['middleware' => 'web'], function() {

Route::get('admin/request-list', [RequestViewController::class, 'requestList'])->name('admin.request-list');
Route::get('admin/request-list/request-view/{id}', [RequestViewController::class, 'requestView'])->name('admin.request-view');
Route::get('admin-send-email/{user_id}', [RequestViewController::class, 'sendEmail'])->name('Request.admin-send-email');
Route::get('admin-reject-email/{user_id}', [RequestViewController::class, 'rejectEmail'])->name('Request.admin-reject-email');
Route::post('admin/change-offer', [RequestViewController::class, 'changeOffer'])->name('admin.change-offer');
Route::get('/admin/approved/approved-loans', [RequestViewController::class, 'approvedLoan'])->name('admin.approved-loans');
Route::get('admin/approved', [RequestViewController::class, 'approved'])->name('admin.approved');
Route::get('admin/approved/approve-view/{id}', [RequestViewController::class, 'approveView'])->name('admin.approve-view');

});