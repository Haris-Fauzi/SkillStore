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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('nis')->nullable()->unique();

            $table->string('class')->nullable();

            $table->string('major')->nullable();

            $table->text('address')->nullable();

            $table->string('phone')->nullable();

            $table->date('birth_date')->nullable();

            $table->string('photo')->nullable();

            $table->boolean('is_profile_complete')
                ->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
