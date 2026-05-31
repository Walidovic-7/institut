<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 // Training représente une formation
class Training extends Model
{
   protected $fillable = [
    'title','slug','domain','level','duration_hours','price',
    'description','objectives','program','prerequisites','certification',
    'is_featured','image'
];

       public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}

