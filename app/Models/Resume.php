<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','path','default'
    ];



    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
