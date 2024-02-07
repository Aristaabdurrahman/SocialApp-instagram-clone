<?php

namespace App\Models;
//use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Auth;

trait LikesTrait
{
    public function like(){
        return $this->MorphMany(Like::class, 'likeable');
    }
    
    public function is_liked(){
        return $this->like->where('user_id', Auth::user()->id)->count();
    }
}
