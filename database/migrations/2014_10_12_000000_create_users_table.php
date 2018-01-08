<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            Schema::dropIfExists('users');
            $table->increments('id');
            $table->string('name');
            $table->string('email', 127)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->tinyInteger('type')->default(0);
            // 0 - Normal
            // 1 - Member
            // 2 - Sub-Lead
            // 3 - Leader
            $table->Integer('team_id')->unsigned()->nullable();
            $table->foreign('team_id')->references('id')->on('teams');
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
        Schema::dropIfExists('users');
    }
}
