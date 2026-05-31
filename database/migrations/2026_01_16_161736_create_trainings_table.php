<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
   Schema::create('trainings', function (Blueprint $table) {
    $table->id();

    $table->string('title');
    $table->string('slug')->unique();   // 👈 ICI
    $table->string('image')->nullable(); // 👈 ICI

    $table->string('domain');
    $table->string('level');
    $table->integer('duration_hours');
    $table->decimal('price', 10, 2);

    $table->text('description')->nullable();
    $table->text('objectives')->nullable();
    $table->text('program')->nullable();
    $table->text('prerequisites')->nullable();
    $table->string('certification')->nullable();
    $table->boolean('is_featured')->default(false);

    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
