<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    public function student() {
        return $this->belongsTo('App\Student', 'student_id');
    }

    public function section() {
        return $this->belongsTo('App\Section', 'section_id');
    }
}
