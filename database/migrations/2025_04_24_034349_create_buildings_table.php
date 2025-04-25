<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('campus_id')->constrained('campuses')->cascadeOnDelete();
            $table->string('name');
            $table->json('location');
            $table->text('description');
            $table->string('address');
            $table->string('floor_area');
            $table->string('type');
            $table->string('number_of_floors');
            $table->string('number_of_rooms');
            $table->string('number_of_CRs');
            $table->string('CSU_cert');
            $table->string('FIRE_cert');
            $table->string('OCCUPANCY_cert');
            $table->string('LGU_cert');
            $table->string('college_office_assigned');
            $table->date('completed_at');
            $table->dropColumn('location');
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
