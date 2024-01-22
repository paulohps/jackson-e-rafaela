<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('invites', static function (Blueprint $table) {
            $table->dateTime('answered_at')->nullable()->after('people');
        });
    }

    public function down(): void
    {
        Schema::table('invites', static function (Blueprint $table) {
            $table->dropColumn('answered_at');
        });
    }
};
