<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_informations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('company_name',150);
            $table->unsignedInteger('user_province');
            $table->unsignedInteger('user_district');
            $table->string('gsm',15)->unique();;
            $table->string('gsm2',15)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('phone2',15)->nullable();
            $table->timestamps();
        });

        Schema::table('user_informations', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_informations');
    }
}
