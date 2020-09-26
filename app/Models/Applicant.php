<?php

namespace App\Models;

use App\Models\Resume;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Pagination\Paginator;

class Applicant extends User
{
    use HasFactory;

    protected $table = 'users';


    protected $attributes = [
        'role_id' => 1,
    ];

    protected $primaryKey = 'id';


    public static function boot()
    {
        parent::boot();
        Paginator::useBootstrap();
        static::addGlobalScope(function ($query) {
            $query->where('role_id', 1);
        });
    }

    /**
     * @return BelongsTo User Image
     */
    public function image()
    {
        return $this->belongsTo('App\Models\Image');
    }

    public function saveResume(Resume $resume)
    {
        return $this->resumes()->save($resume);
    }


    public function applications()
    {
        return $this->hasMany('App\Models\Application');
    }



    public function resumes()
    {
        return $this->hasMany('App\Models\Resume','user_id');
    }

}
