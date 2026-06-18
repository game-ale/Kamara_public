<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("testimonials", function (Blueprint $table) { $table->id(); $table->foreignId("school_id")->nullable()->index(); $table->text("quote"); $table->string("author_name"); $table->string("author_role"); $table->string("author_grade")->nullable(); $table->foreignId("photo_media_id")->nullable()->constrained("media")->nullOnDelete(); $table->boolean("is_featured")->default(false); $table->integer("display_order")->default(0); $table->timestamps(); });
    }

    public function down(): void
    {
        Schema::dropIfExists("testimonials");
    }
};
