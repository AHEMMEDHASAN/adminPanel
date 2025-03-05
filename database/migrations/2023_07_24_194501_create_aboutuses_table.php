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
        Schema::create('aboutuses', function (Blueprint $table) {
            $table->id();
            $table->string('main_content_type')->nullable();
            $table->string('left_content_type')->nullable();
            $table->string('left_title')->nullable();
            $table->longText('left_image')->nullable();
            $table->longText('left_content')->nullable();
            $table->string('right_content_type')->nullable();
            $table->string('right_title')->nullable();
            $table->longText('right_image')->nullable();
            $table->longText('right_content')->nullable();
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
        Schema::dropIfExists('aboutuses');
    }
};
