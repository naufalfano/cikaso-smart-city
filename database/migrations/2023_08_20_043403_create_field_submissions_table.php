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
        Schema::create('field_submissions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nik', 16);
            $table->foreign('nik')->references('nik')->on('users');
            $table->string('entry', 255);
            $table->uuid('fields_id');
            $table->foreign('fields_id')->references('id')->on('fields');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_submissions');
    }
};
