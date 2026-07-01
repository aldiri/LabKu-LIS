<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('registration_details', function (Blueprint $table) {

            $table->foreignId('registration_sample_id')
                  ->nullable()
                  ->after('registration_id')
                  ->constrained('registration_samples')
                  ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('registration_details', function (Blueprint $table) {

            $table->dropForeign(['registration_sample_id']);

            $table->dropColumn('registration_sample_id');

        });
    }
};