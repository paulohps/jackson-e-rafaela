<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('invites', static function (Blueprint $table) {
            $table->uuid()->nullable()->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('invites', static function (Blueprint $table) {
            $table->dropColumn('uuid');
        });
    }
};
