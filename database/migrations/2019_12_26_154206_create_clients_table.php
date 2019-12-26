<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->string('name');
            $table->string('family');
            $table->string('archive_code');
            $table->string('birth');
            $table->string('national_code');
            $table->string('mobile');
            $table->text('home_address');
            $table->string('home_phone');
            $table->text('work_address');
            $table->string('work_phone');
            $table->string('economical_code');
            $table->string('fax');
            $table->string('work_field');
            $table->text('text');
            $table->boolean('gender')->nullable();
            $table->boolean('type')->default(1); // حقیقی : ۱ - حقوقی : ۰
            $table->boolean('vip')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
