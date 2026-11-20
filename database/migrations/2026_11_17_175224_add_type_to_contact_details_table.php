<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contact_details', function (Blueprint $table) {
            $table->string('type')->default('social_media')->after('url');
        });

        DB::table('contact_details')
            ->where('url', 'like', 'tel:%')
            ->update(['type' => 'contact']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_details', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
