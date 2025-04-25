<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('building_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('room_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('serial_number')->nullable();
            $table->string('name');
            $table->string('description');
            $table->decimal('acquisition_cost', 10, 2)->default(0);
            $table->integer('quantity')->default(0);
            $table->date('inventoried_at');
            $table->date('acquired_at');
            $table->string('accountable_officer');
            $table->string('location');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
