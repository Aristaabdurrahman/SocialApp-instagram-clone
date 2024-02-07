<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function notify($from_user, $post_id){
        $target_post = Post::find($post_id)->user_id;

        if ($from_user->id != $target_post) {
            Notification::create([
                'user_id' => $target_post,
                'post_id' => $post_id,
                'text'    => $from_user->username . " Like on your post"
            ]);
        }
    }

    public function toggle($type, $object_id)
    {
        if ($type == 'POST') {
            $object = Post::findOrFail($object_id);
            $obj    = $object->id;
        }else {
            $object = Comment::findOrFail($object_id);
            $obj    = $object->post_id;
        }

        $attr = ['user_id' => Auth::user()->id];

        if ($object->like()->where($attr)->exists()) {
            $object->like()->where($attr)->delete();
            $msg = ['status' => 'UNLIKE'];
        } else {
            $object->like()->create($attr);
            $msg = ['status' => 'LIKE'];

            $this->notify(Auth::user(), $obj);
        }

        return response()->json($msg);
        
    }

}
