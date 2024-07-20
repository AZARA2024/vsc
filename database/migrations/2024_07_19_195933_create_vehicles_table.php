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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('plateNumber');
            $table->string('vehicleNumber')->unique();
            $table->string('manufacturer');
            $table->string('carType');
            $table->date('inspectionDate');
            $table->string('inspectionCompany');
            $table->string('serviceType');
            $table->date('dateOfEnd');
            $table->string('serialNumber')->unique();
            $table->enum('status', ['valid', 'expired']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
