<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('analyzer_test_mappings', function (Blueprint $table) {

            $table->id();

            $table->foreignId('analyzer_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('test_parameter_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('method_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('unit_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->boolean('is_active')
                  ->default(true);

            $table->timestamps();

            $table->unique([
                'analyzer_id',
                'test_parameter_id'
            ]);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('analyzer_test_mappings');
    }
};