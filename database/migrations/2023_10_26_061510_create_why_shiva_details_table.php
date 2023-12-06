<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhyShivaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('why_shiva_details', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable(); 
            $table->string('sub_heading')->nullable();
            $table->text('description')->nullable();
            $table->string('item1')->nullable();
            $table->string('item2')->nullable(); 
            $table->string('item3')->nullable();
            $table->string('item4')->nullable();  
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
        Schema::dropIfExists('why_shiva_details');
    }
}
