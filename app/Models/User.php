<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function isEmployer()
{
    return $this->role === 'employer' ;
}
    
    public function hasRole()
{
    return $this->role === null ;
}
public function jobs()
{
    return $this->hasMany(Job::class);
}
public function applications()
{
    return $this->hasMany(Applications::class);
}
public function certifications()
{
    return $this->hasMany(Certifications::class);
}
public function school()
{
    return $this->hasMany(School::class);
}
public function experience()
{
    return $this->hasMany(Experience::class);
}
public function skill()
{
    return $this->hasMany(Skills::class);
}

}
