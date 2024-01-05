<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('task_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('task');
            $table->foreignId('tag_id')->constrained('tags');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_tags');
    }
};
