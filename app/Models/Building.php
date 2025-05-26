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
