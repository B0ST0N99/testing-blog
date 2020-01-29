<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'name',
        'content',
        'category_id',
        'file',
    ];
    public function getExcerptAttribute()
    {
        $value = Str::limit($this->content,200);
        return $value;
    }
    public function getCreatedAtAttribute($value)
    {
        $value = Carbon::parse( $value)->format('F d, Y');
        return $value;
    }
}
