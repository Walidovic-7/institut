<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'training_id','user_id','full_name','email','phone',
        'cv_path','diploma_path','status','notes_admin'
    ];

    public function training() { return $this->belongsTo(Training::class); }
    public function user() { return $this->belongsTo(User::class); }
}

// 👉 Application représente une candidature à une formation
// 👉 Ce n’est PAS encore une inscription
// 👉 C’est une demande faite par un utilisateur pour rejoindre une formation

