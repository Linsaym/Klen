<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->foreignId('pot_id')->nullable()->constrained('pots');
            $table->integer('height')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
