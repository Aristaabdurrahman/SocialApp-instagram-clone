<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($username){
        $user = User::with([
            
        ])->where('username', $username)->first();
        
        if (!$user) {
            abort(404);
        }

        return view('user.profile', ['user' => $user]);
    }

    public function edit(){
        $user = Auth::user();
        return view('user.edit', ['user' => $user]);
    }

    public function updateuser(Request $request){
        $user = Auth::user();

        $request->validate([
            'username' => 'required|unique:users,username,'.$user->id,
            'fullname' => "required",
            'avatar'   => "required|mimes:jpeg,jpg,png",
            'bio'      => 'required',
            'address'  => "required",
        ]);

        $imgname = $user->avatar;
        $img     = $request->avatar;

        if ($img) {
            $format = $user->username . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('images/avatar/'), $format);
            $imgname = $format;
        }

        $user->update([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'avatar'   => $imgname,
            'bio'      => $request->bio,
            'address'  => $request->address,
        ]);

        return redirect('/'. $user->username);
    }

    public function followsystem($following_id){
        $user = Auth::user();

        if ($user->following->contains($following_id)) {
            $user->following()->detach($following_id);
            $msg = ['status' => 'UNFOLLOW'];
        } else {
            $user->following()->attach($following_id);
            $msg = ['status' => 'FOLLOW'];
        }

        return response()->json($msg);
        
    }

    public function notif(){
        $user = Auth::user();
        $notification = $user->notification;
        return view('user.notify', ['notification' => $notification]);
    }

    public function notif_update(){
        $user = Auth::user();
        Notification::where('user_id', $user->id)->update(['seen' => true]);
        return ['msg' => 'success'];
    }

    public function notif_total(){
        $total = Auth::user()->notification()->where('seen', 0)->count();
        return response()->json($total);
    }
}
