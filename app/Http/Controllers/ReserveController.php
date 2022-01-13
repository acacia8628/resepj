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

    public function edit($id)
    {
        $reserve = Reserve::find($id);
        $times = [
            '17:00:00',
            '17:30:00',
            '18:00:00',
            '18:30:00',
            '19:00:00',
            '19:30:00',
            '20:00:00',
            '20:30:00',
            '21:00:00',
            '21:30:00',
        ];
        $numbers = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10'
        ];

        $items = [
            'reserve' => $reserve,
            'times' => $times,
            'numbers' => $numbers
        ];
        return view('reserve_edit',$items);
    }

    public function update(ReserveRequest $request, $id)
    {
        if(Auth::check()){
            $user_id = Auth::id();
            $reserve_id = $id;
            $r_date = $request->input('r_date');
            $r_time = $request->input('r_time');
            $r_number = $request->input('r_number');

            $item = Reserve::where('id',$reserve_id)->where('user_id',$user_id)->first();

            $item->reserve_date = $r_date;
            $item->reserve_time = $r_time;
            $item->reserve_number = $r_number;
            $item->save();
            return redirect('mypage');
        }
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
