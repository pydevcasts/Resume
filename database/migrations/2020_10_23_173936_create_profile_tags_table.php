<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_tags', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->integer('profile_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned()->index();
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
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
        Schema::dropIfExists('profile_tags');
    }
}
