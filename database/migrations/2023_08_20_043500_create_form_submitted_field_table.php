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
        Schema::create('form_submitted_field', function (Blueprint $table) {
            $table->uuid('form_submissions_id');
            $table->foreign('form_submissions_id')->references('id')->on('form_submissions');
            $table->uuid('field_submissions_id');
            $table->foreign('field_submissions_id')->references('id')->on('field_submissions');
            $table->primary(['form_submissions_id', 'field_submissions_id']);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_submitted_field');
    }
};
