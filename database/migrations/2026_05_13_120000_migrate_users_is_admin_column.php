<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ensure users have an is_admin column (Laravel convention) and retire legacy isAdmin if present.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('users', 'is_admin')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('is_admin')->default(false);
            });
        }

        if (Schema::hasColumn('users', 'isAdmin')) {
            DB::table('users')->where('isAdmin', 1)->update(['is_admin' => true]);

            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('isAdmin');
            });
        }
    }

    public function down(): void
    {
        //
    }
};
