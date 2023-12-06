<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageHeadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_headings', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_id');
            $table->string('pname')->nullable(); 
            $table->string('pname_eng')->nullable(); 
            $table->string('pname_title')->nullable();  
            $table->string('pname_heading')->nullable();  
            $table->string('pname_subheading');
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
        Schema::dropIfExists('page_headings');
    }
}
