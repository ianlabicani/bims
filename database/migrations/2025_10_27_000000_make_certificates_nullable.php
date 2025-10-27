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
        Schema::table('buildings', function (Blueprint $table) {
            $table->string('CSU_cert')->nullable()->change();
            $table->string('FIRE_cert')->nullable()->change();
            $table->string('OCCUPANCY_cert')->nullable()->change();
            $table->string('LGU_cert')->nullable()->change();
            $table->string('completed_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buildings', function (Blueprint $table) {
            $table->string('CSU_cert')->nullable(false)->change();
            $table->string('FIRE_cert')->nullable(false)->change();
            $table->string('OCCUPANCY_cert')->nullable(false)->change();
            $table->string('LGU_cert')->nullable(false)->change();
            $table->string('completed_at')->nullable(false)->change();
        });
    }
};
