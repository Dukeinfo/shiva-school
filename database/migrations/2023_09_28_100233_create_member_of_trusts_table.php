<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberOfTrustsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_of_trusts', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable(); 
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->text('description')->nullable();
            $table->string('name_guj')->nullable();
            $table->string('designation_guj')->nullable();
            $table->text('description_guj')->nullable();
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
        Schema::dropIfExists('member_of_trusts');
    }
}
