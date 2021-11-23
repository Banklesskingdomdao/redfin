<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('condition_id');
            $table->foreign('condition_id')->references('id')->on('property_conditions')->onDelete('cascade');
            $table->uuid('type_id');
            $table->foreign('type_id')->references('id')->on('property_types')->onDelete('cascade');
            $table->text('property_address');
            $table->text('property_location');
            $table->text('property_description');
            $table->float('monthly_income');
            $table->float('yearly_income');
            $table->float('property_value');
            $table->float('amount_of_existing_loan');
            $table->float('amount_of_loan_needed');
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
        Schema::dropIfExists('request');
    }
}
