<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use App\Models\Reserve;

class ReserveController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('done');
    }

    public function store(ReserveRequest $request)
    {
        $user_id = Auth::id();
        $shop_id = $request->input('shop_id');
        $r_date = $request->input('r_date');
        $r_time = $request->input('r_time');
        $r_number = $request->input('r_number');

        $items = Reserve::create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
            'reserve_date' => $r_date,
            'reserve_time' => $r_time,
            'reserve_number' => $r_number,
        ]);
        return view('done');
    }

    public function destroy($id)
    {
        if(Auth::check()){
            $user_id = Auth::id();
            $reserve_id = $id;

            $item = Reserve::where('id',$reserve_id)->where('user_id',$user_id)->first();
            $item->delete();
            return redirect('mypage');
        }
    }
}
