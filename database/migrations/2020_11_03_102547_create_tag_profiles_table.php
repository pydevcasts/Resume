<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_profiles', function (Blueprint $table) {
          
                $table->integer('id');
                $table->unsignedBigInteger('profile_id')->index();
                $table->integer('tag_id')->index();
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
        Schema::dropIfExists('tag_profiles');
    }
}
