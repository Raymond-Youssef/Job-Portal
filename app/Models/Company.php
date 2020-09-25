<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Pagination\Paginator;

class Company extends User
{
    use HasFactory;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $attributes = [
        'role_id' => 2,
    ];


    public static function boot()
    {
        parent::boot();
        Paginator::useBootstrap();
        static::addGlobalScope(function ($query) {
            $query->where('role_id', 2);
        });
    }


    public function jobs()
    {
        return $this->hasMany('App\Models\Job');
    }
}
