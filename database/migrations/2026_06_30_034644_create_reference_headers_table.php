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
        Schema::create('reference_headers', function (Blueprint $table) {

            $table->id();

            $table->foreignId('test_parameter_id')
                ->constrained('test_parameters')
                ->cascadeOnDelete();

            $table->foreignId('method_id')
                ->constrained('methods')
                ->cascadeOnDelete();

            $table->string('result_format',50)
                ->nullable();

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            $table->unique([
                'test_parameter_id',
                'method_id'
            ]);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reference_headers');
    }
};