<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showexplore(){
        $post = Post::with('user', 'like', 'comment')->orderBy('id', 'desc')->get();
        return view('explore', ['post' => $post]);
    }

    public function search(Request $request){
        $searchQuery = $request->input('search');
        $post = Post::where('caption', 'like', '%'. $searchQuery. '%')->get();
        return view('explore', ['post' => $post, 'searchQuery' => $searchQuery]);
    }
}
