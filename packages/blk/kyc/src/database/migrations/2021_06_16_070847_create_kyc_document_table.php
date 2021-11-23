<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKycDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('kyc_document', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('kyc_id');
            $table->foreign('kyc_id')->references('id')->on('kyc')->onDelete('cascade');
            $table->uuid('type_id');
            $table->foreign('type_id')->references('id')->on('kyc_types')->onDelete('cascade');
            $table->string('front_image');
            $table->string('back_image');
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
        //
        Schema::dropIfExists('kyc_document');

    }
}
