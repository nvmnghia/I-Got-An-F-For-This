<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tickets');
        Schema::create('tickets', function (Blueprint $table) {

            $table->increments('id'); //ID ban ghi
            $table->string('subject'); //Ten cong viec
            $table->text('content'); //Noi dung giao viec
            $table->integer('created_by')->unsigned(); //Nguoi giao viec
            $table->foreign('created_by')->references('id')->on('users');
            $table->tinyInteger('status');
            //Trang thai cua cong viec
            // 1 - new
            // 2 - in process
            // 3 - resolved
            // 4 - feedback
            // 5 - closed
            // 6 - cancelled
            $table->tinyInteger('priority');
            //Muc do uu tien 
            // 1 - thap
            // 2 - binh thuong
            // 3 - cao
            // 4 - khan cap
            $table->dateTime('deadline'); //Ngay phai hoan thanh cong viec
            $table->unsignedInteger('assigned_to')->nullable(); //Nguoi thuc hien cong viec
            $table->foreign('assigned_to')->references('id')->on('users');
            $table->boolean('rating')->nullable();
            //Danh gia nguoi thuc hien cong viec
            // 0 - khong hai long
            // 1 - hai long
            $table->integer('team_id')->unsigned();
            $table->dateTime('resolved_at')->nullable(); //Thoi gian hoan thanh cong viec
            $table->dateTime('closed_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('tickets', function($table) {
            $table->foreign('team_id')->references('id')->on('teams');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
