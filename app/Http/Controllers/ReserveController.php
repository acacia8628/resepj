<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReserveRequest;
use App\Models\Reserve;

class ReserveController extends Controller
{
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

        Reserve::create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
            'reserve_date' => $r_date,
            'reserve_time' => $r_time,
            'reserve_number' => $r_number,
        ]);
        return redirect('done');
    }

    public function show($id)
    {
        $reserve = Reserve::with(['user', 'shop'])
            ->where('id', $id)
            ->first();

        Reserve::where('id', $id)->update(['status' => 'checked']);
        return view('reserve.detail', ['reserve' => $reserve]);
    }

    public function edit($id)
    {
        $reserve = Reserve::find($id);
        $times = config('times');
        $numbers = config('numbers');

        $items = [
            'reserve' => $reserve,
            'times' => $times,
            'numbers' => $numbers
        ];
        return view('reserve.edit', $items);
    }

    public function update(ReserveRequest $request, $id)
    {
        $user_id = Auth::id();
        $reserve_id = $id;
        $r_date = $request->input('r_date');
        $r_time = $request->input('r_time');
        $r_number = $request->input('r_number');

        Reserve::where('id', $reserve_id)
            ->where('user_id', $user_id)
            ->update([
                'reserve_date' => $r_date,
                'reserve_time' => $r_time,
                'reserve_number' => $r_number
            ]);
        return redirect('mypage');
    }

    public function destroy($id)
    {
        $user_id = Auth::id();
        $reserve_id = $id;

        Reserve::where('id', $reserve_id)
                ->where('user_id', $user_id)
                ->delete();
        return redirect('mypage');
    }
}
