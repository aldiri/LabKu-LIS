<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registration_samples', function (Blueprint $table) {

            $table->id();

            $table->foreignId('registration_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('sample_type_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('sample_no');

            $table->string('barcode')->unique();

            $table->enum('status',[

                'WAITING',

                'COLLECTED',

                'RECEIVED',

                'PROCESS',

                'FINISHED'

            ])->default('WAITING');

            $table->string('collector')->nullable();

            $table->datetime('collection_time')->nullable();

            $table->datetime('received_time')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registration_samples');
    }
};