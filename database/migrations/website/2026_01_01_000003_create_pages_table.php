<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("pages", function (Blueprint $table) { $table->id(); $table->foreignId("school_id")->nullable()->index(); $table->string("slug")->index(); $table->string("title"); $table->string("meta_title")->nullable(); $table->string("meta_description")->nullable(); $table->longText("body")->nullable(); $table->string("template")->default("default"); $table->boolean("is_published")->default(false); $table->timestamp("published_at")->nullable(); $table->integer("sort_order")->default(0); $table->timestamps(); $table->softDeletes(); $table->unique(["school_id", "slug"]); });
    }

    public function down(): void
    {
        Schema::dropIfExists("pages");
    }
};
