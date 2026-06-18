<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("events", function (Blueprint $table) { $table->id(); $table->foreignId("school_id")->nullable()->index(); $table->foreignId("category_id")->nullable()->constrained("event_categories")->nullOnDelete(); $table->string("title"); $table->string("slug")->index(); $table->text("description")->nullable(); $table->string("location")->nullable(); $table->timestamp("starts_at")->nullable()->index(); $table->timestamp("ends_at")->nullable(); $table->boolean("is_all_day")->default(false); $table->boolean("is_published")->default(false); $table->string("registration_url")->nullable(); $table->timestamps(); $table->softDeletes(); $table->unique(["school_id", "slug"]); });
    }

    public function down(): void
    {
        Schema::dropIfExists("events");
    }
};
