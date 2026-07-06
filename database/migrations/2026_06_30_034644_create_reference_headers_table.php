<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reference_headers', function (Blueprint $table) {

            $table->id();

            $table->foreignId('test_parameter_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('method_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('unit_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('result_format')
                  ->nullable();

            $table->boolean('is_active')
                  ->default(true);

            $table->timestamps();

            $table->unique(
                [
                    'test_parameter_id',
                    'method_id'
                ],
                'ref_header_unique'
            );

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reference_headers');
    }
};