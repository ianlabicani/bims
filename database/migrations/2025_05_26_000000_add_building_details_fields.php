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
            // Basic Information
            $table->string('department_agency')->nullable();
            $table->string('complete_agency_address')->nullable();

            // Description of Building
            $table->string('registered_name')->nullable();
            $table->string('location_street')->nullable();
            $table->string('location_brgy')->nullable();
            $table->string('location_municipality')->nullable();
            $table->string('location_province')->nullable();
            $table->string('classification')->nullable();
            $table->string('physical_condition')->nullable();
            $table->text('condition_description')->nullable();
            $table->date('acquisition_date')->nullable();
            $table->string('acquisition_mode')->nullable();
            $table->json('improvements')->nullable();
            $table->json('existing_utilities')->nullable();
            $table->string('land_ownership_status')->nullable();
            $table->integer('estimated_occupants')->nullable();
            $table->decimal('estimated_fund', 15, 2)->nullable();

            // Utilization Data
            $table->string('specific_use')->nullable();

            // Document Information
            $table->string('prepared_by')->nullable();
            $table->string('preparer_position')->nullable();
            $table->string('certified_by')->nullable();
            $table->string('certifier_position')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buildings', function (Blueprint $table) {
            // Basic Information
            $table->dropColumn('department_agency');
            $table->dropColumn('complete_agency_address');

            // Description of Building
            $table->dropColumn('registered_name');
            $table->dropColumn('location_street');
            $table->dropColumn('location_brgy');
            $table->dropColumn('location_municipality');
            $table->dropColumn('location_province');
            $table->dropColumn('classification');
            $table->dropColumn('physical_condition');
            $table->dropColumn('condition_description');
            $table->dropColumn('acquisition_date');
            $table->dropColumn('acquisition_mode');
            $table->dropColumn('improvements');
            $table->dropColumn('existing_utilities');
            $table->dropColumn('land_ownership_status');
            $table->dropColumn('estimated_occupants');
            $table->dropColumn('estimated_fund');

            // Utilization Data
            $table->dropColumn('specific_use');

            // Document Information
            $table->dropColumn('prepared_by');
            $table->dropColumn('preparer_position');
            $table->dropColumn('certified_by');
            $table->dropColumn('certifier_position');
        });
    }
};
