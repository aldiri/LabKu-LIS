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
    Schema::create('test_parameters', function (Blueprint $table) {

        $table->id();

        $table->string('test_id')->unique();

        $table->tinyInteger('test_type')->default(1);
        // 1 = Single
        // 2 = Multiple

        $table->string('nama_test');

        $table->foreignId('test_group_id')
              ->constrained();

        $table->foreignId('print_group_id')
              ->constrained();

        $table->foreignId('sample_type_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

        $table->decimal('price',12,2)
              ->default(0);

        $table->string('seq')->nullable();

        $table->boolean('head')
              ->default(false);

        $table->boolean('bold')
              ->default(false);

        $table->boolean('italic')
              ->default(false);

        $table->boolean('is_print')
              ->default(true);

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_parameters');
    }
};
