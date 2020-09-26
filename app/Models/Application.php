<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Application extends Model
{
    use HasFactory;

    protected function setKeysForSaveQuery(Builder $query)
    {
        return $query->where('applicant_id', $this->getAttribute('applicant_id'))
            ->where('job_id', $this->getAttribute('job_id'));
    }

    protected $primaryKey = [
        'applicant_id', 'job_id',
    ];

    protected $fillable = [
        'applicant_id', 'job_id', 'resume_id', 'status'
    ];

    public $incrementing = false;

    public function job()
    {
        return $this->belongsTo('App\Models\Job');
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
