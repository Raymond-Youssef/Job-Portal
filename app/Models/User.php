<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;



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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        'role_id' => 1,
    ];

    /**
     * @return BelongsTo User Image
     */
    public function image()
    {
        return $this->belongsTo('App\Models\Image');
    }


    /**
     * @return HasMany User Resumes
     */
    public function resumes()
    {
        return $this->hasMany('App\Models\Resume');
    }


    /**
     * @return BelongsTo User Role
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }


    public function saveResume(Resume $resume)
    {
        return $this->resumes()->save($resume);
    }

}
