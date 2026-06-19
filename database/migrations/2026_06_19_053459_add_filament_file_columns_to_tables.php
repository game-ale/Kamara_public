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
        Schema::table('news', function (Blueprint $table) {
            $table->string('featured_image')->nullable()->after('body');
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->string('cover_image')->nullable()->after('description');
            $table->json('images')->nullable()->after('cover_image');
        });

        Schema::table('leadership_profiles', function (Blueprint $table) {
            $table->string('photo')->nullable()->after('email');
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('featured_image');
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn(['cover_image', 'images']);
        });

        Schema::table('leadership_profiles', function (Blueprint $table) {
            $table->dropColumn('photo');
        });
    }
};
