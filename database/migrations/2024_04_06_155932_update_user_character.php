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
        Schema::table('character_user', function (Blueprint $table) {
            $table->unsignedInteger('games_played')->default(0);
            $table->unsignedInteger('wins')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('character_user', function (Blueprint $table) {
            $table->dropColumn('games_played');
            $table->dropColumn('wins');
        });
    }
};
