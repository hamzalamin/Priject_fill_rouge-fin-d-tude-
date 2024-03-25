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
            Schema::create('books', function (Blueprint $table){
                $table->id();
                $table->string('name');
                $table->text('description');
                $table->integer('number');
                $table->float('price');
                $table->string('language');
                $table->string('writer');
                $table->string('image');
                $table->enum('type', ['reservation', 'buy']);
                $table->date('date')->nullable();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('categorys_id')->constrained()->onDelete('cascade');
                $table->timestamps(); 
            });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
