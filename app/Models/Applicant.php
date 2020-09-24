<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Resume;

class Applicant extends Model
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



    public function resumes()
    {
        return $this->hasMany('App\Models\Resume','user_id');
    }


    public function saveResume(Resume $resume)
    {
        return $this->resumes()->save($resume);
    }
}
