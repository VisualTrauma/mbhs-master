<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;

    public function schedules() {
        return $this->hasMany('App\Schedules', 'section_id');
    }
}
