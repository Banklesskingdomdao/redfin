<?php

use Illuminate\Support\Facades\Route;
use Blk\Kyc\App\Http\Controllers\UserKycController;
use Blk\Kyc\App\Http\Controllers\AdminKycController;


Route::group(['middleware' => ['web','auth','verified','UserAccess']], function() {

    Route::get('/kyc', [UserKycController::class, 'kyc'])->name('user.kyc');
    Route::post('/kyc/submit', [UserKycController::class, 'kycList'])->name('kyc.user-kyc-list');
    Route::get('/verify-form', [UserKycController::class, 'verify'])->name('kyc.verify-form');
    Route::get('user-send-email/{userId}', [UserKycController::class, 'sendEmail'])->name('kyc.user-send-mail');
    Route::get('kyc-view/{id}', [UserKycController::class, 'viewKyc'])->name('user.view-kyc-form');

});

Route::group(['middleware' => ['web']], function() {

Route::get('admin/kyc-list', [AdminKycController::class, 'kycList'])->name('kyc.admin-kyc-list');
Route::get('admin/kyc-list/{id}', [AdminKycController::class, 'kycView'])->name('admin.kyc-view');
Route::get('send-email/{id}', [AdminKycController::class, 'sendEmail'])->name('kyc.admin-send-email');
Route::get('reject-email/{user_id}', [AdminKycController::class, 'rejectEmail'])->name('kyc.admin-reject-email');

});