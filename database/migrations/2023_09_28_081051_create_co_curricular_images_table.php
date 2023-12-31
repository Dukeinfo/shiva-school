<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoCurricularImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_curricular_images', function (Blueprint $table) {
            $table->id();
            $table->integer('co_curricular_facility_id');
            $table->string('multi_images')->nullable();  
            $table->string('thumbnail')->nullable();
            $table->string('type')->nullable();
            $table->string('link')->nullable();
            $table->integer('sort_id')->nullable(); 
            $table->enum('status', ['Active', 'Inactive', 'Deleted'])->default('Active');
            $table->ipAddress('ip_address')->nullable();
            $table->string('login')->nullable();
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
        Schema::dropIfExists('co_curricular_images');
    }
}
