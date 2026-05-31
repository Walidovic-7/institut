<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    protected $fillable = ['course_id','type','title','path_or_url'];

    public function course() { return $this->belongsTo(Course::class); }
}
