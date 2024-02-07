<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $post = Post::with(['user', 'like', 'comment'])->orderBy('id', 'desc')->get();
        return view('home', ['post' => $post, 'user' => $user]);
    }

    public function create(){
        return view('createpost');
    }

    public function storepost(Request $request){
        $user = Auth::user();

        $request->validate([
            'content' => 'required|mimes:jpeg,jpg,png',
            'caption' => 'max:255',
        ]);

        $img = $request->content;
        
        if ($img) {
            $format = $user->username . '-' . 'post' . '-' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('images/postcontent/'), $format);
            $img = $format;
        }

        $user->posts()->create([
            'content' => $img,
            'caption' => $request->caption,
        ]);

        return redirect('/');
    }

    public function savedpost($post_id){
        $user = Auth::user();

        if ($user->savedposts->contains($post_id)) {
            $user->savedposts()->detach($post_id);
            $msg = ['status' => 'UNSAVE'];
        } else {
            $user->savedposts()->attach($post_id);
            $msg = ['status' => 'SAVE'];
        }

        return response()->json($msg);
        
    }

}
