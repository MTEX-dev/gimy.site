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
        Schema::table('organisations', function (Blueprint $table) {
            $table->string('slug')->unique()->after('name');
            $table->string('avatar_path')->nullable()->after('slug');
            $table->string('email')->nullable()->after('avatar_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organisations', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('avatar_path');
            $table->dropColumn('email');
        });
    }
};