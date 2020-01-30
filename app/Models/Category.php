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


    /**
     * Get all of the categories posts.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    /**
     * Get all of the categories comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getCreatedAtAttribute($value)
    {
        $value = Carbon::parse($value)->format('F d, Y \a\t h:i A');
        return $value;
    }
}
