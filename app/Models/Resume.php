<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','path','default','user_id'
    ];



    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
