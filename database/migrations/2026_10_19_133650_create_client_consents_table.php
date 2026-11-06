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
        Schema::create('client_consents', function (Blueprint $table) {
            $table->id();
            $table->string('service_id');
            $table->string('terms_version');
            $table->string('consent_version');
            $table->boolean('terms_accepted');
            $table->boolean('consent_accepted');
            $table->timestamp('accepted_at');
            $table->string('booking_uid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_consents');
    }
};
