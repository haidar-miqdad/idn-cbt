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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
                    $table->foreignId('exam_id')->constrained()->cascadeOnDelete();
                    $table->foreignId('exam_session_id')->constrained()->cascadeOnDelete();
                    $table->foreignId('question_id')->constrained()->cascadeOnDelete();
                    $table->foreignId('student_id')->constrained()->cascadeOnDelete();
                    $table->integer('question_order');
                    $table->string('answer_order');
                    $table->integer('answer');
                    $table->enum('is_correct', ['Y', 'N'])->default('N');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
