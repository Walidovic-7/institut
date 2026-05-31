<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['training_id','trainer_id','title','description','order_index'];

    public function training() { return $this->belongsTo(Training::class); }
    public function trainer() { return $this->belongsTo(User::class, 'trainer_id'); }
    public function contents() { return $this->hasMany(CourseContent::class); }
}

