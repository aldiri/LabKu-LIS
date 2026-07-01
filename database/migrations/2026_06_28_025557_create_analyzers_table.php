<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('analyzers', function (Blueprint $table) {

            $table->id();

            $table->string('analyzer_code',30)->unique();

            $table->string('analyzer_name');

            $table->enum('category',[
                'Kimia Klinik',
                'Hematologi',
                'Imunologi',
                'Mikrobiologi',
                'Urinalisa',
                'Koagulasi',
                'Blood Gas',
                'Elektrolit',
                'POCT',
                'Lainnya'
            ]);

            $table->string('manufacturer')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('analyzers');
    }
};