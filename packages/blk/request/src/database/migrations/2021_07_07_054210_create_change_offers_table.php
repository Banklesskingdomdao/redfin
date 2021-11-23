<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_offers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('admin_id')->nullable();
            // $table->foreign('admin_id')->references('id')->on('admin')->onDelete('cascade')->nullable();
            $table->uuid('user_id')->nullable();  
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('request_id');
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');
            $table->integer('loan_amount');
            $table->string('description');
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
        Schema::dropIfExists('change_offers');
    }
}
