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
    /**
     * @var mixed|string
     */
    private $name;
    /**
     * @var mixed
     */
    private $path;
    /**
     * @var mixed
     */
    private $user_id;

    /**
     * @var bool|mixed
     */
    private $default;
    /**
     * @var mixed
     */



    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
