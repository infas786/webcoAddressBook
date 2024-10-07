<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); 
            $table->string('cus_name'); 
            $table->string('company'); 
            $table->string('email'); 
            $table->string('phone'); 
            $table->string('post');
            $table->timestamps(); 
        });

        Schema::create('address_lists', function (Blueprint $table) {
            $table->id(); 
            $table->string('address_no'); 
            $table->string('street'); 
            $table->string('city'); 
            $table->unsignedBigInteger('cus_id'); 
            $table->foreign('cus_id')->references('id')->on('employees')->onDelete('cascade'); 
            $table->timestamps(); 
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('address_list');
        Schema::dropIfExists('employees');
    }
};
