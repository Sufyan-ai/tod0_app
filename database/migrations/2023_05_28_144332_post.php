<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('posts')){
            Schema::create('posts', function (Blueprint $table) {
                    $table->id();
                    $table->string('thumbnail')->nullable();
                    $table->string('description')->nullable();
                    $table->boolean('status')->default(false);
                    $table->integer('category_id');
                    $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
