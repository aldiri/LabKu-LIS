<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lab_settings', function (Blueprint $table) {

            $table->id();

            $table->string('lab_name');

            $table->string('address');

            $table->string('city')->nullable();

            $table->string('province')->nullable();

            $table->string('postal_code')->nullable();

            $table->string('phone')->nullable();

            $table->string('email')->nullable();

            $table->string('website')->nullable();

            $table->string('director')->nullable();

            $table->string('logo')->nullable();

            $table->text('footer_invoice')->nullable();

            $table->text('footer_result')->nullable();

            $table->string('invoice_prefix')->default('INV');

            $table->string('registration_prefix')->default('LAB');

            $table->boolean('active')->default(true);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lab_settings');
    }
};