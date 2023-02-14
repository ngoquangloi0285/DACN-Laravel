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
        Schema::create('nql_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("image")->nullable();
            $table->string("slug");
            $table->integer("parent_id")->unsigned();
            $table->integer("sort_order")->unsigned();
            $table->string('metakey');
            $table->string('metadesc');
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->boolean('trash', 2)->nullable();
            $table->boolean("status",2);
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
        Schema::dropIfExists('nql_category');
    }
};
