<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();  
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('request_id');
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');      
            $table->integer('loan_amount');
            $table->string('loan_payment_date');
            $table->integer('late_payment_fee');
            $table->integer('value_ratio');
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
        Schema::dropIfExists('loan_details');
    }
}
