<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sample_types', function (Blueprint $table) {

    $table->id();

    $table->string('sample_id')->unique();

    $table->string('sample_name');

    $table->string('barcode_code')->nullable();

    $table->string('tube_color')->nullable();

    $table->string('description')->nullable();

    $table->timestamps();

});
    }

    public function down(): void
    {
        Schema::dropIfExists('sample_types');
    }
};