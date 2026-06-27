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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnDelete();

            $table->string('title');

            $table->text('description')->nullable();

            $table->string('thumbnail')->nullable();

            $table->string('file_project')->nullable();
            
            $table->string('version')->nullable();
            $table->string('github_url')->nullable();
            $table->string('demo_url')->nullable();

            $table->string('year')->nullable();

            $table->string('status')->default('Draft');

            $table->unsignedInteger('download_count')->default(0);

            $table->unsignedInteger('view_count')->default(0);

            $table->string('slug')->unique()->nullable();

            $table->boolean('is_featured')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
