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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->longText('description')->nullable();
            $table->string('slug')->nullable();
            $table->string('name_guj')->nullable();
            $table->string('position_guj')->nullable();
            $table->longText('description_guj')->nullable();
            $table->string('slug_guj')->nullable();
            $table->string('photo')->nullable(); 
            $table->string('thumbnail')->nullable(); 
            $table->bigInteger('rating')->nullable(); 
            $table->bigInteger('sort_id')->nullable();
            $table->string('link')->nullable(); 

            $table->enum('status', ['Active', 'Inactive', 'Deleted'])->default('Active');
            $table->ipAddress('ip_address')->nullable();
            $table->string('login')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('testimonials');
    }
};
