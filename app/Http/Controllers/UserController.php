<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $user = User::with(['likes','reserves'])->where('id',$user_id)->first();
        return view('mypage', ['user' => $user]);
    }
}
