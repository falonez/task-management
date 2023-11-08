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
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->foreign('user_assign_task')->references('id')->on('users')->onDelete('cascade');
            $table->string('title', 100);
            $table->text('description');
            $table->enum('urgency', ['low', 'medium', 'high']);
            $table->time('duration');
            $table->dateTime('deadline');
            $table->unsignedBigInteger('user_assign_task')->nullable();
            $table->unsignedBigInteger('user_create_task');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
