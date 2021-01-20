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
            $table->unsignedBigInteger('clearance_id')->nullable();
            $table->unsignedBigInteger('clearance_inspector_id')->nullable();
            $table->string('control_number')->nullable();
            $table->string('cedula_number')->nullable();
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
            $table->string('business_type');
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('requirements_approved_at')->nullable();
            $table->timestamp('inspected_at')->nullable();
            $table->timestamp('signed_at')->nullable();
            $table->timestamp('printed_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->timestamp('renew_completed_at')->nullable();
            $table->timestamp('renew_requirements_approved_at')->nullable();
            $table->timestamp('renew_inspected_at')->nullable();
            $table->timestamp('renew_signed_at')->nullable();
            $table->timestamp('renew_printed_at')->nullable();
            $table->timestamp('renew_rejected_at')->nullable();
            $table->timestamp('expired_at')->nullable();
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
        Schema::dropIfExists('clearances');
    }
}
