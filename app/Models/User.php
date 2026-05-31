<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Enrollment;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
 // 👇 Tu as autorisé certains champs de la table à être remplis automatiquement.
    protected $fillable = [
        'name', 'email', 'password', 'role', 'phone','cv'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Laravel hash automatiquement si tu assignes un password
    ];

    public function isAdmin(): bool { return $this->role === 'admin'; } //Elle retourne : ✅ true si le rôle de l’utilisateur est "admin"
    public function isTrainer(): bool { return $this->role === 'trainer'; }
    public function isStudent(): bool { return $this->role === 'student'; }

   
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function contactMessages()
    {
        return $this->hasMany(ContactMessage::class);
    }
}
