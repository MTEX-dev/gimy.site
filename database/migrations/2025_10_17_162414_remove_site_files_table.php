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
        Schema::table('site_files', function (Blueprint $table) {
            Schema::dropIfExists('site_files');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_files', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('site_id')->constrained()->onDelete('cascade');
            $table->string('path');
            $table->string('name');
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('size_bytes');
            $table->timestamps();
            $table->unique(['site_id', 'path']);
        });
    }
};
