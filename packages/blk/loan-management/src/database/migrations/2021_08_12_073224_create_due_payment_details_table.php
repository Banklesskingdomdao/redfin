<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('due_payment_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();  
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('request_id');
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade'); 
            $table->uuid('loan_details_id');
            $table->foreign('loan_details_id')->references('id')->on('loan_details')->onDelete('cascade');           
            $table->integer('loan_amount_paid');
            $table->string('loan_payment_paid_date');
            $table->string('payment_mode');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('due_payment_details');
    }
}
