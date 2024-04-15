<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\panier;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function books()
{
    return $this->hasMany(Book::class);
}
public function hasRole($role)
{
    return $this->roles === $role;
}
    
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'roles',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    public function mails()
    {
        return $this->hasOne(sendMail::class);
    }
    public function copies()
    {
        return $this->hasMany(copy::class);
    }
    public function cart()
    {
        return $this->hasMany(cart::class);
    }
}
