<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\LikesTrait;

class Post extends Model
{
    use HasFactory, LikesTrait;

    protected $fillable = [
        'user_id',
        'content',
        'caption',
    ];

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class)->orderBy('id', 'desc');
    }

    public function notification(){
        return $this->hasMany(Notification::class);
    }

    public function like(){
        return $this->MorphMany(Like::class, 'likeable');
    }
    
    public function is_liked(){
        return $this->like->where('user_id', Auth::user()->id)->count();
    }

    public function savedby(){
        return $this->belongsToMany(User::class, 'saves', 'post_id', 'user_id');
    }
}
