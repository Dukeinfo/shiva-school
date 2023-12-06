<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhyusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whyuses', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable(); 
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable(); 
            $table->string('heading')->nullable(); 
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->string('title_guj')->nullable();
            $table->string('sub_title_guj')->nullable(); 
            $table->string('heading_guj')->nullable(); 
            $table->text('description_guj')->nullable();
            $table->string('slug_guj')->nullable();
            $table->string('yearexcellence')->nullable();
            $table->string('expteachers')->nullable();
            $table->string('notalumna')->nullable();
            $table->string('image')->nullable();  
            $table->string('thumbnail')->nullable();
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
        Schema::dropIfExists('whyuses');
    }
}
