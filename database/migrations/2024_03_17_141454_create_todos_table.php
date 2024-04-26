<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('note_id');
            $table->string('title');
            $table->boolean('completed')->default(false);
            $table->dateTime('completed_at')->nullable();
            $table->timestamps();
        });
        
        Schema::table('todos', function (Blueprint $table) {
            $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('todos');
    }
}