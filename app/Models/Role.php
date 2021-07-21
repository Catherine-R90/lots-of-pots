<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cartalyst\Sentinel\Roles\EloquentRole;

class Role extends EloquentRole
{
    protected $fillable = [
        'slug',
        'name',
        'permissions',
        'created_at',
        'updated_at',
    ];

    public function user() {
        return $this->belongsToMany('App\Models\User', 'role_users');
    }
}
