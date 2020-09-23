<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends User
{
    use HasFactory;

    protected $table = 'users';


    protected $attributes = [
        'role_id' => 2,
    ];


    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('role_id', 2);
        });
    }
}
