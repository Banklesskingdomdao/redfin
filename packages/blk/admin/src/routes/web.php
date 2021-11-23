<?php

use Blk\Admin\App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;
use Blk\Admin\App\Http\Controllers\LoginController;


Route::group(['middleware' => 'web'], function() {

    Route::get('/admin/login', [LoginController::class, 'login'])->name('admin.login.page');
    Route::post('/admin/dashboard',[LoginController::class, 'doLogin'])->name('admin.users');
    Route::get('/admin/users',[UserManagementController::class,'index'])->name('admin.index')->middleware('login');
    Route::get('/admin/logout',[LoginController::class,'logout'])->name('admin.logout');
    Route::post('/admin/index', [LoginController::class, 'doLogin'])->name('admin.index');
    Route::get('/users/list', [LoginController::class, 'list'])->name('admin.list');
    Route::get('/block-user/{id}', [UserManagementController::class, 'blockUser'])->name('admin.block-user');
    Route::get('/admin/forgot-password', [LoginController::class, 'forgotPassword'])->name('admin.forgot-password');
    Route::post('/admin/get-email', [LoginController::class, 'getEmail'])->name('admin.get-email');
    Route::get('/admin/reset-password/{id}', [LoginController::class, 'resetPassword'])->name('admin.reset-password');
    Route::post('/admin/get-new-password', [LoginController::class, 'getNewPassword'])->name('admin.get-new-password');

});


