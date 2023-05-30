<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 80)->nullable();
            $table->string('last_name', 120)->nullable();
            $table->string('email', 255)->unique();
            $table->string('phone_number', 30)->nullable();
            $table->integer('promocode_id')->unsigned()->nullable();       // promocode_id, discount assigned to a customer
            $table->timestamps();
            $table->softDeletes();
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
};
