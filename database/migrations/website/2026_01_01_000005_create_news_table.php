<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("news", function (Blueprint $table) { $table->id(); $table->foreignId("school_id")->nullable()->index(); $table->foreignId("category_id")->nullable()->constrained("news_categories")->nullOnDelete(); $table->foreignId("author_id")->nullable()->constrained("users")->nullOnDelete(); $table->string("title"); $table->string("slug")->index(); $table->text("excerpt")->nullable(); $table->longText("body")->nullable(); $table->foreignId("featured_media_id")->nullable()->constrained("media")->nullOnDelete(); $table->boolean("is_featured")->default(false); $table->boolean("is_published")->default(false); $table->timestamp("published_at")->nullable()->index(); $table->timestamps(); $table->softDeletes(); $table->unique(["school_id", "slug"]); });
    }

    public function down(): void
    {
        Schema::dropIfExists("news");
    }
};
