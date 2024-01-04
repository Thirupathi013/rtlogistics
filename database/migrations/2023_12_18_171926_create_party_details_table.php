<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('party_details', function (Blueprint $table) {
            $table->id();
            $table->string('party_name', 255);
            $table->string('party_add1', 255);
            $table->string('party_add2', 255);
            $table->string('party_email', 15);
            $table->string('party_phoneno', 25);
            $table->string('party_c_person', 100);
            $table->string('party_mobile', 15);
            $table->string('party_gstno', 15);
            $table->string('party_payment_type', 1);
            $table->boolean('status')->default(0);
            $table->foreignId('marketing_executive_id')
                    ->constrained()
                    ->onDelete('cascade');


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
        Schema::dropIfExists('party_details');
    }
}
