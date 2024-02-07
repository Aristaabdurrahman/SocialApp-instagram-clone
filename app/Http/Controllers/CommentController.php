<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    private function notify($from_user, $post_id){
        $target_post = Post::find($post_id)->user_id;

        if ($from_user->id != $target_post) {
            Notification::create([
                'user_id' => $target_post,
                'post_id' => $post_id,
                'text'    => $from_user->username . " Comment on your post"
            ]);
        }
    }

    public function storecomment(Request $request, $post_id)
    {
        $user = Auth::user();
        $type = $request->type;

        $request->validate([
            'body' => 'max:100',
        ]);

        $user->comment()->create([
            'body' => $request->body,
            'post_id' => $post_id,
        ]);

        $this->notify($user, $post_id);

        if ($type == "comment") {
            return redirect('/'.$user->username);
        }else {
            return redirect('/');
        }

        

    }
}
