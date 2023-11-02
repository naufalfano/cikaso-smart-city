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
        Schema::create('form_has_field', function (Blueprint $table) {
            $table->uuid('forms_id');
            $table->foreign('forms_id')->references('id')->on('forms');
            $table->uuid('fields_id');
            $table->foreign('fields_id')->references('id')->on('fields');
            $table->primary(['forms_id', 'fields_id']);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_has_field');
    }
};
