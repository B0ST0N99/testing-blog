<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name',
        'description'
    ];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getCreatedAtAttribute($value)
    {
        $value = Carbon::parse($value)->format('F d, Y \a\t h:i A');
        return $value;
    }
}
