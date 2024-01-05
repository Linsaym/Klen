<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->date('deadline');
            $table->integer('estimated_hours');
            $table->boolean('completed');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
