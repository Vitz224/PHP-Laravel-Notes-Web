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
        Schema::table('notes', function (Blueprint $table) {
            $table->string('category')->nullable()->after('content');
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium')->after('category');
            $table->dateTime('reminder_date')->nullable()->after('priority');
            $table->string('tags')->nullable()->after('reminder_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropColumn(['category', 'priority', 'reminder_date', 'tags']);
        });
    }
};
