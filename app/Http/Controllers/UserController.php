<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Reserve;

class UserController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $user = User::with(['likes'])->where('id', $user_id)->first();
        $reserves = Reserve::with(['shop'])
            ->where('user_id', $user_id)
            ->where('status', 'reserved')
            ->orderBy('reserve_date', 'asc')
            ->get();

        $items = [
            'user' => $user,
            'reserves' => $reserves,
        ];
        return view('mypage', $items);
    }

    public function show($id)
    {
        $reserves = Reserve::with(['shop'])
            ->where('user_id', $id)
            ->where('status', 'checked')
            ->orderBy('reserve_date', 'desc')
            ->get();

        $items = [
            'reserves' => $reserves,
        ];
        return view('reserve.history', $items);
    }
}
