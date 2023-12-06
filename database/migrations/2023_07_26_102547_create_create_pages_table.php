<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_pages', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_id')->nullable();
            $table->integer('submenu_id')->nullable(); 
            $table->text('heading')->nullable();
            $table->text('slug')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();  
            $table->string('thumbnail')->nullable();
            $table->string('link')->nullable();
            $table->integer('sort_id')->nullable(); 
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
        Schema::dropIfExists('create_pages');
    }
}
