<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            // relasi user
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // data task
            $table->string('title');
            $table->text('description')->nullable();

            // status
            $table->boolean('is_done')->default(false);

            // relasi priority (opsional tapi rapi)
            $table->foreignId('priority_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
