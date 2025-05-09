<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Pivot
{

    use HasUuids;

    protected $table = 'role_user';

    protected $fillable = [
        'user_id',
        'role_id',
    ];
}
