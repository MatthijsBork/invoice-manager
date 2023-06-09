<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const OWNER = 1;
    const DEBTOR = 2;

    public function users() {
        return $this ->hasMany(User::class, 'role_id', 'id');
    }
}



