<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
      'title', 'description', 'skills', 'city', 'country','company_id',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function city()
    {
        return $this->company()->city;
    }

    public function country()
    {
        return $this->company()->country;
    }

    public function applications()
    {
        return $this->hasMany('App\Models\Application');
    }

}
