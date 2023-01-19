<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'age',
        'address',
        'imagen',
        'photo',
        'description'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     //un usuario puede publicar muchos articulos
     public function items()
     {
         return $this->hasMany(Item::class);
     }

     public function contacts()
    {
        return $this->belongsToMany(User::class,'contacts','user_id','contact_id');
    }

 

    // public function contactadoinv(User $user)
    // {
    //     return $this->contactings->contains($user->id);
    // }

    public function contactings()
    {
        return $this->belongsToMany(User::class,'contacts','contact_id','user_id');
    }

    public function contactado(User $user)
    {
      return $this->contactings->contains($user->id);
    }
}
