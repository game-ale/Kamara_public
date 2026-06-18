<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("admissions", function (Blueprint $table) { $table->id(); $table->foreignId("school_id")->nullable()->index(); $table->string("reference")->unique(); $table->string("status")->index(); $table->string("parent_name"); $table->string("parent_phone"); $table->string("parent_email")->nullable(); $table->string("student_name"); $table->date("student_dob"); $table->string("student_gender"); $table->string("grade_applying_for"); $table->string("previous_school")->nullable(); $table->text("medical_notes")->nullable(); $table->string("emergency_name")->nullable(); $table->string("emergency_phone")->nullable(); $table->string("emergency_relationship")->nullable(); $table->timestamp("submitted_at")->nullable(); $table->foreignId("reviewed_by")->nullable()->constrained("users")->nullOnDelete(); $table->timestamp("reviewed_at")->nullable(); $table->timestamps(); $table->softDeletes(); });
    }

    public function down(): void
    {
        Schema::dropIfExists("admissions");
    }
};
