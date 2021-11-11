<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLoginDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_login_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('login_date');
            $table->string('login_time');
            $table->string('lunch_time_start');
            $table->string('lunch_time_end');
            $table->string('logout_time');
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
        Schema::dropIfExists('user_login_details');
    }
}
