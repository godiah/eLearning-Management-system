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
        Schema::create('lesson_subcontents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained('lessons')->onDelete('cascade');
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->string('video_url')->nullable();            
            $table->integer('video_duration')->default(0);
            $table->integer('order_index');
            $table->string('resource_path')->nullable();
            $table->timestamps();

            $table->unique(['lesson_id', 'order_index']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_subcontents');
    }
};
