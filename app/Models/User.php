<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as auth;
class User extends auth 
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'contact_name',
        'restaurant_name',
        'background_image',
        'company_logo',
        'user_type',
        'status',
    ];


    // Relations
    public function dishes()
    {
        return $this->hasMany(Dishes::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    // Verficacion de email
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Relación con el modelo District.
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Relación con el modelo Corregimiento.
     */
    public function corregimiento()
    {
        return $this->belongsTo(Corregimiento::class);
    }
}
