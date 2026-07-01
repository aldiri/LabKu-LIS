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
        Schema::create('reference_details', function (Blueprint $table) {

            $table->id();

            $table->foreignId('reference_header_id')
                ->constrained('reference_headers')
                ->cascadeOnDelete();

            $table->enum(
                'flag',
                [
                    'NORMAL',
                    'LOW',
                    'HIGH',
                    'XLOW',
                    'XHIGH'
                ]
            );

            $table->enum(
                'gender',
                [
                    'ALL',
                    'L',
                    'P'
                ]
            )->default('ALL');

            $table->char('begin_age',7);

            $table->char('end_age',7);

            $table->string('reference_value',255);

            $table->decimal(
                'lower_limit',
                15,
                4
            )->nullable();

            $table->decimal(
                'upper_limit',
                15,
                4
            )->nullable();

            $table->timestamps();

            $table->unique(
    [
        'reference_header_id',
        'flag',
        'gender',
        'begin_age',
        'end_age'
    ],
    'ref_detail_unique'
);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reference_details');
    }
};