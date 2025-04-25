<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasUuids;

    protected $fillable = [
        'building_id',
        'name',
        'description',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
