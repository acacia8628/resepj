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

        $reserve = Reserve::create([
            'user_id' => $user_id,
            'shop_id' => $request->shop_id,
            'reserve_date' => $request->r_date,
            'reserve_time' => $request->r_time,
            'reserve_number' => $request->r_number,
        ]);
        $reserve->courses()->attach($request->course_id);

        if($request->rs == 'payment_credit'){
            $request->user()->charge(
                $request->price,
                $request->paymentMethodId
            );
        }
        return redirect('done');
    }

    public function show($id)
    {
        $reserve = Reserve::with(['user', 'shop'])->where('id', $id)->first();

        if ($reserve->status == 'reserved' && $reserve->shop->user_id == Auth::id()) {
            Reserve::where('id', $id)->update(['status' => 'checked']);

            return view('reserve.detail', ['reserve' => $reserve]);
        } else {
            return redirect('/manager');
        }
    }

    public function edit($id)
    {
        $reserve = Reserve::where('id', $id)
            ->where('status', 'reserved')
            ->first();
        $times = config('times');
        $numbers = config('numbers');

        if (isset($reserve) && $reserve->user_id == Auth::id()) {
            $items = [
                'reserve' => $reserve,
                'times' => $times,
                'numbers' => $numbers
            ];
            return view('reserve.edit', $items);
        } else {
            return redirect('mypage');
        }
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
