<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasUuids;

    protected $fillable = [
        'name',
        'location',
        'description',
    ];

    protected $casts = [
        'location' => 'array',
    ];

    public function buildings()
    {
        return $this->hasMany(Building::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
