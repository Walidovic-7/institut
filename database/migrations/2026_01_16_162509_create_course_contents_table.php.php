<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('course_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['pdf', 'video', 'link', 'file'])->default('pdf');
            $table->string('title');
            $table->string('path_or_url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_contents');
    }
};

