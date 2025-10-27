<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasUuids;

    protected $fillable = [
        'building_id',
        'room_id',
        'serial_number',
        'name',
        'description',
        'acquisition_cost',
        'quantity',
        'inventoried_at',
        'acquired_at',
        'accountable_officer',
        'location',
    ];

    protected $casts = [
        'acquired_at' => 'datetime',
        'inventoried_at' => 'datetime',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

}
