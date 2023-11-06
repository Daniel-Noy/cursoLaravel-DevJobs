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
        Schema::table('vacants', function (Blueprint $table) {
            $table->string('title');
            $table->foreignId('salary_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('company');
            $table->date('deadline');
            $table->text('description');
            $table->string('image');
            $table->boolean('is_published')->default(true);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacants', function (Blueprint $table) {
            $table->dropConstrainedForeignId('salary_id');
            $table->dropConstrainedForeignId('category_id');
            $table->dropConstrainedForeignId('user_id');

            $table->dropColumn([
                'title',
                'company',
                'deadline',
                'description',
                'image',
                'is_published',
            ]);
        });
    }
};
