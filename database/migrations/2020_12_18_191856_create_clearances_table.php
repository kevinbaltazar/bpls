<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClearancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clearances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_type_id');
            $table->unsignedBigInteger('clearance_inspector_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('personal_address');
            $table->string('business_name');
            $table->string('business_address');
            $table->date('birthdate');
            $table->string('birthplace');
            $table->string('mobile_number');
            $table->string('telephone_number')->nullable();
            $table->timestamp('requirements_approved_at')->nullable();
            $table->timestamp('inspected_at')->nullable();
            $table->timestamp('signed_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->timestamps();

            // $table->foreign('business_type_id')
            // ->references('id')
            // ->on('business_types')
            // ->onDelete('cascade');

            // $table->foreign('clearance_inspector_id')
            // ->references('id')
            // ->on('clearance_inspectors')
            // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clearances');
    }
}
