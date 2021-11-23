<?php

use Illuminate\Support\Facades\Route;
use Blk\User\App\Http\Controllers\DashBoardController;



Route::group(['middleware' => ['web','auth','verified','UserAccess']], function() {

    Route::get('/dashboard', [DashboardController::class, 'dashBoard']);

});