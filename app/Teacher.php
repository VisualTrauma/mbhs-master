<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $hidden = ['password'];

    public function scopeInitialize($query)
    {
        return $query;
    }

    public function scopeTeachingArea($query, $teachingArea)
    {
        return $query->where('teaching_area', $teachingArea);
    }
}
