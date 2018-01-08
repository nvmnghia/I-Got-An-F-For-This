<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_attributes', function (Blueprint $table){
            $table->increments('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->string('status')->nullable(); // Trang thai cong viec
            $table->string('priority')->nullable(); //Muc do uu tien
            $table->string('rating')->nullable(); //danh gia
            $table->string('reopened')->nullable(); //Mo lai cong viec khi da dong
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_attributes');
    }
}
