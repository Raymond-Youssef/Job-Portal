<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $primaryKey = [
        'user_id', 'job_id',
    ];

    protected $fillable = [
        'user_id', 'job_id', 'resume_id', 'status'
    ];

    public $incrementing = false;

    public function job()
    {
        return $this->belongsTo('App\Models\Job');
    }

    public function company()
    {
//        return $this->belongsToMany('App\Models\Company')->using('App\Models\Job');
        return $this->hasOneThrough(
            'App\Models\Company',
            'App\Models\Job',
            'company_id', // Foreign key on cars table...
            'id', // Foreign key on owners table...
            'job_id', // Local key on mechanics table...
            'id' // Local key on cars table...
        );
    }

    public function applicant()
    {
        return $this->belongsTo('App\Models\Applicant');
    }

    public function resume()
    {
        return $this->belongsTo('App\Models\Resume');
    }

}
