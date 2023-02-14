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
        Schema::create('nql_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('image')->nullable();
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->string('title');
            $table->string('content');
            $table->integer('replay_id')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->boolean('trash', 2)->nullable();
            $table->boolean('status',2);
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
        Schema::dropIfExists('nql_contact');
    }
};
