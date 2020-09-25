<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
      'title', 'description', 'skills', 'city', 'country'
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
