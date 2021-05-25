<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(string $name){
        $user = User::where('name', $name)->first();

        return view('users.show', compact('user'));
    }

    public function follow(Request $request, string $name){
        $user = User::where('name', $name)->first();
        
        if($user->id == $request->user()->id){
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return redirect()->route('users.show', $user->name);
    }

    public function unfollow(Request $request, string $name){
        $user = User::where('name', $name)->first();
        
        if($user->id == $request->user()->id){
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return redirect()->route('users.show', $user->name);
    }
}