<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reserve;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $current_time = Carbon::now()->format('Y-m-d');

        $user = User::with(['likes'])->where('id',$user_id)->first();
        $reserves = Reserve::with(['shop'])
            ->where('user_id',$user_id)
            ->whereDate('reserve_date','>',$current_time)
            ->get();

        $items = [
            'user' => $user,
            'reserves' => $reserves,
        ];
        return view('mypage',$items);
    }

    public function show($id)
    {
        $current_time = Carbon::now()->format('Y-m-d');
        $reserves = Reserve::with(['shop'])
            ->where('user_id',$id)
            ->whereDate('reserve_date','<',$current_time)
            ->orderBy('reserve_date','desc')
            ->get();

        $items = [
            'reserves' => $reserves,
        ];
        return view('reserve_history',$items);
    }
}
