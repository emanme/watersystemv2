<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('account_number')->unique();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('civil_status');
            $table->string('purok')->nullable();
            $table->string('setio')->nullable();
            $table->string('barangay');
            $table->string('contact_number')->nullable();
            $table->enum('type', ['residential', 'commercial'])->default('residential');
            $table->enum('status', ['active', 'disconnected', 'cut'])->default('active');
            $table->string('establishment_name')->nullable();
            $table->string('meter_number')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
