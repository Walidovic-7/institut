<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('training_id')->constrained()->cascadeOnDelete();

            // Option: candidature sans compte => user_id nullable
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();

            $table->string('cv_path')->nullable();
            $table->string('diploma_path')->nullable();

            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->text('notes_admin')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};

