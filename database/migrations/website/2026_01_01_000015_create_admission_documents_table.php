<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("admission_documents", function (Blueprint $table) { $table->id(); $table->foreignId("admission_id")->constrained("admissions")->cascadeOnDelete(); $table->foreignId("media_id")->constrained("media")->cascadeOnDelete(); $table->string("document_type"); $table->timestamps(); });
    }

    public function down(): void
    {
        Schema::dropIfExists("admissiondocuments");
    }
};
