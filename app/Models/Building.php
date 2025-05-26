<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasUuids;

    protected $fillable = [
        'campus_id',
        'name',
        'description',
        'address',
        'longitude',
        'latitude',
        'floor_area',
        'type',
        'number_of_floors',
        'number_of_rooms',
        'number_of_CRs',
        'CSU_cert',
        'FIRE_cert',
        'OCCUPANCY_cert',
        'LGU_cert',
        'college_office_assigned',
        'completed_at',
        // Basic Information
        'department_agency',
        'complete_agency_address',
        // Description of Building
        'registered_name',
        'location_street',
        'location_brgy',
        'location_municipality',
        'location_province',
        'classification',
        'physical_condition',
        'condition_description',
        'acquisition_date',
        'acquisition_mode',
        'improvements',
        'existing_utilities',
        'land_ownership_status',
        'estimated_occupants',
        'estimated_fund',
        // Utilization Data
        'specific_use',
        // Document Information
        'prepared_by',
        'preparer_position',
        'certified_by',
        'certifier_position',
    ];

    protected $casts = [
        'improvements' => 'array',
        'existing_utilities' => 'array',
        'acquisition_date' => 'date',
        'completed_at' => 'date',
        'estimated_fund' => 'decimal:2',
        'estimated_occupants' => 'integer',
        'number_of_floors' => 'integer',
        'number_of_rooms' => 'integer',
        'number_of_CRs' => 'integer',
    ];

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
