<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_todo_list', function (Blueprint $table) {
            $table->foreignId('todo_list_id')
                  ->constrained('todo_lists')
                  ->cascadeOnDelete();

            $table->foreignId('category_id')
                  ->constrained()
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_todo_list');
    }
};
