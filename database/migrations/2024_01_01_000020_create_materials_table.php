<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->enum('type',['file','link'])->default('file');
            $table->string('file_path')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('materials'); }
};
