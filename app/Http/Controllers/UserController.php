<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $friends = Friend::where('user_id',Auth::id())->with(['myFriends'])->get();
        $users = User::with(['iFriend'])->where('id','!=',Auth::id())->get();

        return view('home',['users' => $users,'friends' => $friends]);
    }

    public function add(User $id)
    {
        $user = Auth::user();
        $friend = $user->friends()->create([
            'friend_id' => $id->id ,
        ]);

        return back()->with('status','Пользователь ' . $id->name . ' добавлен.');
    }

    public function delete($id)
    {
        Friend::destroy($id);
        return back()->with('status','Пользователь удален из избранного.');
    }

}
