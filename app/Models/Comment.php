<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LikesTrait;

class Comment extends Model
{
    use HasFactory, LikesTrait;

    protected $fillable = [
        'user_id',
        'post_id',
        'body',
    ];

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function notification(){
        return $this->hasMany(Notification::class);
    }
}
