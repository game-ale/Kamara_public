<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("website_settings", function (Blueprint $table) { $table->id(); $table->foreignId("school_id")->nullable()->index(); $table->string("group")->index(); $table->string("key")->index(); $table->json("value")->nullable(); $table->string("type")->default("string"); $table->timestamps(); });
    }

    public function down(): void
    {
        Schema::dropIfExists("websitesettings");
    }
};
