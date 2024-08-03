<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormFieldResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'form_field_responses', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('form_id');
            $table->integer('name_id');
            $table->integer('email_id');
            $table->integer('phone_id');
            $table->integer('address_id');
            $table->integer('city_id');
            $table->integer('state_id');
            $table->integer('country_id');
            $table->integer('postal_code');
            $table->integer('description_id');
            $table->integer('user_id');
            $table->string('type')->nullable();
            $table->timestamps();
        }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_field_responses');
    }
}