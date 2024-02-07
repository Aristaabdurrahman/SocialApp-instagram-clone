<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LikesTrait;

    protected $fillable = [
        'username',
        'fullname',
        'email',
        'password',
        'avatar',
        'bio',
        'phone',
        'address',
        'gender',
        'website',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts(){
        return $this->hasMany(Post::class)->orderBy('id', 'desc');
    }

    public function following(){
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'following_id');
    }

    public function follower(){
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'follower_id');
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function notification(){
        return $this->hasMany(Notification::class)->orderBy('id', 'desc');
    }

    public function savedposts(){
        return $this->belongsToMany(Post::class, 'saves', 'user_id', 'post_id');
    }
}
